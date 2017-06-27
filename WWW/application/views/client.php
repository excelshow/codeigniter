<?php $this->load->helper('url'); $path = base_url('client');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>client</title>
</head>
<body>
    <a href="<?=$path?>/goods_lists">goods_lists</a>
    <a href="<?=$path?>/goods_class">goods_class</a>
    <a href="<?=$path?>/goods_detail">goods_detail(需要参数)</a>
    <a href="<?=$path?>/order_detail">order_detail(需要参数)</a>
</body>
</html>