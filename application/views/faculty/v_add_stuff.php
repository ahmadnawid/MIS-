<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">اضافه کردن کارمند جدید</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="add_stuff" action="<?php echo base_url();?>faculty/stuff/do_register" >
                <div class="box-adding">
                    <div class="test" style="margin-bottom: 0px"><label class="lable" style="font-size:18px;">معلومات شخصی </label></div>
                    <div class="test" style="margin-top:0px;margin-bottom:0px;"><label class="lable" style="float:left;width:68%"><span style="float:left;margin-left:22%;font-size:12px">دری</span><span style="float: right;margin-right:17%;font-size:12px">انگلیسی</span></label></div>
                    <div class="test" style="margin-top:0px;">
                        <input type="text" name="stuff_dari_name" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="stuff_english_name" class="input-label" style="width: 30%;"/>
                        <label class="lable">نام <em> *</em></label>
                    </div>
                    <div class="test">
                        <input type="text" name="stuff_dari_fName" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="stuff_english_fName" class="input-label" style="width: 30%;"/>
                        <label class="lable">نام پدر <em> *</em></label>
                    </div>
                    <div class="test">
                        <input type="text" name="stuff_dari_lName" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="stuff_english_lName" class="input-label" style="width: 30%;"/>
                        <label class="lable">تخلص</label>
                    </div>
                    <div class="test"><input type="text" name="email" class="input-label"/><label class="lable">آدرس ایمیل</label></div>
                    <div class="test"><input type="text" name="phone_number" class="input-label"/><label class="lable">شماره تیلفون</label></div>
                    <div class="test">
                        <input type="text" name="dari_nationality" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="english_nationality" class="input-label" style="width: 30%;"/>
                        <label class="lable">ملیت</label>
                    </div>
                    <div class="test">
                        <input type="text" name="dari_placeOfBirth" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="english_placeOfBirth" class="input-label" style="width: 30%;"/>
                        <label class="lable">محل تولد</label>
                    </div>
                    <div class="test" style="margin-bottom: 0px;margin-top: 20px"><label class="lable" style="font-size:20px;">تحصیلات</label></div>
                    <div class="test">
                        <select name="edu_degree" id="edu_degree" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                             <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($edu_degree as $k):?>
                            <option value="<?php echo $k['edu_degree_id'];?>"><?php echo $k['edu_degree_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">درجه تحصیلی <em> *</em></label>
                    </div>
                    <div class="test" style="margin-bottom: 0px;margin-top:0px"><label class="lable" style="font-size:15px;color:#f28c38">مکتب</label></div>
                     <div class="test" style="margin-top:0px;">
                        <input type="text" name="dari_school" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="english_school" class="input-label" style="width: 30%;"/>
                        <label class="lable">نام <em> *</em></label>
                    </div>
                    <div class="test">
                        <input type="text" name="school_entry_year" class="input-label"/>
                        <label class="lable">سال شمول</label>
                    </div>
                     <div class="test">
                        <input type="text" name="dari_school_location" class="input-label small-name" style="width: 30%;margin-right: 10px !important"/>
                        <input type="text" name="english_school_location" class="input-label" style="width: 30%;"/>
                        <label class="lable">موقعیت<em> *</em></label>
                    </div>
                    <div class="test">
                        <input type="text" name="school_graduated_year" class="input-label"/>
                        <label class="lable">سال فراغت</label>
                    </div>
                    <div class="test"><label class="lable" style="font-size:20px;">اشغال وظیفه</label></div>
                     <div class="test">
                        <input type="text" name="job_entry_year" class="input-label"/>
                        <label class="lable">تاریخ اشغال وظیفه</label>
                    </div>
                     <div class="test">
                        <select name="department" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                             <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($department as $dep):?>
                            <option value="<?php echo $dep['dep_id'];?>"><?php echo $dep['dep_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">دیپارتمنت <em> *</em></label>
                    </div>
                     <div class="test">
                        <select name="knowllage_degree" id="knowllage_degree" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                             <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($knowllage_degree as $kd):?>
                            <option value="<?php echo $kd['knowllage_degree_id'];?>"><?php echo $kd['knowllage_degree_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">رتبه علمی</label>
                    </div>
                </div> 
                <div class="box-adding">
                    <div class="test"></div>
                    <div class="test"><input type="text" name="tazkira_number" class="input-label"/><label class="lable">نمبرعمومی تذکره<em> *</em></label></div>
                    <div class="test" style="margin-top:0px;margin-bottom:0px;">
                        <label class="lable" style="float:left;width:68%">
                            <span style="float:left;margin-left:8%">شماره ثبت</span>
                            <span style="float:left;margin-left:16%">صفحه</span>
                            <span style="float: right;margin-right:15%">جلد</span>
                        </label>
                    </div>
                    <div class="test" style="margin-top:0px;">
                        <input type="text" name="tazkira_jeld" class="input-label small-name" style="width:15%;margin-right: 10px !important"/>
                        <input type="text" name="tazkira_page" class="input-label" style="width: 15%;margin-right: 10px !important"/>
                        <input type="text" name="tazkira_register_number" class="input-label" style="width: 25%;"/>
                        <label class="lable">مشخصات تذکره<em> *</em></label>
                    </div>
                    <div class="test"><input type="text" name="date_ofBirth" class="input-label"/><label class="lable">تاریخ تولد</label></div>
                    <div class="test">
                        <select name="gender" id="gender" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                            <option value="0" selected="selected">انتخاب نمایید</option>
                            <?php foreach($gender as $g):?>
                            <option value="<?php echo $g['gender_id'];?>"><?php echo $g['gender_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">جنسیت <em> *</em></label>
                    </div>
                    <div class="test"></div>
                    <div class="test"></div>
                    <div class="test"></div>
                    <div class="test"></div>
                     <div class="test"><label class="lable" style="font-size:15px;color:#f28c38">دوره لیسانس</label></div>
                     <div class="test" style="margin-top:0px;">
                        <input type="text" name="bU_dari_name" class="input-label small-name" style="width: 30%;margin-right: 10px !important" placeholder="دری"/>
                        <input type="text" name="bU_english_name" class="input-label" style="width: 30%;" placeholder="English"/>
                        <label class="lable">نام پوهنتون<em> *</em></label>
                    </div>
                    <div class="test" style="margin-top:0px;">
                        <input type="text" name="bfield_dari_name" class="input-label small-name" style="width: 30%;margin-right: 10px !important" placeholder="دری"/>
                        <input type="text" name="bfield_english_name" class="input-label" style="width: 30%;" placeholder="English"/>
                        <label class="lable">رشته تحصیلی<em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="b_entry_year" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                            <?php foreach($year as $y):?>
                            <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">سال شمول</label>
                    </div>
                    <div class="test">
                        <input type="text" name="bC_dari_name" class="input-label small-name" style="width: 30%;margin-right: 10px !important" placeholder="دری"/>
                        <input type="text" name="bC_english_name" class="input-label" style="width: 30%;" placeholder="English"/>
                        <label class="lable">محل تحصیل<em> *</em></label>
                    </div>
                    <div class="test">
                        <select name="b_graduated_year" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                            <?php foreach($year as $y):?>
                            <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">سال فراغت</label>
                    </div>
                    <div class="test"></div>
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
    <div class="panel panel-default" id="making_shuqa" style="display:none">
    </div>