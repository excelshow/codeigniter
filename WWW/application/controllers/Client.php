<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function __construct()
	 {
			 parent::__construct();
			 $this->load->model('Op_good_model');
			 // Your own constructor code
	 }
	public function good_list(){
		$result = $this->Op_good_model->get_good();
		echo json_encode($result);
	}
	public function get_class(){
		$result = $this->Op_good_model->get_class();
		echo json_encode($result);
	}
}
