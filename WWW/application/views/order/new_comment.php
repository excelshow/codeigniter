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
                                <?php echo count($comment) ?>
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
                        <?php foreach ($comment as $item): ?>
                            <tr id="tr<?php echo $item['order_id'];?>">
                                <td><a href="<?php echo base_url('index.php/order/detail/').$item['order_id']?>" target="view_windows"><?php echo $item['order_id']?></a></td>
                                <td><?php echo $item['comment']?></td>
                                <td><button id="<?php echo $item['order_id']?>">回复</button></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="modal" id="myModal" data-backdrop="static">

                        <div class="modal-dialog">

                            <div class="modal-content" id="myModal_content">


                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                    </div><!-- /.modal -->
                    <script>
                        request_url=base_url+"setting/reply_new_comment";
                        $("button").bind("click",function (event) {
                            $('#myModal').modal('show');
                            $.post(request_url,{order_id:$(this).attr('id')},function (data) {
                                $("#myModal").html(data);
                            });
                        });
                    </script>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->