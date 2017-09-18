<?php

/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/20
 * Time: 18:14
 */
class Op_address extends CI_Model
{
    /**
     * @var string 自取地址表名
     */
    private $must_address_name = 'must_address';
    private $user_address_name = 'user_address';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function get_must_address()
    {
        $query = $this->db->get($this->must_address_name);
        return $query->result_array();
    }

    public function delete_must_address($NO)
    {
        $this->db->delete($this->must_address_name, array('NO' => $NO));
        if($this->db->affected_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function add_must_address($address)
    {
        if($this->db->insert($this->must_address_name,array('address' => $address))){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * edit_must_address
     * @param $NO 要编辑地址的编号
     * @param $address 编辑后的地址
     */
    public function edit_must_address($NO,$address)
    {
        $data = array(
            'NO' => $NO,
            'address'  => $address
        );
        if($this->db->replace($this->must_address_name, $data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function get_user_address()
    {
        $query = $this->db->get($this->user_address_name);
        return $query->result_array();
    }

    public function delete_user_address($NO)
    {
        $this->db->delete($this->user_address_name, array('NO' => $NO));
        if($this->db->affected_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function add_user_address($address)
    {
        if($this->db->insert($this->user_address_name,array('address' => $address))){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * edit_user_address
     * @param $NO 要编辑地址的编号
     * @param $address 编辑后的地址
     */
    public function edit_user_address($NO,$address)
    {
        $data = array(
            'NO' => $NO,
            'address'  => $address
        );
        if($this->db->replace($this->user_address_name, $data))
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }
	public function user_address()
	{
		$query = $this->db->select('*')->from($this->user_address_name)->get();
		return $query->result_array();
	}
}