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
            <h4 class="modal-title" id="myModalLabel">订单号：<?php echo $comment_id?></h4>
        </div>
        <div class="modal-body">
            <h4>评论</h4>
            <p><?php echo $comment?></p>
        </div>
        <div class="modal-body">
            <h4>回复</h4>
            <textarea name="reply" id="reply_content" rows="5" style="height: 100px;width: 100%" placeholder="在这里输入回复"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button id="submit" type="button" class="btn btn-primary" onclick="
                    $.post(base_url + 'goods/reply_comment',{comment_id:<?php echo $comment_id?>,reply:$('#reply_content').val()},function(data){alert(data);$('#tr<?php echo $comment_id?>').hide()});
                    $('#myModal').modal('hide');
                    ">回复评论</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal -->
<script>

</script>