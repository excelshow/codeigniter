<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Client 小程序请求接口类
 */
class Client extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Op_goods');
		$this->load->model('Op_order');
		$this->load->model('Op_address');
		// Your own constructor code
	}

	/**
	 * index 测试接口
	 */
	public function index(){
		$this->load->view('client');
	}

	/**
	 * goods_lists
	 * @param string $class 类名
	 * 根据类名获取商品名
	 */
	public function goods_lists($class_id='all'){
		$result = $this->Op_goods->get_goods($class_id,$this->input->get('odd'));
		echo json_encode($result);
	}

	/**
	 * goods_class 获取类列表接口
	 */
	public function goods_class(){
		$result = $this->Op_goods->goods_class();
		echo json_encode($result);
	}

	/**
	 * goods_detail
	 * @param $id 商品
	 * 获取商品详情接口
	 */
	public function goods_detail($id){
		$result = $this->Op_goods->goods_detail($id);
		echo json_encode($result);
	}

	/**
	 * goods_comment
	 * @param $id 商品id
	 * 获取商品评论
	 */
	public function goods_comment($id){
		$goods_comment = $this->Op_goods->get_comment($id);
		echo json_encode($goods_comment);
	}

	/**
	 * order_detail
	 * @param $order_id 订单ID
	 * 获取订单详情
	 */
	public function order_detail($order_id){
		$result = $this->Op_order->order_detail($order_id);
		$comment = array(
			'comment' => $this->Op_order->get_comment($order_id),
		);
		echo json_encode(array_merge($result,$comment));
	}

	/**
	 * get_orders 获取得到订单列表
	 * @param $user_id 用户id
	 * @param string $dist 状态区分码
	 */
	public function get_orders($user_id,$dist='all')
	{
		$result = $this->Op_order->get_orders($user_id,$dist);
		echo json_encode($result);
	}

    /**
     * get_user_address 获取用户能够使用的地址库
     */
	public function get_user_address()
	{
		$result = $this->Op_address->user_address();
		echo json_encode($result);
	}

	/**
	 * delete_order 删除订单（为什么需要这个?)
	 * @param $order_id 订单id
	 */
	public function delete_order($order_id)
	{
		$result = $this->Op_order->delete_order($order_id);
		if($result)
			echo "成功" ;
		else echo "失败" ;
	}

	/**
	 * guess_like 猜你喜欢接口
	 * @param $user_id 用户id
	 */
	public function guess_like($user_id)
	{
		$result = $this->Op_goods->guess_like($user_id);
		echo json_encode($result);
	}

	/**
	 * recommend 店家推荐商品列表
	 */
	public function recommend()
	{
		$result = $this->Op_goods->recommend();
		echo json_encode($result);
	}

	/**
	 * search 搜索商品的接口
	 * @param $data 搜索项
	 */
	public function search($data)
	{
		$result = $this->Op_goods->search($data);
		echo json_encode($result);
	}

	/**
	 * judge_order_comment 判断是否具备该订单评价功能
	 * @param $order_id 订单id
	 */
	public function judge_order_comment($order_id)
	{
		if($this->Op_order->judge_order_comment($order_id)){
			echo '1';
		}else{
			echo '0';
		}
	}
	/**
	 * judge_order_comment 判断是否具备该商品评价功能
	 * @param $goods_id 商品id
	 */
	public function judge_goods_comment($user_id,$goods_id)
	{
		if($this->Op_goods->judge_goods_comment($user_id,$goods_id)){
			echo '1';
		}else
			echo '0';
	}

	/**
	 * get_must_address 获取自选地址接口
	 */
	public function get_must_address()
	{
		$result = $this->Op_address->get_must_address();
		echo json_encode($result);
	}
}
