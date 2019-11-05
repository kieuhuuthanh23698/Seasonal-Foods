<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
        $this->load->model('API_SeasonalFoods2');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
	}
       
   public function getFoods(){
        echo json_encode($this->API_SeasonalFoods2->getFoods());
   }

   public function getFoodsXML(){
        $result = $this->API_SeasonalFoods2->getFoods();
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        //echo $xml."</br>";
        //$this->API_SeasonalFoods2->array_to_xml($result, $xml);
        $this->API_SeasonalFoods2->to_xml($xml,$result);
        //array_walk_recursive($result, array ($xml, 'addChild'));
        //echo $xml->asXML('test.xml');
        echo $xml->asXML();
   }

   public function getParam(){
        $param1 = $_POST["param1"];
        $param2 = $_POST["param2"];
        echo json_encode("Param 1 : ".$param1.", Param 2 : ".$param2);
   }

   public function addFoods($data){
        $this->API_SeasonalFoods2->addFoods($data);
        echo $data;
   }

}
