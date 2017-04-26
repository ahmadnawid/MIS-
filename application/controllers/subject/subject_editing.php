<?php
    /**
 * this class including all function do the process belong to subject 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Subject_editing extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation','ajax_pagination'));
        $this->load->model(array('get_public_data','subject_model'));
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
    public function index($parameter='show')
    {
        if($this->input->post('identity'))
       {
            $subject_id = $this->input->post('identity');
            sleep(1);
            $subject_info = $this->subject_model->get_subject('*',array('subject_id'=>$subject_id),'');
            $subject_info[0]['dep_tech'] = $this->get_public_data->get_id('department',array('dep_id'=>$subject_info[0]['lecturer_dep']),'dep_name');
            $subject_info[0]['semester_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$subject_info[0]['semester_id']),'semester_name');
            $subject_info[0]['pishniaz'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_info[0]['sub_pishniaz']),'sub_dari_name');
            $tables = array('first'=>'department_subject','second'=>'department');
            $on = "department_subject.dep_id=department.dep_id";
            $where = array('department_subject.subject_id'=>$subject_id);
            $subject_info[0]['dep_studay'] = $this->get_public_data->tow_table_data($tables,'*',$on,$where);
            $data['subject_info'] = $subject_info;
            if($parameter=="edit")
            {
                $data['semester'] = $this->get_public_data->get_all_data('semester');
                $data['department'] = $this->get_public_data->get_all_data('department');
                $data['sub_category'] = $this->get_public_data->get_all_data('subject_category');
                $data['subject'] = $this->get_public_data->get_all_data('subject',array('semester_id <'=>$subject_info[0]['semester_id']));
                $this->load->view('subject/v_subject_edit',$data);
            }
            else
            {
               $this->load->view('subject/v_subject_details',$data); 
            } 
        }
    }
    public function edit_subject()
    {
        if($this->input->post('identity'))
        {
           $subject_id = $this->input->post('identity');
                    $sub_data = array(
                    'sub_expresion' => $this->input->post('s_expresion'),
                    'sub_credit' => $this->input->post('s_credit'),
                    'sub_theory_time' => $this->input->post('s_theory_time'),
                    'sub_practice_time' => $this->input->post('s_practice_time'),
                    'sub_staz_time' => $this->input->post('s_staz_time'),
                    'sub_memo' => $this->input->post('s_memo'),
                    'sub_pishniaz' => $this->input->post('s_pesh'),
                    'lecturer_dep' => $this->input->post('s_dep_teach'),
                    'subCategory_id' => $this->input->post('s_cat'),
                    'semester_id' => $this->input->post('s_semester'),
                    );
                    $dep_study = $this->input->post('dep_study');
                    $update_sub = $this->subject_model->update_subject($subject_id,$sub_data,$dep_study);
                    if($update_sub)
                    {
                        echo 0;
                    }
                    else
                    {
                        $data['error']='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
                                         <strong>متاسفانه مضمون تصحیح نشد دوباره سعی نمایید</div>';
                        $subject_info = $this->subject_model->get_subject('*',array('subject_id'=>$subject_id),'');
                        $subject_info[0]['dep_tech'] = $this->get_public_data->get_id('department',array('dep_id'=>$subject_info[0]['lecturer_dep']),'dep_name');
                        $subject_info[0]['semester_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$subject_info[0]['semester_id']),'semester_name');
                        $subject_info[0]['pishniaz'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_info[0]['sub_pishniaz']),'sub_dari_name');
                        $tables = array('first'=>'department_subject','second'=>'department');
                        $on = "department_subject.dep_id=department.dep_id";
                        $where = array('department_subject.subject_id'=>$subject_id);
                        $subject_info[0]['dep_studay'] = $this->get_public_data->tow_table_data($tables,'*',$on,$where);
                        $data['subject_info'] = $subject_info;
                        $data['semester'] = $this->get_public_data->get_all_data('semester');
                        $data['department'] = $this->get_public_data->get_all_data('department');
                        $data['sub_category'] = $this->get_public_data->get_all_data('subject_category');
                        $data['subject'] = $this->get_public_data->get_all_data('subject',array('semester_id <'=>$subject_info[0]['semester_id']));
                        $this->load->view('subject/v_subject_updated',$data);
                    }    
            } 
    }
 }