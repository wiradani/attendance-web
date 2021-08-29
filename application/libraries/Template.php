<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Template {
    protected $_ci;

    function __construct() {
      $this->_ci = &get_instance();
      $this->_ci->load->model("admin/UpdateParamModel");
      $this->_ci->load->model("admin/ReportModel");
    }

    function views($template = NULL, $data = NULL) {          
      
      
      
      $data['update_param'] = $this->_ci->UpdateParamModel->getParam();

      // $data['update_mos'] = $this->_ci->UpdateParamModel->getParamMosNonMos();
      // $data['count_heartbeat'] = $this->_ci->ReportModel->getCountHeartbeat();

      
      $data['pin'] = $this->_ci->UpdateParamModel->getPin();
     
      $data['user_info'] = $data['userdata']['user_info'];
      $data['user_access'] = $data['userdata']['user_access'];

      $data['level'] = $this->getUserLevel($data['user_info'] );
      $data['acc_iam'] = $this->getAccessIAM($data['user_access']);
      $data['acc_user'] = $this->getAccessFormMenu($data['user_access'],"user");
      $data['acc_param'] = $this->getAccessUpdateParam($data['user_access']);
      $data['acc_report'] = $this->getAccessReport($data['user_access']);
      $data['acc_rmaster'] = $this->getAccessFormMenu($data['user_access'],"setup role");
      $data['acc_rdetail'] = $this->getAccessFormMenu($data['user_access'],"role detail");
      $data['acc_edc'] = $this->getAccessFormMenu($data['user_access'],"master edc");
      $data['acc_log'] = $this->getAccessFormMenu($data['user_access'],"activity log");
      $data['acc_data'] = $this->getAccessData($data['user_access'],"data");
      $data['acc_settings'] = $this->getAccessSettings($data['user_access'],"settings");
      $data['acc_logactivity'] = $this->getAccessFormMenu($data['user_access'],"log activity");


      $data['user_id'] = $data['user_info']->id;
      $data['client_code'] = $data['user_info']->client_code;
          

      $data['_mainContent'] = $this->_ci->load->view($template, $data, TRUE); 
      $data['_content'] = $this->_ci->load->view('admin/_partials/content', $data, TRUE);
      $data['_head'] = $this->_ci->load->view('admin/_partials/head', $data, TRUE);
      $data['_navbar'] = $this->_ci->load->view('admin/_partials/navbar', $data, TRUE);
      $data['_sidebar'] = $this->_ci->load->view('admin/_partials/sidebar', $data, TRUE);
      $data['_footer'] = $this->_ci->load->view('admin/_partials/footer', $data, TRUE);
      

    
     
      echo $data['template'] = $this->_ci->load->view('admin/_partials/modal', $data, TRUE);        
    }

    
    function getUserLevel($user){
      if(strtolower($user->su) === "1"){
        return "superadmin";
      }else{
        if(strtolower($user->rm_name) === "admin"){
          return "admin";
        }else{
          return "other";
        }
      }
    }

    function getAccessIAM($access){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === "access management"){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }
      return $data;
    }

    function getAccessUpdateParam($access){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === "master"){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }

      return $data;
    }

    function getAccessReport($access){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === "report"){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }
      return $data;
    }

    function getAccessFormMenu($access, $menu){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === $menu){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }
      return $data;
    }



    function getAccessData($access){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === "data"){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }
      return $data;
    }


    function getAccessSettings($access){
      $data['have_access'] = false;

      if(count($access) > 0){
        foreach ($access as $row) {
          if(strtolower($row->form_name) === "settings"){
            $data['create'] = $row->rd_create === "1"? true: false;
            $data['read'] = $row->rd_read === "1"? true: false;
            $data['update'] = $row->rd_update === "1"? true: false;
            $data['delete'] = $row->rd_delete === "1"? true: false;
            $data['have_access'] = $data['read'];
            break;
          }
        }
      }
      return $data;
    }
}
?>