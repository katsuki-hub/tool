<?php
require_once("../common/es.php");
$backURL = "pokeForm.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

//簡単なエラー処理
$errors = [];
if (!isset($_POST['no']) || (!is_numeric($_POST["no"]))) {
  $errors[] = "番号には数値を入れてください";
}
if (!isset($_POST['Classification']) || ($_POST['Classification'] === "")) {
  $errors[] = "分類が空です";
}
if (!isset($_POST['height']) || (!is_numeric($_POST["height"]))) {
  $errors[] = "高さには数値を入れてください";
}
if (!isset($_POST['weight']) || (!is_numeric($_POST["weight"]))) {
  $errors[] = "重さには数値を入れてください";
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

//データベース
$user = 'LAA1192529';
$passwoed = 'katsu4426';
$dbName = 'LAA1192529-tool';
$host = 'mysql202.phy.lolipop.lan';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "更新レコード ポケモン" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "更新レコード ポケモン" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <?php
        $no = $_POST["no"];
        $Classification = $_POST["Classification"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];

        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "UPDATE `pokemon-data` SET `Classification` = ':Classification', `height` = ':height', `weight` = ':weight' WHERE CONCAT(`pokemon-data`.`no`) = ':no';";

          $stm = $pdo->prepare($sql);
          $stm->bindValue(':no', $no, PDO::PARAM_INT);
          $stm->bindValue(':Classification', $Classification, PDO::PARAM_STR);
          $stm->bindValue(':height', $height, PDO::PARAM_INT);
          $stm->bindValue(':weight', $weight, PDO::PARAM_INT);
          echo "入力完了です！"
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