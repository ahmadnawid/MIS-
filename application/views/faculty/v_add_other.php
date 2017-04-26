<div id="container">
      <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">اضافه کردن استاد دیگر پوهنحی</div>
        <div class="input-area">
            <form method="post" class="navbar-form navbar-left" action="<?php echo base_url();?>faculty/stuff/add_other/r" >
            <?php echo $this->session->flashdata('success');?>
                <div class="box-adding">
                    <div class="test"><input type="text" name="name" class="input-label"/><label class="lable">نام<em> *</em></label></div>
                    <div class="test"><input type="text" name="lname" class="input-label"/><label class="lable">تخلص</label></div>
                </div>
                <br>
                    <span class="required-feild"><em> *</em>فیلدهای ضروری</span>                    
                <div class="search-button">
                    <button type="submit" class="btn-add">اضافه کردن</button>
                    <button type="reset" class="btn-reset">پاک کردن</button>
                </div>
            </form>
        </div><!-- /.row -->
    </div>
    </div>
    <!-- main content-->