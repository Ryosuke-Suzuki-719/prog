<?php
// include("functions.php");
// // 関数ファイルの読み込み
// セッションの開始
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();
  $id = $_GET["id"];
  // var_dump("id");
  // exit();
// 関数実行
$pdo = connect_to_db();
// データ取得SQL作成
$sql = 'SELECT * FROM daicho_table WHERE id=:id';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
// データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
 } else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
 }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型化粧品台帳作成リスト（編集画面）</title>
</head>

<body>
  <form action="daicho_update.php" method="POST">
    <fieldset>
      <legend>DB連携型化粧品台帳作成リスト（編集画面）</legend>
      <a href="daicho_read.php">編集を中止して、化粧品台帳に戻る</a>
      <div>
      購入日<br><input type="date" name="deadline" value="<?= $record["deadline"] ?>">
      </div>
      <div>
      お名前<br><input type="text" name="uname" value="<?= $record["uname"] ?>">
      </div>
      <div>
      連絡先<br><input type="text" name="tel" value="<?= $record["tel"] ?>">
      </div>
      <div>
      購入商品<br><input type="text" name="goods" value="<?= $record["goods"] ?>" style="width:260px; height:330px;">
      </div>
      <div>
      購入金額<br><input type="number" name="money" value="<?= $record["money"] ?>">円
      </div>      
      <div>
      お客様メモ<br><input type="text" name="memo" value="<?= $record["memo"] ?>" style="width:260px; height:330px;">
      </div>
      <input type="hidden" name="id" value="<?=$record['id']?>">
      <div>
        <button id="btn">編集する</button>
      </div>
    </fieldset>
  </form>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- /jQuery -->
<script>
$("#btn").on("click",function(){
  alert("編集しました。登録画面に戻ります。");
  
});

</script>
</body>

</html>