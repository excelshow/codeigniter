<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	public function __construct()
    {
      parent::__construct();
    }
	public function index(){
		echo '我已收到您的数据'.$this->input->get('user_Info');
	}
  }
?>
