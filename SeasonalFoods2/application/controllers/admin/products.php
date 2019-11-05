<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('M_data');
		$this->load->library('session');
	}

	public function index()
	{	
        $query = "SELECT * from products LEFT JOIN discountcodedetail ON products.id = discountcodedetail.id_product LEFT JOIN discountcodeapply on discountcodedetail.id_code = discountcodeapply.id_discountcode LEFT JOIN portfolio ON products.id_por = portfolio.id_portfolio LEFT JOIN brand ON products.id_brand = brand.id_brands LEFT JOIN unit ON products.id_unit = unit.id_units order by create_at desc";
        $data["products"] = $this->M_data->load_query($query);
        $queryUnit = "select * from unit";
        $data["units"] = $this->M_data->load_query($queryUnit);
        $queryPor = "select * from portfolio";
        $data["portfolios"] = $this->M_data->load_query($queryPor);
        $display["body"] = $this->load->view("admin/pages_admin/products",$data,TRUE);
		$this->load->view("admin/home_admin/masterAdmin", $display);
	}

//    public function insert()
//	{
//        $data["name"] = $this->input->post("name");
//        $data["id_unit"] = $this->input->post("unit");
//        $gia = $this->input->post("price");
//        $data["price"] = (float)$gia;
//        $data["id_por"] = $this->input->post("portfolio");
//        $data["description"] = $this->input->post("description");
//        
//		if (!empty($_FILES['image']['name'])) {
//	        $config['upload_path'] = './public/images/products';
//	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
//	        $config['file_name'] = $_FILES['image']['name'];
//	    	$config['overwrite'] = TRUE;  
//	        $this->load->library('upload', $config);
//	        $this->upload->initialize($config);
//	        if ($this->upload->do_upload('image')) {
//         		$uploadData = $this->upload->data();
//          		$data["image"] = $uploadData['file_name'];
//       	 	} else
//       	 	{
//       	 		$datas['errors'] = $this->upload->display_errors();
//         		$data["image"] = 'unknow.jpg';
//	        }
//	      }else{
//	      	$datas['errors'] = $this->upload->display_errors();
//	        $data["image"] = 'unknow.jpg';
//	      }
//        
//	      $this->M_data->insert('products',$data);
//	      redirect(base_url('admin/products'));
//	}
    public function insertAjax(){
        $data["name"] = $this->input->post("name");
        $data["id_unit"] = $this->input->post("unit_id");
        $gia = $this->input->post("price");
        $data["price"] = (float)$gia;
        $rrp = $this->input->post("rrp");
        $data["rrp"] = (float)$rrp;
        $data["id_por"] = $this->input->post("por_id");
        $data["description"] = $this->input->post("description");
        $data["hidden"] = $this->input->post("hidden");
        $nameImage = "unknown.png";
        if (isset($_POST) && !empty($_FILES['image'])) {
            $nameImage = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], './public/images/products/'.$_FILES['image']['name']);
            
        }
        $data["image"] = $nameImage;
        
        $this->M_data->insert('products',$data);
        $query = "SELECT * from products LEFT JOIN discountcodedetail ON products.id = discountcodedetail.id_product LEFT JOIN discountcodeapply on discountcodedetail.id_code = discountcodeapply.id_discountcode LEFT JOIN portfolio ON products.id_por = portfolio.id_portfolio LEFT JOIN brand ON products.id_brand = brand.id_brands LEFT JOIN unit ON products.id_unit = unit.id_units order by create_at desc limit 1";
        $newproduct = $this->M_data->load_query($query);
        echo json_encode($newproduct);
    }
//    public function delete($id=""){
//        $this->M_data->delete($id,"products");
//        echo "<script>alert('Xóa Sản Phẩm Thành Công'); window.location.href='../'</script>";
//        redirect(base_url('admin/products'));
//    }
    public function deleteAjax(){
        $id = $_POST["id"];
        $this->M_data->delete($id,"products");
        echo 1;
    }
    public function getproduct(){
        $id = $this->input->post("id");
        $query = "select * from products where id = '".$id."'";
        $data = $this->M_data->load_query($query);
        echo json_encode($data);
    }
//    public function update($id = "")
//	{
//        $data["name"] = $this->input->post("name");
//        $data["id_unit"] = $this->input->post("unit");
//        $gia = $this->input->post("price");
//        $data["price"] = (float)$gia;
//        $data["id_por"] = $this->input->post("portfolio");
//        $data["description"] = $this->input->post("description");
//        
//		if (!empty($_FILES['image']['name'])) {
//	        $config['upload_path'] = './public/images/products';
//	        $config['allowed_types'] = 'jpg|jpeg|png|gif';
//	        $config['file_name'] = $_FILES['image']['name'];
//	    	$config['overwrite'] = TRUE;  
//	        $this->load->library('upload', $config);
//	        $this->upload->initialize($config);
//	        if ($this->upload->do_upload('image')) {
//         		$uploadData = $this->upload->data();
//          		$data["image"] = $uploadData['file_name'];
//       	 	} else
//       	 	{
//       	 		$datas['errors'] = $this->upload->display_errors();
//         		$data["image"] = 'unknow.jpg';
//	        }
//        }
//        
//         $this->M_data->update($id,'products',$data);
//         echo "<script>alert('Cập Nhật Sản Phẩm Thành Công'); window.location.href='../'</script>";
//         redirect(base_url('admin/products'));
//	}
    public function updateAjax(){
        $id = $this->input->post("id");
        $data["name"] = $this->input->post("name");
        $data["id_unit"] = $this->input->post("unit_id");
        $gia = $this->input->post("price");
        $data["price"] = (float)$gia;
        $data["id_por"] = $this->input->post("por_id");
        $data["description"] = $this->input->post("description");
        $data["hidden"] = $this->input->post("hidden");
        $nameImage = "";
        if (isset($_POST) && !empty($_FILES['image'])) {
            $nameImage = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], './public/images/products/'.$_FILES['image']['name']);
            $data["image"] = $nameImage;
        }
        
        $this->M_data->update($id,'products',$data);       
        echo $nameImage;
    }
    
}
?>