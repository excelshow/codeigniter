<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 栏目名称</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>



    </div>

    <div class="fbneirong">
		<h3>Your file was successfully uploaded!</h3>
		  <?=$tips?>
		<ul>
<!--		--><?php //foreach ($upload_data as $item => $value):?>
<!--		<li>--><?php //echo $item;?><!--:--><?//=$value?><!--</li>-->
<!--		--><?php //endforeach; ?>
		</ul>

		<p><?php echo anchor('admin/goods/good_new', 'Upload Another File!'); ?></p>
    </div>
</div>
