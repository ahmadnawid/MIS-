<div id="container">
        <div class="panel panel-default">
      <!-- Default panel contents -->
            <div class="panel-heading">اضافه کردن بورسیه</div>
            <div class="input-area">
            <?php $attributes=array('class'=>'navbar-form navbar-left','id'=>'add_tarfi'); echo form_open('faculty/knowlage_improve/add_new_tarfi',$attributes);?>
                <div class="box-search">
                    <div class="box">
                        استاد
                        <div class="input-append">
                            <select name="staff" data-rel="chosen"  class="dropdown-select search-area search-input">
                                <option value="0" selected="selected">انتخاب نمایید</option>
                                <?php foreach($staff as $s):?>
                                <option value="<?php echo $s['s_id'];?>"><?php echo $s['dari_name'];?></option>
                                <?php endforeach;?>     
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        کشور بورس دهنده
                        <div class="input-append">
                            <input type="text" name="tarfi_date"/>
                        </div>
                    </div>
                    <div class="box">
                        نام پوهنتون
                        <div class="input-append">
                            <input type="text" name="tarfi_date"/>
                        </div>
                    </div>
                    <div class="box">
                        رشته تحصیلی
                        <div class="input-append">
                            <input type="text" name="tarfi_date"/>
                        </div>
                    </div>
                    <div class="box">
                        تاریخ شروع
                        <div class="input-append">
                            <input type="text" name="tarfi_date"/>
                        </div>
                    </div>
                    <br>                   
                    <div class="box">
                        جزییات
                        <div class="input-append">
                            <textarea name="tarfi_details" cols="" rows="6" style="width:300%"></textarea>
                        </div>
                    </div>
                </div>                
                <div class="search-button">
                    <button type="submet" class="btn-add">اضافه کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
</div>
</div>