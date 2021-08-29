<?php
  class RoleDetail extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model("user/RoleDetailModel");
      $this->load->model("user/FormModel");
      $this->load->model("user/ClientModel");
      $this->load->model("user/RoleMasterModel");
    } 
 
    public function detail(){
        $session = $this->session->userdata('userdata');
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        
            $data['status'] = $this->session->userdata('userdata'); 
            $master = $this->uri->segment(4);
            $this->session->set_userdata("role_master_id",$master);
            $data['title'] = "Role Detail";
         
            $data['role_master'] = $master;

            $data['userdata'] = $session;
            $data['user_info'] = $data['userdata']['user_info'];       

            $data['data'] = $this->RoleDetailModel->getAllRoleDetail($data['user_info']->client_code,$master);
            
            
            $this->template->views('admin/access_manage/role_detail',$data);
    }


    public function newDetail() {
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        $session = $this->session->userdata('userdata');
        $data['status'] = $this->session->userdata('userdata'); 
        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];
        $master = $this->session->userdata("role_master_id");
        $data['role_master'] = $master;
        $data['title'] = "New Role Detail";


        $data['master'] = $this->RoleMasterModel->getAllRoleMaster($data['user_info']->client_code);
        $data['form'] = $this->FormModel->getAllForm();
        $data['client'] = $this->ClientModel->getAllClient();


        $this->template->views('admin/access_manage/role_detail_add',$data);
    }
 

    public function createRoleDetail(){
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        $session = $this->session->userdata('userdata');
        
            $data['status'] = $this->session->userdata('userdata'); 
            $data = $this->input->post();
            $data_string = json_encode($data);


            if($this->RoleDetailModel->isRoleDetailExist($data['rolemaster'],$data['form']) == "false"){
                
                $api = api_url."/api/user/RoleDetailModel/createRoleDetail";
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

                // Free up the resources $curl is using
                curl_close($curl);

                if ($result != "\"success\"") {
                    $out['status'] = 'client';
                    $out['msg'] = show_err_msg('Error saving new Role Detail!', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Saving new Role Detail successfully!', '20px');
                }
            }else {
                $out['status'] = 'form';
                $out['msg'] = show_err_msg('Duplicate Role!', '20px');
            }
            echo json_encode($out);
        
        
    }


    public function getFormAccess(){
        $session = $this->session->userdata('userdata');
       
            $id = $_POST['id'];
            $data = array(
                "acc" => $this->FormModel->getFormById($id)
            );

            echo json_encode($data);
    }


    public function delete($id){

        $token = $this->input->cookie('token');
        $api_url = api_url."/api/user/RoleDetailModel/deleteRoleDetail";
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
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
    
        $data['status'] = $this->session->userdata('userdata'); 
        $master = $this->session->userdata("role_master_id");
        $data['role_master'] = $master;
        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];
        $data['title'] = "Update Role Detail";
        $id = $this->uri->segment(4);
        $this->session->set_userdata("edit_id", $id);


        $data['client'] = $this->ClientModel->getAllClient();
        $data['master'] = $this->RoleMasterModel->getAllRoleMaster($data['user_info']->client_code);
        $data['form'] = $this->FormModel->getAllForm();
        $data['data'] = $this->RoleDetailModel->getRoleDetailById($id);


        $this->template->views('admin/access_manage/role_detail_edit',$data);
    
}

public function update(){
    $session = $this->session->userdata('userdata');
    $data['userdata'] = $session;
    $session = $this->session->userdata('userdata');
    $data = $this->input->post();
        $data['status'] = $this->session->userdata('userdata'); 
        $id = $this->session->userdata("edit_id");
        
        $data["id"] = $id;
        $data_string = json_encode($data);


        if($this->RoleDetailModel->isRoleDetailUpdateExist($data['rolemaster'],$data['form'],$id) == "false"){

            $token = $this->input->cookie('token');
            $api = api_url."/api/user/RoleDetailModel/update";

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
                $out['msg'] = show_err_msg('No role updated! ', '20px');
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
