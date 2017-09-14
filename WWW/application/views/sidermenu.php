<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success disabled">
                    <i class="ace-icon fa fa-signal"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
                </button>

                <!-- #section:basics/sidebar.layout.shortcuts -->
                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
                </button>

                <!-- /section:basics/sidebar.layout.shortcuts -->
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li id="admin" class="">
                <a href="<?php url('admin') ?>">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text">控制台</span>
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-desktop"></i>
                    <span class="menu-text"> 消息管理 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('order/expired_order')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            未处理的过期订单
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('order/get_new_comment')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            有新评论的订单
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php url('goods/get_new_comment')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            有新评论的商品
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
            <!--            nav.goods-->
            <li id="goods" class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon glyphicon glyphicon-shopping-cart"></i>
                    <span class="menu-text"> 商品管理 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('goods/lists')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            商品列表
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('goods/classify')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            商品分类
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('goods/stock')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            库存管理
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('goods/add')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            添加新商品
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li><!--            /nav.goods-->
            <!--            nav.order-->
            <li id="order" class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon glyphicon glyphicon-list-alt"></i>
                    <span class="menu-text"> 订单管理 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('order/comment_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            订单评价汇总
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('order/unpay_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            未支付
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('order/payed_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            已支付
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('order/stocked_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            已备货
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php url('order/pending_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            待完成
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="">
                        <a href="<?php url('order/completed_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            已完成
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li><!--            /nav.order-->
            <!--            nav.user-->
            <li id="user" class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon glyphicon glyphicon-user"></i>
                    <span class="menu-text"> 会员管理 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('member/lists')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            会员列表
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php url('member/unactived')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            待激活的会员
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
            <!--            /nav.user-->
            <!--            nav.report-->
            <li id="user" class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon glyphicon glyphicon-signal"></i>
                    <span class="menu-text"> 统计报表 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="disabled">
                        <a href="<?php url('order/comment_list')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            此分类目录暂无内容
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
            <!--            /nav.report-->
            <!--            nav.setting-->
            <li id="setting" class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon glyphicon glyphicon-cog"></i>
                    <span class="menu-text"> 系统设置 </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('setting/must_address')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            自取地址设置
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
                <ul class="submenu">
                    <li class="">
                        <a href="<?php url('setting/must_address')?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            快递员管理
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <!--            /nav.setting-->
        </ul>


        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        var url = window.location.pathname;
        if(url.match("admin")){
            $("#admin").addClass("active");
        }else if(url.match("order")){
            $("#order").addClass("active");
        }else if(url.match("goods")){
            $("#goods").addClass("active");
        }else if(url.match("member")){
            $("#user").addClass("active");
        }else if(url.match("setting")){
            $("#setting").addClass("active");
        }
    </script>
    </div>
