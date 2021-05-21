<!-- ☑お客様情報登録 -->
<?php
// 関数ファイル読み込み
include('functions.php');

// データ受け取り
$store_id = $_POST["store_id"];
$registered_at = $_POST["registered_at"];
$name = $_POST["name"];
$ezoca = $_POST["ezoca"];

// DB接続関数
$pdo = connect_to_db();

// ユーザ存在有無確認
$sql = 'SELECT COUNT(*) FROM customer_table WHERE ezoca=:ezoca AND name=:name';
// 名前とEZOCAIDが両方一致している場合エラー
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ezoca', $ezoca, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  // $count = $stmt->fetchColumn();
  echo "<p>既に登録されているお客様です。</p>";
  echo '<a href="customer_search_index2.php">全店お客様情報検索画面に移動する</a>';
  exit();
}

// ユーザ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql = 'INSERT INTO customer_table(id, store_id, registered_at, name, ezoca, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :store_id, :registered_at, :name, :ezoca, 0, 0, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':store_id', $store_id, PDO::PARAM_STR);
$stmt->bindValue(':registered_at', $registered_at, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':ezoca', $ezoca, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:customer_search_index.php");
  exit();
}
