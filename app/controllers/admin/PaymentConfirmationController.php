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
        $items = $this->db->exec("SELECT * FROM tblregister WHERE semester = ? ORDER BY student_no",array($custom->semester()));
        $f3->set('items',$items);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('paymentStatus',$custom->paymentStatus());
        $f3->set('paymentStatusBtn',$custom->paymentStatusBtn());
        $f3->set('nav','payment-confirmation');
        $f3->set('subnav','payment-confirmation');
        $f3->set('strAction', 'ອັບເດດສະຖານະການຈ່າຍ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/payment-confirmation.html");
    }

    function storePaymentStatus(){
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
           API::success(array('success' => true, 'btn' => $paymentStatusBtn[$post_vars['payment_status']] ?? 'btn-danger', 'text' => $paymentStatus[$post_vars['payment_status']] ?? ''));
        }
        API::success(array('success' => false, 'text' => ''));
    }
}