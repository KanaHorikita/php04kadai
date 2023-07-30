<?php
//1.  DB接続します
// try {
//   //Password:MAMP='root',XAMPP=''
//   // $pdo = new PDO('mysql:dbname=limeboar43_books_db;charset=utf8;host=mysql57.limeboar43.sakura.ne.jp','limeboar43','KURA2maki');
//   $pdo = new PDO('mysql:dbname=books_db;charset=utf8;host=localhost','root','');

// } catch (PDOException $e) {
//   exit('DBConnection Error:'.$e->getMessage());
// }

include("funcs.php");  //funcs.phpを読み込む（関数群）
sschk(); //ログインチェック機能
$pdo = db_conn();      //DB接続関数 = "SELECT * FROM gs_bm_table2;";

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM bm_user_table");
$status = $stmt->execute();

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ //データ取得数分繰り返す
    $view .= ($r["id"])."|".($r["name"])."|".($r["lid"])."|".($r["lpw"]);
    $view .= '<br>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="user.php">ユーザー登録画面</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<a></a>

</body>
</html>