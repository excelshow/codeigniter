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
    public function settlement($user_id){
        $num = $this->get_user_num($user_id)+1;
        $data = array(
    '       user_num' => $num
        );
        $this->db->where('user_id', $user_id);
        $this->db->update($this->user_table_name, $data);
    }

    public function get_lists()
    {
        $query = $this->db->get($this->user_table_name);
        return $query->result_array();
    }

    public function get_status($user_id)
    {
        $this->db->select('status');
        $query = $this->db->get_where('user', array('user_id' => $user_id));
        $result =  $query->result_array();
        if(!isset($result[0]['status'])){
            return 0;
        }
        if($result[0]['status'] == '1'){
            return 1;
        }else{
            return 0;
        }
    }
}
