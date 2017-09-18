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
        </div>
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">添加商品</h4>

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
							<?php echo form_open_multipart('goods/check','class="form-horizontal"'); ?>
                            <!-- #section:elements.form -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 名称 </label>

                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo set_value('name'); ?>" name='name' placeholder="请输入名字" class="col-xs-10 col-sm-5" /><?php echo form_error('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类别 </label>

                                <div class="col-sm-9">
                                    <select style="width:150px" name="class"><?php foreach ($class as $item): ?><option value="<?php echo $item['id']?>"><?php echo $item['class']?></option><?php endforeach; ?></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格 </label>

                                <div class="col-sm-9">
                                    <input type="number" step='0.01' name='prices' value="<?php echo set_value('prices'); ?>"  class="am-input-sm" id="doc-ipt-pwd-1" placeholder="请输入价格"><?php echo form_error('prices'); ?>
                                    规格：元/<input name='spec' placeholder="请输入规格">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 产地 </label>

                                <div class="col-sm-9">
                                    <input type="text"  name='origin' value="<?php echo set_value('origin'); ?>"  rows="5" id="doc-ta-1"  placeholder="请输入产地"><?php echo form_error('origin'); ?>
                                </div>
                            </div>
                            <label for="form-field-6">功效：</label>

                            <textarea class="form-control" name="function" id="form-field-6" placeholder="Default Text"></textarea>


                            <label for="form-field-6">食用方法：</label>

                            <textarea class="form-control" name="eat" id="form-field-6" placeholder="Default Text"></textarea>


                            <label for="form-field-6">储存方法：</label>

                            <textarea class="form-control" name="save" id="form-field-6" placeholder="Default Text"></textarea>
                            <div class="zuo">缩略图(只支持JPG格式）<span style="color:red;" >*</span>：</div><?php echo form_error('file'); ?>
                            <div class="you"></div><input type="file" name="file0" id="doc-ipt-file-1">
                            <div class="zuo">附加图(非必需)请按顺序添加
                                <input type="file" name="file1">
                                <input type="file" name="file2">
                                <input type="file" name="file3">
                                <input type="file" name="file4">
                                <input type="file" name="file5">
                            </div>
                        </div>
                        <div style="margin-left: 11%;">
                            <button type="submit" class="btn btn-info" id="bootbox-confirm">提交</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>





