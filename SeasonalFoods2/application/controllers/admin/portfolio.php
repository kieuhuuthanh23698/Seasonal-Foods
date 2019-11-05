<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $query = "select * from portfolio";
        $data["portfolios"] = $this->M_data->load_query($query);
        $display["body"] = $this->load->view("admin/pages_admin/portfolio",$data,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
	}
    public function insert(){
        $data["porName"] = $_POST["porName"];
        $this->M_data->insert("portfolio",$data);
        $query = "select * from portfolio order by por_create_at asc limit 1";
        $porNew = $this->M_data->load_query($query);
        echo json_encode($porNew);
    }
    public function delete(){
        $id = $_POST["id"];
        $this->M_data->delete($id,"portfolio");
        echo $id;
        
    }
    
}
?>