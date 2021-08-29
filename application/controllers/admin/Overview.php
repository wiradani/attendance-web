<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("admin/EdcModel");
		$this->load->model("admin/UpdateParamModel");

		$this->load->model("user/UserModel");
		if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));

		$email = $this->session->userdata('email');
		
		$session_login = $this->session->userdata('session_login');

	
	}

	public function index()
	{
	  $this->template->views('admin/overview');
	}

	public function UpdateTimerGraph(){
		$session = $this->session->userdata('userdata');
		  
		  if ($_POST['timerPost'] == 0) {
			$session = ['valueTimer' => '1440'];
		  }else{
			$session = ['valueTimer' => $_POST['timerPost']];
		  }
		  $this->session->set_userdata($session);
		
	  }


	  public function UpdateTimer(){
		$session = $this->session->userdata('userdata');
		
		  $data['userdata'] = $this->userdata;
		  if ($_POST['timerPost'] == 0) {

			$session = ['valueTimer' => '1440'];
		  }else{
			$session = ['valueTimer' => $_POST['timerPost']];
		  }
		  $this->session->set_userdata($session);
		
	  }

	public function queryParameter(){

		$this->load->library('session');


		$this->session->set_userdata('valueTimer',  $this->input->post('tolerance'));
		$this->session->set_userdata('btn',  $this->input->post('btn'));
		$valueTimer =$this->session->userdata('valueTimer');
		if($valueTimer == null){
			$this->template->views('about.php');
		}
		else {
			redirect('/welcome/index');
		}
		
	}

	public function queryParameterData(){

		$this->load->library('session');


		$this->session->set_userdata('valueTimer',  $this->input->post('tolerance'));
		$this->session->set_userdata('btn',  $this->input->post('btn'));
		$valueTimer =$this->session->userdata('valueTimer');
		if($valueTimer == null){
			$this->template->views('about.php');
		}
		else {
			redirect('/admin/data/index');
		}

	}


	public function showMap(){

		$data['edc'] = $this->EdcModel->getAllDataEDCHb();
		$data['total'] = count($this->EdcModel->getAllDataEDCHb());
		$session = $this->session->userdata('userdata');
        $data['userdata'] = $session;

		//$data['edc'] = json_decode(file_get_contents($api_url = api_url."/api/edc/getAllDataEDCHb"));
		//$data['total'] = count(json_decode(file_get_contents($api_url = api_url."/api/edc/getAllDataEDCHb")));

		$this->template->views('admin/show_map', $data);
	}

	public function getJSONstore(){
		// $data = $this->EdcModel->getAllDataEDCHb();
		// echo json_encode($data);

		$data = file_get_contents($api_url = api_url."/api/edc/getAllDataEDCHb");
		echo $data;
	}
	
	public function searchBySN(){
		$sn = $this->input->post("sn");
		$data = $this->EdcModel->getBySN($sn);
		echo json_encode($data);

		// $data = file_get_contents($api_url = api_url."/api/edc/getBySN?sn=".$sn);
		// echo $data;
		
	}

	public function settingSync(){
	  
		if(isset($_POST['btnUpdateParam'])){ 
			$data['periode']    = $_POST['periode'];    
			$data['time']       = $_POST['time']; 
			$data['second']       = $_POST['second']; 
		
			$update = $this->UpdateParamModel->getUpdate($data['periode'], $data['time'], $data['second'] );

			//$result = json_decode(file_get_contents(api_url."/api/UpdateParam/getUpdate?&periode=".$data['periode']."&time=".$data['time']."&second=".$data['second']));
			

			
			redirect('/admin/data/index');
		

			
		  }
	}


	public function changeLog(){

	
		$session = $this->session->userdata('userdata');
        $data['userdata'] = $session;


		$this->template->views('admin/changelog', $data);
	}


	public function settingPIN(){
	  
		if(isset($_POST['btnUpdatePIN'])){ 
			$data['pin']    = $_POST['pin'];   

			$token = $this->input->cookie('token');
			$data_string = json_encode($data);

			$api = api_url."/api/edc/setPIN";

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
			
			redirect('/admin/data/index');
		

			
		}
	}

	  

}

