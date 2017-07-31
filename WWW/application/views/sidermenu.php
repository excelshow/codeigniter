<?php $this->load->helper('url');?>
<script type="text/javascript" src="<?=base_url('/assets/ajax/ajax.js')?>"></script>
<script type="text/javascript">
    function check_all(obj,cName)
    {
        var checkboxs = document.getElementsByName(cName);
        for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
    }

</script>
<style>
    .iconmenu ul li a{ text-decoration:none;}
    .iconmenu ul li a small{ color:#2d95ff;}
    .glyphicon-chevron-down{position: relative;
        left:120px;}
</style>
<button id="refresh_menu" class="btn"><i class="glyphicon glyphicon-refresh"></i></button>
<div class="vernav2 iconmenu">
    <ul><li><a href="#goods_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-shopping-cart"></i>商品管理<i class="glyphicon glyphicon-chevron-down"></i></a></li></ul>
    <ul id="goods_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('goods/lists')"><small>&nbsp;&nbsp;&nbsp;商品列表</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/classify')"><small>&nbsp;&nbsp;&nbsp;商品分类</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/stock')"><small>&nbsp;&nbsp;&nbsp;库存管理</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/add')"><small>&nbsp;&nbsp;&nbsp;添加新商品</small></a></li>
    </ul>
    <ul><li><a href="#order_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;订单管理<i class="glyphicon glyphicon-chevron-down"></i><span class="label mybadge">New</span></a></li></ul>
    <ul id="order_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')"><small>未支付->待支付</small><span class="badge mybadge" >42</span></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/1')"><small>已支付->待备货</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/2')"><small>已备货->待分配</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/3')"><small>已分配->待完成</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/1')"><small>已完成</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/a')"><small>全部</small></a></li>
    </ul>
    <ul><li><a href="#member_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-user"></i>&nbsp;用户管理<i class="glyphicon glyphicon-chevron-down"></i><span class="label mybadge">New</span></a></li></ul>
    <ul id="member_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('member/lists')"><small>会员列表</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('member/unlists')"><small>未激活会员</small></a></li>
    </ul>
    <ul><li><a href="#message_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-bell"></i>&nbsp;消息管理<i class="glyphicon glyphicon-chevron-down"></i><span class="label mybadge">New</span></a></li></ul>
    <ul id="message_manage" class="nav nav-list collapse ">
    <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')"><small>未激活会员</small><span class="badge mybadge" >42</span></a></li>
    <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')"><small>待备货的订单</small><span class="badge mybadge" >42</span></a></li>
    <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')"><small>未处理的过期订单</small><span class="badge mybadge" >42</span></a></li>
    </ul>
    <ul>
        <li><a href="#member_manage" class="support">统计报表</a></li>
        <li><a href="#member_manage" class="support">系统设置</a></li>
    </ul>
    </ul>
    <br />
</div><!--leftmenu-->
</div>
<script>
    $("#refresh_menu").click(function(){alert('fasdf')});
</script>
<div class="centercontent" id="content">

