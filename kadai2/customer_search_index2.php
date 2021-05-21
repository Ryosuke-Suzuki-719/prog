<!-- 全店のお客様情報を検索するページ -->
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
  <title>全店お客様台帳確認ページ面</title>
</head>

<body>
<div>現在、店舗コード「<?= $_SESSION['store_id']?>」でログインしています。</div>

<fieldset>
  <legend>全店お客様台帳確認ページ</legend>
<!-- 名前で検索するフォーム -->
    <form action="customer_name_search_form2.php" method="POST">
      <fieldset>
      <legend>名前で検索する</legend>
      <div>
      <input type="search" name="name_search" style="width:260px;" placeholder="※姓名の間のスペースは不要">
      </div>
      <div>
      <input type="submit" name="submit_name" value="検索する">
      </div>
      </fieldset>
    </form>
<!-- EZOCAIDで検索するフォーム -->
    <form action="customer_ezoca_search_form.php" method="POST">
      <fieldset>
      <legend>EZOCAIDで検索する</legend>
      <div>
      <input type="search" name="ezoca_search" style="width:260px;" placeholder="※半角の4桁の数字">
      </div>
      <div>
      <input type="submit" name="submit_ezoca" value="検索する">
      </div>
      </fieldset>
    </form>
</fieldset>
<a href="customer_search_index.php">トップページへ戻る</a>
</body>

</html>