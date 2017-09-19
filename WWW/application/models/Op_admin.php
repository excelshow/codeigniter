<?php
class Op_admin extends CI_Model {
private $administrator_table_name='administrator';
   public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }
    public function get_admin()
    {
    	$query = $this->db->get($this->administrator_table_name);
    	return $query;
    }
    public function get_admin_byid($id)
    {
	    $query = $this->db->select('*')->from($this->administrator_table_name)->where('id', $id)->get();
    	return $query->result_array();
    }

	public function set_admin($username,$password)
	{
		if($this->db->where('id',$_SESSION['id'])->update($this->administrator_table_name,array('username' => $username,'password' => $password))){
			return TRUE;
		}else{
			return FALSE;
		}
    }

}