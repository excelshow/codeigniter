<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Op_order_model');
        $this->load->model('Op_user_model');
    }
    public function index(){
	$codes=$this->input->get('code');
	$url="https://api.weixin.qq.com/sns/jscode2session?appid=wxecf9aa9fecacd72d&secret=32268ca9782ea313dd0ee8a2af4ab46b&js_code=".$codes."&grant_type=authorization_code";
	//初始化
	echo file_get_contents($url);
    }
    public function order(){
        $user_info=json_decode($this->input->get('userInfo'),true);
        $order_info=$this->input->get('orderInfo');
        $time=strftime("%Y%m%d",time());
        $user_id=$user_info['userID'];
        $user_no=$this->Op_user_model->get_user_no($user_id);
        $user_num=$this->Op_user_model->get_user_num($user_id);
        $order=$time.$user_no.$user_num;
        if($this->Op_order_model->insert_order($order,$user_id,$this->input->get('userInfo'))){
            $this->Op_user_model->settlement($user_id);
        }
        $order_info = json_decode($this->input->get('orderInfo'),true);
        $goods_list = $order_info['goods_list'];
        $data_list =array();
        foreach($goods_list as $goods){
            $data=array(
                'order_id' => $order,
                'goods_id' => (int)$goods['goods_id'],
                'select_num' => $goods['select_num']
            );
            array_push($data_list, $data);
        }
        $this->Op_order_model->insert_batch($data_list);
    }
  }

