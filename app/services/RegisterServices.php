<?php
class RegisterServices extends BaseServiceReadBean
{
    private $f3;
    private $data;
    private $Svr;
    public $tbl;
    private $custom;

    function __construct($db)
	{
		$this->f3 = Base::instance();
		$this->tbl = "tblregister";
        $this->custom = new CustomFunctions();
		parent::__construct($db,$this->tbl);
	}

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id          = $this->f3->get('POST.id');
            $semester    = $this->f3->get('POST.semester');
            // $student_no  = $this->f3->get('POST.student_no');
            $first_name  = $this->f3->get('POST.first_name');
            $last_name   = $this->f3->get('POST.last_name');
            $gender      = $this->f3->get('POST.gender');
            $dob         = $this->f3->get('POST.dob');
            $province_id = $this->f3->get('POST.province_id');
            $district_id = $this->f3->get('POST.district_id');
            $village     = $this->f3->get('POST.village');
            $phone       = $this->f3->get('POST.phone');
            $class       = $this->f3->get('POST.class');
            // $subject_id  = $this->f3->get('POST.subject_id');
            $region      = $this->f3->get('POST.region');
            $ethnicity   = $this->f3->get('POST.ethnicity');
            $semester    = $this->f3->get('POST.semester');

            $file_content = file_get_contents("uploads/student-no.txt");
            $split = explode(" ", $file_content);
            if(date('Y') > $split[1]) 
            {
                $handle = fopen('uploads/student-no.txt','w');
                fwrite($handle,"1 ".date('Y'));
                $student_no = "STD".substr(date('Y'),0) . '-1';
            } else {
                $handle = fopen('uploads/student-no.txt','w');
                fwrite($handle,($split[0]+1)." ".$split[1]);
                $student_no = "STD".substr($split[1],-2).$split[0];
            }

            $check = $this->load(['semester=? AND student_no=?',$semester,$student_no]);
            if($check){
                $this->data = ['success'=> false, 'message'=> 'ນັກສຶກສາຜູ້ນີ້ລົງທະບຽນແລ້ວ'];
            }else{
                $this->semester    = $semester;
                $this->student_no  = $student_no;
                $this->first_name  = $first_name;
                $this->last_name   = $last_name;
                $this->gender      = $gender;
                $this->dob         = $dob;
                $this->province_id = $province_id;
                $this->district_id = $district_id;
                $this->village     = $village;
                $this->phone       = $phone;
                $this->class       = $class;
                // $this->subject_id  = $subject_id;
                $this->region      = $region;
                $this->ethnicity   = $ethnicity;
                $this->year        = 1;
                $this->save();
                $this->data = ['success'=> true, 'message'=> '"'.$first_name.'" ບັນທຶກສຳເລັດ'];
            }
           
        }
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
           $data = $this->f3->get('BODY');
           parse_str($data,$up_row);
           $id          = $up_row['id'];
        //    $student_no  = $up_row['student_no'];
           $first_name  = $up_row['first_name'];
           $last_name   = $up_row['last_name'];
           $dob         = $up_row['dob'];
           $gender      = $up_row['gender'];
           $village     = $up_row['village'];
           $district_id = $up_row['district_id'];
           $province_id = $up_row['province_id'];
           $phone       = $up_row['phone'];
           $class       = $up_row['class'];
        //    $subject_id  = $up_row['subject_id'];
           $region      = $up_row['region'];
           $ethnicity   = $up_row['ethnicity'];
           $semester    = $up_row['semester'];

            $this->load(['id = ?',$id]);
            // $this->student_no  = $student_no;
            $this->first_name  = $first_name;
            $this->last_name   = $last_name;
            $this->dob         = $dob;
            $this->gender      = $gender;
            $this->village     = $village;
            $this->district_id = $district_id;
            $this->province_id = $province_id;
            $this->phone       = $phone;
            $this->class       = $class;
            // $this->subject_id  = $subject_id;
            $this->region      = $region;
            $this->ethnicity   = $ethnicity;
            $this->semester    = $semester;
            $this->update(); 

            $this->data = ['success'=>true,'message' => '"'.$first_name.'" ແກ້ໄຂສຳເລັດແລ້ວ'];
        
        }
        API::success($this->data);
    }
    function addOld(){
        $Svr  = new ScoreServices($this->db);
        $item = $this->load(['student_no=? ',$this->f3->get('PARAMS.student_no')]);
        $check = $Svr->load(['student_no=?',$item->student_no]);
        if($check){
            if($item->payment_status == 0){
                API::success(['success'=>false,'message' =>'ຍັງບໍ່ທັນໄດ້ຈ່າຍຄ່າເທີມ']);
            }else{
                if($check->score <= 35){
                    API::success(['success'=>false,'message' =>'ຄະແນນບໍຮອດຂາດໝ່າຍທີຈະເລື່ອນຊັ້ນ']);
                }else{
                    $this->year           = $item->year+1;
                    $this->payment_status = 0;
                    $this->update(); 
                    API::success(['success'=>true,'message' =>'ທ່ານໄດ້ເລື່ອນຫ້ອງສຳເລັດແລ້ວ']);
                }
            }
        }else{
            API::success(['success'=>false,'message' =>'ຍັງບໍ່ມີຄະແນນ']);
        }
    }
    function oldstudentData(){
        $Svr   = new RegisterServices($this->db);
        $check = $Svr->load(['student_no=?',$this->f3->get('PARAMS.student_no')]);
        if($check){
            $item = $Svr->getByOne(['student_no=?',$this->f3->get('PARAMS.student_no')]);
            $this->data = ['success'=>true,'first' =>$item->first_name,'last' =>$item->last_name,'dob' =>$item->dob,'year' =>$item->year];
        }else{
            $this->data = ['success'=>false,'message' =>'ບໍໍພົບລະຫັດນີ້'];
        }
        API::success($this->data);
    }
}