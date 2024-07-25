<?php
class ScoreServices extends BaseServiceReadBean{
    public $db;
    function __construct($db){
        $this->db = $db;
		parent::__construct($db,"tblscore");
	}

    function add(){
        $f3         = Base::instance();
        $student_no = $f3->get('POST.student_no');
        $class_id   = $f3->get('POST.class_id');
        $semester   = $f3->get('POST.semester');
        $score      = $f3->get('POST.score');
        if((string)$score > 100){
            API::success(array('success' => false, 'message' => 'ການປ້ອນຄະແນນບໍ່ຖືກຕ້ອງ'));
        }
        $check = $this->load(array('student_no = ? AND semester = ?',$student_no,$semester));
        if($check){
            $check->student_no = $student_no;
            $check->class_id   = $class_id;
            $check->semester   = $semester;
            $check->score      = $score;
            $check->update();
            $message = 'ແກ້ໄຂສຳເລັດແລ້ວ';
        } else {
            $this->reset();
            $this->student_no         = $student_no;
            $this->class_id           = $class_id;
            $this->semester           = $semester;
            $this->score              = $score;
            $this->created_by_user_id = $f3->get('LOGON_USER_ID');
            $this->created_at         = date('Y-m-d H:i:s');
            $this->save();
            $message = 'ເພີ່ມສຳເລັດແລ້ວ';
        }
        API::success(array('success' => true, 'message' => $message, 'score' => $score));
    }
}