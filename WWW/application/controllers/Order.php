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
	/**
	 * @var array 记录类名
	 */
	private $data = array('Class' => __CLASS__);

	/*
	 * 加载未确认订单列表
	 */
	public function lists($dist='a'){
		$class = $this->input->post('class');
		$data=array(
			'order_list_tomeng' => $this->Op_order->get_order($dist,0,$class),
			'order_list_selfna' => $this->Op_order->get_order($dist,1,$class),
			'dist' => $dist,
			'class' => $class
		);
		if($dist == '2'){
			$data['deliver'] = $this->Op_order->get_deliver();
		}
		$this->load->view('order/lists',$data);
	}

	/**
	 * detail
	 * @param $order_id
	 * 根据订单号获取订单号
	 */
	public function detail($order_id){
		$data = array(
			'order_id' => $order_id,
			'data' => $this->Op_order->order_detail($order_id),
			'status' => $this->Op_order->get_status($order_id),
			'order_info' => $this->Op_order->get_info($order_id),
			'comment' => $this->Op_order->get_comment($order_id),
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
	 * stocking_goods
	 * @param $order_id 订单号
	 * 单个商品备货接口
	 */
	public function stocking_goods($order_id)
	{
		$this->Op_order->stocking_goods($order_id,$this->input->post('id'),$this->input->post('value'));
	}



	public function download_detail()
	{
		$this->load->helper('excel');
		$this->load->helper('download');
		$objPHPExcel = new PHPExcel();
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objPHPExcel->getActiveSheet()->setTitle('订单汇总');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', '过期订单');
		$objPHPExcel->getActiveSheet()->setCellValue('H2', '未支付订单');
		$objPHPExcel->getActiveSheet()->setCellValue('H3', '已支付->待备货');
		$objPHPExcel->getActiveSheet()->setCellValue('H4', '已备货->待分配');
		$objPHPExcel->getActiveSheet()->setCellValue('H5', '已分配->待完成');
		$objPHPExcel->getActiveSheet()->setCellValue('H6', '已完成');
		$objPHPExcel->getActiveSheet()->setCellValue('A7', '订单号');
		$objPHPExcel->getActiveSheet()->setCellValue('B7', '下单时间');
		$objPHPExcel->getActiveSheet()->setCellValue('C7', '出货状态');
		$objPHPExcel->getActiveSheet()->setCellValue('D7', '送货员');
		$objPHPExcel->getActiveSheet()->setCellValue('E7', '金额');
		$objPHPExcel->getActiveSheet()->setCellValue('F7', '地点');
		$objPHPExcel->getActiveSheet()->setCellValue('G7', '送货时间');
		$objPHPExcel->getActiveSheet()->setCellValue('I7', 'G1');
		$objPHPExcel->getActiveSheet()->setCellValue('J7', 'G2');
		$objPHPExcel->getActiveSheet()->setCellValue('K7', 'G3');
		$objPHPExcel->getActiveSheet()->setCellValue('L7', 'G4');
		$objPHPExcel->getActiveSheet()->setCellValue('M7', 'G5');
		$objPHPExcel->getActiveSheet()->setCellValue('N7', 'G6');
		$objPHPExcel->getActiveSheet()->setCellValue('O7', 'G7');
		$objPHPExcel->getActiveSheet()->setCellValue('P7', 'G8');$order_lists = $this->Op_order->get_order('a');
		$line = 8;
		foreach ($order_lists as $order){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$line, $order['order_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$line, date("Y:m:d",$order['datetime']/1000));
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$line, $order['money']);
			$goods_lists = $this->Op_order->order_detail($order['order_id']);
			foreach ($goods_lists as $goods){
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$line, $goods['name']);
			}
			$line+=2;
		}
		$filename = "order_detail".date("Ymd",time()).".xlsx";
		$objWriter->save($filename);
		force_download($filename, NULL);
	}

	/**
	 * get_new_comment
	 * 加载待回复的评论接口
	 */
	public function get_new_comment()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['comment'] = $this->Op_order->get_new_comment();
		$this->load->view('order/new_comment',$this->data);
	}



	/**
	 * reply_comment订单回复记录接口
	 */
	public function reply_comment()
	{
		$this->Op_order->reply_comment($this->input->post('order_id'),$this->input->post('reply'));
	}

	/**
	 * comment_list 获取评论列表
	 */
	public function comment_list()
	{

		$this->data['function'] = __FUNCTION__;
		$this->data['comment_list'] = $this->Op_order->get_comment_list();
		$this->load->view('order/comment_list',$this->data);
	}

	public function delete()
	{
		if($this->Op_order->delete_order($this->input->post('order_id'))){
			$this->output->set_output('操作成功');
		}else{
			$this->output->set_output('操作失败,请联系网站开发者.错误链接:'+base_url().__CLASS__."/".__FUNCTION__);
		}
	}

	/**
	 * expried_orders 过期订单
	 */
	public function expired_order()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list'] = $this->Op_order->get_expired_order();
		$this->load->view('order/expired_order',$this->data);

	}

	/**
	 * unpay_list 未支付的订单
	 */
	public function unpay_list()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list_tomeng'] = $this->Op_order->get_order(0,0);
		$this->data['order_list_selfna'] = $this->Op_order->get_order(0,1);
		$this->load->view('order/lists/unpay',$this->data);
	}
	/**
	 * payed_list 已支付的订单
	 */
	public function payed_list()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list_tomeng'] = $this->Op_order->get_order(1,0);
		$this->data['order_list_selfna'] = $this->Op_order->get_order(1,1);
		$this->load->view('order/lists/payed',$this->data);
	}
	/**
	 * stockeded_list 待备货的订单
	 */
	public function stocked_list()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list_tomeng'] = $this->Op_order->get_order(2,0);
		$this->data['order_list_selfna'] = $this->Op_order->get_order(2,1);
		$this->data['deliver'] = $this->Op_deliver->get_deliver();
		$this->load->view('order/lists/stocked',$this->data);
	}
	/**
 * pending_list 待备货的订单
 */
	public function pending_list()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list_tomeng'] = $this->Op_order->get_order(3,0);
		$this->data['order_list_selfna'] = $this->Op_order->get_order(3,1);
		$this->load->view('order/lists/pending',$this->data);
	}
	/**
	 * pending_list 待备货的订单
	 */
	public function completed_list()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['order_list_tomeng'] = $this->Op_order->get_order(-1,0);
		$this->data['order_list_selfna'] = $this->Op_order->get_order(-1,1);
		$this->load->view('order/lists/completed',$this->data);
	}

	public function end_order()
	{
		if($this->Op_order->end_order($this->input->post('order_id'))){
			$this->output->set_output('操作成功');
		}else{
			$this->output->set_output('操作失败');
		}
	}
	/**
	 * reply_new_comment
	 * 评论回复视图显示接口
	 */
	public function reply_new_comment()
	{
		$this->output->set_output('');
		$order_id = $this->input->post('order_id');
		$data = array(
			'order_id' => $order_id,
			'comment' => $this->Op_order->get_comment($order_id),
		);
		$this->load->view('order/reply_new_comment',$data);
	}
	/**
	 * stocking 备货接口
	 * @param $order_id 待备货单号
	 */
	public function stocking($order_id)
	{
		$this->output->set_output('');
		$data = array(
			'order_id' => $order_id,
			'data' => $this->Op_order->order_detail($order_id),
		);
		$this->load->view('order/stocking',$data);
	}
	public function next_order($dist)
	{
		$this->output->set_output('');
		$next_order_id = $this->Op_order->next_order($this->input->post('order_id'),$dist);
		if("end" == $next_order_id){
			$this->output->set_output("<div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><h4 class=‘modal-title’>所有订单都已备货完成</h4>");
		}else{
			$this->stocking($next_order_id);
		}
	}
}
