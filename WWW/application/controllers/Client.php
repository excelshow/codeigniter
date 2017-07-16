<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Op_goods');
        $this->load->model('Op_order');
        // Your own constructor code
    }
    public function index(){
        $this->load->view('client');
    }
    public function goods_lists($class='水果'){
        $result = $this->Op_goods->get_goods_byclass($class);
        echo json_encode($result);
    }
    public function goods_class(){
        $result = $this->Op_goods->goods_class();
        echo json_encode($result);
    }
    public function goods_detail($id){
        $result = $this->Op_goods->goods_detail($id);
        echo json_encode($result);
    }
    public function order_detail($order_id){
        $result = $this->Op_order->order_detail($order_id);
        echo json_encode($result);
    }
    public function get_orders($user_id,$dist)
    {
        $result = $this->Op_order->get_orders($user_id,$dist);
        echo json_encode($result);
    }
	public function delete_order($order_id)
	{
		$result = $this->Op_order->delete_order($order_id);
        if($result)
			echo "成功" ;
		else echo "失败" ;
	}

    public function guess_like($user_id)
    {
        $result = $this->Op_goods->guess_like($user_id);
        echo json_encode($result);
    }

    public function recommend()
    {
        $result = $this->Op_goods->recommend();
        echo json_encode($result);
    }
    public function search($data)
    {
        $result = $this->Op_goods->search($data);
        echo json_encode($result);
    }
}
