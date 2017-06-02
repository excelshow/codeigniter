<!doctype html>
<html class="no-js">
<head>
<?php $this->load->helper('url');?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>后台管理系统</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="<?php echo base_url('/assets/i/favicon.png')?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url('/assets/i/app-icon72x72@2x.png')?>">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="<?php echo base_url('/assets/css/amazeui.min.css')?>"/>
<link rel="stylesheet" href="<?php echo base_url('/assets/css/admin.css')?>">
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
  <button class="am-btn am-btn-primary am-dropdown-toggle am-btn-xs am-radius am-icon-bell-o" data-am-dropdown-toggle> 消息管理<span class="am-badge am-badge-danger am-round">6</span></button>
  <ul class="am-dropdown-content">
    
    
    
    <li class="am-dropdown-header">所有消息都在这里</li>

    

    <li><a href="#">未激活会员 <span class="am-badge am-badge-danger am-round">556</span></a></li>
    <li><a href="#">未激活代理 <span class="am-badge am-badge-danger am-round">69</span></a></li>
    <li><a href="#">未处理汇款</a></li>
    <li><a href="#">未发放提现</a></li>
    <li><a href="#">未发货订单</a></li>
    <li><a href="#">低库存产品</a></li>
    <li><a href="#">信息反馈</a></li>
    
    
    
  </ul>
</li>

 <li class="kuanjie">
  
  <a href="#">会员管理</a>          
  <a href="#">奖金管理</a> 
  <a href="#">订单管理</a>   
  <a href="#">产品管理</a> 
  <a href="#">个人中心</a> 
   <a href="#">系统设置</a>
 </li>

 <li class="soso">
  
<p>   
  
  <select data-am-selected="{btnWidth: 70, btnSize: 'sm', btnStyle: 'default'}">
          <option value="b">全部</option>
          <option value="o">产品</option>
          <option value="o">会员</option>
          
        </select>

</p>

<p class="ycfg"><input type="text" class="am-form-field am-input-sm" placeholder="圆角表单域" /></p>
<p><button class="am-btn am-btn-xs am-btn-default am-xiao"><i class="am-icon-search"></i></button></p>
 </li>




      <li class="am-hide-sm-only" style="float: right;"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>
?>
