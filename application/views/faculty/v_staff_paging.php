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