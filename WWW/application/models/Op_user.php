<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Op_user_model
 *
 * @author tim
 */
class Op_user  extends CI_Model {
    //put your code here
    private $user_table_name = 'user';
    public function __construct()
  {
    parent::__construct();
    $this->load->database();
    // Your own constructor code
  }

	/**
	 * @param $user_id 用户openid
	 * @return mixed 用户编号
	 *
	 */
    public function get_user_no($user_id){
        $this->db->select('user_no');
        $query = $this->db->get_where($this->user_table_name,array('user_id' => $user_id));
        $row=$query->row();
        return $row->user_no;
    }
    public function get_user_num($user_id){
        $this->db->select('user_num');
        $query = $this->db->get_where($this->user_table_name,array('user_id' => $user_id));
        $row=$query->row();
        return $row->user_num;
    }
    public function get_lists($status)
    {
        $query = $this->db->get_where($this->user_table_name,array('status' => $status));
        return $query->result_array();
    }

	/**
	 * @param $user_id 用户Id
	 * @return mixed
	 * 获取用户ID
	 */
    public function get_info($user_id)
    {
        $query = $this->db->select('*')->get_where('user', array('user_id' => $user_id));
        return $query->result_array();
    }

	/**
	 * @param $user_no 会员编号
	 * @return bool
	 * 激活会员
	 */
    public function sure($user_no)
    {
        if($this->db->query("update user set status=1 where user_no='$user_no'")){
            return TRUE;
        }else{
            return FALSE;
        }

    }
	/**
	 * @param $user_no 会员编号
	 * @return bool
	 * 删除会员
	 */
	public function delete($user_no)
	{
		$this->db->delete('user', array('user_no' => $user_no));
		if($this->db->affected_rows() == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
