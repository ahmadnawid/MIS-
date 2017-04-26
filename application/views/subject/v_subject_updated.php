<?php if(isset($error)){echo $error;}?>
                      <form method="post" id="editing_subject">
                        <table class="table table-striped" id="subject_data">
                               <tr>
                                    <td>مخفف مضمون</td>
                                    <td><input type="text" name="s_expresion" class="edit" value="<?php echo $subject_info[0]['sub_expresion'];?>"/></td>
                               </tr> 
                               <tr>
                                    <td>تعداد کریدیت</td>
                                    <td><input type="text" name="s_credit" class="edit" value="<?php echo $subject_info[0]['sub_credit'];?>"/></td>
                               </tr> 
                               <tr>
                                    <td>تعداد ساعات نظری</td>
                                    <td><input type="text" name="s_theory_time" class="edit" value="<?php echo $subject_info[0]['sub_theory_time'];?>"/></td>
                               </tr> 
                                <tr>
                                    <td>تعداد ساعات عملی</td>
                                    <td><input type="text" name="s_practice_time" class="edit" value="<?php echo $subject_info[0]['sub_practice_time'];?>"/></td>
                               </tr> 
                               <tr>
                                    <td>تعداد ساعات ستاژ</td>
                                    <td><input type="text" name="s_staz_time" class="edit" value="<?php echo $subject_info[0]['sub_staz_time'];?>"/></td>
                               </tr>  
                               <tr>
                                    <td>مضمون پیشنیاز</td>
                                    <td><select name="s_pesh" data-rel="chosen" class="dropdown-select edit">
                                            <option value="0">ندارد</option>
                                            <?php foreach($subject as $s):?>
                                            <option <?php if($subject_info[0]['sub_pishniaz']==$s['subject_id']){echo 'selected="selected"';}?> value="<?php echo $s['subject_id'];?>"><?php echo $s['sub_dari_name'];if($s['sub_expresion']){echo '('.$s['sub_expresion'].')';}?></option>
                                            <?php endforeach;?>
                                            </select>
                               </tr>
                               <tr>
                                    <td>کتگوری مضمون</td>
                                    <td><select name="s_cat" data-rel="chosen" class="dropdown-select edit">
                                            <?php foreach($sub_category as $s):?>
                                            <option <?php if($subject_info[0]['subCategory_id']==$s['subCategory_id']){echo 'selected="selected"';}?> value="<?php echo $s['subCategory_id'];?>"><?php echo $s['subCategory_name'];?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </td>
                               </tr>
                               <tr>
                                    <td>سمستر</td>
                                    <td><select name="s_semester" data-rel="chosen" class="dropdown-select edit">
                                            <?php foreach($semester as $s):?>
                                            <option <?php if($subject_info[0]['semester_id']==$s['semester_id']){echo 'selected="selected"';}?> value="<?php echo $s['semester_id'];?>"><?php echo 'سمستر'.$s['semester_name'];?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </td>
                               </tr>
                               <tr>
                                    <td>دیپارتمنت تدریس کننده</td>
                                    <td><select name="s_dep_teach" data-rel="chosen" class="dropdown-select edit">
                                            <?php foreach($department as $s):?>
                                            <option <?php if($subject_info[0]['lecturer_dep']==$s['dep_id']){echo 'selected="selected"';}?> value="<?php echo $s['dep_id'];?>"><?php echo $s['dep_name'];?></option>
                                            <?php endforeach;?>
                                            </select>
                                    </td>
                               </tr>
                               <tr>
                                    <td>دیپارتمنت های که تدریس میشود</td>
                                    <td><select name="dep_study[]" multiple="multiple" id="dep_study" size="3" class="edit">
                                            <?php foreach($department as $d):?>
                                           <option <?php
                                                       foreach($subject_info[0]['dep_studay'] as $ss):
                                                            if($ss['dep_id']==$d['dep_id']){echo 'selected="selected"';}
                                                        endforeach;?> value="<?php echo $d['dep_id'];?>"><?php echo $d['dep_name'];?></option>
                                           <?php  endforeach;?>
                                           </select>
                                     </td>
                               </tr>
                                <tr>
                                    <td>یاداشت</td>
                                    <td><textarea cols="" rows="3" name="s_memo" class="edit"><?php echo $subject_info[0]['sub_memo']?></textarea>
                                    </td>
                               </tr>  
                        </table>
                        <input type="hidden" value="<?php echo $subject_info[0]['subject_id'];?>" name="identity"/>
                        </form>