       <div class="input-area" style="padding-top:1px" id="print_t">
        <?php foreach($student as $st):?>
            <div class="shoqa-head transcript" id="result-sheet" style="font-family:Cambria;direction: ltr;">
                <ul style="margin-bottom:15px;padding-top:25px">
                    <li style="text-align:left;margin-left:50px;width:23%">
                         <table class="table-border table samary-result" style="border: 1px solid #000;direction: ltr;font-size:14px">
                            <tr>
                                <td>StudentID</td>
                                <td><?php echo $st['student_id'];?></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><?php echo $st['english_name'];?></td>
                            </tr>
                            <tr>
                                <td>Father/Name</td>
                                <td><?php echo $st['english_fName'];?></td>
                            </tr>
                            <tr>
                                <td>Faculty</td>
                                <td>Computer Engineering & Informatic</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td><?php echo $st['english_dep_name'].'('.$st['dep_expression'].')';?></td>
                            </tr>
                            <tr>
                                <td>Admission Date</td>
                                <td><?php echo $st['university_entry_year']+621;?></td>
                            </tr>
                            <tr>
                                <td>Graduation Year</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['dari_graduated_date'];}?></td>
                            </tr>
                        </table>
                    </li>
                    <li style="text-align:right;width:7%"><img style="width:80px;height:70px" src="<?php echo base_url();?>img/afghanistan.jpg" data="logo"/></li>
                    <li style="width:24%">
                        <p class="eng-head1">Islamic Republic of Afghanistan</h1>
                        <p class="eng-p">Ministry of Higher Education</p>
                        <p class="eng-p">Kabul Polytechnic University</p>
                        <p class="eng-p">Vice Chanceller's Office for Student Offairs</p>
                        <p class="eng-p" style="margin-bottom: 20px;">Bachelor of Science In Information Technology</p>
                        <p class="eng-head" style="position: relative;left:-25px;">Student's Educational Career Transcript</p>
                    </li>
                    <li style="text-align:left;width:7%"><img style="width:80px;height:70px" src="<?php echo base_url();?>img/faculty.png" data="logo"/></li>
                    <li style="text-align:left;width:30%;">
                        <table class="table-border table samary-result" id="trans_property" style="direction: ltr;font-size:14px">
                            <tr>
                                <td>National ID Card</td>
                                <td><?php echo $st['tazkira_number'];?></td>
                                <td rowspan="6"><div style="width:120px"><img src="<?php if($st['photo']!=''){ echo base_url().$st['photo'];}else{ echo base_url().'img/default-photo.png';}?>" alt="photo"></div></td>
                            </tr>
                            <tr>
                                <td>Place Of Birth</td>
                                <td><?php echo $st['prov_name'][0]['name_en'];?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><?php echo $st['dateOfBirth']+621;?></td>
                            </tr>
                            <tr>
                                <td>High School</td>
                                <td><?php echo $st['grad_school'];?></td>
                            </tr>
                            <tr>
                                <td>Diploma Project Monograph</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['project_english_name'];}?></td>
                            </tr>
                            <tr>
                                <td>Project Defence Date</td>
                                <td><?php if(count($st['project'])!=0){ echo $st['project'][0]['dari_graduated_date'];}?></td>
                            </tr>
                        </table>
                    </li>
                </ul>
                <table class="table-border table" id="result-table" style="border: 1px solid #000;width:92%;margin:0px 0px 30px 50px;direction: ltr;font-size:14px;">
                    <tbody>
                      <tr>
                        <?php $a=1; foreach($st['edu_years'] as $edu):
                        if(ceil(count($st['edu_years'])/2)>=$a){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td colspan="6" style="text-align: center;width:25%;font-weight:bold;padding:5px 0px"><?php $sem = $st['edu_year_semesters'][$edu['edu_year']][$c]['semester_id'];echo $sem;?>
                            <span class="ordinal_number">
                            <?php if($sem==1){echo 'st';}elseif($sem==2){echo 'nd';}elseif($sem==3){echo 'rd';}else{echo 'th';}?>
                            </span>
                            <?php echo 'Semester Year'.'('.($edu['edu_year']+621).')';?>
                        </td>
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
                        <td rowspan="2"><div style="padding:35px 0px">Subject</div></td>
                        <td colspan="3">Score</td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:5px 0px 95px 5px;font-size:14px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>Number of Credits</span></div></td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:5px 0px 10px 5px;font-size:14px;"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>GPA</span></div></td>
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
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>First Chance</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>Second Chance</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>Third Chance</span></div></td>
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
                        <td style="white-space: pre-wrap;"><?php echo $st[$edu['edu_year']][$c][$i]['sub_english_name']?></td>
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
                        <td style="white-space: pre-wrap;">Total Credit</td>
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
                        <td style="white-space: pre-wrap;">Total Score</td>
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
                        <td style="white-space: pre-wrap;">Average Percentage</td>
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
                        <td>Result</td>
                        <td colspan="5"><?php echo $st[$edu['edu_year']][$c][$x]['result'];?></td>
                        <?php }}
                        else
                        {
                            break;
                        } $a++; endforeach;?>
                      </tr>
                    </tbody>
                </table>
                <table class="table-border table" id="result-table" style="border: 1px solid #000;width:92%;margin:0px 0px 30px 50px;direction: ltr;font-size:14px;margin-top:60px">
                    <tbody>
                      <tr>
                      <?php $index = $a-1; 
                        while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                       <td colspan="6" style="text-align: center;width:25%;font-weight:bold;padding:5px 0px"><?php $sem = $st['edu_year_semesters'][$st['edu_years'][$index]['edu_year']][$c]['semester_id'];echo $sem;?>
                            <span class="ordinal_number">
                            <?php if($sem==1){echo 'st';}elseif($sem==2){echo 'nd';}elseif($sem==3){echo 'rd';}else{echo 'th';}?>
                            </span>
                            <?php echo 'Semester Year'.'('.($st['edu_years'][$index]['edu_year']+621).')';?>
                       </td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td rowspan="2"><div style="padding:35px 0px">Subject</div></td>
                        <td colspan="3">Score</td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:5px 0px 95px 5px;font-size:14px"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>Number of Credits</span></div></td>
                        <td rowspan="2" class="text-rotate" style="width:0px;padding:5px 0px 10px 5px;font-size:14px;"><div style="width:20px;-webkit-transform:rotate(90deg);"><span>GPA</span></div></td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>First Chance</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>Second Chance</span></div></td>
                        <td class="text-rotate" style="width:0px;padding:5px 0px 60px 5px;font-size:13px;"><div style="width: 20px;-webkit-transform:rotate(90deg);"><span>Third Chance</span></div></td>
                        <?php }$index++;}?>
                      </tr>
                      <?php $i=0; while($i<($st['max_semester_sub']-1)){?>
                      <tr>
                        <?php $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td style="white-space: pre-wrap;"><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$i]['sub_english_name']?></td>
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
                        <td style="white-space: pre-wrap;">Total Credit</td>
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
                        <td style="white-space: pre-wrap;">Total Score</td>
                        <td colspan="5"><?php if($st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_score']!=0){echo $st[$st['edu_years'][$index]['edu_year']][$c][$x]['total_score'];};?></td>
                        <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $x++; $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>                                 
                        <td style="white-space: pre-wrap;">Average Percentage</td>
                        <td colspan="5"><?php if($st[$st['edu_years'][$index]['edu_year']][$c][$x]['average']!=0){echo round($st[$st['edu_years'][$index]['edu_year']][$c][$x]['average'],2);}?></td>
                         <?php }$index++;}?>
                      </tr>
                      <tr>
                        <?php $x++; $index = $a-1;
                            while($index<count($st['edu_years'])){
                            for($c=1;$c<=2;$c++){
                        ?>
                        <td>Result</td>
                        <td colspan="5"><?php echo $st[$st['edu_years'][$index]['edu_year']][$c][$x]['result'];?></td>
                        <?php }$index++;}?>
                      </tr>
                    </tbody>
                </table>
        </div>
        <?php endforeach;?>
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