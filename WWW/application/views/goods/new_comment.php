<?php
/**
 * type:view
 * content:有新评价待回复的商品
 *
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/8/7-->
<!-- * Time: 10:55-->
<!-- */
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
                                待回复评论
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($comment)?>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table table-hover table-bordered" style="width: 80%;margin: auto;">
                            <thead>
                            <tr>
                                <th>评论ID</th>
                                <th>商品名</th>
                                <th>评论人</th>
                                <th>评论人内容</th>
                                <th>回复</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($comment as $item): ?>
                                <tr id="tr<?php echo $item['comment_id']?>">
                                    <td><?php echo $item['comment_id']?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td><?php echo $item['user_name']?></td>
                                    <td><?php echo $item['comment']?></td>
                                    <td><button id="<?php echo $item['comment_id']?>">回复</button></td>
                                </tr>
							<?php endforeach;?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        </div>
                        <script>
                            request_url=base_url+"goods/reply_new_comment";
                            $("button").bind("click",function (event) {
                                $('#myModal').modal('show');
                                $.post(request_url,{comment_id:$(this).attr('id')},function (data) {
                                    $("#myModal").html(data);
                                });
                            });
                        </script>