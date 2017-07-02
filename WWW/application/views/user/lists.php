
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/6/27-->
<!-- * Time: 21:16-->
<!-- */-->

    <div id="contentwrapper" class="contentwrapper">

        <div class="contenttitle2">
            <h3>会员列表</h3>
        </div><!--contenttitle-->
        <table cellpadding="0" cellspacing="0" border="0" class="stdtable">
            <colgroup>
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
            </colgroup>
            <thead>
            <tr>
                <th class="table-id">会员编号</th>
                <th class="table-id">会员姓名</th>
                <th class="table-id">会员电话</th>
                <th class="table-id">会员状态</th>
                <th class="table-title">会员积分</th>
                <th class="table-title">操作</th>
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
                <td><button>分析该用户</button><button type="button" class="sure" onclick="toast('/request/sure_user/'+<?=$item['user_no'];?>)">激活</button><button>删除</button></td>
            </tr>
                <?php endforeach; ?>
            </tbody>
        </table>