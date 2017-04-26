<?php
    /**
 * this class including all function do the process belong to exam 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Exam extends CI_Controller{
   public $teacher_id;
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library('form_validation');
        $this->load->model(array('get_public_data','exam_model'));
        if(!$this->authentication->login())
        {
             redirect(base_url().'home','refresh');
        }
        if($this->session->userdata('access_rule')!='R3')
        {
             redirect(base_url().'home','refresh');
        }
        else
        {
            $this->teacher_id = $this->session->userdata('s_id');
        }
    }
    public function destruct()
    {
        //destuct;
    }
    //this function is for shoqa geniration form
    public function index()
    {
        header_tph('');
        menu_teacher_tph('exam_shuqa','exam');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $data['chance'] = $this->get_public_data->get_all_data('chance');
        $data['subject'] = $this->exam_model->get_edu_subject(array('eduyear_semester_subjects.edu_year'=>1393,'teacher_id'=>$this->teacher_id));
        $this->load->view('teacher/v_make_shuqa',$data);
        footer_tph();
    }
     //this function get corresponding semestet subject according to semester selected
    public function get_subject($parameter=1)
    {
        $where = array(
        'eduyear_semester_subjects.edu_year'=>$this->input->post('edu_year'),
        'teacher_id'=> $this->teacher_id
        );
        $sem = '';
        if($this->input->post('semester'))
        {
            $sem = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['eduyear_semester_subjects.dep_id'] = $this->input->post('dep');
        }
       $edu_subject = $this->exam_model->get_edu_subject($where,$sem);
       if($parameter==0)
       {
           $html = '<option value="0">انتخاب کنید</option>';
       }
       else
       {
           $html = '<option value="">همه</option>';
       }
       foreach($edu_subject as $sub)
       {
           $html.='<option value="'.$sub['subject_id'].'">'.$sub['sub_dari_name'];
           if($sub['sub_expresion']!='')
           {
               $html .= '('.$sub['sub_expresion'].')';
           }
           $html.='</option>';
       }  
       echo $html;
    }
    //this function is for making exam shuqa for print
    public function make_exam_shuqa()
    {
        $year = $this->input->post('edu_year');
		$chance = $this->input->post('chance');
			$data['year'] =  $year;
            $data['chance'] = $this->get_public_data->get_id('chance',array('chance_id'=>$chance),'chance_name');
                    $where = array(
                    'eduyear_semester_subjects.edu_year'=>$year,
                    'eduyear_semester_subjects.teacher_id' => $this->teacher_id,
                    );
                    if($this->input->post('semester'))
                    {
                       $where['eduyear_semester_subjects.semester_id'] = $this->input->post('semester');
                    }
                    if($this->input->post('dep'))
                    {
                        $where['eduyear_semester_subjects.dep_id'] = $this->input->post('dep');
                    }
                    if($this->input->post('dep_subject'))
                    {
                        $where['eduyear_semester_subjects.subject_id'] = $this->input->post('dep_subject');
                    }
                    $edu_year_course = $this->exam_model->get_course($where);
                    for($i=0;$i<count($edu_year_course);$i++)
                    {
                        $where = array(
                        'result.edu_year'=> $edu_year_course[$i]['edu_year'],
                        'result.semester_id'=>$edu_year_course[$i]['semester_id'],
                        'student.dep_id'=> $edu_year_course[$i]['dep_id'],
                        'result.subject_id'=> $edu_year_course[$i]['subject_id'],
                        'result.chance_id'=> $chance
                        );
                        $edu_year_course[$i]['teacher_name'] = $this->get_public_data->get_id('staff',array('s_id'=>$edu_year_course[$i]['teacher_id']),'dari_name');
                        $edu_year_course[$i]['subject_name'] = $this->get_public_data->get_id('subject',array('subject_id'=>$edu_year_course[$i]['subject_id']),'sub_dari_name');
                        if($chance==1)
                        {
                            $edu_year_course[$i]['result'] = $this->exam_model->other_chance_student($where);
                        }
                        else
                        {
                            $edu_year_course[$i]['result'] = $this->exam_model->other_chance_student($where);
                        }   
                    }
                if(empty($edu_year_course))
                {
                    echo 'هیچ مورد یافت نشد';exit;
                }
                else
                {
                    $data['edu_year_course'] = $edu_year_course;
                }
                $this->load->view('exam/genered_shuqa',$data);
    }
    public function entry_exam_shuqa()
    {
        $subject_id = $this->input->post('dep_subject');
        $dep_id = $this->input->post('dep');
        $semester_id = $this->input->post('semester');
        $year = $this->input->post('edu_year');
        $chance = $this->input->post('chance');
        if($dep_id==0 || $semester_id==0 || $subject_id=='0')
        {
            echo 'فیلد های ضروری باید انتخاب شود';   exit;
        }
        else
        {
            $data['sub_name'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_expresion');
            $data['sub_expresion'] = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_expresion');
            $data['dep_exp'] = $this->get_public_data->get_id('department',array('dep_id'=>$dep_id),'dep_expression').ceil($semester_id/2);
            $data['semes_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'semester_name');
            $data['class_num'] = $this->get_public_data->get_id('semester',array('semester_id'=>$semester_id),'class_number');
            $data['year'] =  $year;
            $data['chance'] = $this->get_public_data->get_id('chance',array('chance_id'=>$chance),'chance_name');;
                if($chance==1)
                {
                    $student = $this->exam_model->first_chance_student($dep_id,$year,$semester_id,$subject_id,$chance);
                }
                else
                {
                        $where = array(
                        'student.dep_id' => $dep_id,
                        'result.subject_id' => $subject_id,
                        'result.edu_year' => $year,
                        'result.semester_id' => $semester_id, 
                        'result.chance_id' => $chance
                        );
                        $student = $this->exam_model->other_chance_student($where);
                }
                if(empty($student))
                {
                    echo 'هیچ مورد یافت نشد';exit;
                }
                else
                {
                    $data['student'] = $student;
                }
                $this->load->view('exam/v_scoreEntry_form',$data);
        }
    }
    //this below two function are for searching exam shuqa for student mark entry
    public function search_shuqa()
    {
        header_tph('');
        menu_teacher_tph('score_entry','exam');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $data['chance'] = $this->get_public_data->get_all_data('chance');
        $this->load->view('teacher/v_score_entry',$data);
        footer_tph(); 
    }
    //this function is for student mark entry for all chance
    public function mark_entry()
    {
        $edu_year = $this->input->post('edu_year');
        $semester_id = $this->input->post('semester');
        $subject_id = $this->input->post('dep_subject');
        $subject_credit = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_credit');
        $chance = $this->input->post('chance');
        $student_mark = $this->input->post('student_mark');
        $insert_result = $this->exam_model->insert_student_mark($subject_id,$subject_credit,$student_mark,$semester_id,$edu_year,$chance);
        if($insert_result)
        {
            echo 'successfully inserted';
        }
        else
        {
            echo 0;
        }
    }
 }