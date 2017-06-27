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

    /**
     * @return mixed 最新的十个商品
     */
    public function get_last_ten_goods()
    {
        $data_good = Array();
        $table = array($this->goods_table_name,'map_class_id');
        $query = $this->db->query('SELECT * FROM goods,map_class_id WHERE goods.id=map_class_id.id');
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
        $query = $this->db->query("SELECT * FROM goods,map_class_id WHERE goods.id=map_class_id.id AND class = '$class'");
        return $query->result_array();
    }

    /**
     * insert_good 将商品信息插入至商品表
     * @param $row
     */
    public function insert_good($goods_data)
    {
        $this->db->insert($this->goods_table_name, $goods_data);
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
}
?>
