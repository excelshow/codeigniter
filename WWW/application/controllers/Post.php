<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
    /**
     * Generate_orderid
     * @param $user_id 用户唯一openid
     * @return string 订单号
     * 根据用户唯一openid及当前时间生成订单号
     */
    private function Generate_orderid($user_id){
        $time=strftime("%Y%m%d",time());
        $user_no=$this->Op_user->get_user_no($user_id);
        $user_num=$this->Op_use->get_user_num($user_id);
        return $time.$user_no.$user_num;
    }

    /**
     * get_openid
     * @param $codes 用户代码
     * @return mixed 用户唯一openi
     */
    private function get_openid($codes){
        $appid="wxecf9aa9fecacd72d";
        $secret="32268ca9782ea313dd0ee8a2af4ab46b";
        $url="https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$codes."&grant_type=authorization_code";
        $data = json_decode(file_get_contents($url),true);
        return $data['openid'];
    }

    /**
     * Post constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Op_order');
        $this->load->model('Op_user');
    }

    /**
     * index 反馈用户状态信息
     */
    public function index(){
        $openid = $this->get_openid($this->input->get('code'));
        $request = array(
            'openid' => $openid,
            'status' => $this->Op_user->get_status($openid),
        );
        echo json_encode($request);
    }

    /**
     * order 下单函数
     */
    public function order(){
        $user_info=json_decode($this->input->get('userInfo'),true);
        $user_id=$user_info['userID'];
        $order_id = $this->Generate_orderid($user_id);
        if($this->Op_order->insert_order($order_id,$user_id,$this->input->get('userInfo'))){
            $order_info = json_decode($this->input->get('orderInfo'),true);
            $goods_list = $order_info['goods_list'];
            $data_list =array();
            foreach($goods_list as $goods){
                $data=array(
                    'order_id' => $order_id,
                    'goods_id' => (int)$goods['goods_id'],
                    'select_num' => $goods['select_num']
                );
                array_push($data_list, $data);
            }
            if($this->Op_order->insert_order_content($data_list)) {
                return true;
            }
        }
        return false;
    }
    public function register(){
        $this->load->database();
        $data = array(
            'user_id'=>$this->input->get('userID'),
            'user_name'=>$this->input->get('name'),
            'user_phone'=>$this->input->get('call'));
        if($this->db->insert('user', $data))
        {
            echo "注册消息提交成功，请等待管理员审核";
        }else{
            echo "sorry,注册消息提交失败，勿重复提交";
        }
    }
}

