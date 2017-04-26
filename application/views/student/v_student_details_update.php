   <ul class="nav nav-tabs" style="width:100%;margin:0px" id="tabContent">
        <li class="active"><a href="#set1" style="margin-right:10px">معلومات شخصی</a></li>
        <li><a href="#set2">سکونت</a></li>
        <li><a href="#set3">مکتب</a></li>
        <li><a href="#set4">اقارب</a></li>
        <li><a href="#set5">معلومات پوهنتون</a></li>
        <li><a href="#set6">یادداشت ها</a></li>
    </ul>
    <div class="tab-content" style="width:100%;">
        <div class="tab-pane fade active in" id="set1">
            <div class="tabbable sub">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sub11" style="margin-right: 10px;">دری</a>
                    </li>
                    <li><a href="#sub12">انگلیسی</a>
                    </li>
                    <li><a href="#sub13">اپلود فایل</a>
                    </li>
                </ul>
                <div class="tab-content" style="width:100%">
                    <div class="tab-pane fade active in" id="sub11">
                    <!--personal information in dari-->
                    <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi');
                   echo form_open('student/home/edit_student_info/fa_data',$attributes);?>
                    <div class="input-area info">                                 
                        <div class="box-search">
                            <div class="box">
                                آدی
                                <div class="input-append">
                                    <input type="text" name="student_id" value="<?php echo $student_data[0]['student_id'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نام<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_name" class="personal_info" value="<?php echo $student_data[0]['dari_name'];?>" disabled="disabled"/>
                                    <!--span style="font-size: 10px;position: relative;top:20px">پرکردن این فیلد ضروری است...</span!-->
                                </div>
                            </div>
                            <div class="box">
                                تخلص
                                <div class="input-append">
                                    <input type="text" name="student_lName" class="personal_info" value="<?php echo $student_data[0]['dari_lName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نام پدر <em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_fName" class="personal_info" value="<?php echo $student_data[0]['dari_fName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نام پدرکلان<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_gFName" class="personal_info" value="<?php echo $student_data[0]['dari_gFName'];?>" disabled="disabled"/>
                                </div>
                            </div>  
                            <div class="box">
                                شماره تلفون
                                <div class="input-append">
                                    <input type="text" name="student_phone" class="personal_info" value="<?php if($student_data[0]['phone_number']!=0) echo '0'.$student_data[0]['phone_number'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                آدرس ایمیل
                                <div class="input-append">
                                    <input type="text" name="student_email" class="personal_info" value="<?php echo $student_data[0]['email'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نمبر تذکره <em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_tazkira" class="personal_info" value="<?php echo $student_data[0]['tazkira_number'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                جلد تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tSheet" class="personal_info" value="<?php echo $student_data[0]['sheath'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                صفحه تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tPage" class="personal_info" value="<?php echo $student_data[0]['page'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                شماره ثبت تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tRNumber" class="personal_info" value="<?php echo $student_data[0]['register_number'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                تاریخ تولد
                                <div class="input-append">
                                    <input type="text" name="student_dateOfBirth" class="personal_info" value="<?php echo $student_data[0]['dateOfBirth'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                ملیت
                                <div class="input-append">
                                    <input type="text" name="student_nationality" class="personal_info" value="<?php echo $student_data[0]['nationality'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                زبان مادری
                                <div class="input-append">
                                    <input type="text" name="student_motherTong" class="personal_info" value="<?php echo $student_data[0]['mother_tong'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                جنسیت
                                <div class="input-append">
                                    <select name="student_gender" id="student_gender" disabled="disabled" data-rel="chosen"  class="dropdown-select search-area search-input personal_info">
                                        <?php foreach($gender as $g):
                                        if($student_data[0]['gender_id']==0 and $g['gender_id']==0){?>
                                        <option value="0" selected="selected">انتخاب نمایید</option>
                                        <?php  }elseif($g['gender_id']==0){}else{?>
                                        <option value="<?php echo $g['gender_id'];?>" <?php if($g['gender_id']==$student_data[0]['gender_id']){?> selected="selected" <?php }?>><?php if($g['gender_name']!=''){ echo $g['gender_name'];}else{ echo 'انتخاب نمایید';};?></option> 
                                        <?php } endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="box">
                                حالت مدنی
                                <div class="input-append">
                                    <select name="student_marital_statuse" disabled="disabled" data-rel="chosen"  class="dropdown-select search-area search-input personal_info">
                                        <?php foreach($state as $s):
                                        if($student_data[0]['state_id']==0 and $s['state_id']==0){?>
                                        <option value="0" selected="selected">انتخاب نمایید</option>
                                        <?php  }elseif($s['state_id']==0){}else{?>
                                        <option value="<?php echo $s['state_id'];?>" <?php if($s['state_id']==$student_data[0]['state_id']){?> selected="selected" <?php }?>><?php if($s['state_name']!=''){ echo $s['state_name'];}else{ echo 'انتخاب نمایید';};?></option> 
                                        <?php } endforeach;?> 
                                    </select>
                                </div>
                            </div>     
                        </div> 
                         <br>
                         <span class="required-feild"><em> *</em>فیلدهای ضروری</span>              
                        </div><!--end input area-->
                                <input type="hidden" name="identity_id" value="<?php echo $student_data[0]['student_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_info','student_p_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_p_i" type="button" class="btn-add" onclick="update_modal_data('spi','student/home/edit_student_info/fa_data','tab_content')">ذخیره کردن</button>
                        </form>
                        <!--end-->
                   </div>
                   <!--english part-->
                   <div class="tab-pane fade" id="sub12">
                    <!--personal information in english-->
                    <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi_en');
                   echo form_open('student/home/edit_student_info/en_data',$attributes);?>
                    <div class="input-area info">
                        <div class="box-search">
                            <div class="box">
                                Name<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_e_name" class="personal_en_info" value="<?php echo $student_data[0]['english_name'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                Last Name
                                <div class="input-append">
                                    <input type="text" name="student_e_lName" class="personal_en_info" value="<?php echo $student_data[0]['english_lName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                F/Name<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_e_fName" class="personal_en_info" value="<?php echo $student_data[0]['english_fName'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                G/F/Name<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_e_gFName" class="personal_en_info" value="<?php echo $student_data[0]['english_gFName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                Nationality
                                <div class="input-append">
                                    <input type="text" name="student_e_nationality" class="personal_en_info" value="<?php echo $student_data[0]['english_nationality'];?>" disabled="disabled"/>
                                </div>
                            </div>   
                        </div>               
                        </div><!--end input area-->
                                <input type="hidden" name="identity_id" value="<?php echo $student_data[0]['student_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_en_info','student_ENp_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_ENp_i" type="button" class="btn-add" onclick="update_modal_data('spi_en','student/home/edit_student_info/en_data','tab_content')">ذخیره کردن</button>
                        </form>
                   </div>
                   <div class="tab-pane fade" id="sub13">
                   <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 's_photo');
                   echo form_open('student/home/edit_student_info/photo_data',$attributes);?>
                    <div class="input-area info">
                        <div class="box-search">
                            <div class="box">
                                عکس
                                <div class="input-append">
                                    <div style="position:relative;">
                                    <a class='btn btn-primary' href='javascript:;'>
                                    انتخاب نمایید...
                                    <input type="file" class="upload_file s_photo" name="student_photo" disabled="disabled" style='position:absolute;z-index:2;top:0;left:0;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                    </a>
                                    &nbsp;
                                    <span class='label label-info' id="upload-file-info"></span>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <button style="float:left"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                    <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'s_photo','student_p')">تصحیح کردن</button>
                    <button style="float:left;display:none;" id="student_p" type="button" class="btn-add" onclick="update_modal_data('s_photo','student/home/edit_student_info/photo_data','tab_content')">ذخیره کردن</button> 
                   </form>
                   </div>
                   <!-- end -->
                </div>
                
            </div>
             <!--english part-->
        </div>
       <div class="tab-pane fade" id="set2">
        <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'student_location');
                   echo form_open('student/home/edit_student_info/location_data',$attributes);?>
            <div class="tabbable sub">
            <!-- student location information-->
                <div class="input-area info">
                <div class="box-adding">
                    <div class="test" style="margin-bottom: 0px"><label class="lable" style="font-size:18px;">سکونت اصلی</label></div>
                    <div class="test">
                        <select name="province_asli" id="province_asli" onchange="load_district('province_asli','district_asli')" disabled="disabled" data-rel="chosen"  class="dropdown-select input-label sl" style="width:220px;">
                            <?php foreach($province as $p):?>
                             <option value="<?php echo $p['prov_id'];?>" <?php if($student_data[0]['origenal_province']==$p['prov_id']){?>selected="selected"<?php }?>><?php echo $p['prov_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">ولایت </label>
                    </div>
                    <div class="test">
                        <select name="district_asli" disabled="disabled" id="district_asli" data-rel="chosen"  class="dropdown-select input-label sl" style="width:220px;">
                            <?php foreach($o_district as $od):?>
                             <option value="<?php echo $od['district_id'];?>" <?php if($student_data[0]['origenal_district']==$od['district_id']){?>selected="selected"<?php }?>><?php echo $od['district_name'];?></option>
                            <?php endforeach;?>
                        </select>
                        <label class="lable">ولسوالی</label>
                    </div>
                    <div class="test"><input type="text" name="village_asli" value="<?php echo $student_data[0]['origenal_village'];?>" disabled="disabled" class="input-label sl"/><label class="lable">قریه یا ناحیه</label>
                    </div>
                    <div class="test"><input type="text" name="home_address_asli" value="<?php echo $student_data[0]['origenal_homeAddress'];?>" disabled="disabled" class="input-label sl"/><label class="lable">آدرس خانه</label></div>
                </div> 
                <div class="box-adding">
                    <div class="test" style="margin-bottom: 0px"><label class="lable" style="font-size:18px;">سکونت فعلی</label></div>
                    <div class="test">
                        <select name="province_current" id="province_current" disabled="disabled" data-rel="chosen" onchange="load_district('province_current','district_current')"  class="dropdown-select input-label sl" style="width:220px;">
                             <?php foreach($province as $p):?>
                                <option value="<?php echo $p['prov_id'];?>" <?php if($student_data[0]['current_province']==$p['prov_id']){?>selected="selected"<?php }?>><?php echo $p['prov_name'];?></option>
                             <?php endforeach;?>
                        </select>
                        <label class="lable">ولایت</label>
                    </div>
                    <div class="test">
                        <select name="district_current" id="district_current" disabled="disabled" data-rel="chosen"  class="dropdown-select input-label sl" style="width:220px;">
                             <option value="<?php echo $student_data[0]['current_district'];?>" selected="selected"><?php echo $student_data[0]['district_current'];?></option>
                        </select>
                        <label class="lable">ولسوالی</label>
                    </div>
                    <div class="test">
                        <input type="text" name="village_current" value="<?php echo $student_data[0]['current_village'];?>" class="input-label sl" disabled="disabled"/>
                        <label class="lable">قریه یا ناحیه</label>
                    </div>
                    <div class="test"><input type="text" name="home_address_current" value="<?php echo $student_data[0]['current_homeAddress'];?>" class="input-label sl" disabled="disabled"/><label class="lable">آدرس خانه</label></div>
                </div>                   
        </div><!-- /.row -->
            </div>
            <div class="modal-footer" style="background:#fff;border-top:none;">
                    <input type="hidden" name="identity_id" value="<?php echo $student_data[0]['student_id'];?>"/>
                    <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                    <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'sl','s_location')">تصحیح کردن</button>
                    <button style="float:left;display:none;" id="s_location" type="button" class="btn-add" onclick="update_modal_data('student_location','student/home/edit_student_info/location_data','tab_content')">ذخیره کردن</button>
            </div>
            </form>
        </div>
        <div class="tab-pane fade" id="set3">
         <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'student_school');
                        echo form_open('student/home/edit_student_info/school_data',$attributes);?>
            <div class="tabbable sub">
            <!--student school information-->
                         <div class="input-area info">
                            <div class="box-adding">
                                <div class="test">
                                    <input type="text" name="student_school" value="<?php echo $student_data[0]['grad_school'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">مکتب</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_e_school" value="<?php echo $student_data[0]['english_grad_school'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">نام مکتب به انگلیسی</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_school_grad" value="<?php echo $student_data[0]['grad_school_year'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">سال فراغت</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_kankor_year" value="<?php echo $student_data[0]['kankor_entry_year'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">سال کانکور</label></div>
                                <div class="test">
                                    <input type="text" name="student_kankor_id" value="<?php echo $student_data[0]['kankor_id'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">آدی کانکور</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_kankor_score" value="<?php echo $student_data[0]['kankor_score'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">نمره کانکور</label>
                                </div>
                            </div>
                         </div><!--end input area-->
            <!--end student school info-->
            </div>
            <div class="modal-footer" style="background:#fff;border-top:none;">
                    <input type="hidden" name="identity_id" value="<?php echo $student_data[0]['student_id'];?>"/>
                    <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                    <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'ss','s_school')">تصحیح کردن</button>
                    <button style="float:left;display:none;" id="s_school" type="button" class="btn-add" onclick="update_modal_data('student_school','student/home/edit_student_info/school_data','tab_content')">ذخیره کردن</button>
            </div>
            </form>
        </div>
        <div class="tab-pane fade" id="set4">
            <div class="tabbable sub">
                <!--student family information-->
                      <form class="navbar-form navbar-left" role="search" id="student_list">
                      <?php if(count($student_family_data)>0){?>
                         <div class="input-area info">
                            <table>
                                <thead>
                                    <th style="padding:10px 10px 10px 30px">قرابت</th>
                                    <th style="padding:5px">اسم</th>
                                    <th style="padding:5px">ولد</th>
                                    <th style="padding:5px">وظیفه</th>
                                    <th style="padding:5px">نمبر تماس</th>
                                </thead>
                                <tbody>
                                    <?php foreach($student_family_data as $sfd):?>
                                    <tr>
                                        <td style="padding:10px 10px 10px 30px"><?php echo $sfd['name'];?></td>
                                        <td style="padding:5px"><input type="text" name="name[]" value="<?php echo $sfd['sFamily_name'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px"><input type="text" name="fname[]" value="<?php echo $sfd['sFamily_fName'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px"><input type="text" name="job[]" value="<?php echo $sfd['sFamily_occupation'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px"><input type="text" name="contact[]" value="<?php if($sfd['sFamily_phone']!=''){ echo '0'.$sfd['sFamily_phone'];}?>" disabled="disabled"/></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                         </div><!--end input area-->
                         <?php }?>
                    </form>
            <!--end student school info-->
            </div>
            <div class="modal-footer" style="background:#fff;border-top:none;">
                                <button style="float:left" type="reset" class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="">تصحیح کردن</button>
                            </div>
        </div>
        <div class="tab-pane fade" id="set5">
            <div class="tabbable sub">
                <!--student university information-->   <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'student_university');
                        echo form_open('student/home/edit_student_info/university_data',$attributes);?>
                         <div class="input-area info">
                            <div class="box-adding">
                                <div class="test">
                                    <input type="text" name="student_entry_year" value="<?php echo $student_data[0]['university_entry_year'];?>" disabled="disabled" class="input-label su"/>
                                    <label class="lable">سال شمول</label>
                                </div>
                                <div class="test">
                                    <select name="student_dep" disabled="disabled" data-rel="chosen"  class="dropdown-select input-label su" style="width:220px;">
                                    <?php foreach($department as $dp):?>
                                    <option value="<?php echo $dp['dep_id'];?>" <?php if($dp['dep_id']==$student_data[0]['dep_id']){?>selected="selected"<?php }?>><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <label class="lable">دیپارتمنت</label>
                                </div>
                                <div class="test"><input type="text" name="email" value="اول" disabled="disabled" class="input-label"/><label class="lable">سمسترتحصیلی</label></div>
                                <div class="test"><input type="text" name="email" value="<?php if(count($stud_deploma_project)>0){ echo $stud_deploma_project[0]['graduated_date'];}?>" disabled="disabled" class="input-label"/><label class="lable">تاریخ فراغت</label></div>
                            </div>
                            <div class="box-adding">
                                <div class="test"><input type="text" name="email" value="<?php if(count($stud_deploma_project)>0){ echo $stud_deploma_project[0]['project_dari_name'];}?>" disabled="disabled" class="input-label"/><label class="lable">پروژه دیپلوم</label></div>
                                <div class="test"><input type="text" name="email" value="<?php if(count($stud_deploma_project)>0){ echo $stud_deploma_project[0]['project_english_name'];}?>" disabled="disabled" class="input-label"/><label class="lable">پروژه دیپلوم به انگلیسی</label></div>
                                <div class="test"><input type="text" name="email" value="<?php if(count($stud_deploma_project)>0){ echo $stud_deploma_project[0]['teacher_id'];}?>" disabled="disabled" class="input-label"/><label class="lable">استاد رهنما</label></div>
                                <div class="test">
                                    <select name="student_state" id="edu_degree" disabled="disabled" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                        <option value="<?php echo $student_data[0]['sState_id'];?>" selected="selected">محصل <?php echo $student_data[0]['sState_name'];?></option>
                                    </select>
                                    <label class="lable">وضعیت</label>
                                </div>
                            </div>
                            <div class="modal-footer" style="background:#fff;border-top:none;">
                               <input type="hidden" name="identity_id" value="<?php echo $student_data[0]['student_id'];?>"/>
                               <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                               <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'su','s_university')">تصحیح کردن</button>
                               <button style="float:left;display:none;" id="s_university" type="button" class="btn-add" onclick="update_modal_data('student_university','student/home/edit_student_info/university_data','tab_content')">ذخیره کردن</button>
                            </div>
                         </div><!--end input area-->
                    </form>
            <!--end student university info-->
            </div>
        </div>
        <div class="tab-pane fade" id="set6">
            <div class="tabbable sub">
                 <ul class="nav nav-tabs">
                    <li class="active"><a href="#sub61" style="margin-right: 10px;">لیست یادداشتها</a></li>
                    <li><a href="#sub62">اضافه کردن</a></li>
                </ul>
                <div class="tab-content" style="width:100%">
                    <div class="tab-pane fade active in" id="sub61">
                        <?php if(count($student_memo)>0){?>
                 <!--student memo-->
                      <form class="navbar-form navbar-left" role="search" id="student_list">
                         <div class="input-area info">
                            <table>
                                <thead>
                                    <th style="padding:5px">موضوع یادداشت</th>
                                    <th style="padding:5px">جزییت یادداشت</th>
                                    <th style="padding:5px">سال تحصیلی</th>
                                    <th style="padding:5px">سمستر</th>
                                </thead>
                                <tbody>
                                    <?php foreach($student_memo as $m):?>
                                    <tr>
                                        <td style="padding:5px;vertical-align: top"><input type="text" name="name[]" value="<?php echo $m['sState_name'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px"><textarea style="width:250px" rows="3" name="details[]" value="111<?php echo $m['discription'];?>" disabled="disabled"></textarea></td>
                                        <td style="padding:5px;vertical-align: top"><input type="text" name="year[]" value="<?php echo $m['edu_year'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px;vertical-align: top"><input type="text" name="semester[]" value="<?php echo $m['semester_name'];?>" disabled="disabled"/></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                         </div><!--end input area-->
                         <div class="modal-footer" style="background:#fff;border-top:none;">
                                <button style="float:left" type="reset" class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="">تصحیح کردن</button>
                            </div> 
                    </form>
                    <?php }?>
                    </div>
                    <div class="tab-pane fade" id="sub62">
                    </div>
                 </div>
                </div>
            </div> <!--end sub6-->
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>js/myjs.js"></script>