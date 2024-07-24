<?php
class UserListController extends BaseController
{
    private $f3;
    private $sec;
    private $help;
    private $custom;
    function __construct()
    {
        $f3 = Base::instance();
        $this->f3 = $f3;
        $this->db = DBConfig::config();
        $this->custom = new CustomFunctions();
        $this->sec = new CustomSecurity();
        $this->help = new HelpFunctions();
        $this->sec->security($this->db);
        $this->f3->set('arrProvince',$this->custom->province());
        $this->f3->set('arrClass',$this->custom->arrClass());
        $this->f3->set('custom',$this->custom);
	    parent::__construct('UsersServices','backend/user-list.html', 'user', 'user-list', 'ຈັດການຂໍ້ມູນພະນັກງານ', '', '', $this->f3->get('ITEM_PER_PAGE'));
    }
}