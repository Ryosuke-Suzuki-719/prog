<?php
// var_dump($_POST);
// exit();
include("functions.php");
// $id = $_POST["id"];
// $deadline = $_POST["deadline"];
// $uname = $_POST["uname"];
// $tel = $_POST["tel"];
// $goods = $_POST["goods"];
// $money = $_POST["money"];
// $memo = $_POST["memo"];
$search = $_POST["search"];

$pdo = connect_to_db();

$sql = "SELECT * FROM daicho_table WHERE uname LIKE '%" . $_POST["search"] . "%'";
$stmt = $pdo->prepare($sql);

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:daicho_search_result.php");
    exit();
  }