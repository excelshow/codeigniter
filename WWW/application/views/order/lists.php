<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/16-->
<!-- * Time: 11:26-->
<!-- */-->
<?php echo form_open('Order/together'); ?>
<link rel="stylesheet" href="<?php echo base_url('/assets/bootstrap_table/bootstrap-table.min.css')?>">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url('/assets/bootstrap_table/bootstrap-table.min.js')?>"></script>

            <ul class="nav nav-tabs hornav">
                <li class="active"><a href="#tomeng" data-toggle="tab">送货上门</a></li>
                <li><a href="#selfna" data-toggle="tab">定点自取</a></li>
            </ul>
<div  class="tab-content">
    <div class="tab-pane fade in active" id="tomeng">
        <table class="table"
                data-toggle="table"
               data-height="460"
               data-sort-name="name"
               data-sort-order="desc">
            <thead>
            <tr>
                <th class="table-check"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></th>
                <th >订单号</th>
                <th >下单人</th>
                <th >下单电话</th>
                <th >详细地址</th>
                <th data-field="id" data-sortable="true">期望送达日期</th>
                <th data-field="name" data-sortable="true">下单时间</th>
                <th data-field="price" data-sortable="true">订单总金额</th>
                <th class="table-title">订单状态</th>
                <th width="163px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_list_tomeng as $item):?>
                <tr>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $item['order_id'];?>"/></td>
                    <td width="90px"><a href="#"><?php echo $item['order_id'];?></a></td>
                    <td width="100px"><a href="#">
                            <?php
                            $orderInfo = json_decode($item['orderInfo'],true);
                            echo $orderInfo['Address']['userName'] ?></a></td>
                    <td width="100px"><?php echo $orderInfo['Address']['telNumber'] ?></td>
                    <td width="100px"><?php echo $orderInfo['Address']['detailInfo']; ?></td>
                    <td><?php
                        echo date('Y-m-d H:i:s', $item['datetime'] / 1000);
                        $overtime = FALSE;
                        if ($item['datetime'] / 1000 <= time()) {
                            $overtime = TRUE;
                        }?>
                    </td>
                    <td>
                        <?php
                        echo date('Y-m-d H:i:s', $item['orderTime'] / 1000);?>
                    </td>
                    <td><?php echo $item['money']?></td>
                    <td id="status<?php echo $item['order_id'];?>">
                        <?php
                        if($overtime && $item['status'] == '1'){
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
                                <a href="javascript:void(0);" onclick="change_content('order/detail/<?php echo $item['order_id'];?>')">查看</a>
                                <a href="javascript:void(0);" onclick="request_url = base_url + 'order/delete';if(confirm('确认删除？')){$.post(request_url,{order_id:<?php echo $item['order_id'];?>},function(data) {
                                        alert(data);
                                        })}">删除</a>
                                <a href="javascript:void(0);">退款</a>
                                <?php
                                if($item['status'] == 2 ){ ?>
                                    <button id="btn<?php echo $item['order_id']?>" class='btn btn-primary' type='button' onclick='btn_click("<?php echo $item['order_id']?>")'>备货完成</button>
                                    <?php
                                }else if($item['status'] == 1){
                                    if(!$overtime){ ?>
                                        <button id="btn<?php echo $item['order_id']?>" class='btn btn-primary' type='button' onclick='btn_click("<?php echo $item['order_id']?>")'>开始备货</button>
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
                    <option><?php echo $item['name']?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" type="submmit">分配并下载备货详情</button>

        <?php } ?>
        </div><!--/.tomeng -->
    <div class="tab-pane fade" id="selfna">
       
         <table class="stdtable stdtablecb"
                data-toggle="table"
               data-height="460"
               data-sort-name="name"
               data-sort-order="desc">
            <thead>
            <tr class="am-success">
                <th class="table-check"><input type="checkbox" name="all" onclick="check_all(this,'checkbox[]')" /></th>
                <th class="table-id">订单号</th>
                <th class="table-id">下单人</th>
                <th class="table-id">下单电话</th>
                <th class="table-id">自取地址</th>
                <th data-field="id" data-sortable="true">期望送达日期</th>
                <th data-field="name" data-sortable="true">下单时间</th>
                <th data-field="price" data-sortable="true">订单总金额</th>
                <th class="table-title">订单状态</th>
                <th width="163px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order_list_selfna as $item):?>
                <tr>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $item['order_id'];?>"/></td>
                    <td width="90px"><a href="#"><?php echo $item['order_id'];?></a></td>
                    <td width="100px"><a href="#">
                            <?php
                            $orderInfo = json_decode($item['orderInfo'],true);
                            echo $orderInfo['Address']['userName'] ?></a></td>
                    <td width="100px"><?php echo $orderInfo['Address']['telNumber'] ?></td>
                    <td width="100px"><?php echo $orderInfo['Address']['fixed_address']; ?></td>
                    <td><?php
                        echo date('Y-m-d H:i:s', $item['datetime'] / 1000);
                        $overtime = FALSE;
                        if ($item['datetime'] / 1000 <= time()) {
                            $overtime = TRUE;
                        }?>
                    </td>
                    <td>
                        <?php
                        echo date('Y-m-d H:i:s', $item['orderTime'] / 1000);?>
                    </td>
                    <td><?php echo $item['money']?></td>
                    <td id="status<?php echo $item['order_id'];?>">
                        <?php
                        if($overtime && $item['status'] == '1'){
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
                                <a href="javascript:void(0);" onclick="change_content('order/detail/<?php echo $item['order_id'];?>')">查看</a>
                                <a href="javascript:void(0);" onclick="request_url = base_url + 'order/delete';if(confirm('确认删除？')){$.post(request_url,{order_id:<?php echo $item['order_id'];?>},function(data) {
                                        alert(data);
                                        })}">删除</a>
                                <a href="javascript:void(0);">退款</a>
                            </div>
                            <?php if(!$overtime){?>
                            <button class="btn btn-primary" type="button" onclick='btn_click("<?php echo $item['order_id']?>")'>
                                开始备货
                            </button>
                    <?php } ?>
                        </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="modal" id="mymodal" data-backdrop="static">

            <div class="modal-dialog">

                <div class="modal-content" id="mymodal_content">


                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal --></div><!--/.tomeng --></div>
</div>
