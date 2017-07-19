
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 18:48-->
<!-- */-->
<div id="contentwrapper" class="contentwrapper">
    <div class="admin-biaogelist">
        <div class="listbiaoti am-cf">
            <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>
        </div>
        <div class="fbneirong">
            <style>
                th{background: #2D95FF}
                table,table tr th, table tr td { border:1px solid #2d95ff;text-align: center; }
                table { width: 200px; min-height: 25px; line-height: 25px; text-align: center; border-collapse: collapse;}
            </style>

            <h5>订单号：<?=$order_id?></h5>
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
            <?php
            $orderInfo = json_decode($order_info['orderInfo'],true);
            $money          =   "<h5>总金额:***********".$order_info['money']."</h5>";
            $pay_way        =   "<h5>支付方式:*********".$order_info['pay_way']."</h5>";
            $user           =   "<h5>客户:*************".$orderInfo['Address']['userName']."</h5>";
            $phone          =   "<h5>客户联系方式:******".$orderInfo['Address']['telNumber']."</h5>";
            $detail_address =   "<h5>客户详细地址:******".$orderInfo['Address']['detailInfo']."</h5>";
            echo $money.$pay_way.$user.$phone.$detail_address;
            ?>
            <div class="you" style="margin-left: 11%;">
                <?php if($status != 1){?>
                    <button type="submit" class="am-btn am-btn-success am-radius" style="background: #2eff8d">确认订单</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius" style="background: #FF0000">拒绝订单</button>
                <?php }else{?>
                    <button>打印订单</button>
                <?php }?>
            </div>

        </div>