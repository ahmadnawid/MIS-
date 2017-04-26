<form class="navbar-form navbar-left" method="post" role="search" id="make_shuqa" action="<?php echo base_url();?>exam/exam_score/mark_entry">
<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم برای آماده کردن نمرات امتحان</div>
        <div class="input-area">
                <div class="box-search">
                    <div class="box">
                        سال تحصیلی
                        <div class="input-append">
                            <select name="edu_year" id="edu_year" data-rel="chosen"  class="dropdown-select search-area">
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                    
                    <div class="box">
                       سمستر
                       <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area" onchange="load_data('make_shuqa','teacher/exam/get_subject/0','dep_subject')">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area" onchange="load_data('make_shuqa','teacher/exam/get_subject/0','dep_subject')">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'];?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        مضمون
                        <div class="input-append">
                            <select name="dep_subject" id="dep_subject" data-rel="chosen" class="dropdown-select search-area">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        چانس
                        <div class="input-append">
                            <select name="chance" id="chance" data-rel="chosen" class="dropdown-select search-area">
                                <?php foreach($chance as $ch):?>
                                <option value="<?php echo $ch['chance_id'];?>"><?php echo $ch['chance_name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('make_shuqa','teacher/exam/entry_exam_shuqa','making_shuqa')">جستچوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="making_shuqa" style="display:none">
    </div>