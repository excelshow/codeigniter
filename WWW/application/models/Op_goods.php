﻿<?php
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

    public function get_stock()
    {
        $query = $this->db->query("SELECT id,name,have,num FROM goods");
        return $query->result_array();
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
        $query = $this->db->query("SELECT * FROM goodsview");
        return $query->result_array();
    }

    /**
     * @return array 商品类数组
     */
    public function goods_class()
    {
        $query = $this->db->get('class');
        return $query->result_array();
    }
    /**
     * @param $class 商品类名
     * @return array 商品列表数组
     */
    public function get_goods_byclass($class)
    {
        $class = urldecode($class);
        $query = $this->db->query("SELECT * FROM goodsview where class='$class'");
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
        $query = $this->db->query("SELECT * FROM goods,goods_content WHERE goods.id=goods_content.goods_id AND id = '$goods_id'");
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
        $query = $this->db->query("SELECT * FROM goodsview where name LIKE '%$class%'");
        return $query->result_array();
    }

    public function add_have($id,$num)
    {
        if($this->db->query("update goods set have=have+$num,num=num+$num where id='$id'")){
            $query = $this->db->get_where('goods',array('id'=>$id));
            echo $query->row()->have;
            return TRUE;
        }else return FALSE;
    }

    public function add_num($id,$num)
    {
        if($this->db->query("update goods set num=num+$num where id='$id'")){
            $query = $this->db->get_where('goods',array('id'=>$id));
            echo $query->row()->num;
            return TRUE;
        }else return FALSE;
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
        if($this->db->insert('class',array('class'=>$class_name))){
            echo "添加成功";
        }
        else{
            echo "添加失败,已存在该类";
        }
    }

    /**
     * delete_class
     * @param $class_name
     * 删除商品类的模块
     */
    public function delete_class($class_name)
    {
        $this->db->delete('class',array('class'=>$class_name));
        //暂不判断成功与否
        echo "删除成功";
    }
    /**
     * edit_class
     * @param $class_name 商品类名
     * 编辑商品类别的模块
     */
    public function edit_class($old_class_name,$new_class_name)
    {
        $str = "UPDATE class set class='$new_class_name' WHERE class='$old_class_name'";
        //执行sql语句
        $this->db->query($str) ;
        //获取影响行数
        $num = $this->db->affected_rows() ;
        if( $num ){
            echo "编辑成功";
        }else{
            echo "编辑失败,未知错误";
        }
    }
}
?>
