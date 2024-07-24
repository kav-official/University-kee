<?php
class StudentGradeController{
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
        $f3->set('nav','student-score-grade');
        $f3->set('subnav','student-score-grade');
        $f3->set('strAction', 'ຄິດໄລ່ເກຣດ');
        $f3->set('strPage', 'ຄິດໄລ່ເກຣດ');
        echo $tmp->render("backend/student-score-grade.html");
    }
}