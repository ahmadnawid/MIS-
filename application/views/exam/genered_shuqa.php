   <!-- Default panel contents -->
      <div class="panel-heading" style="padding-left:80px">
      <a href="#" class="btn btn-setting" onclick="javascript:printDiv('print_s')" style="float:left;padding:0px;margin:0px;background: none;border:none">
       <i class="icon-print"></i>
      </a>نتیجه جستجوی شما</div>
        <div class="input-area" id="print_s">
         <?php foreach($edu_year_course as $edu):?> 
           <?php /*$page=1;$number=1;$index=0;
           if(count($edu['result'])<35){$page=0;}
           while($page<=(count($edu['result'])/35)){*/if(count($edu['result'])>0){
               $num=1; $x=1;while($x<=ceil(count($edu['result'])/35)):
               if(count($edu['result'])<=12){?>
               <div style="padding:20px 20px 40px 20px;height:400px;">
               <?php } else{ ?>
           <div style="padding:20px 20px 40px 20px;height:900px;">
           <?php }?>
            <div class="shoqa-head" style="margin:0px">
                <ul>
                    <li style="width:15%" style="text-align:left;width:15%"><img src="<?php echo base_url();?>img/afghanistan.jpg" data="logo" style="width:90px"/></li>
                    <li style="width:10%"><span class="span-right" style="font-weight: bold"><?php echo $chance;?></span></li>
                    <li style="width:35%">
                        <p class="head-name1" style="font-size: 18px;">وزارت تحصیلات عالی</p>
                        <p class="head-name2" style="font-size: 15px;">پوهنتون ( پولی تخنیک کابل )</p>
                        <p class="head-name3" style="font-size: 15px;">پوهنحی ( انجنیری کمپیوتروانفورماتیک )</p>
                        <p class="head-name3">گروپ ( <?php echo $edu['dep_expression'].ceil($edu['semester_id']/2);?> )</p>
                        <p class="head-name1" style="margin-top:4px;">شقه امتحان</p>
                    </li>
                    <li style="width:20%"><span class="span-left" style="padding:5px 10px"><?php echo 'مضمون<br>'.$edu['subject_name'];?></span></li>
                    <li style="width:15%" style="text-align: left"><img src="<?php echo base_url();?>img/faculty.png" data="logo" style="width:90px"/></li>
                </ul>
                <p class="p-long head-name3" style="margin-bottom: 0px">استاد (<span class="space"><?php echo $edu['teacher_name'];?></span>)&nbsp;&nbsp;صنف&nbsp;&nbsp;(  <?php echo $edu['class_number'];?>    &nbsp;&nbsp;&nbsp;&nbsp; )&nbsp;&nbsp;سمستر&nbsp;&nbsp;( <?php echo $edu['semester_name'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)&nbsp;&nbsp;سال تحصیلی&nbsp;&nbsp;(&nbsp;&nbsp;<?php echo $year;?>&nbsp;&nbsp;)</p>
            </div>
            <div class="shoqa-head" id="table-main" style="margin:0px;">
                <table class="table-border table" id="shoqa-table">
                    <thead>
                      <tr>
                        <th style="padding:5px 0px;-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg)">شماره</th>
                        <th style="padding:5px 0px">اسم</th>
                        <th style="padding:5px 0px">ولد/بنت</th>
                        <th style="padding:5px 0px">فعالیت صنفی وحاضری (10%)</th>
                        <th style="padding:5px 0px">کارعملی وخانگی (10%)</th>
                        <th style="padding:5px 0px">ارزیابی وسط سمستر (20%)</th>
                        <th style="padding:5px 0px">ارزیابی نهایی (60%)</th>
                        <th style="padding:5px 0px">مجموعه نمرات</th>
                        <th style="padding:5px 0px">ملاحظات</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php while($num<=count($edu['result'])):?>
                      <tr>
                        <td style="padding: 0px;"><?php echo $num;?></td>
                        <td style="padding: 0px;"><?php echo $edu['result'][$num-1]['dari_name'];?></td>
                        <td style="padding: 0px;"><?php echo $edu['result'][$num-1]['dari_fName'];?></td>
                        <td style="padding: 0px;"></td>
                        <td style="padding: 0px;"></td>
                        <td style="padding: 0px;"></td>
                        <td style="padding: 0px;"><?php echo $edu['result'][$num-1]['score'];?></td>
                        <td style="padding: 0px;"><?php echo $edu['result'][$num-1]['score'];?></td>
                        <td style="padding: 0px;"></td>
                      </tr>
                      <?php /*$number++;$index++; if($index>=35){break;} */ $num++;
                      if($num>35*$x){ break;}
                      endwhile;?>
                    </tbody>
                </table>
            </div><!-- /.row -->
            <p class="p-long head-name3" style="margin-bottom: 0px;margin-top:10px">امضای ممتحن: (<span class="space" style="padding-right:8%"></span>)&nbsp;&nbsp;امضای ممیز:&nbsp;&nbsp;(<span class="space" style="padding-right:8%"></span>)&nbsp;&nbsp;امضای امردیپارتمنت:&nbsp;&nbsp;(<span class="space" style="padding-right:8%"></span>)&nbsp;&nbsp;</p>
            </div> 
            <?php $x++; endwhile;?>
        <?php }?>
        <?php endforeach;?>
        </div>
        <div class="search-button" style="margin:0px;padding:20px 40px 20px 40px;background:#e5e5e5;">
                    <button type="button" class="btn-add" onclick="javascript:printDiv('print_s')">چاپ کردن</button>
            </div>