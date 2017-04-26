<?php
    /**
 * this class including all function do the process belong to student 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Deploma_project extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library('form_validation');
        $this->load->model(array('get_public_data','student_model'));
        if(!$this->authentication->login())
        {
             redirect(base_url().'home','refresh');
        }
        if($this->session->userdata('access_rule')!='R1' && $this->session->userdata('access_rule')!='R2')
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
        menu_tph('deploma_project','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $this->load->view('student/v_add_project',$data);
        footer_tph();
    }
    public function add_deploma_project()
    {
        header_tph('');
        menu_tph('deploma_project','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $tables = array('first'=>'student','second'=>'result');
        $on = 'student.student_id=result.student_id';
        $data_select = 'student.student_id,student.dari_name,student.dari_fName';
        $year = $this->get_public_data->max_value('year','','year');
        $where = array(
        //'result.edu_year' => $year,
        //'result.semester_id' => 8,
        'result.subject_id' => 'CE801'
        );
        $student = $this->student_model->student_two_table($tables,$on,$data_select,$where,array('student.dep_id','student.student_id'));
        $i=0;
        while($i<count($student))
        {
            $student[$i]['project_data']= $this->get_public_data->get_all_data('student_deploma_project',array('student_id'=>$student[$i]['student_id']));
            if(count($student[$i]['project_data'])>0)
            {
                 $student[$i]['teach_rahnama']= $student[$i]['project_data'][0]['teacher_id'];
            }
            else
            {
                $student[$i]['teach_rahnama'] = 0;
            }
            $i++;
        }
        $data['student'] = $student;
        $data['teacher'] = $this->get_public_data->get_all_data('staff');
        $this->load->view('student/v_add_project',$data);
        footer_tph();
    }
    public function add_department_project()
    {
        $tables = array('first'=>'student','second'=>'result');
        $on = 'student.student_id=result.student_id';
        $data_select = 'student.student_id,student.dari_name,student.dari_fName';
        $year = $this->get_public_data->max_value('year','','year');
        $where = array(
        //'result.edu_year' => $year,
        //'result.semester_id' => 8,
        'result.subject_id' => 'CE801'
        );
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        $student = $this->student_model->student_two_table($tables,$on,$data_select,$where,array('student.dep_id','student.student_id'));
        $i=0;
        while($i<count($student))
        {
            $student[$i]['project_data']= $this->get_public_data->get_all_data('student_deploma_project',array('student_id'=>$student[$i]['student_id']));
            if(count($student[$i]['project_data'])>0)
            {
                 $student[$i]['teach_rahnama']= $student[$i]['project_data'][0]['teacher_id'];
            }
            else
            {
                $student[$i]['teach_rahnama'] = 0;
            }
            $i++;
        }
        $data['student'] = $student;
        $data['teacher'] = $this->get_public_data->get_all_data('staff');
        $this->load->view('student/v_add_project_ajax',$data);
        footer_tph();
    }
    public function add_st_project()
    {
        $project_array = $this->input->post('student_project');
        $this->student_model->p_insertion_s($project_array);
         redirect(site_url().'student/deploma_project/add_deploma_project.php'); 
    }
 }