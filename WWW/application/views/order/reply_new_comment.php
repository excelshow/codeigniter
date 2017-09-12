<?php
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/7
 * Time: 12:44
 */
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">订单号：<?php echo $order_id?></h4>
            <input name="order_id" class="hidden" value="<?php echo $order_id?>">
        </div>
        <div class="modal-body">
            <h4>评论</h4>
            <p><?php echo $comment[0]['comment']?></p>
        </div>
        <div class="modal-body">
            <h4>回复</h4>
            <textarea id="reply_content" rows="5" style="height: 100px;width: 100%" placeholder="在这里输入回复"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" class="btn btn-primary" onclick="
                request_url = base_url + 'order/reply_comment';
                data = $('#reply_content').val();
                $.post(request_url,{order_id:<?php echo $order_id?>,reply:data},
                function () {
                           $('#myModal').modal('hide');
                           alert('回复评论成功');
                           $('#tr<?php echo $order_id?>').hide();
                });">回复评论</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->