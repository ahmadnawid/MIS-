<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('authentication_model');
    }
    function __destruct()
    {
      ////destructior
    } 
    public function index()
    {
        if(!$this->authentication->login())
        {
             login_tph();
        }
        else
        {
            $this->dashboard();
        }
    }
    public function ion_auth()
    { 
        if($this->authentication->login())
        {
             redirect(base_url().'home/dashboard','refresh');
        }
        else
        {
           $user_name = $this->input->post('username');
           $password = $this->input->post('password');
           $this->authentication->login_user($user_name,$password); 
        }
    }
    public function dashboard()
    {
        if(!$this->authentication->login())
        {
             login_tph();
        }
        else
        {
            if($this->session->userdata('access_rule')=='R3')
            {
                redirect(base_url().'teacher/home/index','refresh'); 
            }
            else
            {
                redirect(base_url().'student/home/index','refresh'); 
            }
        }
    }
    function logout_user()
    {
        $this->session->sess_destroy();
        redirect(base_url().'home/index','refresh');  
    }
  
}