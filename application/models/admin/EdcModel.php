<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EdcModel extends CI_Model {



	public function getAllDataEDC(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getAllEDC";

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

		

		return (array) $jsonData['data'];
	}


	public function getAllDataEDCHb(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getAllDataEDCHb";

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

		

		return  $jsonData;
	}


	public function getBySN($sn){    	
	

		$data['sn'] = $sn;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getBySN";

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


	public function masterEDCCountTotal(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/masterEDCCountTotal";

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

		

		return (object) $jsonData['data'];
	}


	public function masterEDCConnectedTotal(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/masterEDCConnectedTotal";

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

		

		return (object) $jsonData['data'];
	}

	public function getTotalMerchant(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getTotalMerchant";

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

		

		return (object) $jsonData['data'];
	}


	public function getTotalTerminal(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getTotalTerminal";

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

		

		return (object) $jsonData['data'];
	}

	public function getTotalArea(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getTotalArea";

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

		

		return (object) $jsonData['data'];
	}


	public function getTotalKANWIL(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getTotalKANWIL";

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

		

		return (object) $jsonData['data'];
	}


	public function getTotalKCP(){
		
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/edc/getTotalKCP";

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

		

		return (object) $jsonData['data'];
	}


	public function getTotalActiveTerminal($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getTotalActiveTerminal";

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

		return (object) $jsonData['data'];
		

	}

	public function getEDCWeekly(){    	
	

		
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getEDCWeekly2";

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

		return (object) $jsonData['data'];
		

	}
	
	 //--------------Availibility--------------//
	 public function getTopAvailabilityArea($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getTopAvailabilityArea";

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


		return (object) $jsonData['data'];
		

	}

	public function getTopAvailabilityKanwil($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getTopAvailabilityKanwil";

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


		return (object) $jsonData['data'];
		

	}


	public function getTopAvailabilityKcp($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getTopAvailabilityKcp";

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


		return (object) $jsonData['data'];
		

	}

	public function availabilityEdcArea($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/availabilityEdcArea";

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

	public function getEDCWeekly2(){    	
	

		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/getEDCWeekly2";

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


		return  $jsonData;
		

	}


	public function availabilityEdcKanwil($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/availabilityEdcKanwil";

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


	public function availabilityEdcKcp($valueTimer){    	
	

		$data['valueTimer'] = $valueTimer;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/edc/availabilityEdcKcp";

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


	// ------------------------------ TO EXCEL ------------------------------------  //
	public function Upload_Batch_Edc($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './assets/excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '20000';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	


}