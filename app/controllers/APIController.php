<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class APIController{
    function __construct(){
        $this->f3 = Base::instance();
        $this->db = DBConfig::config();
        $this->secur = new CustomSecurity();
        $this->secur->fSecurity($this->db);
        $this->help = new HelpFunctions();
    }
    function products(){
        $items = $this->help->getSQL("SELECT tblproductlist.id, tblproductlist.product_no, tblproductlist.price, tblunit.unit_name, tblproduct.product_name, tblproduct.image FROM tblproductlist INNER JOIN tblproduct ON(tblproduct.product_no = tblproductlist.product_no) INNER JOIN tblunit ON(tblunit.id = tblproductlist.unit_id) WHERE tblproductlist.base_qty = 1 LIMIT 100");
        $arr = array(
            'success' => true,
            'items' => $items
        );
        API::success($arr,JSON_PRETTY_PRINT);
    }

    function findItem(){
        $uri = $this->f3->get('PARAMS.product');
        
        $items = $this->help->getSQL("SELECT barcode,product_no,product_name FROM tblproduct WHERE barcode = ? OR product_no LIKE ? OR product_name LIKE ? LIMIT 10",[$uri,'%'.$uri.'%','%'.$uri.'%']);
        if($items){
            $data = ['success'=>true,'items'=>$items];
        }else{
            $data = ['success'=>false,'items'=>[]];
        }
        API::success($data);
    }
    function billData() {
        $token = $this->f3->get('GET.token');
        $decoded = JWT::decode($token, new Key($this->f3->get('key'), 'HS256'));
        // $decoded = JWT::decode($token, $this->f3->get('key'), 'HS256');
        $staff = $this->help->getById('StaffServices',$decoded->id);
        $items = array();
        if($staff){
            if($this->f3->get('GET.bill_no') != null){
                $items = $this->db->exec("SELECT tblorder.*, CONCAT(tblstaff.first_name, ' ', tblstaff.last_name) AS staff_name FROM tblorder INNER JOIN tblstaff ON(tblstaff.staff_no = tblorder.order_by_staff_no) WHERE tblorder.bill_no = ? AND tblorder.staff_no = ?",array($this->f3->get('GET.bill_no'),$staff->staff_no));
            } else {
                // $items = $this->db->exec("SELECT tblorder.*, CONCAT(tblstaff.first_name, ' ', tblstaff.last_name) AS staff_name FROM tblorder INNER JOIN tblstaff ON(tblstaff.staff_no = tblorder.order_by_staff_no) WHERE tblorder.staff_no = ? ORDER BY id DESC LIMIT 20",array($staff->staff_no));
                $items = $this->db->exec("SELECT tblorder.*, CONCAT(tblstaff.first_name, ' ', tblstaff.last_name) AS staff_name FROM tblorder INNER JOIN tblstaff ON(tblstaff.staff_no = tblorder.order_by_staff_no) ORDER BY id DESC LIMIT 20");
            }
        }
        $arr = array();
        foreach($items as $row){
            $arr[] = array(
                'bill_no'                   => $row['bill_no'],
                'staff_no'                  => $row['order_by_staff_no'],
                'currency_id'               => $row['currency_id'],
                'staff_name'                => $row['staff_name'],
                'customer_name'             => $row['first_name'].' '.$row['last_name'],
                'customer_phone'            => $row['phone'],
                'total_amount'              => number_format($row['total_base_amount']),
                'total_discount_amount'     => number_format($row['discount_amount']),
                'total_shipping_amount'     => number_format($row['shipping_amount']),
                'grand_total_amount'        => number_format($row['bonding_fee_amount']),
                'created_at'                => date('d-m-Y H:i:s',$row['created_at'])
            );
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array('success' => true, 'items' => $arr),JSON_PRETTY_PRINT);
    }

    function bill(){
        $bill_no = $this->f3->get('PARAMS.bill_no');
        $item = $this->help->getByOne('OrderServices',array('bill_no = ?',$bill_no));
        if($item){
            $items = $this->db->exec("SELECT tblorderlist.*, tblproduct.product_name, tblunit.unit_name FROM tblorderlist INNER JOIN tblproduct ON(tblproduct.product_no = tblorderlist.product_no) INNER JOIN tblunit ON(tblunit.id = tblorderlist.unit_id) WHERE tblorderlist.bill_no = ?",array($bill_no));
            $arr = array();
            foreach($items as $row){
                $arr[] = array(
                    'product_no'            => $row['product_no'],
                    'product_name'          => $row['product_name'],
                    'unit_name'             => $row['unit_name'],
                    'qty'                   => $row['qty'],
                    'price'                 => number_format($row['price']),
                    'total_price'           => number_format($row['total_price'])
                );
            }
            $staff = $this->help->getByOne('StaffServices',['staff_no = ?',$item->order_by_staff_no]);
            $data = array(
                'bill_no'                   => $item->bill_no,
                'staff_no'                  => $item->order_by_staff_no,
                'currency_id'               => $item->currency_id,
                'staff_name'                => $staff->first_name.' '.$staff->last_name,
                'customer_name'             => $item->first_name.' '.$item->last_name,
                'customer_phone'            => $item->phone,
                'total_amount'              => number_format($item->total_base_amount),
                'total_discount_amount'     => number_format($item->discount_amount),
                'total_shipping_amount'     => number_format($item->shipping_amount),
                'grand_total_amount'        => number_format($item->bonding_fee_amount),
                'created_at'                => date('d-m-Y H:i:s',$item->created_at)
            );
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('success' => true, 'item' => $data, 'items' => $arr),JSON_PRETTY_PRINT);
        } else {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array('success' => false),JSON_PRETTY_PRINT);
        }
    }

    function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $access = new AccessServices($this->db);
            $Svr = new StaffServices($this->db);
            $data = array();
            $email = str_replace(" ","",$this->f3->get('POST.email'));
            $password = str_replace(" ","",$this->f3->get('POST.password'));
            // $email = 'unlaytsab@gmail.com';
            // $password = 'admin@121';
            $item = $Svr->getEmail($email);
            if($item){
                if ($item->password == crypt($password,$item->password)){
                    $Svr->loginDateTime($item->id);
                    $access->add($item->id,$item->role,1);
                    $payload = array(
                        "id" => $item->id,
                        "exp" => time() + (60*60*24*30),
                        "iss" => "https://jointpharmalaos.com/"
                    );
                    $token =  JWT::encode($payload, $this->f3->get('key'), 'HS256');
                    http_response_code(200);
                    $data = ['success' => true, 'role' => $item->role, 'token' => $token, 'message' => 'Login success'];
                } else {
                    $access->add($item->id,$item->role,0);
                    http_response_code(401);
                    $data = ['success' => false, 'message' => 'Email/Password invalid'];
                }
            } else {
                http_response_code(401);
                $data = ['success' => false, 'message' => 'Email/Password invalid'];
            }
            API::success($data);
        }
    }
}