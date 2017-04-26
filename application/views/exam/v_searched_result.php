 <div class="panel-heading">نتیجه جستجو شما</div>
        <div class="input-area" style="background: #fff;padding-top:0px">
            <div class="box-content" style="padding:10px 20px" id="list">
                <!--table class="table-border table" id="result-table" style="border-top:1px solid #000000"-->
                 <table class="table table-striped">
                    <thead>
                      <tr>
                                    <th>شماره</th>
                                    <th style="border-right-width:0;">آدی محصل</th>
                                    <th>نام محصل</th>
                                    <th>نام پدر محصل</th>
                                    <th>سال تحصیلی</th>
                                    <th>سمستر</th>
                                    <th>دیپارتمنت</th>
                                    <th>نتیجه</th>
                                    <th>ویرایش</th>
                                </tr>
                    </thead>
                    <tbody>
                    <?php foreach($student as $stud):?>
                      <tr>
                        <td><?php echo $number;?></td>
                        <td style="font-size: 12px"><?php echo $stud['student_id'];?></td>
                        <td><?php echo $stud['dari_name'];?></td>
                        <td><?php echo $stud['dari_fName'];?></td>
                        <td><?php echo $stud['edu_year'];?></td>
                        <td><?php echo $stud['semester_name'];?></td>
                        <td><?php echo $stud['dep_name'];?></td>
                        <td>
                            <a data-toggle="modal" href="#full-width" onclick="load_modal_data('<?php echo $stud['student_id'];?>','student/home/student_info_details','full-width')">
                            <?php echo $stud['resultState_name'];?>
                            </a>
                        </td>
                        <td></td>
                      </tr>
                      <?php $number++; endforeach;?>
                    </tbody>
                </table>
                <?php if(count($student)>$perPage){?>
                <table class="table table-striped page">
                        <tbody><tr>
                            <td width="20%"><?php echo $total;?></td>
                            <td>
                            <?php echo $link;?>                    
                            </td>
                            <td style="text-align: left;">
                            تعداد ریکارد در هر صفحه:
                            </td><td>
                                <?php echo $perPage;?>                   
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </div><!-- /.row -->