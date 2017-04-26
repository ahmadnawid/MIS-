        <div class="input-area" style="padding-top:1px" id="print_t">
        <?php foreach($student as $st):?>
            <div class="shoqa-head" id="result-sheet">
                <ul style="margin-bottom:20px;padding-top:25px">
                    <li style="text-align:left;margin-right:38px;width:25%">
                         <table class="table-border table samary-result" style="border: 1px solid #000;">
                            <tr>
                                <td>آدی</td>
                                <td style="font-size: 12px"><?php echo $st['student_id'];?></td>
                            </tr>
                            <tr>
                                <td>اسم</td>
                                <td><?php echo $st['dari_name'];?></td>
                            </tr>
                            <tr>
                                <td>ولد</td>
                                <td><?php echo $st['dari_fName'];?></td>
                            </tr>
                            <tr>
                                <td>پوهنحی</td>
                                <td>انجنیری کمپیوتروانفورماتیک</td>
                            </tr>
                            <tr>
                                <td>دیپارتمنت ورشته</td>
                                <td><?php echo $st['dep_name'].' '.$st['dep_expression'];?></td>
                            </tr>
                            <tr>
                                <td>تاریخ شمول</td>
                                <td><?php echo $st['university_entry_year'];?></td>
                            </tr>
                            <tr>
                                <td>تاریخ فراغت</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['graduated_date'];}?></td>
                            </tr>
                        </table>
                    </li>
                    <li style="text-align:left;width:7%"><img style="width:80px;height:70px" src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li style="width:20%">
                        <p class="head-name2">جمهوری اسلامی افغانستان</h1>
                        <p class="head-name2">وزارت تحصیلات عالی</p>
                        <p class="head-name2">پوهنتون پولی تخنیک کابل</p>
                        <p class="head-name2">معاونیت امور محصلان</p>
                        <p class="head-name2" style="margin-bottom:23px; font-weight: bold;">پوهنحی انجنیری کمپیوتر وانفورماتیک</p>
                        <p class="head-name2" style="text-decoration: underline;font-weight: bold;font-size: 20px;">ترانسکریپت نمرات مجصلان</p>
                    </li>
                    <li style="text-align:right;width:7%"><img style="width:80px;height:70px" src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                    <li style="text-align:left;margin-right:20px;width:30%;">
                        <table class="table-border table samary-result">
                            <tr>
                                <td>نمبرتذکره</td>
                                <td><?php echo $st['tazkira_number'];?></td>
                                <td rowspan="5"><div style="width:120px"><img src="<?php if($st['photo']!=''){ echo base_url().$st['photo'];}else{ echo base_url().'img/default-photo.png';}?>" alt="photo"/>
                                </div></td>
                            </tr>
                            <tr>
                                <td>محل تولد</td>
                                <td><?php echo $st['prov_name'][0]['prov_name'];?></td>
                            </tr>
                            <tr>
                                <td>تاریخ تولد</td>
                                <td><?php echo $st['dateOfBirth'];?></td>
                            </tr>
                            <tr>
                                <td>موضوع پروژه دیپلوم</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['project_dari_name'];}?></td>
                            </tr>
                            <tr>
                                <td>تاریخ دفاع دیپلوم</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['graduated_date'];}?></td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <table class="table-border table" id="result-table" style="border: 1px solid #000;width:92%;margin-right:38px;margin-bottom: 30px;">
                    <tbody>
                      <tr>
                        <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td colspan="6" style="text-align: center;width:25%">سمستر<?php echo $st['edu_year_semesters'][$edu['edu_year']][$c]['semester_name'].' سال'.'('.$edu['edu_year'].')';?></td>
                        <?php 
                            }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <tr>
                      <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td rowspan="2"><div style="padding:35px 0px">مضامین</div></td>
                        <td colspan="3">نمره</td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:0px 5px 30px 0px;font-size:14px"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>تعدادکریدیت</span></div></td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:0px 5px 10px 0px;font-size:14px;"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>کتگوری</span></div></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <tr>
                       <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                             for($c=1;$c<=2;$c++){
                        ?>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس اول</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس دوم</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس سوم</span></div></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <?php $i=0; while($i<$st['max_semester_sub']){?>
                      <tr>
                        <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;"><?php echo $st[$edu['edu_year']][$c][$i]['sub_dari_name']?></td>
                        <td><?php echo $st[$edu['edu_year']][$c][$i]['score'];?></td>
                        <td><?php echo $st[$edu['edu_year']][$c][$i]['score_chance_two'];?></td>
                        <td><?php echo $st[$edu['edu_year']][$c][$i]['score_chance_three'];?></td>
                        <td><?php echo $st[$edu['edu_year']][$c][$i]['subject_credit'];?></td>
                        <td></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <?php $i++;}
                      $x = $st['max_semester_sub'];?>
                      <tr>
                        <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">مجموعه کریدیت</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php if($st[$edu['edu_year']][$c][$x]['total_credit']!=0){echo $st[$edu['edu_year']][$c][$x]['total_credit'];};?></td>
                        <td></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <tr>
                        <?php $x++; $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">مجموع نمرات</td>
                        <td colspan="5"><?php if($st[$edu['edu_year']][$c][$x]['total_score']!=0){echo $st[$edu['edu_year']][$c][$x]['total_score'];};?></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <tr>
                        <?php $x++; $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">اوسط نمرات</td>
                        <td colspan="5"><?php if($st[$edu['edu_year']][$c][$x]['average']!=0){echo round($st[$edu['edu_year']][$c][$x]['average'],2);}?></td>
                         <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                      <tr>
                        <?php $x++; $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td>نتیجه</td>
                        <td colspan="5"><?php echo $st[$edu['edu_year']][$c][$x]['result'];?></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                    </tbody>
                </table>
                <table class="table-border table" id="result-table" style="border: 1px solid #000;width:92%;margin-right:38px;margin-top:60px">
                    <tbody>
                      <tr>
                      <?php $index = $a-1; 
                        while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td colspan="6" style="text-align: center;width:25%">سمستر<?php echo $st['edu_year_semesters'][$st['edu_years'][$index]['edu_year']][$c]['semester_name'].' سال'.'('.$st['edu_years'][$index]['edu_year'].')';?></td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td rowspan="2"><div style="padding:35px 0px">مضامین</div></td>
                        <td colspan="3">نمره</td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:0px 5px 30px 0px;font-size:14px"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>تعدادکریدیت</span></div></td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:0px 5px 10px 0px;font-size:14px;"><div style="width:20px;-webkit-transform:rotate(-90deg);"><span>کتگوری</span></div></td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس اول</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس دوم</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:15px 5px 35px 0px;font-size:14px;"><div style="width: 20px;-webkit-transform:rotate(-90deg);"><span>چانس سوم</span></div></td>
                        <?php }$index++;}?>
                      </tr>
                      <?php $i=0; while($i<($st['max_semester_sub']-1)){?>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;"><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['sub_dari_name']?></td>
                        <td><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['score'];?></td>
                        <td><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['score_chance_two'];?></td>
                        <td><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['score_chance_three'];?></td>
                        <td><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['subject_credit'];?></td>
                        <td></td>
                        <?php }$index++;}?>
                      </tr>
                      <?php $i++;}
                      $x = $st['max_semester_sub'];?>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">مجموعه کریدیت</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php if($st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_credit']!=0){echo $st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_credit'];};?></td>
                        <td></td>
                        <?php }$index++;}?>
                      </tr>
                      
                      <tr>
                        <?php $x++; $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">مجموع نمرات</td>
                        <td colspan="5"><?php if($st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_score']!=0){echo $st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_score'];};?></td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $x++; $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;">اوسط نمرات</td>
                        <td colspan="5"><?php if($st[$st['edu_years'][$index]['edu_year']][$c][$x]['average']!=0){echo round($st[$st['edu_years'][$index]['edu_year']][$c][$x]['average'],2);}?></td>
                         <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $x++; $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td>نتیجه</td>
                        <td colspan="5"><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$x]['result'];?></td>
                        <?php }$index++;}?>
                      </tr>
                    </tbody>
                </table>
                </div>
                <?php endforeach;?>
        <!-- transcript dari---------------------------------------->  
            </div>
            <table class="table table-striped page">
                        <tbody><tr>
                            <td width="20%"><?php echo $total;?></td>
                            <td>
                            <?php echo $link;?>                    
                            </td>
                            <td style="text-align: left;">
                            تعداد محصل در هر صفحه:
                            </td><td>
                                <?php echo $perPage;?>                   
                            </td>
                        </tr>
                    </tbody>
                </table>