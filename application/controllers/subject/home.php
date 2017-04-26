<?php
    /**
 * this class including all function do the process belong to subject 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Home extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation','ajax_pagination'));
        $this->load->model(array('get_public_data','subject_model','stuff_model'));
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
    public function index($parameter='')
    {
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['sub_category'] = $this->get_public_data->get_all_data('subject_category');
        $where = array();
        $or_where = array();
        if($this->input->post('sub_code'))
        {
            $where['s.subject_id'] = $this->input->post('sub_code');
        }
        if($this->input->post('sub_name'))
        {
            $sub_name = $this->input->post('sub_name');
            $where['s.sub_dari_name'] = $sub_name;
            $or_where['s.sub_english_name'] = $sub_name;
            $or_where['s.sub_expresion'] = $sub_name;
        }
        if($this->input->post('sub_cat'))
        {
            $where['s.subCategory_id']= $this->input->post('sub_cat');
        }
        if($this->input->post('semester'))
        {
            $where['s.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['s.lecturer_dep'] = $this->input->post('dep');
        }
        $start = 0;
        $per_page = 10;
        $subject =  $this->subject_model->get_subject('s.subject_id',$where,$or_where,'');
        $data['all_searched_subject'] = count($subject);
        $this->ajax_pagination->make_search(count($subject),$start,$per_page,"|<",">|","<<",">>",base_url()."subject/home/paging",'list','search_subject');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $subject = $this->subject_model->get_subject('*',$where,$or_where,'s.subject_id',$per_page,$start);
        $i=0;
        while($i<count($subject))
        {
            $subject[$i]['dep_tech'] = $this->get_public_data->get_id('department',array('dep_id'=>$subject[$i]['lecturer_dep']),'dep_name');
            $subject[$i]['semester_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$subject[$i]['semester_id']),'semester_name');
            $i++;
        }
        $data['number'] = 1;
        $data['subject'] = $subject;
        if($parameter=='search_sub')
        {
            sleep(1);
            $this->load->view('subject/v_searched_subject',$data);
        }
        else
        {
            header_tph('');
            menu_tph('search_subject','subject');
           $this->load->view('subject/v_home',$data);
           footer_tph(); 
        }
    }
    public function assigned_subject($parameter='seach_sub')
    {
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $data['staff'] = $this->get_public_data->get_all_data('staff');
        $where = array();
        $where['es.edu_year'] = 1393;
        if($this->input->post('sub_code'))
        {
            $where['es.subject_id'] = $this->input->post('sub_code');
        }
        if($this->input->post('year'))
        {
            $where['es.edu_year'] = $this->input->post('year');
        }
        if($this->input->post('teacher'))
        {
            $where['es.teacher_id']= $this->input->post('teacher');
        }
        if($this->input->post('semester'))
        {
            $where['es.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['es.dep_id'] = $this->input->post('dep');
        }
        $start = 0;
        $per_page = 10;
        $subject =  $this->subject_model->get_teached_subject('es.subject_id',$where);
        $data['all_searched_subject'] = count($subject);
        $this->ajax_pagination->make_search(count($subject),$start,$per_page,"|<",">|","<<",">>",base_url()."subject/home/a_paging",'list','search_subject');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $subject = $this->subject_model->get_teached_subject('*',$where,$per_page,$start);
        $i=0;
        while($i<count($subject))
        {
            $teacher_name = $this->get_public_data->get_id('staff',array('s_id'=>$subject[$i]['teacher_id']),'dari_name');
            $teacher_lname = $this->get_public_data->get_id('staff',array('s_id'=>$subject[$i]['teacher_id']),'dari_lName');
            $subject[$i]['teacher_name'] = $teacher_name.' '.$teacher_lname;
            $i++;
        }
        $data['number'] = 1;
        $data['subject'] = $subject;
        if($parameter=='search_sub')
        {
            sleep(1);
            $this->load->view('subject/v_assigned_s_sub',$data);
        }
        else
        {
            header_tph('');
            menu_tph('assigned_subject','subject');
           $this->load->view('subject/v_assigned_subject',$data);
           footer_tph(); 
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
        $or_where = array();
        if($this->input->post('sub_code'))
        {
            $where['s.subject_id'] = $this->input->post('sub_code');
        }
        if($this->input->post('sub_name'))
        {
            $sub_name = $this->input->post('sub_name');
            $where['s.sub_dari_name'] = $sub_name;
            $or_where['s.sub_english_name'] = $sub_name;
            $or_where['s.sub_expresion'] = $sub_name;
        }
        if($this->input->post('sub_cat'))
        {
            $where['s.subCategory_id']= $this->input->post('sub_cat');
        }
        if($this->input->post('semester'))
        {
            $where['s.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['s.lecturer_dep'] = $this->input->post('dep');
        }
        $subject = $this->subject_model->get_subject('s.subject_id',$where,$or_where,'');
        $this->ajax_pagination->make_search(count($subject),$start,$per_page,"|<",">|","<<",">>",base_url()."subject/home/paging",'list',$form_id);
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $subject = $this->subject_model->get_subject('*',$where,$or_where,'s.subject_id',$per_page,$start);
        $data['number'] = $start+1;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $i=0;
        while($i<count($subject))
        {
            $subject[$i]['dep_tech'] = $this->get_public_data->get_id('department',array('dep_id'=>$subject[$i]['lecturer_dep']),'dep_name');
             $subject[$i]['semester_name'] = $this->get_public_data->get_id('semester',array('semester_id'=>$subject[$i]['semester_id']),'semester_name');
            $i++;
        }
        $data['subject'] = $subject;
        sleep(1);
        $this->load->view('subject/v_subject_paging',$data);
        }
    }
    public function a_paging()
    {
       if($this->input->post('form_id') and $this->input->post('per_page'))
        {
            $start = $this->input->post('starting');
            $form_id = $this->input->post('form_id');
            $per_page = $this->input->post('per_page');
            $where = array();
            if($this->input->post('sub_code'))
            {
                $where['es.subject_id'] = $this->input->post('sub_code');
            }
            if($this->input->post('year'))
            {
                $where['es.edu_year'] = $this->input->post('year');
            }
            if($this->input->post('teacher'))
            {
                $where['es.teacher_id']= $this->input->post('teacher');
            }
            if($this->input->post('semester'))
            {
                $where['es.semester_id'] = $this->input->post('semester');
            }
            if($this->input->post('dep'))
            {
                $where['es.dep_id'] = $this->input->post('dep');
            }
            $subject = $this->subject_model->get_teached_subject('es.subject_id',$where);
            $this->ajax_pagination->make_search(count($subject),$start,$per_page,"|<",">|","<<",">>",base_url()."subject/home/a_paging",'list','search_subject');
            $data['link'] = $this->ajax_pagination->anchors;
            $data['total'] = $this->ajax_pagination->total;
            $data['perPage'] = $this->ajax_pagination->perPage;
            $subject = $this->subject_model->get_teached_subject('*',$where,$per_page,$start);
            $i=0;
            while($i<count($subject))
            {
                $teacher_name = $this->get_public_data->get_id('staff',array('s_id'=>$subject[$i]['teacher_id']),'dari_name');
                $teacher_lname = $this->get_public_data->get_id('staff',array('s_id'=>$subject[$i]['teacher_id']),'dari_lName');
                $subject[$i]['teacher_name'] = $teacher_name.' '.$teacher_lname;
                $i++;
            }
            $data['number'] = $start+1;
            $data['subject'] = $subject;
            sleep(1);
            $this->load->view('subject/v_a_sub_paging',$data);
        }
    }
    //this function is for showing view for adding subject
    public function add_subject()
    {
       header_tph('');
       menu_tph('add_subject','subject');
       $data['semester'] = $this->get_public_data->get_all_data('semester');
       $data['subject_cat'] = $this->get_public_data->get_all_data('subject_category');
       $data['department'] = $this->get_public_data->get_all_data('department');
       $this->load->view('subject/v_add_subject',$data);
       footer_tph(); 
    }
    // this function do the action of doning adding new subject
    public function do_adding_subject()
    {
        $this->form_validation->set_rules('semester','semester','callback_select_check');
        $this->form_validation->set_rules('subject_category','subject category','callback_select_check');
        $this->form_validation->set_rules('sub_english_name','subject english name','trim|required');
        $this->form_validation->set_rules('sub_dari_name','subject dari name','trim|required');
        $this->form_validation->set_rules('sub_code','subject code','trim|required|is_unique[subject.subject_id]');
        $this->form_validation->set_rules('sub_credit','number of credit','callback_select_check');
        $this->form_validation->set_rules('dep_lecturer','lecturer department','callback_select_check');
        if($this->form_validation->run()==FALSE)
        {
            echo 0;
        }
        else
        {
            $sub_data = array(
            'subject_id' => $this->input->post('sub_code'),
            'sub_dari_name' => $this->input->post('sub_dari_name'),
            'sub_english_name' => $this->input->post('sub_english_name'),
            'sub_expresion' => $this->input->post('sub_exp'),
            'sub_credit' => $this->input->post('sub_credit'),
            'sub_theory_time' => $this->input->post('lecture_time'),
            'sub_practice_time' => $this->input->post('practice_time'),
            'sub_staz_time' => $this->input->post('stazh_time'),
            'sub_memo' => $this->input->post('memo'),
            'sub_pishniaz' => $this->input->post('sub_pre'),
            'lecturer_dep' => $this->input->post('dep_lecturer'),
            'subCategory_id' => $this->input->post('subject_category'),
            'semester_id' => $this->input->post('semester'),
            );
            $dep_study = $this->input->post('department_study');
            $insert_sub = $this->subject_model->add_new_subject($sub_data,$dep_study);
            if($insert_sub)
            {
                echo 'یک مضمون موفقانه اضافه شد.';
            }
            else
            {
                echo 0;
            }
        }  
    }
    //this function is for showing veiw for assignint subject to department according to semester and edu_year
    public function assign_subject()
    {
        header_tph('');
        menu_tph('assign_subject','subject');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['edu_year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $table = array('first'=>'staff','second'=>'department');
        $on = "staff.dep_id=department.dep_id";
        $data_staff = "staff.s_id,staff.dari_name,staff.dari_lName,department.dep_expression";
        //$where = array('staff.dep_id !='=> 0);
        $data['teacher'] = $this->stuff_model->select_staff($table,$data_staff,$on,'');
        $data['other'] = $this->get_public_data->get_all_data('staff',array('dep_id' =>0));
        $this->load->view('subject/v_assign_subject',$data);
        footer_tph();  
    }
    public function do_assigning_subject()
    {
        $subject_id = $this->input->post('subject_to_a');
        $dep_id = $this->input->post('dep');
        $semester_id = $this->input->post('semester');
        $edu_year = $this->input->post('edu_year');
        $teacher_id = $this->input->post('faculty_teacher');
        if($dep_id==0 || $semester_id==0 || $subject_id=='0')
        {
            echo 0;
        }
        else
        {
            $subject_credit = $this->get_public_data->get_id('subject',array('subject_id'=>$subject_id),'sub_credit');
            //echo $subject_credit;exit;
            $insert = $this->subject_model->assign_subject($edu_year,$semester_id,$dep_id,$subject_id,$subject_credit,$teacher_id);
            if($insert)
            {
                echo 'successfully assigned';
            }
            else
            {
                echo 0;
            }
        } 
    }
    public function subject_pishniaz()
    {
        $semester_id = $this->input->post('id');
        $where = array(
        'semester_id <' => $semester_id,
        );
        $subject_pishniaz = $this->subject_model->get_subject_pishniaz('subject',$where);
        $html = '<option value="0">انتخاب نمایید</option>';
        foreach($subject_pishniaz as $sub)
        {
            $html.='<option value="'.$sub['subject_id'].'">'.$sub['subject_id'].'</option>';
        }
        echo $html;
        
    }
    //it for dropdown menu validation 
    public function _select_check($val)
    {
        if ($val == 0 || $val==''):
            $this->form_validation->set_message('select_check', 'Please select % s');
            return FALSe;
        else:
            return $val;
        endif;
    }
 }