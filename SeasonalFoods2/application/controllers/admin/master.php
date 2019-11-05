<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $display["body"] = $this->load->view("admin/pages_admin/master",null,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
	}
}
?>