<?php
class LoginController
{
    private $usersSvr;
    private $accessSvr;
	private $f3;
	private $data;
    public $db;

    function __construct()
    {
    	$this->db = DBConfig::config();
        $this->usersSvr = new UsersServices($this->db);
        $this->accessSvr = new AccessServices($this->db);  
    }

    public function login()
    {
        $this->f3 = Base::instance();   
        $classObject = new CustomFunctions();
        $apiObject = new API();
            $txtUserName = $this->f3->get('POST.email');
            $txtPassword = $this->f3->get('POST.password');     
            $results = $this->usersSvr->getUser($txtUserName);
            if($results)
            {
                $id = $results->id;
                $password = $results->password;
                $role = $results->role;
                if($password == crypt($txtPassword, $password))
                {
                    $this->f3->set('COOKIE.user_id', $id);
                    $this->f3->set('COOKIE.key', md5($id.$this->f3->get('HASH_SECRET')), 0, "/");
                    $this->usersSvr->LoginDateTime($id);
                    $this->accessSvr->add($id,$role,1);
                    $this->data = ['success'=> true,'message'=> 'Login success!',];   

                } else {
                    $this->accessSvr->add($id,$role,0); 
                    $this->data = ['success'=> false, 'message'=> 'ຊື່ຜູ້ໃຊ້/ລະຫັດຜ່ານ ບໍ່ຖືກຕ້ອງ!'];
                }
            } else {
                $this->data = ['success'=> false, 'message'=> 'ຊື່ຜູ້ໃຊ້/ລະຫັດຜ່ານ ບໍ່ຖືກຕ້ອງ!'];
            }
        $apiObject->success($this->data);
    }
}