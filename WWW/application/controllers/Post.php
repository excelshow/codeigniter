<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'WeixinPay.php';
class Post extends CI_Controller {
    /**
     * @var string 小程序的appid
     */
    private $app_id="wx50e06fc628202675";
    /**
     * @var string 小程序的密钥
     */
    private $app_secret="8816392b4528ceb7c6b48912789c8148";
    /**
     * @var string 微信支付商户号
     */
    private $mch_id='1484436742';
    /**
     * @var string 微信支付商户密钥
     */
    private $mch_key='xy34id0jq0mxw8640sdjiyr654sdu9mv';
    /**
     * Generate_orderid
     * @param $user_id 用户唯一openid
     * @return string 订单号
     * 根据用户唯一openid及当前时间生成订单号
     */
    private function Generate_orderid($user_id){
        $time=strftime("%Y%m%d",time());
        $user_no=$this->Op_user->get_user_no($user_id);
        $user_num=$this->Op_user->get_user_num($user_id);
        return $time.$user_no.$user_num;
    }

    /**
     * get_openid
     * @param $codes 用户代码
     * @return mixed 用户唯一openid
     */
    private function get_openid($codes)
    {
        $url="https://api.weixin.qq.com/sns/jscode2session?appid=".$this->app_id."&secret=".$this->app_secret."&js_code=".$codes."&grant_type=authorization_code";
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
    public function index()
    {
        $openid = $this->get_openid($this->input->get('code'));
        $request = array(
            'openid' => $openid,
            'status' => $this->Op_user->get_status($openid),
        );
        echo json_encode($request);
    }

    /**
     * get_status
     * @param $openid 用户openid
     * 输出用户认证状态
     */
    public function get_status($openid)
    {
        $data = array(
            'status' => $this->Op_user->get_status($openid),
        );
        echo json_encode($data);
    }
	public function sure_order($order_id)
    {
        $this->Op_order->sure($order_id);
    }
    /**
     * order 下单接口，对接微信小程序的下单请求
     */
    public function order(){
        $openid=$this->input->get('userId');
        $order_id=$this->Generate_orderid($openid);
        $order_info = json_decode($this->input->get('orderInfo'),true);
        $money = $order_info['summation'];
        $data = array(
            'order_id' => $order_id,
            'user_id' => $openid,
            'orderInfo' => $this->input->get('orderInfo'),
            'money' => $money,
            'datetime' => $order_info['expected_arrive_time'],
            'pay_way' => $order_info['pay_way'],
        );
        //如果订单插入成功，则进行商品解析并插入
        if($this->Op_order->insert_order($data))
        {
            $goods_list = $order_info['goods_list'];
            $data_list =array();
            foreach($goods_list as $goods)
            {
                $data=array(
                    'order_id' => $order_id,
                    'goods_id' => (int)$goods['id'],
                    'select_num' => $goods['select_num']
                );
                array_push($data_list, $data);
            }
            if($this->Op_order->insert_order_content($data_list))
            {
                $weixinpay = new WeixinPay($this->app_id,$openid,$this->mch_id,$this->mch_key,$order_id,"购买商品",floatval($money*100));
                $return=$weixinpay->pay();
                echo json_encode($return);
                return true;
            }
            return false;
        }

    }
	/**
     * order 下单接口，对接微信小程序的取消订单请求

	public function cancleOrder(){
		$order_id = $this->input->get('order_id') ;
		$return = WeixinPay::closeOrder($this->app_id, $this->mch_id, $order_id) ;
		echo json_encode($return) ;
		return true ;
	}
	*/
	 
	 
	 
    /**
     * register 接受注册请求
     */
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

    /**
     * pay 支付时需请求的函数
     * 完成支付拉取功能
     */
//public function pay(){
//		$appid='wx50e06fc628202675';
//		$openid= $_GET['id'];
//		$mch_id='1484436742';
//		$key='xy34id0jq0mxw8640sdjiyr654sdu9mv';
//		$out_trade_no = $mch_id. time();
//		$total_fee = $_GET['total_fee'];
//        $body = "购买商品";
//        $total_fee = floatval($total_fee*100);
//        $weixinpay = new WeixinPay($appid,$openid,$mch_id,$key,$out_trade_no,$body,$total_fee);
//        $return=$weixinpay->pay();
//        echo json_encode($return);
//	}

    /**
     * notice 验证是否支付
     * @return bool
     */
    public function notice()
    {
        $postXml = $GLOBALS["HTTP_RAW_POST_DATA"]; //接收微信参数
        if (empty($postXml)) {
            return false;
        }
        //将xml格式转换成数组
        function xmlToArray($xml) {
            //禁止引用外部xml实体
            libxml_disable_entity_loader(true);
            $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
            $val = json_decode(json_encode($xmlstring), true);
            return $val;
        }
        $attr = xmlToArray($postXml);
//        $total_fee = $attr[total_fee];
//        $open_id = $attr[openid];
        $out_trade_no = $attr[out_trade_no];
//        $time = $attr[time_end];
        $this->Op_order->settlement($out_trade_no);
		echo "<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>";
    }
}

