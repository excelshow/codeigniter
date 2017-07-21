<div id="contentwrapper" class="contentwrapper">

<div class="contenttitle2">
    <h3>商品列表</h3>
</div><!--contenttitle-->
<div class="tableoptions">
    <button class="deletebutton radius3" title="table2">选择分类</button> &nbsp;
    <select class="radius3" id="class">
        <option value="all">全部</option>
        <?php foreach ($class as $item): ?>
        <option value="<?=$item['class']?>"><?=$item['class']?></option>
        <?php endforeach; ?>
        <option value="<?=$dist?>" selected="selected">已选》<?=$dist?></option>
    </select> &nbsp;

    <button onclick="update_data('goods/lists/','content',document.getElementById('class').value)" class="radius3">应用</button>
</div><!--tableoptions-->
<table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
    <colgroup>
        <col class="con0" style="width: 4%" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
        <col class="con1" />
        <col class="con0" />
    </colgroup>
    <thead>
    <tr>
        <th class="head0"><input type="checkbox" class="checkall" /></th>
        <th class="head1">商品</th>
        <th class="head0">商品名称</th>
        <th class="head1">商品缩略图</th>
        <th class="head0">商品价格</th>
        <th class="head1">剩余数量</th>
        <th class="head1">商品分类 </th>
        <th class="head0">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($goods as $item): ?>
    <tr>
        <td align="center"><input type="checkbox" /></td>
        <td><?=$item['id'];?></td>
        <td><?=$item['name'];?></td>
        <td><img width='90px' height='50px' src="<?=base_url('uploads/'.$item['id'].'-0.jpg')?>"></td>
        <td class="center"><?=$item['prices']?></td>
        <td class="center"><?=$item['num']?></td>
        <td class="center"><?=$item['class']?></td>
        <td class="center">&nbsp;<a href="javascript:void(0);" onclick="change_content('goods/detail/'+<?=$item['id'];?>)" class="edit">编辑</a> &nbsp; <a href="javascript:void(0);" onclick="change_content('goods/delete/'+<?=$item['id'];?>)" class="delete">删除</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>