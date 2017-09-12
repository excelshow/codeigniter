<?php
class Op_goods extends CI_Model {
    /**
     * @var string 商品表名
     */
    private $goods_table_name='goods';

    /**
     * Op_good_model constructor.
     * 构造函数负责加载数据库配置
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function get_max($column,$table)
    {
        $this->db->select_max($column);
        $query = $this->db->get($table);
        foreach ($query->result() as $row)
        {
            $data=$row->$column;
        }
        return $data;
    }
    /**
     * @return mixed 最新的十个商品
     */
    public function get_last_ten_goods()
    {
        $query = $this->db->query("SELECT * FROM goods_view");
        return $query->result_array();
    }

    /**
     * @return array 商品类数组
     */
    public function goods_class()
    {
        $query = $this->db->get('goods_class');
        return $query->result_array();
    }
    /**
     * @param $class 商品类名
     * @return array 商品列表数组
     */
    public function get_goods_byclass($class)
    {
        $class = urldecode($class);
        $query = $this->db->query("SELECT * FROM goods_view where class='$class'");
        return $query->result_array();
    }
    /**
     * insert_good 将商品信息插入至商品表
     * @param $row
     */
    public function insert_good($goods_data)
    {
        if($this->db->insert($this->goods_table_name, $goods_data)){
            return true;
        }else{
            return false;
        }
    }
    /**
     * delete_goods 根据商品id删除商品
     * @param $id 商品
     */
    public function delete_goods($id){
        $this->db->delete($this->goods_table_name, array('id' => $id));
    }

    public function goods_detail($goods_id)
    {
        $query = $this->db->query("SELECT * FROM goods,goods_content WHERE goods.id=goods_content.goods_id AND id = '$goods_id' LOCK IN SHARE MODE");
        return $query->result_array();
    }

    public function update_class($goods_id,$class)
    {
        if($this->db->query("INSERT INTO map_class_id(class, id) VALUES ('$class', '$goods_id')")){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function update_content($goods_id,$function,$eat,$save)
    {
        if($this->db->query("INSERT INTO goods_content(goods_id,function,eat,save) VALUES ('$goods_id','$function','$eat','$save')")){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function replace_content($data)
    {
        if($this->db->replace('goods_content', $data))
        {
            return TRUE;
        }
        return FALSE;
    }

    public function guess_like($user_id)
    {
        $query = $this->db->get($this->goods_table_name,1);
        return $query->result_array();
    }

    public function recommend()
    {
        $query = $this->db->get($this->goods_table_name,3);
        return $query->result_array();
    }

    public function search($data)
    {
        $class = urldecode($data);
        $query = $this->db->query("SELECT * FROM goods_view where name LIKE '%$class%'");
        return $query->result_array();
    }
    /**
     * update_goods
     * @param $row
     * @return bool
     * 更新商品列信息
     */
    public function update_goods($row)
    {
        if($this->db->replace($this->goods_table_name, $row))
        {
            return TRUE;
        }
        return FALSE;
    }
    /**
     * add_class
     * @param $class_name 商品类名
     * 添加商品类别的模块
     */
    public function add_class($class_name)
    {
        if($this->db->insert('goods_class',array('class'=>$class_name))){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * delete_class
     * @param $class_name
     * 删除商品类的模块
     */
    public function delete_class($class_name)
    {
        $this->db->delete('goods_class',array('class'=>$class_name));
        return TRUE;
    }
    /**
     * edit_class
     * @param $class_name 商品类名
     * 编辑商品类别的模块
     */
    public function edit_class($old_class_name,$new_class_name)
    {
        $str = "UPDATE goods_class set class='$new_class_name' WHERE class='$old_class_name'";
        //执行sql语句
        $this->db->query($str) ;
        //获取影响行数
        $num = $this->db->affected_rows() ;
        if( $num ){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function judge_goods_comment($user_id,$goods_id)
    {
        $order_list = $this->db->select('order_id')->from('orders')->where('user_id', $user_id)->get();
        $orders = array();
        foreach ($order_list->result_array() as $order_id){
            array_push($orders,$order_id['order_id']);
        }
        $goods_list = $this->db->select('goods_id')->from('order_content')->where('goods_id',$goods_id)->where_in('order_id',$orders)->get();
        if(count($goods_list->result_array()) ==  0){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function save_goods_comment($user_id,$goods_id,$comment)
    {
        $data = array(
            'user_id' => $user_id,
            'goods_id' => $goods_id,
            'comment' => $comment,
            'reply' => '谢谢您的评论，您的关注是我们最大的支持',
            'time' => time()
        );
        if($this->db->insert('goods_comment', $data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * get_comment 获取评论，含用户信息
     * @param $goods_id
     * @return mixed
     */
    public function get_comment($goods_id)
    {
            $query = $this->db->where('goods_id',$goods_id)->get('goods_comment_view');
        return $query->result_array();
    }

    public function get_stock()
    {
        $query = $this->db->select('id,name,pre_input,have,num')->from('goods')->get();
        return $query->result_array();
    }

    public function get_filenum($goods_id)
    {
        $query = $this->db->select('filenum')->from('goods')->where('id',$goods_id)->get();
        return $query->row()->filenum;
    }
    /**
     * get_new_comment
     * 获取待回复的订单评论
     */
    public function get_new_comment($show=FALSE){
        $comment_list = $this->db->select('*')->from('goods_comment_view')->where(array('reply' =>'谢谢您的评论，您的关注是我们最大的支持'))->get();
        $num = count($comment_list->result_array());
        if($show){if($num != 0) echo $num;}
        return $comment_list->result_array();
    }
    /**
     * get_comment
     * @param $order_id
     * @return mixed
     * 获取单个商品评论
     */
    public function get_goods_comment($comment_id)
    {
        $query=$this->db->query("SELECT comment from goods_comment_view WHERE comment_id='$comment_id'");
        return $query->row()->comment;
    }
    public function reply_comment($comment_id,$reply)
    {
        $this->db->query("update goods_comment set reply='$reply' WHERE comment_id='$comment_id'");
        return $this->db->affected_rows();
    }
    /**
     * 获取预入库数量
     * @return [type] [description]
     */
    public function get_pre_input($goods_id)
    {
      $query=$this->db->query("SELECT pre_input from goods WHERE id='$goods_id'");
      return $query->row()->pre_input;
    }
    public function input($goods_id,$input){
      if($input == ''){
        return false;
      }
      $pre_input =  $this->get_pre_input($goods_id);
      $sub = $input - $pre_input;
      //如果入库数大于预入库数
      if( $sub > 0){
          $this->db->query("update goods set pre_input=0,have=have + '$input' WHERE id='$goods_id'");
      }else if ($sub < 0) {//如果入库数小于预入库数
          $this->db->query("update goods set pre_input=pre_input - '$input',have=have + '$input' WHERE id='$goods_id'");
      }
      return TRUE;
    }
    public function pre_input($goods_id,$pre_input){
      if($pre_input == ''){
        return false;
      }
      $this->db->query("update goods set pre_input=pre_input + '$pre_input' WHERE id='$goods_id'");
      return TRUE;
    }

    public function col_add_one($goods_id)
    {
        $this->db->query("update goods set filenum=filenum + 1 WHERE id='$goods_id'");
    }
    public function col_sub_one($goods_id)
    {
        $this->db->query("update goods set filenum=filenum - 1 WHERE id='$goods_id'");
    }
}
?>
