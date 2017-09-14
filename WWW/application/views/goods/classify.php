<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php url('admin')?>">Home</a>
                </li>

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
                                分类
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo count($class) ?>&nbsp;<button onclick="classname=prompt('请输入你要增加的类名');if(classname != null){
										    $.post(base_url + 'goods/add_class',{class:classname},function(data){alert(data);location.reload(true);});
										}else{alert('你已取消');}">新增</button>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->
                        <table class="table"
                               data-toggle="table"
                               data-height="460"
                               >
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>类名</th>
                                <th>操作</th>
                                <th>顺序</th>
                            </tr>
                            </thead>
							<?php foreach ($class as $item): ?>
                                <tr>
                                    <td><?php echo $item['id']?></td>
                                    <td><?php echo $item['class']?></td>
                                    <td><button onclick="new_class_name=prompt('请输入你要修改的类名','<?php echo $item['class']?>');if(new_class_name != null){
                                                $.post(base_url + 'goods/edit_class',{old:'<?php echo $item['class']?>',new:new_class_name},function(data){alert(data);location.reload(true);});
                                                }else{alert('你已取消');}">编辑</button><button onclick="
                                                $.post(base_url + 'goods/delete_class',{class:'<?php echo $item['class']?>'},function(data){alert(data);location.reload(true);});
                                                ">删除</button></td>
                                    <td><a href="<?php url('goods/up_class/'.$item['id'])?>"><i class="fa fa-arrow-up" aria-hidden="true"></i>上移</a>&nbsp; <a href="<?php url('goods/down_class/'.$item['id'])?>"><i class="fa fa-arrow-down" aria-hidden="true"></i>下移</a></td>
                                </tr>
							<?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->