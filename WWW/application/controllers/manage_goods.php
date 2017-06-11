<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_goods extends CI_Controller {
  /**
   * the flag check admin
   * @var boolean
   */
	private $flag=FALSE;
/**
 * is constructor function
 */
	public function __construct()
	{
		parent::__construct();
    $this->load->library('session');
		if($_SESSION['logged_in'] === TRUE){
      $this->load->model('Op_good_model');
		}else{
			$data =Array(
				'content' =>'你当前并未登录,或');
				$this->load->view('tip',$data);
			}
		}
    /**
     * for delete goods
     * @param  input $id is a id
     * @return boolean      no description
     */
    public function delete_goods($id){
      $this->load->model('Op_good_model');
      $this->Op_good_model->delete_goods($id);
      echo 'deleted successed';
    }
    public function edit_goods($id){
      
    }
  }
  ?>
