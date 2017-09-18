<?php
/**
 * Created by 醉月思
 * Date: 2017/9/3
 * Time: 8:33
 * function: 模态对话框内容-编辑图片
 */
header("Cache-Control: no-cache, must-revalidate");
?>
<style>
    .modal-body div{
        width: 90px;
        height: 50px;
        margin: 5px;
        display: inline-block;
    }
    .modal-body div img{
        width: 90px;
        height: 50px;
    };

</style>
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" onclick="location.reload(true);">&times;</span><span class="sr-only" onclick="location.reload(true);">Close</span></button>

    <h4 class="modal-title">商品Id:<?php echo $goods_id?></h4>

</div>

<div class="modal-body">
    <form id="upload_form">
		<?php $i=$filenum; for($i--;$i>=0;$i--){?>
            <div><img src="<?php echo base_url('uploads/'.$goods_id.'-'.$i.'.jpg')?>"><a href="#" onclick="$.post(base_url + 'goods/delete_pic',{goods_id:<?php echo $goods_id?>,pic_id:<?php echo $i?>},function(data){alert(data);btn_click('goods/edit_pic/<?php echo $goods_id?>')});"><span style="
    position: relative;
    top: -70px;
    right: -80px;
    background-color: red;
" id="overdued_orders" class="badge mybadge" >x</span></a></div>
		<?php }
		?>
        <a href="#" onclick="
        $('#upload').trigger('click');"><i align="center" class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
        <input id="upload" onchange="
                if($(this).val()){
                $.ajax({
                url: base_url + 'goods/upload_pic/<?php echo $goods_id?>/<?php echo $filenum?>' ,
                type: 'POST',
                data: new FormData($('#upload_form')[0]),
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                if(returndata == 1){
                btn_click('goods/edit_pic/<?php echo $goods_id?>');
                }
                },
                error: function (returndata) {
                alert(returndata);
                }
                });

                }
                " type="file" name="file" class="hidden"accept="image/jpeg" />
</div></form>
