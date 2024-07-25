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
        $items = $this->db->exec("SELECT * FROM tblregister WHERE semester = ? ORDER BY student_no",array($custom->semester()));
        $f3->set('items',$items);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('nav','student-score');
        $f3->set('subnav','student-score');
        $f3->set('strAction', 'ໃຫ້ຄະແນນນັກສຶກສາ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/student-score.html");
    }
    function score(){
        $f3 = Base::instance();
        $Svr = new ScoreServices($this->db);
        $semester = $f3->get('PARAMS.semester');
        $student_no = $f3->get('PARAMS.student_no');
        $item = $Svr->load(array('student_no = ? AND semester = ?',$student_no,$semester));
        if($item){
            API::success(array('success' => true, 'score' => $item->score));
        } else {
            API::success(array('success' => true, 'score' => ''));
        }
    }

    function storeData(){
        $Svr = new ScoreServices($this->db);
        $Svr->add();
    }
}