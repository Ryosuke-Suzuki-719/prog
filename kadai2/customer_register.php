<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お客様登録確認画面</title>
</head>

<body>
<!-- お客様情報を新規に登録するページ -->
  <form action="customer_register_act.php" method="POST">
    <fieldset>
      <legend>お客様登録確認画面</legend>
      <div>
        お客様名 
        <div><input type="text" name="name" style="width:260px;" placeholder="※姓名の間のスペースは不要"></div>
      </div>
      <div>
        EZOCAID（下8桁）
        <div><input type="text" name="ezoca" style="width:260px;" placeholder="※半角の8桁の数字orなし"></div>
      </div>
      <div>
        <button>登録する</button>
      </div>
      <a href="customer_search_index.php">お客様検索画面に戻る</a>
    </fieldset>
  </form>

</body>

</html>