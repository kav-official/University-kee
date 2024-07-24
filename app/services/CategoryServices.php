<?php
class CategoryServices extends BaseServiceReadBean
{
    private $f3;
    private $data;
    private $Svr;
    public $tbl;
    private $custom;

    function __construct($db)
	{
		$this->f3 = Base::instance();
		$this->tbl = "tblcategory";
        $this->custom = new CustomFunctions();
		parent::__construct($db,$this->tbl);
	}

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id                     = $this->f3->get('POST.id');
            $department_id          = $this->f3->get('POST.department_id');
            $category_name          = $this->f3->get('POST.category_name');
            $this->department_id    = $department_id;
            $this->category_name    = $category_name;
            $this->friendly_url     = $this->custom->friendlyURL($category_name);
            $this->created_at   = time();
            $this->save();
            $this->data = ['success'=>true,'message' => '"'.$category_name.'" ເພີ່ມສຳເລັດແລ້ວ'];
        }
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
           $data            = $this->f3->get('BODY');
           parse_str($data,$up_row);
           $id              = $up_row['id'];
           $department_id   = $up_row['department_id'] ?? '';
           $category_name   = $up_row['category_name'];

           $this->load(['id = ?',$id]);
           $this->department_id    = $department_id;
           $this->category_name    = $category_name;
           $this->friendly_url     = $this->custom->friendlyURL($category_name);
           $this->created_at       = time();
           $this->update(); 

           $this->data = ['success'=>true,'message' => '"'.$category_name.'" ແກ້ໄຂສຳເລັດແລ້ວ'];
        }
        API::success($this->data);
    }
}