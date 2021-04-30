<?php
// var_dump($_POST);
// exit();
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();

$name_search = $_POST["name_search"];

$pdo = connect_to_db();

$sql = "SELECT * FROM customer_table WHERE name LIKE '%" . $_POST["name_search"] . "%'";
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
    $output = "";
    foreach ($result as $record) {
      $output .= "<tr>";
      $output .= "<td>{$record["name"]}</td>";
      $output .= "<td>{$record["ezoca"]}</td>";
// edit 編集リンクを追加
      $output .="<td><a href='customer_edit.php?id={$record["id"]}'>編集</a></td>";
// delete 削除リンクを追加
      $output .="<td><a href='customer_delete.php?id={$record["id"]}'>削除</a></td>";
      $output .="<td><a href='daicho_input.php'>追加</a></td>";
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
  <title>お客様登録情報確認ページ</title>
</head>
<body>
  <!-- 検索結果を表示 -->
  <fieldset>
    <legend>お客様登録情報確認ページ</legend>
    <table border="1">
      <thead>
        <tr>
          <th class="th_sht">名前</th>
          <th class="th_sht">EZOCAID</th>
          <th class="th_sht"></th>
          <th class="th_sht"></th>
          <th class="th_long">購入情報を追加する</th>     
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <fieldset>
      <legend>新規お客様登録画面</legend>
      <div>検索しても見つからない場合or新規登録のお客様の場合</div>
      <a href="customer_register.php">新規お客様登録画面に進む</a>
    </fieldset>
</body>

</html>