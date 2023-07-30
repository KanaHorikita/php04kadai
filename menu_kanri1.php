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

<br><a href="index.php">ブックマーク登録</a><br>
<br><a href="select.php">ブックマーク一覧</a><br>
<br><a href="user.php">ユーザー登録</a><br>
<br><a href="user_view.php">ユーザー一覧</a><br>

</body>
</html>