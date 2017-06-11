<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	 * flag to check admin
	 * @var boolean
	 */
	protected $flag=FALSE;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] !== TRUE){
			$this->flag = FALSE;

		}
		else if($_SESSION['logged_in'] === TRUE){
			$this->flag = TRUE;
		}
		if($this->flag === TRUE){
			$this->load->model('Op_good_model');
			$this->load->view('header');
			$this->load->view('sidermenu');
			$this->load->helper(array('form', 'url'));
		}else{
			$data =Array(
				'content' =>'你当前并未登录,或');
				$this->load->view('tip',$data);
			}
		}

		public function index()
		{
			$data=Array(
				'goods_count_all' => $this->Op_good_model->get_count_all('goods'),
			);
			if($this->flag){
				$this->load->view('dash',$data);
			}
		}

		public function good_manage($var)
		{
			if($this->flag){
				$data = Array();
				/*显示商品列表的判断*/
				if($var === 'good_list')
				{
					$data = Array(
						'goods' => $this->Op_good_model->get_last_ten_goods(),
					);
				}
				if($var === 'good_new')
				{
					$data = Array(
						'class' => $this->Op_good_model->get_class(),
					);
				}
				if($var === 'good_class')
				{
					$data = Array(
						'class' => $this->Op_good_model->get_class(),
					);
				}
				$this->load->view("good_manage/".$var,$data);
				$this->load->view('footer');
			}

		}
		public function goods_picture(){
			$data = Array();
			$this->load->view("good_manage/goods_picture",$data);
			$this->load->view('footer');
		}
		//添加新商品的检验
		public function check_new_good(){
			$this->form_validation->set_error_delimiters('<font style="color:red"> ERROR:', '</font>');
			$data = Array();
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
					'field' => 'description',
					'label' => '描述',
					'rules' => 'required|min_length[3]|max_length[100]'
				),
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE){
				$this->good_manage('good_new');
			}
			//将数据插入至数据库
			else{
				$this->load->model('Op_good_model');
				$row = Array(
					'name' => $this->input->post('name'),
					'prices' => $this->input->post('prices'),
					'picture' => $this->input->post('name').'.jpg',
					'description' => $this->input->post('description'),
				);
				$this->Op_good_model->insert_good($row);
				$good_id = $this->Op_good_model->get_max('id','goods');
				$this->Op_good_model->update_class($good_id,$this->input->post('class'));
			}
			$config['upload_path']      = './uploads/';
			$config['allowed_types']    = 'gif|jpg|png';
			$config['max_size']    			= 1000;
			$config['max_width']        = 1900;
			$config['max_height']       = 1900;
			$config['file_name']       = iconv("UTF-8","gbk",$this->input->post('name'));

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('file'))
			{
				$data = array('tips' => $this->upload->display_errors());
				$this->load->view('board',$data);
			}
			else
			{
				$data = array('tips' => '提交成功','upload_data' => $this->upload->data());
				$this->load->view('board',$data);
			}
		}
	}
