<!-- ☑ログアウトページ -->
<?php
// セッションの開始
session_start(); 

// セッション変数を空の配列で上書き
$_SESSION = array();

// クッキーの保持期限を過去にする
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time()-42000, '/');
} 

// セッションの破棄
session_destroy(); 

// ログインページヘ移動
header('Location:daicho_login.php'); 
exit();