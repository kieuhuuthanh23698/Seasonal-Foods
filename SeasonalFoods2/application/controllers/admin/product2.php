<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $display["body"] = $this->load->view("admin/pages_admin/product2",NULL,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
    }
    public function productJson(){
        $query = "SELECT * from products LEFT JOIN discountcodedetail ON products.id = discountcodedetail.id_product LEFT JOIN discountcodeapply on discountcodedetail.id_code = discountcodeapply.id_discountcode LEFT JOIN portfolio ON products.id_por = portfolio.id_portfolio LEFT JOIN brand ON products.id_brand = brand.id_brands LEFT JOIN unit ON products.id_unit = unit.id_units order by create_at desc";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
    public function insert(){
//        print_r(json_decode(file_get_contents("php://input"), true));
        $a = json_decode(file_get_contents("php://input"), true);
        $data["id_unit"] = $a["id_unit"];
        $data["id_por"] = $a["id_por"];
        $data["id_brand"] = $a["id_brand"];
        $data["price"] = $a["price"];
        $data["rrp"] = $a["rrp"];
        $data["name"] = $a["name"];
        $data["image"] = $a["image"];
        $data["description"] = $a["description"];
        
        $id = $this->M_data->insert('products',$data);
        
        $query = "select * from products where id = '".$id."'";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
    public function delete(){
        $id = $_POST["id"];
        $query = "select * from products where id = '".$id."'";
        $data = $this->M_data->load_query($query);
        $alert = "";
        if($data == null){
            $alert = "Không tìm Thấy sản phẩm";
        }else{
            $this->M_data->delete($id,'products');
            $alert = "Xóa Thành Công"; 
        }
        $data2=array(
            "message" => $alert,
            );
        echo json_encode($data2);
    }
    public function curl(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://thongtindoanhnghiep.co/api/city',
            CURLOPT_USERAGENT => 'Viblo test cURL Request',
            CURLOPT_SSL_VERIFYPEER => false
        ));

        $resp = curl_exec($curl);
        
        $weather = json_decode($resp);
        var_dump($weather);
        

        curl_close($curl);
        
    }
}
?>