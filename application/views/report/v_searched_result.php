   <div class="panel-heading" style="padding-left:80px"><a href="#" class="btn btn-setting" onclick="javascript:printDiv('list')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a> 
      راپور نتایچ<img id="loader" data="list" style="position: relative;top:100px;right:40%;z-index:1000;visibility: hidden" src="<?php echo base_url();?>images/ajax-loader.gif"></div>
                    <div class="box-content" style="padding:10px 20px" id="list">
<table class="table table-striped">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی محصل</th>
                                    <th>اسم</th>
                                    <th>ولد</th>
                                    <th>سمسترتحصیلی</th>
                                    <th>دیپارتمنت</th>
                                    <th>نتیجه</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php  foreach($student as $st):?>
                                <tr>
                                    <td class="center"><?php echo $number;?></td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $st['student_id'];?></td>
                                    <td class="center"><?php echo $st['dari_name'];?></td>
                                    <td class="center"><?php echo $st['dari_fName'];?></td>
                                    <td class="center"><?php echo $st['semester_name'];?></td>
                                    <td class="center"><?php echo $st['dep_expression'];?></td>
                                    <td class="center"><?php echo $st['resultState_name'];?></td>
                                </tr>
                                <?php $number++; endforeach;?>  
                              </tbody>
                         </table>
                         <?php if($number<=$all_searched_s){?>
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
                        <?php }?>
          </div>