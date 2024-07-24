<?php
class FeeServices extends BaseServiceReadBean
{
    private $f3;
    private $data;
    private $Svr;
    public $tbl;
    private $custom;

    function __construct($db)
	{
		$this->f3 = Base::instance();
		$this->tbl = "tblfee";
        $this->custom = new CustomFunctions();
		parent::__construct($db,$this->tbl);
	}

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id          = $this->f3->get('POST.id');
            $class       = $this->f3->get('POST.class');
            $price       = $this->f3->get('POST.price');
            $this->class = $class;
            $this->price = $price;
            $this->save();
            $this->data = ['success'=>true,'message' =>'ເພີ່ມສຳເລັດແລ້ວ'];
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
           $data            = $this->f3->get('BODY');
           parse_str($data,$up_row);
           $id    = $up_row['id'];
           $class = $up_row['class'] ?? '';
           $price = $up_row['price'];

           $this->load(['id = ?',$id]);
           $this->class = $class;
           $this->price = $price;
           $this->update(); 

           $this->data = ['success'=>true,'message' => 'ແກ້ໄຂສຳເລັດແລ້ວ'];
        }
        API::success($this->data);
    }
}