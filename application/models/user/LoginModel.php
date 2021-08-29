<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


	
	public function setLastLoginAPI($email){    	
			
		//$data =  json_decode(file_get_contents(api_url."/api/user/UserModel/setLastLogin?email=".$email),false);


		$data['email'] = $email;
		$data_string = json_encode($data);
		$token = $this->input->cookie('token');
          
        $api = api_url."/api/user/UserModel/setLastLogin";

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
		

    }

   

	public function getUserInformationAPI($email){
		



		$query = $this->db->query("SELECT a.*, b.rm_name, b.su, b.rm_description, c.client_code, c.client_name, c.client_description 
		FROM (SELECT * FROM `users` where email = '".$email."' ) as a 
		LEFT JOIN role_master as b ON b.rm_id = a.rm_id 
		LEFT JOIN client as c ON c.client_code = b.client_code");
  
		$query2 = $this->db->query("SELECT b.*, c.form_name, c.form_description, c.form_create, c.form_read, c.form_update, c.form_delete
		FROM (SELECT rm_id FROM `users` where email = '".$email."' ) as a
		LEFT JOIN roledetail as b ON b.rm_id = a.rm_id 
		LEFT JOIN form as c ON c.form_id = b.form_id");
  
		$data["user_info"] = $query->row();
		$data["user_access"] = $query2->result();
		

      	return$data;
		
		
    }



	
}