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
	<title>TODOLIST</title>
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

$stmt = $pdo->query("SELECT * FROM takasample");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {

   $arg["data2"][]=$row;
}

} catch (PDOException $e) {

	echo("接続エラーです。");
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
<h2>TODOLIST</h2>
<form action="todolist_fin.php" method="POST" class="form-horizontal">		
	<div class="form-group">
		<label class="col-sm-1 control-label" for="InputEmail">名前</label>
		<div class="col-sm-5">
			<input  type="text" name="cont1" class="form-control" id="InputEmail" value="<?=$_SESSION['name']?>" disabled>
			<input  type="hidden" name="cont6" class="form-control" id="InputEmail" value="<?=$_SESSION['id']?>">
			<input  type="hidden" name="cont7" class="form-control" id="InputEmail" value="<?=$_SESSION['career']?>">

		</div>
		<label class="col-sm-1 control-label" for="InputEmail">誰に？</label>
		<div class="col-sm-5">
		<select class="form-control" id="InputSelect" name="cont2">
<? foreach($arg["data2"] as $key){?>
				<option value="<?= $key["id"] ?>"><?= $key["name"] ?></option>

<?}?>
		</select>	
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-1 control-label" for="InputEmail">いつまでに？</label>
		<div class="col-sm-5">
		<input  type="datetime-local" name="cont3" class="form-control" id="InputEmail" >
		</div>

		<label class="col-sm-1 control-label" for="InputEmail">タイトル</label>
		<div class="col-sm-5">
			<input  type="text" name="cont4" class="form-control" id="InputEmail" >
		</div>
		
	</div>
	
	<div class="form-group">
		<label class="col-sm-1 control-label" for="InputEmail">コメント</label>
		<div class="col-sm-11">
			<textarea name="cont5" id="" rows="10" class="textarea_1"></textarea>
		</div>
		
	</div>	
	
	
<input type="submit" value="登録">
</form>
</div>
		
		</div>
</div>


 </main>
<footer>
</footer>
  
</body>
</html>