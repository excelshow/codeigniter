<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/8/4-->
<!-- * Time: 17:40-->
<!-- */-->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/27-->
<!-- * Time: 15:27-->
<!-- */-->
<div id="contentwrapper" class="contentwrapper">
    <div class="admin-biaogelist">
    <div class="am-form-group am-cf">
        <div style="color:red;" class="zuo">用户评价：</div>
        <div class="you">
            <?php foreach ($comment as $item): ?>
            <li><?php echo $item['user_name'].":"?><?php echo $item['comment']?></li>
            <?php endforeach; ?>
        </div>
    </div>
            </form>
        </div>

    </div>

</div>
