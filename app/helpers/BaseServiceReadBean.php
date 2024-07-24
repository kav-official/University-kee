<?php
class BaseServiceReadBean extends DB\SQL\Mapper
{
	function __construct($db,$tableName)
	{
		parent::__construct($db,$tableName);
	}

	public function getAll($filters, $options)
	{
        $this->load($filters, $options);
        return $this->query;
    }

	public function getFind($options)
	{
        return $this->find($options);
    }

	public function getByOne($options)
	{
        return $this->load($options);
    }

	public function getSQL($sql,$options=array())
	{

		return $this->db->exec($sql,$options);
    }

	public function countAll($filters)
	{
        $data = $this->find($filters);
        return count($data);
    }

	public function getById($id)
	{
        return $this->load(array('id = ?',$id));
    }

	public function delete($id)
	{
		$this->load(array('id = ?',$id));
		return $this->erase();
	}

	function status($id,$status)
    {
        $this->load(['id = ?',$id]);
        $this->publish_status = $status;
        $this->update();
        $this->data = ['success' => true, 'message' => 'ສຳເລັດ'];
        API::success($this->data);
    }

	public function orderNum()
	{
		$f3 = Base::instance();
        $data = $f3->get('BODY');
        parse_str($data,$post_vars);
		$order_num = $post_vars['order_num'];
        foreach ($order_num as $key => $value)
		{
            if(preg_match('/^\d+$/',$value))
            {
              $this->load(['id=?',$key]);
              $this->order_num = $value;
              $this->update();
            }
        }
        API::success(array('success' => true, 'message' => 'ອັບເດດສຳເລັດແລ້ວ'));
    }
}