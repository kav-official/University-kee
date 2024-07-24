<?php
class ExportController
{
    private $f3,$secur,$custom,$ordSvr,$disSvr;
    public $db;
    function __construct(){
        $this->f3 = Base::instance();
        $this->db = DBConfig::config();
        $this->secur = new CustomSecurity();
        $this->custom = new CustomFunctions();
        $this->secur->security($this->db);
        $this->ordSvr = new OrderServices($this->db);
        $this->disSvr = new DistrictServices($this->db);
    }
    function ordExport()
    {
        $arrProv = $this->custom->province();
        $disItems = $this->disSvr->getFind([1]);
        $arrDis = [];
        foreach ($disItems as $value) {
           $arrDis[$value["id"]] = $value["district_name"];
        }

        $status = $this->f3->get('GET.status');
        if($status != null)
        {
            $items = $this->ordSvr->getFind(['status = ?',$status-1]);
        } else {
            $items = $this->ordSvr->getFind([1]);
        }

        $fp = fopen('php://output', 'w');
        $header = array("Bill NO","Date Order","First Name","Last Name","Province","District","Phone","Total Amount");
        fputcsv($fp, $header);
        foreach ($items as $row)
        {
            $arr = array(
                $row['bill_no'],
                date('j M Y', $row["created_at"]),
                $row['first_name'],
                $row['last_name'],
                $arrProv[$row['province_id']],
                $arrDis[$row['district_id']],
                $row['phone'],
                $row['total_base_amount']);
            fputcsv($fp, $arr);
        }
        $filename = "Order-" . date("YmdHis") . ".csv";
        // header('Content-type: application/csv');

        header('Content-Encoding: UTF-8');
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename=' . $filename);
        exit();
    }
}