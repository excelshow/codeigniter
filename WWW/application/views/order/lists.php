<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 11:26-->
<!-- */-->
<div id="contentwrapper" class="contentwrapper">
    <div class="contenttitle2">
        <h3>订单列表</h3>
    </div><!--contenttitle-->
    <div class="tableoptions">
        <button class="deletebutton radius3" title="table2">排序方式</button> &nbsp;
        <select class="radius3">
            <option value="">默认</option>
            <option value="">预计送达时间</option>
            <option value="">下单时间</option>
        </select> &nbsp;
        <button class="radius3">应用</button>
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
        <tr class="am-success">
            <th class="table-check"><input type="checkbox" /></th>
            <th class="table-id">订单号</th>
            <th class="table-id">下单人</th>
            <th class="table-id">下单电话</th>
            <th class="table-id">详细地址</th>
            <th class="table-title">期望送达日期</th>
            <th width="163px" class="table-set">订单总金额</th>
            <th width="163px" class="table-set">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order_list as $item):?>
            <tr>
                <td><input type="checkbox" /></td>
                <td width="90px"><a href="#"><?=$item['order_id'];?></a></td>
                <td width="100px"><a href="#"><?php $orderInfo = json_decode($item['orderInfo'],true); echo $orderInfo['Address']['userName']?></a></td>
                <td  width="100px"><?=$orderInfo['Address']['telNumber']?></td>
                <td  width="100px"><center><?=$orderInfo['Address']['detailInfo']?></center></td>
                <td><?=$item['datetime'];?></td>
                <td><?=$item['money']?></td>
                <td><div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="javascript:void(0);" onclick="change_content('order/detail/'+<?=$item['order_id'];?>)">查看</a>
                            <a href="javascript:void(0);" onclick="change_content('order/detail/'+<?=$item['order_id'];?>)">删除</a>
                        </div>
                    </div></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>