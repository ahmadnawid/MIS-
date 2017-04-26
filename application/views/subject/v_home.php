<form class="navbar-form navbar-left" method="post" role="search" id="search_subject" action="">
<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">مضامین فاکولته</div>
        <div class="input-area">
                <div class="box-search">
                    <div class="box">
                        کود مضمون
                        <div class="input-append">
                            <input type="text" name="sub_code" placeholder="کود مضمون را وارد کنید"/>
                        </div>
                    </div>
                    <div class="box">
                        نام یا مخفف مضمون
                        <div class="input-append">
                            <input type="text" name="sub_name" placeholder="نام یا مخفف مضمون را وارد کنید"/>
                        </div>
                    </div>
                    <div class="box">
                       کتگوری مضمون
                       <div class="input-append">
                            <select name="sub_cat" id="sub_cat" data-rel="chosen" class="dropdown-select search-area">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($sub_category as $sub):?>
                                <option value="<?php echo $sub['subCategory_id'];?>"><?php echo $sub['subCategory_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>                  
                    <div class="box">
                       سمستر
                       <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen" class="dropdown-select search-area">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($semester as $sem):?>
                                <option value="<?php echo $sem['semester_id'];?>"><?php echo 'سمستر'.$sem['semester_name'];?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        دیپارتمنت تدریس کننده
                        <div class="input-append">
                            <select name="dep" id="dep_subject" data-rel="chosen" class="dropdown-select search-area">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($department as $dep):?>
                                <option value="<?php echo $dep['dep_id'];?>"><?php echo $dep['dep_name'].'('.$dep['dep_expression'].')';?></option>
                                <?php endforeach;?>  
                            </select>                                                                         
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('search_subject','subject/home/index/search_sub','list')">جستچوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->
    <div class="panel panel-default" style="margin-top:10px;" id="search_student">
      <!-- Default panel contents -->
      <div class="panel-heading" style="padding-left:80px;"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
      لیست مضامین<img id="loader" data="list" style="position: relative;top:100px;right:40%;z-index:1000;visibility: hidden" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
                    <div class="box-content" style="padding:10px 20px" id="list">
                        <table class="table table-striped">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">کود مضمون</th>
                                    <th>نام مضمون به انگلیسی</th>
                                    <th>نام مضمون به دری</th>
                                    <th>مخفف مضمون</th>
                                    <th>کتگوری مضمون</th>
                                    <th>سمستر</th>
                                    <th>دیپارتمنت تدریس کننده</th>
                                    <th>عملیات</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php  foreach($subject as $sub):?>
                                <tr>
                                    <td class="center"><?php echo $number;?></td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $sub['subject_id'];?></td>
                                    <td class="center"><?php echo $sub['sub_english_name'];?></td>
                                    <td class="center"><?php echo $sub['sub_dari_name'];?></td>
                                    <td class="center"><?php echo $sub['sub_expresion'];?></td>
                                    <td class="center"><?php echo $sub['subCategory_name'];?></td>
                                    <td class="center"><?php echo $sub['semester_name'];?></td>
                                    <td class="center"><?php echo $sub['dep_tech'];?></td>
                                    <td class="center">
                                        <a style="padding:0px 5px" data-toggle="modal" href="#notlong" onclick="load_modal_data('<?php echo $sub['subject_id'];?>','subject/subject_editing/index/show','notlong')"><i class="icon-eye-open" title="دیدن جزئیات"></i></a>
                                        <a style="padding:0px 5px" data-toggle="modal" href="#notlong" onclick="load_modal_data('<?php echo $sub['subject_id'];?>','subject/subject_editing/index/edit','notlong')"><i class="icon-edit" title="اصلاح"></i></a>
                                        <a style="padding:0px 5px" data-toggle="modal" href="#notlong"><i class="icon-trash" title="حذف"></i></a>
                                    </td>
                                </tr>
                                <?php $number++; endforeach;?>  
                              </tbody>
                         </table>
                         <?php if($number<=$all_searched_subject){?>
                         <table class="table table-striped page">
                        <tbody><tr>
                            <td width="20%"><?php echo $total;?></td>
                            <td>
                            <?php echo $link;?>                    
                            </td>
                            <td style="text-align: left;">
                            تعداد مضمون درهرصفحه:
                            </td><td>
                                <?php echo $perPage;?>                   
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }?>
                    </div>
      
     </div>
    </div>
<!-- modal--> 
<div id="notlong" class="modal hide fade" tabindex="-1" data-replace="true" style="top:5%">
  </div>