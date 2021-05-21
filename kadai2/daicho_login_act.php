<!-- ☑店舗コード登録 -->
<?php
// セッションの開始
session_start();

// 関数ファイル読み込み
include ('functions.php');

// DB接続
$pdo = connect_to_db();

// データ受け取り→変数に入れる
$store_id = $_POST['store_id'];
$password = $_POST['password'];

// users_tableのstore_idとpasswordから探す
$sql = 'SELECT * FROM users_table WHERE store_id=:store_id AND password =:password AND is_deleted=0';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':store_id', $store_id, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// DBのデータ有無で条件分岐
// 該当レコードだけ取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$val){
// 失敗のパターン
    echo"<p>※ログインidかパスワードが違います</p>";
    echo'<a href="daicho_login.php">再度ログインする</a>';
    exit();
} else {
// 成功のパターン
// セッション変数を空にする
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['store_id'] = $val['store_id'];
    $_SESSION['is_admin'] = $val['is_admin'];
    header("Location:customer_search_index.php");
    exit();    
}