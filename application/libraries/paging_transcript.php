<?php

/**
*@desc: ajax pagenation for codeigniter
* @author: Alijan Ahmadi
* @version  2.4
* @date: 3/january/2015
*/

  class Paging_transcript
  {
    public $total;
    public $anchors;
    public $perPage;
    function __construct()
    {
      ///constructior
    }
    function __destruct()
    {
      ////destructior
    }
    function make_search($numrows,$starting=0,$per_page=10,$first_lb,$last_lb,$previous_lb,$next_lb,$page_process,$div_loading,$form_id='')
    {
        $first = 0;
        $total_page = ceil($numrows/$per_page);
        $current_page = intval($starting/$per_page)+1;
        $previous = intval($current_page-2)*$per_page;
        $last = intval($total_page-1)*$per_page;
        $next = $current_page*$per_page;
        $noreapet = 4;
        $current_right = $current_page-$noreapet;  //it is for number of link numbers show in the right side of current page.
        $current_left = $current_page+$noreapet;   //it  is for number of link numbers show in the left side of current page.
        $anc='<ul id="pagination-flickr">';
        if($current_page == 1)
        {
            $anc .= '<li class="previous-off btn btn-small">'.$first_lb.'</li>';
            $anc .= '<li class="previous-off btn btn-small">'.$previous_lb.'</li>';
        }
        else       
        {
            $anc .= '<li class="btn btn-small btn-primary"><a href="javascript:void(0)" onclick="load_page_pagination(\''.
            $page_process.'\',\''.$div_loading.'\',\''.$first.'\',\''.$form_id.'\')">'.$first_lb.'</a></li>';
            $anc .= '<li class="btn btn-small btn-primary"><a href="javascript:void(0)" onclick="load_page_pagination(\''.
            $page_process.'\',\''.$div_loading.'\',\''.$previous.'\',\''.$form_id.'\')">'.$previous_lb.'</a></li>';
        }
        for($i=$total_page;$i>=1;$i--)
        {
            if($i>$current_left || $i<$current_right) 
            continue;
            if($i==$current_page)
            {
              $anc .= '<li class="active btn btn-small btn-primary">'.$i.'</li>';  
            }
            else
            {
              $anc .= '<li><a href="javascript:void(0)" onclick="load_page_pagination(\''.$page_process.'\',\''.$div_loading.'\',\''.intval($i-1)*$per_page.'\',\''.$form_id.'\')">'.$i.'</a></li>';  
            }  
        }
        if($current_page == $total_page)
        {
            $anc .= '<li class="previous-off btn btn-small">'.$next_lb.'</li>';
            $anc .= '<li class="previous-off btn btn-small">'.$last_lb.'</li>'; 
        }
        else
        {
            $anc .='<li class="next btn btn-small btn-primary"><a href="javascript:void(0)" onclick="load_page_pagination(\''.$page_process.'\',\''.$div_loading.'\',\''.$next.'\',\''.$form_id.'\')">'.$next_lb.'</a></li>';
            $anc .='<li class="next btn btn-small btn-primary"><a href="javascript:void(0)" onclick="load_page_pagination(\''.$page_process.'\',\''.$div_loading.'\',\''.$last.'\',\''.$form_id.'\')">'.$last_lb.'</a></li></ul>';
        }
        $this->anchors = $anc;
        $this->total = "صفحه : $current_page از $total_page مجموعه: $numrows" ;
        $this->perPage = '<select name="per_page" id="per_page" style="width:60px;margin-top:10px" onchange="load_page_pagination(\''.$page_process.'\',\''.$div_loading.'\',\'0\',\''.$form_id.'\')">
                                    <option value="1"';
                                    if($per_page==1){ $this->perPage .='selected="selected"';}
                                    $this->perPage .='>1</option><option value="2"';
                                    if($per_page==2){ $this->perPage .='selected="selected"';}
                                    $this->perPage .='>2</option><option value="5"';
                                    if($per_page==5){ $this->perPage .='selected="selected"'; }
                                    $this->perPage .='>5</option><option value="'.$numrows.'"';
                                    if($per_page==$numrows){ $this->perPage .='selected="selected"';}
                                    $this->perPage .='>All</option></select>';
                                     
    }
  }
?>
