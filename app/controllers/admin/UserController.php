<?php
class UserController extends ActionController
{
    private $f3;
    private $codeSvr;
    private $userInfo;
    private $bank;
    private $user;
    private $custom;
    private $sec;
    public $db;
    function __construct()
    {
        $this->f3 = Base::instance();
        $this->db = DBConfig::config();
        $this->custom = new CustomFunctions();
        $this->sec = new CustomSecurity();
        $this->sec->security($this->db);
        $this->f3->set('arrProvince',$this->custom->province());
        $this->f3->set('arrClass',$this->custom->arrClass());
        $this->f3->set('custom',$this->custom);
        parent::__construct('UsersServices','backend/user.html', 'user', 'user', 'ຈັດການຂໍ້ມູນພະນັກງານ');
    }

    function uploadUser()
    {
        $path = "uploads/user/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }
}