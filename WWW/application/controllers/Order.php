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
    }

    /*
     * 加载未确认订单列表
     */
    public function lists($dist='a'){
        $data=array(
            'order_list' => $this->Op_order->get_order($dist),
            'dist' => $dist,
        );
        if($dist == '2'){
            $data['deliver']= $this->Op_order->get_deliver();
        }

        $this->load->view('order/lists',$data);
    }
    public function detail($order_id){
        $data = array(
            'order_id' => $order_id,
            'data' => $this->Op_order->order_detail($order_id),
            'status' => $this->Op_order->get_status($order_id),
            'order_info' => $this->Op_order->get_info($order_id),
        );
        $this->load->view('order/detail',$data);
    }
    public function test(){
        $this->load->view('test');
    }

    public function sure($order_id)
    {
        $this->Op_order->sure($order_id);
    }

    public function together()
    {
        echo "<h1>合并订单内容正在生成，请点击下载detail文件</h1>";
        $file_name='detail'.time().'.txt';
        $file_content="----------------------------\r\n\r\n总计:\r\n\r\n";
        $orders = $this->input->post('checkbox');
        $deliver_id = $this->Op_deliver->get_id_byname($this->input->post('deliver'));
        foreach ($orders as $order_id){
            $this->Op_deliver->join($order_id,$deliver_id);
        }
        if($orders != NULL){
            $result = $this->Op_order->together($orders);
        }
       echo "备货总计:<br />";
       foreach ($result as $item){
           $str = $item['name']."数量:》".$item['select_num']."斤";
           $file_content = $file_content.$str."\r\n\r\n";
           echo $str.'<br />';
           }
            $this->load->helper('file');
            if ( ! write_file('./download/'.$file_name, $file_content."----------------------------\r\n\r\n")) {
                echo '文件写入权限不足，请联系管理员<br />';
            }
            $this->Op_order->write_detail($file_name,$orders);
    }

    /**
     * stocking 备货接口
     * @param $order_id 待备货单号
     */
    public function stocking($order_id)
    {
        $data = array(
            'order_id' => $order_id,
            'data' => $this->Op_order->order_detail($order_id),
        );
        $this->load->view('order/stocking',$data);
    }

    /**
     * stocking_goods
     * @param $order_id 订单号
     * 单个商品备货接口
     */
    public function stocking_goods($order_id)
    {
        $this->Op_order->stocking_goods($order_id,$this->input->post('id'),$this->input->post('value'));
    }

    public function next_order($dist)
    {
        $next_order_id = $this->Op_order->next_order($this->input->post('order_id'),$dist);
        if("end" == $next_order_id){
            echo "<div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><h4 class=‘modal-title’>所有订单都已备货完成</h4>";
        }else{
            $this->stocking($next_order_id);
        }
    }
}
