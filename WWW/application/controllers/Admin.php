<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/10 0010
 * Time: 17:29
 */
require('My_Controller.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	/**
	 * 这就是一个普通的构造函数
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->view('header');
		$this->load->view('sidermenu');
	}
	/**
	 * 显示主页仪表盘
	 * @return null
	 */
	public function index()
	{
		$this->lists();//用作神奇的继承函数
		$this->load->view('footer');
	}
	//与子类进行兼容，简化代码
	public function lists()
	{
		$this->load->view('dashboard');
	}

	public function sidermenu()
	{
		$this->load->view('sidermenu');
	}
}
