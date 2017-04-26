<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم برای جستجوکردن نمرات امتحان</div>
        <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="make_shuqa">
                <div class="box-search">
                    <div class="box">
                        آدی محصل
                        <div class="input-append">
                            <input type="text" name="student_id" class="search-area" style="width:95%;" placeholder="آدی محصل را وارد کنید..."/>
                        </div>
                    </div>
                    <div class="box">
                        نام محصل
                        <div class="input-append">
                            <input type="text" name="student_name" class="search-area" style="width:95%;" placeholder="نام محصل را وارد کنید..."/>
                        </div>
                    </div>
                    <div class="box">
                        سال تحصیلی
                        <div class="input-append">
                            <select name="edu_year" id="edu_year" data-rel="chosen"  class="dropdown-select search-area">
                                 <option value="0" selected="selected">همه</option>
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                   
                    <div class="box">
                       سمستر
                       <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area" onchange="load_data('make_shuqa','exam/exam_score/get_semester_subject','dep_subject')">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area" onchange="load_data('make_shuqa','exam/exam_score/get_semester_subject','dep_subject')">
                                <option value="0" selected="selected">همه</option>
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
                                <option value="0" selected="selected">همه</option>
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('make_shuqa','exam/exam_score/make_exam_shuqa','making_shuqa')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="making_shuqa">
          <!-- Default panel contents -->
      <div class="panel-heading">نتیجه جستجو</div>
        <div class="input-area">
            <div class="shoqa-head" id="table-main">
                <table class="table-border table" id="result-table" style="border-top:1px solid #000000">
                    <thead>
                      <tr>
                        <th rowspan="2">شماره</th>
                        <th colspan="3">شهرت محصل</th>
                        <th rowspan="2">سال تحصیلی</th>
                        <th rowspan="2">سمستر</th>
                        <th rowspan="2">دیپارتمنت</th>
                        <th rowspan="2">مضمون</th>
                        <th colspan="4">نمره مضمون</th>
                        <th rowspan="2">ویرایش</th>
                      </tr>
                      <tr>
                        <th>آدی محصل</th>
                        <th>نام محصل</th>
                        <th>نام پدر محصل</th>
                        <th>نمره چانس اول</th>
                        <th>نمره چانس دوم</th>
                        <th>نمره چانس سوم</th>
                        <th>نمره چانس اضافی</th>
                      </tr>
                    </thead>
                    <!--tbody>
                    <?php //$a=1;foreach($student as $stud):?>
                      <tr>
                        <td><?php //echo $a;?></td>
                        <td><?php //echo $stud['dari_name'];?></td>
                        <td><?php //echo $stud['dari_fName'];?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <?php //$a++; endforeach;?>
                    </tbody-->
                </table>
            </div>
        </div><!-- /.row -->
    </div>