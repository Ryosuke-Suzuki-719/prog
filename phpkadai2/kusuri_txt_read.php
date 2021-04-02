<?php
$str = '';
$file = fopen('data/kusuri.txt', 'r');
flock($file, LOCK_EX);
if ($file) {
  while ($line = fgets($file)) {
    $str .= "<tr><td>{$line}</td></tr>";
  }
}
flock($file, LOCK_UN);
fclose($file);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>薬を買う時に困ることアンケート（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>薬を買う時に困ることアンケート（一覧画面）</legend>
    <a href="kusuri_txt_input.php">入力画面に戻る</a>
    <table>
      <thead>
        <tr>
          <th>アンケート結果</th>
        </tr>
      </thead>
      <tbody>
        <?= $str ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>