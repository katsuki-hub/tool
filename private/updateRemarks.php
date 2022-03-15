<?php
require_once("../common/es.php");
$backURL = "classicRemarks.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

//簡単なエラー処理
$errors = [];
if (!isset($_POST['number']) || (!is_numeric($_POST["number"]))) {
  $errors[] = "番号には数値を入れてください";
}
if (!isset($_POST['remarks']) || ($_POST['remarks'] === "")) {
  $errors[] = "備考が空です";
}

//エラーがあったとき
if (count($errors) > 0) {
  echo '<ol class="error">';
  foreach ($errors as $value) {
    echo "<li>", $value, "</li>";
  }
  echo "</ol>";
  echo "<HR>";
  echo "<a href=", $backURL, ">戻る</a>";
  exit();
}

//接続パラメーター
$user = 'LAA1192529';
$passwoed = 'katsu0901';
$dbName = 'LAA1192529-boatrace';
$host = 'mysql201.phy.lolipop.lan';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "更新レコード プロフィール" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "更新レコード 備考欄" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <?php
        $number = $_POST["number"];
        $remarks = $_POST["remarks"];

        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE `classic2022` SET `remarks` = '$remarks' WHERE CONCAT(`classic2022`.`number`) = $number";

          $stm = $pdo->prepare($sql);
          $stm->execute(); //sql文の実行！！！！
          echo "入力完了です！";
        } catch (Exception $e) {
          echo '<span class="error">エラーがありました</span><br>';
          echo $e->getMessage();
        }
        ?>
        <HR>
        <p><a href="<?php echo $backURL ?>">戻る</a></p>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>