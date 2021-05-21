<!-- ☑化台帳データを作成 -->
<?php

if(
  !isset($_POST['deadline']) || $_POST['deadline']=='' ||
  !isset($_POST['name']) || $_POST['name']=='' ||
  !isset($_POST['store_id']) || $_POST['store_id']=='' ||
  !isset($_POST['goods']) || $_POST['goods']=='' || 
  !isset($_POST['ezoca']) || $_POST['ezoca']=='' ||
  !isset($_POST['memo']) || $_POST['memo']==''
) {
  // 項目が入力されていない場合はここでエラーを出力し，以降の処理を中止する
  echo json_encode(["error_msg" => "no input"]);
  exit('ParamError');
}

$deadline = $_POST["deadline"];
$name = $_POST["name"];
$store_id = $_POST["store_id"];
$goods = $_POST["goods"];
$ezoca = $_POST["ezoca"];
$memo = $_POST["memo"];

// DB接続情報
$dbn = 'mysql:dbname=gsacs_d02_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
include('functions.php');
// 関数実行
$pdo = connect_to_db();

$sql = 'INSERT INTO daicho_table(id, deadline, name, store_id, goods, ezoca, memo, created_at, updated_at) VALUES(NULL, :deadline, :name, :store_id, :goods, :ezoca, :memo, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':store_id', $store_id, PDO::PARAM_STR);
$stmt->bindValue(':goods', $goods, PDO::PARAM_STR);
$stmt->bindValue(':ezoca', $ezoca, PDO::PARAM_INT);
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