<?php
//1. POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

// 2. DB接続します（初期設定）
// try {
//   //Password:MAMP='root',XAMPP=''
//   // $pdo = new PDO('mysql:dbname=limeboar43_books_db;charset=utf8;host=mysql57.limeboar43.sakura.ne.jp','limeboar43','KURA2maki'); 
//   $pdo = new PDO('mysql:dbname=books_db;charset=utf8;host=localhost','root',''); //PDOは３つ引数をとる。2つ目、3つ目は自動でroot、""とする。
// } catch (PDOException $e) {
//   exit('DB Connection Error:'.$e->getMessage());
// }

include("funcs.php");  //funcs.phpを読み込む（関数群）
sschk(); //ログインチェック機能
$pdo = db_conn();      //DB接続関数 = "SELECT * FROM gs_bm_table2;";

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO bm_user_table(name,lid,lpw)VALUES(:name, :lid, :lpw);");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //上の文で変数っぽく指定したnameに何を指定するかを指定。PARAM STRは文字列であることをお知らせしてる。Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  
  //５．user.phpへリダイレクト
  header("Location: user.php");
  exit();
}
?>
