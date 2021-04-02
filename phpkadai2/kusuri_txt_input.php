<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>薬を買う時に困ることアンケート</title>
</head>

<body>
  <form action="kusuri_txt_create.php" method="post">
    <fieldset>
      <legend>薬を買う時に困ることアンケート（入力画面）</legend>
      <a href="kusuri_txt_read.php">アンケート結果を見る</a>
      <div>
        <!-- 性別: <input type="text" name="sex"> -->
        <input type="radio" name="sex" value="男性">男性
        <input type="radio" name="sex" value="女性">女性
      </div>
      <div>
        <!-- 年齢: <input type="text" name="age"> -->
        <select name="age">
          <option value="">年齢を選択してください</option>
          <option value="20歳未満">20歳未満</option>
          <option value="20-29歳">20-29歳</option>
          <option value="30-39歳">30-39歳</option>
          <option value="40-49歳">40-49歳</option>
          <option value="50-59歳">50-59歳</option>
          <option value="60-69歳">60-69歳</option>
          <option value="70-79歳">70-79歳</option>
          <option value="80歳以上">80歳以上</option>
        </select>
      </div>

      <div>
        <!-- 薬を買う時に悩むこと: <input type="text" name="sick"> -->
        <input type="radio" name="sick" value="薬の違いがわからない">薬の違いがわからない
        <input type="radio" name="sick" value="どの薬が自分の症状に合うかわからない">どの薬が自分の症状に合うかわからない <br>
        <input type="radio" name="sick" value="その他">その他<input type="text" name="text">
      <div>
        <button name="btn">答える</button>
      </div>
    </fieldset>
  </form>
<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQuery -->
<script>
  $("#btn").on("click", function(){
    alert("お答えいただきありがとうございます。");
  });



</script>

</body>

</html>