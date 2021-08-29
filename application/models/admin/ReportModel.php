<?php
class ReportModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    
    //--------------EXPORT ALL DATA EDC FROM TERMINAL --------------//
	public function getExportAllEdcFromTerminal(){
		$token = $this->input->cookie('token');
			
		$api = api_url."/api/report/";

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