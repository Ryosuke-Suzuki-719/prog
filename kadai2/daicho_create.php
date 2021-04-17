<?php
// var_dump($_POST);
// exit();

if(
  !isset($_POST['deadline']) || $_POST['deadline']=='' ||
  !isset($_POST['uname']) || $_POST['uname']=='' ||
  !isset($_POST['tel']) || $_POST['tel']=='' ||
  !isset($_POST['goods']) || $_POST['goods']=='' || 
  !isset($_POST['money']) || $_POST['money']=='' ||
  !isset($_POST['memo']) || $_POST['memo']==''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit('ParamError');
}

$deadline = $_POST["deadline"];
$uname = $_POST["uname"];
$tel = $_POST["tel"];
$goods = $_POST["goods"];
$money = $_POST["money"];
$memo = $_POST["memo"];

// DB接続情報
$dbn = 'mysql:dbname=gsacs_d02_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
include('functions.php');
// 関数実行
$pdo = connect_to_db();

$sql = 'INSERT INTO daicho_table(id, deadline, uname, tel, goods, money, memo, created_at, updated_at) VALUES(NULL, :deadline, :uname, :tel, :goods, :money, :memo, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':uname', $uname, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':goods', $goods, PDO::PARAM_STR);
$stmt->bindValue(':money', $money, PDO::PARAM_INT);
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  } 
  else {
  // 登録ページへ移動
  header('Location:daicho_input.php');
  }