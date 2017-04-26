<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">فورم جستجو محصل</div>
            <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="student_list">
                <div class="box-search">
                     <div class="box">
                        آدی
                        <div class="input-append">
                            <input type="text" name="student_id" placeholder="آدی یا نمبر تذکره محصل را وارد کنید..."/>
                        </div>
                    </div>
                    <div class="box">
                        نام
                        <div class="input-append">
                            <input type="text" name="student_name" placeholder="نام محصل را وارد کنید..."/>
                        </div>
                    </div>
                    <div class="box">
                        سال شمول
                        <div class="input-append">
                            <select name="entry_year" id="entry_year" data-rel="chosen"  class="dropdown-select search-area search-input">
                                 <option value="0" selected="selected">همه</option>
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div> 
                    <div class="box">
                        سال فراغت
                        <div class="input-append">
                            <select name="graduated_year" id="graduated_year" data-rel="chosen"  class="dropdown-select search-area search-input">
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
                            <select name="semester" id="semester" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">همه</option>
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
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('student_list','student/home/search_student','list')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
        
        </div>
<div class="panel panel-default" style="margin-top:10px;" id="search_student">
      <!-- Default panel contents -->
      <div class="panel-heading" style="padding-left:80px"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
      لیست محصلین فاکولته<img id="loader" data="list" style="position: relative;top:100px;right:45%;z-index:1000;visibility: hidden" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
                    <div class="box-content" style="padding:10px 20px" id="list">
                        <table class="table table-striped">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی محصل</th>
                                    <th>اسم</th>
                                    <th>ولد</th>
                                    <th>ولدیت</th>
                                    <th>دیپارتمنت</th>
                                    <th>سال شمول</th>
                                    <th>وضعیت کنونی</th>
                                    <th>معلومات مکمل</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php  foreach($student as $st):?>
                                <tr>
                                    <td class="center"><?php echo $number;?></td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $st['student_id'];?></td>
                                    <td class="center"><?php echo $st['dari_name'];?></td>
                                    <td class="center"><?php echo $st['dari_fName'];?></td>
                                    <td class="center"><?php echo $st['dari_gFName'];?></td>
                                    <td class="center"><?php echo $st['dep_name'];?></td>
                                    <td class="center"><?php echo $st['university_entry_year'];?></td>
                                    <td class="center"><?php echo $st['sState_name'];?></td>
                                    <td class="center">
                                          <a data-toggle="modal" href="#full-width" onclick="load_modal_data('<?php echo $st['student_id'];?>','student/home/student_info_details','full-width')">جزئیات</a>
                                    </td>
                                </tr>
                                <?php $number++; endforeach;?>  
                              </tbody>
                         </table>
                         <table class="table table-striped page">
                        <tbody><tr>
                            <td width="20%"><?php echo $total;?></td>
                            <td>
                            <?php echo $link;?>                    
                            </td>
                            <td style="text-align: left;">
                            تعداد محصل در هر صفحه:
                            </td><td>
                                <?php echo $perPage;?>                   
                            </td>
                        </tr>
                    </tbody>
                </table>
                    </div>
      
     </div>
    </div>
<!-- modal--> 
<div id="full-width" class="modal hide fade" tabindex="-1" style="width:80%;left:410px;background: #f7f6f6;">
</div>