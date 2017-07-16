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
	private function write_orderfile($file_name,$str){
        if ( ! write_file('./download/'.$file_name, $str."\r\n",'a')) {
            echo '文件写入权限不足，请联系管理员<br />';
        }
    }
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
public function get_info($order_id)
    {
        $query = $this->db->query("SELECT money,pay_way,orderInfo FROM orders WHERE order_id='$order_id'");
        return $query->row_array();
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

    public function get_orders($user_id,$dist='')
    {
		if( $dist != ''){
        $query = $this->db->query("SELECT order_id,orderInfo,status FROM orders WHERE user_id='$user_id' AND status='$dist'");
        }else{
			$query = $this->db->query("SELECT order_id,orderInfo,status FROM orders WHERE user_id='$user_id'");
		}
		return array_reverse($query->result_array());
    }
	
	public function delete_order($order_id)
	{
		if( $this->db->query("delete from orders where order_id='$order_id'") )
			return true ;
		else return false ;
	}
	
    public function settlement($order_id)
    {
		$this->db->query("update orders set status=1 where order_id='$order_id' AND status=0") ;
		$num = $this->db->affacted_rows() ;
        if( $num ){
			$query = $this->db->query("select goods_id , select_num from order_content where order_id = '$order_id'");
			foreach ( $query->$result as $row ){
				$id = $row->goods_id ;
				$num = $row->select_num ;
				$this->db->query("update goods set num = num - $num where id = '$id'");
			}
            return TRUE;
        }else return FALSE;
	
    }

    public function sure($order_id)
    {	
		//生成sql语句
		$data = array('status' => '-1' );
		$where = "order_id = '$order_id' AND status = '1'";
		$str = $this->db->update_string('orders', $data, $where);
		//执行sql语句
		$this->db->query($str) ;
		//获取影响行数
		$num = $this->db->affected_rows() ;
        if( $num ){
            echo "<div style='color:#1920ff'>已完成</div>";
            return TRUE ;
        }else{
			echo "<div style='color:red'>未支付</div>";
			return FALSE ;
		}
    }
public function together($orders)
    {
        $query = $this->db->select('name')->select_sum('select_num')
            ->from('order_content')
            ->join('goods', 'order_content.goods_id = goods.id')
            ->group_by('goods_id')
            ->where_in('order_id', $orders)
            ->get();
        return $query->result_array();
    }

    public function write_detail($file_name,$orders)
    {

        foreach ($orders as $order){
            $i = 0;
            $result = $this->order_detail($order);
            $this->write_orderfile($file_name,"***********************\r\n订单号:".$order."\r\n//\r\n");
            foreach ($result as $item){
                $i++;
                $str = $i.'.'.$item['name']." ---- ".$item['prices'].'*'.$item['select_num'].' >> '.$item['prices']*$item['select_num']."\r\n";
                $this->write_orderfile($file_name,$str);
            }
            $order_info = $this->get_info($order);
            $orderInfo = json_decode($order_info['orderInfo'],true);
            $money          =   "总金额:          ".$order_info['money']."\r\n";
            $pay_way        =   "支付方式:        ".$order_info['pay_way']."\r\n";
            $user           =   "客户:            ".$orderInfo['Address']['userName']."\r\n";
            $phone          =   "客户联系方式:     ".$orderInfo['Address']['telNumber']."\r\n";
            $detail_address =   "客户详细地址:     ".$orderInfo['Address']['detailInfo']."\r\n";
            $this->write_orderfile($file_name,$money.$pay_way.$user.$phone.$detail_address."\r\n***********************\r\n\r\n\r\n");
        }
        $this->load->helper('download');
        force_download('./download/'.$file_name, NULL);
    }
	
}