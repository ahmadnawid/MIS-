<?php
class Get_public_data extends CI_Model
{
    function __Construct()
      {
          parent::__construct();
          $this->load->database();
      }
      public function get_id($table="",$where="",$id="")
      {
          $this->db->select('*');
          $this->db->from($table);
          $this->db->where($where);
          $query=$this->db->get();
          if($query->num_rows>0)
          {
            $row=$query->row();
            if($id!='')
            {
             return $row->$id;  
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
      }//*****************************
      public function get_all_data($table='',$conn='',$sort_feild='',$sort_state='')
      {
          $this->db->select('*');
          $this->db->from($table);
          if($conn!='')
          {
              $this->db->where($conn);
          }
          if($sort_feild!='' && $sort_state!='')
          {
              $this->db->order_by($sort_feild,$sort_state);
          }
         
          return $this->db->get()->result_array();
      }  //**********************
      public function tow_table_data($tables='',$data='',$on='',$condition='')
      {
          $this->db->select($data);
          $this->db->from($tables['first']);
          $this->db->join($tables['second'],$on);
          if($condition!='')
          {
              $this->db->where($condition);
          }
          $query=$this->db->get();
          return $query->result_array();
      }//*************************************
      public function three_table_data($tables='',$data='',$on1='',$on2,$condition='')
      {
          $this->db->select($data);
          $this->db->from($table['first']);
          $this->db->where($condition);
          $this->db->join($table['second'],$on1,'LEFT');
          $this->db->join($table['thirth'],$on2,'LEFT');
          $query=$this->db->get();
          return $query->result_array();
      }
       //this function will return the number of a specified column from one table
      public function count_all($table,$condition)
      {
          $this->db->from($table);
          $this->db->where($condition);
          return $this->db->count_all_results();
      }//******************************
      public function max_value($table,$where='',$field)
      {
          $this->db->select_max($field);
          if($where!='')
          {
             $this->db->where($where); 
          }
          $query = $this->db->get($table);
          if($query->num_rows>0)
          {
              return $query->row()->$field;
          }
          else
          {
              return 0;
          }
      }
}