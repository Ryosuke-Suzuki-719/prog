<!-- ☑お客様情報編集ページ、自店登録者のみ可能-->
<?php
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
$sql = 'SELECT * FROM customer_table WHERE id=:id';
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
  <title>お客様情報編集ページ</title>
</head>

<body>
  <form action="customer_update.php" method="POST">
  <fieldset>
      <legend>お客様情報編集ページ</legend>
      <div>
        お客様名 
        <div><input type="text" name="name" value="<?= $record["name"] ?>" style="width:260px;" placeholder="※姓名の間のスペースは不要"></div>
      </div>
      <div>
        EZOCAID（下8桁）
        <div><input type="text" name="ezoca" value="<?= $record["ezoca"] ?>" style="width:260px;" placeholder="※半角の4桁の数字orなし"></div>
      </div>
      </div>
      <input type="hidden" name="id" value="<?=$record['id']?>">
      <div>
      <div>
      <button id="btn">編集する</button>
      </div>
      <a href="customer_search_index.php">お客様登録確認画面に戻る</a>
  </form>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<!-- /jQuery -->
<script>
$("#btn").on("click",function(){
  alert("編集しました。お客様登録確認画面に戻ります。");
  
});

</script>
</body>

</html>