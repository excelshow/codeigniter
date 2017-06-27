<!doctype html>
<html class="no-js">
<head>
<?php $this->load->helper('url');?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>后台管理系统</title>
<meta name="description">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="<?php echo base_url('/assets/i/favicon.png')?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('/assets/i/app-icon72x72@2x.png')?>">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="<?php echo base_url('/assets/css/amazeui.min.css')?>"/>
<link rel="stylesheet" href="<?php echo base_url('/assets/css/admin.css')?>">
    <script src="<?=base_url('assets/dist/echarts.js')?>"></script>
<script src=" <?php echo base_url('/assets/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('/assets/js/app.js')?>"></script>
<script src="<?php echo base_url('/assets/js/amazeui.min.js')?>"></script>
<!--消息框js-->
<script src="<?=base_url('assets/dist/sweetalert.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/dist/sweetalert.css')?>">
</head>
<!--[if lte IE 9]><p class="browsehappy">升级你的浏览器吧！ <a href="http://se.360.cn/" target="_blank">升级浏览器</a>以获得更好的体验！</p><![endif]-->

<body>
<header class="am-topbar admin-header">
  <div class="am-topbar-brand"><img src="<?php echo base_url('/assets/i/logo.png')?>"></div>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav admin-header-list">

   <li class="am-dropdown tognzhi" data-am-dropdown>
  <button class="am-btn am-btn-primary am-dropdown-toggle am-btn-xs am-radius am-icon-bell-o" data-am-dropdown-toggle> 消息管理<span class="am-badge am-badge-danger am-round"></span></button>
  <ul class="am-dropdown-content">



    <li class="am-dropdown-header">所有消息都在这里</li>



    <li><a href="#">未激活会员 <span class="am-badge am-badge-danger am-round"></span></a></li>
    <li><a href="#">未确认订单 <span class="am-badge am-badge-danger am-round"></span></a></li>



  </ul>
</li>

 <li class="kuanjie">

  <a href="#">会员管理</a>
  <a href="#">订单管理</a>
  <a href="#">商品管理</a>
 </li>

 <li class="soso">
 </li>
      <li class="am-hide-sm-only" style="float: right;"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
?>
