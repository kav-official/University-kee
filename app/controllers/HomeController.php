<?php
class HomeController{
    public $db;
    function __construct(){
        $this->db = DBConfig::config();
        $secur = new CustomSecurity();
        $secur->fSecurity($this->db);

    }

    function index(){
        $f3 = Base::instance();
        $tmp = new Template;
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $Svr = new ProductServices($this->db);
        $cateSvr = new CategoryServices($this->db);
		if($f3->get('LOGON_MEMBER_TYPE') == 'staff'){
			if($f3->get('LOGON_MEMBER_ROLE') == 2){
				$f3->set('discountItems',$help->getSQL("SELECT tblproductlist.base_price, tblproductlist.unit_id,tblproductlist.price, tblproductlist.percent, tblproductlist.product_no,tblproduct.product_name, tblproduct.image 
				FROM tblproduct 
				INNER JOIN tblproductlist 
				ON(tblproductlist.product_no = tblproduct.product_no) 
				WHERE tblproductlist.base_qty = 1
				AND  tblproductlist.percent > 0
				AND tblproduct.status <= 4
				AND tblproduct.publish_status = 1
				ORDER BY tblproduct.product_name ASC LIMIT 10"));
			} else {
				$f3->set('discountItems',$help->getSQL("SELECT tblproductlist.base_price, tblproductlist.unit_id,tblproductlist.price, tblproductlist.percent, tblproductlist.product_no,tblproduct.product_name, tblproduct.image 
				FROM tblproduct 
				INNER JOIN tblproductlist 
				ON(tblproductlist.product_no = tblproduct.product_no) 
				WHERE tblproductlist.base_qty = 1
				AND  tblproductlist.percent > 0
				AND tblproduct.status <= 3
				AND tblproduct.publish_status = 1
				ORDER BY tblproduct.product_name ASC LIMIT 10"));
			}
        } else if($f3->get('LOGON_MEMBER_TYPE') == 'member'){
            $f3->set('discountItems',$help->getSQL("SELECT tblproductlist.product_no,tblproductlist.base_price, tblproductlist.unit_id,tblproductlist.price, tblproductlist.percent, tblproduct.product_name, tblproduct.image 
			FROM tblproduct 
			JOIN tblproductlist 
			ON(tblproductlist.product_no = tblproduct.product_no) 
			WHERE tblproductlist.base_qty = 1 
			AND tblproductlist.percent > 0 
			AND tblproduct.status <= 2
			AND tblproduct.publish_status = 1
			ORDER BY tblproduct.product_name ASC LIMIT 10"));
        } else {
            $f3->set('discountItems',$help->getSQL("SELECT tblproductlist.product_no,tblproductlist.base_price, tblproductlist.unit_id,tblproductlist.price, tblproductlist.percent, tblproduct.product_name, tblproduct.image 
			FROM tblproduct 
			JOIN tblproductlist 
			ON(tblproductlist.product_no = tblproduct.product_no) 
			WHERE tblproductlist.base_qty = 1 
			AND tblproductlist.percent > 0 
			AND tblproduct.status = 1
			AND tblproduct.publish_status = 1"));
		}
        $categItems = $help->getSQL("SELECT * FROM tblcategory ORDER BY order_num");
        $arrCateg = array();
        foreach($categItems as $categRow)
        {
            $arrCateg[$categRow['id']] = $categRow['category_name'];
        }
        $f3->set('custom',$custom);
        $f3->set('nav','home');
        $f3->set('subnav','home');
        $f3->set('arrCateg',$arrCateg);
        $f3->set('help',$help);
        echo $tmp->render("frontend/index.html");
    }

	function homeFilter(){
        $f3 = Base::instance();
        $tmp = new Template;
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $Svr = new ProductServices($this->db);
        $cateSvr = new CategoryServices($this->db);
		$Svr = new ProductServices($this->db);
        $categid = $f3->get('GET.categid');
        $filter = $f3->get('GET.filter');

        $limit = $f3->get('GET.limit') ?? $f3->get('ITEM_PER_PAGE');
        if ($f3->get('GET.page') != null){
            $page_number = $f3->get('GET.page');
        } else {
            $page_number = 1;
        }

        $arrField = array();
        $arrValue = array();
        $g = 0;

        if($f3->get('LOGON_MEMBER_TYPE') == 'staff'){
            if($f3->get('LOGON_MEMBER_ROLE') == 2){
                $arrField[] = " tblproductlist.base_qty = ? ";
                $arrValue[] = 1;
            } else {
                $prdSvr = new AddStaffProductServices($this->db);
                $check = $prdSvr->find(array('staff_no = ?',$f3->get('LOGON_STAFF_NO')));
                if(count($check) > 0){
                    $arrPrdNo = array();
                    foreach($check as $checkRow){
                        $arrPrdNo[] = $checkRow['product_no'];
                    }
                    $strPrdNo = "'".implode("','",$arrPrdNo)."'";
                    $arrField[] = " tblproductlist.product_no IN(".$strPrdNo.") ";
                    $g = 1;
                    // $arrValue[] = $strPrdNo;
                } else {
                    $arrField[] = " tblproductlist.base_qty = ? AND tblproduct.status <= ? ";
                    $arrValue[] = 1;
                    $arrValue[] = 3;
                }
            }
        } else if($f3->get('LOGON_MEMBER_TYPE') == 'member_staff'){
            $prdSvr = new AddStaffProductServices($this->db);
            $check = $prdSvr->find(array('staff_no = ?',$f3->get('LOGON_STAFF_NO')));
            if(count($check) > 0){
                $arrPrdNo = array();
                foreach($check as $checkRow){
                    $arrPrdNo[] = $checkRow['product_no'];
                }
                $strPrdNo = "'".implode("','",$arrPrdNo)."'";
                $arrField[] = " tblproductlist.product_no IN(".$strPrdNo.") ";
                $g = 1;
            }
        } else if($f3->get('LOGON_MEMBER_TYPE') == 'member'){
            $arrField[] = " tblproductlist.base_qty = ? AND tblproduct.status <= ? ";
            $arrValue[] = 1;
            $arrValue[] = 2;
        } else {
            $arrField[] = " tblproductlist.base_qty = ? AND tblproduct.status = ? ";
            $arrValue[] = 1;
            $arrValue[] = 1;
        }

		if($categid != null){
            $arrField[] = " tblproduct.category_id = ? ";
            $arrValue[] = $categid;
        }
        if($filter != null){
            $arrField[] = " tblproduct.product_name LIKE ? ";
            $arrValue[] = "%".$filter."%";
        }

        if(count($arrField) > 0){
            if($g == 1){
                $strWhere = implode("AND",$arrField)." GROUP BY tblproductlist.product_no ";
            } else {
                $strWhere = implode("AND",$arrField);
            }
        } else {
            $strWhere = 1;
        }
        $entry = $Svr->getSQL("SELECT count(1) AS 'counter' FROM tblproduct INNER JOIN tblproductlist ON(tblproductlist.product_no = tblproduct.product_no) WHERE ".$strWhere,$arrValue);
        $entrycount = $entry[0]['counter'] ?? 0;
        $pages = ceil($entrycount/$limit);
        if(!is_numeric($page_number)){
            $page_number = 1;
        }
        $items = $Svr->getSQL("SELECT tblproduct.product_no, tblproduct.product_name, tblproduct.image, tblproductlist.unit_id,tblproductlist.price,tblproductlist.percent,tblproductlist.base_price FROM tblproduct INNER JOIN tblproductlist ON(tblproductlist.product_no = tblproduct.product_no) INNER JOIN tblcategory ON(tblcategory.id = tblproduct.category_id) WHERE ".$strWhere." ORDER BY tblcategory.order_num LIMIT ".$limit." OFFSET ".($page_number-1)*$limit,$arrValue);
        $arr = array();
        foreach($items as $row){
            $price = $row['percent'] > 0 ? $row['base_price'] : $row['price'];
            $arr[] = array(
                'product_no' => $row['product_no'], 
                'product_name' => $row['product_name'], 
                'unit_id' => $row['unit_id'], 
                'price' => $price, 
                'percent' => $row['percent'], 
                'image' => $row['image'] != '' ? $row['image'] : 'https://jointpharmalaos.com/uploads/empty.jpg'
            );
        }
        $arrPagination = array(
            'current_page'      => $page_number,
            'pages'             => $pages,
            'form'              => ($page_number-1)*$limit,
            'to'                => (int)$limit
        );
        $data = array(
            'data' => $arr,
            'pagination' => $arrPagination,
            'entrycount' => $entrycount
        );
        API::success($data);
	}
}