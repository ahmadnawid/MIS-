
<div id="m_menu">
        <div class="nav-collapse collapse">
            <ul class="nav pull-right main-menu" id="main-menu">
                <li id="rep" class="<?php if($current_tab=='attendance'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>teacher/attendance/index.php" class="dropdown-toggle">حاضری</a></li>
                <li id="exam" class="<?php if($current_tab=='exam'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>teacher/exam/index.php" class="dropdown-toggle">امتحان</a></li>
                <li id="subject" class="<?php if($current_tab=='personal_information'){echo 'active';}?> dropdown"><a href="<?php echo base_url();?>subject/home/index.php" class="dropdown-toggle">معلومات من</a></li>
            </ul> 
        
        </div>
    </div>
    <div id="sub-menu">
        <div class="nav-collapse collapse">
            <ul class="nav pull-right submenu <?php if($current_tab=='attendance'){echo 'active';?>" style="display:block" <?php }else{?> style="display:none;" <?php }?> menu="report">
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='exam'){echo 'active';?>" style="display:block" <?php }else{?> style="display:none;" <?php }?> menu="exam">
                <li><a href="<?php echo base_url();?>teacher/exam/search_shuqa.php" <?php if($current_page=='score_entry'){?>class="active" <?php }?>>رساندن نمرات</a></li>
                <li><a href="<?php echo base_url();?>teacher/exam/index.php" <?php if($current_page=='exam_shuqa'){?>class="active" <?php }?>>شقه</a></li>
            </ul>
            <ul class="nav pull-right submenu <?php if($current_tab=='personal_information'){echo 'active';}?>" menu="subject">
                <li><a href="<?php echo base_url();?>subject/home/promotion.php" <?php if($current_page=='promotion'){?>class="active" <?php }?>>ترفیعات علمی</a></li>
                <li><a href="<?php echo base_url();?>subject/home/jobs.php" <?php if($current_page=='job'){?>class="active" <?php }?>>وظیفه</a></li>
                <li><a href="<?php echo base_url();?>teacher/home/education.php" <?php if($current_page=='education'){?>class="active" <?php }?>>تحصیلات</a></li>
                <li><a href="<?php echo base_url();?>teacher/home/index.php" <?php if($current_page=='information'){?>class="active" <?php }?>>معلومات شخصی</a></li>    
            </ul>  
            <ul class="nav pull-right submenu" menu="home">
                
            </ul>             
        </div>
    </div>