<?php
class Op_admin extends CI_Model {

   public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }
    public function get_admin()
    {
    	$query = $this->db->get('Administrator');
    	return $query;
    }
}