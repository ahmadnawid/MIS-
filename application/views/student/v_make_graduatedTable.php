<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم جستجوکردن ترانسکریپت نمرات</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="make_transcript">
                <div class="box-search">
                    <div class="box">
                        سال فراغت
                        <div class="input-append">
                            <select name="graduated_year" id="graduated_year" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                     
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('make_transcript','student/transcript/search_transcript','making_transcript')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
<div class="panel panel-default" id="making_transcript">
    <div class="panel-heading">لیست محصلین فارغ التحصیل</div>
        <div class="input-area" style="padding-top:1px">
            <div class="shoqa-head" id="result-sheet">
                <ul style="margin-bottom:20px;padding-top:25px">
                    <li style="text-align:left;"><img src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li style="width:50%">
                        <p style="font-size:22px;">وزارت تحصیلات عالی</p>
                        <p style="font-size:22px;margin-top:10px">پوهنتون پولی تخنیک کابل</p>
                        <p style="font-size:22px;margin-top:10px;">معاونیت امور محصلان</p>
                        <p style="font-size:24px;margin-top:10px;">پوهنحی انجنیری کمپیوتر وانفورماتیک</p>
                        <p style="font-size:24px;margin-top:20px;font-weight:bold;">دیپارتمنت تکنالوجی معلوماتی (IT)</p>
                    </li>
                    <li style="text-align:right;"><img src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                </ul>
                <table class="table-border table" style="border: 1px solid #000;width:92%;margin:0px 40px 30px 0px;">
                    <thead>
                        <tr>
                         <th colspan="18" style="background:#ddd;text-align: center;font-size: 30px;font-weight: bold;padding:10px">جدول فارغان سال : 1393</th>
                        </tr>
                        <tr class="row-head">
                            <th rowspan="2" style="width:10px;-webkit-transform:rotate(90deg);padding:0px">شماره</th>
                            <th rowspan="2">زبان</th>
                            <th colspan="4">شهرت</th>
                            <th rowspan="2" style="width:10px;-webkit-transform:rotate(90deg);padding:8px;">نمبرتذکره</th>
                            <th rowspan="2" style="padding:15px">سال تولد</th>
                            <th colspan="4">چگونگی شمولیت و سال آن</th>
                            <th colspan="2">پروژه دیپلوم</th>
                            <th rowspan="2">شماره تماس</th>
                            <th rowspan="2">فوتو</th>
                        </tr>
                         <tr class="row-head">
                            <th>اسم</th>
                            <th>تخلص</th>
                            <th>ولد</th>
                            <th>ولدیت</th>
                            <th>کانکور</th>
                            <th>تبدیلی</th>
                            <th>سال شمول</th>
                            <th>سال فراغت</th>
                            <th>عنوان پروژه</th>
                            <th>نمره</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $a=1; foreach($student as $st):?>
                        <tr class="row-body">
                            <td rowspan="2"><?php echo $a;?></td>
                            <td>دری</td>
                            <td><?php echo $st['dari_name'];?></td>
                            <td><?php echo $st['dari_lName'];?></td>
                            <td><?php echo $st['dari_fName'];?></td>
                            <td><?php echo $st['dari_gFName'];?></td>
                            <td rowspan="2" ><?php echo $st['tazkira_number'];?></td>
                            <td><?php echo $st['dateOfBirth'];?></td>
                            <td>بلی</td>
                            <td></td>
                            <td><?php echo $st['university_entry_year'];?></td>
                            <td><?php echo $st['university_graduated_year'];?></td>
                            <td><?php echo $st['project_dari_name'];?></td>
                            <td rowspan="2"><?php echo $st['score'];?></td>
                            <td rowspan="2"><?php echo $st['phone_number'];?></td>
                            <td rowspan="2"><img src="<?php echo base_url().$st['photo'];?>"/></td>
                        </tr>
                        <tr class="row-body">
                            <td>انگلیسی</td>
                            <td><?php echo $st['english_name'];?></td>
                            <td><?php echo $st['english_lName'];?></td>
                            <td><?php echo $st['english_fName'];?></td>
                            <td><?php echo $st['english_gFName'];?></td>
                            <td><?php echo $st['dateOfBirth']+621;?></td>
                            <td>Yes</td>
                            <td></td>
                            <td><?php echo $st['university_entry_year']+621;?></td>
                            <td><?php echo $st['university_graduated_year']+622;?></td>
                            <td><?php echo $st['project_english_name'];?></td>
                        </tr>
                        <?php $a++; endforeach;?>
                    </tbody>
                </table>
                </div>
        <!-- transcript dari---------------------------------------->
            </div>
    </div>