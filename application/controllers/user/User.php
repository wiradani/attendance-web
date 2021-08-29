<?php

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user/RoleMasterModel");
        $this->load->model("user/UserModel");
        if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));
        
        $email = $this->session->userdata('email');
		
		$session_login = $this->session->userdata('session_login');

		
	}

	public function index(){  
        $data['title'] = "Manage User";
        $session = $this->session->userdata('userdata');


        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];

        $data['data'] = $this->UserModel->getAllUser($data['user_info']->client_code);
        //$data['data'] = json_decode(file_get_contents(api_url."/api/user/UserModel/getAllUser?code=". $data['user_info']->client_code)); 

        $this->template->views("admin/layout_user/user_view",$data);
    }

    public function add() {

        $session = $this->session->userdata('userdata');

        $data['userdata'] = $session;
        $data['user_info'] = $data['userdata']['user_info'];
        
        $data['title'] = "New User";

        $data['rolemaster'] = $this->RoleMasterModel->getAllRoleMaster($data['user_info']->client_code);
        //$data['rolemaster'] = json_decode(file_get_contents(api_url."/api/user/RoleMasterModel/getAllRoleMaster?client_code=". $data['user_info']->client_code)); 
            
        $this->template->views('admin/layout_user/user_add',$data);
        
    }

    public function createData(){
            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;
       
            $data = $this->input->post();
            $data["password"] = md5($data["password"]);
            $data_string = json_encode($data);
        
           

            

                $data["password"] = md5($data["password"]);
                var_dump($data);

            //     $result = $this->UserModel->createUser($data);
            //     if ($result == 0) {
            //         $out['status'] = '';
            //         $out['msg'] = show_err_msg('Error saving new user!', '20px');
            //     } else {
            //         $out['status'] = '';
            //         $out['msg'] = show_succ_msg('Saving new user successfully!', '20px');
            //     }
          
            // echo json_encode($out);

      
           
        
    }

    public function deleteUser($id){

        //$this->UserModel->deleteUser($id);
        
        $token = $this->input->cookie('token');
        $api_url = api_url."/api/user/UserModel/deleteUser";
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


        redirect('/user/user/index');
        
        
    }


    public function editUser(){
        $session = $this->session->userdata('userdata');
        
        
            $data['status'] = $this->session->userdata('userdata');   
            $data['userdata'] = $session;
            $data['user_info'] = $data['userdata']['user_info'];
            $id = $this->uri->segment(4);
            $this->session->set_userdata("edit_id", $id);


            $data['user'] = $this->UserModel->getUserById($id);
            $data['rolemaster'] = $this->RoleMasterModel->getAllRoleMaster( $data['user_info']);

            //$data['user'] = json_decode(file_get_contents(api_url."/api/user/UserModel/getUserById?id=".$id));
            //$data['rolemaster'] = json_decode(file_get_contents(api_url."/api/user/RoleMasterModel/getAllRoleMaster?client_code=".$data['user_info']->client_code));
            
            $this->template->views('admin/layout_user/user_edit',$data);
        
    }
    
    


    public function updateUser(){
       
            
        $token = $this->input->cookie('token');

        $data = $this->input->post();
        $data["password"] = md5($data["password"]);
       
        $id = $this->session->userdata("edit_id");
        $data["id"] = $id;
        $data_string = json_encode($data);



        $api = api_url."/api/user/UserModel/updateUser";

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
            $out['status'] = 'form';
            $out['msg'] = show_err_msg('Error saving new User! ', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_succ_msg('Saving new User successfully!', '20px');
        }


        echo json_encode($out);
        //redirect('/user/user/index');
    
    }


    public function myProfile(){
            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;
        
            $val['status'] = $this->session->userdata('userdata');   
            $val['userdata'] = $session;
            $val['user_info'] = $val['userdata']['user_info'];
            $id=$val['user_info']->id;


            $data['profile'] = $this->UserModel->getProfile($id);
            $data['access'] = $this->UserModel->getUserAccess($id);

            // $data['profile'] = json_decode(file_get_contents(api_url."/api/user/UserModel/getProfile?id=".$id));
            // $data['access'] = json_decode(file_get_contents(api_url."/api/user/UserModel/getUserAccess?id=".$id));
    		
            
            $this->template->views('admin/layout_user/user_profile',$data);
        
    }

    public function myProfileEdit(){
            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;
        
            $data['status'] = $this->session->userdata('userdata');   
            $val['userdata'] = $session;
            $val['user_info'] = $val['userdata']['user_info'];
            $id=$val['user_info']['id'];


            $data['user'] = $this->UserModel->getUserById($id);
            $data['rolemaster'] = $this->RoleMasterModel->getAllRoleMaster( $val['user_info']['client_code']);

            
            $this->template->views('admin/layout_user/user_profile_edit',$data);
        
    }

    public function updateProfile(){
       
            
      

        $data = $this->input->post();
        $data["password"] = md5($data["password"]);
       
        $id = $this->session->userdata("edit_id");
        $data["id"] = $id;
        $token = $this->input->cookie('token');
        $data_string = json_encode($data);        



        $api = api_url."/api/user/UserModel/updateProfile";

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
            $out['status'] = 'form';
            $out['msg'] = show_err_msg('Error saving new User! ', '20px');
        } else {
            $out['status'] = '';
            $out['msg'] = show_succ_msg('Saving new User successfully!', '20px');
        }


        echo json_encode($out);
        //redirect('/user/user/index');
    
    }


    public function viewLogActivity(){  
        $data['title'] = "Log Activity";
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
       
        //$data['log_activity'] = json_decode(file_get_contents(api_url."/api/user/UserModel/getLogActivity")); 

        $test = $this->UserModel->getLogActivity();
        $data['log_activity'] =  $test['data'];

       
       

        $this->template->views("admin/layout_data/log_activity",$data);
    }

	
	  

}



