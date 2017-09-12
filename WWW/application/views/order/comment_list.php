<?php
/**
 * type:view
 * content:订单评价汇总列表
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
                <li>
                    <a href="<?php url($Class)?>"><?php echo $Class?></a>
                </li>
                <li class="active">
					<?php echo $function?>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">

                        <div class="page-header">
                            <h1>
                                有评价的订单
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($comment_list) ?>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table table-hover table-bordered" style="width: 80%;margin: auto;">
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>评论内容</th>
                                <th>回复</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($comment_list as $item): ?>
                                <tr>
                                    <td><a href="<?php echo base_url('index.php/order/detail/').$item['order_id']?>" target="view_windows"><?php echo $item['order_id']?></a></td>
                                    <td><?php echo $item['comment']?></td>
                                    <td><?php echo $item['reply']?></td>
                                </tr>
							<?php endforeach;?>
                            </tbody>
                        </table>
