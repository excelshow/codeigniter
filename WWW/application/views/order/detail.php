<?php
/**
 * type:view
 * content:有新评价待回复的订单
 * Created by PhpStorm
 * User: 醉月思
 * Date: 2017/6/16
 * Time: 18:48
 */
?>
<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php url('admin')?>">Home</a>
                </li>

                <li>
                    <a href="#"><?php echo 'detail'?></a>
                </li>
                <li class="active">
	                <?php echo $order_id?>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="page-header">
                            <h1>
                                订单号：
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo $order_id?>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
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
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['prices']?></td>
                                    <td><?php echo $item['select_num']?></td>
                                    <td><?php echo  $item['prices']*$item['select_num'] ?></td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
						<?php
						$orderInfo = json_decode($order_info['orderInfo'],true);
						$money          =   "<h5>总金额:***********".$order_info['money']."</h5>";
						$pay_way        =   "<h5>支付方式:*********".$order_info['pay_way']."</h5>";
						if($order_info['type']){
							$fixed_address = "<h5>自取地址:*************".$orderInfo['Address']['fixed_address']."</h5>";
							echo $money.$pay_way.$fixed_address;
						}else{
							$user           =   "<h5>客户:*************".$orderInfo['Address']['userName']."</h5>";
							$phone          =   "<h5>客户联系方式:******".$orderInfo['Address']['telNumber']."</h5>";
							$detail_address =   "<h5>客户详细地址:******".$orderInfo['Address']['detailInfo']."</h5>";
							echo $money.$pay_way.$user.$phone.$detail_address;
						}
						echo "用户评价:".$comment[0]['comment'];
						?>
                        <div class="you" style="margin-left: 11%;">
							<?php if($status == 0){?>
                                <button type="submit" class="am-btn am-btn-success am-radius" style="background: #2eff8d">确认订单</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius" style="background: #FF0000">拒绝订单</button>
							<?php }else{?>
                                <button class="btn btn_primary">打印订单</button>
							<?php }?>
                        </div>

                    </div>