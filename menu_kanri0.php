<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>メニュー</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">メニュー</nav>
</header>

<!-- 名前を表示 -->
<?php
// session_start();

include("funcs.php");
sschk();

echo "こんにちは、" . $_SESSION["name"] . "さん！";
?><br>
<br>
<br><a href="index_kanri0.php">ブックマーク登録</a><br>

</body>
</html>
