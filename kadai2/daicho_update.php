<?php
// var_dump($_POST);
// exit();
include("functions.php");
$id = $_POST["id"];
$deadline = $_POST["deadline"];
$uname = $_POST["uname"];
$tel = $_POST["tel"];
$goods = $_POST["goods"];
$money = $_POST["money"];
$memo = $_POST["memo"];

$pdo = connect_to_db();

$sql = "UPDATE daicho_table SET deadline=:deadline, uname=:uname, tel=:tel, goods=:goods, money=:money, memo=:memo, updated_at=sysdate() WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':uname', $uname, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':goods', $goods, PDO::PARAM_STR);
$stmt->bindValue(':money', $money, PDO::PARAM_INT);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
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
    header("Location:daicho_read.php");
    exit();
  }