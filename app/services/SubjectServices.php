<?php
class SubjectServices extends BaseServiceReadBean{
    public $db;
    function __construct($db){
        $this->db = $db;
		parent::__construct($db,"tblsubject");
	}
}