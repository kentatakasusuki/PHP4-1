<?php
  session_start();
  if(empty($_SESSION['name'])){
echo("このページへの直接閲覧は禁止されています。");
  exit;
  } 
  
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>TODOLIST一覧</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <title></title>
    <!-- BootstrapのCSS読み込み -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./js/bootstrap.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="./css/base.css" rel="stylesheet">
</head>
<body>
<main>

<?

	define('PVL_DIR_COMN_PATH','./system/'); //comnフォルダまでのpath(必ず設定して下さい)
	require_once(PVL_DIR_COMN_PATH.'config/app_conf.php');

try {
    /* リクエストから得たスーパーグローバル変数をチェックするなどの処理 */
$_ = function($s){return $s;};//展開用
    // データベースに接続
    $pdo = new PDO("mysql:host={$_(PVL_DB_HOSTNAME)};dbname={$_(PVL_DB_DBNAME)};charset=utf8",PVL_DB_USER,PVL_DB_PASSWD,
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
])
;

$id =$_SESSION["id"];


$stmt2 = "SELECT * FROM takasample WHERE `loginid` = `$id`";
$stmt = $pdo->query("SELECT * FROM takasample WHERE `id` = \"$id\"");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {

   $arg["data2"][]=$row;
}

$id2 = $arg["data2"][0]["career"];
if($id2 == 1){
$stmt3 = $pdo->query("SELECT * FROM todolist");
while($row = $stmt3 -> fetch(PDO::FETCH_ASSOC)) {

   $arg["data3"][]=$row;
}
}else{
$id3 = $arg["data2"][0]["id"];
$stmt4 = $pdo->query("SELECT * FROM todolist WHERE `todolist_send_member` = \"$id3\"");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {

   $arg["data3"][]=$row;
}

}

} catch (PDOException $e) {

	echo("接続エラーです。");
}	

?> 

<?
$t =0;
foreach($arg["data3"] as $key){

$id4 = $key["todolist_sendid"];

$stmt4 = $pdo->query("SELECT * FROM takasample WHERE `id` = \"$id4\"");
while($row = $stmt4 -> fetch(PDO::FETCH_ASSOC)) {
   $arg["data4"][]=$row;
}

$id5 = $key["todolist_send_member"];

$stmt5 = $pdo->query("SELECT * FROM takasample WHERE `id` = \"$id5\"");
while($row = $stmt5 -> fetch(PDO::FETCH_ASSOC)) {
   $arg["data5"][]=$row;
}


$arg["data3"][$t]["todolist_sendid"] =$arg["data4"][0]["name"];
$arg["data3"][$t]["todolist_send_member"] =$arg["data5"][0]["name"];

$t = $t +1 ;

}

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
<h2>管理メニュー</h2>
<ul>
<li><a href="https://hystericend.sakura.ne.jp/takasusukisample3/todolist1.php">TODOLISTを書く</a></li>
<li><a href="https://hystericend.sakura.ne.jp/takasusukisample3/todolist2.php">TODOLISTを見る</a></li>
<li><a href="https://hystericend.sakura.ne.jp/takasusukisample3/logout.php">ログアウト</a></li>
</ul>
		</div>
		
		<div class="col-md-10">
<h2>TODOLIST一覧</h2>
<table class="table">
	<tr>
		<th>ID</th>
		<th>送信者</th>
		<th>受信者</th>
		<th>締切日時</th>
		<th>タイトル</th>
		<th>コメント</th>
	</tr>
<? foreach($arg["data3"] as $key){?>	
	
	<tr>
		<td><?=$key["todolist_id"]?></td>
		<td><?=$key["todolist_sendid"]?></td>
		<td><?=$key["todolist_send_member"]?></td>
		<td><?=$key["todolist_send_time"]?></td>
		<td><?=$key["todolist_send_title"]?></td>
		<td><?=$key["todolist_send_comment"]?></td>
	</tr>
<?}?>	
		
</table>








</div>
		
		</div>
</div>


 </main>
<footer>
</footer>
  
</body>
</html>