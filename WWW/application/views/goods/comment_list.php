<?php
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/17
 * Time: 17:44
 */
?>
<?php
/**
 * type:view
 * content:有新评价待回复的订单
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
                    <a href=""><?php echo 'comment_list'?></a>
                </li>
                <li class="active">
                    商品评价
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="page-header">
                            <h1>
                                该商品所有评价
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($comment) ?>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table table-hover table-bordered" style="width: 80%;margin: auto;">
                            <thead>
                            <tr>
                                <th>商品ID</th>
                                <th>商品名</th>
                                <th>评论人</th>
                                <th>评论人内容</th>
                                <th>回复内容</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($comment as $item): ?>
                                <tr>
                                    <td><?php echo $item['goods_id']?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['user_name']?></td>
                                    <td><?php echo $item['comment']?></td>
                                    <td><?php echo $item['reply']?></td>
                                </tr>
							<?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        </div>