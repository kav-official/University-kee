<?php
class UserListController extends BaseController{
    public $db;
    function __construct(){
        $f3 = Base::instance();
        $this->db = DBConfig::config();
        $custom = new CustomFunctions();
        $sec = new CustomSecurity();
        $help = new HelpFunctions();
        $sec->security($this->db);
        
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrClass',$custom->classes());
        $f3->set('arrSubject',$custom->subject());
        $f3->set('custom',$custom);
        $f3->set('help',$help);
	    parent::__construct('UsersServices','backend/user-list.html', 'user', 'user-list', 'ຈັດການຂໍ້ມູນພະນັກງານ', '', '', $f3->get('ITEM_PER_PAGE'));
    }
}