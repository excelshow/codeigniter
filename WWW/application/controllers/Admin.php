<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	 * 判断是否登陆的标志
	 * @var boolean
	 */
	private $judge;
	/**
	* 这就是一个普通的构造函数
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper('url');
		if(!isset($_SESSION['logged_in']))
		{
			$this->judge=FALSE;
		}
		else if($_SESSION['logged_in'] === TRUE){
			$this->judge=TRUE;
		}
		if($this->judge === TRUE)
		{
			$this->load->model('Op_good_model');
			$this->load->view('header');
			$this->load->view('sidermenu');
			$this->load->helper(array('form', 'url'));
		}
		else{
			$this->load->view('tip');
		}
	}
	/**
	* 显示主页仪表盘
	* @return null
	*/
	public function index()
	{
		if($this->judge)
		{
			$data=Array(
				'goods_count_all' => $this->Op_good_model->get_count_all('goods'),
				'class_count_all'=> $this->Op_good_model->get_count_all('class'),
			);
			$this->load->view('dash',$data);
		}
	}
}
