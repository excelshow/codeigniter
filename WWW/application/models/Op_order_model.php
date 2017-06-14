<?php
 date_default_timezone_set('PRC'); 
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
class Op_order_model  extends CI_Model{
    //put your code here
    private $order_table_name = 'order';
    public function __construct()
  {
    parent::__construct();
    $this->load->database();
    // Your own constructor code
  }
    public function insert_order($order_id,$user_id,$user_info){
         $data = array(
            'order_id' => $order_id,
            'user_id' => $user_id,
            'user_info' => $user_info
        );
    if($this->db->insert($this->order_table_name, $data)){
        echo "下单成功，订单号".$order_id;
        return true;
    }
    else{
        echo "下单失败";
        return false;
    }
    }
    public function insert_batch($data){
        $this->db->insert_batch('order_content', $data);
    }
}