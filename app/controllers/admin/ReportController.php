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
		$f3->set('nav', 'report-score');
		$f3->set('subnav', 'report-score');
		$f3->set('strPage', 'ລາຍງານການຈ່າຍເງີນ');
		$f3->set('strAction', 'ລາຍງານການຈ່າຍເງີນ');
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