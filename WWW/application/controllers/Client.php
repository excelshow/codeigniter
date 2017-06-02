<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	public function good_list(){
		$this->load->model('Op_good_model');
		$result = $this->Op_good_model->get_good();
		echo json_encode($result);
	}
}