<?php
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/19
 * Time: 20:22
 */
require('MY_Controller.php');
class Setting extends My_Controller
{
	/**
	 * @var array 记录类名
	 */
	private $data = array('Class' => __CLASS__);
	public function __construct(){
		parent::__construct();
		$this->load->model('Op_address');
		$this->load->model('Op_admin');
	}
	public function must_address()
	{
		$this->load->view('header');
		$this->load->view('sidermenu');
		$this->data['function'] = __FUNCTION__;
		$this->data['address_list'] = $this->Op_address->get_must_address();
		$this->load->view('setting/must_address',$this->data);
	}
	public function user_address()
	{
		$this->load->view('header');
		$this->load->view('sidermenu');
		$this->data['function'] = __FUNCTION__;
		$this->data['address_list'] = $this->Op_address->get_user_address();
		$this->load->view('setting/user_address',$this->data);
	}
	public function admin()
	{
		$this->load->view('header');
		$this->load->view('sidermenu');
		$this->data['function'] = __FUNCTION__;
		$this->data['admin'] = $this->Op_admin->get_admin_byid($_SESSION['id']);
		$this->load->view('setting/admin',$this->data);
	}

	public function delete_must_address()
	{
		if($this->Op_address->delete_must_address($this->input->post('NO'))){
			echo "删除成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}
	public function delete_user_address()
	{
		if($this->Op_address->delete_user_address($this->input->post('NO'))){
			echo "删除成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}

	public function add_must_address()
	{
		if($this->Op_address->add_must_address($this->input->post('data'))){
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}
	public function add_user_address()
	{
		if($this->Op_address->add_user_address($this->input->post('data'))){
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}

	public function edit_must_address()
	{
		if($this->Op_address->edit_must_address($this->input->post('NO'),$this->input->post('data')))
		{
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}
	public function edit_user_address()
	{
		if($this->Op_address->edit_user_address($this->input->post('NO'),$this->input->post('data')))
		{
			echo "操作成功";
		}else{
			echo "操作失败,请联系网站开发者.错误链接:".base_url().__CLASS__."/".__FUNCTION__;
		}
	}

	public function set_admin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$repassword=$this->input->post('repassword');
		if($username && $password && $repassword && $password == $repassword){
			$new_password = password_hash($password, PASSWORD_DEFAULT);
			if($this->Op_admin->set_admin($username,$new_password)){
				alert('修改成功');
				session_destroy();
				redirect('admin/');
			}
		}else{
			alert("修改失败");
		}
		go_history();
	}

	public function deliver()
	{
		$this->load->view('header');
		$this->load->view('sidermenu');
		$this->data['function'] = __FUNCTION__;
		$this->data['deliver'] = $this->Op_deliver->get_deliver();
		$this->load->view('setting/deliver',$this->data);
	}

	public function sure_member($deliver_id)
	{
		if($this->Op_deliver->sure($deliver_id)){
			alert('激活成功');
			go_history();
		}else{
			$this->output->set_output('激活失败');
		}
	}

	public function delete_member($deliver_id)
	{
		if($this->Op_deliver->delete($deliver_id)){
			alert('删除成功');
			go_history();
		}else{
			$this->output->set_output('激活失败');
		}
	}

}