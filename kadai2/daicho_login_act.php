<?php
// セッションの開始
session_start();
// 関数ファイル読み込み
include ('functions.php');

// DB接続
$pdo = connect_to_db();
// データ受け取り→変数に入れる
$username = $_POST['username'];
$password = $_POST['password'];

// users_tableのusernameとpasswordから探す
$sql = 'SELECT * FROM users_table WHERE username=:username AND password =:password AND is_deleted=0';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// DBのデータ有無で条件分岐
// 該当レコードだけ取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$val){
// 失敗のパターン
    echo"<p>ログイン情報に誤りがあります</p>";
    echo'<a href="daicho_login.php">login</a>';
    exit();
} else {
// 成功のパターン
// セッション変数を空にする
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['username'] = $val['username'];
    $_SESSION['is_admin'] = $val['is_admin'];
    header("Location:daicho_input.php");
    exit();    
}