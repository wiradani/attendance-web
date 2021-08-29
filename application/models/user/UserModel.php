<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->model("user/LoginModel");
      
    }
    


    public function getAllUser($code){

      $query = $this->db->query("
      SELECT id, name,email,password,a.rm_id,mobile_no,username, b.rm_name, b.client_code,a.division FROM `users` as a
      LEFT JOIN role_master as b ON b.rm_id = a.rm_id ORDER by name
     ");


      return$query->result_array();

    }

    public function isEmailExist($code){

      $data['code'] = $code;
      $query = $this->db->query("SELECT email FROM `users` where email = '".$code."'");
      $query = $query->result();

      if(count($query)!=0){
        return 1;
      }else{
        return 0;
      }


     

    }


    public function createUser($data){


      $data = array(
        'name' => $data['name'],
        'email' => $data['email'],
        'username' => $data['username'],
        'password' => $data['password'],
        'rm_id' => $data['level'],
        'mobile_no' => $data['mobile_no'],
        'division' => $data['division']
      );

      $this->db->insert('users', $data);


      return $this->db->affected_rows();


    }


    public function update($data,$id){
      $data = array(
        'name' => $data['name'],
       
        'username' => $data['username'],
        'password' => $data['password'],
       
        'mobile_no' => $data['mobile_no'],
       
      );

      $this->db->where('id', $id);
      $this->db->update('users', $data);

      return $this->db->affected_rows();

    }


    public function getUserById($id){

      $data['id'] = $id;
      $query = $this->db->query("
          SELECT id,username, name,email,password,a.rm_id, mobile_no,	postition, b.rm_name FROM `users` as a
          LEFT JOIN role_master as b ON b.rm_id = a.rm_id 
          WHERE id = ".$id);
          $result =  $query->row();
      
          return $result;

    }


    public function doLogin(){
        
       
        $email = $this->input->post('email');

        $pass = $this->input->post('password');
        $data['password'] = md5($pass);


        $query = $this->db->query("SELECT id FROM `users` where email = '".$email."' and password='".$data['password']."'");
        $res = $query->result();
       


        if(count($res) != 0){

           $user = $this->db->query(" SELECT * FROM `users` WHERE email = '$email'       ");
           $user= $user->result();

          $this->session->set_userdata(['user_logged' => $user]);
          

         

          return true;

        }else{
          //login gagal
          return false;
        }
    }

    public function getUserbyEmailAPI($email,$token){
      $data['email'] = $email;
      $data_string = json_encode($data);
          
      $api = api_url."/api/user/UserModel/getUserbyEmail";

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

    public function getSessionLoginAPI($email){
      $data['email'] = $email;
      $data_string = json_encode($data);
      $token = $this->input->cookie('token');
          
      $api = api_url."/api/user/LoginModel/getSessionForLogin";

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

    public function getProfile($id){
      $data['id'] = $id;

      $queryprofile = $this->db->query("SELECT a.*, b.rm_name, b.su FROM `users` as a 
      LEFT JOIN role_master as b ON b.rm_id = a.rm_id WHERE id = $id ");
      $result =  $queryprofile->result_array();

      return $result;


    }

    public function getUserAccess($id){
      $data['id'] = $id;
      $queryaccess = $this->db->query("SELECT b.rd_id, b.form_id, c.form_name, c.form_description,
      IF(b.rd_create='1','Create','0') as rd_create,
      IF(b.rd_read='1','Read','0') as rd_read,
      IF(b.rd_update='1','Update','0') as rd_update,
      IF(b.rd_delete='1','Delete','0') as rd_delete
    FROM `users` as a
    LEFT JOIN roledetail as b ON b.rm_id = a.rm_id
    LEFT JOIN form as c ON c.form_id = b.form_id
    WHERE id = $id ");

    $result = $queryaccess->result_array();

     

      return $result;


    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){

        // $sql = "UPDATE {$this->_table} SET last_login=now() WHERE id={$user_id}";
        // $this->db->query($sql);
        json_decode(file_get_contents(api_url."/api/user/LoginModel/updateLastLogin?id=".$$user_id)); 
    }

    public function deleteUser($id){
		
      $query = $this->db->query("
          DELETE FROM `users`
          WHERE id = ".$id);
	
		  return $this->db->affected_rows();
		
    }
    
    public function logActivityAPI($data){

          $data_string = json_encode($data);
         
          $api = api_url."/api/user/UserModel/setLogActivity";
          
          $token = $this->input->cookie('token');

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
   
  }


    
  public function getLogActivity(){
      $token = $this->input->cookie('token');
        
      $api = api_url."/api/user/UserModel/getLogActivity";

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

      
      return $jsonData;
  }


  public function getAtd($id){

    $query = $this->db->query("SELECT a.name,a.division, b.* FROM users a JOIN attd B ON a.id=b.user_id WHERE b.user_id = '$id' ORDER BY b.created_at DESC ");

    return $query->result_array();

  }


  
  public function cekCheckIN($id){

    $query = $this->db->query("select * from attd where date(created_at) = CURDATE() AND user_id = '$id' ORDER BY created_at");

    return $query->result_array();

  }



  public function checkIn($data){


    $data = array(
      'user_id' => $data['id'],
      'status' => $data['status'],
      'check_in' => $data['check_in'],
      'desc_stat' => $data['desc']
    );

    $this->db->insert('attd', $data);


    return $this->db->affected_rows();


  }

  public function checkout($id){

    $time = date(" h:i");

    $query = $this->db->query(" UPDATE attd SET check_out = '$time' WHERE date(created_at) = CURDATE() AND user_id = '$id' ") ; 

    return $this->db->affected_rows();

   

  }
   
    


}