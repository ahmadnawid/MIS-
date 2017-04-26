<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles-farsi.css">
</head>
<body>

<section id="container" style="margin-top: 100px;">
    	<div class="left">
    		<!-- <img src=""> -->
    		<h1 class="head" style="width:260px">سیستم معلوماتی پوهنحی انجینیری کمپیوتروانفورمانیک</h1>
    		<br>
    		<br><br>
    		<a href="#" class="help">نیاز به کمک؟</a>
    		<br>
    		<p class="call">تماس &nbsp;0773845555 &nbsp;یا &nbsp;ایمیل</p>
    		<p class="email">alijanahmadi2020@gmail.com</p>
        </div>
<!-- =================Right side of form================= -->

    <div class="form-container">
    <h3 class="form-header">ورود به سیستم</h3>
    <br>
    <br>
    <form method="POST" action="<?php echo base_url();?>home/ion_auth" class="form_group">
        
            <label>نام کاربر :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="username" id="uname" placeholder="نام کاربری تان را وارد کنید">
            <br><br>
            <label>رمز کاربری :</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="password" name="password" id="password" placeholder="رمز عبور تان را وارد کنید">
            <br><br>
            <?php echo $error;?>
            <button type="submit" id="login">ورود</button>
            <br><br><br>
    </form>
    </div>
<!--        <hr/>-->
</section>
</body>
</body>