<?php
require('My_Controller.php');
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/19
 * Time: 20:22
 */
class Setting extends My_Controller
{
	/**
	 * @var array 记录类名
	 */
	private $data = array('Class' => __CLASS__);
	public function __construct(){
		parent::__construct();
		$this->load->model('Op_address');
	}
	public function must_address()
	{
		$this->load->view('header');
		$this->load->view('sidermenu');
		$this->data['function'] = __FUNCTION__;
		$this->data['address_list'] = $this->Op_address->get_must_address();
		$this->load->view('setting/must_address',$this->data);
	}

	public function delete_must_address()
	{
		if($this->Op_address->delete_must_address($this->input->post('NO'))){
			echo "删除成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}

	public function add_must_address()
	{
		if($this->Op_address->add_must_address($this->input->post('data'))){
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}

	public function edit_must_address()
	{
		if($this->Op_address->edit_must_address($this->input->post('NO'),$this->input->post('data')))
		{
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}
	public function edit_pic($goods_id)
	{
		$data=array(
			'goods_id' => $goods_id,
			'filenum' => $this->Op_goods->get_filenum($goods_id)
		);
		$this->load->view('goods/edit_pic',$data);
	}
	public function upload_pic($goods_id,$time)
	{
		$config['upload_path']      = './uploads/';
		$config['allowed_types']    = 'jpg';
		$config['max_size']    			= 1000;
		$config['max_width']        = 1900;
		$config['max_height']       = 1900;
		$config['file_name']       = $goods_id.'-'.$time;
		$this->load->library('upload', $config);
		$this->upload->initialize($config,TRUE);
		if ( ! $this->upload->do_upload('file'))
		{
			$data = array('tips' => $this->upload->display_errors());
			var_dump($data);
		}
		else
		{
			echo 1;
			$this->Op_goods->col_add_one($goods_id);
		}
	}
	public function delete_pic()
	{
		$goods_id = $this->input->post('goods_id');
		$pic_id = $this->input->post('pic_id');
		$this->load->helper('path');
		if(unlink(set_realpath('uploads/').$goods_id.'-'.($pic_id).'.jpg')){
			$this->Op_goods->col_sub_one($goods_id);
			while(file_exists(set_realpath('uploads/').$goods_id.'-'.($pic_id+1).'.jpg')){
				rename(set_realpath('uploads/').$goods_id.'-'.($pic_id+1).'.jpg', set_realpath('uploads/').$goods_id.'-'.($pic_id).'.jpg');
				$pic_id++;
			}
			echo "删除成功";
		}

	}
	/**
	 * reply_new_comment
	 * 评论回复视图显示接口
	 */
	public function reply_new_comment()
	{
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
		$data = array(
			'order_id' => $order_id,
			'data' => $this->Op_order->order_detail($order_id),
		);
		$this->load->view('order/stocking',$data);
	}
	public function next_order($dist)
	{
		$next_order_id = $this->Op_order->next_order($this->input->post('order_id'),$dist);
		if("end" == $next_order_id){
			$this->output->set_output("<div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><h4 class=‘modal-title’>所有订单都已备货完成</h4>");
		}else{
			$this->stocking($next_order_id);
		}
	}
}