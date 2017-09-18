<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/7/27-->
<!-- * Time: 16:15-->
<!-- * function:备货系统的订单内容-->
<!-- */-->
<?php echo form_open('goods','name="stocking"'); ?>
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

    <h4 class="modal-title">订单号:<?php echo $order_id?></h4>

</div>

<div class="modal-body">

    <p >
    <table class="table table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>序号</th>
            <th>商品名</th>
            <th>单价</th>
            <th>下订量</th>
            <th>实际量</th>
            <th>差量</th>
            <th>金额偏差</th>
            <th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach ($data as $item):?>
        <tr>
            <th><?php echo $i++?></th>
            <td><?php echo $item['name']?></td>
            <td id="prices<?php echo $item['id']?>"><?php echo $item['prices']?></td>
            <td id="selc_num<?php echo $item['id']?>"><?php echo $item['select_num']?></td>
            <th><input id="act_num<?php echo $item['id']?>" name="<?php echo $item['id']?>" class="applyCertNum" step="0.01" type="number" value="<?php echo $item['act_num']?>">斤</th>
            <th id="sub<?php echo $item['id']?>"><?php echo $sub = ($item['act_num']-$item['select_num'])?></th>
            <th id="sub_money<?php echo $item['id']?>"><?php echo $sub*$item['prices']?></th>
            <?php if($item['stocked']){?>
            <th id="status<?php echo $item['id']?>" style="color: blue">已完成</th>
            <?php }else{ ?>
            <th id="status<?php echo $item['id']?>" style="color: #ffa319">未完成</th>
            <?php } ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<!--    <ul>-->
<!--        <li>订单金额:4</li>-->
<!--        <li>实际金额:4.8</li>-->
<!--        <li>金额偏差:-0.8</li>-->
<!--    </ul>-->
    </p >

</div>
<?php echo form_close()?>
<div class="modal-footer">

    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>


</div>
<script>
    request_url=base_url+"order/stocking_goods/<?php echo $order_id?>";
    next_request_url=base_url+"order/next_order/1";
    var inputs = $("form[name='stocking']").find("input"); // 获取表单中的所有输入框
    inputs[0].focus();
    inputs[0].select();
    $('.applyCertNum').bind('keypress',function(event){
        if(event.keyCode == "13")
        {

            var idx = inputs.index(this); // 获取当前焦点输入框所处的位置
            if (idx == inputs.length - 1) {// 判断是否是最后一个输入框
                if (confirm("最后一个输入框已经输入,是否提交?")) // 用户确认
                    $("#mymodal_content").html("正在提交，转接下一个订单。");
                    $.post(next_request_url,{order_id:<?php echo $order_id?>},function(data) {$("#mymodal_content").html(data);$("#btn<?php echo $order_id?>").html("备货完成");});
            } else {
                inputs[idx + 1].focus(); // 设置焦点
                inputs[idx + 1].select(); // 选中文字
            }
            id_name=this.name;
            $.post(request_url,{value:$(this).val(),id:id_name},function(data) {
                prices_id = "#prices"+id_name;
                selc_num_id = "#selc_num"+id_name;
                act_num_id = "#act_num"+id_name;
                sub_id="#sub"+id_name;
                sub_money_id ="#sub_money"+id_name;
                status_id="#status"+id_name;
                $(status_id).html(data).css("color","blue");
                $(sub_id).html($(act_num_id).val()-$(selc_num_id).text());
                $(sub_money_id).html($(sub_id).text()*$(prices_id).text());
            });
        }
    });
</script>
