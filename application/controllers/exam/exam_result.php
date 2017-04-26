<?php
    /**
 * this class including all function do the process belong to student result
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Exam_result extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation','ajax_pagination'));
        $this->load->model(array('get_public_data','exam_model','subject_model','student_model'));
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
        menu_tph('result','exam');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $this->load->view('exam/v_result',$data);
        footer_tph();
    }
    public function make_result_sheet()
    {
        $dep_id = $this->input->post('dep');
        $semester_id = $this->input->post('semester');
        $year = $this->input->post('edu_year');
        if($dep_id==0 || $semester_id==0)
        {                                                   
            $html = '<div class="alert alert-warning" role="alert">لطفآ تمام فیلد ها را انتخاب کنید...</div>';
            echo $html;exit;
        }
        else
        {
            $data['dep_name'] = $this->get_public_data->get_id('department',array('dep_id'=>$dep_id),'dep_name');
            $data['semes_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'semester_name');
            $data['class_num'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'class_number');
            $data['year'] =  $year;
            $where = array(
            'student_result_state.semester_id' =>$semester_id,
            'student_result_state.edu_year' =>$year,
            'student_result_state.chance_id' => 1,
            'student_result_state.result_state !=' => '', 
            'student.dep_id' =>$dep_id
            );
            $where_sub = array(
            'eduyear_semester_subjects.dep_id' =>$dep_id,
            'eduyear_semester_subjects.edu_year' =>$year,
            'eduyear_semester_subjects.semester_id' =>$semester_id
            );
            $student = $this->exam_model->student_has_result($where);
            if(count($student)==0)
            {
               $html = '<div class="alert alert-warning" role="alert">نمرات  درج نشده است...</div>';
               echo $html;exit;
            }
            $eduYear_seme_sub = $this->subject_model->get_all_sub($where_sub);
            if(count($eduYear_seme_sub)==0)
            {
               $html = '<div class="alert alert-warning" role="alert">با این مشخصات هیچ نتیجه یافت نشد...</div>';
               echo $html;exit;
            }
            $total_credit=0;
            foreach($eduYear_seme_sub as $sub):
                $total_credit += $sub['subject_credit'];
            endforeach;
            for($i=0;$i<count($student);$i++)
            {
                $where_r = array(
                'student_id' => $student[$i]['student_id'],
                'edu_year' => $year,
                'semester_id' => $semester_id,
                'chance_id' => 2
                );
                $student[$i]['sChanceR_id'] =  $this->exam_model->chance_result_state($where_r,'result_state');
                $student[$i]['sChanceR'] = $this->exam_model->chance_result_state($where_r,'resultState_name');
                $where_r['chance_id'] = 3;
                $tChance_r = $this->exam_model->chance_result_state($where_r,'result_state');
                if($tChance_r==4)
                {
                   $where_r['chance_id'] = 4;
                   $extraChanceR_id = $this->exam_model->chance_result_state($where_r,'result_state');
                   $extraChanceR = $this->exam_model->chance_result_state($where_r,'resultState_name');
                   if($extraChanceR!=NULL)
                   {
                    $student[$i]['tChanceR'] = $extraChanceR;  
                   }
                   $tChance_r = $extraChanceR_id; 
                }
                else
                {
                    $student[$i]['tChanceR'] = $this->exam_model->chance_result_state($where_r,'resultState_name');;
                }
                $student[$i]['tChanceR_id'] = $tChance_r;
                $student[$i]['score'] = array();
                $student[$i]['score_chance_two'] = array();
                $student[$i]['score_chance_three'] = array();
                $success_credit = 0;
                $success_credit2 = 0;
                $success_credit3 = 0;
                $sum_score = 0;
                for($j=0;$j<count($eduYear_seme_sub);$j++)
                {
                    $where = array(
                    'student_id' => $student[$i]['student_id'],
                    'subject_id' => $eduYear_seme_sub[$j]['subject_id'],
                    'edu_year' => $year,
                    'semester_id' => $semester_id,
                    'chance_id' => 1
                    );
                    $student[$i]['score1'][$j] = $this->exam_model->student_subject_result('result',$where,'score');
                    $where['chance_id'] = 2;
                    $student[$i]['score2'][$j] = $this->exam_model->student_subject_result('result',$where,'score');
                    $where['chance_id'] = 3;
                    $student[$i]['score3'][$j] = $this->exam_model->student_subject_result('result',$where,'score');
                    if($student[$i]['score3'][$j] < 55)
                    {
                       $where['chance_id'] = 4;
                       $extraChance_score = $this->exam_model->student_subject_result('result',$where,'score');
                       if($extraChance_score!='')
                       {
                           $student[$i]['score3'][$j] = $extraChance_score;
                       } 
                    }
                    if($student[$i]['score1'][$j] >= 55)
                    {
                       $success_credit += $eduYear_seme_sub[$j]['subject_credit'];
                       $sum_score += $eduYear_seme_sub[$j]['subject_credit']*$student[$i]['score1'][$j]; 
                    }
                    if($student[$i]['score2'][$j] >= 55)
                    {
                       $sum_score += $eduYear_seme_sub[$j]['subject_credit']*$student[$i]['score2'][$j];
                       $success_credit2 += $eduYear_seme_sub[$j]['subject_credit'];
                    }
                    if($student[$i]['score3'][$j] >= 55)
                    {
                       $sum_score += $eduYear_seme_sub[$j]['subject_credit']*$student[$i]['score3'][$j];
                       $success_credit3 += $eduYear_seme_sub[$j]['subject_credit']; 
                    }
                }
                if($student[$i]['result_state']==5 || $student[$i]['sChanceR_id']==5 || $student[$i]['tChanceR_id']==5)
                {
                   $sum_score = ''; 
                }
                $student[$i]['success_credit'] = $success_credit;
                $student[$i]['success_credit2'] = $success_credit2;
                $student[$i]['success_credit3'] = $success_credit3;
                $student[$i]['sum_score'] = $sum_score;
                if($sum_score!='')
                {
                    $average = round($sum_score/$total_credit,2);
                    //$where_percentage = array(
//                    'student_id' => $student[$i]['student_id'],
//                    'edu_year' => $year,
//                    'semester_id' => $semester_id,
//                    'chance_id' => 1
//                    );
//                    $data_percentage = array(
//                    'percentage' => $average
//                    );
//                    $this->exam_model->update_data('student_result_state',$data_percentage,$where_percentage);
                    $student[$i]['average'] = $average;
                }
                else
                {
                    $student[$i]['average'] = '';
                }
            }
            $data['success'] = $this->exam_model->count_student_result($year,$semester_id,$dep_id,1);
            $data['danger'] = $this->exam_model->count_student_result($year,$semester_id,$dep_id,6);
            $data['next_year'] = $this->exam_model->count_student_result($year,$semester_id,$dep_id,5);
            $data['get_out'] = $this->exam_model->count_student_result($year,$semester_id,$dep_id,7);
            $data['total_credit'] = $total_credit;
            $data['subject'] = $eduYear_seme_sub;
            $data['student_result'] = $student;
            $this->load->view('exam/exam_result',$data);
        }
    }
    public function search_result()
    {
        header_tph();
        menu_tph('search_result','exam');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $this->load->view('exam/v_search_result',$data);
        footer_tph();
    }
    public function searching_r()
    {
        $where = array();
        if($this->input->post('student_id'))
        {
            $where['student_result_state.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('edu_year'))
        {
            $where['student_result_state.edu_year'] = $this->input->post('edu_year');
        }
        if($this->input->post('semester'))
        {
            $where['student_result_state.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        if(count($where)==0)
        {
             $html = '<div class="alert alert-warning" role="alert">لطفآ حداقل یکی از فیلد ها را انتخاب کنید...</div>';
             echo $html;exit;
        }
        else
        {
            $student = $this->exam_model->search_result($where);
            $this->ajax_pagination->make_search(count($student),0,20,"|<",">|","<<",">>",base_url()."exam/exam_result/paging",'searched_result','make_shuqa');
            $data['link'] = $this->ajax_pagination->anchors;
            $data['total'] = $this->ajax_pagination->total;
            $data['perPage'] = $this->ajax_pagination->perPage;
            $data['student'] = $student;
            $data['number'] = 1;
            $this->load->view('exam/v_searched_result',$data);
        }
    }
    public function paging()
    { 
        if($this->input->post('form_id') and $this->input->post('per_page'))
        {
        $start = $this->input->post('starting');
        $form_id = $this->input->post('form_id');
        $per_page = $this->input->post('per_page');
        $where = array();
        if($this->input->post('student_id'))
        {
            $where['student_result_state.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('edu_year'))
        {
            $where['student_result_state.edu_year'] = $this->input->post('edu_year');
        }
        if($this->input->post('semester'))
        {
            $where['student_result_state.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        $student = $this->exam_model->search_result($where);
        $this->ajax_pagination->make_search(count($student),$start,$per_page,"|<",">|","<<",">>",base_url()."exam/exam_result/paging",'searched_result',$form_id);
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $data['number'] = $start+1;
        $data['student'] = $this->exam_model->search_result($where,$per_page,$start);
        $data['number'] = $start+1;
        $this->load->view('exam/v_searched_result',$data);
        }
    }
    public function test()
    {
        $where = array(
              'student.dep_id' => 3,
              'result.edu_year' => 1393,
              'result.subject_id' => 'CE507'
            );
            $student_result = $this->student_model->test($where);
            foreach($student_result as $r):
              $this->student_model->test_update($r['student_id'],$r['subject_id']);
            endforeach;
    }
 }