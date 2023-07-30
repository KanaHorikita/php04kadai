<?php
session_start(); // セッションを開始
// 共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
// function h($str){
//     return htmlspecialchars($str, ENT_QUOTES);
// }

//DB接続関数：db_conn()
function db_conn(){
    try {
        // //localhostの場合
        // $db_name = "books_db";    //データベース名
        // $db_id   = "root";      //アカウント名
        // $db_pw   = "";          //パスワード：XAMPPはパスワード無しに修正してください。
        // $db_host = "localhost"; //DBホスト

        // localhost以外＊＊自分で書き直してください！！＊＊
        if($_SERVER["HTTP_HOST"] != 'mysql57.limeboar43.sakura.ne.jp'){ //どこにあるか、localhostなのかさくらサーバー上なのかを教えてあげる必要がある
            $db_name = "limeboar43_books_db";  //データベース名
            $db_id   = "limeboar43";  //アカウント名（さくらコントロールパネルに表示されています）
            $db_pw   = "KURA2maki";  //パスワード(さくらサーバー最初にDB作成する際に設定したパスワード)
            $db_host = "mysql57.limeboar43.sakura.ne.jp"; //例）mysql**db.ne.jp...
        }
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
     $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    // もともとheader("Location: index.php");
    header("Location: $file_name");
}

//ログインチェック機能
function sschk(){
    if( $_SESSION['chk_ssid'] != session_id() ){
      exit('LOGIN ERROR');
    }else{
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
    }
  }