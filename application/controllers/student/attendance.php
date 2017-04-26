<?php
    /**
 * this class including all function do the process belong to student result
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Attendance extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model(array('get_public_data','student_model','exam_model'));
        if(!$this->authentication->login())
        {
             redirect(base_url().'home','refresh');
        }
    }
    public function destruct()
    {
        //destuct;
    }
    public function index()
    {
        header_tph('');
        menu_tph('attendance','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $this->load->view('student/v_make_attendance',$data);
        footer_tph();
    }
    public function make_attendance()
    {
       $subject_id = $this->input->post('dep_subject');
       $dep_id = $this->input->post('dep');
       $semester_id = $this->input->post('semester');
       $year = $this->input->post('edu_year');
       if($dep_id==0 || $semester_id==0 || $subject_id=='0')
        {
            echo 'فیلد های ضروری باید انتخاب شود';   exit;
        }
        else
        {
            $data['sub_name'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_dari_name');
            $data['sub_expresion'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_expresion');
            $subject_conn = array(
            'edu_year' => $year,
            'semester_id'=> $semester_id,
            'dep_id' => $dep_id,
            'subject_id' => $subject_id
            );
            $teacher_id = $this->get_public_data->get_id('eduyear_semester_subjects',$subject_conn,'teacher_id');
            $data['teacher_name'] = $this->get_public_data->get_id('staff',array('s_id'=>$teacher_id),'dari_name');
            $data['dep_exp'] = $this->get_public_data->get_id('department',array('dep_id'=>$dep_id),'dep_expression').ceil($semester_id/2);
            $data['semes_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'semester_name');
            $data['class_num'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'class_number');
            $data['year'] =  $year;
            $data['dep_name'] = $this->get_public_data->get_id('department',array('dep_id'=>$dep_id),'dep_name');
            $data['semes_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'semester_name');
            $data['class_num'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'class_number');
            $data['student'] = $this->exam_model->first_chance_student($dep_id,$year,$semester_id,$subject_id,1);
            //echo count($data['student']);exit;
            $this->load->view('student/genered_attendance',$data);
        } 
    }
 }
