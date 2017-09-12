<?php
/**
 * type:view
 * content:用户列表
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
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="page-header">
                            <h1>
                                待回复的订单
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>

                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="table-id">会员编号</th>
                                <th class="table-id">会员姓名</th>
                                <th class="table-id">会员电话</th>
                                <th class="table-id">会员状态</th>
                                <th class="table-title">会员积分</th>
                                <th class="table-title">操作</th>
                            </tr>
                            </thead>
                            <tbody>

							<?php foreach ($user_lists as $item):?>
                                <tr>
                                    <td width="90px"><a href="#"><?php echo $item['user_no'];?></a></td>
                                    <td width="100px"><a href="#"><?php echo $item['user_name'];?></a></td>
                                    <td  width="100px"><?php echo $item['user_phone'];?></td>
                                    <td  width="100px"><center><?php echo $item['status'];?></center></td>
                                    <td><?php echo $item['user_num'];?></td>
                                    <td><a href="<?php url('member/sure_member/'.$item['user_no'])?>">激活</a>&nbsp;<a href="<?php url('member/delete_member/'.$item['user_no'])?>">删除</a>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>