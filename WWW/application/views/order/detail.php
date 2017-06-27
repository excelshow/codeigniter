
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 18:48-->
<!-- */-->
<div class="admin-biaogelist">
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 栏目名称</ul>
        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>
    </div>
    <div class="fbneirong">
        <style>
            th{background: #2D95FF}
            table,table tr th, table tr td { border:1px solid #2d95ff;text-align: center; }
            table { width: 200px; min-height: 25px; line-height: 25px; text-align: center; border-collapse: collapse;}
        </style>

        <h3>订单号：<?=$order_id?></h3>
        <table>
            <thead>
                <th>商品</th>
                <th>价格</th>
                <th>下单数</th>
                <th>金额</th>
            </thead>
            <tbody>
                    <?php foreach ($data as $item):?>
                    <tr>
                        <td><?=$item['name']?></td>
                        <td><?=$item['prices']?></td>
                        <td><?=$item['select_num']?></td>
                        <td><?php echo  $item['prices']*$item['select_num'] ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <h2>总金额：</h2>
        <div class="you" style="margin-left: 11%;">
            <button type="submit" class="am-btn am-btn-success am-radius" style="background: #2eff8d">确认订单</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius" style="background: #FF0000">拒绝订单</button>

        </div>
</div>