<?php
class RegisterOldController extends ActionController {
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
        $this->f3->set('arrProvince',$this->custom->province());
        $this->f3->set('arrClass',$this->custom->arrClass());
        $this->f3->set('custom',$this->custom);
	    parent::__construct('RegisterServices', 'backend/register-old.html', 'register-old', 'register-old', 'ລົງທະບຽນນັກສຶກສາເກົ່າ');
    }
}