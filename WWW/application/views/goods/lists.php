<div id="contentwrapper" class="contentwrapper">
<div class="contenttitle2">
    <h3>商品列表</h3>
</div><!--contenttitle-->
<div class="tableoptions">
    <button class="deletebutton radius3" title="table2">Delete Selected</button> &nbsp;
    <select class="radius3">
        <option value="">Show All</option>
        <option value="">Rendering Engine</option>
        <option value="">Platform</option>
    </select> &nbsp;
    <button class="radius3">Apply Filter</button>
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
        <td><img width='90px' height='50px' src="<?php echo base_url('uploads/'.$item['id'].'-0.jpg')?>"></td>
        <td class="center"><?=$item['prices']?></td>
        <td class="center"><?=$item['num']?></td>
        <td class="center"><?=$item['class']?></td>
        <td class="center"><a href="" class="edit">查看详情</a><a href="" class="edit">编辑</a> &nbsp; <a href="" class="delete">删除</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>