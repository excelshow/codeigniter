<div id="contentwrapper" class="contentwrapper">

    <div class="contenttitle2">
        <h3>分类详情</h3>
    </div><!--contenttitle-->
    <button onclick="classname=prompt('请输入你要增加的类名');if(classname != null){toast('goods/add_class/'+classname);}else{alert('你已取消');}">新增</button>
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
        <tr>S
            <td><?=$item['class']?></td>
            <td><button onclick="new_class_name=prompt('请输入你要增加的类名','<?=$item['class']?>');if(new_class_name != null){toast('goods/edit_class/<?=$item['class'].'/'?>'+new_class_name);}else{alert('你已取消');}">编辑</button><button onclick="toast('goods/delete_class/<?=$item['class']?>')">删除</button></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>