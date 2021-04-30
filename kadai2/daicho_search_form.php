<?php
// var_dump($_POST);
// exit();
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();
// include("functions.php");
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
$status = $stmt->execute(); // SQLを実行


// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
  } else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // exit();
    $output = "";
    foreach ($result as $record) {
      $output .= "<tr>";
      $output .= "<td>{$record["deadline"]}</td>";
      $output .= "<td>{$record["uname"]}</td>";
      $output .= "<td>{$record["tel"]}</td>";
      $output .= "<td>{$record["goods"]}</td>";
      $output .= "<td>{$record["money"]}</td>";
      $output .= "<td>{$record["memo"]}</td>";
      // edit 編集リンクを追加
      $output .="<td><a href='daicho_edit.php?id={$record["id"]}'>編集</a></td>";
      // delete 削除リンクを追加
      $output .="<td><a href='daicho_delete.php?id={$record["id"]}'>削除</a></td>";
      $output .= "</tr>";
    }
    // var_dump($output);
    // exit();
    unset($record);
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>DB連携型化粧品台帳検索画面（検索画面）</title>
</head>
<body>
  <!-- 検索結果を表示 -->
  <fieldset>
    <legend>DB連携型化粧品台帳登録画面（一覧画面）</legend>
    <a href="daicho_input.php">登録画面に戻る</a>
    <a href="daicho_read2.php">名前順で見る</a>
    <a href="daicho_search_index.php">検索画面をひらく</a>
    <table border="1">
      <thead>
        <tr>
          <th class="th_sht">購入日</th>
          <th class="th_sht">購入者</th>
          <th class="th_sht">連絡先</th>
          <th class="th_long">購入商品</th>
          <th class="th_sht">購入金額</th>
          <th class="th_long">お客様メモ</th>    
          <th class="th_sht"></th>
          <th class="th_sht"></th>     
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>