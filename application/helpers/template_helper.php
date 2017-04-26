<?php
//-----------------Header-------------------------
 function header_tph($user_name='')
  {
	  $data['user_name']=$user_name;
	  $CI = & get_instance();
	  $CI->load->view('template/header',$data);  
  }
  //-----------------menu------------------
  function menu_tph($current_page='',$current_tab='')
  {
      $data['current_page'] = $current_page;
      $data['current_tab'] = $current_tab;
      $CI = & get_instance();
      $CI->load->view('template/menu',$data);  
  }
   //-----------------menu------------------
  function menu_teacher_tph($current_page='',$current_tab='')
  {
      $data['current_page'] = $current_page;
      $data['current_tab'] = $current_tab;
      $CI = & get_instance();
      $CI->load->view('template/menu_teacher',$data);  
  }
  //-----------------footer-------------------------
  function footer_tph()
  {
	  $CI = & get_instance(); 
	  $CI->load->view('template/footer');  
  }
  function login_tph($message='')
  {
      $CI = & get_instance();
      $data['error'] = $message;
      $CI->load->view('login/v_login',$data);  
  }