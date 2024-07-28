<?php
class ScoreServices extends BaseServiceReadBean{
    public $db;
    function __construct($db){
        $this->db = $db;
		parent::__construct($db,"tblscore");
	}

    function add(){
        $f3         = Base::instance();
        $subject_id = $f3->get('POST.subject_id');
        $student_no = $f3->get('POST.student_no');
        $class_id   = $f3->get('POST.class_id');
        $semester   = $f3->get('POST.semester');
        $semester   = $f3->get('POST.semester');
        $year       = $f3->get('POST.year');
        $score      = $f3->get('POST.score');
        if((string)$score > 100){
            API::success(array('success' => false, 'message' => 'ການປ້ອນຄະແນນບໍ່ຖືກຕ້ອງ'));
        }
        $check = $this->load(array('student_no = ? AND semester = ? AND subject_id =?',$student_no,$semester,$subject_id));
        if($check){
            $check->subject_id = $subject_id;
            $check->student_no = $student_no;
            $check->class_id   = $class_id;
            $check->semester   = $semester;
            $check->year       = $year;
            $check->score      = $score;
            $check->update();
            $message = 'ແກ້ໄຂສຳເລັດແລ້ວ';
        } else {
            $this->reset();
            $this->subject_id         = $subject_id;
            $this->student_no         = $student_no;
            $this->class_id           = $class_id;
            $this->semester           = $semester;
            $this->year               = $year;
            $this->score              = $score;
            $this->created_by_user_id = $f3->get('LOGON_USER_ID');
            $this->created_at         = date('Y-m-d H:i:s');
            $this->save();
            $message = 'ເພີ່ມສຳເລັດແລ້ວ';
        }
        API::success(array('success' => true, 'message' => $message, 'score' => $score));
    }
}