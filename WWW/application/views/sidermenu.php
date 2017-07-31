<?php $this->load->helper('url');?>
<script type="text/javascript" src="<?=base_url('/assets/ajax/ajax.js')?>"></script>
<script type="text/javascript">
    function check_all(obj,cName)
    {
        var checkboxs = document.getElementsByName(cName);
        for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
    }
</script>
<div class="vernav2 iconmenu">
    <ul><li><a href="#goods_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;商品管理<span class="caret"></span></a></li></ul>
    <ul id="goods_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('goods/lists')"><small>商品列表</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/classify')"><small>商品分类</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/stock')"><small>库存管理</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('goods/add')"><small>添加新商品</small></a></li>
    </ul>
    <ul><li><a href="#order_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;订单管理<span class="caret"></span></a></li></ul>
    <ul id="order_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/1')"><small>已支付</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')"><small>未支付</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/2')"><small>已备货</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('order/lists/a')"><small>全部</small></a></li>
    </ul>
    <ul><li><a href="#member_manage" class="nav-header" data-toggle="collapse"><i class="glyphicon glyphicon-user"></i>&nbsp;用户管理<span class="caret"></span></a></li></ul>
    <ul id="member_manage" class="nav nav-list collapse ">
        <li><a href="javascript:void(0);" onclick="change_content('member/lists')"><small>会员列表</small></a></li>
        <li><a href="javascript:void(0);" onclick="change_content('member/unlists')"><small>未激活会员</small></a></li>
    </ul>
    <ul class="disabled">
        <li><a href="#member_manage" class="support">消息管理</a></li>
        <li><a href="#member_manage" class="support">统计报表</a></li>
        <li><a href="#member_manage" class="support">系统设置</a></li>
    </ul>
    </ul>
    <br />
</div><!--leftmenu-->
<div class="centercontent" id="content">
