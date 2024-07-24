<?php
class ActionController
{
    private $f3;
    private $tmp;
    private $custom;
    private $Svr;
    public $serviceName, $fileName, $nav, $subnav, $strAction;
    function __construct($serviceName,$fileName,$nav,$subnav,$strAction)
    {
        $this->f3         = Base::instance();
        $this->tmp        = new Template;
        $this->custom     = new CustomFunctions();
        $objectReflection = new ReflectionClass($serviceName);
        $this->Svr        = $objectReflection->newInstanceArgs(array($this->db));
        $this->nav        = $nav;
        $this->fileName   = $fileName;
        $this->subnav     = $subnav;
        $this->strAction  = $strAction;
	    
    }

    public function edit()
    {
        $id = $this->f3->get('PARAMS.id');
        if ($id == null)
        {
        	$this->f3->set('strAction',"ເພີ່ມ ".$this->strAction);
        	$this->f3->set('method', 'POST');
        } else {
    	   $this->f3->set('strAction',"ແກ້ໄຂ ".$this->strAction);
    	   $this->f3->set('method', 'PUT');
        }

        $this->f3->set('nav', $this->nav);
        $this->f3->set('subnav', $this->subnav);
		$this->f3->set('strPage', $this->strAction);
        $this->f3->set('id', $id);
        $this->f3->set('item',$this->Svr->getById($id));
        echo($this->tmp->render($this->fileName));
    }

    public function editOrder()
    {
        $bill_no = $this->f3->get('PARAMS.id') ? $this->f3->get('PARAMS.id') : null;
        if ($id == null)
        {
        	$this->f3->set('strAction',"ເພີ່ມ ".$this->strAction);
        	$this->f3->set('method', 'POST');
        } else {
    	   $this->f3->set('strAction',"ແກ້ໄຂ ".$this->strAction);
    	   $this->f3->set('method', 'PUT');
        }

        $this->f3->set('nav', $this->nav);
        $this->f3->set('subnav', $this->nav);
		$this->f3->set('strPage', $this->strAction);
        $this->f3->set('id', $id);
        $this->f3->set('item',$this->Svr->getById($id));
        echo($this->tmp->render('backend/order.html'));
    }

    public function delete()
	{
		$id = $this->f3->get('PARAMS.id');
		if ($this->Svr->delete($id)) {
			$this->data = ['success' => true, 'message' => 'Delete Success!'];
		} else {
			$this->data = ['success' => false, 'message' => 'Something went wrong!'];
		}
		API::success($this->data);
	}
    
    public function profile()
    {
        $id = $this->f3->get('LOGON_USER_ID') ? $this->f3->get('LOGON_USER_ID') : null;
        $this->f3->set('strAction',$this->strAction);
        $this->f3->set('method', 'PUT');
        $this->f3->set('nav', $this->nav);
        $this->f3->set('subnav', $this->nav);
        $this->f3->set('strPage', $this->strAction);
        $this->f3->set('id', $id);
        $this->f3->set('item',$this->Svr->getById(array('id = ?',$id)));
        echo($this->tmp->render($this->fileName));
    }

    public function productImage(){
        $path = "uploads/product-images/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }

    function userImage()
    {
        $path = "uploads/staff/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }

    function activityImage()
    {
        $path = "uploads/activity-images/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }
    function activityImageList()
    {
        $path = "uploads/activity-images/list/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }
    function activityVideo()
    {
        $path = "uploads/activity-images/video/";
        $site_domain = $this->f3->get('SITE_DOMAIN');
        $upload = $this->custom->uploadFile($path);
        $this->data = array('success' => false, 'file_name' => '');
        foreach($upload as $key => $value) {
            if($value == true) {
                $this->data = array('success' => true, 'file_name' => $site_domain.$key);
            } else {
                $this->data = array('success' => false, 'file_name' => '');
            }
            break;
        }
        API::success($this->data);
    }

    public function access()
    {
        $data = $this->f3->get('BODY');
        parse_str($data, $post_vars);
        $id = $post_vars["id"];
        $active = $post_vars["active"] == 0 ? 1 : 0;
        $this->Svr->access($this->tbl,$id,$active);
    }
    public function userAccess()
    {
        $this->Svr->doAccess();
    }
    public function storeUser()
    {
        $this->Svr->add();
    }

    public function publishStatus()
    {
        $id = $this->f3->get('PARAMS.id');
        $status = $this->f3->get('PARAMS.status') == 1 ? 0 : 1;
        $this->Svr->status($id,$status);
    }

    public function storeStudent()
    {
        $this->Svr->add();
    }
    public function classFee()
    {
        $this->Svr->getClassFee();
    }
}