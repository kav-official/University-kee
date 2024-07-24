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
            $student_no  = $this->f3->get('POST.student_no');
            $first_name  = $this->f3->get('POST.first_name');
            $last_name   = $this->f3->get('POST.last_name');
            $gender      = $this->f3->get('POST.gender');
            $dob         = $this->f3->get('POST.dob');
            $province_id = $this->f3->get('POST.province_id');
            $district    = $this->f3->get('POST.district');
            $village     = $this->f3->get('POST.village');
            $phone       = $this->f3->get('POST.phone');
            $class       = $this->f3->get('POST.class');
            $region      = $this->f3->get('POST.region');
            $ethnicity   = $this->f3->get('POST.ethnicity');
            $semester    = $this->f3->get('POST.semester');

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
                $this->district    = $district;
                $this->village     = $village;
                $this->phone       = $phone;
                $this->class       = $class;
                $this->region      = $region;
                $this->ethnicity   = $ethnicity;
                $this->year        = 1;
                $this->semester    = $semester;
                $this->save();
                $this->data = ['success'=> true, 'message'=> '"'.$first_name.'" ບັນທຶກສຳເລັດ'];
            }
           
        }
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
           $data = $this->f3->get('BODY');
           parse_str($data,$up_row);
           $id          = $up_row['id'];
           $student_no  = $up_row['student_no'];
           $first_name  = $up_row['first_name'];
           $last_name   = $up_row['last_name'];
           $dob         = $up_row['dob'];
           $gender      = $up_row['gender'];
           $village     = $up_row['village'];
           $district    = $up_row['district'];
           $province_id = $up_row['province_id'];
           $phone       = $up_row['phone'];
           $class       = $up_row['class'];
           $region      = $up_row['region'];
           $ethnicity   = $up_row['ethnicity'];
           $semester    = $up_row['semester'];

            $this->Svr              = $this->load(['id = ?',$id]);
            $this->Svr->student_no  = $student_no;
            $this->Svr->first_name  = $first_name;
            $this->Svr->last_name   = $last_name;
            $this->Svr->dob         = $dob;
            $this->Svr->gender      = $gender;
            $this->Svr->village     = $village;
            $this->Svr->district    = $district;
            $this->Svr->province_id = $province_id;
            $this->Svr->phone       = $phone;
            $this->Svr->class       = $class;
            $this->Svr->region      = $region;
            $this->Svr->ethnicity   = $ethnicity;
            $this->Svr->semester    = $semester;
            $this->Svr->update(); 

            $this->data = ['success'=>true,'message' => '"'.$first_name.'" ແກ້ໄຂສຳເລັດແລ້ວ'];
        
        }
        API::success($this->data);
    }

    function getClassFee(){
        $Svr = new FeeServices($this->db);
        $fee = $Svr->getByOne(['class=?',$this->f3->get('PARAMS.class')]);
        $this->data = ['success'=>true,'data' =>$fee->price];
        API::success($this->data);
    }
}