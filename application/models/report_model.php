<?php
  class Report_model extends CI_Model{
      function __Construct()
      {
          parent::__Construct();
          $this->load->database();
      }
      public function select_student_result($where,$limit_row='',$starting='')
      {
         $this->db->select('s.student_id,s.dari_name,s.dari_fName,sem.semester_name,d.dep_expression,rS.resultState_name',FALSE);
         $this->db->from('student_result_state as sR');
         $this->db->join('student as s','s.student_id=sR.student_id');
         $this->db->join('result_state as rS','rS.resultState_id=sR.result_state');
         $this->db->join('department as d','s.dep_id=d.dep_id');
         $this->db->join('semester as sem','sR.semester_id=sem.semester_id');
         $this->db->where($where); 
         if($limit_row!='')
         {
            $this->db->limit($limit_row,$starting);
         }
         $this->db->order_by('sR.semester_id','asc');
         $this->db->order_by('s.dep_id');
         $this->db->order_by('sR.result_state');   
         $query = $this->db->get();
         return $query->result_array();
      }
  }