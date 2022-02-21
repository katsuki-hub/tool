<?php
require_once("../common/es.php");
$backURL = "insertPokeForm.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

//簡単なエラー処理
$errors = [];
if (!isset($_POST['no']) || (!is_numeric($_POST["no"]))) {
  $errors[] = "登録番号には数値を入れてください";
}
if (!isset($_POST['name']) || ($_POST['name'] === "")) {
  $errors[] = "名前が空です";
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
$user = 'katsuki';
$passwoed = 'katsu4426';
$dbName = 'pokemon';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "新規レコード ポケモン" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "新規レコード ポケモン" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <?php
        $no = $_POST["no"];
        $name = $_POST["name"];
        $form = $_POST["form"];
        $types1 = $_POST["types1"];
        $types2 = $_POST["types2"];
        $abilities = $_POST["abilities"];
        $hiddenAbilities = $_POST["hiddenAbilities"];
        $hp = $_POST["hp"];
        $attack = $_POST["attack"];
        $defence = $_POST["defence"];
        $spAttack = $_POST["spAttack"];
        $spDefence = $_POST["spDefence"];
        $speed = $_POST["speed"];
        $total = $_POST["total"];
        $Classification = $_POST["Classification"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $local = $_POST["local"];

        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "INSERT INTO `pokemon-data` (`no`, `name`, `form`, `types1`, `types2`, `abilities`, `hiddenAbilities`, `hp`, `attack`, `defence`, `spAttack`, `spDefence`, `speed`, `total`, `Classification`, `height`, `weight`, `local`) VALUES (:no, :name, :form, :types1, :types2, :abilities, :hiddenAbilities, :hp, :attack, :defence, :spAttack, :spDefence, :speed, :total, :Classification, :height, :weight, :local)";
          $stm = $pdo->prepare($sql);
          $stm->bindValue(':no', $no, PDO::PARAM_INT);
          $stm->bindValue(':name', $name, PDO::PARAM_STR);
          $stm->bindValue(':form', $form, PDO::PARAM_STR);
          $stm->bindValue(':types1', $types1, PDO::PARAM_STR);
          $stm->bindValue(':types2', $types2, PDO::PARAM_STR);
          $stm->bindValue(':abilities', $abilities, PDO::PARAM_STR);
          $stm->bindValue(':hiddenAbilities', $hiddenAbilities, PDO::PARAM_STR);
          $stm->bindValue(':hp', $hp, PDO::PARAM_INT);
          $stm->bindValue(':attack', $attack, PDO::PARAM_INT);
          $stm->bindValue(':defence', $defence, PDO::PARAM_INT);
          $stm->bindValue(':spAttack', $spAttack, PDO::PARAM_INT);
          $stm->bindValue(':spDefence', $spDefence, PDO::PARAM_INT);
          $stm->bindValue(':speed', $speed, PDO::PARAM_INT);
          $stm->bindValue(':total', $total, PDO::PARAM_INT);
          $stm->bindValue(':Classification', $Classification, PDO::PARAM_STR);
          $stm->bindValue(':height', $height, PDO::PARAM_INT);
          $stm->bindValue(':weight', $weight, PDO::PARAM_INT);
          $stm->bindValue(':local', $local, PDO::PARAM_STR);

          $stm->execute();
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