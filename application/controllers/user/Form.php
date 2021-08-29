<?php

class Form extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model("user/FormModel");
        $this->load->model("user/UserModel");
		if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));
	}

	public function index(){  
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        $data['title'] = "Manage Form";
        //$data['data'] = $this->FormModel->getAllForm();
        $data['data'] = json_decode(file_get_contents(api_url."/api/user/FormModel/getAllForm"));
        $this->template->views("admin/access_manage/form",$data);
    }

    public function add() {
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        
        $data['title'] = "New Form";
            
        $this->template->views('admin/access_manage/form_add',$data);
        
    }

    public function createform(){
        
            $data = $this->input->post();
            $data_string = json_encode($data);

            
            // if($this->FormModel->isFormExist($data['name']) == 0){
            //     $result = $this->FormModel->createForm($data);
            //     if ($result == 0) {
            //         $out['status'] = 'form';
            //         $out['msg'] = show_err_msg('Error saving new form!', '20px');
            //     } else {
            //         $out['status'] = '';
            //         $out['msg'] = show_succ_msg('Saving new form successfully!', '20px');
            //     }
            // }else {
            //     $out['status'] = 'form';
            //     $out['msg'] = show_err_msg('Duplicate form name!', '20px');
            // }
            // echo json_encode($out);



            if(json_decode(file_get_contents(api_url."/api/user/FormModel/isFormExist?name=".$data['name'])) == "False"){
               
                $api = api_url."/api/user/FormModel/createForm";

                $curl = curl_init($api);

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

                curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
                );

                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

                // Send the request
                $result = curl_exec($curl);

                // Free up the resources $curl is using
                curl_close($curl);

                

                if ($result != "\"success\"") {
                    $out['status'] = 'Form';
                    $out['msg'] = show_err_msg('Error saving new Form!', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Saving new Form successfully!', '20px');
                }
            }else {
                $out['status'] = 'Form';
                $out['msg'] = show_err_msg('Duplicate Form name!', '20px');
            }
            echo json_encode($out);
        
    }

    public function deleteForm($id){

        //$this->FormModel->deleteForm($id);
        
        $api_url = api_url."/api/user/FormModel/deleteForm";
        $data['id'] = $id;
        $data_string = json_encode($data);
        $curl = curl_init($api_url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);


        redirect('/user/form/index');
        
        
    }

    public function edit(){
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        $data['title'] = "Update Form";
            
        $id = $this->uri->segment(4);
        //$data['data'] = $this->FormModel->getFormById($id);
        $data['data'] = json_decode(file_get_contents(api_url."/api/user/FormModel/getFormById?id=".$id));
        $this->template->views("admin/access_manage/form_edit",$data);
        
    }
    
    public function updateform(){
       
            
            $data = $this->input->post();
            $data_string = json_encode($data);

            
            // $cek = $this->FormModel->updateForm($data);
            // if ($cek == 0) {
            //     $out['status'] = 'form';
            //     $out['msg'] = show_err_msg('Error update form!', '20px');
            // } else {
            //     $out['status'] = '';
            //     $out['msg'] = show_succ_msg('Saving form successfully!', '20px');
            // }
            
            // echo json_encode($out);



            $api = api_url."/api/user/FormModel/updateForm";

            $curl = curl_init($api);
    
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
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
                $out['msg'] = show_err_msg('Error saving new client!', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Saving new client successfully!', '20px');
            }
            
            
            echo json_encode($out);
        
    }
	
	  

}

