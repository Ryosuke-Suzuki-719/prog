<!-- 化粧品台帳にをデータを挿入するページ -->
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
  <title>化粧品台帳（入力画面）</title>
</head>

<body>
  <form action="daicho_create.php" method="POST">
    <fieldset>
      <legend>化粧品台帳（入力画面）</legend>
      <div>
        購入日<br><input type="date" name="deadline">
      </div>
      <div>
        お客様<br><input type="text" name="name" value="<?= $_GET['name']?>">
      </div>
      <div>
        店舗コード<br><input type="text" name="store_id" value="<?= $_SESSION['store_id']?>">
      </div>
      <div>
        購入商品<br><input type="text" name="goods" style="width:260px; height:330px;">
      </div>
      <div>
        EZOCAID<br><input type="text" name="ezoca" value="<?= $_GET['ezoca']?>">
      </div>
      <div>
        お客様メモ<br><input type="text" name="memo" style="width:260px; height:330px;">
      </div>
      <div>
        <button id="btn">登録する</button>
      </div>
    </fieldset>
  </form>
  <a href="customer_search_index.php">トップページへ戻る</a>
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