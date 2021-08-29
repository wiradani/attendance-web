<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateParamModel extends CI_Model {


    public function getUpdate($periode, $time, $second){

		$data['periode'] = $periode;
		$data['time'] = $time;
		$data['second'] = $second;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/UpdateParam/getUpdate";

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

		

		return (object) $jsonData;
	}


	public function getParam(){
		// $data =  json_decode(file_get_contents(api_url."/api/UpdateParam/"),false);
		// return $data;

		
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/UpdateParam/";

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

		

		return (object) $jsonData;
	}

	public function getPin(){
		// $data =  json_decode(file_get_contents(api_url."/api/UpdateParam/"),false);
		// return $data;

		
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/pin";

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

		

		return (object) $jsonData;
	}




}