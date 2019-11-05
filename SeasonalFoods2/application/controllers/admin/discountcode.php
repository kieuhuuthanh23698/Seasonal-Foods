<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class discountcode extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $query = "select * from discountcode";
        $data["discounts"] = $this->M_data->load_query($query);
        $display["body"] = $this->load->view("admin/pages_admin/discountcode",$data,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
	}
    public function insertdiscount(){
        $queryProductAdd = "select * from products where id not in (select distinct id_product from discountcodedetail)";
        $data["productAdds"] = $this->M_data->load_query($queryProductAdd);
        
        $display["body"] = $this->load->view("admin/pages_admin/insertdiscount",$data,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
    }
   
    
}
?>