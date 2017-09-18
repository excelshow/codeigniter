<?php
/**
 * type : view
 * content : 商品列表
 */

?>
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
                                    商品列表
                                    <small>
                                        <i class="ace-icon fa fa-angle-double-right"></i>
										<?php echo count($goods) ?>
                                    </small>
                                </h1>
                            </div><!-- /.page-header -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="checkall" /></th>
                                    <th>商品</th>
                                    <th>商品名称</th>
                                    <th>商品缩略图</th>
                                    <th>商品价格</th>
                                    <th>剩余数量</th>
                                    <th>商品分类 </th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($goods as $item): ?>
                                    <tr>
                                        <td align="center"><input type="checkbox" /></td>
                                        <td><?php echo $item['id'];?></td>
                                        <td><?php echo $item['name'];?></td>
                                        <td>
                                            <img width='90px' height='50px' src="<?php echo base_url('uploads/'.$item['id'].'-0.jpg')?>">
                                            <a href="javascript:void(0);" onclick="btn_click('goods/edit_pic/<?php echo $item['id']?>');">编辑图片</a>
                                        </td>
                                        <td class="center"><?php echo $item['prices']?></td>
                                        <td class="center"><?php echo $item['num']?></td>
                                        <td class="center"><?php echo $item['class']?></td>
                                        <td class="center">&nbsp;<a href="<?php url('goods/comment_list/'.$item['id'])?>">查看评价</a>&nbsp;<a href="<?php url('goods/detail/'.$item['id'])?>">编辑</a> &nbsp; <a href="<?php url('goods/delete/'.$item['id'])?>">删除</a></td>
                                    </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="modal" id="myModal" data-backdrop="static">

                                <div class="modal-dialog">

                                    <div class="modal-content" id="mymodal_content">


                                    </div><!-- /.modal-content -->

                                </div><!-- /.modal-dialog -->

                            </div><!-- /.modal -->
