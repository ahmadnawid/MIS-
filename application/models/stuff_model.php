<?php
  class Stuff_model extends CI_Model{
      function __Construct()
      {
          parent::__Construct();
          $this->load->database();
      }
      public function get_staff($conn='',$staff_id='',$limit_row='',$starting=0)
      {
            $this->db->select('*');
            $this->db->from('staff');
            $this->db->join('edu_degree','staff.edu_degree=edu_degree.edu_degree_id');
            //$this->db->join('knowllage_degree','staff.knowllage_degree=knowllage_degree.knowllage_degree_id');
            $this->db->where($conn);
            if($staff_id!='')
            {
                $this->db->like('staff.staff_id',$staff_id);
                $this->db->or_like('staff.dari_name',$staff_id);
            }
            if($limit_row!='')
            {
              $this->db->limit($limit_row,$starting);
            }
            $this->db->order_by('staff.university_entry_year');    
            $query = $this->db->get();
            return $query->result_array();
      }
      public function select_staff($table,$data,$on,$conn='')
      {
            $this->db->select($data);
            $this->db->from($table['first']);
            $this->db->join($table['second'],$on);
            if($conn!='')
            {
                $this->db->where($conn); 
            } 
            $query = $this->db->get();
            return $query->result_array();
      }
      public function staff_edu($staff_id='')
      {
         $this->db->select('*');
         $this->db->from('staff_education');
         $this->db->join('edu_degree','edu_degree.edu_degree_id=staff_education.edu_degree_id');
         $this->db->where('staff_education.s_id',$staff_id);
         $this->db->order_by('edu_degree.edu_degree_id');  
         $query = $this->db->get();
         return $query->result_array(); 
      }
      public function teacher_promotion($staff_id)
      {
         $this->db->select('*');
         $this->db->from('staff_promotion');
         $this->db->join('knowllage_degree','knowllage_degree.knowllage_degree_id=staff_promotion.prom_degree');
         $this->db->where('staff_promotion.s_id',$staff_id);
         $query = $this->db->get();
         return $query->result_array(); 
      }
      public function stuff_insertion($stuff_data,$stuff_tazkira_data,$stuff_school_data,$edu_degree)
      {
          $this->db->trans_begin();
          //transaction start
          $s_counter = $this->max_number_staff($stuff_data['university_entry_year']);
          $s_counter++;
          $stuff_data['entry_year_counter'] = $s_counter;
          if($s_counter>0 && $s_counter<10)
          {
              $s_counter = '0'.$s_counter;
          }
          $staff_id = 'CEI'.substr($stuff_data['university_entry_year'],2,2).$s_counter;
          $stuff_data['staff_id'] = $staff_id;
          $this->db->insert('staff',$stuff_data);
          $s_id = $this->get_staff_id($staff_id);
          if($s_id!=NULL)
          {
              $stuff_tazkira_data['student_id'] = $s_id;
              $this->db->insert('tazkira',$stuff_tazkira_data);
              $stuff_school_data['s_id'] = $s_id;
              $this->db->insert('staff_education',$stuff_school_data);
              if($edu_degree==2)
              {
                  $stuff_b_data = array(
                  'eduOrg_dari_name' => $this->input->post('bU_dari_name'),
                  'eduOrg_english_name' => $this->input->post('bU_english_name'),
                  'edu_dari_field' => $this->input->post('bfield_dari_name'),
                  'edu_english_field' => $this->input->post('bfield_english_name'),
                  'eduOrg_entry_date' => $this->input->post('b_entry_year'),
                  'eduOrg_english_location' => $this->input->post('bC_dari_name'),
                  'eduOrg_dari_location' => $this->input->post('bC_english_name'),
                  'eduOrg_grad_date' => $this->input->post('b_graduated_year'),
                  'edu_degree_id' => 2,
                  's_id' => $s_id
                  );
                  $this->db->insert('staff_education',$stuff_b_data);
              }
          }
          if($this->db->trans_status() === FALSE)
          {
            $this->db->trans_rollback();
            return false;
          }
          else
          {
            $this->db->trans_commit();
            return true;
          } 
      }
      public function max_number_staff($year)
      {
          $this->db->select_max('entry_year_counter');
          $this->db->where('university_entry_year',$year);
          $query = $this->db->get('staff');
          if($query->num_rows>0)
          {
              return $query->row()->entry_year_counter;
          }
          else
          {
              return 0;
          }
      }
      public function get_staff_id($id)
      {
          $query = $this->db->get_where('staff',array('staff_id'=>$id));
          if($query->num_rows>0)
          {
              return $query->row()->s_id;
          }
          else
          {
              return NULL;
          }
      }
      public function add_new_tarfi($data)
      {
          $insert = $this->db->insert('staff_promotion',$data);
          if($insert)
          {
              $update_data = array(
              'knowllage_degree' => $data['prom_degree']
              );
              $this->db->where(array('s_id'=>$data['s_id']));
              $update = $this->db->update('staff',$update_data);
              if($update)
              {
                 return true; 
              }
              else
              {
                  return false;
              }
          }
          else
          {
              return false;
          }
      }
      public function add_exeption_staff($data)
      {
           $insert = $this->db->insert('staff',$data);
           if($insert)
           {
               return true;
           }
           else
           {
               return false;
           }
      }
  }