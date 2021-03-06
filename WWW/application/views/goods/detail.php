<div class="main-content">
    <style>
        .textarea{height:600px;width:300px;}
    </style>
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php url('admin')?>">Home</a>
                <li>
                    <a href="<?php url('detail')?>"><?php echo 'detail'?></a>
                </li>
                <li class="active">
                    <?php echo $goods_id?>
                </li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">编辑商品</h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>

                            <a href="#" data-action="close">
                                <i class="ace-icon fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <?php echo form_open('goods/edit/'.$goods_id)?>
                            <!-- #section:elements.form -->
                            <?php foreach ($detail as $item):?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 名称 </label>

                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo $item['name'] ?>" name='name' placeholder="请输入名字" class="col-xs-10 col-sm-5" /><?php echo form_error('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类别 </label>

                                <div class="col-sm-9">
                                    <select style="width:150px" name="class"><?php foreach ($class as $class_name): ?><option value="<?php echo $class_name['id']?>"><?php echo $class_name['class']?></option><?php endforeach; ?></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 特供 </label>

                                <div class="col-sm-9">
                                    <select style="width:150px" name="odd" id="odd">
                                        <option value="0" >全周供应</option>
                                        <option value="1">周一供应</option>
                                        <option value="2">周二供应</option>
                                        <option value="3">周三供应</option>
                                        <option value="4">周四供应</option>
                                        <option value="5">周五供应</option>
                                        <option value="6">周六供应</option>
                                        <option value="7">周日供应</option></select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格 </label>

                                <div class="col-sm-9">
                                    <input type="number" step='0.01' name='prices' value="<?php echo $item['prices'] ?>"  class="am-input-sm" id="doc-ipt-pwd-1" placeholder="请输入价格">
                                    规格：元/<input name='spec' placeholder="请输入规格" value="<?php echo $item['spec'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 产地 </label>

                                <div class="col-sm-9">
                                    <input type="text"  name='origin' value="<?php echo $item['origin'] ?>"  rows="5" id="doc-ta-1"  placeholder="请输入产地">
                                </div>
                            </div>
                            <label for="form-field-6">功效：</label>

                            <textarea class="textarea" name="function"><?php echo $item['function'] ?></textarea>


                            <label for="form-field-6">食用方法：</label>

                            <textarea class="textarea" name="eat" ><?php echo $item['eat'] ?></textarea>


                            <label for="form-field-6">储存方法：</label>

                            <textarea class="textarea" name="save"><?php echo $item['save'] ?></textarea>
                        <div style="margin-left: 11%;">
                            <button type="submit" class="btn btn-info" id="bootbox-confirm">提交</button><button onclick="go_history();" class="btn btn-danger">放弃</button>
                        </div>
                    </div>
                    <?php endforeach;?>
                    </form>
                    <script>
                        $('#odd')[0].selectedIndex = <?php echo $detail[0]['odd']?>;
                    </script>
                </div>
            </div>







