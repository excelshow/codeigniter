<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 11:26-->
<!-- */-->
<?php echo form_open('Order/together'); ?>
<div id="contentwrapper" class="contentwrapper">
    <?php if($dist == 1){ echo "<h1>待备货单数".count($order_list)."</h1>"; }?>
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
            <th class="table-check"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></th>
            <th class="table-id">订单号</th>
            <th class="table-id">下单人</th>
            <th class="table-id">下单电话</th>
            <th class="table-id">详细地址</th>
            <th class="table-title">期望送达日期</th>
            <th width="150px" class="table-set">订单总金额</th>
            <th class="table-title">订单状态</th>
            <th width="163px" class="table-set">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($order_list as $item):?>
            <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?=$item['order_id'];?>"/></td>
                <td width="90px"><a href="#"><?=$item['order_id'];?></a></td>
                <td width="100px"><a href="#"><?php $orderInfo = json_decode($item['orderInfo'],true); echo $orderInfo['Address']['userName']?></a></td>
                <td  width="100px"><?=$orderInfo['Address']['telNumber']?></td>
                <td  width="100px"><?=$orderInfo['Address']['detailInfo']?></td>
                <td><?php
                    echo date('Y-m-d H:i:s',$item['datetime']/1000);
                    $overtime=FALSE;
                    if($item['datetime']/1000 <= time()){
                        $overtime=TRUE;
                    }
                    ?>
                </td>
                <td><?=$item['money']?></td>
                <td id="status<?=$item['order_id'];?>">
                    <?php
                    if($overtime && $item['status'] == 1){
                        echo "已过期,请退款";
                    }
                    else{
                        switch($item['status']){
                            case 0:
                                echo "<div style='color:#ff2821'>未支付</div>";break;
                            case 1:
                                echo "<div style='color:#0aff25'>已支付</div>";break;
                            case -1:
                                echo "<div style='color:#1920ff'>已完成</div>";break;
                            case 2:
                                echo "<div style='color:#1920ff'>已备货</div>";break;
                            case 3:
                                echo "<div style='color:#1920ff'>已分配</div>";break;

                        }
                    }
                    ?>
                </td>

                <td><div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="javascript:void(0);" onclick="change_content('order/detail/<?=$item['order_id'];?>')">查看</a>
                            <a href="javascript:void(0);" onclick="change_content('order/detail/'+<?=$item['order_id'];?>')">删除</a>
                            <a href="javascript:void(0);">退款</a>
                            <?php
                            if($item['status'] == 2 ){ ?>
                                <button id="btn<?=$item['order_id']?>" class='btn btn-primary' type='button' onclick='btn_click("<?=$item['order_id']?>")'>备货完成</button>
                        <?php
                            }else if($item['status'] == 1){
                                if(!$overtime){ ?>
                                    <button id="btn<?=$item['order_id']?>" class='btn btn-primary' type='button' onclick='btn_click("<?=$item['order_id']?>")'>开始备货</button>
                                <?php }else{    ?>
                                    <button class='btn btn-danger' type='button')'>已过期</button>
                                <?php }
                            }else if($item['status'] == 3){
                                echo "<button type='button' style='background: #838383;border-color: #444444'>订单已分配</button>";
                            }else if($item['status'] == -1){
                                echo "<button type='button' style='background: #838383;border-color: #444444'>订单已完成</button>";
                            }
                            ?>
                        </div>
                    </div></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php if($dist == 2) { ?>
        <label>快递员：</label>
        <select name="deliver" style="min-width:180px">
            <?php foreach ($deliver as $item): ?>
            <option><?=$item['name']?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-primary" type="submmit">分配并下载备货详情</button>

    <?php } ?>
    <div class="modal" id="mymodal" data-backdrop="static">

        <div class="modal-dialog">

            <div class="modal-content" id="mymodal_content">


            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->

