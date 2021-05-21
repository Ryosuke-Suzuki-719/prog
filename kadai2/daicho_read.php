<!-- 化粧品台帳一覧、自店 -->
<?php
// セッションの開始
session_start();
// check_session_id();
include('functions.php');
$pdo = connect_to_db();


$sql = "SELECT * FROM daicho_table WHERE store_id LIKE '%" . $_POST["store_id"] . "%' ORDER BY deadline DESC";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:'.$error[2]);
  } 
  else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $output = "";
    foreach ($result as $record) {
// 1列目のデータを挿入
      $output .= "<tr>";
      $output .= "<td class='td_style1'>購入日：{$record["deadline"]}</td>";
      $output .= "<td class='td_style1'>購入者：{$record["name"]}</td>";
      $output .= "<td class='td_style1'>EZOCAID：{$record["ezoca"]}</td>";
      $output .= "<td class='td_style1'>店舗コード：{$record["store_id"]}</td>";
      $output .= "</tr>";
// 2列目のデータを挿入
      $output .= "<tr>";
      $output .= "<td colspan='4' class='td_style2'>購入商品<br>{$record["goods"]}</td>";
      $output .= "</tr>";
// 3列目のデータを挿入
      $output .= "<tr>";
      $output .= "<td colspan='4' class='td_style2'>メモ<br>{$record["memo"]}</td>";
      $output .= "</tr>";      
// 4列目のデータを挿入
      $output .= "<tr>";
// edit 編集リンクを追加
      $output .="<td ><a href='daicho_edit.php?id={$record["id"]}'>編集</a></td>";
// delete 削除リンクを追加
      $output .="<td ><a href='daicho_delete.php?id={$record["id"]}'>削除</a></td>";
// 該当者の一覧リンクを追加
      $output .="<td><a href='daicho_read2.php?name={$record["name"]}&ezoca={$record["ezoca"]}'>一覧を表示</a></td>";
// 個別の化粧品台帳に情報を登録
      $output .="<td><a href='daicho_input.php?name={$record["name"]}&ezoca={$record["ezoca"]}'>化粧品台帳に登録する</a></td>";
      $output .= "</tr>";      
    }
    unset($record);
  }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>自店の化粧品台帳一覧</title>
</head>

<body>
<div>現在、店舗コード「<?= $_SESSION['store_id']?>」でログインしています。</div>
<a href="customer_search_index.php">トップページへ戻る</a>
<a href="daicho_search_index.php">検索画面をひらく</a>
  <fieldset>
    <legend>自店の化粧品台帳一覧</legend>
    <table border="1">
      <tbody>
<!-- ここに$outputのデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>