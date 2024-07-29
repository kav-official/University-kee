<?php
class ReportController{
    public $db;
    private $Svr;
	function __construct(){
        $this->db = DBConfig::config();
        $sec = new CustomSecurity();
        $sec->security($this->db);
    }

	public function score(){
        $f3         = Base::instance();
        $tmp        = new Template;
        $custom     = new CustomFunctions();
        $year       = 1;
        $subject_id = $f3->get('GET.subject_id');
        $class_id   = $f3->get('GET.class_id');

        $f3->set('class_id',$class_id);
        if($f3->get('GET.year') != null){
            $year = $f3->get('GET.year');
        }
        
        $arrField = array();
        $arrValue = array();

        if($class_id != null){
            $arrField[] = " tblregister.class = ? ";
            $arrValue[] = $class_id;
        }
        if($subject_id != null){
            $arrField[] = " tblscore.subject_id = ? ";
            $arrValue[] = $subject_id;
        }
        if($year != null){
            $arrField[] = " tblregister.year = ? ";
            $arrValue[] = $year;
        }
   
        $strField = implode("AND",$arrField);
        $items    = $this->db->exec("SELECT tblregister.*,tblscore.score,tblscore.subject_id FROM tblregister INNER JOIN tblscore ON (tblregister.student_no=tblscore.student_no) WHERE ".$strField,$arrValue);

        $disSvr = new DistrictServices($this->db);
        $arrDis=[];
        $disItems = $disSvr->getAll([],[]);
        foreach ($disItems as $value) {
            $arrDis[$value['id']] = $value['district_name'];
        }

        $f3->set('arrDis',$arrDis);
        $f3->set('items',$items);
        $f3->set('subject_id',$subject_id);
        $f3->set('year',$year);
        $f3->set('entrycount', count($items));
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrSubject',$custom->subject());
        $f3->set('arrYear',$custom->year());
		$f3->set('custom', $custom);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-score');
		$f3->set('strPage', 'ລາຍງານຄະແນນ');
		$f3->set('strAction', 'ລາຍງານຄະແນນ');
		echo($tmp->instance()->render('backend/report-score.html'));
	}
	public function payment(){
        $f3          = Base::instance();
        $tmp         = new Template;
        $custom      = new CustomFunctions();
        $help        = new HelpFunctions();
        $semester    = "2020-2021";
        $class_id    = $f3->get('GET.class_id');
        $year    = $f3->get('GET.year');
        $semesters   = $this->db->exec("SELECT semester FROM tblregister GROUP BY semester ORDER BY semester");
        $arrSemester = array();
        foreach($semesters as $semesterRow){
            $semester = $semesterRow['semester'];
            $arrSemester[$semesterRow['semester']] = $semesterRow['semester'];
        }
        $f3->set('arrSemester',$arrSemester);
        $f3->set('semester',$semester);
        $f3->set('class_id',$class_id);
        $f3->set('year',$year);
        if($f3->get('GET.semester') != null){
            $semester = $f3->get('GET.semester');
        }
        $arrField = array();
        $arrValue = array();

        $arrField[] = " semester = ? ";
        $arrValue[] = $semester;
        if($class_id != null){
            $arrField[] = " class = ? ";
            $arrValue[] = $class_id;
        }
        if($year != null){
            $arrField[] = " year = ? ";
            $arrValue[] = $year;
        }
        $strField         = implode("AND",$arrField);
        $items            = $this->db->exec("SELECT * FROM tblregister WHERE ".$strField,$arrValue);
        $total_amount     = 0;
        $PSvr             = new PaymentServices($this->db);
        $DSvr             = new DistrictServices($this->db);
        $arrClass         = $custom->classes();
        $arrYear          = $custom->year();
        $province         = $custom->province();
        $paymentStatus    = $custom->paymentStatus();
        $paymentStatusBtn = $custom->paymentStatusBtn();
        $data             = array();
        $entrycount       = 0;
        foreach($items as $row){
            $district = $help->getTitle('DistrictServices',['id = ?',$row['district_id']],'district_name');
            $payment  = $PSvr->load(array('semester = ? AND student_no = ?',$row['semester'],$row['student_no']));
            $amount   = 0;
            if($payment){
                $amount = $payment->total_amount;
            }
            $data[] = array(
                'id'         => $row['id'],
                'semester'   => $row['semester'],
                'student_no' => $row['student_no'],
                'first_name' => $row['first_name'],
                'last_name'  => $row['last_name'],
                'class'      => $arrClass[$row['class']] ?? '-',
                'gender'     => $custom->gender($row['gender']),
                'dob'        => date('d-m-Y',strtotime($row['dob'])),
                'village'    => $row['village'],
                'district'   => $district,
                'province'   => $province[$row['province_id']] ?? '=',
                'phone'      => $row['phone'],
                'status'     => $paymentStatus[$row['payment_status']] ?? '-',
                'btn'        => $paymentStatusBtn[$row['payment_status']] ?? '',
                'amount'     => $amount,
            );
            $total_amount += $amount;
            $entrycount   += 1;
        }
        $f3->set('total_amount',$total_amount);
        $f3->set('data',$data);
        $f3->set('entrycount',$entrycount);
        $f3->set('custom',$custom);
        $f3->set('arrClass',$arrClass);
        $f3->set('arrYear',$arrYear);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-payment');
		$f3->set('strPage', 'ລາຍງານ');
		$f3->set('strAction', 'ລາຍງານການຈ່າຍຄ່າເທີມ');
		echo($tmp->instance()->render('backend/report-payment.html'));
	}
	public function student(){
        $f3       = Base::instance();
        $tmp      = new Template;
        $custom   = new CustomFunctions();
        $year     = 1;
        $class_id = $f3->get('GET.class_id');

        $f3->set('class_id',$class_id);
        if($f3->get('GET.year') != null){
            $year = $f3->get('GET.year');
        }
        
        $arrField = array();
        $arrValue = array();

        if($class_id != null){
            $arrField[] = " class = ? ";
            $arrValue[] = $class_id;
        }
        if($year != null){
            $arrField[] = " year = ? ";
            $arrValue[] = $year;
        }
   
        $strField = implode("AND",$arrField);
        $items    = $this->db->exec("SELECT * FROM tblregister WHERE ".$strField,$arrValue);

        $disSvr = new DistrictServices($this->db);
        $arrDis=[];
        $disItems = $disSvr->getAll([],[]);
        foreach ($disItems as $value) {
            $arrDis[$value['id']] = $value['district_name'];
        }

        $f3->set('arrDis',$arrDis);
        $f3->set('items',$items);
        $f3->set('year',$year);
        $f3->set('entrycount', count($items));
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrYear',$custom->year());
		$f3->set('custom', $custom);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-student');
		$f3->set('strPage', 'ລາຍງານຂໍ້ມູນນັກສຶກສາ');
		$f3->set('strAction', 'ລາຍງານຂໍ້ມູນນັກສຶກສາ');
		echo($tmp->instance()->render('backend/report-student.html'));
	}
	public function employee(){
        $f3     = Base::instance();
        $tmp    = new Template;
        $custom = new Customfunctions();
        $items  = $this->db->exec("SELECT * FROM tbluser");

        $disSvr = new DistrictServices($this->db);
        $arrDis=[];
        $disItems = $disSvr->getAll([],[]);
        foreach ($disItems as $value) {
            $arrDis[$value['id']] = $value['district_name'];
        }

        $f3->set('arrDis',$arrDis);
        $f3->set('entrycount', count($items));
        $f3->set('items', $items);
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrProvince',$custom->province());
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-employee');
		$f3->set('strPage', 'ລາຍງານຂໍ້ມູນພະນັກງານ');
		$f3->set('strAction', 'ລາຍງານຂໍ້ມູນພະນັກງານ');
		echo($tmp->instance()->render('backend/report-employee.html'));
	}
}