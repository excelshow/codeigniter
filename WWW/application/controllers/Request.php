<?php
require('Admin.php');
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/6/29
 * Time: 16:51
 */
class Request extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Op_user');
    }

    public function sure_user($user_no)
    {
        echo $this->Op_user->sure($user_no);
    }

    public function data_download()
    {
        $this->load->view("request/data_download");
    }
}