<?php
  class RoleMaster extends CI_Controller {
      
    public function __construct() {
      parent::__construct();
      $this->load->model("user/RoleMasterModel");
      $this->load->model("user/UserModel");
      if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));

      $email = $this->session->userdata('email');
		
	  $session_login = $this->session->userdata('session_login');

      
     
    }

    public function index(){
          $session = $this->session->userdata('userdata');
          $data['userdata'] = $session;
     
          $data['status'] = $this->session->userdata('userdata'); 
          $data['title'] = "Role Master";
          $data['user_info'] = $data['userdata']['user_info'];
          
         
          if($data['user_info']->client_code == NULL){
            $data['user_info']->client_code == "PCS";
          }

         $data['data'] = $this->RoleMasterModel->getAllRoleMaster( $data['user_info']->client_code);

          $this->template->views('admin/access_manage/role_master', $data);
          
  } 

  public function add() {

        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        
        $data['status'] = $this->session->userdata('userdata'); 
        $data['title'] = "New Role Master";
        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];
        
    
        $data['client'] = $this->RoleMasterModel->getAllClient($data['user_info']->client_code);
      
        $this->template->views('admin/access_manage/role_master_add',$data);
    
  }

  public function createRoleMaster(){
    $session = $this->session->userdata('userdata');
    $data['userdata'] = $session;
    
        
        $data = $this->input->post();
        $data_string = json_encode($data);

       
       
        if($this->RoleMasterModel->isRoleMasterExist($data['name'],$data['client']) == "false"){
    
            $token = $this->input->cookie('token');
            $api = api_url."/api/user/RoleMasterModel/createRoleMaster";

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

            if ($result != "\"success\"") {
                $out['status'] = 'client';
                $out['msg'] = show_err_msg('Error saving new Role Master!', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Saving new Role Master successfully!', '20px');
            }
        }else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg('Duplicate role name!', '20px');
        }
        
        echo json_encode($out);
    
}

  public function deleteRoleMaster($id){
        
        //$this->RoleMasterModel->deleteRoleMaster($id);

        $token = $this->input->cookie('token');
        $api_url = api_url."/api/user/RoleMasterModel/deleteRoleMaster";
        $data['id'] = $id;
        $data_string = json_encode($data);
        $curl = curl_init($api_url);

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


        redirect('/user/RoleMaster/index');
    
  }

  public function edit(){
    $session = $this->session->userdata('userdata');
    $data['userdata'] = $session;
   
        $data['status'] = $this->session->userdata('userdata'); 
        $data['title'] = "Update Role Master";
        
        $id = $this->uri->segment(4);
        $this->session->set_userdata("edit_id", $id);


        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];
        
    
        $data['client'] = $this->RoleMasterModel->getAllClient($data['user_info']->client_code);
        $data['data'] = $this->RoleMasterModel->getRoleById($id);

        
        $this->template->views('admin/access_manage/role_master_edit',$data);
    
}

public function updaterolemaster(){
    $session = $this->session->userdata('userdata');
    $data['userdata'] = $session;
   
        $data['status'] = $this->session->userdata('userdata'); 
        $id = $this->session->userdata("edit_id");
        $data = $this->input->post();
        $data["id"] = $id;
        $data_string = json_encode($data);

       
       

        if( $this->RoleMasterModel->isUpdateRoleMasterExist($data['name'],$data['client'],$id) == "false"){

            $token = $this->input->cookie('token');
            $api = api_url."/api/user/RoleMasterModel/updateRoleMaster";

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

           

            if ($result != "\"success\"") {
                $out['status'] = '';
                $out['msg'] = show_err_msg('No role updated!', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Saving role successfully!', '20px');
            }
        }else{
            $out['status'] = 'form';
            $out['msg'] = show_err_msg('Duplicate role name!', '20px');
        }
        echo json_encode($out);
    
}





    
}
