<?php
/**
 * Created by PhpStorm.
 * User: 醉月思
 * Date: 2017/8/28
 * Time: 12:16
 */
function show_notice($header,$content){
	?>
    <div class="notibar announcement">
        <a class="close"></a>
        <h3><?php echo $header ?></h3>
        <p><?php echo $content ?></p>
    </div><!-- notification announcement -->
	<?php
}
function weixin_notify($header,$content){
	file_get_contents('https://sc.ftqq.com/SCU10223T309896e3f8dc384edc342918050a783059703e8545e05.send?text='.urlencode($header).'&desp='.urlencode($content));
}
function alert($content){
	echo "<script>alert('".$content."');</script>";
}
function js_redirect($url,$time=3000){
	?>
    <script>window.setTimeout("window.location='<?php echo $url ?>'",<?php echo $time?>);</script>
	<?php
}
function url($url){
	echo base_url('index.php/'.$url);
}
function go_history($time=1){
	?>
    <script>window.setTimeout("self.location=document.referrer",<?php echo $time?>);</script>
	<?php
}
