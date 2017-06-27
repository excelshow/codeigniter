<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/27-->
<!-- * Time: 15:27-->
<!-- */-->
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 栏目名称</ul>
        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品详情</a></dl>
    </div>
    <div class="fbneirong">
        <?php foreach ($detail as $item): ?>
            <?=$item['id'];?>
            <?=$item['name'];?>
            <?=$item['num'];?>
            <?=$item['prices'];?>
            <?=$item['origin'];?>
            <?=$item['show'];?>
            <?=$item['eat'];?>
            <?=$item['function'];?>
            <?=$item['save'];?>
        <?php endforeach ?>
    </div>
</div>