<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
      
class Authentication {

   private $CI = null; 
    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('form');
        $this->CI->load->model('authentication_model');
    }
    function __destruct()
    {
      ////destructior
    } 
    function login()
    {
        if($this->CI->session->userdata('isLoggedIn'))
        {
            return true;  
        }
        else
        {
            return false;
        } 
    }
    function login_user($identity, $password) 
    {
        if($identity && $password && $this->CI->authentication_model->validate_user($identity,$password))
        {
           redirect(base_url().'home/dashboard','refresh'); 
        }
        else
        {
           login_tph('<p style="color: red;margin:0px;padding:10px 5px 5px 90px;float:left">نام کاربری یا رمزعبورتان اشتباه است</p>'); 
        }
    }
}

/* End of file Authentication.php */