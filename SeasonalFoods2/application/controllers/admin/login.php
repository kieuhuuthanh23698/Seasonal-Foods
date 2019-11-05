<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
		$this->load->view('admin/login');
	}
    public function dangnhap(){
        $username = $this->input->post("username");
        $pass = $this->input->post("password");
        $query = "select * from accountadmin where username = '".$username."' and password = '".md5($pass)."'";
        $data = $this->M_data->load_query($query);
        if(count($data) > 0)
		{
			$this->session->set_userdata('admin',$check);
			redirect(base_url('admin/products'));
		}
		else
		{
			echo "<script> alert('Sai mật khẩu!'); </script>";
			echo "<script> window.location.href = '../';</script>";
		}
    }
	
}
?>