<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم برای آماده کردن شقه امتحان</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="result_sheet">
                <div class="box-search">
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area" onchange="load_data('make_shuqa','exam/exam_score/get_semester_subject','dep_subject')">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'];?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>                    
                    <div class="box">
                       سمستر
                       <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area" onchange="load_data('make_shuqa','exam/exam_score/get_semester_subject','dep_subject')">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
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
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('result_sheet','exam/exam_model/make_result_sheet','make-student-result')">اماده کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="make-student-result" style="display:none">
      <!-- Default panel contents -->
    </div>
    </div>