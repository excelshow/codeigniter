<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->helper('url');?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>控制台页面</title>

    <link rel="stylesheet" href="<?=base_url('assets/css/style.default.css')?>" type="text/css" />

    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?=base_url('/assets/js/plugins/excanvas.min.js')?>"></script><![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="<?=base_url('css/style.ie9.css')?>"/>
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="<?=base_url('css/style.ie8.css')?>"/>
    <link rel="stylesheet" href="<?=base_url('/assets/dist/css/bootstrap.min.css')?>"/>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="<?=base_url('/assets/js/plugins/css3-mediaqueries.js')?>"></script>
    <![endif]-->
    <!--    一个和谐的分割线，分割bootstrap。以下bootstrap-->
    <script type="text/javascript" src="<?=base_url('/assets/jquery-3.2.1/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('/assets/bootstrap/css/bootstrap.min.css')?>"/>
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">及时<span>农场</span></h1>
            <span class="slogan">商城后台管理系统</span>

            <div class="search">
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword" value="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->

            <br clear="all" />

        </div><!--left-->

        <div class="right">
            <!--<div class="notification">
                <a class="count" href="<?=base_url('ajax/notifications.html')?>"><span>9</span></a>
            </div>-->
            <div class="userinfo">
                <img src="<?=base_url('/assets/images/thumbs/avatar.png')?>" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->

            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="<?=base_url('/assets/images/thumbs/avatarbig.png')?>" alt="" /></a>
                    <div class="changetheme">
                        切换主题: <br />
                        <a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                    <h4>Juan</h4>
                    <span class="email"><?=$_SESSION['username']?></span>
                    <ul>
                        <li><a href="<?=base_url('editprofile.html')?>">编辑资料</a></li>
                        <li><a href="<?=base_url('accountsettings.html')?>">账号设置</a></li>
                        <li><a href="<?=base_url('help.html')?>">帮助</a></li>
                        <li><a href="<?=base_url('index.html')?>">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->


    <div class="header">
        <ul class="headermenu">
            <li class="current"><a href="<?=base_url('index.php/admin')?>"><span class="icon icon-flatscreen"></span>首页</a></li>
            <li><a href="<?=base_url('index.php/goods')?>"><span class="icon icon-pencil"></span>商品管理</a></li>
            <li><a href="<?=base_url('index.php/order')?>"><span class="icon icon-pencil"></span>订单管理</a></li>
            <li><a href="<?=base_url('index.php/member')?>"><span class="icon icon-pencil"></span>会员管理</a></li>
            <li><a href="<?=base_url('messages.html')?>"><span class="icon icon-message"></span>查看消息</a></li>
            <li><a href="<?=base_url('reports.html')?>"><span class="icon icon-chart"></span>统计报表</a></li>
        </ul>

        <div class="headerwidget">
            <div class="earnings">
                <div class="one_half">
                    <h4>Today's Earnings</h4>
                    <h2>$640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                    <h4>Current Rate</h4>
                    <h2>53%</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->

    </div>