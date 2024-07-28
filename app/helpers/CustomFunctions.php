<?php
class CustomFunctions{
  function process_promotion($grade){
    if($grade == '-'){
      return $grade;
    }
    $arr = array('A', 'B+', 'B', 'C+', 'C', 'D+', 'D');
    if(in_array($grade,$arr)){
      return "ຜ່ານ";
    }
    return "ບໍ່ຜ່ານ";
  }
    function calculate_grade($score){
    if($score == null){
      return '-';
    }
    $grade = array(
      'A' => '95-100',
      'B+' => '90-94',
      'B' => '80-89',
      'C+' => '71-79',
      'C' => '60-70',
      'D+' => '50-59',
      'D' => '40-49',
      'F' => '0-39'
    );
    foreach($grade as $key => $value){
      $arr = explode("-",$value);
      $A = (int)$arr[0];
      $B = (int)$arr[1];
      if($A <= $score && $score <= $B){
        return $key;
      }
    }
    return "-";
  }
  function gender($gender){
    $arr = array(
      'M' => 'ຊາຍ',
      'F' => 'ຍິງ'
    );
    return $arr[$gender] ?? '-';
  }
  function subject(){
    $arr = array(
      1  => 'ພາສາອັງກິດທົ່ວໄປ',
      2  => 'ພາສາອັງກິດທົ່ວໄປ 2',
      3  => 'ພາສາອັງກິດທຸລະກິດ',
      4  => 'ການອອກສຽງ',
      5  => 'ການອ່ານ',
      6  => 'ການອ່ານ ແລະ ຟັງ',
      7  => 'ການຂຽນ',
      8  => 'ໄວຍະກອນ',
      9  => 'ການສື່ສານ',
      10 => 'ການພັດທະນາ',
      11 => 'ຄອມພິວເຕີ',
      12 => 'ການແປ',
      13 => 'ການດູແລລູກຄ້າ',
      14 => 'ການໂຮງແຮມທ່ອງຖ່ຽວ',
      15 => 'ການຕະຫຼາດ',
      16 => 'ຊັນພະຍາກອນມະນຸດ',
      17 => 'ການບັນຊີ',
      );
    return $arr;
  }
  function paymentStatus(){
    $arr = array(
      0 => 'ຍັງບໍ່ຈ່າຍ',
      1 => 'ຈ່າຍເຄີ່ງໜື່ງ',
      2 =>'ຈ່າຍແລ້ວ'
    );
    return $arr;
  }
  function paymentStatusBtn(){
    $arr = array(
      0 => 'btn-danger',
      1 => 'btn-warning',
      2 =>'btn-success'
    );
    return $arr;
  }
  function semester(){
    $semester = date('Y').'-'.((int)date('Y')+1);
    return $semester;
  }
  function payment_type(){
    $arr = array('prepaid' => 'ຈ່າຍລ່ວງໜ້າ/ມັດຈຳ', 'pay-cash' => 'ຈ່າຍສົດ', 'transfer' => 'ໂອນ', 'owe' => 'ຄ້າງຊຳລະ');
    return $arr;
  }

  function getStatus(){
    $arr = array(1 => 'ສຳລັບທົ່ວໄປ', 2 => 'ສຳລັບສະມາຊິກ', 3 => 'ສຳລັບພ/ງບໍ່ສັງກັດໃນບໍລິສັດ', 4 => 'ສຳລັບພ/ງສັງກັດໃນບໍລິສັດ');
    return $arr;
  }
  function arrRole(){
    $arr = array(1 => 'ບໍລິສັດ', 2 => 'ສັງກັດໃນບໍລິສັດ', 3 => 'ບໍ່ສັງກັດໃນບໍລິສັດ	');
    return $arr;
  }
  function arrClass(){
    $arr = array(
      1  => "EN1/1",
      2  => "EN1/2",
      3  => "EN2/1",
      4  => "EN2/2",
      5  => "EN3/1",
      6  => "EN3/2",
    );
    return $arr;
  }
  function year(){
    $arr = array(
      1  => "ປີ 1",
      2  => "ປີ 2",
      3  => "ປີ 3",
      4  => "ປີ 4"
    );
    return $arr;
  }
  function province(){
    $arr = array(
      1  => "ກຳແພງນະຄອນ",
      2  => "ຜົ້ງສາລີ",
      3  => "ຫຼວງນ້ຳທາ",
      4  => "ບໍ່ແກ້ວ",
      5  => "ອຸດົມໄຊ",
      6  => "ຫົວພັນ",
      7  => "ຫຼວງພະບາງ",
      8  => "ໄຊຍະບູລີ",
      9  => "ຊຽງຂວາງ",
      10 => "ວຽງຈັນ",
      11 => "ໄຊສົມບູນ",
      12 => "ບໍລິຄຳໄຊ",
      13 => "ຄຳມ່ວນ",
      14 => "ສະຫວັນນະເຂດ",
      15 => "ສາລະວັນ",
      16 => "ເຊກອງ",
      17 => "ຈຳປາສັກ",
      18 => "ອັດຕະປື"
    );
    return $arr;
  }
  function getDept(){
    $arr = array(
      1   => 'Fresh Meat',
      2   => 'Vegetables',
      3   => 'Fruit & Nut Gifts',
      4   => 'Fresh Berries',
      5   => 'Ocean Foods',
      6   => 'Butter & Eggs',
      7   => 'Fastfood',
      8   => 'Fresh Onion',
      9   => 'Papayaya & Crisps',
      10  => 'Oatmeal',
      11  => 'Fresh Bananas'
    );
    return $arr;
  }
  function getCateg()
  {
    $arr = array(
      1   => 'ຊີ້ິນ',
      2   => 'ຜັກ',
      3   => 'ໝາກໄມ້',
      4   => 'ເຄື່ອງດື່ມ',
      5   => 'ອາຫານແຫ້ງ'
    );
    return $arr;
  }

  function lineApp($sToken,$sMessage)
  {
    $chOne = curl_init(); 
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $chOne, CURLOPT_POST, 1); 
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
    curl_exec( $chOne ); 
    // $result = curl_exec( $chOne ); 

    //Result error 
    // if(curl_error($chOne)) 
    // { 
    //   echo 'error:' . curl_error($chOne); 
    // } 
    // else { 
    //   $result_ = json_decode($result, true); 
    //   echo "status : ".$result_['status']; echo "message : ". $result_['message'];
    // } 
    curl_close( $chOne );
    return true;
  }

  function uploadFile($path)
  {
    $f3 = Base::instance();
    $f3->set('UPLOADS',$path); // don't forget to set an Upload directory, and make it writable!
    $web = Web::instance();
    $overwrite = true; // set to true, to overwrite an existing file; Default: false
    $slug = true; // rename file to filesystem-friendly version
    $files = $web->receive(function($file,$formFieldName){
        $arrAceptFile = array('jpeg','jpg','png','gif','docx','doc','xlsx','xls','pdf','mp4');
        $arrFileName = explode("/",$file['type']);
        $file_name = strtolower($arrFileName[1]);
        if(in_array($file_name,$arrAceptFile)) {
          return true;
        } else {
          return false;
        }
      },
        $overwrite,
        function($fileBaseName, $formFieldName){
          $arrName = explode(".",$fileBaseName);
          return substr(sha1(mt_rand().time()), 0, 17).'.'.end($arrName);
        }
    );
    return $files;
  }

  function removeFile($file)
  {
    $f3 = Base::instance();
    if($file != '')
    {
      $file_path = str_replace($f3->get('SITE_DOMAIN'),'',$file);
      if (file_exists(getcwd().'/'.$file_path))
      {
        unlink(getcwd().'/'.$file_path);
      }
    }
    return true;
  }

  function UR_exists($url)
  {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode == 200 ? true : false;
  }

  function checkaccess($role,$access)
  {
    $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
    $domainLink=$protocol.'://'.$_SERVER['HTTP_HOST'];
    if (!in_array($role, $access)) {
      header("location: ".$domainLink."/home?error=You do not have sufficient rights to access this.");
    }
  }

  public function getProvince() {
    $arr = [
      1  => 'ກຳແພງນະຄອນ',
      2  => 'ຜົ້ງສາລີ',
      3  => 'ຫຼວງນ້ຳທາ',
      4  => 'ບໍ່ແກ້ວ',
      5  => 'ອຸດົມໄຊ',
      6  => 'ຊຳເໜືອ',
      7  => 'ຫຼວງພະບາງ',
      8  => 'ໄຊຍະບູລີ',
      9  => 'ຊຽງຂວາງ',
      10 => 'ວຽງຈັນ',
      11 => 'ໄຊສົມບູນ',
      12 => 'ບໍລິຄຳໄຊ',
      13 => 'ຄຳມ່ວນ',
      14 => 'ສະຫວັນນະເຂດ',
      15 => 'ສາລະວັນ',
      16 => 'ເຊກອງ',
      17 => 'ຈຳປາສັກ',
      18 => 'ອັດຕະປື'
    ];
    return $arr;
  }

  public function get_real_ip() {
      $ip = false;
      if(!empty($_SERVER['HTTP_CLIENT_IP']))
      {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
      }
      if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
      {
            $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if($ip)
            {
                array_unshift($ips, $ip);
                $ip = false;
            }
            for($i = 0; $i < count($ips); $i++)
            {
                if(!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i]))
                {
                      if(version_compare(phpversion(), "5.0.0", ">="))
                      {
                          if(ip2long($ips[$i]) != false)
                          {
                                $ip = $ips[$i];
                                break;
                          }
                      }
                      else
                      {
                          if(ip2long($ips[$i]) != - 1)
                          {
                                $ip = $ips[$i];
                                break;
                          }
                      }
                }
            }
      }
      return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
  }

  public  function post_captcha($user_response) {
    $f3 = Base::instance();
    $fields_string = '';
    $fields = array(
        'secret' => $f3->get('RECAPTCHA_SECRET'),
        'response' => $user_response,
        'remoteip' => $this->get_real_ip()
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
  } 

  public function renderArraySelect($arrayObj, $selectedItem)
  {
    foreach (array_keys($arrayObj) as $fields)
    {

      if (is_array($selectedItem) && $selectedItem != 0) {

        if (in_array($fields, $selectedItem))
        {
          print "<option selected value=\"".$fields."\">".$arrayObj[$fields]."</option>";
        }
        else
        {
          print "<option value=\"".$fields."\">".$arrayObj[$fields]."</option>";
        }
      }
      else
      {

        if ($selectedItem == $fields)
        {
          print "<option selected value=\"".$fields."\">".$arrayObj[$fields]."</option>";
        }
        else
        {
          print "<option value=\"".$fields."\">".$arrayObj[$fields]."</option>";
        }
      }

    }
  }

  function renderArrayValue($arrayObj, $selectedItem)
  {
    foreach ($arrayObj as $fields => $val)
    {
      if ($selectedItem == $fields)
      {
        print "<option selected value=\"".$fields."\">".$val."</option>";
      }
      else
      {
        print "<option value=\"".$fields."\">".$val."</option>";
      }
    }
  }

  function truncate($text, $limit = 25, $ending = '...')
  {
    $text = strip_tags($text);
    if (strlen($text) > $limit) {
      $text = substr($text, 0, $limit);
      $text = substr($text, 0, -(strlen(strrchr($text, ' '))));
      $text = $text . $ending;
    }
    return $text;
  }

  function friendlyURL($string)
	{
		$string = preg_replace("`\[.*\]`U", "", $string);
		$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
		$string = preg_replace(array("`[^a-z0-9]`i", "`[-]+`"), "-", $string);
		return strtolower(trim($string, '-'));
	}

  function image_exists($url)
	{
    if(!empty($url))
    {
      if (@getimagesize($url))
      {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
	}
}