<?php

/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/7/31
 * Time: 18:14
 */
class Op_deliver extends CI_Model
{
	private $db_deliver_name = 'deliver';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function get_id_byname($name)
    {
        $query = $this->db->query("SELECT deliver_id FROM deliver WHERE name='$name'");
        return $query->row()->deliver_id;
    }

    public function join($order_id,$deliver_id)
    {
        $this->delived($order_id);
        if($this->db->insert('map_delive_order',array('order_id' => $order_id,'deliver_id' => $deliver_id))){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function delived($order_id)
    {
        $this->db->query("update orders set status=3 where order_id='$order_id' AND status=2") ;
    }

	public function get_deliver($var='all')
	{
		$query = $this->db->get($this->db_deliver_name);
		return $query->result_array();
	}
	public function sure($deliver_id)
	{
		if($this->db->where('deliver_id',$deliver_id)->update($this->db_deliver_name,array('status' => '1'))){
			return TRUE;
		}else{
			return FALSE;
		}

	}
	public function delete($deliver_id)
	{
		$this->db->delete('deliver', array('deliver_id' => $deliver_id));
		if($this->db->affected_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}