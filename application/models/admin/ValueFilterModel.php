<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ValueFilterModel extends CI_Model {

	

	//--------------GET SINGLE SEARCH --------------//
	public function getSingle_Search($param1, $filter_tolerance){
		$data['param1'] = $param1;
		$data['filter_tolerance'] = $filter_tolerance;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getSingle_Search";
  
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
	

	public function getSingleSerachDay($param1, $filter_tolerance){
		$data['param1'] = $param1;
		$data['filter_tolerance'] = $filter_tolerance;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getSingleSerachDay";
  
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

	public function getSingleSerachHour($param1, $filter_tolerance){
		$data['param1'] = $param1;
		$data['filter_tolerance'] = $filter_tolerance;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getSingleSerachHour";
  
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

	//-------------- GET LINE GRAPH --------------//
	public function getLineGraph($param1, $filter_tolerance){
		$data['param1'] = $param1;
		$data['filter_tolerance'] = $filter_tolerance;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getLineGraph2";
  
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
	public function getLineGraphTime($param1, $filter_tolerance){
		$data['param1'] = $param1;
		$data['filter_tolerance'] = $filter_tolerance;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getLineGraphTime2";
  
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


	

	public function getLineByKANWILSearch($duration_type, $valueTimer, $kanwil){
		$data['duration_type'] = $duration_type;
		$data['valueTimer'] = $valueTimer;
		$data['kanwil'] = $kanwil;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getLineByKANWILSearch";
  
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

	public function getLineByAREASearch($duration_type, $valueTimer, $area){
		$data['duration_type'] = $duration_type;
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getLineByAREASearch";
  
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



	public function getLineByKCPSearch($duration_type, $valueTimer, $kcp){
		
		$data['duration_type'] = $duration_type;
		$data['valueTimer'] = $valueTimer;
		$data['kcp'] = $kcp;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/ValueFilterModel/getLineByKCPSearch";
  
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
?>