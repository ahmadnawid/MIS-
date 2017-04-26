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
                                    <th>حالت</th>
                                    <th>معلومات مکمل</th>
                                </tr>
                              </thead>   
                              <tbody>
                                <?php foreach($student as $st):?>
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
                            </td>
                            <td><?php echo $perPage;?></td>
                        </tr>
                    </tbody>
                </table>
