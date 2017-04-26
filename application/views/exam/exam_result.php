<div class="panel-heading" style="padding-left: 80px;">نتیجه جستجوی شما
    <a href="#" class="btn btn-setting" onclick="javascript:printDiv('print_result')" style="float:left;padding:0px;margin:0px;background: none;border:none"><i class="icon-print"></i></a>
</div>
        <div class="input-area" id="print_result">
        <div style="background: #fff;padding-left:40px;">
            <div class="shoqa-head" id="result-sheet">
                <ul>
                    <li style="text-align:right;width:15%;margin-left:30px"><img style="margin-right:40px" src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li style="width:30%">
                        <p class="head-name2">جمهوری اسلامی افغانستان</h1>
                        <p class="head-name2" style="margin-bottom:10px;">وزارت تحصیلات عالی</p>
                        <p class="head-name2">پوهنتون پولی تخنیک کابل</p>
                        <p class="head-name2">پوهنحی انجنیری کمپیوتر وانفورماتیک</p>
                        <p class="head-name2">دیپارتمنت <?php echo $dep_name;?></p>
                    </li>
                    <li style="text-align: left;width:15%"><img src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                    <li style="text-align:left;width:31%;margin-right:45px;">
                        <table class="table-border table samary-result">
                            <tr>
                                <td colspan="2">خلص نتایج</td>
                            </tr>
                            <tr>
                                <td>کامیاب</td>
                                <td><?php echo $success;?></td>
                            </tr>
                            <tr>
                                <td>اخطار</td>
                                <td><?php echo $danger;?></td>
                            </tr>
                            <tr>
                                <td>تکرار سمستر</td>
                                <td><?php echo $next_year;?></td>
                            </tr>
                            <tr>
                                <td>اخراج دایمی</td>
                                <td><?php echo $get_out;?></td>
                            </tr>
                            <tr>
                                <td>مجموعه</td>
                                <td><?php echo $success+$danger+$next_year+$get_out;?></td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <h1 class="head-name1" id="result-h" style="font-size:20px;width:70%">جدول نتایج سیستم کریدیت - سمستر : &nbsp;&nbsp;<?php echo $semes_name;?><span class="space"></span>صنف :&nbsp;&nbsp;<?php echo $class_num;?><span class="space"></span> سال تحصیلی :&nbsp;&nbsp;<?php echo $year;?>&nbsp;&nbsp;</h1>
            </div>
            <div class="shoqa-head" id="table-main" style="position:relative;top:-43px;border:none;margin-left:0px">
                <table class="table-border table" id="result-table" style="border:1px solid #000000;margin:0 10px">
                    <thead>
                      <tr>
                        <th rowspan="4" class="text-rotate" style="vertical-align: middle;padding:5px;"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>شماره</span></div></th>
                        <th colspan="2">شهرت</th>
                        <th colspan="<?php echo (count($subject)*2)+2;?>">تعداد مضامین و کریدتها</th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:50px;padding:5px 10px 60px 10px"><div style="width:10px;-webkit-transform:rotate(90deg);"><span>مجموع کریدیت ها</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:20px;padding:5px 10px 50px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>مجموع کریدت های کامیاب شده</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:18px;padding:5px 10px 50px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>مجموع نمرات باضریب کریدیت</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px;padding:5px 10px 70px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>اوسط نمرات</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px;padding:5px 10px 60px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>GPA عمومی</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:80px;padding:5px 10px 70px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>نتیجه</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px;padding:5px 10px 60px 10px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>معیار درجه</span></div></th>
                        <th colspan="2" style="padding: 0px;">ضوابط حاضری</th>
                        <th rowspan="4" class="text-rotate">ملاحظات</th>
                      </tr>
                      <tr>
                        <th rowspan="3">اسم</th>
                        <th rowspan="3">ولد</th>
                        <th colspan="2" class="text-rotate" style="height:50px;font-weight: bold"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>مضامین</span></div></th>
                        <?php foreach($subject as $sub):?>
                        <th colspan="2" class="text-rotate" style="height:100px;vertical-align: bottom"><div style="width:20px;-webkit-transform:rotate(90deg);"><span><?php echo $sub['sub_dari_name'];?></span></div></th>
                        <?php endforeach;?>
                        <th rowspan="3" class="text-rotate" style="vertical-align: bottom;padding-bottom:70px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>حاضر</span></th>
                        <th rowspan="3" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>غیرحاضر</span></th>
                      </tr>
                      <tr>
                        <th colspan="2" style="font-size: 12px;padding:0px">تعداد کریدیتها</th>
                        <?php foreach($subject as $sub):?>
                        <th colspan="2" class="text-rotate" style="-webkit-transform:rotate(90deg)"><?php echo $sub['subject_credit'];?></th>
                        <?php endforeach;?>
                      </tr>
                      <tr>
                        <th class="text-rotate" style="padding:10px 0px;font-size:13px; vertical-align: bottom"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>ID No</span></div></th>
                        <th class="text-rotate" style="padding:10px 0px;font-size:13px;vertical-align: bottom"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>چانس</span></div></th>
                        <?php foreach($subject as $sub):?>
                        <th class="text-rotate" style="padding:5px 0px;font-size:13px;vertical-align: bottom;height: 57px"><div style="width: 30px;-webkit-transform:rotate(90deg);"><span>نمره مضمون</span></div></th>
                        <th class="text-rotate" style="padding:17px 0px;font-size:13px;vertical-align: bottom;text-align: center"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>GPA</span></div></th>
                        <?php endforeach;?>
                      </tr>
                    </thead>
                    <tbody style="font-size:11px;">
                    <?php $a=1; foreach($student_result as $s_result):?>
                    <tr>
                        <td rowspan="3"><?php echo $a;?></td>
                        <td rowspan="3"><?php echo $s_result['dari_name'];?></td>
                        <td rowspan="3"><?php echo $s_result['dari_fName'];?></td>
                        <td rowspan="3" style="padding: 0px 5px 5px 5px;vertical-align: bottom"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span style="font-size: 10px"><?php echo $s_result['student_id'];?></span></div></td>
                        <td>1</td>
                        <?php for($i=0;$i<count($s_result['score1']);$i++):?>
                        <td style="<?php if($s_result['score1'][$i]<55): echo 'background-color:#f7f6f6';endif;?>"><?php echo $s_result['score1'][$i];?></td>
                        <td>
                            <?php if($s_result['score1'][$i]>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($s_result['score1'][$i]>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($s_result['score1'][$i]>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($s_result['score1'][$i]>=55)
                                  {
                                      echo 'D';
                                  }
                                  else
                                  {
                                      echo 'F';
                                  }
                                  ?>
                        </td>
                        <?php endfor;?>
                        <td><?php echo $total_credit; ?></td>
                        <td><?php echo $s_result['success_credit'];?></td>
                        <td rowspan="3"><?php echo $s_result['sum_score'];?></td>
                        <td rowspan="3"><?php echo $s_result['average'];?></td>
                        <td rowspan="3">
                           <?php 
                                  if($s_result['average']>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($s_result['average']>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($s_result['average']>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($s_result['average']>=55)
                                  {
                                      echo 'D';
                                  }
                                  else if($s_result['average']<55 and $s_result['average']>0)
                                  {
                                      echo 'F';
                                  }
                                  else
                                  {
                                      echo '';
                                  }
                           ?>
                        </td>
                        <td style="<?php if($s_result['result_state']==6){echo 'background-color:red;color:#fff';}?>">
                            <?php echo $s_result['resultState_name'];?>
                        </td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <?php for($i=0;$i<sizeof($s_result['score2']);$i++):?>
                        <td style="<?php if($s_result['score2'][$i]<55 && $s_result['score2'][$i]!=''): echo 'background-color:#ddd';endif;?>">
                            <?php if($s_result['score2'][$i]>0)
                                    {
                                      echo $s_result['score2'][$i];
                                    }
                            ?>
                        <td>
                            <?php if($s_result['score2'][$i]>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($s_result['score2'][$i]>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($s_result['score2'][$i]>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($s_result['score2'][$i]>=55)
                                  {
                                      echo 'D';
                                  }
                                  else if($s_result['score2'][$i]<55 and $s_result['score2'][$i]>=0)
                                  {
                                      echo 'F';
                                  }
                                  else
                                  {
                                      echo '';
                                  }
                                  ?>
                        </td>
                        <?php endfor;?>
                        <td></td>
                        <td><?php if($s_result['success_credit2']!=0 and $s_result['success_credit2']!=''): echo $s_result['success_credit2']; endif;?></td>
                        <td style="<?php if($s_result['sChanceR_id']==6){echo 'background-color:red;color:#fff';}?>"><?php echo $s_result['sChanceR'];?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <?php for($i=0;$i<count($s_result['score3']);$i++):?>
                        <td style="<?php if($s_result['score3'][$i]<55 && $s_result['score3'][$i]!=''): echo 'background-color:#000101';endif;?>">
                           <?php if($s_result['score3'][$i]>0)
                                    {
                                      echo $s_result['score3'][$i];
                                    }
                            ?>
                        </td>
                        <td>
                            <?php
                                  if($s_result['score3'][$i]>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($s_result['score3'][$i]>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($s_result['score3'][$i]>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($s_result['score3'][$i]>=55)
                                  {
                                      echo 'D';
                                  }
                                  else if($s_result['score3'][$i]<55 and $s_result['score3'][$i]>=0)
                                  {
                                      echo 'F';
                                  }
                                  else
                                  {
                                      echo '';
                                  }
                                  ?>
                        </td>
                        <?php endfor;?>
                        <td></td>
                        <td><?php if($s_result['success_credit3']!=0 and $s_result['success_credit3']!=''): echo $s_result['success_credit3']; endif;?></td>
                        <td style="<?php if($s_result['tChanceR_id']==6){echo 'background-color:red;color:#fff';}?>"><?php echo $s_result['tChanceR'];?></td>
                    </tr>
                    <?php $a++;endforeach;?>
                    </tbody>
                </table>
            </div>
            </div>
        </div><!-- /.row -->