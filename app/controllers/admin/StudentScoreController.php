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
        $class_id = $f3->get('GET.class_id') ?? 1;
        $items = $this->db->exec("SELECT * FROM tblregister WHERE semester = ? AND class = ? ORDER BY student_no",array($custom->semester(),$class_id));
        $f3->set('items',$items);
        $f3->set('class_id',$class_id);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrSubject',$custom->subject());
        $f3->set('nav','student-score');
        $f3->set('subnav','student-score');
        $f3->set('strAction', 'ໃຫ້ຄະແນນນັກສຶກສາ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/student-score.html");
    }
    function scoreDetail(){
        $f3 = Base::instance();
        $tmp = new Template;
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $Svr = new RegisterServices($this->db);
        $student_no = $f3->get('PARAMS.student_no');
        $class_id = $f3->get('PARAMS.class_id');
        $year = $f3->get('PARAMS.year');
        $student = $Svr->load(array('student_no = ? AND year = ?',$student_no,$year));
        $items = $this->db->exec("SELECT * FROM tblscore WHERE student_no = ? AND year = ? AND class_id = ?",array($student_no,$year,$class_id));
        $scoreData = array();
        foreach($items as $row){
            $scoreData[$row['subject_id']] = $row['score'];
        }
        $f3->set('scoreData',$scoreData);
        $f3->set('class_id',$class_id);
        $f3->set('year',$year);
        $f3->set('student',$student);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('province',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('arrSubject',$custom->subject());
        $f3->set('nav','student-score');
        $f3->set('subnav','student-score');
        $f3->set('strAction', 'ລາຍອຽດຄະແນນ');
        $f3->set('strPage', 'ນັກສຶກສາ');
        echo $tmp->render("backend/student-score-detail.html");
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