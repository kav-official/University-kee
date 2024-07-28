<?php
class FeeListController extends BaseController
{
    private $f3;
    private $secur;
    private $custom;
    public $db;
    function __construct(){
        $this->f3 = Base::instance();
        $this->db = DBConfig::config();
        $this->secur = new CustomSecurity();
        $this->secur->security($this->db);
        $this->custom = new CustomFunctions();
        $this->f3->set('arrClass',$this->custom->classes());
	    parent::__construct('FeeServices', 'backend/fee-list.html', 'fee', 'fee-list', 'ຈັດການຂໍ້ມູນຄ່າທຳນຽມ','','',$this->f3->get('ITEM_PER_PAGE'));
    }
}