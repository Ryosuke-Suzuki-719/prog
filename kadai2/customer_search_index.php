<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お客様登録確認画面</title>
</head>

<body>
<div>お客様検索（名前orEZOCAID）・新規登録作成ページ</div>
<!-- 名前で検索するフォーム -->
  <form action="customer_name_search_form.php" method="POST">
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
    <input type="search" name="ezoca_search" style="width:260px;" placeholder="※半角の8桁の数字orなし">
    </div>
    <div>
    <input type="submit" name="submit_ezoca" value="検索する">
    </div>
    </fieldset>
  </form>

    <fieldset>
      <legend>新規お客様登録画面</legend>
      <div>検索しても見つからない場合or新規登録のお客様の場合</div>
      <a href="customer_register.php">新規お客様登録画面に進む</a>
    </fieldset>

</body>

</html>