<!-- トップページ、ログイン後ここから全てが始まる -->
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

<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css" type="text/css" media="all" />
<title>サツドラ化粧品台帳メインメニュー</title>
</head>

<body>
<div class="login_page2">
  <h1 class="login_title">サツドラ化粧品台帳メインメニュー</h1>
  <div class="login_information">現在、店舗コード「<?= $_SESSION['store_id']?>」でログインしています。</div>

  <div class="flex_half">
    <form action="daicho_read.php" method="POST">
    <!-- <fieldset> -->
      <!-- <legend>自店の化粧品台帳を確認する</legend> -->
      <div class="hiden"><input type="text" name=store_id value="<?= $_SESSION['store_id']?>" style="width:260px;">
      </div>
      <div>
        <input type="submit" name="submit_my_store" value="自店の化粧品台帳を閲覧する" class="main_btn">
      </div>
    <!-- </fieldset> -->
    </form>

    <form action="customer_store_id_search_form.php" method="POST">
      <!-- <fieldset> -->
      <!-- <legend>自店の化粧品台帳登録者情報を確認する</legend> -->
      <div class="hiden">
        <input type="text" name=store_id value="<?= $_SESSION['store_id']?>" style="width:260px;">
      </div>
      <div>
        <input type="submit" name="submit_name" value="自店の登録者情報を閲覧する" class="main_btn">
      </div>
      <!-- </fieldset> -->
    </form>
  </div>

  <div class="flex_half">
    <form action="customer_register.php" method="POST">
    <!-- <fieldset> -->
    <!-- <legend>化粧品台帳に新規お客様情報を登録する</legend> -->
      <input type="submit" name="submit_register" value="新規お客様情報を登録する" class="main_btn">
    <!-- </fieldset> -->
    </form>

    <form action="customer_search_index2.php" method="POST">
    <!-- <fieldset> -->
    <!-- <legend>化粧品台帳に新規お客様情報を登録する</legend> -->
      <input type="submit" name="submit_search" value="全店からお客様情報を検索する" class="main_btn">
    <!-- </fieldset> -->
    </form>
  </div>
</div>
<a href="daicho_logout.php" class="login_btn">ログアウト</a>
</body>

</html>