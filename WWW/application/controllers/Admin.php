<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	* 这就是一个普通的构造函数
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] !== TRUE)
		{
			$data =Array('content' =>'你当前并未登录,或');
			$this->load->view('tip',$data);
		}
		else{
			$this->load->model('Op_good_model');
			$this->load->view('header');
			$this->load->view('sidermenu');
			$this->load->helper(array('form', 'url'));
		}
	}
	/**
	* 显示主页仪表盘
	* @return null
	*/
	public function index()
	{
		if($_SESSION['logged_in'] === TRUE)
		{
			$data=Array(
				'goods_count_all' => $this->Op_good_model->get_count_all('goods'),
				'class_count_all'	=> $this->Op_good_model->get_count_all('class'),
			);
			$this->load->view('dash',$data);
		}
	}
}
