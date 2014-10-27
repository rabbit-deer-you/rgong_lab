<?php
session_start();

include_once( '../config.php' );
include_once( '../saetv2.ex.class.php' );
include_once( 'weibo_api.php' );
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../static/bootstrap.min.css" rel="stylesheet">
	<link href="../static/text.css" rel="stylesheet">
	<script src="http://tjs.sjs.sinajs.cn/t35/apps/opent/js/frames/client.js" language="JavaScript"></script>
</head>
<body>
	<div class="container_me">
		<div class="top_me">
			<div class="top_left">
				<h1>AA制管理系统</h1>
			</div>
			<div class="top_right">
				<span>
					<?php echo $user_name; ?></span>
				<img class="touxiang" src="<?php echo $image_url; ?>"></div>
		</div>
		<?php $price=$_GET['chifan']+$_GET['jiaotong']+$_GET['zhusu']+ $_GET['jiaotong']+$_GET['qita']; ?>
		<p style="font-size:30px; ">
			每个人分担的费用为 <strong><span style="color:red;">
					<?php 
echo $price/$_GET['people']; ?></strong>
			</span>
			元
		</p>
	</br>
	<p>发送微博通知你的好友</p>
</br>
<form action="">
	<textarea name="weibo" cols="20" rows="5" id="test2" style="overflow:visible"  >
		<?php echo $_GET['name']." 活动，总参加人数为".$_GET['people']."人，每个人分担的费用为 
".$price/$_GET['people']."元,@"; ?></textarea>
	<input type="submit">
	<?php
if( isset($_REQUEST['weibo']) ) {
	$ret = $c->
	update( $_REQUEST['weibo'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "
	<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>
	";
	} else {
		echo "
	<p>发送成功</p>
	";
	}
}
?>
</form>
</div>
</body>
</html>