<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19 0019
 * Time: 22:38
 */
var_dump($deliver);
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
						<!-- PAGE CONTENT BEGINS -->
						<div class="page-header">
							<h1>
								快递员数
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>

								</small>
							</h1>
						</div><!-- /.page-header -->
						<table class="table table-hover table-bordered">
							<thead>
							<tr>
								<th class="table-id">快递员编号</th>
								<th class="table-id">快递员姓名</th>
								<th class="table-id">快递员电话</th>
								<th class="table-id">快递员账号</th>
								<th class="table-id">快递员密码</th>
								<th class="table-id">快递员状态</th>
								<th class="table-title">操作</th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ($deliver as $item):?>
								<tr>
									<td width="90px"><a href="#"><?php echo $item['deliver_id'];?></a></td>
									<td width="100px"><a href="#"><?php echo $item['name'];?></a></td>
									<td  width="100px"><?php echo $item['phone_number'];?></td>
									<td  width="100px"><?php echo $item['account'];?></td>
									<td  width="100px"><?php echo $item['password'];?></td>
									<td  width="100px"><center><?php echo $item['status'];?></center></td>
									<td><a href="<?php url('setting/sure_member/'.$item['deliver_id'])?>">激活</a>&nbsp;<a href="<?php url('setting/delete_member/'.$item['deliver_id'])?>">删除</a>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>