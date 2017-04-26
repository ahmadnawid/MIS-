<?php
  class Subject_model extends CI_Model{
      function __Construct()
      {
          parent::__Construct();
          $this->load->database();
      }
      // this function is for adding new subject
      public function add_new_subject($sub_data,$dep_study)
      {
          $this->db->trans_begin();
          $this->db->insert('subject',$sub_data);
          for($i=0;$i<sizeof($dep_study);$i++)
          {
              $data = array(
              'dep_id' => $dep_study[$i],
              'subject_id' => $sub_data['subject_id'],
              );
              $this->db->insert('department_subject',$data);
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
      public function update_subject($subject_id,$sub_data,$dep_study)
      {
          $this->db->trans_begin();
          $this->db->update('subject',$sub_data,array('subject_id'=>$subject_id));
          $this->db->delete('department_subject',array('subject_id'=>$subject_id));
          for($i=0;$i<sizeof($dep_study);$i++)
          {
              $data = array(
              'dep_id' => $dep_study[$i],
              'subject_id' => $subject_id,
              );
              $this->db->insert('department_subject',$data);
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
      // this function is for assigning subject to department according to semester and edu_year
      public function assign_subject($edu_year,$semester_id,$dep_id,$subject_id,$subject_credit,$teacher_id)
      {
         $this->db->trans_begin();
         $sub_data = array(
         'edu_year' => $edu_year,
         'semester_id' => $semester_id,
         'dep_id' => $dep_id,
         'subject_id' => $subject_id,
         'subject_credit' => $subject_credit,
         'teacher_id' => $teacher_id
         );
         $insert = $this->db->insert('eduyear_semester_subjects',$sub_data);
         /*if($insert)
         {
             if($semester_id%2!=0)
             {
                 $edu_year = $edu_year-1;
             }
            $query = $this->db->query("select * from student_result_state r left join student s on s.student_id=r.student_id
            where s.dep_id=$dep_id and r.edu_year=$edu_year and r.semester_id=$semester_id-1 and chance_id!=4 and result_state!=5 and result_state!=7");
             $result=$query->result_array();
             if($semester_id%2!=0)
             {
                 $edu_year = $edu_year+1;
             }
             foreach($result as $res):
                 $conn = array(
                  'student_id' => $res['student_id'],
                  'edu_year' => $edu_year,
                  'semester_id' => $semester_id,
                  'subject_id' => $subject_id,
                  'chance_id' => 1
                  );
                  if(!$this->data_exist('result',$conn))
                  {
                      $conn['subject_credit'] = $subject_credit;
                      if(!$this->db->insert('result',$conn))
                      {
                          $this->db->trans_rollback();
                          return false;
                      }  
                  }
                  $where_s_r = array(
                  'student_id' => $res['student_id'],
                  'edu_year' => $edu_year,
                  'semester_id' => $semester_id,
                  'chance_id' => 1
                  );
                  if(!$this->data_exist('student_result_state',$where_s_r))
                  {
                    if(!$this->db->insert('student_result_state',$where_s_r))
                    {
                       $this->db->trans_rollback();
                       return false; 
                    }
                  }
             endforeach;
         } */
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
      public function get_subject_pishniaz($table='',$conn='')
      {
          $this->db->select('*');
          $this->db->from($table);
          $this->db->where($conn);
          $query=$this->db->get();
          return $query->result_array(); 
      }
      function get_all_subject($data='*',$conn='',$order_conn='',$limit_row='',$starting='')
      {
         $this->db->select($data);
         $this->db->from('subject');
         $this->db->join('eduyear_semester_subjects','eduyear_semester_subjects.subject_id=subject.subject_id');
         $this->db->join('subject_category','subject.subCategory_id=subject_category.subCategory_id');
         if($conn!='')
         {
            $this->db->where($conn); 
         }
         if($limit_row!='')
         {
            $this->db->limit($limit_row,$starting);
         } 
         if($order_conn!='')
         {
           $this->db->order_by($order_conn);  
         }
         $query=$this->db->get();
         return $query->result_array(); 
      }
      function get_all_sub($conn,$order_conn='')
      {
         $this->db->select('*');
         $this->db->from('subject');
         $this->db->join('eduyear_semester_subjects','eduyear_semester_subjects.subject_id=subject.subject_id');
         $this->db->where($conn);
         if($order_conn!='')
         {
           $this->db->order_by($order_conn);  
         }
         $this->db->order_by("eduyear_semester_subjects.subject_id", "desc");
         $query=$this->db->get();
         return $query->result_array(); 
      }
      public function get_subject($data='*',$conn='',$or_conn='',$order_conn='',$limit_row='',$starting='')
      {
          $this->db->select($data);
         $this->db->from('subject s');
         $this->db->join('subject_category sc','s.subCategory_id=sc.subCategory_id');
         if($conn!='')
         {
            $this->db->like($conn); 
         }
         if($or_conn!='')
         {
            $this->db->or_like($or_conn); 
         }
         if($limit_row!='')
         {
            $this->db->limit($limit_row,$starting);
         } 
         if($order_conn!='')
         {
           $this->db->order_by($order_conn);  
         }
         $query=$this->db->get();
         return $query->result_array(); 
          
      }
      public function get_teached_subject($data='*',$conn='',$limit_row='',$starting='')
      {
         $this->db->select($data);
         $this->db->from('eduyear_semester_subjects es');
         $this->db->join('subject s','s.subject_id=es.subject_id');
         $this->db->join('semester sem','sem.semester_id=es.semester_id');
         $this->db->join('department d','d.dep_id=es.dep_id');
         if($conn!='')
         {
            $this->db->where($conn); 
         }
         if($limit_row!='')
         {
            $this->db->limit($limit_row,$starting);
         } 
         $this->db->order_by('es.edu_year','desc');
         $this->db->order_by('es.semester_id','asc');
         $query=$this->db->get();
         return $query->result_array(); 
          
      }
      // this function is for checking that the gevine data exist or no according to conndition
      public function data_exist($table,$conn)
      {
          $query = $this->db->get_where($table,$conn);
          $result = $query->result();
          if(empty($result))
          {
              return false;
          }
          else
          {
              return true;
          }
      }
  }