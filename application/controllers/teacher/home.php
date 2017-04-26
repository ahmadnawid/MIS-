<?php
    /**
 * this class including all function do the process belong to student 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Home extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','ajax_pagination','my_form_validation'));
        $this->load->model(array('get_public_data'));
        if(!$this->authentication->login())
        {
             redirect(base_url().'home','refresh');
        }
    }
    public function destruct()
    {
        //destuct;
    }
    //this function is for showing default student in student search page
    public function index()
    {
        header_tph('');
        menu_teacher_tph('home','personal_information');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        //$this->load->view('staff/v_teacher',$data);
        footer_tph();
    }
 }