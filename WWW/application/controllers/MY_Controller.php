<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {
	/**
	* 这就是一个普通的构造函数
	*/
	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form', 'url'));
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
            $this->load->model('Op_deliver');
        }
	}
}
