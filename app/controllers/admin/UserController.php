<?php
class UserController extends ActionController{
    public $db;
    function __construct(){
        $f3 = Base::instance();
        $this->db = DBConfig::config();
        $custom = new CustomFunctions();
        $help = new HelpFunctions();
        $sec = new CustomSecurity();
        $sec->security($this->db);
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('custom',$custom);
        $f3->set('help',$help);
        parent::__construct('UsersServices','backend/user.html', 'user', 'user', 'ຈັດການຂໍ້ມູນພະນັກງານ');
    }

    function uploadUser() {
        $f3 = Base::instance();
        $custom = new CustomFunctions();
        $path = "uploads/user/";
        $site_domain = $f3->get('SITE_DOMAIN');
        $upload = $custom->uploadFile($path);
        $data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($data);
    }
}