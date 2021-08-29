<?php

class Client extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model("user/ClientModel");
        $this->load->model("user/UserModel");
		if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));
	}

	public function index(){  
        $data['title'] = "Manage Client";
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
        //$data['data'] = $this->ClientModel->getAllClient();
        $data['data'] = json_decode(file_get_contents(api_url."/api/user/ClientModel/getAllClient"));
        $this->template->views("admin/access_manage/client",$data);
    }

    public function add() {
        
        $data['title'] = "New Client";
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
            
        $this->template->views('admin/access_manage/client_add',$data);
        
    }

    public function create(){
        
            $data = $this->input->post();
            $data_string = json_encode($data);
            



            if(json_decode(file_get_contents(api_url."/api/user/ClientModel/isClientExist?code=".$data['code'])) == "False"){
               
               
               
                $api = api_url."/api/user/ClientModel/createClient";

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
                    $out['status'] = 'client';
                    $out['msg'] = show_err_msg('Error saving new client!', '20px');
                } else {
                    $out['status'] = '';
                    $out['msg'] = show_succ_msg('Saving new client successfully!', '20px');
                }
            }else {
                $out['status'] = 'client';
                $out['msg'] = show_err_msg('Duplicate client name!', '20px');
            }
            echo json_encode($out);
        
    }

    public function delete($id){

        //$this->ClientModel->deleteClient($id);
        
        $api_url = api_url."/api/user/ClientModel/deleteEDC";
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


        redirect('/user/client/index');
        
        
    }

    public function edit(){
            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;
           
            $data['title'] = "Update Client";
            
            $id = $this->uri->segment(4);
            //$data['data'] = $this->ClientModel->getClientById($id);
            $data['data'] = json_decode(file_get_contents(api_url."/api/user/ClientModel/getClientById?id=".$id));
      
            $this->template->views("admin/access_manage/client_edit",$data);
        
    }
    
    public function update(){
       
            
            $data = $this->input->post();
            $data_string = json_encode($data);

            // $cek = $this->ClientModel->updateClient($data);
            // if ($cek == 0) {
            //     $out['status'] = 'Client';
            //     $out['msg'] = show_err_msg('Error update Client!', '20px');
            // } else {
            //     $out['status'] = '';
            //     $out['msg'] = show_succ_msg('Saving Client successfully!', '20px');
            // }
            


            $api = api_url."/api/user/ClientModel/updateClient";

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

