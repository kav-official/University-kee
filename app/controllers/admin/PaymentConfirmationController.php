<?php
class PaymentConfirmationController{
    public $db;
    function __construct(){
        $this->db = DBConfig::config();
        $secur = new CustomSecurity();
        $secur->security($this->db);

    }
    function index(){
        $f3 = Base::instance();
        $tmp = new Template;
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $FSvr = new FeeServices($this->db);
        $class_id = $f3->get('GET.class_id') ?? 1;
        $year = $f3->get('GET.year') ?? 1;
        $fee = $FSvr->load(array('class = ?',$class_id));
        $items = $this->db->exec("SELECT * FROM tblregister WHERE semester = ? AND class = ? AND year = ? ORDER BY student_no",array($custom->semester(),$class_id,$year));
        $f3->set('items',$items);
        $f3->set('fee',$fee);
        $f3->set('year',$year);
        $f3->set('class_id',$class_id);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrYear',$custom->year());
        $f3->set('paymentStatus',$custom->paymentStatus());
        $f3->set('paymentStatusBtn',$custom->paymentStatusBtn());
        $f3->set('nav','payment-confirmation');
        $f3->set('subnav','payment-confirmation');
        $f3->set('strAction', 'ອັບເດດສະຖານະການຈ່າຍ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/payment-confirmation.html");
    }

    function data(){
        $f3 = Base::instance();
        $semester = $f3->get('PARAMS.semester');
        $student_no = $f3->get('PARAMS.student_no');
        $custom = new CustomFunctions();
        $province = $custom->province();
        $arrClass = $custom->classes();
        $paymentStatus = $custom->paymentStatus();
        $RSvr = new RegisterServices($this->db);
        $PSvr = new PaymentServices($this->db);
        $Dsvr = new DistrictServices($this->db);
        $ritem = $RSvr->load(array('semester = ? AND student_no = ?',$semester,$student_no));
        $pitem = $PSvr->load(array('semester = ? AND student_no = ?',$semester,$student_no));
        if($ritem != false && $pitem != false){
            $district = $Dsvr->load(array('id = ?',$ritem->district_id));
            $arr = array(
                'student_no' => $ritem->student_no,
                'semester' => $ritem->semester,
                'year' => $ritem->year,
                'first_name' => $ritem->first_name,
                'last_name' => $ritem->last_name,
                'gender' => $custom->gender($ritem->gender),
                'dob' => date('d-m-Y',strtotime($ritem->dob)),
                'phone' => $ritem->phone,
                'village' => $ritem->village,
                'district' => $district->district_name,
                'province' => $province[$ritem->province_id],
                'class' => $arrClass[$ritem->class],
                'payment_status' => $paymentStatus[$ritem->payment_status],
                'bill_no' => $pitem->id,
                'total_amount' => number_format($pitem->total_amount),
                'created_at' => date('d-m-Y H:i:s',strtotime($pitem->created_at)),
            );
            API::success(array('success' => true, 'message' => 'ສຳເລັດ', 'item' => $arr));
        } else {
            API::success(array('success' => false, 'message' => 'ບໍ່ພົບຂໍ້ມູນ'));
        }
    }

    function storePaymentStatus(){
        $Svr = new PaymentServices($this->db);
        $Svr->add();
    }
}