<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user/UserModel");
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {   
        // jika form login disubmit
        if($this->input->post()){
            $user = $this->input->post('email');
            $session_timestamp = date("Y-m-d h:i:s");
            if($this->UserModel->doLogin()){

                //$data = $this->LoginModel->getUserInformation($user);
                $data = $this->LoginModel->getUserInformationAPI($user);

	            $session = ['userdata' => $data, 'email' => $user, 'status' => "Logedin", 'valueTimer' => 1440, 'mySessSidebar' => 'Home_Home', 'btn' => 'area', 'mySessButtonMorTregDash' => 'mor_dash', 'session_login' => $session_timestamp];
                $this->session->set_userdata($session);
               

              



                redirect('');
            }else{
                

                $this->session->set_flashdata('err_message',  '<span style="color:red;text-align:center;">Sorry, the email or password you input is wrong!</span>');
            }
            
        }

        // tampilkan halaman login
        $this->load->view("admin/layout_user/login.php");
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('user/login'));
    }

    public function setLogActivity(){
        $data = $this->input->post();
        $this->UserModel->logActivityAPI($data);
    }
}

