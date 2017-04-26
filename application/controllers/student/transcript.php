<?php
   /**
 * this class including all function do the process belong to exam 
 * version 2.4
 * author Alijan Ahmadi
 * emailAddress:alijanahmadi15@yahoo.com
 * */
 class Transcript extends CI_Controller{
    public function __construct()
    {
        //construct function for intialization
        parent::__construct();
        $this->load->helper(array('form','url','date'));
        $this->load->library(array('form_validation','paging_transcript'));
        $this->load->model(array('get_public_data','student_model'));
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
    //this function is for default transcript
    public function index()
    {
        header_tph('');
        menu_tph('transcript','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['semester'] = $this->get_public_data->get_all_data('semester');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $where = array();
        $per_page = 1;
        $student = $this->student_model->get_student($where);
        $this->paging_transcript->make_search(count($student),0,$per_page,"|<",">|","<<",">>",base_url()."student/transcript/paging",'paging','make_transcript');
        $data['link'] = $this->paging_transcript->anchors;
        $data['total'] = $this->paging_transcript->total;
        $data['perPage'] = $this->paging_transcript->perPage;
        $student = $this->genered_transcript($where,'',0,$per_page);
        $data['student'] = $student;
        $this->load->view('student/v_make_transcript',$data);
        footer_tph();
    }
    public function search_transcript()
    {
        $where = array();
        if($this->input->post('student_id'))
        {
            $where['student.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('student_name'))
        {
            $where['student.dari_name'] = $this->input->post('student_name');
        }
        if($this->input->post('student_fName'))
        {
            $where['student.dari_fName'] = $this->input->post('student_fName');
        }
        if($this->input->post('student_gFName'))
        {
            $where['student.dari_gFName'] = $this->input->post('student_gFName');
        }
        if($this->input->post('entry_year'))
        {
            $where['student.university_entry_year'] = $this->input->post('entry_year');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        if($this->input->post('student_tazkira'))
        {
            $where['student.tazkira_number'] = $this->input->post('student_tazkira');
        }
        $per_page = 1;
        $student = $this->student_model->get_student($where);
        $this->paging_transcript->make_search(count($student),0,$per_page,"|<",">|","<<",">>",base_url()."student/transcript/paging",'paging','make_transcript');
        $data['link'] = $this->paging_transcript->anchors;
        $data['total'] = $this->paging_transcript->total;
        $data['perPage'] = $this->paging_transcript->perPage;
        $language = $this->input->post('language');
        if($language==2)
        {
            $lang = 'english_';
        }
        else
        {
            $lang = '';
        }
        $student = $this->genered_transcript($where,$lang,0,$per_page);
        if(count($student)==0)
        {
           
           $html = '<div class="alert alert-info" role="alert">هیچ محصل با این مشخصات یافت نشد...</div>';
           echo $html;
        }
        else
        {
            $data['student'] = $student;
            if($language==1)
            {
               $this->load->view('student/v_genered_transcript',$data); 
            }
            else
            {
               $this->load->view('student/v_genered_Etranscript',$data); 
            } 
        }
        
    }
    //this funciton is for generating transcript
    public function genered_transcript($where,$lang='',$start,$limit_rows)
    {
       $student = $this->student_model->get_student($where,$limit_rows,$start);
        for($i=0;$i<count($student);$i++)
        {
            //if($lang!=''){ $prov_name="name_en";}else{ $prov_name="prov_name";}
            $student[$i]['prov_name'] = $this->get_public_data->get_all_data('provinces',array('prov_id'=>$student[$i]['origenal_province']));
            $student[$i]['project'] = $this->get_public_data->get_all_data('student_deploma_project',array('student_id'=>$student[$i]['student_id']));
            if($student[$i]['student_id']=='CEI90059')
            {
                $edu_years[0]['edu_year'] =1390;
                $n = $this->student_model->get_s_eduYear($student[$i]['student_id']);
                for($s=1;$s<=count($n);$s++)
                {
                    $edu_years[$s]['edu_year'] = $n[$s-1]['edu_year']; 
                }
            }
            else
            {
                 $edu_years = $this->student_model->get_s_eduYear($student[$i]['student_id']);
            }
            $student[$i]['edu_year_semesters'] = array();
            $student[$i]['edu_years'] = $edu_years;
            $max = 0;
            foreach($edu_years as $edu):
                if($student[$i]['student_id']=='CEI90059' and $edu['edu_year']==1390)
                {
                  $edu_year_semesters = array('0'=>array('semester_id'=>1,'semester_name'=>'اول'),'1'=>array('semester_id'=>2,'semester_name'=>'دوم'));
                }
                else
                {
                     $edu_year_semesters = $this->student_model->get_eduYear_semester($student[$i]['student_id'],$edu['edu_year']);
                }
                $student[$i]['edu_year_semesters'][$edu['edu_year']] = $edu_year_semesters;
                $index = 1;
                $student[$i][$edu['edu_year']] = array();
                for($c=0;$c<2;$c++)
                {
                    if($c<count($edu_year_semesters))
                    {
                        $student[$i]['edu_year_semesters'][$edu['edu_year']][$index]['semester_id'] = $edu_year_semesters[$c]['semester_id'];
                        $student[$i]['edu_year_semesters'][$edu['edu_year']][$index]['semester_name'] = $edu_year_semesters[$c]['semester_name'];
                        if($student[$i]['student_id']=='CEI90059' and ($edu_year_semesters[$c]['semester_id']==1 || $edu_year_semesters[$c]['semester_id']==2))
                        {
                            $where = array(
                            'student_id' => $student[$i]['student_id'],
                            'semester_id' => $edu_year_semesters[$c]['semester_id'],
                            );
                            $student[$i][$edu['edu_year']][$index] = $this->get_public_data->get_all_data('collage_student_result',$where);
                        }
                        else
                        {
                            $student[$i][$edu['edu_year']][$index] = $this->student_model->get_semester_score($student[$i]['student_id'],$edu['edu_year'],$edu_year_semesters[$c]['semester_id'],1);
                        }
                    }
                    else
                    {
                        $semester_id = $edu_year_semesters[$c-1]['semester_id']+1;
                        $student[$i]['edu_year_semesters'][$edu['edu_year']][$index]['semester_id'] = $semester_id;
                        $student[$i]['edu_year_semesters'][$edu['edu_year']][$index]['semester_name'] = $this->student_model->get_field_name('semester',array('semester_id'=>$semester_id),'semester_name');
                        $student[$i][$edu['edu_year']][$index] = array();  
                    }
                    if(count($student[$i][$edu['edu_year']][$index])>$max)
                    {
                        $max = count($student[$i][$edu['edu_year']][$index]);
                    }
                    $index++;
                }
            endforeach;
            foreach($edu_years as $edu):
                for($c=1;$c<=2;$c++)
                {
                    $var = $student[$i][$edu['edu_year']][$c];
                    $total_credit = 0;
                    $total_score = 0;
                    $j=0;
                    while($j<$max)
                    {
                        if($j<=(count($var)-1))
                        {
                            $student[$i][$edu['edu_year']][$c][$j]['sub_dari_name'] = $var[$j]['sub_dari_name'];
                            $student[$i][$edu['edu_year']][$c][$j]['sub_english_name'] = $var[$j]['sub_english_name'];
                            $student[$i][$edu['edu_year']][$c][$j]['subject_credit'] = $var[$j]['subject_credit'];
                            $student[$i][$edu['edu_year']][$c][$j]['score'] = $var[$j]['score'];
                            $total_credit += $var[$j]['subject_credit'];
                            if($var[$j]['score']<55)
                            {
                               $where = array(
                                'student_id' => $student[$i]['student_id'],
                                'edu_year' => $edu['edu_year'],
                                'semester_id' => $student[$i]['edu_year_semesters'][$edu['edu_year']][$c]['semester_id'],
                                'subject_id' => $student[$i][$edu['edu_year']][$c][$j]['subject_id'],
                                'chance_id' => 2
                                );
                               $score_ch2 = $this->student_model->get_field_name('result',$where,'score');
                               $student[$i][$edu['edu_year']][$c][$j]['score_chance_two'] = $score_ch2;
                               if($score_ch2<55)
                               {
                                   $where['chance_id'] = 3;
                                   $score_ch3 =  $this->student_model->get_field_name('result',$where,'score');
                                   $student[$i][$edu['edu_year']][$c][$j]['score_chance_three'] = $score_ch3;
                                   if($score_ch3!=NULL)
                                   {
                                      $total_score += $var[$j]['subject_credit']*$score_ch3;  
                                   }
                               }
                               else
                               {
                                   $student[$i][$edu['edu_year']][$c][$j]['score_chance_three'] = '';
                                   if($score_ch2!=NULL)
                                   {
                                      $total_score += $var[$j]['subject_credit']*$score_ch2; 
                                   } 
                               }
                            }
                            else
                            {
                               $student[$i][$edu['edu_year']][$c][$j]['score_chance_two'] = '';
                               $student[$i][$edu['edu_year']][$c][$j]['score_chance_three'] = '';
                               $total_score += $var[$j]['subject_credit']*$var[$j]['score'];  
                            }
                        }
                        else
                        {
                            $student[$i][$edu['edu_year']][$c][$j]['sub_dari_name'] = '';
                            $student[$i][$edu['edu_year']][$c][$j]['sub_english_name'] = '';
                            $student[$i][$edu['edu_year']][$c][$j]['subject_credit'] = '';
                            $student[$i][$edu['edu_year']][$c][$j]['score'] = '';
                            $student[$i][$edu['edu_year']][$c][$j]['score_chance_two'] = '';
                            $student[$i][$edu['edu_year']][$c][$j]['score_chance_three'] = '';
                        }
                        $j++;
                    }
                    $k=$max;
                    $student[$i][$edu['edu_year']][$c][$k]['total_credit'] = $total_credit;
                    $k++;
                    $student[$i][$edu['edu_year']][$c][$k]['total_score'] = $total_score;
                    $k++;
                    if($total_credit!=0)
                    {
                      $student[$i][$edu['edu_year']][$c][$k]['average'] = $total_score/$total_credit;  
                    }
                    else
                    {
                        $student[$i][$edu['edu_year']][$c][$k]['average'] = '';
                    }
                    $k++;
                    $student[$i][$edu['edu_year']][$c][$k]['result'] = $this->student_model->get_s_sResult($student[$i]['student_id'],$edu['edu_year'],$student[$i]['edu_year_semesters'][$edu['edu_year']][$c]['semester_id'],$lang);
                }
            endforeach;
            $student[$i]['max_semester_sub'] = $max;
        }
        return $student; 
    }
    public function paging()
    { 
        if($this->input->post('form_id') and $this->input->post('per_page'))
        {
        $start = $this->input->post('starting');
        $form_id = $this->input->post('form_id');
        $per_page = $this->input->post('per_page');
        $where = array();
        if($this->input->post('student_id'))
        {
            $where['student.student_id'] = $this->input->post('student_id');
        }
        if($this->input->post('student_name'))
        {
            $where['student.dari_name'] = $this->input->post('student_name');
        }
        if($this->input->post('student_fName'))
        {
            $where['student.dari_fName'] = $this->input->post('student_fName');
        }
        if($this->input->post('student_gFName'))
        {
            $where['student.dari_gFName'] = $this->input->post('student_gFName');
        }
        if($this->input->post('entry_year'))
        {
            $where['student.university_entry_year'] = $this->input->post('entry_year');
        }
        if($this->input->post('dep'))
        {
            $where['student.dep_id'] = $this->input->post('dep');
        }
        if($this->input->post('student_tazkira'))
        {
            $where['student.tazkira_number'] = $this->input->post('student_tazkira');
        }
        $student = $this->student_model->get_student($where);
        $this->paging_transcript->make_search(count($student),$start,$per_page,"|<",">|","<<",">>",base_url()."student/transcript/paging",'paging',$form_id);
        $data['link'] = $this->paging_transcript->anchors;
        $data['total'] = $this->paging_transcript->total;
        $data['perPage'] = $this->paging_transcript->perPage;
        $student = $this->genered_transcript($where,'',$start,$per_page);
        $data['student'] = $student;
        $language = $this->input->post('language');
        if($language==2)
        {
            $this->load->view('student/v_paging_transcriptE',$data);
        }
        else
        {
            $this->load->view('student/v_paging_transcript',$data);
        }
        }
    }
    //this function is for graduated table 
    public function graduated_table()
    {
        header_tph('');
        menu_tph('graduated_table','student');
        $data['department'] = $this->get_public_data->get_all_data('department');
        $data['year'] = $this->get_public_data->get_all_data('year','','year','desc');
        $where = array();
        $data['student'] = $this->student_model->select_graduated_student($where);
        $this->load->view('student/v_make_graduatedTable',$data);
        footer_tph();
    }
 }