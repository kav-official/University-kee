<?php
class ClassController{
    public $db;
    function __construct(){
        $this->db = DBConfig::config();
        $secur = new CustomSecurity();
        $secur->security($this->db);
    }
    function index(){
        $f3     = Base::instance();
        $tmp    = new Template;
        $custom = new CustomFunctions();
        $help   = new HelpFunctions();
        $Svr    = new UsersServices($this->db);
        $disSvr = new DistrictServices($this->db);

        $employee = $Svr->getByOne(['id=?',$f3->get('LOGON_USER_ID')]);
        $items    = $this->db->exec("SELECT tblregister.* FROM tblregister INNER JOIN tbluser ON (tbluser.class=tblregister.class) WHERE tblregister.semester = ? ORDER BY student_no",array($custom->semester()));
        
        $disSvr = new DistrictServices($this->db);
        $arrDis=[];
        $disItems = $disSvr->getAll([],[]);
        foreach ($disItems as $value) {
            $arrDis[$value['id']] = $value['district_name'];
        }

        $f3->set('items',$items);
        $f3->set('employee',$employee);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('arrDis',$arrDis);
        $f3->set('nav','class');
        $f3->set('subnav','class');
        $f3->set('strAction', 'ຫ້ອງຮຽນນັກສຶກສາ');
        $f3->set('strPage', 'ຫ້ອງຮຽນ');
        echo $tmp->render("backend/class.html");
    }

    function detail(){
        $f3     = Base::instance();
        $tmp    = new Template;
        $custom = new CustomFunctions();
        $help   = new HelpFunctions();
        $Svr    = new UsersServices($this->db);
        $disSvr = new DistrictServices($this->db);
        $class  = $f3->get('PARAMS.class');

        $employee = $Svr->getByOne(['class=?',$class]);
        $items    = $this->db->exec("SELECT tblregister.* FROM tblregister WHERE tblregister.semester = ? AND class = ? ORDER BY student_no",array($custom->semester(),$class));
        
        $disSvr = new DistrictServices($this->db);
        $arrDis=[];
        $disItems = $disSvr->getAll([],[]);
        foreach ($disItems as $value) {
            $arrDis[$value['id']] = $value['district_name'];
        }

        $f3->set('items',$items);
        $f3->set('employee',$employee);
        $f3->set('help',$help);
        $f3->set('custom',$custom);
        $f3->set('entrycount',count($items));
        $f3->set('arrProvince',$custom->province());
        $f3->set('arrClass',$custom->arrClass());
        $f3->set('class',$class);
        $f3->set('arrDis',$arrDis);
        $f3->set('nav','class');
        $f3->set('subnav','class');
        $f3->set('strAction', 'ຫ້ອງຮຽນ');
        $f3->set('strPage', 'ຫ້ອງຮຽນ');
        echo $tmp->render("backend/class-detail.html");
    }
}