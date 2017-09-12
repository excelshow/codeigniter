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
                                自取地址总数
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($address_list)?>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table table-hover table-bordered" style="width: 80%;margin: auto;">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>地址</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($address_list as $item):?>
                                <tr id="tr<?php echo $item['NO'] ?>">
                                    <td ><?php echo $item['NO'] ?></td>
                                    <td ><?php echo $item['address'] ?></td>
                                    <td ><button class = "btn btn-primary edit" address="<?php echo $item['address'] ?>" name="<?php echo $item['NO'] ?>">编辑</button> <button class="btn btn-primary delete" name="<?php echo $item['NO'] ?>">删除</button></td>
                                </tr>
							<?php endforeach;?>
                            <tr>
                                <td><button class="btn btn-primary" onclick="address = prompt('请输入你要新增的地址');if(address){$.post(base_url + 'setting/add_must_address',{data:address},function(data){alert(data);location.reload(true);});}">新增</button></td>
                            </tr>
                            </tbody>
                        </table>
                        <script>
                            $(".edit").click(function () {
                                data_NO = $(this).attr('name');
                                address = prompt("输入要修改的地址",$(this).attr('address'));
                                if(address){
                                    $.post(base_url + 'setting/edit_must_address',{NO:data_NO,data:address},function(data){alert(data);location.reload(true);});

                                }

                                // alert($(this).attr('name'));
                            })
                            var delete_url = base_url + "setting/delete_must_address";
                            $(".delete").click(function () {
                                if(confirm("确认删除？")){
                                    $.post(delete_url,{NO:$(this).attr('name')},function(data){alert(data)});
                                    $('#tr' + $(this).attr('name')).hide();
                                    // $.post("#"+$(this).attr('name')).html('');
                                }
                                //alert($(this).attr('name'));
                            })
                        </script>

