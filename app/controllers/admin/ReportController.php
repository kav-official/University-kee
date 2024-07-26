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
        $f3     = Base::instance();
        $tmp    = new Template;
        $custom = new CustomFunctions();

        $items = $this->db->exec("SELECT tblregister.*,tblscore.score FROM tblregister INNER JOIN tblscore ON(tblregister.student_no=tblscore.student_no)");

        $f3->set('items',$items);
        $f3->set('entrycount', count($items));
        $f3->set('arrClass',$custom->arrClass());
		$f3->set('nav', 'report-score');
		$f3->set('subnav', 'report-score');
		$f3->set('strPage', 'ລາຍງານຄະແນນ');
		$f3->set('strAction', 'ລາຍງານຄະແນນ');
		echo($tmp->instance()->render('backend/report-score.html'));
	}
	public function payment(){
		$f3  = Base::instance();
		$tmp = new Template;
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $semester = "2020-2021";
        $class_id = $f3->get('GET.class_id');
        $semesters = $this->db->exec("SELECT semester FROM tblregister GROUP BY semester ORDER BY semester");
        $arrSemester = array();
        foreach($semesters as $semesterRow){
            $semester = $semesterRow['semester'];
            $arrSemester[$semesterRow['semester']] = $semesterRow['semester'];
        }
        $f3->set('arrSemester',$arrSemester);
        $f3->set('semester',$semester);
        $f3->set('class_id',$class_id);
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
        $strField = implode("AND",$arrField);
        $items = $this->db->exec("SELECT * FROM tblregister WHERE ".$strField,$arrValue);
        $total_amount = 0;
        $PSvr = new PaymentServices($this->db);
        $DSvr = new DistrictServices($this->db);
        $arrClass = $custom->arrClass();
        $province = $custom->province();
        $paymentStatus = $custom->paymentStatus();
        $paymentStatusBtn = $custom->paymentStatusBtn();
        $data = array();
        $entrycount = 0;
        foreach($items as $row){
            $district = $help->getTitle('DistrictServices',['id = ?',$row['district_id']],'district_name');
            $payment = $PSvr->load(array('semester = ? AND student_no = ?',$row['semester'],$row['student_no']));
            $amount = 0;
            if($payment){
                $amount = $payment->total_amount;
            }
            $data[] = array(
                'id' => $row['id'],
                'semester' => $row['semester'],
                'student_no' => $row['student_no'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'class' => $arrClass[$row['class']] ?? '-',
                'gender' => $custom->gender($row['gender']),
                'dob' => date('d-m-Y',strtotime($row['dob'])),
                'village' => $row['village'],
                'district' => $district,
                'province' => $province[$row['province_id']] ?? '=',
                'phone' => $row['phone'],
                'status' => $paymentStatus[$row['payment_status']] ?? '-',
                'btn' => $paymentStatusBtn[$row['payment_status']] ?? '',
                'amount' => $amount,
            );
            $total_amount += $amount;
            $entrycount += 1;
        }
        $f3->set('total_amount',$total_amount);
        $f3->set('data',$data);
        $f3->set('entrycount',$entrycount);
        $f3->set('custom',$custom);
        $f3->set('arrClass',$arrClass);
		$f3->set('nav', 'report-score');
		$f3->set('subnav', 'report-score');
		$f3->set('strPage', 'ລາຍງານ');
		$f3->set('strAction', 'ລາຍງານການຈ່າຍຄ່າເທີມ');
		echo($tmp->instance()->render('backend/report-payment.html'));
	}
	public function student(){
		$f3  = Base::instance();
		$tmp = new Template;

        // $items = $this->db->exec("SELECT tblregister.*, FROM ");

        // $f3->set('items',$items);
		$f3->set('nav', 'report-student');
		$f3->set('subnav', 'report-student');
		$f3->set('strPage', 'ລາຍງານຂໍ້ມູນນັກສຶກສາ');
		$f3->set('strAction', 'ລາຍງານຂໍ້ມູນນັກສຶກສາ');
		echo($tmp->instance()->render('backend/report-student.html'));
	}
	public function employee(){
		$f3  = Base::instance();
		$tmp = new Template;
		$f3->set('nav', 'report-score');
		$f3->set('subnav', 'report-score');
		$f3->set('strPage', 'ລາຍງານຂໍ້ມູນພະນັກງານ');
		$f3->set('strAction', 'ລາຍງານຂໍ້ມູນພະນັກງານ');
		echo($tmp->instance()->render('backend/report-employee.html'));
	}

    function reportbestSale(){
        $f3     = Base::instance();
		$tmp    = new Template;
        $help = new HelpFunctions();
        $date   = $f3->get("GET.date_filter") ?? $date = date("m-Y");

        $items = $this->db->exec("SELECT rl.product_no,COUNT(rl.id) AS sale_quantity,u.unit_name,FROM_UNIXTIME(rl.created_at,'%m-%Y') AS date_order FROM tblorderlist rl  
        INNER JOIN tblunit u ON rl.unit_id = u.id
        WHERE FROM_UNIXTIME(rl.created_at,'%m-%Y') = ?
        GROUP BY rl.product_no ORDER BY sale_quantity DESC",[$date]);

        $entrycount = 0;
        foreach($items as $row){
            $entrycount += 1;
        }
		$f3->set('items', $items);
		$f3->set('help', $help);
		$f3->set('entrycount', $entrycount);
		$f3->set('date', $date);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-best-sale');
		$f3->set('strPage', 'ລາຍງານ');
		$f3->set('strAction', 'ລາຍງານສິນຄ້າຂາຍດີ');
		echo($tmp->instance()->render('backend/report-best-sale.html'));
    }

    function reportProduct(){
        $f3 = Base::instance();
		$tmp = new Template;

		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-product');
		$f3->set('strPage', 'ລາຍງານ');
		$f3->set('strAction', 'ລາຍງານຍອດຂາຍ');
		echo($tmp->instance()->render('backend/report-product.html'));
    }
    function reportView(){
        $f3         = Base::instance();
		$tmp        = new Template;
        $date       = $f3->get("GET.date_filter");
        $top_views  = $f3->get("GET.top_views");
        $less_views = $f3->get("GET.less_views");

        $strWhere = "";
        $arrWhere = [];
        $arrValue = [];
        $arrWhere[] = " WHERE ? ";
        $arrValue[] = 1;

        if($date != "") {
            $arrWhere[] = " FROM_UNIXTIME(p.date_reviews,'%m-%Y') = ? ";
            $arrValue[] = $date;
        }
        $strWhere .= implode(' AND ',$arrWhere);
        $strWhere  .= " ORDER BY p.reviews DESC";

        if($top_views){
            $items = $this->db->exec("SELECT p.image,p.product_no,p.product_name,p.reviews,c.category_name FROM tblproduct p  
            INNER JOIN tblcategory c ON p.category_id = c.id  ORDER BY p.reviews DESC LIMIT ?",[10]);
        }elseif($less_views){
            $items = $this->db->exec("SELECT p.image,p.product_no,p.product_name,p.reviews,c.category_name FROM tblproduct p  
            INNER JOIN tblcategory c ON p.category_id = c.id  ORDER BY p.reviews ASC LIMIT ?",[10]);
        }else{
            $items = $this->Svr->getSQL("SELECT p.image,p.product_no,p.product_name,p.reviews,c.category_name 
            FROM tblproduct p  
            INNER JOIN tblcategory c ON p.category_id = c.id".$strWhere,$arrValue);
        }

        $entrycount = 0;
        foreach($items as $row){
            $entrycount += 1;
        }
		$f3->set('items', $items);
		$f3->set('entrycount', $entrycount);
		$f3->set('date', $date);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-view');
		$f3->set('strPage', 'ລາຍງານ');
		$f3->set('strAction', 'ລາຍງານຍອດວິວ');
		echo($tmp->instance()->render('backend/report-view.html'));
    }
}