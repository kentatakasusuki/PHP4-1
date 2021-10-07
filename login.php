<?php
  session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['career']); 
?>


<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>社員ログイン</title>
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
<div class="box_1">

<div class="box_2">
<h2>ログイン画面</h2>
<form class="form-horizontal" action="auth.php" method="POST">
	<div class="form-group">
		<label class="col-sm-4 control-label" for="InputEmail">LOGINID</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="InputEmail" placeholder="LOGINID" name="cont1">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label" for="InputPassword">LOGINPASSWORD</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="InputPassword" placeholder="LOGINPASSWORD" name="cont2">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-default">認証</button>
		</div>
	</div>
</form>

</div><!-- /.box_2 -->


</div><!-- /.box_1 -->


</main>
<footer>
</footer>
  
</body>
</html>