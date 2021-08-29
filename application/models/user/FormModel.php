<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormModel extends CI_Model {


    public function getAllForm(){
		
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/FormModel/getAllForm";
  
		$curl = curl_init($api);
  
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'token: Bearer '.$token)
		);
  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	
  
		// Send the request
		$result = curl_exec($curl);
  
		// Free up the resources $curl is using
		curl_close($curl);
		$jsonData = json_decode($result,true);
  
		return $jsonData['data'];
	}
	

	public function getFormById($id){
		$data['id'] = $id;
		
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/user/FormModel/getFormById";
  
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