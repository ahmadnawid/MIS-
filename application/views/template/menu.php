
<div id="m_menu">
        <div class="nav-collapse collapse">
            <ul class="nav pull-right main-menu" id="main-menu">
                <li id="setting" class="<?php if($current_tab=='setting'){ echo 'active';}?> dropdown"><a href="<?php echo base_url();?>report/student_report/test.php" class="dropdown-toggle">تنظیمات</a></li>
                <li id="rep" class="<?php if($current_tab=='report'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>report/exam_report/index.php" class="dropdown-toggle">راپورها</a></li>
                <li id="faculty" class="<?php if($current_tab=='faculty'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>faculty/stuff/index.php" class="dropdown-toggle">کارمندان</a></li>
                <li id="exam" class="<?php if($current_tab=='exam'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>exam/exam_score/index.php" class="dropdown-toggle">امتحان</a></li>
                <li id="scheedual" class="<?php if($current_tab=='schedual'){echo 'active';}?> dropdown"><a href="scheedual.html" class="dropdown-toggle">تقسیم اوقات</a></li>
                <li id="student" class="<?php if($current_tab=='student'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>student/home/index.php" class="dropdown-toggle">محصل</a></li>
                <li id="subject" class="<?php if($current_tab=='subject'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>subject/home/index.php" class="dropdown-toggle">مضمون</a></li>
            </ul> 
        
        </div>
    </div>
    <div id="sub-menu">
        <div class="nav-collapse collapse">
            <ul class="nav pull-right submenu <?php if($current_tab=='test'){echo 'active';}?>" menu="setting">
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='report'){echo 'active';?>" style="display:block" <?php }else{?> style="display:none;" <?php }?> menu="report">
                <li><a href="<?php echo base_url();?>report/exam_report/index.php" <?php if($current_page=='exam_report'){?>class="active" <?php } ?>>امتحانات</a></li>
                <li><a href="<?php echo base_url();?>report/student_report/index.php" <?php if($current_page=='student_report'){?>class="active" <?php } ?>>محصلین</a></li>
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='faculty'){echo 'active';?>" <?php }else{?> style="display:block;" <?php }?> menu="faculty">
                <li><a href="<?php echo base_url();?>faculty/stuff/add_other/s" <?php if($current_page=='other_teacher'){?>class="active" <?php } ?>>اضافه کردن استادان دیگر دیپارتمنت</a></li>
                <li><a href="<?php echo base_url();?>faculty/scholership/index.php" <?php if($current_page=='scholer'){?>class="active" <?php } ?>>بورسیه</a></li>
                <li><a href="<?php echo base_url();?>faculty/knowlage_improve/add_tarfi.php" <?php if($current_page=='knowlage_improve'){?>class="active" <?php } ?>>ترفیع علمی</a></li>
                <li><a href="<?php echo base_url();?>faculty/stuff/register_staff.php" <?php if($current_page=='add_staff'){?>class="active" <?php } ?>>کارمند جدید</a></li>
                <li><a href="<?php echo base_url();?>faculty/stuff/index.php" <?php if($current_page=='search_staff'){?>class="active" <?php } ?>>جستجو</a></li>
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='exam'){echo 'active';?>" style="display:block" <?php }else{?> style="display:none;" <?php }?> menu="exam">
                <li><a href="<?php echo base_url();?>exam/exam_result/index.php" <?php if($current_page=='result'){?>class="active" <?php } ?>>نتایچ دیپارتمنتها</a></li>
                <li><a href="<?php echo base_url();?>exam/exam_result/search_result.php" <?php if($current_page=='search_result'){?>class="active" <?php } ?>>جستجونتایج</a></li>
                <li><a href="<?php echo base_url();?>exam/exam_score/search_score.php" <?php if($current_page=='show_score'){?>class="active" <?php } ?>>جستجونمرات</a></li>
                <li><a href="<?php echo base_url();?>exam/exam_score/search_shuqa.php" <?php if($current_page=='score_entry'){?>class="active" <?php }?>>رساندن نمرات</a></li>
                <li><a href="<?php echo base_url();?>exam/exam_score/index.php" <?php if($current_page=='exam_shuqa'){?>class="active" <?php }?>>شقه</a></li>
            </ul>
            <ul class="nav pull-right submenu" menu="scheedual">
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='student'){echo 'active';?>" style="display:block" <?php }else{?> style="display:none;" <?php }?>  menu="student">
                <li><a href="<?php echo base_url();?>student/transcript/graduated_table.php"  <?php if($current_page=='graduated_table'){?>class="active" <?php }?>>جدول فارغان</a></li>
                <li class="dropdown">
                    <a href="#"  class="dropdown-toggle <?php if($current_page=='deploma_project'){echo 'active';}?>" data-toggle="dropdown">پروژه دیپلوم <i class="caret" style="color:#fff;margin-right:3px"></i></a>
                    <ul class="dropdown-menu" style="background:#555657;border:none;border-radius:4px;top:70%">
                        <li><a href="<?php echo base_url();?>student/deploma_project/index.php" style="color:#ababab">جستجو کردن</a></li>
                        <li><a href="<?php echo base_url();?>student/deploma_project/add_deploma_project.php" style="color:#ababab">اضافه کردن</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url();?>student/transcript/index.php"  <?php if($current_page=='transcript'){?>class="active" <?php }?>>ترانسکریپت نمرات</a></li>
                <li><a href="<?php echo base_url();?>student/attendance/index.php"  <?php if($current_page=='attendance'){?>class="active" <?php }?>>حاضری</a></li>
                <li><a href="<?php echo base_url();?>student/home/student_register.php" <?php if($current_page=='register'){?>class="active" <?php }?>>ثبت نام</a></li>            
                <li><a href="<?php echo base_url();?>student/home/index.php" <?php if($current_page=='home' || $current_page==''){?>class="active" <?php }?>>جستجو</a></li>    
            </ul> 
            <ul class="nav pull-right submenu <?php if($current_tab=='subject'){echo 'active';}?>" menu="subject">
                <li><a href="<?php echo base_url();?>subject/home/assigned_subject.php" <?php if($current_page=='assigned_subject'){?>class="active" <?php }?>>لیست مضامین تدریس شده</a></li>
                <li><a href="<?php echo base_url();?>subject/home/assign_subject.php" <?php if($current_page=='assign_subject'){?>class="active" <?php }?>>تقسیمات مضامین</a></li>
                <li><a href="<?php echo base_url();?>subject/home/add_subject.php" <?php if($current_page=='add_subject'){?>class="active" <?php }?>>اضافه کردن مضمون جدید</a></li>
                <li><a href="<?php echo base_url();?>subject/home/index.php" <?php if($current_page=='search_subject'){?>class="active" <?php }?>>لیست مضامین</a></li>    
            </ul>  
            <ul class="nav pull-right submenu" menu="home">
                
            </ul>             
        </div>
    </div>