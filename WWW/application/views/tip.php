<!DOCTYPE html>
<?php $this->load->helper('url');?>
<html lang="en">
<head>
	<script src="<?=base_url('assets/dist/sweetalert.min.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/dist/sweetalert.css')?>">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body onload="swal('<?=$content?>登录失败');">

</body>
<script type="text/javascript">window.setTimeout("window.location='<?=base_url()?>'",2000); </script>
</html>


