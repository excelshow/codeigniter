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
        $this->load->helper('file');
        // Your own constructor code
    }

    public function get_status($order_id)
    {
        $query = $this->db->query("SELECT status FROM orders WHERE order_id='$order_id'");
        return $query->row()->status;
    }
    public function get_info($order_id)
    {
        $query = $this->db->query("SELECT money,pay_way,orderInfo,type FROM orders WHERE order_id='$order_id'");
        return $query->row_array();
    }

    /**
     * @param $order_id  订单号
     * @return mixed 订单详情
     */
    public function order_detail($order_id){
        $query = $this->db->query("SELECT id,name,prices,select_num,stocked,act_num FROM order_content,goods WHERE order_content.goods_id = goods.id AND order_content.order_id='$order_id'");
        return $query->result_array();
    }

    /**
     * @return mixed
     */
    public function get_order($dist,$type){

        if($dist == 'a'){
            $query = $this->db->get_where($this->order_table_name,array('type' => $type));
        }else{
            $query = $this->db->order_by('datetime','DEC')
                ->get_where($this->order_table_name,array('status' => $dist,'type' => $type));
        }
        return $query->result_array();
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

    public function get_orders($user_id,$dist)
    {
		if( $dist != 'all'){
        $query = $this->db->query("SELECT order_id,orderInfo,status FROM orders WHERE user_id='$user_id' AND status='$dist'");
        }else{
			$query = $this->db->query("SELECT order_id,orderInfo,status FROM orders WHERE user_id='$user_id'");
		}
		return array_reverse($query->result_array());
    }

	public function delete_order($order_id)
	{
        $this->db->query("delete from orders where order_id='$order_id'");
//        echo $this->db->affected_rows();
		if( $this->db->affected_rows() == 1 )
			return true ;
		else return false ;
	}

    public function settlement($order_id)
    {
		$this->db->query("update orders set status=1 where order_id='$order_id' AND status=0") ;
		$num = $this->db->affected_rows() ;
        if( $num ){
			$query = $this->db->query("select goods_id , select_num from order_content where order_id = '$order_id'");
			foreach ( $query->result as $row ){
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
            $title = '序号|商品名 ---- 单价*下订量>> 下订金额  --- 实际量 --- 金额偏差 ';
            $this->write_orderfile($file_name,$title);
            foreach ($result as $item){
                $i++;
                $str = $i.'.   '.$item['name']." ----- ".$item['prices'].' *  '.$item['select_num'].' --->> '.$item['prices']*$item['select_num']."    ----  ".$item['act_num']." ---- ".($item['act_num']-$item['select_num'])*$item['prices']."\r\n";
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

    public function stocking_goods($order_id,$goods_id,$act_num)
    {
        $this->db->set(array('stocked' => 1,'act_num'=> $act_num))->where(array('goods_id' => $goods_id,'order_id' => $order_id))->update('order_content');
        if($this->db->affected_rows() >= 1){
            $this->output->set_output('已完成');
        }
    }

    public function stocked($order_id)
    {
        $this->db->query("update orders set status='2' WHERE status='1' AND order_id='$order_id'");
    }
    public function get_orderid_list($dist)
    {
        $query = $this->db->query("SELECT order_id FROM orders WHERE status = '$dist' OR status = '2' ORDER BY datetime ASC");
        return $query->result_array();
    }
    public function next_order($order_id,$dist)
    {
        $this->stocked($order_id);
        $data = array('order_id'=>$order_id);
        $list = $this->get_orderid_list($dist);
        $site = array_search($data,$list);
        $site++;
        if($site < count($list)){
            return $list[$site]['order_id'];
        }else{
            return "end";
        }
    }

    public function get_deliver()
    {
        $query = $this->db->select('name')->from('deliver')->get();
        return $query->result_array();
    }

    public function judge_order_comment($order_id)
    {
        $valid_time = strtotime("-7 day")*1000;
        $query =$this->db->query("SELECT * FROM orders WHERE order_id='$order_id' AND datetime>='$valid_time' AND status='-1'");
        if(count($query->result_array()) == 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }
//待完善
    public function save_order_comment($order_id,$comment)
    {
        $query=$this->db->query("update orders set comment='$comment',reply='谢谢您的评论，您的关注是我们最大的支持' WHERE order_id='$order_id'");
        return TRUE;
    }

    /**
     * get_comment
     * @param $order_id
     * @return mixed
     * 获取单个订单评论
     */
    public function get_comment($order_id)
    {
        $query=$this->db->query("SELECT comment,reply from orders WHERE order_id='$order_id'");
        return $query->result_array();
    }

    /**
     * get_new_comment
     * 获取待回复的订单评论
     */
    public function get_new_comment($show=FALSE){
        $comment_list = $this->db->select('order_id,comment')->from('orders')->where(array('reply' => '谢谢您的评论，您的关注是我们最大的支持'))->get();
        $num = count($comment_list->result_array());
        if($show){
            if($num != 0) echo $num;
        }
        return $comment_list->result_array();
    }

    /**
     * reply_comment 回复记录
     * @param $order_id
     * @param $reply
     * @return bool
     */
    public function reply_comment($order_id,$reply)
    {
        $query=$this->db->query("update orders set reply='$reply' WHERE order_id='$order_id'");
        return true;
    }

    /**
     * get_comment_list
     * @return mixed
     * 获取评论列表
     */
    public function get_comment_list()
    {
        $comment_list = $this->db->select('order_id,comment,reply')->from('orders')->where(array('reply !=' => NULL,'comment !=' => NULL))->get();
        return $comment_list->result_array();
    }

    public function get_today_earning()
    {
        $beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'))*1000;
        $endToday=(mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1)*1000;
        $query = $this->db->select_sum('money')->where(array('status !=' => '0','orderTime >=' => $beginToday,'orderTime <=' => $endToday))->get($this->order_table_name);
        if($query->row()->money == NULL){
            echo 0;
        }else{
            echo $query->row()->money;
        }
//        echo $beginToday;
//        exec('top -b -n 1 -d 3',$out);
//        $Cpu = explode('  ', $out[2]);
//        $Mem = explode('  ', $out[3]);
//        $Swap = explode('  ', $out[4]);
//        //var_dump($Cpu,$Mem,$Swap);
//
//        $cpu = str_replace(array('%us,',' '),'',$Cpu[1]);
//        $mem = str_replace(array('k used,',' '),'',$Mem[2]);
//        $swap = str_replace(array('k cached',' '),'',$Swap[5]);
//        echo date('md H').' '.$cpu.'    '.intval($mem/1024).'   '.intval($swap/1024).chr(10);
    }

    public function get_expired_order($dist=FALSE)
    {
        $query = $this->db->select('order_id,user_name,orderTime,type,user_phone')->from('orders')->join('user','user.user_id = orders.user_id')->where(array('datetime <=' => time()*1000,'orders.status' => '1'))->get();
        $num = count($query->result_array());
        if($dist){
            if($num != 0) echo $num;
        }
        return $query->result_array();
    }

	public function end_order($order_id)
	{
		$this->db->query("update orders set status='-1' WHERE order_id='$order_id'");
		if($this->db->affected_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
    }
}
