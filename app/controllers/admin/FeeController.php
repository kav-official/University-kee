<?php
class FeeController extends ActionController {
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
        $this->f3->set('custom',$this->custom);
	    parent::__construct('FeeServices', 'backend/fee.html', 'fee', 'fee', 'ຈັດການຂໍ້ມູນຄ່າທຳນຽມ');
    }
}