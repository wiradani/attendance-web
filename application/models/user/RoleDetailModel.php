<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleDetailModel extends CI_Model { 

	public function __construct() {
      parent::__construct();
    }
  
	public function getAllRoleDetail($code,$master){
		$data['code'] = $code;
		$data['master'] = $master;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleDetailModel/getAllRoleDetail";
  
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
  
		return $jsonData['data'];
	}

	

	public function isRoleDetailExist($rolemaster, $form){
		$data['rolemaster'] = $rolemaster;
		$data['form'] = $form;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleDetailModel/isRoleDetailExist";
  
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
		
		
		return $jsonData;
		
	}

	public function getRoleDetailById($id){
		$data['id'] = $id;
		
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleDetailModel/getRoleDetailById";
  
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
		
		
		return $jsonData;
		
	}

	public function isRoleDetailUpdateExist($rolemaster, $form,$id){
		$data['rolemaster'] = $rolemaster;
		$data['form'] = $form;
		$data['id'] = $id;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/RoleDetailModel/isRoleDetailUpdateExist";
  
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
		
		
		return $jsonData;
		
	}

	

}