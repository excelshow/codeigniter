<div class="am-cf admin-main">

<div class="nav-navicon admin-main admin-sidebar">


    <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;"> 欢迎系统管理员：<?=$_SESSION['username']?></div>
    <div class="sideMenu">
      <h3 class="am-icon-flag"><em></em> <a href="#">商品管理</a></h3>
      <ul>
        <li><a href="<?=base_url('/Manage_goods/goods_list')?>">商品列表</a></li>
        <li><a href="<?=base_url('/Manage_goods/goods_new')?>">添加新商品</a></li>
        <li><a href="<?=base_url('/Manage_goods/goods_class')?>">商品分类</a></li>
        <li><a href="<?=base_url('/admin/good_manage/good_save')?>">库存管理 </a></li>
        <li><a href="<?=base_url('/admin/good_manage/user_ag')?>">用户评论</a></li>
      </ul>
      <h3 class="am-icon-cart-plus"><em></em> <a href="#"> 订单管理</a></h3>
      <ul>
        <li><a href="">订单列表</a></li>
        <li><a href="">合并订单</a></li>
        <li><a href="">订单打印</a></li>
        <li><a href="">添加订单</a></li>
        <li><a href="">发货单列表</a></li>
        <li><a href="">换货单列表</a></li>
      </ul>
      <h3 class="am-icon-users"><em></em> <a href="#">会员管理</a></h3>
      <ul>
        <li><a href="">会员列表 </a></li>
        <li><a href="">未激活会员</a></li>
        <li><a href="">团队系谱图</a></li>
        <li><a href="">会员推荐图</a></li>
        <li><a href="">推荐列表</a></li>
      </ul>
      <h3 class="am-icon-volume-up"><em></em> <a href="#">信息通知</a></h3>
      <ul>
        <li><a href="">站内消息 /留言 </a></li>
        <li><a href="">短信</a></li>
        <li><a href="">邮件</a></li>
        <li><a href="">微信</a></li>
        <li><a href="">客服</a></li>
      </ul>
      <h3 class="am-icon-gears"><em></em> <a href="#">系统设置</a></h3>
      <ul>
        <li><a href="">数据备份</a></li>
        <li><a href="">邮件/短信管理</a></li>
        <li><a href="">上传/下载</a></li>
        <li><a href="">权限</a></li>
        <li><a href="">网站设置</a></li>
        <li><a href="">第三方支付</a></li>
        <li><a href="">提现 /转账 出入账汇率</a></li>
        <li><a href="">平台设置</a></li>
        <li><a href="">声音文件</a></li>
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
        <li>
        <a href="<?=base_url('/admin')?>"><button type="button" class="am-btn am-btn-default am-radius am-btn-xs">首页</button></a>
        <li>
          <button type="button" class="am-btn am-btn-default am-radius am-btn-xs">
          产品管理<a href="<?=base_url('Manage_goods/goods_list')?>" class="am-close am-close-spin" style="font-size:12px;">+</a>
          </button>
        </li>
        <li>
        <button type="button" class="am-btn am-btn-default am-radius am-btn-xs">
        帮助中心<a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close="">×</a>
        </button>
        </li>
      </ul>
    </div>
