<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">فورم جستجوبرای راپور محصلین</div>
            <div class="input-area">
            <form class="navbar-form navbar-left" role="search" id="student_list">
                    <div class="box">
                        جدیدالشمولان
                        <div class="input-append">
                            <select name="edu_year" id="entry_year" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <?php foreach($year as $y):?>
                                <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div> 
                    <div class="box">
                        فارغان
                        <div class="input-append">
                            <select name="semester" id="semester" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($semester as $s):?>
                                <option value="<?php echo $s['semester_id'];?>"><?php echo 'سمستر'.$s['semester_name'];?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>                     
                    <div class="box">
                        دیپارتمنت
                        <div class="input-append">
                            <select name="dep" id="dep" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">همه</option>
                                <?php foreach($department as $dp):?>
                                <option value="<?php echo $dp['dep_id'];?>"><?php echo $dp['dep_name'].'('.$dp['dep_expression'].')';?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                    <div class="search-button">
                    <button type="button" class="btn-add" onclick="load_data('student_list','student/home/search_student','list')">جستجو</button>
                </div>
                </div>                
            </form>
        </div><!-- /.row -->
        
        </div>
    </div>
<!-- modal--> 