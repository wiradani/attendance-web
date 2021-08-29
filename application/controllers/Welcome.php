<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model("admin/EdcModel");
		$this->load->model("admin/CountEdcModel");
		$this->load->model("admin/ValueFilterModel");
		$this->load->library('session');
		
		$this->load->model("user/UserModel");
		if($this->UserModel->isNotLogin()) redirect(site_url('user/login'));


		$email = $this->session->userdata('email');
		
		$session_login = $this->session->userdata('session_login');
		
	}

	public function index()
	{	
		$session = $this->session->userdata('userdata');
		$data['userdata'] = $session;
	  $valueTimer =$this->session->userdata('valueTimer');
	  $btn =$this->session->userdata('btn');
	
	  if ($valueTimer == null || $btn == null){
		$valueTimer = 1440;
		$btn = 'area';
		$session = ['valueTimer' => $valueTimer ];
		$session = ['btn' => $btn];
		$this->session->set_userdata($session);
	  }
	  
	 
	  $data['btn'] = $btn;
	  $data['valueTimer'] = $valueTimer;
	

	
	 //--------------Using API--------------//
	  $data['master_total_edc'] = $this->EdcModel->masterEDCCountTotal();
	  $data['master_total_edc_conn'] =  $this->EdcModel->masterEDCConnectedTotal();

	  $data['total_merchant'] = $this->EdcModel->getTotalMerchant();
	  $data['total_terminal'] = $this->EdcModel->getTotalTerminal();
	  $data['total_area'] = $this->EdcModel->getTotalArea(); 
	  $data['total_kanwil'] =  $this->EdcModel->getTotalKANWIL();
	  $data['total_kcp'] =  $this->EdcModel->getTotalKCP();
	  $data['total_edc_active']  = $this->EdcModel->getTotalActiveTerminal($valueTimer); 

	  // total edc weekly (current month only)
	  //$data["total_daily"] = json_decode(file_get_contents(api_url."/api/edc/getEDCWeekly2"));
	  $data['total_daily'] =  $this->EdcModel->getEDCWeekly2();

	
	  $data["top3"] = $this->EdcModel->getTopAvailabilityArea($valueTimer); 
	  $data["top3_kanwil"] =  $this->EdcModel->getTopAvailabilityKanwil($valueTimer); 
	  $data["top3_kcp"] =  $this->EdcModel->getTopAvailabilityKcp($valueTimer); 

	  $data["av_edc_area"] = $this->EdcModel->availabilityEdcArea($valueTimer); 
	  $data["av_edc_kanwil"] = $this->EdcModel->availabilityEdcKanwil($valueTimer); 
	  $data["av_edc_kcp"] = $this->EdcModel->availabilityEdcKcp($valueTimer); 
	  

	  //$data["av_edc_area"] =  json_decode(file_get_contents(api_url."/api/edc/availabilityEdcArea?valueTimer=".$valueTimer));
	  //$data["av_edc_kanwil"] = json_decode(file_get_contents(api_url."/api/edc/availabilityEdcKanwil?valueTimer=".$valueTimer));
	//   $data["av_edc_kcp"] = json_decode(file_get_contents(api_url."/api/edc/availabilityEdcKcp?valueTimer=".$valueTimer));

	  


	  $this->template->views('admin/overview', $data);
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}
}
