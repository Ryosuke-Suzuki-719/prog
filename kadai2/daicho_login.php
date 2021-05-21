<!-- ☑最初のログインページ -->

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css" type="text/css" media="all" />

<title>サツドラ化粧品台帳</title>
</head>

<body>
<div class="login_page">
<h1 class="login_title">サツドラ化粧品台帳</h1>
  <form action="daicho_login_act.php" method="POST">
      <div><input type="text" name="store_id" placeholder="sd+店舗コード"  class="login_id_pass"></div>
      <div><input type="text" name="password"  placeholder="パスワードを入力" class="login_id_pass"></div>
      <div>
        <button class="login_btn">ログイン</button>
      </div>
  </form>
</div> 

<a href="daicho_register.php">登録画面に行く</a>

</body>

</html>
