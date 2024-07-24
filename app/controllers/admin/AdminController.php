<?php
class AdminController
{
    private $f3;
    private $tmp;
    private $sec;
    private $help;
    private $custom;
    private $Svr;
    public $db;
    function __construct()
    {
        $this->f3 = Base::instance();
        $this->tmp = new Template;
        $this->db = DBConfig::config();
        $this->sec = new CustomSecurity();
        $this->sec->security($this->db);
        $this->help = new HelpFunctions();
        $this->custom = new CustomFunctions();
    }
    public function index(){
        $this->f3->set('custom', $this->custom);
        $this->f3->set('SITE_DOMAIN', $this->f3->get('SITE_DOMAIN'));
        $this->f3->set('nav', 'home');
        $this->f3->set('subnav', 'home');
        $this->f3->set('strAction', 'ໜ້າຫຼັກ');
        $this->f3->set('strPage', 'ໜ້າຫຼັກ');
        echo($this->tmp->render('backend/index.html'));
    }
}