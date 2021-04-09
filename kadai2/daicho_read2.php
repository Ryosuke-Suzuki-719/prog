<?php

// DB接続情報
$dbn = 'mysql:dbname=gsacs_d02_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 購入日順に並べる
$sql = "SELECT * FROM daicho_table ORDER BY uname ASC";

$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); // SQLを実行

if ($status==false) {
  $error = $stmt->errorInfo();
  // データ登録失敗次にエラーを表示
  exit('sqlError:'.$error[2]);
  } 
  else {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
    // exit();
    $output = "";
    foreach ($result as $record) {
      $output .= "<tr>";
      $output .= "<td>{$record["deadline"]}</td>";
      $output .= "<td>{$record["uname"]}</td>";
      $output .= "<td> 0 {$record["tel"]}</td>";
      $output .= "<td>{$record["goods"]}</td>";
      $output .= "<td>{$record["money"]}</td>";
      $output .= "<td>{$record["memo"]}</td>";
      $output .= "</tr>";
    }
    // var_dump($output);
    // exit();
  }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>DB連携型化粧品台帳登録画面（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>DB連携型化粧品台帳登録画面（一覧画面）</legend>
    <a href="daicho_input.php">登録画面に戻る</a>
    <a href="daicho_read.php">購入日順で見る</a>
    <table border="1">
      <thead>
        <tr>
          <th width="100">購入日</th>
          <th width="100">購入者</th>
          <th>連絡先</th>
          <th>購入商品</th>
          <th>購入金額</th>
          <th>お客様メモ</th>         
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