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
	<title>TODOLIST【登録完了】</title>
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

$stmt = $pdo -> prepare("INSERT INTO todolist (todolist_sendid,todolist_sendcategory,todolist_send_member,todolist_send_time,todolist_send_title,todolist_send_comment) 
VALUES (:todolist_sendid,:todolist_sendcategory,:todolist_send_member,:todolist_send_time,:todolist_send_title,:todolist_send_comment)");

$stmt->bindParam(':todolist_sendid', $_POST['cont6'], PDO::PARAM_STR);
$stmt->bindParam(':todolist_sendcategory', $_POST['cont7'],  PDO::PARAM_STR);
$stmt->bindParam(':todolist_send_member', $_POST['cont2'],  PDO::PARAM_STR);
$stmt->bindParam(':todolist_send_time', $_POST['cont3'],  PDO::PARAM_STR);
$stmt->bindParam(':todolist_send_title', $_POST['cont4'],  PDO::PARAM_STR);
$stmt->bindParam(':todolist_send_comment', $_POST['cont5'],  PDO::PARAM_STR);
$stmt->execute();
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
<h2>TODOLIST【登録完了】</h2>
<p>登録完了しました。</p>
<p>左メニューから戻ってください。</p>
</div>
		
		</div>
</div>


 </main>
<footer>
</footer>
  
</body>
</html>