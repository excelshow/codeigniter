<?php
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/7/10
 * Time: 11:08
 */
?>
<div class="pageheader">
    <h1 class="pagetitle">库存管理</h1>
</div>
<div id="contentwrapper" class="contentwrapper">
    <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
        <colgroup>
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
            <col class="con1" />
            <col class="con0" />
        </colgroup>
        <thead>
        <tr>
            <th class="head0">商品Id</th>
            <th class="head1">商品名</th>
            <th class="head1">实际库存</th>
            <th class="head1">库存余量</th>
        </tr>
        </thead>
        <?php foreach ($stock as $item): ?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['name']?></td>
        <td><span id="<?='have'.$item['id']?>"><?=$item['have']?></span><input id="<?='input_h'.$item['id']?>"  style="border-left-width: 3px; margin-left: 2em;"><button onclick="var a=document.getElementById('<?='input_h'.$item['id']?>').value;update_data('goods/add_have/<?=$item['id']?>/','<?='have'.$item['id']?>',a);">入库</button></td>
        <td><span id="<?='num'.$item['id']?>"><?=$item['num']?></span><input id="<?='input_n'.$item['id']?>"  style="border-left-width: 3px; margin-left: 2em;"><button onclick="var a=document.getElementById('<?='input_n'.$item['id']?>').value;update_data('goods/add_num/<?=$item['id']?>/','<?='num'.$item['id']?>',a);">预入库</button></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>