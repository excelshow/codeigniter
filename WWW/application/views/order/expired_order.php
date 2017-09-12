<?php
/**
 *
 * type: view
 * content: 过期订单
 */?>
<div class="main-content">

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
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="page-header">
                                <h1>
                                    过期订单
                                    <small>
                                        <i class="ace-icon fa fa-angle-double-right"></i>
										<?php echo count($order_list) ?>
                                    </small>
                                </h1>
                            </div><!-- /.page-header -->
                            <table class="table table-hover table-bordered" style="width: 80%;margin: auto;">
                                <thead>
                                <tr>
                                    <th>订单号</th>
                                    <th>下单人</th>
                                    <th>下单人电话</th>
                                    <th>订单类型</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($order_list as $item):?>
                                    <tr id="tr<?php echo $item['order_id'] ?>">
                                        <td><a href="<?php echo base_url('index.php/order/detail/').$item['order_id']?>" target="view_windows"><?php echo $item['order_id']?></a></td>
                                        <td ><?php echo $item['user_name'] ?></td>
                                        <td ><?php echo $item['user_phone'] ?></td>
                                        <td ><?php echo $item['type'] ?></td>
                                        <td ><a href="<?php echo base_url('index.php/order/detail/').$item['order_id']?>" target="view_windows">查看</a> <button onclick="$.post(base_url + 'order/delete',{order_id:<?php echo $item['order_id']?>},function(data){alert(data);$('#tr<?php echo $item['order_id']?>').hide()});">删除</button></td>
                                    </tr>
								<?php endforeach;?>
                                </tbody>
                            </table>

                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->