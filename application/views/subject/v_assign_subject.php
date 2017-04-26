<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">واگذار کردن مضامین هر صنف به استادان مربوطه</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="assign_subject" action="<?php echo base_url();?>subject/home/do_assigning_subject" >
                <div class="box-adding" style="width:50%">
                    <div class="test">
                        <select name="edu_year" id="edu_year" data-rel="chosen"  class="dropdown-select input-label">
                            <?php foreach($edu_year as $edu):?>
                            <option value="<?php echo $edu['year'];?>"><?php echo $edu['year'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">سال تحصیلی</label>
                    </div>
                    <div class="test">
                        <select name="semester" id="semester" data-rel="chosen"  class="dropdown-select input-label" onchange="load_data('assign_subject','exam/exam_score/get_semester_subject','subject_to_a')">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($semester as $sem):?>
                            <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">سمستر <em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select input-label" onchange="load_data('assign_subject','exam/exam_score/get_semester_subject','subject_to_a')">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($department as $dep):?>
                            <option value="<?php echo $dep['dep_id'];?>"><?php echo $dep['dep_name'].'('.$dep['dep_expression'].')';?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">دیپارتمنت<em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="subject_to_a" id="subject_to_a" data-rel="chosen"  class="dropdown-select input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                        </select>
                        <label class="lable">مضمون که تدریس میشود<em> *</em></label>
                    </div>
                    <div class="test">
                    <label style="float:right"><label class="lable">تدریس کننده</label></label>
                    <label style="float: left;margin-left:100px;">
                         <span style="float: right;">
                            <input type="radio" name="faculty_teacher" checked="checked" id="teacher" onclick="checkbox($(this),'other_teacher','teacher_dropdown','other_dropdown')" value="1" style="width:40px;margin-top:5px !important;float:left;">
                        <label class="lable">استاد پوهنحی</label></span>
                         <span style="float: left;">
                            <input type="radio" name="other_teacher" id="other_teacher" onclick="checkbox($(this),'teacher','other_dropdown','teacher_dropdown')" value="0" class="input-label" style="width: 40px;margin-top:5px !important">
                        <label class="lable">استاد دیگر پوهنحی</label></span>
                        
                    </label>
                    </div>
                    <div class="test" id="teacher_dropdown">
                        <select name="teacher" data-rel="chosen"  class="dropdown-select input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($teacher as $t):?>
                            <option value="<?php echo $t['s_id'];?>"><?php echo 'استاد'.' '.$t['dari_name'].' '.$t['dari_lName'].'('.$t['dep_expression'].')';?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">استاد</label>
                    </div>
                    <div class="test" id="other_dropdown" style="display: none;">
                        <select name="teacher" data-rel="chosen"  class="dropdown-select input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($other as $o):?>
                            <option value="<?php echo $o['s_id'];?>"><?php echo 'استاد'.' '.$o['dari_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">استاد</label>
                    </div>
                <br>
                    <span class="required-feild"><em> *</em>فیلدهای ضروری</span>                    
                <div class="search-button">
                    <button type="submit" class="btn-add">واگذارکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="making_shuqa" style="display:none">
    </div>