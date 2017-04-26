<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">قورم جستجو کارمندان پوهنحی
            <img id="loader" data="searched_staff" style="position: relative;top:250px;right:32%;z-index:1000;visibility:hidden" src="<?php echo base_url();?>images/ajax-loader.gif">
      </div>
            <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="search_staff">
                <div class="box-search">
                    <div class="box">
                        مشخصه
                        <div class="input-append">
                            <input type="text" name="staff_id" placeholder="آدی یا نام را وارد کنید..."/>
                        </div>
                    </div>
                    <div class="box">
                        درجه تحصیلی
                        <div class="input-append">
                            <select name="edu_degree" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="" selected="selected">همه</option>
                                <?php foreach($edu_degree as $e):?>
                                <option value="<?php echo $e['edu_degree_id'];?>"><?php echo $e['edu_degree_name'];?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div> 
                    <div class="box">
                        رتبه علمی
                        <div class="input-append">
                            <select name="knowllage_degree" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="" selected="selected">همه</option>
                                <?php foreach($knowllage_degree as $k):?>
                                <option value="<?php echo $k['knowllage_degree_id'];?>"><?php echo $k['knowllage_degree_name'];?></option>
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
                    <button type="button" class="btn-add" onclick="load_data('search_staff','faculty/stuff/s_staff','searched_staff')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
        
        </div>
<div class="panel panel-default" style="margin-top:10px;" id="searched_staff">
      <!-- Default panel contents -->
      <div class="panel-heading" style="padding-left:80px"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
      لیست کارمندان پوهنحی</div>
                    <div class="box-content" style="padding:10px 20px" id="list">
                        <table class="table table-striped">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی</th>
                                    <th>اسم</th>
                                    <th>تخلص</th>
                                    <th>شماره تلفون</th>
                                    <th>آدرس ایمیل</th>
                                    <th>درجه تحصیلی</th>
                                    <th>رتبه علمی</th>
                                    <th>دیپارتمنت</th>
                                    <th>معلومات مکمل</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php  foreach($staff as $st):?>
                                <tr>
                                    <td class="center"><?php echo $number;?></td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $st['staff_id'];?></td>
                                    <td class="center"><?php echo $st['dari_name'];?></td>
                                    <td class="center"><?php echo $st['dari_lName'];?></td>
                                    <td class="center"><?php echo $st['phone_number'];?></td>
                                    <td class="center"><?php echo $st['email'];?></td>
                                    <td class="center"><?php echo $st['edu_degree_name'];?></td>
                                    <td class="center"><?php echo $st['knowllage_degree'];?></td>
                                    <td class="center"><?php echo $st['department'][0]['dep_name'].'('.$st['department'][0]['dep_expression'].')';?></td>
                                    <td class="center">
                                          <a data-toggle="modal" href="#full-width" onclick="load_modal_data('<?php echo $st['s_id'];?>','faculty/stuff/staff_info_details','full-width')">جزئیات</a>
                                    </td>
                                </tr>
                                <?php $number++; endforeach;?>  
                              </tbody>
                         </table>
                         <?php if($all_staff>$number):?>
                         <table class="table table-striped page">
                        <tbody><tr>
                            <td width="20%"><?php echo $total;?></td>
                            <td>
                            <?php echo $link;?>                    
                            </td>
                            <td style="text-align: left;">
                            تعداد کارمند درهرصفحه:
                            </td><td>
                                <?php echo $perPage;?>                   
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endif;?>
                    </div>
      
     </div>
    </div>
<!-- modal--> 
<!-- modal--> 
<div id="full-width" class="modal hide fade" tabindex="-1" style="width:80%;left:30%;background: #f7f6f6;">
</div>
