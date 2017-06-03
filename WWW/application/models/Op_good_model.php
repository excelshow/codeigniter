<?php
class Op_good_model extends CI_Model {

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
        $query = $this->db->get('goods', 10);
        foreach ($query->result() as $row)
        {
            $data = Array(
                'id' => $row->id,
                'name' => $row->name,
                'prices' => $row->prices,
                'description' => $row->description,
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

    public function get_good()
    {
        $data_good = Array();
        $query = $this->db->get('goods');
        foreach ($query->result() as $row)
        {
            $data = Array(
                'good_id'=>$row->id,
                'name' => $row->name,
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
        $this->db->insert('goods', $row);
    }
    //update方法
    public function update_class($good_id,$class)
    {

      $data = array(
      'id' => $good_id,
      'class' => $class,
    );
    $this->db->insert('class_id_map', $data);
    }
}
?>
