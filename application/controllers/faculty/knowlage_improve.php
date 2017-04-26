<?php
      /**
 * this class including all function do the process belong to student 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class knowlage_improve extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library('form_validation');
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
    public function add_tarfi()
    {
       header_tph('');
       menu_tph('knowlage_improve','faculty');
       $data['department'] = $this->get_public_data->get_all_data('department');
       $data['knowllage_degree'] = $this->get_public_data->get_all_data('knowllage_degree');
       $data['edu_degree'] = $this->get_public_data->get_all_data('edu_degree');
       $where = array();
       $data['staff'] = $this->stuff_model->get_staff($where);
       $this->load->view('faculty/v_add_promotion',$data);
       footer_tph(); 
    }
    public function add_new_tarfi()
    {
       $data = array(
       's_id' => $this->input->post('staff'),
       'prom_degree' => $this->input->post('knowlage_degree'),
       'prom_date' => $this->input->post('tarfi_date'),
       'prom_discription' => $this->input->post('tarfi_details'),
       );
       $insert = $this->stuff_model->add_new_tarfi($data);
       if($insert)
       {
           redirect(site_url().'faculty/knowlage_improve/add_tarfi.php');
       }
    }
 }
