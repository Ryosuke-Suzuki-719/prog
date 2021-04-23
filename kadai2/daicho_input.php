<?php
// セッションの開始
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型化粧品台帳作成リスト（入力画面）</title>
</head>

<body>
  <form action="daicho_create.php" method="POST">
    <fieldset>
      <legend>DB連携型化粧品台帳作成リスト（入力画面）</legend>
      <a href="daicho_read.php">化粧品台帳を確認する（購入日順）</a>
      <div>
        購入日<br><input type="date" name="deadline">
      </div>
      <div>
        お名前<br><input type="text" name="uname">
      </div>
      <div>
        連絡先<br><input type="text" name="tel">
      </div>
      <div>
        購入商品<br><input type="text" name="goods" style="width:260px; height:330px;">
      </div>
      <div>
        購入金額<br><input type="number" name="money">円
      </div>
      <div>
        お客様メモ<br><input type="text" name="memo" style="width:260px; height:330px;">
      </div>
      <div>
        <button id="btn">登録する</button>
      </div>
    </fieldset>
  </form>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- /jQuery -->
  <script>
    $("#btn").on("click", function() {
      alert("登録しました。");
    });
  </script>
</body>

</html>