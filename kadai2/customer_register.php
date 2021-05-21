<!-- ☑新規お客様情報登録ページ -->
<?php
// セッションの開始
session_start();
// 関数ファイル読み込み
include ('functions.php');
check_session_id();
// var_dump($_GET);
// exit;

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お客様登録確認画面</title>
</head>
<body>
<div>現在、店舗コード「<?= $_SESSION['store_id']?>」でログインしています。</div>

<!-- お客様情報を新規に登録するページ -->
  <form action="customer_register_act.php" method="POST">
    <fieldset>
      <legend>お客様登録確認画面</legend>
      <div>
        店舗コード
        <input type="text" name="store_id" value="<?= $_SESSION['store_id']?>">
      </div>
      <div>
        登録日<br> 
        <input type="date" name="registered_at">
      </div>
      <div>
        お客様氏名 
        <div><input type="text" name="name" style="width:260px;" placeholder="※姓名の間のスペースは不要"></div>
      </div>
      <div>
        EZOCAID（下4桁）
        <div><input type="text" name="ezoca" style="width:260px;" placeholder="※半角の4桁の数字or空欄"></div>
      </div>
      <div>
        <button>登録する</button>
      </div>
    </fieldset>
  </form>
<a href="customer_search_index.php">トップページへ戻る</a>


</body>

</html>