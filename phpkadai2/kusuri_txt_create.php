<?php
// var_dump($_POST);
// exit;
$age = $_POST['age'];
$sex = $_POST['sex'];
$sick = $_POST['sick'];
$text = $_POST['text'];
// 4つを1つにまとめる
$write_area = "{$age} {$sex} {$sick} {$text}\n";
// aのファイルを開くよ、なければ作る
$file = fopen('data/kusuri.txt','a');
// ファイルにロックを掛ける
flock($file, LOCK_EX);
// write_areaの内容を表記する
fwrite($file, $write_area);
// ファイルをロック、閉じる
flock($file, LOCK_UN);
fclose($file);
// 戻ります
header('Location:kusuri_txt_input.php');