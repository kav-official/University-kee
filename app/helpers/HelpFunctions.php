<?php
class HelpFunctions{
    public $db;
    function __construct(){
        $this->db = DBConfig::config();
	}

    public function getData($tbl,$fields,$arr){
        return $this->db->exec( 'SELECT * FROM '.$tbl.' '.$fields, $arr );
    }
    
    public function customFunction($serviceName,$options = array()){
        $objectReflection = new ReflectionClass($serviceName);
        $Svr = $objectReflection->newInstanceArgs(array($this->db));
        return $Svr->find($options);
    }

    public function getFind($serviceName, $options) {
        $objectReflection = new ReflectionClass($serviceName);
        $Svr = $objectReflection->newInstanceArgs(array($this->db));
    	return $Svr->find($options);
    }

    public function getTitle($serviceName,$options,$callback) {
        $objectReflection = new ReflectionClass($serviceName);
        $Svr = $objectReflection->newInstanceArgs(array($this->db));
        $item = $Svr->load($options);
        if($item){
            return $item->$callback;
        }
        return 0;
    }

    public function getByOne($serviceName,$options) {
        $objectReflection = new ReflectionClass($serviceName);
        $Svr = $objectReflection->newInstanceArgs(array($this->db));
    	return $Svr->load($options);
    }

    public function getById($serviceName,$id) {
        $objectReflection = new ReflectionClass($serviceName);
        $Svr = $objectReflection->newInstanceArgs(array($this->db));
    	return $Svr->load(array('id = ?',$id));
    }

    public function getSumQty($serviceName,$options){
        $objectReflection = new ReflectionClass($serviceName);
		$Svr = $objectReflection->newInstanceArgs(array($this->db));
    	$items = $Svr->find($options);
        $total_qty = 0;
        foreach($items as $row) {
            $total_qty += $row['qty'];
        }
        return $total_qty;
    }

    public function getSQL($sql,$options=array()){
        return $this->db->exec($sql,$options);
    }

    public function diffBtwTimesAsPerType($start, $end){
        $seconds_diff = $end - $start;
        $check = $seconds_diff/3600;
        if($check >= 1){
            $hour = floor($seconds_diff/3600);
            if(filter_var($check, FILTER_VALIDATE_INT)){
                $hour .= "H";
            } else {
                $hour .= "H : ";
                $seconds = $seconds_diff - 3600;
                $hour .= floor($seconds/60);
                $hour .= "Minus";
            }
        } else {
            $hour = "0H : ";
            $hour .= floor($seconds_diff/60);
            $hour .= "Minus";
        }
        return $hour;
    }

    public function round_format($amount){
        if (is_float($amount)){
            return number($amount,2);
        }
        return $amount.'.00';
    }
}