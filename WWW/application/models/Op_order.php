<?php
 date_default_timezone_set('PRC');
/**
 * Description of Op_user_model
 *
 * @author tim
 */
class Op_order  extends CI_Model{
    //put your code here
    private $order_table_name = 'orders';

    /**
     * Op_order_model constructor.
     * 订单操作模块的构造函数，负责加载数据库的配置
     */
    public function __construct()
  {
    parent::__construct();
    $this->load->database();
    // Your own constructor code
  }

    /**
     * @param $order_id  订单号
     * @return mixed 订单详情
     */
    public function order_detail($order_id){
        $query = $this->db->query("SELECT name,prices,select_num FROM order_content,goods WHERE order_content.goods_id = goods.id AND order_content.order_id='$order_id'");
       return $query->result_array();
    }

    /**
     * @return mixed
     */
    public function get_order_unkown(){
        $query = $this->db->get_where($this->order_table_name);
        return array_reverse($query->result_array());
    }
    /**
     * @param $order_id 订单号
     * @param $user_id 用户id
     * @param $user_info 用户信息
     * @return bool 返回值判断是否插入成功
     * 插入订单
     */
    public function insert_order($data){
        if($this->db->insert($this->order_table_name, $data)){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * @param $data 订单详情内容
     * 插入订单详情
     */
    public function insert_order_content($data){
        if($this->db->insert_batch('order_content', $data))
        {
            return true;
        }
        return false;
    }

    public function get_orders($user_id,$dist='%')
    {
        $query = $this->db->query("SELECT order_id,orderInfo FROM orders WHERE user_id='$user_id' AND status='$dist'");
        return array_reverse($query->result_array());
    }

    public function settlement($order_id)
    {
        if($this->db->query("update orders set status=1 where order_id='$order_id'")){
            return TRUE;
        }else return FALSE;
    }

    public function sure($order_id)
    {
        if($this->db->query("update orders set status=-1 where order_id='$order_id'")){
            echo "<div style='color:#1920ff'>已完成</div>";
            return TRUE;
        }else return FALSE;
    }
}