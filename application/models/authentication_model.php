<?php
/**
 * this class including all function do the dashboard databases informations
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
  class Authentication_model extends CI_Model{
      public function __Construct()
      {
          parent::__construct();
          $this->load->database();
      }
     var $details;
    public function validate_user($identity,$password) {
        $this->db->from('users');
        $this->db->where('user_name',$identity );
        $this->db->where('password',md5($password));
        $login = $this->db->get()->result();
        if ( is_array($login) && count($login) == 1 ) {
            $this->details = $login[0];
            $this->set_session();
            return true;
        }

        return false;
    }
    public function set_session() {
    $this->session->set_userdata( 
        array(
            'user_name'=>$this->details->user_name,
            'access_rule'=>$this->details->rule_id,
            's_id' => $this->details->s_id,
            'isLoggedIn'=>1
            )
            );
    }
 }