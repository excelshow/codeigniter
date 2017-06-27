<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Admin.php');
/**
 * 订单管理控制器类
 * @author tim
 */
class Order extends Admin{
    //put your code here
    public function __construct(){
        parent::__construct();
        $this->load->model('Op_order');
    }
    /*
     * 加载未确认订单列表
     */
    public function lists(){
        $data=array(
            'order_list' => $this->Op_order->get_order_unkown(),
        );
        $this->load->view('order/lists',$data);
    }
    public function detail($order_id){
        $data = array(
            'order_id' => $order_id,
            'data' => $this->Op_order->order_detail($order_id),
        );
        $this->load->view('order/detail',$data);
    }
    public function test(){
        $this->load->view('test');
    }
}
