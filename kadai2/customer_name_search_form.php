<!-- 名前でお客様情報を検索するページ、自店、台帳を閲覧できる機能を足す必要がある -->
<?php
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();

$name_search = $_POST["name_search"];

$pdo = connect_to_db();

// SQLを実行
$sql = "SELECT * FROM customer_table WHERE name = '$name_search'";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); 

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
      $output .= "<td>{$record["store_id"]}</td>";
      $output .= "<td>{$record["registered_at"]}</td>";
      $output .= "<td>{$record["name"]}</td>";
      $output .= "<td>{$record["ezoca"]}</td>";
// 編集リンクを追加
      $output .="<td><a href='customer_edit.php?id={$record["id"]}'>登録者情報を編集</a></td>";
// 削除リンクを追加
      $output .="<td><a href='customer_delete.php?id={$record["id"]}'>登録者情報を削除</a></td>";
// 個別の化粧品台帳に情報を登録
      $output .="<td><a href='daicho_input.php?name={$record["name"]}'>化粧品台帳に登録する</a></td>";
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
  <title>お客様登録情報確認ページ</title>
</head>
<body>
<!-- 検索結果を表示 -->
  <fieldset>
    <legend>お客様登録情報確認ページ</legend>
    <table border="1">
      <thead>
        <tr>
          <th class="th_sht">店舗コード</th>
          <th class="th_sht">登録日</th>
          <th class="th_sht">名前</th>
          <th class="th_sht">EZOCAID</th>
          <th class="th_sht">編集</th>
          <th class="th_sht">削除</th>
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