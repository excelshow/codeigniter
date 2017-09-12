<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/27-->
<!-- * Time: 15:27-->
<!-- */-->
<div id="contentwrapper" class="contentwrapper">
    <div class="admin-biaogelist">
    <?php echo form_open('goods/edit/'.$goods_id)?>

        <div class="fbneirong">

           <?php foreach ($detail as $item): ?>

            <form class="am-form">
                <div class="am-form-group am-cf">
                    <div class="zuo">名称<span style="color:red;" >*</span>：</div>
                    <div class="you">
                        <input type="text" name='name' value="<?php echo $item['name'];?>" class="am-input-sm" id="doc-ipt-email-1" placeholder="请输入商品名">
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">价格<span style="color:red;" >*</span>：</div>
                    <div class="you">
                        <input type="number" step='0.01' name='prices' value="<?php echo $item['prices'];?>"  class="am-input-sm" id="doc-ipt-pwd-1" placeholder="请输入价格">
                        规格：元/<input name='spec' value="<?php echo $item['spec'];?>" placeholder="请输入规格">
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">产地<span style="color:red;" >*</span>：</div>
                    <div class="you">
                        <input type="text"  name='origin' value="<?php echo $item['origin'];?>"  rows="5" id="doc-ta-1"  placeholder="请输入产地">
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">类别<span style="color:red;" >*</span>：</div>
                    <div class="you">
                        <select style="width:150px" name="class"><?php foreach ($class as $row): ?><option value="<?php echo $row['class']?>"><?php echo $row['class']?></option><?php endforeach; ?></select>
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">功效：</div>
                    <div class="you">
                        <textarea class="" rows="5" id="doc-ta-1" name="function"><?php echo $item['function'];?></textarea>
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">食用方法：</div>
                    <div class="you">
                        <textarea class="" rows="5" id="doc-ta-1" name="eat"> <?php echo $item['eat'];?></textarea>
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="zuo">储存方法：</div>
                    <div class="you">
                        <textarea class="" rows="5" id="doc-ta-1" name="save"><?php echo $item['save'];?></textarea>
                    </div>
                </div>
                <div class="am-form-group am-cf">
                    <div class="you" style="margin-left: 11%;">
                        <button type="submit" class="am-btn am-btn-success am-radius">发布并关闭窗口</button>&nbsp;  &raquo; &nbsp; <button type="submit" class="am-btn am-btn-secondary am-radius">发布并继续发布</button>

                    </div>
                </div>
            </form>
        </div>
        <?php endforeach ?>


    </div>

</div>
