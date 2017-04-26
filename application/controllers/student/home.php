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
    //this function is for showing default student in student search page
    public function index()
    {
        header_tph('');
        menu_tph('home','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $where = array();
        $per_page = 10;
        $student = $this->student_model->get_student($where);
        //call the pagination library class for making pagination
        $this->ajax_pagination->make_search(count($student),0,$per_page,"|<",">|","<<",">>",base_url()."student/home/paging",'list','student_list');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $data['student'] = $this->student_model->get_student($where,$per_page,0);
        $data['number'] = 1;
        $this->load->view('student/v_home',$data);
        footer_tph();
    }
    //this function search student according to condition 
    public function search_student()
    {
        $where = array();
        if($this->input->post('student_id'))
        {
            $where['student.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('student_name'))
        {
            $where['student.dari_name'] = $this->input->post('student_name');
        }
        if($this->input->post('entry_year'))
        {
            $where['student.university_entry_year'] = $this->input->post('entry_year');
        }
        if($this->input->post('graduated_year'))
        {
            $where['student.university_graduated_year'] = $this->input->post('graduated_year');
        }
        if($this->input->post('semester'))
        {
            $where['student.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        $student = $this->student_model->get_student($where);
        if(count($student)==0)
        {
           
           $html = '<div class="alert alert-info" role="alert">هیچ محصل با این مشخصات یافت نشد...</div>';
           echo $html;
        }
        else
        {
            $per_page = 10;
             //call the pagination library class for making pagination
            $this->ajax_pagination->make_search(count($student),0,$per_page,"|<",">|","<<",">>",base_url()."student/home/paging",'list','student_list');
            $data['link'] = $this->ajax_pagination->anchors;
            $data['total'] = $this->ajax_pagination->total;
            $data['perPage'] = $this->ajax_pagination->perPage;
            $data['student'] = $this->student_model->get_student($where,$per_page,0);
            $data['number'] = 1;
            sleep(1);
            $this->load->view('student/v_student_paging',$data);                                                  
        }
        
    }
    //this function is for geting all information of a student
    public function student_info_details()
    {
        if($this->input->post('identity'))
       {
            $student_id = $this->input->post('identity');
            sleep(1);
            $student_general_info = $this->student_model->get_student_details($student_id);
            if(count($student_general_info)==0)
            {
                echo '<div style="height:300px;text-align:center;padding-top:100px">details not found</div>';
            }
            else
            {
               $student_general_info[0]['province_asli'] = $this->get_public_data->get_id('provinces',array('prov_id'=>$student_general_info[0]['origenal_province']),'prov_name'); 
               $student_general_info[0]['province_current'] = $this->get_public_data->get_id('provinces',array('prov_id'=>$student_general_info[0]['current_province']),'prov_name');
               $student_general_info[0]['district_asli'] = $this->get_public_data->get_id('districts',array('district_id'=>$student_general_info[0]['origenal_district']),'district_name'); 
               $student_general_info[0]['district_current'] = $this->get_public_data->get_id('districts',array('district_id'=>$student_general_info[0]['current_district']),'district_name');
               $data['student_data'] = $student_general_info;
               $data['student_family_data'] = $this->student_model->get_student_family($student_id);
               $data['stud_deploma_project'] = $this->get_public_data->get_all_data('student_deploma_project',array('student_id'=>$student_id));
               if(count($data['stud_deploma_project'])>0)
               {
                  $teacher_name = $this->get_public_data->get_id('staff',array('s_id'=>$data['stud_deploma_project'][0]['teacher_id']),'dari_name');
                  $teacher_lName = $this->get_public_data->get_id('staff',array('s_id'=>$data['stud_deploma_project'][0]['teacher_id']),'dari_lName');
                  $data['stud_deploma_project'][0]['teacher_id'] = $teacher_name.' '.$teacher_lName; 
               }
               $data['student_memo'] = $this->student_model->get_student_memo($student_id);
               $data['gender'] = $this->get_public_data->get_all_data('gender');
               $data['state'] = $this->get_public_data->get_all_data('state');
               $data['province'] = $this->get_public_data->get_all_data('provinces');
               $data['o_district'] = $this->get_public_data->get_all_data('districts',array('prov_id'=>$student_general_info[0]['origenal_province']));
               $data['c_district'] = $this->get_public_data->get_all_data('districts',array('prov_id'=>$student_general_info[0]['current_province']));
               $data['department'] = $this->get_public_data->get_all_data('department');
               $this->load->view('student/v_student_details',$data);
            }
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
            $where['student.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('student_name'))
        {
            $where['student.dari_name'] = $this->input->post('student_name');
        }
        if($this->input->post('entry_year'))
        {
            $where['student.university_entry_year'] = $this->input->post('entry_year');
        }
        if($this->input->post('graduated_year'))
        {
            //$where['student.university_entry_year'] = $this->input->post('entry_year');
        }
        if($this->input->post('semester'))
        {
            $where['student.semester_id'] = $this->input->post('semester');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        $student = $this->student_model->get_student($where);
        $this->ajax_pagination->make_search(count($student),$start,$per_page,"|<",">|","<<",">>",base_url()."student/home/paging",'list',$form_id);
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['student'] = $this->student_model->get_student($where,$per_page,$start);
        $data['number'] = $start+1;
        $data['perPage'] = $this->ajax_pagination->perPage;
        sleep(1);
        $this->load->view('student/v_student_paging',$data);
        }
    }
    public function edit_student_info($parmeter='')
    {
        if($parmeter!='' and $this->input->post('identity_id'))
        {
            $student_id = $this->input->post('identity_id');
            $state = false;
            if($parmeter=='fa_data')
            {
                $this->form_validation->set_rules('student_name','Student name','trim|required');
                $this->form_validation->set_rules('student_fName','Father name','trim|required');
                $this->form_validation->set_rules('student_gFName','Grand father name','trim|required');
                $this->form_validation->set_rules('student_tazkira','Tazkira number','trim|required|numeric');
                if($this->form_validation->run()==FALSE)
                {
                   echo 'error';
                   exit;
                }
                else
                {
                    $tazkira = $this->input->post('student_tazkira');
                    $student_tazkira = $this->get_public_data->get_id('student',array('student_id'=>$student_id),'tazkira_number');                               
                    if($tazkira == $student_tazkira || ($tazkira!=$student_tazkira && $this->_isExist('tazkira','tazkira_number',$tazkira)==FALSE))
                    {
                        $student_data = array(
                        'dari_name' => $this->input->post('student_name'),
                        'dari_fName' => $this->input->post('student_fName'),
                        'dari_gFName' => $this->input->post('student_gFName'),
                        'dari_lName' => $this->input->post('student_lName'),
                        'nationality' => $this->input->post('student_nationality'),
                        'mother_tong' => $this->input->post('student_motherTong'),
                        'phone_number' => $this->input->post('student_phone'),
                        'email' => $this->input->post('student_email'),
                        );
                        $student_tazkira = array(
                        'tazkira_number' => $this->input->post('student_tazkira'),
                        'sheath' => $this->input->post('student_tSheet'),
                        'page' => $this->input->post('student_tPage'),
                        'register_number' => $this->input->post('student_tRNumber'),
                        'dateOfBirth' => $this->input->post('student_dateOfBirth'),
                        'state_id' => $this->input->post('student_marital_statuse'),
                        'gender_id' => $this->input->post('student_gender'),
                        );
                
                        $update = $this->student_model->update_student_data('student',$student_data,$student_id);
                        if($update)
                        {
                            $update2 = $this->student_model->update_student_data('tazkira',$student_tazkira,$student_id);
                            if($update2)
                            {
                                $state = true; 
                            } 
                        }    
                }
            } 
            }
            elseif($parmeter=='en_data')
            {
                $this->form_validation->set_rules('student_e_name','Student name','trim|required');
                $this->form_validation->set_rules('student_e_fName','Father name','trim|required');
                $this->form_validation->set_rules('student_e_gFName','Grand father name','trim|required');
                if($this->form_validation->run()==FALSE)
                {
                    echo 'error';
                    exit;
                }
                else
                {
                    $student_data_en = array(
                    'english_name' => $this->input->post('student_e_name'),
                    'english_fName' => $this->input->post('student_e_fName'),
                    'english_gFName' => $this->input->post('student_e_gFName'),
                    'english_lName' => $this->input->post('student_e_lName'),
                    'english_nationality' => $this->input->post('student_e_nationality')
                   );
                   $update = $this->student_model->update_student_data('student',$student_data_en,$student_id);
                   if($update)
                   {
                        $state = true;  
                   }    
                }  
            }
            elseif($parmeter=='photo_data')
            {
                $this->form_validation->set_rules('student_photo',"YOUR FILE","file_required|file_min_size[10KB]|file_max_size[500KB]|file_allowed_type[image]|file_image_mindim[50,50]|file_image_maxdim[1200,1000]"); 
                if($this->form_validation->run()==FALSE)
                {
                   echo validation_errors();exit;
                }
                else
                {
                    $tazkira_id = $this->get_public_data->get_id('tazkira',array('student_id'=>$student_id),'tazkira_number');
                    $config =array(
                      'upload_path' => realpath(APPPATH . '../img/student'),
                      'allowed_types' => 'jpg|jpeg|gif|png',
                      'file_name' => $tazkira_id.'.jpg',
                      'overwrite' => true,
                      'max_size' => '500',
                      'max_width' => '1200',
                      'max_height' => '1000',
                      );
                      $this->load->library('upload', $config);
                      if($this->upload->do_upload('student_photo'))
                      {
                            $student_data_p = array('photo'=> 'img/student/'.$config['file_name']);
                            $update = $this->student_model->update_student_data('student',$student_data_p,$student_id);
                           if($update)
                           {
                                $state = true;  
                           }  
                      }
                }  
            }
            elseif($parmeter=='location_data')
            {
                $student_data_en = array(
                    'origenal_province' => $this->input->post('province_asli'),
                    'origenal_district' => $this->input->post('district_asli'),
                    'origenal_village' => $this->input->post('village_asli'),
                    'origenal_homeAddress' => $this->input->post('home_address_asli'),
                    'current_province' => $this->input->post('province_current'),
                    'current_district' => $this->input->post('district_current'),
                    'current_village' => $this->input->post('village_current'),
                    'current_homeAddress' => $this->input->post('home_address_current')
                   );
                   $update = $this->student_model->update_student_data('student',$student_data_en,$student_id);
                   if($update)
                   {
                        $state = true;  
                   }    
            }
            elseif($parmeter=='school_data')
            {
                $student_data_en = array(
                    'grad_school' => $this->input->post('student_school'),
                    'english_grad_school' => $this->input->post('student_e_school'),
                    'grad_school_year' => $this->input->post('student_school_grad'),
                    'kankor_entry_year' => $this->input->post('student_kankor_year'),
                    'kankor_id' => $this->input->post('student_kankor_id'),
                    'kankor_score' => $this->input->post('student_kankor_score'),
                   );
                   $update = $this->student_model->update_student_data('student',$student_data_en,$student_id);
                   if($update)
                   {
                        $state = true;  
                   }    
            }
            elseif($parmeter=='university_data')
            {
                $student_data_en = array(
                    'dep_id' => $this->input->post('student_dep'),
                    'university_entry_year' => $this->input->post('student_entry_year'),
                   );
                   $update = $this->student_model->update_student_data('student',$student_data_en,$student_id);
                   if($update)
                   {
                        $state = true;  
                   }    
            }
            if($state==true)
            {
                 $student_general_info = $this->student_model->get_student_details($student_id);
                 if(count($student_general_info))
                 {
                     $student_general_info[0]['province_asli'] = $this->get_public_data->get_id('provinces',array('prov_id'=>$student_general_info[0]['origenal_province']),'prov_name'); 
                     $student_general_info[0]['province_current'] = $this->get_public_data->get_id('provinces',array('prov_id'=>$student_general_info[0]['current_province']),'prov_name');
                     $student_general_info[0]['district_asli'] = $this->get_public_data->get_id('districts',array('district_id'=>$student_general_info[0]['origenal_district']),'district_name'); 
                     $student_general_info[0]['district_current'] = $this->get_public_data->get_id('districts',array('district_id'=>$student_general_info[0]['current_district']),'district_name');
                     $data['student_data'] = $student_general_info;
                     $data['student_family_data'] = $this->student_model->get_student_family($student_id);
                     $data['student_memo'] = $this->student_model->get_student_memo($student_id);
                     $data['stud_deploma_project'] = $this->get_public_data->get_all_data('student_deploma_project',array('student_id'=>$student_id));
                     if(count($data['stud_deploma_project'])>0)
                     {
                        $teacher_name = $this->get_public_data->get_id('staff',array('s_id'=>$data['stud_deploma_project'][0]['teacher_id']),'dari_name');
                        $teacher_lName = $this->get_public_data->get_id('staff',array('s_id'=>$data['stud_deploma_project'][0]['teacher_id']),'dari_lName');
                        $data['stud_deploma_project'][0]['teacher_id'] = $teacher_name.' '.$teacher_lName; 
                      }
                     $data['gender'] = $this->get_public_data->get_all_data('gender');
                     $data['state'] = $this->get_public_data->get_all_data('state');
                     $data['province'] = $this->get_public_data->get_all_data('provinces');
                     $data['o_district'] = $this->get_public_data->get_all_data('districts',array('prov_id'=>$student_general_info[0]['origenal_province']));
                     $data['c_district'] = $this->get_public_data->get_all_data('districts',array('prov_id'=>$student_general_info[0]['current_province']));
                     $data['department'] = $this->get_public_data->get_all_data('department');
                     if($parmeter=='photo_data')
                     {
                        $this->load->view('student/v_student_details',$data); 
                     }
                     else
                     {
                        $this->load->view('student/v_student_details_update',$data); 
                     }
                 }
                 else
                 {
                     echo 'error';exit;
                 }
           }
            else
            {
                echo 'error';exit;
            }
        }
    }
    public function student_register()
    {
        header_tph('');
        menu_tph('register','student');
        $data['province'] = $this->get_public_data->get_all_data('provinces');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['gender'] = $this->get_public_data->get_all_data('gender');
        $data['state'] = $this->get_public_data->get_all_data('state');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $data['university_entry_type'] =  $this->get_public_data->get_all_data('student_entry_type');
        $this->load->view('student/v_register',$data);
        footer_tph();
    }
    public function do_register()
    {
        $this->form_validation->set_rules('s_english_name','name','trim|required');
        $this->form_validation->set_rules('s_dari_name','name','trim|required');
        $this->form_validation->set_rules('s_english_fName','father name','trim|required');
        $this->form_validation->set_rules('s_dari_fName','father name','trim|required');
        $this->form_validation->set_rules('s_english_gFName','granfather name','trim|required');
        $this->form_validation->set_rules('s_dari_gFName','granfather name','trim|required');
        $this->form_validation->set_rules('s_mother_tong','mother tong','trim|required');
        $this->form_validation->set_rules('school','school','trim|required');
        $this->form_validation->set_rules('phoneNumber','phone number','trim|numeric');
        $this->form_validation->set_rules('s_nationalID','tazkira number','trim|required|numeric|is_unique[tazkira.tazkira_number]');
        $this->form_validation->set_rules('kankor_number','kankor mark','numeric');
        $this->form_validation->set_rules('email','email','valid_email');
        $this->form_validation->set_rules('department','department','callback_select_check');
        $this->form_validation->set_rules('phone_number','phone number','trim|numeric');
        $this->form_validation->set_rules('email','email','valid_email');
        $this->form_validation->set_rules('f_name','father name','trim|required');
        $this->form_validation->set_rules('f_fName','father father name','trim|required');
        if($this->form_validation->run()==FALSE)
        {
           echo 0;
        }
        else
        {
          $student_data = array(
            'english_name' => $this->input->post('s_english_name'),
            'dari_name' => $this->input->post('s_dari_name'),
            'english_fName' => $this->input->post('s_english_fName'),
            'dari_fName' => $this->input->post('s_dari_fName'),
            'english_gFName' => $this->input->post('s_english_gFName'),
            'dari_gFName' => $this->input->post('s_dari_gFName'),
            'english_lName' => $this->input->post('s_english_lName'),
            'dari_lName' => $this->input->post('s_dari_lName'),
            'nationality' => $this->input->post('s_nationality'),
            'mother_tong' => $this->input->post('s_mother_tong'),
            'grad_school' => $this->input->post('school'),
            'grad_school_year' => $this->input->post('graduated_year'),
            'kankor_entry_year' => $this->input->post('kankor_entry_year'),
            'kankor_score' => $this->input->post('kankor_number'),
            'kankor_id' => $this->input->post('kankorID'),
            'phone_number' => $this->input->post('phoneNumber'),
            'email' => $this->input->post('email'),
            'origenal_province' => $this->input->post('main_province'),
            'origenal_district' => $this->input->post('main_district'),
            'origenal_village' => $this->input->post('main_village'),
            'origenal_homeAddress' => $this->input->post('main_homeAddress'),
            'current_province' => $this->input->post('current_province'),
            'current_district' => $this->input->post('current_district'),
            'current_village' => $this->input->post('current_village'),
            'current_homeAddress' => $this->input->post('current_homeAddress'),
            'university_entry_year' => $this->input->post('u_entry_year'),
            'edu_year' => $this->input->post('u_entry_year'),
            'tazkira_number' => $this->input->post('s_nationalID'),
            'dep_id' => $this->input->post('department'),
           );
            $student_tazkira = array(
            'tazkira_number' => $this->input->post('s_nationalID'),
            'sheath' => $this->input->post('tazkira_jeld'),
            'page' => $this->input->post('tazkira_page'),
            'register_number' => $this->input->post('tazkira_registerNum'),
            'dateOfBirth' => $this->input->post('dateOfBirth'),
            'state_id' => $this->input->post('s_state'),
            'gender_id' => $this->input->post('s_gender'),
            );
              $has_brother = false;
              $has_kaka = false;
              $has_mama = false;
              if($this->input->post('brother_name'))
              {
                  $has_brother = true;
              }
              if($this->input->post('kaka_name'))
              {
                  $has_kaka = true;
             }
              if($this->input->post('mama_name'))
              {
                  $has_mama = true;
              }
             $register = $this->student_model->student_register($student_data,$student_tazkira,$has_brother,$has_kaka,$has_mama);
             if($register)
             {
                 echo 'یک محصل موفقانه ثبت نام شد.';
             }
             else
             {
                 echo 0;
             }  
        }
    }
    public function test()
    {
        $this->db->select('student_id');
        $this->db->from('student');
        $query=$this->db->get();
        $s=$query->result_array();
        foreach($s as $a)
        {
            $this->db->select('*');
            $this->db->from('tazkira');
            $this->db->where('student_id',$a['student_id']);
            $query=$this->db->get();
            if(count($query->result())!=1)
            {
                echo  $a['student_id'];
            }
        }
    }
    //it for dropdown menu validation 
    public function select_check($val='')
    {
        if ($val == 0 || $val==''):
            $this->form_validation->set_message('select_check', 'Please select % s');
            return FALSe;
        else:
            return $val;
        endif;
    }
    //for checking the existence of a value
    public function _isExist($table='',$field='',$value='')
    {
        return $this->student_model->check_exist($table,$field,$value);
    }
    public function test_result()
    {
        $this->db->select('*');
        $this->db->from('result');
        $this->db->where('subject_id','CE801');
        $query = $this->db->get();
        $result = $query->result();
        echo count($result);
    }
 } 
