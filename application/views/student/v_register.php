<div id="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <?php  $attributes = array('class' => 'navbar-form navbar-left', 'id' => 'student_register');
                   echo form_open_multipart('student/home/do_register',$attributes);?>
            <div class="panel-heading">ثبت نام کردن محصل جدید <img id="loader" data="reg" style="position: relative;top:100px;right:35%;z-index:1000;visibility: hidden" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
            <div id="register_input">
                    <fieldset class="well the-fieldset" style="border:none;width:815px;float:right;margin-right:40px">
                        <fieldset class="well the-fieldset" id="fieldset-right" style="width:400px">
                            <legend class="the-legend" style="width:42px;">شهرت</legend>
                            <div class="test">
                                <div class="two-input">
                                    <input type="text" name="s_english_name" class="input-small-left" placeholder="English"/>
                                    <input type="text" name="s_dari_name" class="input-small-right" placeholder="دری"/>
                                </div>
                                <label class="lable">نام</label><em>*</em>
                            </div>
                            <div class="test">
                                <div class="two-input">
                                    <input type="text" name="s_english_fName" class="input-small-left" placeholder="English"/>
                                    <input type="text" name="s_dari_fName"class="input-small-right" placeholder="دری"/>
                                </div>
                                <label class="lable">نام پدر</label><em>*</em>
                            </div>
                            <div class="test">
                                <div class="two-input">
                                    <input type="text" name="s_english_gFName"class="input-small-left" placeholder="English"/>
                                    <input type="text" name="s_dari_gFName" class="input-small-right" placeholder="دری"/>
                                </div>
                                <label class="lable">نام پدرکلان</label><em>*</em>
                            </div>
                            <div class="test">
                                <div class="two-input">
                                    <input type="text" name="s_english_lName" class="input-small-left" placeholder="English"/>
                                    <input type="text" name="s_dari_lName" class="input-small-right" placeholder="دری"/>
                                </div>
                                <label class="lable">نام فامیلی</label>
                            </div>
                            <div class="test"><input type="text" name="s_nationality" class="input-label"/><label class="lable">ملیت</label></div>
                            <div class="test"><input type="text" name="s_mother_tong" class="input-label"/><label class="lable">زبان مادری</label></div>
                            <div class="test"><input type="file" name="s_photo" class="input-label"/><label class="lable">عکس</label>
                            </div>
                        </fieldset>
                        <fieldset class="well the-fieldset" id="fieldset-left" style="margin-right:50px;">
                            <legend class="the-legend" style="width:80px;">معلومات تذکره</legend>
                            <div class="test"><input type="text" name="s_nationalID" class="input-label"/><label class="lable">نمبر عمومی</label><em>*</em></div>
                            <div class="test"><input type="text" name="tazkira_jeld" class="input-label"/><label class="lable">جلد</label></div>
                            <div class="test"><input type="text" name="tazkira_page" class="input-label"/><label class="lable">صفحه</label></div>
                            <div class="test"><input type="text" name="tazkira_registerNum" class="input-label"/><label class="lable">شماره ثبت</label></div>
                            <div class="test"><input type="text" name="dateOfBirth" class="input-label"/><label class="lable">سال تولد</label></div>
                            <div class="test">
                                <select name="s_state" id="state" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                    <option value="0" selected="selected">انتخاب نمایید</option>
                                    <?php foreach($state as $s):?>
                                    <option value="<?php echo $s['state_id'];?>"><?php echo $s['state_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <label class="lable">حالت مدنی</label>
                            </div>
                            <div class="test">
                                <select name="s_gender" id="gender" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                    <option value="0" selected="selected">انتخاب نمایید</option>
                                    <?php foreach($gender as $g):?>
                                    <option value="<?php echo $g['gender_id'];?>"><?php echo $g['gender_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                                <label class="lable">جنسیت</label>
                            </div>
                        </fieldset>
                    </fieldset>
                    <fieldset class="well the-fieldset" id="fieldset-left" style="margin-left:38px;">
                        <legend class="the-legend" style="width:100px;">معلومات تحصیلات</legend>
                        <div class="test"><input type="text" name="school" class="input-label"/><label class="lable">نام مکتب</label></div>
                        <div class="test">
                            <select name="graduated_year" id="graduated_year" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                <?php foreach($year as $y):?>
                                    <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                    <?php endforeach;?>
                            </select>
                            <label class="lable">فراغت از</br>مکتب</label>
                        </div>
                        <div class="test">
                            <select name="entry_type" id="department" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                <?php foreach($university_entry_type as $ent):?>
                                <option value="<?php echo $ent['admition_type_id'];?>"><?php echo $ent['admition_type_name'];?></option>
                                <?php endforeach;?>
                            </select>
                            <label class="lable">نوعیت شمول</label>
                        </div>
                        <div class="test"><input type="text" name="kankor_entry_year" class="input-label"/><label class="lable">امتحان کانکور</label></div>
                        <div class="test"><input type="text" name="kankor_number" class="input-label"/><label class="lable">نمره کانکور</label></div>
                        <div class="test"><input type="text" name="kankorID" class="input-label"/><label class="lable">کانکور ID</label></div>
                        <div class="test"><input type="text" name="phoneNumber" class="input-label"/><label class="lable">شماره تماس</label></div>
                        <div class="test"><input type="text" name="email" class="input-label"/><label class="lable">ایمیل</label></div>
                        <div class="test">
                            <select name="department" id="department" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($department as $dep):?>
                                    <option value="<?php echo $dep['dep_id'];?>"><?php echo $dep['dep_name'].'('.$dep['dep_expression'].')';?></option>
                                    <?php endforeach;?>
                            </select>
                            <label class="lable">دیپارتمنت</label>
                        </div>
                        <div class="test">
                            <select name="u_entry_year" id="u_year" data-rel="chosen"  class="dropdown-select input-label" style="width:220px;">
                                <?php foreach($year as $y):?>
                                    <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                    <?php endforeach;?>
                            </select>
                            <label class="lable">سال شمول <br>درپوهنتون</label>
                        </div>
                    </fieldset>
                    <fieldset class="well the-fieldset" style="width:1230px;margin-right:40px;margin-bottom:10px">
                        <legend class="the-legend" style="width:100px;">سکونت محصل</legend>
                        <div class="test1">سکونت اصلی</div>
                        <ul class="input-list">
                            <li>
                                <select name="main_province" id="province" data-rel="chosen"  class="dropdown-select input-label" onchange="load_district('province','district')">
                                     <option value="0" selected="selected">انتخاب نمایید</option>
                                     <?php foreach($province as $prov):?>
                                     <option value="<?php echo $prov['prov_id'];?>"><?php echo $prov['prov_name'];?></option>
                                     <?php endforeach;?>
                                </select>
                                <label class="lable">ولایت :</label>
                            </li>
                            <li>
                                <select name="main_district" id="district" data-rel="chosen"  class="dropdown-select input-label">
                                     <option value="" selected="selected">انتخاب نمایید</option>
                                </select>
                                <label class="lable">ولسوالی :</label>
                            </li>
                            <li><input type="text" name="main_village" class="input-label"/><label class="lable">قریه یا ناحیه :</label></li>
                            <li><input type="text" name="main_homeAddress" class="input-label"/><label class="lable">نمبرخانه وکوچه :</label></li>
                        </ul>
                        <div class="test1">سکونت فعلی</div>
                        <ul class="input-list">
                            <li>
                                <select name="current_province" id="c_province" data-rel="chosen"  class="dropdown-select input-label" onchange="load_district('c_province','c_district')">
                                     <option value="0" selected="selected">انتخاب نمایید</option>
                                     <?php foreach($province as $prov):?>
                                     <option value="<?php echo $prov['prov_id'];?>"><?php echo $prov['prov_name'];?></option>
                                     <?php endforeach;?>
                                </select>
                                <label class="lable">ولایت :</label>
                            </li>
                            <li>
                                <select name="current_district" id="c_district" data-rel="chosen"  class="dropdown-select input-label">
                                     <option value="" selected="selected">انتخاب نمایید</option>
                                </select>
                                <label class="lable">ولسوالی :</label>
                            </li>
                            <li><input type="text" name="current_village" class="input-label"/><label class="lable">قریه یا ناحیه :</label></li>
                            <li><input type="text" name="current_homeAddress" class="input-label"/><label class="lable">نمبرخانه وکوچه :</label></li>
                        </ul>
                    </fieldset>
                    <fieldset class="well the-fieldset" style="width:1230px;margin-right:40px;margin-bottom:30px">
                        <legend class="the-legend" style="width:140px;">اقارب محصل ووظایف آنها</legend>
                        <!-- Table -->
                          <table class="table table-adding">
                            <thead>
                              <tr>
                                <th>اقاربت</th>
                                <th>اسم</th>
                                <th>ولد</th>
                                <th>وظیفه ومحل آن</th>
                                <th>نمبرتماس</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="odd">
                                <td class="td-name">پدر<em>*</em></td>
                                <td><input type="text" name="f_name" class="table-input"/></td>
                                <td><input type="text" name="f_fName" class="table-input"/></td>
                                <td><input type="text" name="f_occupation" class="table-input"/></td>
                                <td><input type="text" name="f_phoneNumber" class="table-input"/></td>
                              </tr>
                              <tr class="even"> 
                                <td class="td-name">برادر</td>
                                <td><input type="text" name="brother_name" class="table-input"/></td>
                                <td><input type="text" name="brother_fName" class="table-input"/></td>
                                <td><input type="text" name="brother_occupation" class="table-input"/></td>
                                <td><input type="text" name="brother_phoneNumber" class="table-input"/></td>
                              </tr>
                              <tr class="odd">
                                <td class="td-name">کاکا</td>
                                <td><input type="text" name="kaka_name" class="table-input"/></td>
                                <td><input type="text" name="kaka_fName" class="table-input"/></td>
                                <td><input type="text" name="kaka_occupation" class="table-input"/></td>
                                <td><input type="text" name="kaka_phoneNumber" class="table-input"/></td>
                              </tr>
                              <tr class="even">
                                <td class="td-name">ماما</td>
                                <td><input type="text" name="mama_name" class="table-input"/></td>
                                <td><input type="text" name="mama_fName" class="table-input"/></td>
                                <td><input type="text" name="mama_occupation" class="table-input"/></td>
                                <td><input type="text" name="mama_phoneNumber" class="table-input"/></td>
                              </tr>
                            </tbody>
                          </table>
                    </fieldset>
                    <span class="required-feild" style="margin:0px 40px 0px 0px"><em> *</em>فیلدهای ضروری</span>
                    <div class="add-button">
                        <button type="submet" class="btn-add">راجستر کردن</button>
                        <button type="reset" class="btn-reset">پاک کردن</button>
                        <img id="loader_reg" style="visibility:hidden; margin:10px 50px 10px 50px" src="<?php echo base_url();?>images/ajax-loader.gif">
                    </div>
            </div><!-- /.row -->
            </form>
        </div>              
    </div>