<?php
/**
 * type:view
 * content:商品库存管理
 */
?>
<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php url('admin')?>">Home</a>
                <li>
                    <a href="<?php url($Class)?>"><?php echo $Class?></a>
                </li>
                <li class="active">
					<?php echo $function?>
                </li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="page-header">
                            <h1>
                                待回复的订单
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>

                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th width="100px">商品序号</th>
                                <th>商品名</th>
                                <th>实际库存</th>
                                <th>预入库库存</th>
                                <th>前台显示库存</th>
                                <th>入库</th>
                                <th>预入库</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($stock as $item):?>
                                <tr>
                                    <td><?php echo $item['id']?></td>
                                    <td><?php echo $item['name']?></td>
                                    <td <?php if($item['have']<=10) echo "style='color:red'"?>><?php echo $item['have']?></td>
                                    <td><?php echo $item['pre_input']?></td>
                                    <td><?php echo $item['num']?></td>
                                    <td><input id="<?php echo $item['id']?>" class="input" name="input"></td>
                                    <td><input id="<?php echo $item['id']?>" class="input" name="pre_input"></td>
                                </tr>
							<?php endforeach;?>
                            </tbody>
                        </table>
                        <script>
                            $('.input').keypress(function (event){
                                if(event.keyCode == 13){
                                    if(isNaN( $(this).val() ) ){
                                        alert('请输入数字');
                                        return false;
                                    }
                                    if(confirm('你正在修改入库，是否继续操作')){
                                        if($(this).attr('name') == 'input'){
                                            url = base_url + "goods/input";
                                            $.post(url,{goods_id:$(this).attr('id'),input:$(this).val()},function(data){alert(data);location.reload(true);});
                                        }else if($(this).attr('name') == 'pre_input'){
                                            url = base_url + "goods/pre_input";
                                            $.post(url,{goods_id:$(this).attr('id'),pre_input:$(this).val()},function(data){alert(data);location.reload(true);});
                                        }

                                    }
                                }
                            });
                        </script>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
