<?php
use \Mpdf\Mpdf;
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
        // $this->ordSvr = new OrderServices($this->db);
        // $this->disSvr = new DistrictServices($this->db);
    }
    // function score()
    // {
    //     // $arrProv = $this->custom->province();
    //     // $disItems = $this->disSvr->getFind([1]);
    //     // $arrDis = [];
    //     // foreach ($disItems as $value) {
    //     //    $arrDis[$value["id"]] = $value["district_name"];
    //     // }

    //     // $status = $this->f3->get('GET.status');
    //     // if($status != null)
    //     // {
    //     //     $items = $this->ordSvr->getFind(['status = ?',$status-1]);
    //     // } else {
    //     //     $items = $this->ordSvr->getFind([1]);
    //     // }
    //     $items = $this->db->exec("SELECT tblregister.*,tblscore.score FROM tblregister INNER JOIN tblscore ON(tblregister.student_no=tblscore.student_no)");
    //     $fp = fopen('php://output', 'w');
    //     $header = array("Student NO","Full Name","Gender","Score");
    //     fputcsv($fp, $header);
    //     foreach ($items as $row)
    //     {
    //         $arr = array(
    //             $row['student_no'],
    //             $row['first_name'].' '.$row['last_name'],
    //             $arrProv[$row['gender']],
    //             $row['score']);
    //         fputcsv($fp, $arr);
    //     }
    //     $filename = "Order-" . date("YmdHis") . ".csv";
    //     // header('Content-type: application/csv');

    //     header('Content-Encoding: UTF-8');
    //     header('Content-type: text/csv; charset=UTF-8');
    //     header('Content-Disposition: attachment; filename=' . $filename);
    //     exit();
    // }
    function score(){
        $mpdf = new \Mpdf\Mpdf([ 
            'mode' => 'utf-8',
            'format' => 'A4',
            'use_unicode' => true,
            'default_font' => 'phetsarath OT']);

        $items = $this->db->exec("SELECT tblregister.*,tblscore.score FROM tblregister INNER JOIN tblscore ON(tblregister.student_no=tblscore.student_no)");
        $html = '<div style="text-align:center;"><h2>ລາຍງານຂໍ້ມູນຜູ້ໃຊ້ນ້ຳ</h2></div>';    
        $html .= '<table>
                    <thead>
                    <tr>
                      <th>ລະຫັດກົງເຕີ</th>
                      <th>ຊື່ຜູ້ໃຊ້ນ້ຳ</th>
                      <th>ເລກທີບັດປະຈຳຕົວ/ສຳມະໂນຄົວ</th>
                      <th>ເລກທີເຮືອນ</th>
                    </tr>
                  </thead>
                  <tbody>
            ';

            foreach ($items as $row) {
                $html .= '
                <tr>
                      <td>'.$row['student_no'].'</td>
                      <td>'.$row['first_name'].'</td>
                      <td>'.$row['gender'].'</td>
                      <td>'.$row['score'].'</td>
                </tr>  
                ';
            }
            $html .= '
                  </tbody>
                </table>';

        $mpdf->WriteHTML($html);
        $mpdf->Output('example.pdf', 'D');
    }
}