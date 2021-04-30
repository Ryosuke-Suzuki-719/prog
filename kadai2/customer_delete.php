<?php
// var_dump($_GET);
// exit();
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();

// include("functions.php");
$id = $_GET["id"];

$pdo = connect_to_db();

$sql = "DELETE FROM customer_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
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