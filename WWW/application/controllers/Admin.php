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
        $this->load->view('dashboard');
        $this->load->view('footer');
	}
}
