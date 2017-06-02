<?php
class Op_good_model extends CI_Model {

   public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function get_last_ten_goods()
    {
        $data_good = Array();
        $query = $this->db->get('goods', 10);
        foreach ($query->result() as $row)
        {
            $data = Array(
                'name' => $row->name,
                'prices' => $row->prices,
                'description' => $row->description,
                'num' => $row->num,
                );
            array_push($data_good, $data);
        }
        return $data_good;
    }

    public function insert_good($row)
    {
        $this->db->insert('goods', $row);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
    public function get_good()
    {
        $data_good = Array();
        $query = $this->db->get('goods');
        foreach ($query->result() as $row)
        {
            $data = Array(
                'selected_num'=>0,
                'name' => $row->name,
                'prices' => $row->prices,
                'description' => $row->description,
                'num' => $row->num,
                );
            array_push($data_good, $data);
        }
        return $data_good;
    }

}
?>
