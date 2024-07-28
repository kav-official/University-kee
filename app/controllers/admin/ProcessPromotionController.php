<?php
class ProcessPromotionController{
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
        $class_id = $f3->get('GET.class_id') ?? 1;
        $year = $f3->get('GET.year') ?? 1;
        $items = $this->db->exec("SELECT * FROM tblregister WHERE semester = ? AND class = ? AND year = ? ORDER BY student_no",array($custom->semester(),$class_id,$year));
        $f3->set('items',$items);
        $f3->set('class_id',$class_id);
        $f3->set('year',$year);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->classes());
<<<<<<< HEAD
        $f3->set('arrYear',$custom->year());
=======
>>>>>>> 3b74d2acce3230de9904435a757cb0eee77de1a7
        $f3->set('nav','process');
        $f3->set('subnav','process-promotion');
        $f3->set('strAction', 'ປະເມີນຜົນການເລື່ອນຊັ້ນ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/process-promotion.html");
    }
}