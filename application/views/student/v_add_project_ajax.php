 <form method="post" class="navbar-form navbar-left" action="<?php echo base_url();?>student/deploma_project/add_st_project">
                        <table class="table table-striped table-condensed">
                              <thead>
                                  <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی محصل</th>
                                    <th>اسم</th>
                                    <th>ولد</th>
                                    <th>موضوع پروژه دیپلوم</th>
                                    <th>موضوع پروژه دیپلوم به انگلیسی</th>
                                    <th>استاد رهنما</th>
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
                                    </td>
                                    <td class="center">
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
                                </tr>
                                <?php $a++; endforeach;?>  
                              </tbody>
                         </table>
                         <div class="search-button">
                            <button type="submit" class="btn-add">اضافه کردن</button>
                            <button type="reset" class="btn-reset">پاک کردن</button>
                         </div>