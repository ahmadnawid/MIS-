<?php
  class Student_model extends CI_Model{
      function __Construct()
      {
          parent::__Construct();
          $this->load->database();
      }
      public function student_register($student_data,$s_tazkira,$has_brother,$has_kaka,$has_mama)
      {
          $this->db->trans_begin();
          $config =array(
          'upload_path' => realpath(APPPATH . '../img/student'),
          'allowed_types' => 'jpg|jpeg|gif|png',
          'file_name' => $student_data['tazkira_number'].'.jpg',
          'overwrite' => true,
          'max_size' => '500',
          'max_width' => '1024',
          'max_height' => '768',
          );
          $this->load->library('upload', $config);
          if($this->upload->do_upload('s_photo'))
          {
            $student_data['photo'] = 'img/student/'.$config['file_name'];
          }
          $condition = array(
          'university_entry_year'=>$student_data['university_entry_year']
          );
          $numberOfStudent = $this->max_number_students($condition);
          $numberOfStudent++;
          if($numberOfStudent>0 && $numberOfStudent<10)
          {
              $numberOfStudent = '00'.$numberOfStudent;
          }
          if($numberOfStudent>=10 && $numberOfStudent<100)
          {
              $numberOfStudent = '0'.$numberOfStudent;
          }
          $student_data['student_id'] = 'CEI'.substr($student_data['university_entry_year'],2,2).$numberOfStudent;
          $student_data['s_entryYear_counter'] = $numberOfStudent;
          $s_tazkira['student_id'] = $student_data['student_id'];
          $this->db->insert('student',$student_data);
          $this->db->insert('tazkira',$s_tazkira);
          $data_father = array(
                  'student_id' => $student_data['student_id'],
                  'sFamily_name' => $this->input->post('f_name'),
                  'sFamily_fName' => $this->input->post('f_fName'),
                  'sFamily_occupation' => $this->input->post('f_occupation'),
                  'sFamily_phone' => $this->input->post('f_phoneNumber'),
                  'familyRelation_type_id' =>1,
          );
          $this->db->insert('student_family',$data_father);
          if($has_brother)
          {
              $data_brother = array(
                  'student_id' => $student_data['student_id'],
                  'sFamily_name' => $this->input->post('brother_name'),
                  'sFamily_fName' => $this->input->post('brother_fName'),
                  'sFamily_occupation' => $this->input->post('brother_occupation'),
                  'sFamily_phone' => $this->input->post('brother_phoneNumber'),
                  'familyRelation_type_id' =>2,
              );
              $this->db->insert('student_family',$data_brother);
          }
          if($has_kaka)
          {
              $data_kaka = array(
                  'student_id' => $student_data['student_id'],
                  'sFamily_name' => $this->input->post('kaka_name'),
                  'sFamily_fName' => $this->input->post('kaka_fName'),
                  'sFamily_occupation' => $this->input->post('kaka_occupation'),
                  'sFamily_phone' => $this->input->post('kaka_phoneNumber'),
                  'familyRelation_type_id' =>3,
              );
              $this->db->insert('student_family',$data_kaka);
          }
          if($has_mama)
          {
              $data_mama = array(
                  'student_id' => $student_data['student_id'],
                  'sFamily_name' => $this->input->post('mama_name'),
                  'sFamily_fName' => $this->input->post('mama_fName'),
                  'sFamily_occupation' => $this->input->post('mama_occupation'),
                  'sFamily_phone' => $this->input->post('mama_phoneNumber'),
                  'familyRelation_type_id' =>4,
              );
              $this->db->insert('student_family',$data_mama);
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
      public function p_insertion_s($student_data)
      {
          $i=0;
          while($i<count($student_data))
          {
             $data = array(
             'student_id' => $student_data[$i],
             'project_dari_name' => $this->input->post('pdn_'.$student_data[$i]),
             'project_english_name' => $this->input->post('pen_'.$student_data[$i]),
             'teacher_id' => $this->input->post('ptn_'.$student_data[$i]),
             'score' => $this->input->post('score_'.$student_data[$i]),
             'graduated_date' => $this->input->post('gd_'.$student_data[$i]),
             'dari_graduated_date' => $this->input->post('dgd_'.$student_data[$i]),
             );
             if($this->check_exist('student_deploma_project','student_id',$student_data[$i]))
             {
                 $this->db->where('student_id',$student_data[$i]);
                 $this->db->update('student_deploma_project',$data);
             }
             else
             {
                 $this->db->insert('student_deploma_project',$data);
             } 
             $i++;
          }
      }
      public function select_student($data="*",$conn="",$sort_feild='',$sort_state='')
      {
          $this->db->select($data);
          $this->db->from('student');
          if($conn!='')
          {
             $this->db->like($conn);  
          }
          if($sort_feild!='' && $sort_state!='')
          {
              $this->db->order_by($sort_feild,$sort_state);
          }
          $query=$this->db->get();
          return $query->result_array();
      }
      public function max_number_students($year)
      {
          $this->db->select_max('s_entryYear_counter');
          $this->db->where($year);
          $query = $this->db->get('student');
          if($query->num_rows>0)
          {
              return $query->row()->s_entryYear_counter;
          }
          else
          {
              return 0;
          }
      }
      public function update_data($table,$data,$conn)
      {
          $this->db->where($conn);
          $update = $this->db->update($table,$data);
          if($update)
          {
              return true;
          }
          else
          {
              return false;
          }
      }
      public function get_student($where='',$limit_row='',$starting=0)
      {
         $this->db->select('*');
         $this->db->from('student');
         $this->db->join('tazkira','student.student_id=tazkira.student_id');
         $this->db->join('student_state','student.sState_id=student_state.sState_id');
         $this->db->join('department','student.dep_id=department.dep_id');
         if($where!='')
         {
            $this->db->like($where); 
         }
         if($limit_row!='')
         {
            $this->db->limit($limit_row,$starting);
         }   
         $query = $this->db->get();
         return $query->result_array();
      }
      public function get_student_details($student_id='')
      {
         $this->db->select('*');
         $this->db->from('student');
         $this->db->join('tazkira','student.student_id=tazkira.student_id');
         $this->db->join('student_state','student.sState_id=student_state.sState_id');
         $this->db->join('department','student.dep_id=department.dep_id');
         //$this->db->join('semester','student.semester_id=semester.semester_id');
         $this->db->join('gender','tazkira.gender_id=gender.gender_id');
         $this->db->join('state','tazkira.state_id=state.state_id');
         $this->db->where('student.student_id',$student_id);   
         $query = $this->db->get();
         return $query->result_array();
      }
      public function get_student_family($student_id='')
      {
         $this->db->select('*');
         $this->db->from('student_family');
         $this->db->join('familyrelation_type','student_family.familyRelation_type_id=familyrelation_type.familyRelation_type_id');
         $this->db->where('student_family.student_id',$student_id);
         $query = $this->db->get();
         return $query->result_array(); 
      }
      public function get_student_memo($student_id='')
      {
         $this->db->select('*');
         $this->db->from('student_memo');
         $this->db->join('student_state','student_state.sState_id=student_memo.memo_type');
         $this->db->join('semester','semester.semester_id=student_memo.semester_id');
         $this->db->where('student_memo.student_id',$student_id);
         $query = $this->db->get();
         return $query->result_array();  
      }
      public function get_s_eduYear($student_id='')
      {
          $this->db->select('edu_year');
          $this->db->from('result');
          $this->db->where('student_id',$student_id);
          $this->db->distinct('edu_year');
          $this->db->order_by('edu_year','asc');
          $query = $this->db->get();
          return $query->result_array();
      }
      public function get_eduYear_semester($student_id='',$edu_year='')
      {
         $this->db->select('result.semester_id,semester.semester_name');
          $this->db->from('result');
          $this->db->join('semester','result.semester_id=semester.semester_id');
          $this->db->where('result.student_id',$student_id);
          $this->db->where('result.edu_year',$edu_year);
          $this->db->distinct('result.semester_id');
          $this->db->order_by('result.semester_id');
          $query = $this->db->get();
          return $query->result_array(); 
      }
      //public function get_eduYear_semester_c($student_id='',$edu_year='')
//      {
//         $this->db->select('result.semester_id,semester.semester_name');
//          $this->db->from('result');
//          $this->db->join('semester','result.semester_id=semester.semester_id');
//          $this->db->where('result.student_id',$student_id);
//          $this->db->where('result.edu_year',$edu_year);
//          $this->db->distinct('result.semester_id');
//          $this->db->order_by('result.semester_id');
//          $query = $this->db->get();
//          return $query->result_array(); 
//      }
      public function get_semester_score($student_id='',$edu_year='',$semester='',$chance_id='')
      {
          $where = array(
          'result.student_id' => $student_id,
          'result.edu_year' => $edu_year,
          'result.semester_id' => $semester,
          'result.chance_id' => $chance_id
          );
          $this->db->select('*');
          $this->db->from('result');
          $this->db->join('subject','subject.subject_id=result.subject_id');
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array();
      }
      public function get_s_sResult($student_id='',$edu_year='',$semester='',$lang='')
      {
         $where = array(
          'student_result_state.student_id' => $student_id,
          'student_result_state.edu_year' => $edu_year,
          'student_result_state.semester_id' => $semester
          );
          $this->db->select('*');
          $this->db->from('student_result_state');
          $this->db->join('result_state','student_result_state.result_state=result_state.resultState_id');
          $this->db->where($where);
          $this->db->order_by('student_result_state.chance_id','asc');
          $query = $this->db->get();
          $result = $query->result_array();
          $result_state = NULL;
          foreach($result as $r):
            $result_state = $r[$lang.'resultState_name'];
          endforeach;
          return $result_state;
      }
      public function get_field_name($table,$conn,$field)
      {
           $query = $this->db->get_where($table,$conn);
          if($query->num_rows>0)
          {
              $row = $query->row();
              return $row->$field;
          }
          else
          {
              return NULL;
          }
      }
      public function update_student_data($table='',$data='',$student_id='')
      {
         $this->db->where('student_id',$student_id);
         $update = $this->db->update($table,$data); 
         if($update)
         {
             return true;
         }
         else
         {
             return false;
         }
      }
      public function check_exist($table,$field,$value)
      {
          $this->db->select($field);
          $this->db->from($table);
          $this->db->where($field,$value);
          $query=$this->db->get();
          if($query->num_rows>0)
          {
            return TRUE;
          }
          else
          {
            return FALSE;
          }  
      }
      public function student_two_table($tables,$on,$data,$conn,$order)
      {
          $this->db->select($data);
          $this->db->from($tables['first']);
          $this->db->join($tables['second'],$on);
          $this->db->where($conn);
          for($i=0;$i<count($order);$i++)
          {
            $this->db->order_by($order[$i]);  
          }
          $query = $this->db->get();
          return $query->result_array();
      }
      public function select_graduated_student($where)
      {
          $this->db->select('*');
          $this->db->from('student');
          $this->db->join('tazkira','student.student_id=tazkira.student_id');
          $this->db->join('student_deploma_project','student.student_id=student_deploma_project.student_id');
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array(); 
      }
      public function test($where)
      {
          $this->db->select('*');
          $this->db->from('student');
          $this->db->join('result','student.student_id=result.student_id');
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array();
      }
      public function test_update($student_id,$subject_id)
      {
          $data = array(
          'subject_credit' => 4
          );
          $this->db->where('student_id',$student_id);
          $this->db->where('subject_id',$subject_id);
          $this->db->update('result',$data);
      }
  }