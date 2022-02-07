<?php
if (empty($_POST["csvData"])) {
  //POSTされた値がないときHOMEへリダイレクト
  $url = "https://tool.katsumaru.blog";
  header("Location:" . $url);
  exit();
}

$csvData = $_POST["csvData"];
$filename = "../data/covid_2022.csv";
try {
  $fileobj = new SplFileObject($filename, "ab");
} catch (Exception $e) {
  echo '<span class="error">エラーがありました</span>';
  echo $e->getMessage();
  exit();
}

$fileobj->flock(LOCK_EX); // 排他ロック
$result = $fileobj->fwrite($csvData); //メモを追記
$fileobj->flock(LOCK_UN); //アンロック

//リダイレクト
$url = "https://tool.katsumaru.blog/content/covid2022.php";
header("Location:" . $url);
exit();