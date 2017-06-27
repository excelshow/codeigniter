
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/27-->
<!-- * Time: 21:16-->
<!-- */-->
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 栏目名称</ul>
        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">会员列表</a></dl>
    </div>
    <div class="fbneirong">
        <form class="am-form am-g">
            <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
                <thead>
                <tr class="am-success">
                    <th class="table-id">会员编号</th>
                    <th class="table-id">会员姓名</th>
                    <th class="table-id">会员电话</th>
                    <th class="table-id">会员状态</th>
                    <th class="table-title">会员积分</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($user_lists as $item):?>
                    <tr>
                        <td width="90px"><a href="#"><?=$item['user_no'];?></a></td>
                        <td width="100px"><a href="#"><?=$item['user_name'];?></a></td>
                        <td  width="100px"><?=$item['user_phone'];?></td>
                        <td  width="100px"><center><?=$item['status'];?></center></td>
                        <td><?=$item['user_num'];?></td>

                <?php endforeach; ?>
                </tbody>
            </table>
            <ul class="am-pagination am-fr">
                <li class="am-disabled"><a href="#">«</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </form>
    </div>
</div>    </div>