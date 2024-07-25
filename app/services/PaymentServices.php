<?php
class PaymentServices extends BaseServiceReadBean{
    public $db;
    function __construct($db){
		$this->db = $db;
		parent::__construct($db,'tblpayment');
	}

    function add(){
        $f3 = Base::instance();
        $custom = new CustomFunctions();
        $Svr = new RegisterServices($this->db);
        if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
            $data = $f3->get('BODY');
            parse_str($data,$post_vars);
            $paymentStatus = $custom->paymentStatus();
            $paymentStatusBtn = $custom->paymentStatusBtn();
            $Svr->load(array('id = ?',$post_vars['id']));
            $Svr->payment_status = $post_vars['payment_status'];
            $Svr->update();
            $item = $this->load(array('semester = ? AND student_no = ?',$post_vars['semester'],$post_vars['student_no']));
            if($item){
                $item->total_amount = str_replace(",","",$post_vars['total_amount']);
                $item->payment_status = $post_vars['payment_status'];
                $item->created_at = date('Y-m-d H:i:s');
                $item->update();
            } else {
                $this->reset();
                $this->semester = $post_vars['semester'];
                $this->student_no = $post_vars['student_no'];
                $this->total_amount = str_replace(",","",$post_vars['total_amount']);
                $this->payment_status = $post_vars['payment_status'];
                $this->created_at = date('Y-m-d H:i:s');
                $this->save();
            }
            API::success(array('success' => true, 'btn' => $paymentStatusBtn[$post_vars['payment_status']] ?? 'btn-danger', 'text' => $paymentStatus[$post_vars['payment_status']] ?? ''));
        }
        API::success(array('success' => false, 'text' => ''));
    }
}