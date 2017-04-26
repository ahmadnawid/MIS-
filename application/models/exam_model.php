<?php
  class Exam_model extends CI_Model{
      function __Construct()
      {
          parent::__Construct();
          $this->load->database();
      }
      public function get_dep_subject($second_table='',$on='',$condition='')
      {
         $this->db->select('*');
          $this->db->from('subject');
          $this->db->join($second_table,$on);
          if($condition!='')
          {
              $this->db->where($condition);
          }
          $query=$this->db->get();
          return $query->result_array(); 
      }
      public function get_edu_subject($condition='',$sem_id='')
      {
          $this->db->select('*');
          $this->db->from('subject');
          $this->db->join('eduyear_semester_subjects','eduyear_semester_subjects.subject_id=subject.subject_id');
          if($condition!='')
          {
              $this->db->where($condition);
          }
          if($sem_id!='')
          { 
             $this->db->where('eduyear_semester_subjects.semester_id',$sem_id);
          }
          $this->db->distinct('eduyear_semester_subjects.subject_id');
          $this->db->order_by("eduyear_semester_subjects.semester_id", "asc");
          $this->db->order_by("eduyear_semester_subjects.dep_id", "asc");  
          $query=$this->db->get();
          return $query->result_array(); 
      }
      // this is for first chance student accorgin to condition 
      public function first_chance_student($dep_id='',$edu_year,$semester_id='',$subject_id='',$chanc_id='')
      {
          $where = array(
          'student.dep_id' => $dep_id, 
          'result.edu_year' => $edu_year,
          'result.semester_id' => $semester_id,
          'result.subject_id' => $subject_id,
          'result.chance_id' => $chanc_id,
          );
          $this->db->select('*'); 
          $this->db->from('student');
          $this->db->join('result','student.student_id=result.student_id','LEFT');
         if($semester_id>1)
         {
             $where_s = array(
             'student_result_state.edu_year' => $edu_year,
             'student_result_state.semester_id' => $semester_id,
             'student_result_state.chance_id' => 1
             );
           $this->db->join('student_result_state','student_result_state.student_id=student.student_id','LEFT');
           $this->db->where($where_s);
         } 
        $this->db->where($where);
        if($semester_id==1)
        {
           $this->db->order_by("student.university_entry_year", "desc"); 
        }
        else
        {
           $this->db->order_by('student.student_id','asc');
           //$this->db->order_by('student_result_state.student_grade', 'asc');  
        }
        $query=$this->db->get();
        return $query->result_array();  
      }
      // this function is for searching student who has chance according to given edu_year and semester and department
      public function other_chance_student($condition)
      {
        $this->db->select('*'); 
        $this->db->from('student'); 
        //$this->db->join('student_result_state','student_result_state.student_id = student.student_id','LEFT');
        $this->db->join('result','result.student_id = student.student_id');
        $this->db->where($condition);
        //$this->db->order_by('result.semester_id','asc');
        //$this->db->order_by('student.dep_id','asc');
        //$this->db->order_by('result.subject_id','asc');
        //$this->db->order_by('result.chance_id','asc');
        $query=$this->db->get();
        return $query->result_array();
      }
      public function get_course($condition,$or_conn='')
      {
        $this->db->select('*'); 
        $this->db->from('eduyear_semester_subjects'); 
        $this->db->join('semester','semester.semester_id = eduyear_semester_subjects.semester_id');
        $this->db->join('department','department.dep_id = eduyear_semester_subjects.dep_id');
        $this->db->where($condition);
        if($or_conn!='')
        {
          $this->db->or_where($or_conn);  
        }
        $this->db->order_by('eduyear_semester_subjects.semester_id','asc');
        $this->db->order_by('eduyear_semester_subjects.dep_id','asc');
        $this->db->order_by('eduyear_semester_subjects.subject_id','asc');
        $query=$this->db->get();
        return $query->result_array();
      }
      //this function is for checking score entered or no
      public function score_entered($conn)
      {
          $this->db->select('*');
          $this->db->from('result');  
          $this->db->join('student','student.student_id=result.student_id');
          $this->db->where($conn);
          $query = $this->db->get();
          return $query->result_array();
      }
      // this  function insert score and result of student
      public function insert_student_mark($subject='',$subject_credit='',$marks='',$semester_id='',$edu_year='',$chance_id='')
      {
          $this->db->trans_begin();
          for($i=0;$i<count($marks);$i++)
          {
              $where = array(
                  'student_id' => $marks[$i],
                  'semester_id' => $semester_id,
                  'edu_year' => $edu_year,
                  'chance_id' => $chance_id
              );
              $where_result = $where;
              $where_result['subject_id'] = $subject;
              $data = array(
              'score' => $this->input->post($marks[$i])
              );
              $this->db->update('result',$data,$where_result);
              if($chance_id==1)
              {
                $this->making_student_result($where);
              }
              else
              {
                $this->makingS_result_chance($where); 
              }
          } //end for
          if ($this->db->trans_status() === FALSE)
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
      //this function is for making student first chance result
      public function making_student_result($conn)
      {
          $query=$this->db->get_where('result',$conn);
          $result=$query->result_array();//getting all score of student according to given semester and education year
          //all below code is for calculating student result in first chance
          $fiel = FALSE;
          $total_credit = 0;
          $total_score = 0;
          $success_credit = 0;
          $fiel_credit = 0;
          foreach($result as $r):
              if($r['score'] < 55)
              {
                $fiel = TRUE;
                $fiel_credit += $r['subject_credit'];
                //$numOfFielSub++;
              }
              else
              {
                $success_credit += $r['subject_credit'];
              }
              $total_credit += $r['subject_credit'];
              $total_score += $r['subject_credit']*$r['score'];
          endforeach;
          if($fiel==FALSE)
          {
              if(($total_score/$total_credit)>=60)
              {
                  $data = array(
                  'result_state' => 1
                  );
                  $this->db->update('student_result_state',$data,$conn);
                  $this->updateS_semester($conn);  
              }
              else
              {
                  $s_state = array(
                  'student_id'=>$conn['student_id'],
                  'semester_id'=>$conn['semester_id']-1,
                  'result_state' => 6
                  );
                  $beforeS_state = $this->check_beforeS_result($s_state);
                  if($beforeS_state==1)
                  {
                     $s_n_state = array(
                     'student_id' => $conn['student_id'],
                     'edu_year' => $conn['edu_year']-1,
                     'semester_id' => $conn['semester_id'],
                     );
                     $last_year = $this->check_beforeS_result($s_n_state);
                     if($last_year==1)
                     {
                          $this->temparary_out($conn);
                     }
                     else
                     {
                        $count_nextY = $this->count_next_year($conn['student_id'],$conn['semester_id']); 
                        if($count_nextY==2)
                        {
                           $this->temparary_out($conn);
                        }
                        else
                        {
                            $this->updateS_nextYear($conn);
                        } 
                     }
                  }
                  else
                  {
                    $data = array(
                    'result_state' => 6
                    );
                    $this->db->update('student_result_state',$data,$conn);
                    $this->updateS_semester($conn);  
                  }  
              }
          }//end if
          else
          {
              if($total_credit%2!=0)
              {
                $success_credit++;
              }
              if($success_credit >= $fiel_credit)
              {
                $data = array(
                'result_state'=>2,
                );
                $this->db->update('student_result_state',$data,$conn);
                foreach($result as $rs):
                      if($rs['score'] < 55)
                      {
                          $where = $conn;
                          $where['chance_id'] = 2;
                          $where['subject_id'] = $rs['subject_id'];
                          if(!$this->data_exist('result',$where))
                          { 
                              $where['subject_credit'] = $rs['subject_credit'];
                              $this->db->insert('result',$where);
                          }
                      }
                      else
                      {
                          $where_d = $conn;
                          $where_d['chance_id'] = 2;
                          $where_d['subject_id'] = $rs['subject_id'];
                          $this->db->delete('result',$where_d);
                      }
                endforeach;
                   $conn['chance_id'] = 2;
                   if(!$this->data_exist('student_result_state',$conn))
                   {
                     $this->db->insert('student_result_state',$conn);  
                   } 
              }
              else
              {
                  $s_n_state = array(
                     'student_id' => $conn['student_id'],
                     'edu_year' => $conn['edu_year']-1,
                     'semester_id' => $conn['semester_id'],
                     );
                     $last_year = $this->check_beforeS_result($s_n_state);
                     if($last_year==1)
                     {
                          $this->temparary_out($conn);
                     }
                     else
                     {
                        $count_nextY = $this->count_next_year($conn['student_id'],$conn['semester_id']); 
                        if($count_nextY==2)
                        {
                           $this->temparary_out($conn);
                        }
                        else
                        {
                            $this->updateS_nextYear($conn);
                        } 
                     }
               // $this->updateS_nextYear($conn);
              }
          }//end else
          
      }
      //this function is for making result for student who has chance 
      public function makingS_result_chance($conn)
      {
          $query=$this->db->get_where('result',$conn);
          $result=$query->result_array();//getting all second chance score of student according to given semester and education year 
          //all below code is for calculating student result in second chance
          $fiel = FALSE;
          $fiel_subject = 0;
          $total_credit = 0;
          $total_score = 0;
          foreach($result as $r):
              if($r['score'] < 55)
              {
                $fiel = TRUE;
                $fiel_subject++;
                $fiel_subject_id = $r['subject_id'];
              }
          endforeach;
          if($fiel==FALSE)
          {
              $conn2 = $conn;    
              $conn2['chance_id'] = 1;
              $q=$this->db->get_where('result',$conn2);
              $result_stu=$q->result_array();
              foreach($result_stu as $rs):
                  if($rs['score'] >= 55)
                  {
                    $total_score += $rs['subject_credit']*$rs['score'];  
                  }
                  else
                  {
                    $where = $conn;
                    $where['chance_id'] = 2;
                    $where['subject_id'] = $rs['subject_id']; 
                    $chance_two_score = $this->student_subject_result('result',$where,'score');
                    if($chance_two_score!=NULL and $chance_two_score >=55)
                    {
                        $total_score += $rs['subject_credit']*$chance_two_score;  
                    }
                    else
                    {
                        $where['chance_id'] = 3;
                        $chance_three_score = $this->student_subject_result('result',$where,'score');
                        if($chance_three_score!=NULL and $chance_three_score >=55)
                        {
                            $total_score += $rs['subject_credit']*$chance_three_score;  
                        }
                        else
                        {
                           $where['chance_id'] = 4;
                           $chance_extra_score = $this->student_subject_result('result',$where,'score');
                           if($chance_extra_score!=NULL)
                           {
                            $total_score += $rs['subject_credit']*$chance_extra_score;  
                           } 
                        }   
                    }
                  }
                  $total_credit += $rs['subject_credit'];
              endforeach;
              if(($total_score/$total_credit)>=60)
              {
                  $data = array(
                  'result_state' => 1
                  );
                  $update = $this->db->update('student_result_state',$data,$conn);
                  $this->updateS_semester($conn);  
              }
              else
              {
                $s_state = array(
                  'student_id'=>$conn['student_id'],
                  'semester_id'=>$conn['semester_id']-1,
                  'result_state' => 6
                );
                $beforeS_state = $this->check_beforeS_result($s_state);
                if($beforeS_state)
                {
                    $s_n_state = array(
                    'student_id' => $conn['student_id'],
                     'edu_year' => $conn['edu_year']-1,
                     'semester_id' => $conn['semester_id'],
                     );
                     $last_year = $this->check_beforeS_result($s_n_state);
                     if($last_year)
                     {
                         $this->temparary_out($conn);
                     }
                     else
                     {
                        $count_nextY = $this->count_next_year($conn['student_id'],$conn['semester_id']); 
                        if($count_nextY==2)
                        {
                           $this->temparary_out($conn);
                        }
                        else
                        {
                            $this->updateS_nextYear($conn);
                        }  
                     }
                  }
                  else
                  {
                    $data = array(
                    'result_state' => 6
                    );
                    $this->db->update('student_result_state',$data,$conn);
                    $this->updateS_semester($conn);  
                  }
              }
          }//end if for fiel equal false..
          else
          {
              if($conn['chance_id']==2 and $fiel_subject<=2)
              {
                  $data = array(
                  'result_state'=> 3,
                  );
                  $this->db->update('student_result_state',$data,$conn);
                  foreach($result as $rs):
                      if($rs['score'] < 55)
                      {
                          $where_i = $conn;
                          $where_i['chance_id'] = 3;
                          $where_i['subject_id'] = $rs['subject_id'];
                          if(!$this->data_exist('result',$where_i))
                          { 
                              $where_i['subject_credit'] = $rs['subject_credit'];
                              $this->db->insert('result',$where_i);
                          }
                      }
                      else
                      {
                          $where_d = $conn;
                          $where_d['chance_id'] = 3;
                          $where_d['subject_id'] = $rs['subject_id'];
                          $this->db->delete('result',$where_d); 
                      }
                  endforeach;
                  $conn['chance_id'] = 3;
                   if(!$this->data_exist('student_result_state',$conn))
                   {
                     $this->db->insert('student_result_state',$conn);  
                   }
              }
              else if($conn['chance_id']==3 and $fiel_subject == 1)
              {
                $this->db->select('subCategory_id');
                $this->db->from('subject');
                $this->db->where('subject_id',$fiel_subject_id);
                $query=$this->db->get();
                $cat_id=$query->row()->subCategory_id;
                if($cat_id == 3 || $cat_id == 4)
                {
                    $data = array(
                    'result_state'=>4
                    );
                    $this->db->update('student_result_state',$data,$conn);
                         $where_in = $conn;
                         $where_in['chance_id'] = 4;
                         $where_in['subject_id'] = $fiel_subject_id;
                         if(!$this->data_exist('result',$where_in))
                         {
                            $this->db->insert('result',$where_in);
                         }
                         $conn['chance_id'] = 4;
                         if(!$this->data_exist('student_result_state',$conn))
                         {
                            $this->db->insert('student_result_state',$conn);   
                         }
                }
                else
                {
                    $this->updateS_nextYear($conn); 
                }
              }
              elseif($conn['chance_id']==4 and $fiel_subject==1)
              {
                $this->updateS_nextYear($conn);
              }
              else
              {
                  $this->updateS_nextYear($conn);
              } 
          }//end else 
      }
      // this function is for get student subject scores
      public function student_subject_result($table,$conn,$field)
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
      //this function is for checking one semester before result state
      public function check_beforeS_result($conn)
      {
         $query = $this->db->get_where('student_result_state',$conn);
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
      //this function is for temperary out of student
      public function temparary_out($conn)
      {
         $data = array(
         'result_state'=>7,
         );
         $this->db->update('student_result_state',$data,$conn);
         $data_x = array(
         'sState_id' => 5
         );
         $this->db->where(array('student_id'=>$conn['student_id']));
         $this->db->update('student',$data_x);
      }
      //this fis for checking number of nexted year a student
      public function count_next_year($student_id='',$semester_id='')
      {
          $this->db->where('student_id',$student_id);
          $this->db->where('semester_id <',$semester_id);
          $this->db->where('result_state',5);
          $this->db->from('student_result_state');
          return $this->db->count_all_results();
      }
      // this is for updating student semester and education year after success
      public function updateS_semester($conn)
      {
          
            $edu_year = $conn['edu_year'];
            if($conn['semester_id']%2==0)
            {
                $edu_year++; 
            }
            $data = array(
            'sState_id' => 1,
            'semester_id' => $conn['semester_id']+1,
            'edu_year' => $edu_year
            );
            $this->db->update('student',$data,array('student_id'=>$conn['student_id']));
            $where = array(
            'student_id' => $conn['student_id'],
            'edu_year' => $conn['edu_year'],
            'semester_id' => $conn['semester_id'],
            'chance_id >' => $conn['chance_id']
            );
            $this->db->delete('result',$where);
            $this->db->delete('student_result_state',$where);
      }
      //this is for update student state whene student become next year
      public function updateS_nextYear($conn)
      {
          $data_result = array(
          'result_state' => 5
          );
          $this->db->update('student_result_state',$data_result,$conn);
          $data = array(
              'edu_year' => $conn['edu_year']+1,
              'semester_id' => $conn['semester_id'],
              'sState_id' => 1
          );
          $this->db->update('student',$data,array('student_id'=>$conn['student_id']));
          $where = array(
            'student_id' => $conn['student_id'],
            'edu_year' => $conn['edu_year'],
            'semester_id' => $conn['semester_id'],
            'chance_id >' => $conn['chance_id']
            );
          $this->db->delete('result',$where);
          $this->db->delete('student_result_state',$where);
      }
      //this function is for student who has result for making result sheet
      public function student_has_result($conn)
      {
        $this->db->select('*'); 
        $this->db->from('student'); 
        $this->db->join('student_result_state','student_result_state.student_id = student.student_id','LEFT');
        $this->db->join('result_state','student_result_state.result_state = result_state.resultState_id','LEFT');
        $this->db->where($conn);
        $query=$this->db->get();
        return $query->result_array();
      }
      // this function is for chance result state
      public function chance_result_state($conn,$returned_field)
      {
         $this->db->select('*'); 
         $this->db->from('student_result_state'); 
        $this->db->join('result_state','student_result_state.result_state = result_state.resultState_id');
        $this->db->where($conn);
        $query=$this->db->get();
        if($query->num_rows>0)
        {
            return $query->row()->$returned_field;
        }
        else
        {
            return NULL;
        } 
      }
       //this fis for checking number of nexted year a student
      public function count_student_result($edu_year='',$semester_id='',$dep_id='',$result)
      {
          $this->db->where('student_result_state.edu_year',$edu_year);
          $this->db->where('student_result_state.semester_id',$semester_id);
          $this->db->where('student_result_state.result_state',$result);
          $this->db->where('student.dep_id',$dep_id);
          $this->db->from('student_result_state');
          $this->db->join('student','student.student_id=student_result_state.student_id');
          return $this->db->count_all_results();
      }
      public function search_result($conn,$limit_row='',$starting=0)
      {
          $this->db->select('student.dari_name,student.dari_fName,student.student_id,student_result_state.edu_year,semester.semester_name,
          department.dep_name,result_state.resultState_name');
          $this->db->from('student_result_state'); 
          $this->db->join('student','student_result_state.student_id = student.student_id');
          $this->db->join('semester','student_result_state.semester_id = semester.semester_id');
          $this->db->join('department','department.dep_id = student.dep_id');
          $this->db->join('result_state','student_result_state.result_state= result_state.resultState_id');
          $this->db->where($conn);
          $this->db->where('student_result_state.result_state !=',2);
          $this->db->where('student_result_state.result_state !=',3);
          $this->db->where('student_result_state.result_state !=',4);
          if($limit_row!='')
          {
            $this->db->limit($limit_row,$starting);
          }  
          $this->db->order_by('student_result_state.edu_year','desc');
          $this->db->order_by('student_result_state.semester_id','desc');
          $this->db->order_by('student.dep_id');
          $this->db->order_by('student_result_state.result_state');
          $query=$this->db->get();
          return $query->result_array();
      }
      public function update_data($table,$data,$conn)
      {
          $this->db->update($table,$data,$conn);
      }
           
  }