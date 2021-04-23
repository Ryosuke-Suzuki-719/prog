<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録画面</title>
</head>

<body>
  <form action="daicho_register_act.php" method="POST">
    <fieldset>
      <legend>登録画面</legend>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>登録する</button>
      </div>
      <a href="daicho_login.php">ログイン画面に戻る</a>
    </fieldset>
  </form>

</body>

</html>