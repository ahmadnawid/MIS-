<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">فورم جستجوبرای راپور محصلین</div>
            <div class="input-area">
            <form class="navbar-form navbar-left" method="post" role="search" id="search_r">
                    <div class="box">
                        سال تحصیلی
                        <div class="input-append">
                            <select name="edu_year" id="entry_year" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div> 
                    <div class="box">
                        سمستر
                        <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="" selected="selected">همه</option>
                                <?php foreach($semester as $s):?>
                                <option value="<?php echo $s['semester_id'];?>"><?php echo 'سمستر'.$s['semester_name'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                     
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="" selected="selected">همه</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        نتیجه
                        <div class="input-append">
                            <select name="result" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="" selected="selected">همه</option>
                                <option value="1">کامیاب</option>
                                <option value="5">تکرارسمستر</option>
                                <option value="6">اخطار</option>
                                <option value="7">اخراج دایمی</option>
                                <option value="20">کمتر از %65</option>  
                            </select>
                        </div>
                    </div>
                    <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('search_r','report/exam_report/make_exam_report','search_report')">جستجو</button>
                </div>
                </div>                
            </form>
        </div><!-- /.row -->
<div class="panel panel-default" style="margin-top:10px;display: none;" id="search_report">
           <div class="panel-heading" style="padding-left:80px"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
         راپور نتایج<img id="loader" data="list" style="position: relative;top:100px;right:50%;z-index:1000;visibility:hidden;opacity:1" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
      </div>
     </div>
<!-- modal--> 