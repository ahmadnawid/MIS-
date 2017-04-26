<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FinalProject</title>
<script type="text/javascript">
base_url='<?php echo base_url();?>';
</script>
<link href="<?php echo base_url();?>css/bootstrap.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/s.css" type="text/css" rel="stylesheet" />
<link href="<?php echo base_url();?>css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-hover-dropdown-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/myjs.js"></script>
</head>

<body class="modal-open page-overflow">
<div class="navbar">
    <div class="navbar-inner header">
        <div class="container" style="height:92px;">
            <a href="#" class="brand nav pull-right"><img src="<?php echo base_url();?>img/cei1.jpg" style="width:70px;height:70px"/><p style="float:left;font-size:18px;margin:15px 5px 0 0;color:#000">پوهنحی انجنیری کمپیوتروانفورماتیک<br><span style="margin-top:5px;font-size: 15px;">Faculty of Computer Engineering & Informatic</span></p></a>
            <div class="dropdown" style="float: left;margin-top:40px;margin-left:30px">
            <img src="<?php echo base_url();?>images/help.png" style="display:none;width:30px;height:30px;margin-left:20px;margin-top:5px;cursor: pointer;" title="کمک"/>
            <img src="<?php echo base_url();?>img/student/49653.jpg"  style="width:40px;height:40px;border-radius:100%;border:1px solid #fff;cursor: pointer;" data-toggle="dropdown" title="حساب شما"/>
           
  <ul class="dropdown-menu" id="user_account" role="menu" aria-labelledby="dropdownMenu1" style="background:#555657;border:1px solid #555657;border-radius:4px;padding:10px;width:150px !important">
    <li><a tabindex="-1" href="#" style="color:rgb(171, 171, 171);font-weight: bold;">تغیر رمز عبور</a></li>
    <li><a tabindex="-1" href="<?php echo base_url();?>home/logout_user" style="color:rgb(171, 171, 171);font-weight: bold;">خروج از سیستم</a></li>
  </ul>
</div>
        </div>
    </div>