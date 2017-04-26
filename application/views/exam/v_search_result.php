<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">فورم برای جستجوکردن نمرات امتحان
      <img id="loader" data="searched_result" style="position: relative;top:250px;right:32%;z-index:1000;visibility:hidden" src="<?php echo base_url();?>images/ajax-loader.gif">
      </div>
      
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
                        سال تحصیلی
                        <div class="input-append">
                            <select name="edu_year" id="edu_year" data-rel="chosen"  class="dropdown-select search-area">
                                 <option value="" selected="selected">انتخاب کنید</option>
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                   
                    <div class="box">
                       سمستر
                       <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area">
                                <option value="" selected="selected">انتخاب نمایید</option>
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area">
                                <option value="" selected="selected">انتخاب نمایید</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div> 
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('make_shuqa','exam/exam_result/searching_r','searched_result')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" id="searched_result" style="display: none;">
          <!-- Default panel contents -->
    </div>