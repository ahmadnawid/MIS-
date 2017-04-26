<?php
   /**
 * this class including all function do the genereting report of student
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Exam_report extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library('ajax_pagination');
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
        menu_tph('exam_report','report');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $this->load->view('report/v_exam_report',$data);
        footer_tph();
    }
    public function make_exam_report()
    {
        if($this->input->post('result')==20)
        {
            $where = array(
            'sR.percentage <' => 65,
            );
            $where['sR.result_state'] = 1;
        }
        else
        {
            $where = array();
            if($this->input->post('result'))
            {
                 $where['sR.result_state'] = $this->input->post('result');
            }
        }
        $where['sR.edu_year'] = $this->input->post('edu_year');
        if($this->input->post('semester'))
        {
            $where['sR.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['s.dep_id'] = $this->input->post('dep');
        }
        if($this->input->post('form_id'))
        {
            $start = $this->input->post('starting');
            $form_id = $this->input->post('form_id');
            $per_page = $this->input->post('per_page');
        }
        else
        {
            $start=0;
            $form_id="search_r";
            $per_page = 10;
        }
        //print_r($where);exit;
        $student = $this->report_model->select_student_result($where,'','');
        $this->ajax_pagination->make_search(count($student),$start,$per_page,"|<",">|","<<",">>",base_url()."report/exam_report/make_exam_report",'search_report',$form_id);
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $data['student'] = $this->report_model->select_student_result($where,$per_page,$start);
        $data['number'] = $start+1;
        $data['all_searched_s'] = count($student);
        sleep(1);
        $this->load->view('report/v_searched_result',$data);
    }
 }