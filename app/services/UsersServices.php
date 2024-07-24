<?php
class UsersServices extends BaseServiceReadBean
{
    private $f3,$data,$Svr,$tbl;
    public $db;

    function __construct($db)
	{
		$this->f3 = Base::instance();
        $this->db = $db;
		$this->tbl = "tbluser";
		parent::__construct($db,$this->tbl);
	}

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id               = $this->f3->get('POST.id');
            $profile_avatar   = $this->f3->get('POST.profile_avatar');
            $first_name       = $this->f3->get('POST.first_name');
            $last_name        = $this->f3->get('POST.last_name');
            $gender           = $this->f3->get('POST.gender');
            $dob              = $this->f3->get('POST.dob');
            $province_id      = $this->f3->get('POST.province_id');
            $district         = $this->f3->get('POST.district');
            $village          = $this->f3->get('POST.village');
            $phone            = $this->f3->get('POST.phone');
            $class            = $this->f3->get('POST.class');
            $role             = $this->f3->get('POST.role');
            $password         = $this->f3->get('POST.password');
            $confirm_password = $this->f3->get('POST.confirm_password');
            $email            = $this->f3->get('POST.email');

            if ($password == $confirm_password) {
                $this->profile_avatar = $profile_avatar;
                $this->first_name     = $first_name;
                $this->last_name      = $last_name;
                $this->gender         = $gender;
                $this->dob            = $dob;
                $this->province_id    = $province_id;
                $this->district       = $district;
                $this->village        = $village;
                $this->phone          = $phone;
                $this->class          = $class;
                $this->password       = PasswordHash::hashing($password);
                $this->email          = $email;
                $this->role           = $role;
                $this->created_at     = time();
                $this->active         = 1;
                $this->login_date     = time();
                $this->save();

                $this->data = ['success'=> true, 'message'=> '"'.$first_name.'" ບັນທຶກສຳເລັດ'];
            } else {
                $this->data = ['success'=> false, 'message'=> 'ຢືນຢັນລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ'];
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
           $data = $this->f3->get('BODY');
           parse_str($data,$up_row);
           $id               = $up_row['id'];
           $profile_avatar   = $up_row['profile_avatar'];
           $first_name       = $up_row['first_name'];
           $last_name        = $up_row['last_name'];
           $dob              = $up_row['dob'];
           $gender           = $up_row['gender'];
           $village          = $up_row['village'];
           $district         = $up_row['district'];
           $province_id      = $up_row['province_id'];
           $phone            = $up_row['phone'];
           $class            = $up_row['class'];
           $role             = $up_row['role'];
           $password         = $up_row['password'];
           $confirm_password = $up_row['confirm_password'];
           $email            = $up_row['email'];

           if ($password == $confirm_password) {
            $this->Svr                 = $this->load(['id = ?',$id]);
            $this->Svr->profile_avatar = $profile_avatar;
            $this->Svr->first_name     = $first_name;
            $this->Svr->last_name      = $last_name;
            $this->Svr->dob            = $dob;
            $this->Svr->gender         = $gender;
            $this->Svr->village        = $village;
            $this->Svr->district       = $district;
            $this->Svr->province_id    = $province_id;
            $this->Svr->phone          = $phone;
            $this->Svr->class      = $class;
            $this->Svr->role           = $role;
            $this->Svr->password       = PasswordHash::hashing($password);
            $this->Svr->email          = $email;
            $this->Svr->role           = 'admin';
            $this->Svr->active         = 1;
            $this->Svr->login_date     = time();
            $this->Svr->created_at     = time();
            $this->Svr->update(); 

            $this->data = ['success'=>true,'message' => '"'.$first_name.'" ແກ້ໄຂສຳເລັດແລ້ວ'];
           }else{
               $this->data = ['success'=> false, 'message'=> 'ຢືນຢັນລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ'];
           }
           
        }
        
        API::success($this->data);
    }

    function getEmail($email)
    {
        return $this->load(array('email = ? AND active = ?', $email,1));
    }

    function getUser($user)
    {
        return $this->load(array('email = ? AND active = ?', $user,1));
    }

    function getUserID($id)
    {
        return $this->load(array(' id = ?', $id));
    }

    function LoginDateTime($id)
    {
        $this->load(array('id = ?', $id));
        $this->login_date = time();
        $this->update();
    }
    function doAccess()
    {
        $id = $this->f3->get('PARAMS.id');
        $active = $this->f3->get('PARAMS.active') == 1 ? 0 : 1;
        $this->load(['id = ?',$id]);
        $this->active = $active;
        $this->update();
        $this->data = ['success' => true, 'message' => 'ສຳເລັດ'];
        API::success($this->data);
    }
}