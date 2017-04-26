<?php
    /**
 * this class including all function do the process belong to student 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Stuff extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','ajax_pagination'));
        $this->load->model(array('get_public_data','stuff_model'));
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
        menu_tph('search_staff','faculty');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['knowllage_degree'] = $this->get_public_data->get_all_data('knowllage_degree');
        $data['edu_degree'] = $this->get_public_data->get_all_data('edu_degree');
        $where = array();
        $per_page = 20;
        $staff = $this->stuff_model->get_staff($where);
        $data['all_staff'] = count($staff);
        //call the pagination library class for making pagination
        $this->ajax_pagination->make_search(count($staff),0,$per_page,"|<",">|","<<",">>",base_url()."faculty/stuff/paging",'list','search_staff');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $staff = $this->stuff_model->get_staff($where,'',$per_page,0);
        for($i=0;$i<count($staff);$i++)
        {
           $staff[$i]['knowllage_degree'] = $this->get_public_data->get_id('knowllage_degree',array('knowllage_degree_id'=>$staff[$i]['knowllage_degree']),'knowllage_degree_name');
           $staff[$i]['department'] = $this->get_public_data->get_all_data('department'); 
        }
        $data['staff'] = $staff;
        $data['number'] = 1;
        $this->load->view('faculty/v_home',$data);
        footer_tph(); 
    }
    public function s_staff()
    {
        $staff_id='';
        $where = array();
        $per_page = 20;
        if($this->input->post('staff_id'))
        {
            $staff_id = $this->input->post('staff_id');
        }
        if($this->input->post('edu_degree'))
        {
            $where['staff.edu_degree'] = $this->input->post('edu_degree');
        }
        if($this->input->post('knowllage_degree'))
        {
            $where['staff.knowllage_degree'] = $this->input->post('knowllage_degree');
        }
        if($this->input->post('dep'))
        {
            $where['staff.dep_id'] = $this->input->post('dep');
        }
        $staff = $this->stuff_model->get_staff($where,$staff_id);
        $data['all_staff'] = count($staff);
        //call the pagination library class for making pagination
        $this->ajax_pagination->make_search(count($staff),0,$per_page,"|<",">|","<<",">>",base_url()."faculty/stuff/paging",'list','search_staff');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $staff = $this->stuff_model->get_staff($where,$staff_id,$per_page,0);
        for($i=0;$i<count($staff);$i++)
        {
           $staff[$i]['knowllage_degree'] = $this->get_public_data->get_id('knowllage_degree',array('knowllage_degree_id'=>$staff[$i]['knowllage_degree']),'knowllage_degree_name');
           $staff[$i]['department'] = $this->get_public_data->get_all_data('department'); 
        }
        $data['staff'] = $staff;
        $data['number'] = 1;
        $this->load->view('faculty/v_searched_staff',$data);
    }
    public function staff_info_details()
    {
        if($this->input->post('identity'))
       {
            $staff_id = $this->input->post('identity');
            $staff_general_info = $this->get_public_data->get_all_data('staff',array('s_id'=>$staff_id));
            $staff_general_info[0]['k'] = $this->get_public_data->get_id('knowllage_degree',array('knowllage_degree_id'=>$staff_general_info[0]['knowllage_degree']),'knowllage_degree_name');
            $staff_general_info[0]['e'] = $this->get_public_data->get_id('edu_degree',array('edu_degree_id'=>$staff_general_info[0]['edu_degree']),'edu_degree_name');
            $data['staff_data'] = $staff_general_info;
            $data['staff_tazkira'] = $this->get_public_data->get_all_data('tazkira',array('student_id'=>$staff_id));
            $data['staff_edu'] = $this->stuff_model->staff_edu($staff_id);
            $data['staff_promotion'] = $this->stuff_model->teacher_promotion($staff_id);
            $data['gender'] = $this->get_public_data->get_all_data('gender');
            $data['state'] = $this->get_public_data->get_all_data('state');
            $data['department'] = $this->get_public_data->get_all_data('department');
            $this->load->view('faculty/v_staff_detials',$data);
       }
       else
       {
           echo 'data not found';
       }
    }
    public function paging()
    {
        if($this->input->post('form_id') and $this->input->post('per_page'))
        {
        $start = $this->input->post('starting');
        $form_id = $this->input->post('form_id');
        $per_page = $this->input->post('per_page');
        $staff_id='';
        $where = array();
        if($this->input->post('staff_id'))
        {
            $staff_id = $this->input->post('staff_id');
        }
        if($this->input->post('edu_degree'))
        {
            $where['staff.edu_degree'] = $this->input->post('edu_degree');
        }
        if($this->input->post('knowllage_degree'))
        {
            $where['staff.knowllage_degree'] = $this->input->post('knowllage_degree');
        }
        if($this->input->post('dep'))
        {
            $where['staff.dep_id'] = $this->input->post('dep');
        }
        $staff = $this->stuff_model->get_staff($where,$staff_id);
        $data['all_staff'] = count($staff);
        //call the pagination library class for making pagination
        $this->ajax_pagination->make_search(count($staff),$start,$per_page,"|<",">|","<<",">>",base_url()."faculty/stuff/paging",'list','search_staff');
        $data['link'] = $this->ajax_pagination->anchors;
        $data['total'] = $this->ajax_pagination->total;
        $data['perPage'] = $this->ajax_pagination->perPage;
        $staff = $this->stuff_model->get_staff($where,$staff_id,$per_page,$start);
        for($i=0;$i<count($staff);$i++)
        {
           $staff[$i]['knowllage_degree'] = $this->get_public_data->get_id('knowllage_degree',array('knowllage_degree_id'=>$staff[$i]['knowllage_degree']),'knowllage_degree_name');
           $staff[$i]['department'] = $this->get_public_data->get_all_data('department'); 
        }
        $data['staff'] = $staff;
        $data['number'] = $start+1;
        sleep(1);
        $this->load->view('faculty/v_staff_paging',$data);
        }
    }
    public function register_staff()
    {
        header_tph('');
        menu_tph('add_staff','faculty');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['gender'] = $this->get_public_data->get_all_data('gender');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $data['edu_degree'] = $this->get_public_data->get_all_data('edu_degree');
        $data['knowllage_degree'] = $this->get_public_data->get_all_data('knowllage_degree');
        $this->load->view('faculty/v_add_stuff',$data);
        footer_tph();  
    }
    public function do_register()
    {
        $this->form_validation->set_rules('stuff_dari_name','staff name','trim|required');
        $this->form_validation->set_rules('stuff_english_name','staff name','trim|required');
        $this->form_validation->set_rules('stuff_dari_fName','staff father name','trim|required');
        $this->form_validation->set_rules('stuff_english_fName','staff father name','trim|required');
        $this->form_validation->set_rules('email','email','valid_email');
        $this->form_validation->set_rules('phone_number','phone number','integer');
        $this->form_validation->set_rules('department','department','callback_select_check');
        if($this->form_validation->run()==FALSE)
        {
            echo 0;
        }
        else
        {
            $stuff_data = array(
            'dari_name' => $this->input->post('stuff_dari_name'),
            'english_name' => $this->input->post('stuff_english_name'),
            'dari_fName' => $this->input->post('stuff_dari_fName'),
            'english_fName' => $this->input->post('stuff_english_fName'),
            'dari_lName' => $this->input->post('stuff_dari_lName'),
            'english_lName' => $this->input->post('stuff_english_lName'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number'),
            'dari_placeOfBirth' => $this->input->post('dari_placeOfBirth'),
            'english_placeOfBirth' => $this->input->post('english_placeOfBirth'),
            'dari_nationality' => $this->input->post('dari_nationality'),
            'english_nationality' => $this->input->post('english_nationality'),
            'university_entry_year' => $this->input->post('job_entry_year'),
            'dep_id' => $this->input->post('department'),
            'edu_degree' => $this->input->post('edu_degree'),
            'knowllage_degree' => $this->input->post('knowllage_degree'),
            );
            $stuff_tazkira_data = array(
            'tazkira_number' => $this->input->post('tazkira_number'),
            'sheath' => $this->input->post('tazkira_jeld'),
            'page' => $this->input->post('tazkira_page'),
            'register_number' => $this->input->post('tazkira_register_number'),
            'dateOfBirth' => $this->input->post('date_ofBirth'),
            'gender_id' => $this->input->post('gender'),
            );
            $stuff_school_data = array(
            'eduOrg_dari_name' => $this->input->post('dari_school'),
            'eduOrg_english_name' => $this->input->post('english_school'),
            'eduOrg_entry_date' => $this->input->post('school_entry_year'),
            'eduOrg_english_location' => $this->input->post('english_school_location'),
            'eduOrg_dari_location' => $this->input->post('dari_school_location'),
            'eduOrg_grad_date' => $this->input->post('school_graduated_year'),
            'edu_degree_id' => 1,
            );
            $edu_degree = $this->input->post('edu_degree');
            //print_r($stuff_school_data);exit;
            $insert = $this->stuff_model->stuff_insertion($stuff_data,$stuff_tazkira_data,$stuff_school_data,$edu_degree);
            if($insert)
            {
               echo 'یک کارمند موفقانه ثبت شد.';
            }
            else
            {
                echo 0;
            }
        }
    }
    public function add_other($parameter='s')
    {
        if($parameter=='s')
        {
            header_tph('');
            menu_tph('other_teacher','faculty');
            $this->load->view('faculty/v_add_other');
        }
        else
        {
           $this->form_validation->set_rules('name','staff name','trim|required');
           if($this->form_validation->run()==FALSE)
           {
              header_tph('');
              menu_tph('other_teacher','faculty');
              $this->session->set_flashdata('success','<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>پرکردن نام ضروری است...</div>');
              $this->load->view('faculty/v_add_other'); 
           } 
           else
           {
               $data = array(
               'dari_name' => $this->input->post('name'),
               'dari_lName' => $this->input->post('lname'),
               'dep_id' =>0
               );
               $insert = $this->stuff_model->add_exeption_staff($data);
               if($insert)
               {
                   $this->session->set_flashdata('success','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>تبریک میگم!</strong> یک استاد موفقانه ثبت شد.
                        </div>');
                   redirect(base_url().'faculty/stuff/add_other/s');
               }
               else
               {
                   header_tph('');
                   menu_tph('other_teacher','faculty');
                   $this->session->set_flashdata('success','<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>متاسفانه استاد درج نشد؛دوباره کوشش کنید.</div>');
                   $this->load->view('faculty/v_add_other'); 
               } 
           }
        }
        
    }
    //it for dropdown menu validation 
    public function select_check($val)
    {
        if ($val == 0 || $val==''):
            $this->form_validation->set_message('select_check', 'Please select % s');
            return FALSe;
        else:
            return $val;
        endif;
    }
 }