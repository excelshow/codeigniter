<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		if($this->flag){
			$this->load->view('dash');
		}

	}

	public function good_manage($var)
	{
		if($this->flag){
			$data = Array();
			$this->load->model('Op_good_model');
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
		$this->load->view("good_manage/".$var,$data);
		$this->load->view('footer');
		}

	}
	//添加新商品的检验
	public function check_new_good(){
			$this->form_validation->set_error_delimiters('<font style="color:red"> ERROR:', '</font>');
			$data = Array(
				'tips' => '上传成功',
				);
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
        			'description' => $this->input->post('description'),
        			);
        		$this->Op_good_model->insert_good($row);
						$good_id = $this->Op_good_model->get_max('id','goods');
						$this->Op_good_model->update_class($good_id,$this->input->post('class'));
        		$this->load->view('board',$data);
        	}
		}
}
