<!-- ☑ログインページ、使っていない -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗ログイン登録画面</title>
</head>

<body>
  <form action="daicho_register_act.php" method="POST">
    <fieldset>
      <legend>店舗ログイン登録画面</legend>
      <div>
        店舗コード<input type="text" name="store_id" placeholder="sd+店舗コード">
      </div>
      <div>
        パスワード<input type="text" name="password">
      </div>
      <div>
        <button>登録する</button>
      </div>
      <a href="daicho_login.php">ログイン画面に戻る</a>
    </fieldset>
  </form>

</body>

</html>