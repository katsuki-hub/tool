<?php
if (empty($_POST["csvData"])) {
  //POSTされた値がないときHOMEへリダイレクト
  $url = "https://tool.katsumaru.blog";
  header("Location:" . $url);
  exit();
}

$csvData = $_POST["csvData"];
$filename = "../data/covid_2022.csv";
$fp = fopen($filename, "ab");
flock($fp, LOCK_EX);
fwrite($fp, $csvData . "\n");
flock($fp, LOCK_UN);

//リダイレクト
$url = "http://localhost/develop/tool/content/covid2022.php";
header("Location:" . $url);
exit();
