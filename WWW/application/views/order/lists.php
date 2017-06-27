<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 11:26-->
<!-- */-->
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 栏目名称</ul>
      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>
    </div>
    <div class="fbneirong">
        <form class="am-form am-g">
            <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
                <thead>
                <tr class="am-success">
                    <th class="table-check"><input type="checkbox" /></th>
                    <th class="table-id">订单号</th>
                    <th class="table-id">下单人</th>
                    <th class="table-id">下单电话</th>
                    <th class="table-id">详细地址</th>
                    <th class="table-title">期望送达日期</th>
                    <th width="163px" class="table-set">订单总金额</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($order_list as $item):?>
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td width="90px"><a href="#"><?=$item['order_id'];?></a></td>
                        <td width="100px"><a href="#"><?php $user_info = json_decode($item['user_info'],true); echo $user_info['userAddress']['userName']?></a></td>
                        <td  width="100px"><?=$user_info['userAddress']['telNumber']?></td>
                        <td  width="100px"><center><?=$user_info['userAddress']['detailInfo']?></center></td>
                        <td><?=$item['datetime'];?></td>
                        <td><?=$item['money']?></td>
                        <td><div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="/order/detail/<?=$item['order_id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-success am-round"><span class="am-icon-search"></span></button></a>
                                    <a href="/manage_goods/edit_goods/<?=$item['order_id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round"><span class="am-icon-pencil-square-o"></span></button></a>
                                    <a href="/manage_goods/delete_goods/<?=$item['order_id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-round"><span class="am-icon-trash-o"></span></button></a>
                                </div>
                            </div></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <ul class="am-pagination am-fr">
                <li class="am-disabled"><a href="#">«</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </form>
</div>
</div>