<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
      	$this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));
    }
	public function index()
	{
		if(!isset($_SESSION['username'])){
			$this->load->view('login');
		}
		else{
			redirect('admin/');
		}
	}
	public function check_admin(){
		$this->form_validation->set_error_delimiters('<font style="color:red"> ERROR:', '</font><br />');
		$config = array(
			    array(
			        'field' => 'username',
			        'label' => '用户名',
			        'rules' => 'required|max_length[20]'
			    ),
			    array(
			        'field' => 'password',
			        'label' => '密码',
			        'rules' => 'required|max_length[10]',
			    ),
			);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE){
     			echo validation_errors();
        	}
        	else{
        		$this->load->model('Op_admin_model');
        		$admin_data = $this->Op_admin_model->get_admin();
        		$username = $this->input->post('username');
        		$password = $this->input->post('password');
        		foreach ($admin_data ->result()  as $row) {
        			# code...
        			if($username == $row->username && password_verify($password , $row->password ))
        			{
        				$newdata = array(
   							'username'  => $username,
    						'logged_in' => TRUE,
						);
        				$this->session->set_userdata($newdata);
        				redirect('admin/');
        			}
        		}
        		$data = Array(
        			'content' => $username,
        			);
        		$this->load->view('tip',$data);
        	}
	}
}
