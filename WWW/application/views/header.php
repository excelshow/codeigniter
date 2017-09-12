<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>小程序后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font-awesome.css" />

    <!-- page specific plugin styles -->
    <script src="<?php echo base_url()?>/assets/ajax/ajax.js"></script>
    <script src="<?php echo base_url()?>/assets/ajax/config.js"></script>
    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace-part2.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/ace-ie.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url()?>/assets/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url()?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>/assets/js/respond.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-fort-awesome" aria-hidden="true"></i>
                    小程序后台管理
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
<!--                <li class="grey">-->
<!--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!--                        <i class="ace-icon fa fa-tasks"></i>-->
<!--                        <span class="badge badge-grey">4</span>-->
<!--                    </a>-->
<!---->
<!--                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">-->
<!--                        <li class="dropdown-header">-->
<!--                            <i class="ace-icon fa fa-check"></i>-->
<!--                            4 Tasks to complete-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-content">-->
<!--                            <ul class="dropdown-menu dropdown-navbar">-->
<!--                                <li>-->
<!--                                    <a href="#">-->
<!--                                        <div class="clearfix">-->
<!--                                            <span class="pull-left">Task Name</span>-->
<!--                                            <span class="pull-right">65%</span>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="progress progress-mini">-->
<!--                                            <div style="width:65%" class="progress-bar"></div>-->
<!--                                        </div>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-footer">-->
<!--                            <a href="#">-->
<!--                                See tasks with details-->
<!--                                <i class="ace-icon fa fa-arrow-right"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="purple">-->
<!--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!--                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>-->
<!--                        <span class="badge badge-important">8</span>-->
<!--                    </a>-->
<!---->
<!--                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">-->
<!--                        <li class="dropdown-header">-->
<!--                            <i class="ace-icon fa fa-exclamation-triangle"></i>-->
<!--                            8 Notifications-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-content">-->
<!--                            <ul class="dropdown-menu dropdown-navbar navbar-pink">-->
<!--                                <li>-->
<!--                                    <a href="#">-->
<!--                                        <div class="clearfix">-->
<!--													<span class="pull-left">-->
<!--														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>-->
<!--														New Comments-->
<!--													</span>-->
<!--                                            <span class="pull-right badge badge-info">+12</span>-->
<!--                                        </div>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-footer">-->
<!--                            <a href="#">-->
<!--                                See all notifications-->
<!--                                <i class="ace-icon fa fa-arrow-right"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!---->
<!--                <li class="green">-->
<!--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">-->
<!--                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>-->
<!--                        <span class="badge badge-success">5</span>-->
<!--                    </a>-->
<!---->
<!--                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">-->
<!--                        <li class="dropdown-header">-->
<!--                            <i class="ace-icon fa fa-envelope-o"></i>-->
<!--                            5 Messages-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-content">-->
<!--                            <ul class="dropdown-menu dropdown-navbar">-->
<!--                                <li>-->
<!--                                    <a href="#" class="clearfix">-->
<!--                                        <img src="--><?php //echo base_url()?><!--/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />-->
<!--                                        <span class="msg-body">-->
<!--													<span class="msg-title">-->
<!--														<span class="blue">Alex:</span>-->
<!--														Message Summary-->
<!--													</span>-->
<!---->
<!--													<span class="msg-time">-->
<!--														<i class="ace-icon fa fa-clock-o"></i>-->
<!--														<span>Message Time</span>-->
<!--													</span>-->
<!--												</span>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!---->
<!--                        <li class="dropdown-footer">-->
<!--                            <a href="inbox.html">-->
<!--                                See all messages-->
<!--                                <i class="ace-icon fa fa-arrow-right"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="red">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-jpy icon-animated-vertical"></i>
                        <span class="badge badge-yellow"></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-jpy"></i>
                            今日收益
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar">
                                <li>
                                    <a href="#" class="clearfix">
                                        <img src="<?php echo base_url()?>/assets/avatars/help.png" class="msg-photo" alt="Alex's Avatar" />
                                        <span class="msg-body">
													<span class="msg-title">
														<span class="blue">小助手:</span>
														您今日的收益为
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-jpy"></i>
														<span class="red"><?php $this->Op_order->get_today_earning()?></span>
													</span>
												</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="<?php echo base_url()?>/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>欢迎用户</small>
									<?php echo $_SESSION['username'] ?>
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                设置
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo base_url('index.php/login/out') ?>">
                                <i class="ace-icon fa fa-power-off"></i>
                                登出
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>
<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url()?>/assets/js/jquery.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url()?>/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>
<script src="<?php echo base_url()?>/assets/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo base_url()?>/assets/js/excanvas.js"></script>
<![endif]-->
<script src="<?php echo base_url()?>/assets/js/jquery-ui.custom.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.ui.touch-punch.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.easypiechart.js"></script>
<script src="<?php echo base_url()?>/assets/js/jquery.sparkline.js"></script>
<script src="<?php echo base_url()?>/assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>/assets/js/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()?>/assets/js/flot/jquery.flot.resize.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url()?>/assets/js/ace/elements.scroller.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.fileinput.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.typeahead.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.wysiwyg.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.spinner.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.treeview.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.wizard.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/elements.aside.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.ajax-content.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.sidebar.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.widget-box.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.settings.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.widget-on-reload.js"></script>
<script src="<?php echo base_url()?>/assets/js/ace/ace.searchbox-autocomplete.js"></script>
