<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: 醉月思-->
<!-- * Date: 2017/8/2-->
<!-- * Time: 17:33-->
<!-- */-->
<?php $this->load->helper('url'); ?>
<div id="contentwrapper" class="contentwrapper">
    <table class="table table-hover table-bordered table-condensed table-striped">
        <thead>
        <tr>
            <th>内容</th>
            <th>最近的一次下载</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <tr class="success"><th>订单汇总</th><td id="order">2017.08.02</td><td><a href="<?=base_url('index.php/order/download_detail')?>" onclick="$('#order').html('订单内容正在生成');">下载</a></td></tr>
            <tr class="success"><th>商品汇总</th><td>2017.08.02</td><td><button>下载</button></td></tr>
            <tr class="success"><th>会员汇总</th><td>2017.08.02</td><td><button>下载</button></td></tr>
            <tr class="success"><th>库存汇总</th><td>2017.08.02</td><td><button>下载</button></td></tr>
        </tbody>
    </table>
