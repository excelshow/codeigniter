<div class="am-cf admin-main">

<div class="nav-navicon admin-main admin-sidebar">


    <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;"> 欢迎系统管理员：<?=$_SESSION['username']?></div>
    <div class="sideMenu">
      <h3 class="am-icon-flag"><em></em> <a href="#">商品管理</a></h3>
      <ul>
        <li><a href="<?=base_url('/Goods/lists')?>">商品列表</a></li>
        <li><a href="<?=base_url('/Goods/add')?>">添加新商品</a></li>
        <li><a href="<?=base_url('/Goods/classify')?>">商品分类</a></li>
        <li><a href="<?=base_url('/Manage_order/test')?>">库存管理 </a></li>
        <li><a href="<?=base_url('/admin/goods/user_ag')?>">用户评论</a></li>
      </ul>
      <h3 class="am-icon-cart-plus"><em></em> <a href="#"> 订单管理</a></h3>
      <ul>
        <li><a href="<?=base_url('/order/lists')?>">订单列表</a></li>
        <li><a href="">合并订单</a></li>
        <li><a href="<?=base_url('/Manage_order/test')?>">订单打印</a></li>
      </ul>
      <h3 class="am-icon-users"><em></em> <a href="#">会员管理</a></h3>
      <ul>
        <li><a href="<?=base_url('/member/lists')?>">会员列表 </a></li>
        <li><a href="<?=base_url('/member/unlists')?>">未激活会员</a></li>
      </ul>
    </div>
    <!-- sideMenu End -->

    <script type="text/javascript">
			jQuery(".sideMenu").slide({
				titCell:"h3", //鼠标触发对象
				targetCell:"ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
				effect:"slideDown", //targetCell下拉效果
				delayTime:300 , //效果时间
				triggerTime:150, //鼠标延迟触发时间（默认150）
				defaultPlay:true,//默认是否执行效果（默认true）
				returnDefault:true //鼠标从.sideMen移走后返回默认状态（默认false）
				});
		</script>
    </div>
    <div class=" admin-content">

        <div class="daohang">
            <ul>
                <a href="<?=base_url('/admin')?>"><li><button type="button" class="am-btn am-btn-default am-radius am-btn-xs"> 首页 </button></li></a>
            </ul>
        </div>
