<div id="contentwrapper" class="contentwrapper">

    <div class="contenttitle2">
        <h3>分类详情</h3>
    </div><!--contenttitle-->
    <button>新增</button>
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
            <th class="head0">类名</th>
            <th class="head1">操作</th>
        </tr>
        </thead>
        <?php foreach ($class as $item): ?>
        <tr>
            <td><?=$item['class']?></td>
            <td><button>编辑</button><button>删除</button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>