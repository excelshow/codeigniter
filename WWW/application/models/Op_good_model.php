<?php
class Op_good_model extends CI_Model {

  private $goods_table_name='goods';


  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    // Your own constructor code
  }
  //get方法
  public function get_last_ten_goods()
  {
    $data_good = Array();
    $table = array($this->goods_table_name,'map_class_id');
//    $where = array('goods.id' => map_class_id.id);
//    $query = $this->db->get_where($table,$where);
    $query = $this->db->query('SELECT * FROM goods,map_class_id WHERE goods.id=map_class_id.id');

    foreach ($query->result() as $row)
    {
      $data = Array(
        'id' => $row->id,
        'name' => $row->name,
        'picture' => $row->picture,
        'prices' => $row->prices,
        'description' => $row->description,
        'class' => $row->class,
        'num' => $row->num,
      );
      array_push($data_good, $data);
    }
    return $data_good;
  }
  public function get_class()
  {
    $data = Array();
    $query = $this->db->get('class');
    foreach ($query->result() as $row)
    {
      array_push($data,$row->class);
    }
    return $data;
  }
  /**
   * get the table line
   * @param  [type] $table  [description]
   * @return int         the sum
   */
  public function  get_count_all($table){
    return $this->db->count_all($table);
  }
  public function get_good()
  {
    $data_good = Array();
    $query = $this->db->get($this->goods_table_name);
    foreach ($query->result() as $row)
    {
      $data = Array(
        'good_id'=>$row->id,
        'name' => $row->name,
        'picture' => $row->picture,
        'prices' => $row->prices,
        'description' => $row->description,
        'num' => $row->num,
      );
      array_push($data_good, $data);
    }
    return $data_good;
  }
  //get the max value
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
  //insert方法
  public function insert_good($row)
  {
    $this->db->insert($this->goods_table_name, $row);
  }
  //update方法
  public function update_class($good_id,$class)
  {
    $data = array(
      'id' => $good_id,
      'class' => $class,
    );
    $this->db->insert('map_class_id', $data);
  }
  /**
   * delete_goods by id
   * @param  int $id [description]
   * @return  [type]     [description]
   */
  public function delete_goods($id){
    $this->db->delete($this->goods_table_name, array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
  }
}
?>
