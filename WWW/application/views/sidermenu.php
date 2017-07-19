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
    <ul>
        <li><a  href="#goods_manage" class="addons">商品管理</a>
            <span class="arrow"></span>
            <ul id="goods_manage">
                <li><a href="javascript:void(0);" onclick="change_content('goods/lists')">商品列表</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/classify')">商品分类</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/stock')">库存管理</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/add')">添加新商品</a></li>
            </ul>
        </li>
        <li><a href="#order_manage" class="icon icon-pencil"">订单管理</a>
            <span class="arrow"></span>
            <ul id="order_manage">
                <li><a href="javascript:void(0);" onclick="change_content('order/lists/1')">已支付</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('order/lists/0')">未支付</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('order/lists/-1')">已完成</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('order/lists/a')">全部</a></li>
            </ul>
        </li>
        <li><a href="#member_manage" class="support">会员管理</a>
            <span class="arrow"></span>
            <ul id="member_manage">
                <li><a href="javascript:void(0);" onclick="change_content('member/lists')">会员列表</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('member/unlists')">未激活会员</a></li>
            </ul>
        </li> <li><a href="#member_manage" class="support">消息管理</a>
            <span class="arrow"></span>
            <ul id="member_manage">
                <li><a href="javascript:void(0);" onclick="change_content('order/lists')">待激活会员</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/classify')">未激活会员</a></li>
                <li><a href="editor.html">商品分类</a></li>
            </ul>
        </li> <li><a href="#member_manage" class="support">统计报表</a>
            <span class="arrow"></span>
            <ul id="member_manage">
                <li><a href="javascript:void(0);" onclick="change_content('order/lists')">商品分析</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/classify')">订单分析</a></li>
                <li><a href="editor.html">商品分类</a></li>
            </ul>
        </li></li> <li><a href="#member_manage" class="support">系统设置</a>
            <span class="arrow"></span>
            <ul id="member_manage">
                <li><a href="javascript:void(0);" onclick="change_content('order/lists')">商品分析</a></li>
                <li><a href="javascript:void(0);" onclick="change_content('goods/classify')">订单分析</a></li>
                <li><a href="editor.html">商品分类</a></li>
            </ul>
        </li>
    </ul>
    <a class="togglemenu"></a>
    <br /><br />
</div><!--leftmenu-->
<div class="centercontent" id="content">
