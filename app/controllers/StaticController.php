<?php
class StaticController{
  public $db;
  function __construct(){
    $this->db = DBConfig::config();
    $secur = new CustomSecurity();
    $secur->fSecurity($this->db);
  }
  public function index(){
    $f3 = Base::instance();
    $tmp = new Template;
    $custom = new CustomFunctions();
    if (file_exists(getcwd()."/ui/frontend/".$f3->get('PARAMS.page').".html")){
      $f3->set('nav', str_replace('-', ' ', $f3->get('PARAMS.page')));
      $f3->set('subnav', str_replace('-', ' ', $f3->get('PARAMS.page')));
      $f3->set('custom',$custom);
      echo($tmp->render("frontend/".$f3->get('PARAMS.page').".html"));
    } else {
      $f3->reroute('/404');
    }
  }
}