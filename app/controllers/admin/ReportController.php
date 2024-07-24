<?php
class ReportController{
    public $db;
    private $Svr;
	function __construct(){
        $this->db = DBConfig::config();
        $sec = new CustomSecurity();
        $sec->security($this->db);
        $this->Svr = new ProductServices($this->db);
    }

	public function byBill(){
        $f3 = Base::instance();
		$tmp = new Template;
        if($f3->get('GET.start') != null && $f3->get('GET.end') != null){
            $start = $f3->get('GET.start');
            $end = $f3->get('GET.end');
        } else {
            $start = date('d-m-Y');
            $end = date('d-m-Y');
        }
        $items = $this->db->exec("SELECT * FROM tblorder WHERE (FROM_UNIXTIME(created_at, '%Y-%m-%d') BETWEEN ? AND ?) AND status = ?",array(date('Y-m-d',strtotime($start)),date('Y-m-d',strtotime($end)),1));
        $total_amount = 0;
        $entrycount = 0;
        foreach($items as $row){
            $total_amount += $row['bonding_fee_amount'];
            $entrycount += 1;
        }
		$f3->set('items', $items);
		$f3->set('entrycount', $entrycount);
		$f3->set('total_amount', $total_amount);
		$f3->set('start', $start);
		$f3->set('end', $end);
		$f3->set('nav', 'report');
		$f3->set('subnav', 'report-bill');
		$f3->set('strPage', 'ສະຫຼຸບ');
		$f3->set('strAction', 'ສະຫຼຸບຕາມບິນ');
		echo($tmp->instance()->render('backend/report-bill.html'));
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