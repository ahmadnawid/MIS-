 <table class="table table-striped">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">کود مضمون</th>
                                    <th>نام مضمون به دری</th>
                                    <th>نام مضمون به انگلیسی</th>
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