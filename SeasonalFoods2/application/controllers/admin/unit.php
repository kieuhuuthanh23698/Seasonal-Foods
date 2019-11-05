<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class unit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $query = "select * from unit";
        $data["units"] = $this->M_data->load_query($query);
        $display["body"] = $this->load->view("admin/pages_admin/unit",$data,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
	}
    
}
?>