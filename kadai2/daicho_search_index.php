<!-- 名前で化粧品台帳検索ページ -->
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
  <title>DB連携型化粧品台帳検索画面（検索画面）</title>
</head>
<!-- 検索枠を表示 -->
<body>
  <form action="daicho_search_form.php" method="POST">
    <div>名前を入力する</div>
    <div>
    <input type="search" name="search">
    </div>
    <div>
    <input type="submit" name="submit" value="検索する">
    </div>
  </form>
</body>

</html>