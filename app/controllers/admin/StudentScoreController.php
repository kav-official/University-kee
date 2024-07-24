<?php
class StudentScoreController{
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
        $Svr = new SubjectServices($this->db);
        $items = $this->db->exec("SELECT * FROM tblstudent ORDER BY student_no");
        $f3->set('items',$items);
        $f3->set('help',$help);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('semester',$custom->semester());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('nav','student-score');
        $f3->set('subnav','student-score');
        $f3->set('strAction', 'ໃຫ້ຄະແນນນັກສຶກສາ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/student-score.html");
    }
}