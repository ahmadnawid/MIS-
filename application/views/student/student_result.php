<div class="panel-heading">جدول نتایج امتحان</div>
        <div class="input-area" >
            <div class="shoqa-head" id="result-sheet">
                <ul>
                    <li style="text-align:right;"><img style="margin-right:40px" src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li>
                        <p class="head-name2">جمهوری اسلامی افغانستان</h1>
                        <p class="head-name2" style="margin-bottom:10px;">وزارت تحصیلات عالی</p>
                        <p class="head-name2">پوهنتون پولی تخنیک کابل</p>
                        <p class="head-name2">پوهنحی انجنیری کمپیوتر وانفورماتیک</p>
                        <p class="head-name2">دیپارتمنت <?php echo $dep_name;?></p>
                    </li>
                    <li style="text-align: left"><img src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                    <li style="text-align:left;margin-right:38px">
                        <table class="table-border table samary-result">
                            <tr>
                                <td colspan="2">خلص نتایج</td>
                            </tr>
                            <tr>
                                <td>تعداد داخله</td>
                                <td>26</td>
                            </tr>
                            <tr>
                                <td>شامل امتحان</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>کامیاب</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>کریدت</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>کریدت اخطار</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ناکام</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>محروم</td>
                                <td>1</td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <h1 class="head-name1" id="result-h">جدول نتایج سیستم کریدیت - سمستر : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $semes_name;?><span class="space"></span>صنف :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $class_num;?><span class="space"></span> سال تحصیلی :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $year;?>&nbsp;&nbsp;</h1>
            </div>
            <div class="shoqa-head" id="table-main" style="margin-left:1px;position:relative;top:-43px">
                <table class="table-border table" id="result-table" style="border-top:1px solid #000000">
                    <thead>
                      <tr>
                        <th rowspan="4" class="text-rotate" style="vertical-align: middle"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>شماره</span></div></th>
                        <th colspan="2">شهرت</th>
                        <th colspan="<?php echo (count($subject)*2)+2;?>">تعداد مضامین و کریدتها</th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:50px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>مجموع کریدیت ها</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:20px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>مجموع کریدت های کامیاب شده</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:18px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>مجموع نمرات باضریب کریدیت</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>اوسط نمرات</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>GPA عمومی</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:80px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>نتیجه</span></div></th>
                        <th rowspan="4" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>معیار درجه</span></div></th>
                        <th colspan="2">ضوابط حاضری</th>
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
                        <th colspan="2" style="font-size: 12px;padding:0px 4px">تعداد کریدیتها</th>
                        <?php foreach($subject as $sub):?>
                        <th colspan="2" class="text-rotate" style="-webkit-transform:rotate(90deg)"><?php echo $sub['sub_credit'];?></th>
                        <?php endforeach;?>
                      </tr>
                      <tr>
                        <th class="text-rotate" style="padding:15px 0px;font-size:13px; vertical-align: bottom"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>ID No</span></div></th>
                        <th class="text-rotate" style="padding:17px 0px;font-size:13px;vertical-align: bottom"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>چانس</span></div></th>
                        <?php foreach($subject as $sub):?>
                        <th class="text-rotate" style="padding:5px 0px;font-size:13px;vertical-align: bottom;height: 57px"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>نمره مضمون</span></div></th>
                        <th class="text-rotate" style="padding:17px 0px;font-size:13px;vertical-align: bottom;text-align: center"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>GPA</span></div></th>
                        <?php endforeach;?>
                      </tr>
                    </thead>
                    <tbody style="font-size:11px;">
                    <?php $a=1; foreach($student_result as $result_sub):?>
                    <tr>
                        <td rowspan="3"><?php echo $a;?></td>
                        <td rowspan="3"><?php echo $result_sub['dari_name'];?></td>
                        <td rowspan="3"><?php echo $result_sub['dari_fName'];?></td>
                        <td rowspan="3" style="padding: 0px 5px 5px 5px;vertical-align: bottom"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span><?php echo $result_sub['student_id'];?></span></div></td>
                        <td>1</td>
                        <?php foreach($result_sub['score'] as $score):?>
                        <td style="<?php if($score['first_chance_score']<55): echo 'background-color:gray';endif;?>"><?php echo $score['first_chance_score'];?></td>
                        <td>
                            <?php if($score['first_chance_score']>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($score['first_chance_score']>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($score['first_chance_score']>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($score['first_chance_score']>=55)
                                  {
                                      echo 'D';
                                  }
                                  else
                                  {
                                      echo 'F';
                                  }
                                  ?>
                        </td>
                        <?php endforeach;?>
                        <td><?php echo $total_credit;?></td>
                        <td><?php echo $result_sub['success_credit'];?></td>
                        <td rowspan="3"><?php echo $result_sub['sum_score'];?></td>
                        <?php $ave_score = round($result_sub['sum_score']/$total_credit,2); ?>
                        <td rowspan="3"><?php echo $ave_score;?></td>
                        <td rowspan="3">
                           <?php 
                                if($ave_score>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($ave_score>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($ave_score>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($ave_score>=55)
                                  {
                                      echo 'D';
                                  }
                                  else
                                  {
                                      echo 'F';
                                  }
                           ?>
                        </td>
                        <td>
                            <?php if($result_sub['first_chance_result']!=NULL)
                                  {
                                    echo $result_sub['first_chance_result'];
                                  }
                            ?>
                        </td>
                        <td></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <?php foreach($result_sub['score'] as $score):?>
                        <td><?php if($score['second_chance_score']>0)
                                    {
                                      echo $score['second_chance_score'];
                                    }
                                    else
                                    {
                                        echo '';
                                    }
                            ?>
                        <td>
                            <?php if($score['second_chance_score']>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($score['second_chance_score']>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($score['second_chance_score']>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($score['second_chance_score']>=55)
                                  {
                                      echo 'D';
                                  }
                                  else
                                  {
                                      echo 'F';
                                  }
                                  ?>
                        </td>
                        <?php endforeach;?>
                        <td></td>
                        <td><?php if($result_sub['secondChance_credit']!=0 and $result_sub['secondChance_credit']!=''): echo $result_sub['secondChance_credit']; endif;?></td>
                        <td><?php if($result_sub['second_chance_result']!=NULL){echo $result_sub['second_chance_result'];}?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <?php foreach($result_sub['score'] as $score):?>
                        <td><?php if($score['third_chance_score']>0)
                                    {
                                      echo $score['third_chance_score'];
                                    }
                                    else
                                    {
                                        echo '';
                                    }
                            ?></td>
                        <td>
                            <?php if($score['third_chance_score']>=90)
                                  {
                                     echo 'A';    
                                  }
                                  else if($score['third_chance_score']>=80)
                                  {
                                      echo 'B';
                                  }
                                  else if($score['third_chance_score']>=70)
                                  {
                                      echo 'C';
                                  }
                                  else if($score['third_chance_score']>=55)
                                  {
                                      echo 'D';
                                  }
                                  else
                                  {
                                      echo 'F';
                                  }
                                  ?>
                        </td>
                        <?php endforeach;?>
                        <td></td>
                        <td><?php if($result_sub['thirdChance_credit']!=0 and $result_sub['thirdChance_credit']!=''): echo $result_sub['thirdChance_credit']; endif;?></td>
                        <td><?php if($result_sub['third_chance_result']!=NULL){echo $result_sub['third_chance_result'];}?></td>
                        <td></td>
                    </tr>
                    <?php $a++;endforeach;?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.row -->