<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم جستجوی شقه امتحان</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="make_shuqa">
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
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area" onchange="load_dropdown_data('make_shuqa','exam/exam_score/get_subject','dep_subject')">
                                <option value="" selected="selected">همه</option>
                                <!--option value="o">سمسترهای تاق</option>
                                <option value="e">سمسترهای جفت</option-->
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area" onchange="load_dropdown_data('make_shuqa','exam/exam_score/get_subject','dep_subject')">
                                <option value="" selected="selected">همه</option>
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
                                <option value="">همه</option>
                                <?php foreach($subject as $sub):?>
                                <option value="<?php echo $sub['subject_id'];?>"><?php echo $sub['sub_dari_name'];if($sub['sub_expresion']!=''){echo '('.$sub['sub_expresion'].')';}?></option>
                                <?php endforeach;?>
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
                    <button type="button" class="btn-add" onclick="load_data('make_shuqa','exam/exam_score/make_exam_shuqa','making_shuqa')">جستجو کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="making_shuqa" style="display:none;">
    </div>