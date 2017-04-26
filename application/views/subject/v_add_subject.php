<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">اضافه کردن مضمون جدید</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="add_subject" action="<?php echo base_url();?>subject/home/do_adding_subject" >
                <div class="box-adding">
                    <div class="test">
                        <select name="semester" id="semester" data-rel="chosen"  class="dropdown-select input-label" onchange="load_subject_pishniz($(this),'subject/home/subject_pishniaz','sub_pre')">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($semester as $sem):?>
                            <option value="<?php echo $sem['semester_id'];?>"><?php echo $sem['semester_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">سمستر <em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="subject_category" id="subject_category" data-rel="chosen"  class="dropdown-select input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($subject_cat as $cat):?>
                            <option value="<?php echo $cat['subCategory_id'];?>"><?php echo $cat['subCategory_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">کتگوری مضمون <em> *</em></label>
                    </div>
                    <div class="test"><input type="text" name="sub_english_name" class="input-label"/><label class="lable"> نام مضمون به انگلیسی<em> *</em></label></div>
                    <div class="test"><input type="text" name="sub_dari_name" class="input-label"/><label class="lable"> نام مضمون به دری<em> *</em></label></div>
                    <div class="test"><input type="text" name="sub_exp" class="input-label"/><label class="lable">مخفف مضمون </label></div>
                    <div class="test">
                        <select name="sub_credit" id="sub_credit" data-rel="chosen"  class="dropdown-select input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <label class="lable">تعداد کریدیت <em> *</em></label>
                     </div>
                     <div class="test">
                        <select name="lecture_time" id="lecture_time" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <label class="lable">تعداد ساعات نظری</label>
                    </div>
                    <div class="test">
                        <select name="practice_time" id="practice_time" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                             <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <label class="lable">تعداد ساعات عملی</label>
                    </div>
                    <div class="test">
                        <select name="stazh_time" id="stazh_time" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                             <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        <label class="lable">تعداد ساعات ستاژ</label>
                    </div>
                </div> 
                <div class="box-adding">
                    <div class="test"><input type="text" name="sub_code" class="input-label"/><label class="lable">کود مضمون<em> *</em></label></div>
                    <div class="test">
                        <select name="dep_lecturer" id="dep_lecturer" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($department as $dp):?>
                            <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">دبپارتمنت تدریس کننده <em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="department_study[]" multiple="multiple" id="dep_study"  size="3" class="input-label">
                           <?php foreach($department as $dp):?>
                            <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">دبپارتمنت تدریس شونده <em> *</em></label>
                    </div>
                    <div class="test"></div>
                    <div class="test"><textarea cols="" rows="3" class="input-label" name="memo"></textarea><label class="lable">شرح مختصر مضمون</label></div>
                    <div class="test"></div>
                    <div class="test">
                        <select name="sub_pre" id="sub_pre"  class="input-label">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                        </select>
                        <label class="lable">مضمون پیش شرط</label>
                    </div>
                    <div class="test"></div>
                    <div class="test"></div>
                </div>
                <br>
                    <span class="required-feild"><em> *</em>فیلدهای ضروری</span>                    
                <div class="search-button">
                    <button type="submit" class="btn-add">اضافه کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->