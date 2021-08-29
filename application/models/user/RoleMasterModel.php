<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleMasterModel extends CI_Model {

	public function __construct() { 
      parent::__construct();
    }
 
	public function getAllRoleMaster($client){
		$query = $this->db->query("
								SELECT rm_id,rm_name, a.client_code, b.client_name, a.su FROM `role_master` as a
								LEFT JOIN client as b ON b.client_code = a.client_code
								ORDER BY a.client_code asc, rm_name asc
							");
  
  
		return $query->result_array();
	}


	public function getAllClient($client){
		$data['client'] = $client;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleMasterModel/getAllClient";
  
		$curl = curl_init($api);
  
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'token: Bearer '.$token,
		'Content-Length: ' . strlen($data_string))
		);
  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
  
		// Send the request
		$result = curl_exec($curl);
  
		// Free up the resources $curl is using
		curl_close($curl);
		$jsonData = json_decode($result,true);
  
  
		return  $jsonData['data'];
	}

	public function isRoleMasterExist($name,$client_code){
		$data['client_code'] = $client_code;
		$data['name'] = $name;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleMasterModel/isRoleMasterExist";
  
		$curl = curl_init($api);
  
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'token: Bearer '.$token,
		'Content-Length: ' . strlen($data_string))
		);
  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
  
		// Send the request
		$result = curl_exec($curl);
  
		// Free up the resources $curl is using
		curl_close($curl);
		$jsonData = json_decode($result,true);
  
  
		return  $jsonData;
	}

	public function getRoleById($id){
		$data['id'] = $id;
		
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleMasterModel/getRoleById";
  
		$curl = curl_init($api);
  
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'token: Bearer '.$token,
		'Content-Length: ' . strlen($data_string))
		);
  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
  
		// Send the request
		$result = curl_exec($curl);
  
		// Free up the resources $curl is using
		curl_close($curl);
		$jsonData = json_decode($result,true);
  
  
		return  $jsonData['data'];
	}

	public function isUpdateRoleMasterExist($name,$client,$id){
		$data['client'] = $client;
		$data['name'] = $name;
		$data['id'] = $id;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleMasterModel/isUpdateRoleMasterExist";
  
		$curl = curl_init($api);
  
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'token: Bearer '.$token,
		'Content-Length: ' . strlen($data_string))
		);
  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
  
		// Send the request
		$result = curl_exec($curl);
  
		// Free up the resources $curl is using
		curl_close($curl);
		$jsonData = json_decode($result,true);
  
  
		return  $jsonData;
	}

	

}