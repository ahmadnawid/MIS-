<div class="panel-heading">جدول رساندن نمرات شاگردان <?php echo $dep_exp;?> سمستر<?php echo $semes_name;?> مضمون <?php echo $sub_expresion;?> از بابت سال تحصیلی <?php echo $year;?></div>
        <div class="input-area">
            <div class="shoqa-head" id="table-main" style="border-top:1px solid #000;">
                <table class="table-border table">
                    <thead>
                      <tr>
                        <th>شماره</th>
                        <th>آدی محصل</th>
                        <th>اسم</th>
                        <th>ولد/بنت</th>
                        <th>فعالیت صنفی وحاضری (10%)</th>
                        <th>کارعملی وخانگی (10%)</th>
                        <th>ارزیابی وسط سمستر (20%)</th>
                        <th>ارزیابی نهایی (60%)</th>
                        <th>مجموعه نمرات</th>
                        <th>ملاحظات</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $a=1; foreach($student as $stud):?>
                      <tr>
                        <td><?php echo $a;?></td>
                        <td style="font-size: 11px;"><?php echo $stud['student_id'];?></td>
                        <td><?php echo $stud['dari_name'];?></td>
                        <td><?php echo $stud['dari_fName'];?></td>
                        <td><input type="text" class="input-table" data="<?php echo $a;?>" onchange="sum_mark($(this))"/></td>
                        <td><input type="text" class="input-table" data="<?php echo $a;?>" onchange="sum_mark($(this))"/></td>
                        <td><input type="text" class="input-table" data="<?php echo $a;?>" onchange="sum_mark($(this))"/></td>
                        <td><input type="text" class="input-table" data="<?php echo $a;?>" onchange="sum_mark($(this))" value="<?php echo $stud['score'];?>"/></td>
                        <td>
                            <input type="hidden" name="student_mark[]" value="<?php echo $stud['student_id'];?>"/>
                            <input type="text" class="input-table" name="<?php echo $stud['student_id'];?>" onfocus="input_focus($(this))" id="total_mark<?php echo $a;?>" value="<?php echo $stud['score'];?>"/>
                        </td>
                        <td></td>
                      </tr>
                      <?php $a++; endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="search-button">
                    <button type="submit" class="btn-add">ذخیره کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
            </div>
        </div><!-- /.row -->
           </form>
        