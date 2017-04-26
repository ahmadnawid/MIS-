<?php
   /**
 * this class including all function do the genereting report of student
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Student_report extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->model(array('get_public_data','report_model'));
    }
    public function destruct()
    {
        //destuct;
    }
    //this function is for default transcript
    public function index()
    {
        header_tph('');
        menu_tph('student_report','report');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $this->load->view('report/v_student_report',$data);
        footer_tph();
    }
 }