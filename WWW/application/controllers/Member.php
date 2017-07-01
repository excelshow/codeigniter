<?php
require('Admin.php');
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/6/27
 * Time: 16:31
 */
class Member extends Admin{
    public function __construct(){
        parent::__construct();
        $this->load->model('Op_user');
    }

    public function lists()
    {
        $data = array('user_lists' => $this->Op_user->get_lists());
        $this->load->view('user/lists',$data);
    }

    public function unlists()
    {
        $data = array('user_lists' => $this->Op_user->get_unlists());
        $this->load->view('user/lists',$data);
    }
}