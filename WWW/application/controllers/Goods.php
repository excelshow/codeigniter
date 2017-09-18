<?php
require('Admin.php');
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 商品管理类，继承于Admin类，所有商品管理的操作在这里完成
 */
class Goods extends Admin{
	private $filenum=0;
	/**
	 * @var array 记录类名
	 */
	private $data = array('Class' => __CLASS__);

	private function upload_file($goods_id,$time){
		//文件上传的代码块
		$config['upload_path']      = './uploads/';
		$config['allowed_types']    = 'jpg';
		$config['max_size']    			= 1000;
		$config['max_width']        = 1900;
		$config['max_height']       = 1900;
		$config['file_name']       = $goods_id.'-'.$time;
		$this->load->library('upload', $config);
		$this->upload->initialize($config,TRUE);
		if ( ! $this->upload->do_upload('file'.$time))
		{
			$data = array('tips' => $this->upload->display_errors());
		}
		else
		{
			$data = array('tips' => '提交成功','upload_data' => $this->upload->data());
			alert('商品添加成功');
			js_redirect(base_url('index.php/goods/add'),1000);
		}
	}
	public function __construct(){
		parent::__construct();
	}

	/**
	 * 商品列表
	 */
	public function lists($dist="all"){
		$this->data['function'] = __FUNCTION__;
		$this->data['class'] = $this->Op_goods->goods_class();
		$this->data['dist'] = urldecode($dist);
		if($dist == "all"){
			$this->data['goods'] = $this->Op_goods->get_last_ten_goods();
		}else{
			$this->data['goods'] = $this->Op_goods->get_goods_byclass($dist);
		}
		$this->load->view("goods/lists",$this->data);
	}
	/**
	 * 添加新商品
	 */
	public function add(){
		$this->data['function'] = __FUNCTION__;
		$this->data['class'] = $this->Op_goods->goods_class();
		$this->load->view("goods/add",$this->data);
	}
	/**
	 * 商品分类
	 */
	public function classify(){
		$this->data['function'] = __FUNCTION__;
		$this->data['class']= $this->Op_goods->goods_class();
		$this->load->view("goods/classify",$this->data);

	}
	public function detail($goods_id)
	{
		$data = array(
			'detail' => $this->Op_goods->goods_detail($goods_id),
			'goods_id' => $goods_id,
			'class' => $this->Op_goods->goods_class(),
		);
		$this->load->view("goods/detail",$data);
	}
	public function comment_list($goods_id)
	{
		$data = array(
			'goods_id' => $goods_id,
			'comment' => $this->Op_goods->get_comment($goods_id),
		);
		$this->load->view("goods/comment_list",$data);
	}
	/**
	 * 检查表单提交是否合法，同时完成文件的上传，但并没有返回值。
	 */
	public function check($dist='0'){

		$this->form_validation->set_error_delimiters("<font style=\"color:red\"> ERROR:", '</font>');
		for($i=0;$i<6;$i++){
			if($_FILES['file'.$i]['name'] != ''){
				$this->filenum++;
			}
		}
		$config = array(
			array(
				'field' => 'name',
				'label' => '商品名称',
				'rules' => 'required'
			),
			array(
				'field' => 'prices',
				'label' => '价格',
				'rules' => 'required'
			),
			array(
				'field' => 'origin',
				'label' => '产地',
				'rules' => 'required|min_length[3]|max_length[100]'
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE){
			$this->add();
		}
		//将数据插入至数据库
		else{
			$this->load->model('Op_goods');
			$row = Array(
				'name' => $this->input->post('name'),
				'prices' => $this->input->post('prices'),
				'origin' => $this->input->post('origin'),
				'filenum' => $this->filenum,
				'spec' => $this->input->post('spec')
			);
			if($this->Op_goods->insert_good($row)){
				$good_id = $this->Op_goods->get_max('id', 'goods');
				$this->Op_goods->update_class($good_id, $this->input->post('class'));
				$this->Op_goods->update_content($good_id,$this->input->post('function'),$this->input->post('eat'),$this->input->post('save'));

				for($i=0;$i<$this->filenum;$i++){
					$this->upload_file($good_id,$i);
				}
				$this->add();
			}
		}
	}

	public function stock()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['stock'] = $this->Op_goods->get_stock();
		$this->load->view("goods/stock",$this->data);
	}
	/**
	 * 执行删除商品操作
	 * @param int $id 商品ID
	 */
	public function delete($id){
		$this->Op_goods->delete_goods($id);
		redirect('Goods/lists');
	}

	/**
	 * edit
	 * @param $id 商品Id
	 * 编辑商品表单的提交接口
	 */
	public function edit($id)
	{
		$this->form_validation->set_error_delimiters("<font style=\"color:red\"> ERROR:", '</font>');
		$config = array(
			array(
				'field' => 'name',
				'label' => '商品名称',
				'rules' => 'required'
			),
			array(
				'field' => 'prices',
				'label' => '价格',
				'rules' => 'required'
			),
			array(
				'field' => 'origin',
				'label' => '产地',
				'rules' => 'required|min_length[3]|max_length[100]'
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('sidermenu');
			$this->detail($id);
		}
		//将数据插入至数据库
		else{
			$row = Array(
				'id' => $id,
				'name' => $this->input->post('name'),
				'prices' => $this->input->post('prices'),
				'origin' => $this->input->post('origin'),
				'spec' => $this->input->post('spec')
			);
			if($this->Op_goods->update_goods($row)) {
				$this->Op_goods->update_class($id, $this->input->post('class'));
				$data=array(
					'goods_id' => $id,
					'function' => $this->input->post('function'),
					'eat' => $this->input->post('eat'),
					'save' => $this->input->post('save'),
				);
				$this->Op_goods->replace_content($data);
				redirect('goods');
			}
		}

	}

	/**
	 * add_class
	 * @param $class_name 商品类名
	 * 添加商品类的接口
	 */
	public function add_class()
	{
		if($this->Op_goods->add_class($this->input->post('class'))){
			$this->output->set_output('添加成功');
		}else{
			$this->output->set_output('添加失败');
		}
	}

	/**
	 * delete_class
	 * @param $class_name 商品类名
	 * 删除商品分类，该类下所有商品将被删除，^-^实则不会只是当前类名与商品ID的映射断了而已
	 */
	public function delete_class()
	{
		if($this->Op_goods->delete_class($this->input->post('class'))){
			$this->output->set_output('删除成功');
		}
	}
	/**
	 * edit_class
	 * @param $class_name 商品类名
	 * 编辑商品分类
	 */
	public function edit_class()
	{
		if($this->Op_goods->edit_class($this->input->post('old'),$this->input->post('new'))){
			$this->output->set_output('编辑成功');
		}else{
			$this->output->set_output('编辑失败');
		}
	}
	/**
	 * get_new_comment
	 * 加载待回复的评论接口
	 */
	public function get_new_comment()
	{
		$this->data['function'] = __FUNCTION__;
		$this->data['comment'] = $this->Op_goods->get_new_comment();
		$this->load->view('goods/new_comment',$this->data);
	}
	/**
	 * reply_new_comment
	 * 评论回复视图显示接口
	 */
	public function reply_new_comment()
	{
		$comment_id = $this->input->post('comment_id');
		$data = array(
			'comment_id' => $comment_id,
			'comment' => $this->Op_goods->get_goods_comment($comment_id),
		);
		$this->load->view('goods/reply_new_comment',$data);
	}
	/**
	 * 回复评论接口
	 * @return [type] [description]
	 */
	public function reply_comment()
	{
		if($this->Op_goods->reply_comment($this->input->post('comment_id'),$this->input->post('reply'))){
			$this->output->set_output('回复成功');
		}
	}
	/**
	 * 商品入库接口
	 * @return [type] [description]
	 */
	public function input(){
		if( $this->Op_goods->input( $this->input->post('goods_id'),$this->input->post('input') ) ){
			$this->output->set_output('操作成功');
		}else{
			$this->output->set_output("操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__);
		}
	}
	/**
	 * 商品入库接口
	 * @return [type] [description]
	 */
	public function pre_input(){
		if( $this->Op_goods->pre_input( $this->input->post('goods_id'),$this->input->post('pre_input') ) ){
			$this->output->set_output('操作成功');
		}else{
			$this->output->set_output("操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__);
		}
	}

	/**
	 * @param $goods_id 商品id
	 * 上移一个分类
	 */
	public function up_class($id)
	{
		$id_list=$this->Op_goods->goods_class('id');
		$class_list=$this->Op_goods->goods_class();
		$aim=array('id'=>$id);
		$site = array_search($aim,$id_list);
		$pre_site = $site;
		if($site==0){go_history();return FALSE;}
		else{
			$pre_site--;
		}
		if($this->Op_goods->exchange_class($class_list[$pre_site]['id'],$class_list[$pre_site]['class'],$class_list[$site]['id'],$class_list[$site]['class'])){
			go_history();
			return TRUE;
		}
		$this->output->set_output('操作失败');
	}

	public function down_class($id)
	{
		$id_list=$this->Op_goods->goods_class('id');
		$class_list=$this->Op_goods->goods_class();
		$aim=array('id'=>$id);
		$site = array_search($aim,$id_list);
		$post_site = $site;
		if($site==(count($class_list)-1)){go_history();return FALSE;}
		else{
			$post_site++;
		}
		if($this->Op_goods->exchange_class($class_list[$post_site]['id'],$class_list[$post_site]['class'],$class_list[$site]['id'],$class_list[$site]['class'])){
			go_history();
			return TRUE;
		}
		$this->output->set_output('操作失败');
	}
	public function upload_pic($goods_id,$time)
	{
		$this->output->set_output('');
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
		$this->output->set_output('');
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
	public function edit_pic($goods_id)
	{
		$this->output->set_output('');
		$data=array(
			'goods_id' => $goods_id,
			'filenum' => $this->Op_goods->get_filenum($goods_id)
		);
		$this->load->view('goods/edit_pic',$data);
	}


}
