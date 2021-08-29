<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDT extends CI_Model {

    public function getAreaConnected($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaConnected";
  
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
    

    public function getAreaDisconnected($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaConnected/api/CDT/getAreaDisconnected";
  
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


    public function getAreaTotal($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaTotal";
  
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
    

    //-------------- GET WITEL CONNECTED --------------//
	public function getMorWitelConnected($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getMorWitelConnected";
  
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

	//-------------- GET WITEL DISCONNECTED --------------//
	public function getMorWitelDisconnected($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getMorWitelDisconnected";
  
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

	//-------------- GET WITEL TOTAL --------------//
	public function getMorWitelTotal($valueTimer,$area){
		$data['valueTimer'] = $valueTimer;
		$data['area'] = $area;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getMorWitelTotal";
  
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

	//--------------GET TERMINAL CONNECTED--------------//
	public function getAreaTerminalConnected($valueTimer,$valueMorGet){
		$data['valueTimer'] = $valueTimer;
		$data['valueMorGet'] = $valueMorGet;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaTerminalConnected";
  
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

	//--------------GET TERMINAL DISCONNECTED--------------//
	public function getAreaTerminalDisconnected($valueTimer,$valueMorGet){
		$data['valueTimer'] = $valueTimer;
		$data['valueMorGet'] = $valueMorGet;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaTerminalDisconnected";
  
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

	//--------------GET TERMINAL DISCONNECTED--------------//
	public function getAreaTerminalTotal($valueTimer,$valueMorGet){
		$data['valueTimer'] = $valueTimer;
		$data['valueMorGet'] = $valueMorGet;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getAreaTerminalTotal";
  
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

	//--------------GET KCP DATA--------------//

	public function getKcpConnected($valueTimer,$paramKcp){
		$data['valueTimer'] = $valueTimer;
		$data['paramKcp'] = $paramKcp;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKcpConnected";
  
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
    

    public function getKcpDisconnected($valueTimer,$paramKcp){
		$data['valueTimer'] = $valueTimer;
		$data['paramKcp'] = $paramKcp;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKcpDisconnected";
  
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


    public function getKcpTotal($valueTimer,$paramKcp){
		$data['valueTimer'] = $valueTimer;
		$data['paramKcp'] = $paramKcp;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKcpTotal";
  
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
	
	//--------------GET KANWIL DATA--------------//

	public function getKanwilConnected($valueTimer,$paramKanwil){
		$data['valueTimer'] = $valueTimer;
		$data['paramKanwil'] = $paramKanwil;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKanwilConnected";
  
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
    

    public function getKanwilDisconnected($valueTimer,$paramKanwil){
		$data['valueTimer'] = $valueTimer;
		$data['paramKanwil'] = $paramKanwil;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKanwilDisconnected";
  
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

	// cek quey
    public function getKanwilTotal($valueTimer,$paramKanwil){
		$data['valueTimer'] = $valueTimer;
		$data['paramKanwil'] = $paramKanwil;

		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
		$api = api_url."/api/CDT/getKanwilTotal";
  
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