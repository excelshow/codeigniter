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
		if(!isset($_SESSION['logged_in']))
		{
            redirect('');
		}
		else if($_SESSION['logged_in'] != TRUE){
            redirect('');
		}else {
            $this->load->model('Op_goods');
            $this->load->model('Op_user');
            $this->load->model('Op_order');
            $this->load->helper(array('form', 'url'));
        }
	}
	/**
	* 显示主页仪表盘
	* @return null
	*/
	public function index()
    {
        $this->load->view('header');
        $this->load->view('sidermenu');
        $this->lists();//用作神奇的继承函数
        $this->load->view('footer');
    }
    //与子类进行兼容，简化代码
    public function lists()
    {
        $this->load->view('dashboard');
	}
}
