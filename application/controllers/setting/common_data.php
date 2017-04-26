<?php
  class Common_data extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->model('get_public_data');
    }
    public function destruct()
    {
        //destuct;
    }
    public function get_districts()
    {
        $prov_id = $this->input->post('province');
        $where = array(
        'prov_id'=>$prov_id,
        );
        $districts = $this->get_public_data->get_all_data('districts',$where);
        $html = '<option value="0">انتخاب نمایید</option>';
        foreach($districts as $dis):
        $html.='<option value="'.$dis['district_id'].'">'.$dis['district_name'].'</option>';
        endforeach;
        echo $html;
    }
        
}
