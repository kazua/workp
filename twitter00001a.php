<?php
header("Content-Type:text/html;charset=UTF-8");
require_once('../lib/twitteroauth.php');

$ck = '***********';//キーは自分で取得したものを設定
$cs = '***********';//キーは自分で取得したものを設定
$at = '***********';//キーは自分で取得したものを設定
$as = '***********';//キーは自分で取得したものを設定
$tw = new TwitterOAuth($ck,$cs,$at,$as);

$searchwd = $_POST["searchwd"];
$searchop = array('q'=>$searchwd,'count'=>'100','include_entities'=>'true');

$rq = $tw->OAuthRequest('https://api.twitter.com/1.1/search/tweets.json','GET', $searchop);
$oj = json_decode($rq)->{'statuses'};
?>
<html>
<head>
<title>Twitter検索サービス</title>
<meta name="viewport"
    content="width=device-width, initial-scale=1, user-scalable=no">
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript"
    src="../js/jquery-ui-1.8.19.custom.min.js"></script>
<link type="text/css" rel="stylesheet"
    href="../css/theme/ui-darkness/jquery-ui-1.8.19.custom.css" />
<script>
$(function() {
    $("#return").button();
});
</script>
</head>
<style>
a img {
	border: none;
}
div {
	width:830px;
	border:solid 1px #000000;
}
table {
	border:"0";
	cellspacing:"0";
	background-color:#ffffff;
	width:830px;
	border-collapse: collapse;
	display:block;
}
table th {
	background-color:#66CCCC;
	color:#000000;
	border:solid 1px #000000;
	border-bottom:solid 2px #000000;
	height:15px;
	font-size:12px;
}
table td {
	background-color:#ffffff;
	color:#000000;
	border:solid 1px #000000;
	border-top:none;
	height:64px;
	font-size:11px;
}
table tbody {
	float:left;
	overflow-y:scroll;
	height: 500px;
}
table tr {
	float:left;
}
</style>
<body>
    <form method="post" action="./twitter00001s.php">
        <input type="submit" id="return" name="submit" value="戻る" />
        <br />&nbsp;検索ワード：<?php echo $searchwd; ?>
        <div>
	        <table id="detail">
	            <thead>
		            <tr>
			            <th width="65px">PROF画像</th>
			            <th width="120px">ID</th>
			            <th width="140px">ユーザー名</th>
			            <th width="350px">ツイート内容</th>
			            <th width="122px">投稿日</th>
	                    <th width="14px"> </th>
			        </tr>
	            </thead>
	            <tbody>
<?php
for($i=0; $i < sizeof($oj); $i++){
    $userid=$oj[$i]->{'user'}->{'screen_name'};
    $usernm=$oj[$i]->{'user'}->{'name'};
    $tweet=$oj[$i]->{'text'};
    $twtid=$oj[$i]->{'id_str'};
    $prfimg=$oj[$i]->{'user'}->{'profile_image_url'};
    $createdat=$oj[$i]->{'created_at'};
    $unixtime=strtotime($createdat);
    $twttime=date('Y-m-d H:i:s', $unixtime);
?>
		        <tr>
		            <td width="65px"><a href="https://twitter.com/<?php echo $userid;?>" target="_blank"><img
		                    src="<?php echo $prfimg;?>" width="64px"
		                    height="64px"></a></td>
		            <td width="120px">@<?php echo $userid; ?></td>
		            <td width="140px"><?php echo $usernm; ?></td>
		            <td width="350px"><?php echo $tweet; ?>&nbsp;&nbsp;<a href="https://twitter.com/<?php echo $userid; ?>/status/<?php echo $twtid; ?>" target="_blank">このツイートを開く</a></td>
		            <td width="122px"><?php echo $twttime; ?></td>
		        </tr>
<?php
}
if (sizeof($oj) == 0){
?>
		        <tr>
		            <td width="810px">検索結果0件です。指定検索ワードを含むツイートは見つかりませんでした。</td>
		        </tr>
<?php
}
?>
			    </tbody>
	    	</table>
        </div>
    </form>
</body>
</html>
