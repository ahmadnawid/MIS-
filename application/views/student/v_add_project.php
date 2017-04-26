<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">فورم جستجو</div>
            <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="search_dep_project">
                <div class="box-search">              
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
                    <button type="button" class="btn-add" onclick="load_data('search_dep_project','student/deploma_project/add_department_project','list')">جستجوکردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
</div>
<div class="panel panel-default" style="margin-top:10px;" id="search_student">
      <!-- Default panel contents -->
      <div class="panel-heading" style="padding-left:80px"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
      لیست محصلین فاکولته<img id="loader" data="list" style="position: relative;top:100px;right:40%;z-index:1000;visibility: hidden" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
                    <div class="box-content" style="padding:10px 20px" id="list">
                    <form method="post" class="navbar-form navbar-left" action="<?php echo base_url();?>student/deploma_project/add_st_project">
                        <table class="table table-striped table-condensed">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی محصل</th>
                                    <th>اسم</th>
                                    <th>ولد</th>
                                    <th>موضوع پروژه دیپلوم</th>
                                    <th>استاد رهنما</th>
                                    <th>تاریخ فراغت</th>
                                    <th>نمره</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php $a=1;  foreach($student as $st):?>
                                <tr>
                                    <td class="center"><?php echo $a;?></td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $st['student_id'];?></td>
                                    <td class="center"><?php echo $st['dari_name'];?></td>
                                    <td class="center"><?php echo $st['dari_fName'];?></td>
                                    <td class="center">
                                    <input type="hidden" name="student_project[]" value="<?php echo $st['student_id'];?>">
                                     <input class="form-control input-fix" type="text" name="pdn_<?php echo $st['student_id'];?>" value="<?php if(count($st['project_data'])!=0){ echo $st['project_data'][0]['project_dari_name'];} ?>">
                                     <input class="form-control input-fix" type="text" name="pen_<?php echo $st['student_id'];?>" value="<?php if(count($st['project_data'])!=0){ echo $st['project_data'][0]['project_english_name'];} ?>">
                                    </td>
                                    <td class="center">
                                        <select class="form-control input-fix" data-rel="chosen" name="ptn_<?php echo $st['student_id'];?>">
                                            <option value="0">انتخاب نمایید</option>
                                            <?php foreach($teacher as $t):?>
                                              <option <?php if(count($st['project_data'])){ if($t['s_id']==$st['project_data'][0]['teacher_id']){?> selected="selected"<?php }}?> value="<?php echo $t['s_id'];?>"><?php echo 'استاد'.' '.$t['dari_name'].' '.$t['dari_lName'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td class="center"><input class="form-control input-fix" type="text" name="gd_<?php echo $st['student_id'];?>" value="<?php if(count($st['project_data'])!=0){ echo $st['project_data'][0]['graduated_date'];}?>" placeholder="دری"/>
                                        <input class="form-control input-fix" type="text" name="dgd_<?php echo $st['student_id'];?>" value="<?php if(count($st['project_data'])!=0){ echo $st['project_data'][0]['dari_graduated_date'];}?>" placeholder="انگلیسی"/>
                                    </td>
                                    <td class="center"><input class="form-control input-fix" type="text" name="score_<?php echo $st['student_id'];?>" value="<?php if(count($st['project_data'])!=0){ echo $st['project_data'][0]['score'];}?>"/></td>
                                </tr>
                                <?php $a++; endforeach;?>  
                              </tbody>
                         </table>
                         <div class="search-button">
                            <button type="submit" class="btn-add">اضافه کردن</button>
                            <button type="reset" class="btn-reset">پاک کردن</button>
                         </div>
                    </div>
      
     </div>
</div>