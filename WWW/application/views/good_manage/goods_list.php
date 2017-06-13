<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 栏目名称</ul>

      <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="">商品列表</a></dl>

      <dl>
        <a href="goods_new"><button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> 添加产品</button></a>
      </dl>


    </div>

<div class="am-btn-toolbars am-btn-toolbar am-kg am-cf">
  <ul>
    <li>
      <div class="am-btn-group am-btn-group-xs">
        <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
          <option value="b">产品分类<?php echo $this->benchmark->memory_usage();?></option>
          <option value="o">下架</option>
        </select>
      </div>
    </li>
    <li>
      <div class="am-btn-group am-btn-group-xs">
      <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
        <option value="b">产品分类</option>
        <option value="o">下架</option>
      </select>
      </div>
    </li>
    <li style="margin-right: 0;">
    	<span class="tubiao am-icon-calendar"></span>
      <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期" data-am-datepicker="{theme: 'success',}"  readonly/>
    </li>
       <li style="margin-left: -4px;">
    	<span class="tubiao am-icon-calendar"></span>
      <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期" data-am-datepicker="{theme: 'success',}"  readonly/>
    </li>

        <li style="margin-left: -10px;">
      <div class="am-btn-group am-btn-group-xs">
      <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
        <option value="b">产品分类</option>
        <option value="o">下架</option>
      </select>
      </div>
    </li>
    <li><input type="text" class="am-form-field am-input-sm am-input-xm" placeholder="关键词搜索" /></li>
    <li><button type="button" class="am-btn am-radius am-btn-xs am-btn-success" style="margin-top: -1px;">搜索</button></li>
  </ul>
</div>

    <form class="am-form am-g">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">商品ID</th>
                <th class="table-id">名称</th>
                <th class="table-id">缩略图</th>
                <th class="table-id">价格(元）</th>
                <th class="table-title">库存(件)</th>
                <th class="table-type">类别</th>
                <th class="table-author am-hide-sm-only">上架/下架 <i class="am-icon-check am-text-warning"></i> <i class="am-icon-close am-text-primary"></i></th>
                <th class="table-date am-hide-sm-only">描述</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($goods as $item): ?>
              <tr>
                <td><input type="checkbox" /></td>
                <!-- <td><input type="text" class="am-form-field am-radius am-input-sm"/></td> -->
                <td width="90px"><a href="#"><?=$item['id'];?></a></td>
                <td width="100px"><a href="#"><?=$item['name'];?></a></td>
                <td  width="100px"><img width='90px' height='50px' src="<?php echo base_url('uploads/'.$item['picture'])?>"></td>
                <td  width="100px"><center><?=$item['prices']?></center></td>
                <td><center><?=$item['num']?></center></td>
                <td><center><?=$item['class']?></center></td>
                <td class="am-hide-sm-only"><i class="am-icon-check am-text-warning"></i></td>
                <td class="am-hide-sm-only"><?=$item['description']?></td>
                <td><div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="/manage_goods/get_goods_content/<?=$item['id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-success am-round"><span class="am-icon-search"></span></button></a>
                      <a href="/manage_goods/edit_goods/<?=$item['id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-round"><span class="am-icon-pencil-square-o"></span></button></a>
                      <a href="/manage_goods/delete_goods/<?=$item['id']?>"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-round"><span class="am-icon-trash-o"></span></button></a>
                    </div>
                  </div></td>
              </tr>
              <?php endforeach; ?>

            </tbody>
          </table>

                 <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 删除</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 上架</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 下架</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 移动</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 移动</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>

          <ul class="am-pagination am-fr">
                <li class="am-disabled"><a href="#">«</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>




          <hr />
          <p>注：.....</p>
        </form>
