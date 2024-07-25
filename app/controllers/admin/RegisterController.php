<?php
class RegisterController extends ActionController {
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
        $this->help = new HelpFunctions();
       
        $this->f3->set('arrProvince',$this->custom->province());
        $this->f3->set('arrClass',$this->custom->arrClass());
        $this->f3->set('semester',$this->custom->semester());
        $this->f3->set('custom',$this->custom);
	    parent::__construct('RegisterServices', 'backend/register.html', 'register', 'register', 'ລົງທະບຽນນັກສຶກສາໃໝ່');
    }

    function getDistrict()
    {
        $province_id = $this->f3->get('PARAMS.province');
        $items       = $this->help->getFind('DistrictServices',array(' province_id = ? ',$province_id));
        $arr         = array();
        foreach($items as $row)
        {
            $arr[] = array('id' => $row['id'], 'province_id' => $row['province_id'], 'district_name' => $row['district_name']);
        }
        $this->data = array('success' => true, 'data' => $arr);
        API::success($this->data);
    }
}