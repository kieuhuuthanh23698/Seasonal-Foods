<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function load_query($string)
    {
        $result = $this->db->query($string);
        return $result->result_array();
    }
    public function insert($table,$data){
        $id = $this->db->insert($table,$data);
        return $this->db->insert_id();
    }
    public function update($id, $table, $data){
        $this->db->where('id',$id);
        $this->db->update($table, $data);
    }
    public function delete($id,$table){
        $this->db->where('id', $id);
        $this->db->delete($table); 
    }
}
?>