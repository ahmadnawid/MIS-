<div class="modal-header" style="background:#f28c38;padding-top:10px;border-radius:5px 5px 0 0;color:#fff">
    <img style="position: relative;top:200px;right:48%;display:none;z-index:2000" src="<?php echo base_url().'images/ajax-loader.gif'?>" id="modal-loader"/>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float:left;">×</button>
    <h4>معلومات مکمل مضمون</h4>
  </div>
  <div class="modal-body" style="max-height:450px;">
                        <table class="table table-striped" id="subject_data">
                                <tr>
                                    <td class="center">کودمضمون</td>
                                    <td style="border-right-width:0;font-size:12px"><?php echo $subject_info[0]['subject_id'];?></td>
                                </tr>
                               <tr>
                                    <td>نام مضمون به دری</td>
                                    <td><?php echo $subject_info[0]['sub_dari_name'];?></td>
                               </tr> 
                               <tr>
                                    <td>نام مضمون به انگلیسی</td>
                                    <td><?php echo $subject_info[0]['sub_english_name'];?></td>
                               </tr> 
                               <tr>
                                    <td>مخفف مضمون</td>
                                    <td><?php echo $subject_info[0]['sub_expresion'];?></td>
                               </tr> 
                               <tr>
                                    <td>تعداد کریدیت</td>
                                    <td><?php echo $subject_info[0]['sub_credit'];?></td>
                               </tr> 
                               <tr>
                                    <td>تعداد ساعات نظری</td>
                                    <td><?php echo $subject_info[0]['sub_theory_time'];?></td>
                               </tr> 
                                <tr>
                                    <td>تعداد ساعات عملی</td>
                                    <td><?php echo $subject_info[0]['sub_practice_time'];?></td>
                               </tr> 
                               <tr>
                                    <td>تعداد ساعات ستاژ</td>
                                    <td><?php echo $subject_info[0]['sub_staz_time'];?></td>
                               </tr>  
                               <tr>
                                    <td>مضمون پیشنیاز</td>
                                    <td><?php if($subject_info[0]['pishniaz']==''){ echo 'ندارد';}else{ echo $subject_info[0]['pishniaz'];}?></td>
                               </tr>
                               <tr>
                                    <td>کتگوری مضمون</td>
                                    <td><?php echo $subject_info[0]['subCategory_name'];?></td>
                               </tr>
                               <tr>
                                    <td>سمستر</td>
                                    <td><?php echo $subject_info[0]['semester_name'];?></td>
                               </tr>
                               <tr>
                                    <td>دیپارتمنت تدریس کننده</td>
                                    <td><?php echo $subject_info[0]['dep_tech'];?></td>
                               </tr>
                               <tr>
                                    <td>دیپارتمنت های که تدریس میشود</td>
                                    <td>
                                    <?php $a=1; foreach($subject_info[0]['dep_studay'] as $dep):
                                             echo $dep['dep_expression'];
                                             if($a<count($subject_info[0]['dep_studay']))
                                             {
                                                 echo ',';
                                             }
                                             $a++;
                                             endforeach;?>
                                     </td>
                               </tr>
                               <tr>
                                    <td>یاداشت</td>
                                    <td><?php echo $subject_info[0]['sub_memo'];?></td>
                               </tr>  
                        </table>
  </div>
  <div class="modal-footer">
    <button style="float:left;"  class="btn-reset" data-dismiss="modal">بسته کردن</button>
  </div>