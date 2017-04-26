<div class="modal-header" style="background:#f28c38;padding-top:10px;border-radius:5px 5px 0 0;color:#fff">
<img style="position: relative;top:200px;right:48%;display:none;z-index:2000" src="<?php echo base_url().'images/ajax-loader.gif'?>" id="modal-loader"/>
    <div style="float:right;border-radius:100%;border:1px solid #fff;border-bottom-color: #eee;background: #fff"><img src="<?php if($staff_data[0]['photo']!=''){ echo base_url().$staff_data[0]['photo'];}else{ echo base_url().'img/default-photo.png';}?>" style="width:100px;height: 100px;border-radius:100%;padding:8px" disabled="disabled"/></div>
    <h4 style="margin-right: 140px;margin-top:20px;margin-bottom: 3px;"><?php echo $staff_data[0]['dari_name'].' '.$staff_data[0]['dari_lName'];?></h4>
  </div>
  <div class="modal-header" style="padding-top:10px;padding-bottom:15px;border-bottom:none">
    <p style="margin-right:140px;margin-bottom:0px;"><?php if($staff_data[0]['phone_number']!=0) echo '0'.$staff_data[0]['phone_number'];?></p>
    <p style="margin-right:140px;"><?php echo $staff_data[0]['email'];?></p>
  </div>
   <div class="modal-body" style="padding:0px;background-color: #fff;border-radius:0px;max-height:500px;width:100%">
  <div class="tabbable boxed parentTabs" id="tab_content">
   <ul class="nav nav-tabs" style="width:100%;margin:0px" id="tabContent">
        <li class="active"><a href="#set1" style="margin-right:10px">معلومات شخصی</a></li>
        <li><a href="#set2">تحصیلات</a></li>
        <li><a href="#set3">وظیفه</a></li>
        <li><a href="#set4">ترفیعات</a></li>
        <li><a href="#set5">بورسیه تحصیلی</a></li>
    </ul>
    <div class="tab-content" style="width:100%;">
        <div class="tab-pane fade active in" id="set1">
            <div class="tabbable sub">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sub11">دری</a>
                    </li>
                    <li><a href="#sub12">انگلیسی</a>
                    </li>
                </ul>
                <div class="tab-content" style="width:100%">
                    <div class="tab-pane fade active in" id="sub11">
                         <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi');
                   echo form_open('faculty/stuff/edit_staff_info/fa_data',$attributes);?>
                    <div class="input-area info">                                 
                        <div class="box-search">
                            <div class="box">
                                آدی
                                <div class="input-append">
                                    <input type="text" name="student_id" value="<?php echo $staff_data[0]['staff_id'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نام<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_name" class="personal_info" value="<?php echo $staff_data[0]['dari_name'];?>" disabled="disabled"/>
                                    <!--span style="font-size: 10px;position: relative;top:20px">پرکردن این فیلد ضروری است...</span!-->
                                </div>
                            </div>
                            <div class="box">
                                تخلص
                                <div class="input-append">
                                    <input type="text" name="student_lName" class="personal_info" value="<?php echo $staff_data[0]['dari_lName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نام پدر <em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_fName" class="personal_info" value="<?php echo $staff_data[0]['dari_fName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                شماره تلفون
                                <div class="input-append">
                                    <input type="text" name="student_phone" class="personal_info" value="<?php if($staff_data[0]['phone_number']!=0) echo '0'.$staff_data[0]['phone_number'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                آدرس ایمیل
                                <div class="input-append">
                                    <input type="text" name="student_email" class="personal_info" value="<?php echo $staff_data[0]['email'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                نمبر تذکره <em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_tazkira" class="personal_info" value="<?php echo $staff_tazkira[0]['tazkira_number'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                جلد تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tSheet" class="personal_info" value="<?php echo $staff_tazkira[0]['sheath'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                صفحه تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tPage" class="personal_info" value="<?php echo $staff_tazkira[0]['page'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                شماره ثبت تذکره
                                <div class="input-append">
                                    <input type="text" name="student_tRNumber" class="personal_info" value="<?php echo $staff_tazkira[0]['register_number'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                تاریخ تولد
                                <div class="input-append">
                                    <input type="text" name="student_dateOfBirth" class="personal_info" value="<?php echo $staff_tazkira[0]['dateOfBirth'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                ملیت
                                <div class="input-append">
                                    <input type="text" name="student_nationality" class="personal_info" value="<?php echo $staff_data[0]['dari_nationality'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                جنسیت
                                <div class="input-append">
                                    <select name="student_gender" id="student_gender" disabled="disabled" data-rel="chosen"  class="dropdown-select search-area search-input personal_info">
                                        <?php foreach($gender as $g):
                                        if($staff_tazkira[0]['gender_id']==0 and $g['gender_id']==0){?>
                                        <option value="0" selected="selected">انتخاب نمایید</option>
                                        <?php  }elseif($g['gender_id']==0){}else{?>
                                        <option value="<?php echo $g['gender_id'];?>" <?php if($g['gender_id']==$staff_tazkira[0]['gender_id']){?> selected="selected" <?php }?>><?php if($g['gender_name']!=''){ echo $g['gender_name'];}else{ echo 'انتخاب نمایید';};?></option> 
                                        <?php } endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="box">
                                حالت مدنی
                                <div class="input-append">
                                    <select name="student_marital_statuse" disabled="disabled" data-rel="chosen"  class="dropdown-select search-area search-input personal_info">
                                        <?php foreach($state as $s):
                                        if($staff_tazkira[0]['state_id']==0 and $s['state_id']==0){?>
                                        <option value="0" selected="selected">انتخاب نمایید</option>
                                        <?php  }elseif($s['state_id']==0){}else{?>
                                        <option value="<?php echo $s['state_id'];?>" <?php if($s['state_id']==$staff_tazkira[0]['state_id']){?> selected="selected" <?php }?>><?php if($s['state_name']!=''){ echo $s['state_name'];}else{ echo 'انتخاب نمایید';};?></option> 
                                        <?php } endforeach;?> 
                                    </select>
                                </div>
                            </div>     
                        </div> 
                         <br>
                         <span class="required-feild"><em> *</em>فیلدهای ضروری</span>              
                        </div><!--end input area-->
                                <input type="hidden" name="identity_id" value="<?php echo $staff_data[0]['staff_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_info','student_p_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_p_i" type="button" class="btn-add" onclick="update_modal_data('spi','student/home/edit_student_info/fa_data','tab_content')">ذخیره کردن</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="sub12">
                         <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi_en');
                   echo form_open('faculty/stuff/edit_staff_info/en_data',$attributes);?>
                    <div class="input-area info">
                        <div class="box-search">
                            <div class="box">
                                Name<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_e_name" class="personal_en_info" value="<?php echo $staff_data[0]['english_name'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                Last Name
                                <div class="input-append">
                                    <input type="text" name="student_e_lName" class="personal_en_info" value="<?php echo $staff_data[0]['english_lName'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                F/Name<em>*</em>
                                <div class="input-append">
                                    <input type="text" name="student_e_fName" class="personal_en_info" value="<?php echo $staff_data[0]['english_fName'];?>" disabled="disabled"/>
                                </div>
                            </div>
                            <div class="box">
                                Nationality
                                <div class="input-append">
                                    <input type="text" name="student_e_nationality" class="personal_en_info" value="<?php echo $staff_data[0]['english_nationality'];?>" disabled="disabled"/>
                                </div>
                            </div>   
                        </div>               
                        </div><!--end input area-->
                                <input type="hidden" name="identity_id" value="<?php echo $staff_data[0]['s_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_en_info','student_ENp_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_ENp_i" type="button" class="btn-add" onclick="update_modal_data('spi_en','student/home/edit_student_info/en_data','tab_content')">ذخیره کردن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="set2">
            <div class="tabbable sub">
                    <ul class="nav nav-tabs">
                    <?php $a=1; foreach($staff_edu as $s):?>
                        <li <?php if($a==1){?>class="active" <?php }?>><a href="#sub2<?php echo $a;?>"><?php echo $s['edu_degree_name'];?></a>
                        </li>
                    <?php $a++; endforeach;?>
                </ul>
                <div class="tab-content" style="width:100%">
                <?php $a=1; foreach($staff_edu as $s):?>
                        <div class="tab-pane fade <?php if($a==1){echo 'active in';}?>" id="sub2<?php echo $a;?>">
                            <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi_en');
                   echo form_open('faculty/stuff/edit_staff_info/en_data',$attributes);?>
                    <div class="input-area info">
                        <div class="box-search">
                            <div class="box">
                                <?php if($s['edu_degree_id']==1){ echo 'نام مکتب';}else{ echo 'نام پوهنتون';}?>
                                <div class="input-append">
                                    <input type="text" name="student_e_name" class="personal_en_info" value="<?php echo $s['eduOrg_dari_name'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                                تاریخ شمول
                                <div class="input-append">
                                    <input type="text" name="student_e_fName" class="personal_en_info" value="<?php echo $s['eduOrg_entry_date'];?>" disabled="disabled"/>
                                </div>
                            </div> 
                            <div class="box">
                               محل تحصیل
                                <div class="input-append">
                                    <input type="text" name="student_e_nationality" class="personal_en_info" value="<?php echo $s['eduOrg_dari_location'];?>" disabled="disabled"/>
                                </div>
                            </div>  
                            <div class="box">
                               تارخ فراغت
                                <div class="input-append">
                                    <input type="text" name="student_e_nationality" class="personal_en_info" value="<?php echo $s['eduOrg_grad_date'];?>" disabled="disabled"/>
                                </div>
                            </div>   
                        </div>               
                        </div><!--end input area-->
                                <input type="hidden" name="identity_id" value="<?php echo $staff_data[0]['s_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_en_info','student_ENp_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_ENp_i" type="button" class="btn-add" onclick="update_modal_data('spi_en','student/home/edit_student_info/en_data','tab_content')">ذخیره کردن</button>
                        </form>
                        </div>
                    <?php $a++; endforeach;?>
   
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="set3">
            <div class="tabbable sub">
            <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'spi_en');
                   echo form_open('faculty/stuff/edit_staff_info/en_data',$attributes);?>
               <div class="input-area info">
                            <div class="box-adding">
                                <div class="test">
                                    <input type="text" name="student_school" value="<?php echo $staff_data[0]['university_entry_year'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">تاریخ اشغال وظیفه</label>
                                </div>
                                <div class="test">
                                <select name="student_dep" disabled="disabled" data-rel="chosen"  class="dropdown-select input-label su" style="width:220px;">
                                    <?php foreach($department as $dp):?>
                                    <option value="<?php echo $dp['dep_id'];?>" <?php if($dp['dep_id']==$staff_data[0]['dep_id']){?>selected="selected"<?php }?>><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                    <?php endforeach;?>
                                    </select>
                                    <label class="lable">دیپارتمنت</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_school" value="<?php echo $staff_data[0]['k'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">رتبه علمی</label>
                                </div>
                                <div class="test">
                                    <input type="text" name="student_school" value="<?php echo $staff_data[0]['e'];?>" disabled="disabled" class="input-label ss"/>
                                    <label class="lable">درجه علمی</label>
                                </div>
                            </div>
                         </div><!--end input area-->
                         <input type="hidden" name="identity_id" value="<?php echo $staff_data[0]['s_id'];?>"/>
                                <button style="float:left;margin-left:50px"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
                                <button style="float:left" type="button" class="btn-add" onclick="enable_input($(this),'personal_en_info','student_ENp_i')">تصحیح کردن</button>
                                <button style="float:left;display:none;" id="student_ENp_i" type="button" class="btn-add" onclick="update_modal_data('spi_en','student/home/edit_student_info/en_data','tab_content')">ذخیره کردن</button>
                        </form>
            </div>
        </div>
        <div class="tab-pane fade" id="set4">
            <div class="tabbable sub">
                <!--student family information-->
                      <form class="navbar-form navbar-left" role="search" id="student_list">
                      <?php if(count($staff_promotion)>0){?>
                         <div class="input-area info">
                            <table>
                                <thead>
                                    <th style="padding:5px">رتبه علمی</th>
                                    <th style="padding:5px">تاریخ ترفیع</th>
                                    <th style="padding:5px">جزئیات</th>
                                </thead>
                                <tbody>                                                         
                                    <?php foreach($staff_promotion as $s):?>
                                    <tr>
                                        <td style="padding:5px;vertical-align: top"><input type="text" name="name[]" value="<?php echo $s['knowllage_degree_name'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px;vertical-align: top"><input type="text" name="fname[]" value="<?php echo $s['prom_date'];?>" disabled="disabled"/></td>
                                        <td style="padding:5px;margin-top:20px">
                                            <textarea style="width:250px" rows="3" name="details[]" disabled="disabled"><?php echo $s['prom_discription'];?></textarea>
                                        </td>
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
                tab 5
            </div>
        </div>
    </div>
</div>
</div>
  <script type="text/javascript" src="<?php echo base_url();?>js/myjs.js"></script>