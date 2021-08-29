<?php

class Atd extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
        $this->load->model("user/ClientModel");
        $this->load->model("user/UserModel");
		if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));
	}

	public function index(){  
        $data['title'] = "My Attandance";
        $session = $this->session->userdata('userdata');
        $data['userdata'] = $session;
      
        $data['data'] = $this->UserModel->getAtd($data['userdata']['user_info']->id);

        $data['cek'] =  $this->UserModel->cekCheckIN($data['userdata']['user_info']->id);

        $this->template->views("admin/layout_atd/atd",$data);
    }


    public function checkIn(){

        if(isset($_POST['btnUpdateParam'])){ 
            $data['status']    = $_POST['status'];    
            $data['desc']       = $_POST['desc']; 
            $data['check_in']   = date("h:i");

            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;

            $data['id'] = $data['userdata']['user_info']->id;
        
            $this->UserModel->checkIn($data);

            //$result = json_decode(file_get_contents(api_url."/api/UpdateParam/getUpdate?&periode=".$data['periode']."&time=".$data['time']."&second=".$data['second']));
            

            
            redirect('/user/atd/index');
        }
    

        
      }


      public function checkout(){

            $session = $this->session->userdata('userdata');
            $data['userdata'] = $session;

            $id = $data['userdata']['user_info']->id;

            $this->UserModel->checkout($id);

            redirect('/user/atd/index');

      }

  

    

	
	  

}

