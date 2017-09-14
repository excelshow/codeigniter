<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12 0012
 * Time: 15:42
 * type: view
 * content: 已完成的订单
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
								已完成的订单
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($order_list_tomeng)+count($order_list_selfna) ?>
								</small>
							</h1>
						</div><!-- /.page-header -->
						<?php echo form_open('Order/together'); ?>

						<ul class="nav nav-tabs hornav">
							<li class="active"><a href="#tomeng" data-toggle="tab">送货上门</a></li>
							<li><a href="#selfna" data-toggle="tab">定点自取</a></li>
						</ul>
						<div  class="tab-content">
							<div class="tab-pane fade in active" id="tomeng">
								<table class="table"
								       data-toggle="table"
								       data-height="460"
								       data-sort-name="name"
								       data-sort-order="desc">
									<thead>
									<tr>
										<th class="table-check"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></th>
										<th >订单号</th>
										<th >下单人</th>
										<th >下单电话</th>
										<th >详细地址</th>
										<th data-field="id" data-sortable="true">期望送达日期</th>
										<th data-field="name" data-sortable="true">下单时间</th>
										<th data-field="price" data-sortable="true">订单总金额</th>
										<th class="table-title">订单状态</th>
										<th width="163px" class="table-set">操作</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($order_list_tomeng as $item):?>
										<tr>
											<td><input type="checkbox" name="checkbox[]" value="<?php echo $item['order_id'];?>"/></td>
											<td width="90px"><a href="#"><?php echo $item['order_id'];?></a></td>
											<td width="100px"><a href="#">
													<?php
													$orderInfo = json_decode($item['orderInfo'],true);
													echo $orderInfo['Address']['userName'] ?></a></td>
											<td width="100px"><?php echo $orderInfo['Address']['telNumber'] ?></td>
											<td width="100px"><?php echo $orderInfo['Address']['detailInfo']; ?></td>
											<td><?php echo date('Y-m-d H:i:s', $item['datetime'] / 1000); ?>
											</td>
											<td>
												<?php echo date('Y-m-d H:i:s', $item['orderTime'] / 1000);?>
											</td>
											<td><?php echo $item['money']?></td>
											<td id="status<?php echo $item['order_id'];?>">
                                                <div style='color:#111bff'>已完成</div>
											</td>

											<td><div class="am-btn-toolbar">
													<div class="am-btn-group am-btn-group-xs">
                                                        <a href="<?php url('order/detail/'.$item['order_id'])?>">查看</a>
														<a href="javascript:void(0);" onclick="request_url = base_url + 'order/delete';if(confirm('确认删除？')){$.post(request_url,{order_id:<?php echo $item['order_id'];?>},function(data) {alert(data);})}">删除</a>
													</div>
												</div></td>
										</tr>
									<?php endforeach;?>
									</tbody>
								</table>
							</div><!--/.tomeng -->
							<div class="tab-pane fade" id="selfna">

								<table class="stdtable stdtablecb"
								       data-toggle="table"
								       data-height="460"
								       data-sort-name="name"
								       data-sort-order="desc">
									<thead>
									<tr class="am-success">
										<th class="table-check"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></th>
										<th class="table-id">订单号</th>
										<th class="table-id">下单人</th>
										<th class="table-id">下单电话</th>
										<th class="table-id">自取地址</th>
										<th data-field="id" data-sortable="true">期望送达日期</th>
										<th data-field="name" data-sortable="true">下单时间</th>
										<th data-field="price" data-sortable="true">订单总金额</th>
										<th class="table-title">订单状态</th>
										<th width="163px" class="table-set">操作</th>
									</tr>
									</thead>
									<tbody>
									<?php foreach ($order_list_selfna as $item):?>
										<tr>
											<td><input type="checkbox" name="checkbox[]" value="<?php echo $item['order_id'];?>"/></td>
											<td width="90px"><a href="#"><?php echo $item['order_id'];?></a></td>
											<td width="100px"><a href="#">
													<?php
													$orderInfo = json_decode($item['orderInfo'],true);
													echo $orderInfo['Address']['userName'] ?></a></td>
											<td width="100px"><?php echo $orderInfo['Address']['telNumber'] ?></td>
											<td width="100px"><?php echo $orderInfo['Address']['fixed_address']; ?></td>
											<td><?php echo date('Y-m-d H:i:s', $item['datetime'] / 1000); ?>
											</td>
											<td>
												<?php
												echo date('Y-m-d H:i:s', $item['orderTime'] / 1000);?>
											</td>
											<td><?php echo $item['money']?></td>
											<td id="status<?php echo $item['order_id'];?>">
												<div style='color:#111bff'>已完成</div>
											</td>

											<td><div class="am-btn-toolbar">
													<div class="am-btn-group am-btn-group-xs">
                                                        <a href="<?php url('order/detail/'.$item['order_id'])?>">查看</a>
														<a href="javascript:void(0);" onclick="request_url = base_url + 'order/delete';if(confirm('确认删除？')){$.post(request_url,{order_id:<?php echo $item['order_id'];?>},function(data) {
															alert(data);
															})}">删除</a>
													</div>
												</div></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
								<div class="modal" id="mymodal" data-backdrop="static">

									<div class="modal-dialog">

										<div class="modal-content" id="mymodal_content">


										</div><!-- /.modal-content -->

									</div><!-- /.modal-dialog -->

								</div><!-- /.modal --></div><!--/.tomeng --></div>
					</div>