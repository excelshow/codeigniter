<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 栏目名称</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>



    </div>

    <div class="fbneirong">

    <?php echo form_open_multipart('Admin/check_new_good'); ?>

      <form class="am-form">
        <div class="am-form-group am-cf">
          <div class="zuo">名称<span style="color:red;" >*</span>：</div>
          <div class="you">
            <input type="text" name='name' value="<?php echo set_value('name'); ?>" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入标题"><?php echo form_error('name'); ?>
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">类别<span style="color:red;" >*</span>：</div>
          <div class="you">
            <select style="width:150px" name="class"><?php foreach ($class as $item): ?><option value="<?=$item?>"><?=$item?></option><?php endforeach; ?></select>
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">价格<span style="color:red;" >*</span>：</div>
          <div class="you">
            <input type="number" name='prices' value="<?php echo set_value('prices'); ?>"  class="am-input-sm" id="doc-ipt-pwd-1" placeholder="请输入价格"><?php echo form_error('prices'); ?>
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">描述<span style="color:red;" >*</span>：</div>
          <div class="you">
            <textarea class="" name='description' value="<?php echo set_value('description'); ?>"  rows="5" id="doc-ta-1"  placeholder="请输入描述"></textarea><?php echo form_error('description'); ?>
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">缩略图<span style="color:red;" >*</span>：</div><?php echo form_error('file'); ?>
          <div class="you"></div><input type="file" name="file" id="doc-ipt-file-1">
        </div>

        <!-- <div class="am-form-group am-cf">
          <div class="zuo">产品图片：</div>
          <div class="you" style="height: 45px;">
            <input type="file" id="doc-ipt-file-1">
            <p class="am-form-help">请选择要上传的文件...</p>
          </div>
        </div>


        <div class="am-form-group am-cf">
          <div class="zuo">内容：</div>
          <div class="you">
            <textarea class="" rows="2" id="doc-ta-1"></textarea>
          </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="zuo">其他信息：</div>
          <div class="you">
            <textarea class="" rows="2" id="doc-ta-1"></textarea>
          </div>
        </div>-->


        <div class="am-form-group am-cf">
        <div class="zuo">更多：</div>
        <div class="you" style="margin-top: 5px;">
          <label class="am-checkbox-inline">
            <input type="checkbox" value="option1">
            是否显示 </label>
          <label class="am-checkbox-inline">
            <input type="checkbox" value="option2">
            店家推荐 </label>
          <label class="am-checkbox-inline">
            <input type="checkbox" value="option3">
            应季 </label>
            </div>
        </div>

        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">发布并关闭窗口</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius">发布并继续发布</button>

          </div>
        </div>
      </form>
    </div>



</div>

</div>




</div>
