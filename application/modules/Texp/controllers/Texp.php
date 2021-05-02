<?php
/**
 * author 	: Okki Setyawan
 * email 	: okkisetyawan@gmail.com
 * github	: github.com/okki23
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Texp extends CI_Controller { 

	public function __construct(){
		parent::__construct(); 
	}

	public function index()
	{
		echo 'Welcome to API TRL with TIKI'; 
	}
 
	public function req_access_token(){ 

		$username = $this->input->post('username'); 
		$password = $this->input->post('password');    
		$endpoint = 'http://apis.mytiki.net:8321/user/auth';  
		$headers  = [ 
            'Content-Type: application/json'
        ];
		$arraybody = array('username'=>$username,
						'password'=>$password);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$endpoint);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arraybody));           
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						$result     = curl_exec ($ch);
						$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						// var_dump($result);
						echo $result;
	}

	public function connote_info(){
		$awb = $this->input->post('awb'); 
		$token = $this->input->post('token'); 
		  
		$endpoint = 'http://apis.mytiki.net:8321/connote/info';  
		$headers  = [ 
			'x-access-token:'.$token,
            'Content-Type: application/json'
        ];
 
		$arraybody = array('cnno'=>$awb);  
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$endpoint);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arraybody));           
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						$result     = curl_exec ($ch);
						$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
						echo $result;
	}

	public function connote_history(){
		$awb = $this->input->post('awb'); 
		$token = $this->input->post('token'); 
		  
		$endpoint = 'http://apis.mytiki.net:8321/connote/mpds/history';  
		$headers  = [ 
	        'Content-Type: application/json',
			'x-access-token:'.$token
        ];
 
		$arraybody = array('cnno'=>$awb);  
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$endpoint);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arraybody));           
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						$result     = curl_exec ($ch); 
						$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
						 
		//explode
		$my_var = json_decode($result, true);

		unset($my_var["status"],$my_var["msg"]);

		$json = json_encode($my_var);
		echo $json;
		 
	}

	public function connote_status(){
		 
		$token = $this->input->post('token'); 
		  
		$endpoint = 'http://apis.mytiki.net:8321/connote/statuscode';  
		$headers  = [ 
			'x-access-token:'.$token,
            'Content-Type: application/json'
        ]; 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$endpoint);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);          
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						$result     = curl_exec ($ch);
						$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
						echo $result;
	}

	public function push_manifest(){
		 
		$token = $this->input->post('token'); 
		 
 
		$endpoint = 'http://apis.mytiki.net:8321/mde/manifestorder';  
		$headers  = [ 
			'x-access-token:'.$token,
            'Content-Type: application/json'
        ]; 

		$arraybody = array('accnum'=>$this->input->post('accnum'),
						   'paket_awb'=>$this->input->post('paket_awb'),
						   'paket_id'=>$this->input->post('paket_id'),
						   'paket_content'=>$this->input->post('paket_content'),
						   'paket_value'=>$this->input->post('paket_value'),
						   'paket_cod'=>$this->input->post('paket_cod'),
						   'paket_service'=>$this->input->post('paket_service'),
						   'consignor_name'=>$this->input->post('consignor_name'),
						   'consignor_company'=>$this->input->post('consignor_company'),
						   'consignor_address1'=>$this->input->post('consignor_address1'),
						   'consignor_address2'=>$this->input->post('consignor_address2'),
						   'consignor_zipcode'=>$this->input->post('consignor_zipcode'),
						   'consignor_phone'=>$this->input->post('consignor_phone'),
						   'consignee_name'=>$this->input->post('consignee_name'),
						   'consignee_company'=>$this->input->post('consignee_company'),
						   'consignee_address1'=>$this->input->post('consignee_address1'),
						   'consignee_address2'=>$this->input->post('consignee_address2'),
							);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL,$endpoint);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);          
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arraybody));    
						$result     = curl_exec ($ch);
						$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
						echo $result;
	}

	 
}


