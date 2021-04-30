<?php
// var_dump($_POST);
// exit();
// セッションの開始
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();
// include("functions.php");
$id = $_POST["id"];
$name = $_POST["name"];
$ezoca = $_POST["ezoca"];

$pdo = connect_to_db();

$sql = "UPDATE customer_table SET name=:name, ezoca=:ezoca, updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':ezoca', $ezoca, PDO::PARAM_STR);
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