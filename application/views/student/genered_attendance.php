   <!-- Default panel contents -->
      <div class="panel-heading">حاضری گروپ <?php echo $dep_exp;?> مضمون <?php echo $sub_name;?> از بابت سال تحصیلی<?php echo $year;?></div>
        <div class="input-area">
            <div class="shoqa-head" style="margin:0px">
                <ul>
                    <li style="text-align:right;width:32%"><img src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li style="width: 32%;">
                        <p class="head-name1">وزارت تحصیلات عالی</p>
                        <p class="head-name2">پوهنتون ( پولی تخنیک کابل )</p>
                        <p class="head-name3">پوهنحی ( انجنیری کمپیوتروانفورماتیک )</p>
                        <p class="head-name3">دیپارتمنت ( <?php echo $dep_name;?> )</p>
                    </li>
                    <li style="text-align: left;width:32%"><img src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                </ul>
                <p class="p-long head-name3" style="margin:0px">جدول حاضری صنف&nbsp;&nbsp;(<?php echo $class_num;?>)&nbsp;&nbsp;گروپ&nbsp;&nbsp;(<?php echo $dep_exp;?>)&nbsp;&nbsp;سمستر&nbsp;&nbsp;(<?php echo $semes_name;?>)&nbsp;&nbsp;رشته(<?php echo $dep_name;?>)سال تحصیلی&nbsp;&nbsp;(&nbsp;&nbsp;<?php echo $year;?>&nbsp;&nbsp;)&nbsp;&nbsp;مضمون(<?php echo $sub_name;?>)&nbsp;&nbsp;استاد(<?php echo $teacher_name;?>)</p>
            </div>
            <div class="shoqa-head" id="table-main" style="margin:0px">
                <table class="table-border table" id="result-table">
                    <thead>
                      <tr>
                        <th rowspan="2" class="text-rotate" style="vertical-align: middle"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>شماره</span></div></th>
                        <th colspan="2">شهرت</th>
                        <th rowspan="2" class="text-rotate" style="vertical-align: bottom;padding-bottom:60px"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>آدی محصل</span></div></th>
                        <th colspan="35" style="padding:0px;font-weight: bold;">ساعت درسی وایام تاریخ</th>
                      </tr>
                      <tr>
                        <th>اسم</th>
                        <th>ولد/بنت</th>
                        <?php $i=1;while($i<=28){?>
                        <th></th>
                        <?php $i++;} ?>
                        <th style="-webkit-transform:rotate(-90deg);padding:20px 0px">حاضر</th>
                        <th style="-webkit-transform:rotate(-90deg);padding:20px 0px">غیرحاضر</th>
                        <th style="-webkit-transform:rotate(-90deg);padding:20px 0px">ملاحظات</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $a=1;foreach($student as $st):?>
                        <tr>
                            <td><?php echo $a;?></td>
                            <td><?php echo $st['dari_name'];?></td>
                            <td><?php echo $st['dari_fName'];?></td>
                            <td style="font-size: 11px;"><?php echo $st['student_id'];?></td>
                            <?php $i=1;while($i<=28){?>
                            <td></td>
                            <?php $i++;} ?>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php $a++;endforeach;?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.row -->