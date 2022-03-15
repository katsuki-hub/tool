<?php
require_once("../common/es.php");
$backURL = "allstar.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

//簡単なエラー処理
$errors = [];
if (!isset($_POST['number']) || (!ctype_digit($_POST["number"]))) {
  $errors[] = "登録番号には数値を入れてください";
}
if (!isset($_POST['name']) || ($_POST['name'] === "")) {
  $errors[] = "名前が空です";
}
if (!isset($_POST['reg']) || (!ctype_digit($_POST["reg"]))) {
  $errors[] = "登録期には数値を入れてください";
}
if (!isset($_POST['branch']) || ($_POST['branch'] === "")) {
  $errors[] = "所属支部が空です";
}
if (!isset($_POST['remarks']) || (!ctype_digit($_POST["remarks"]))) {
  $errors[] = "得票数には数値を入れてください";
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
$passwoed = 'katsu0901';
$dbName = 'LAA1192529-boatrace';
$host = 'mysql201.phy.lolipop.lan';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "新規レコードSG" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "新規レコードSG" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <?php
        $number = $_POST["number"];
        $name = $_POST["name"];
        $reg = $_POST["reg"];
        $branch = $_POST["branch"];
        $remarks = $_POST["remarks"];

        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "INSERT INTO allstar2022 (number, name, reg, branch,remarks) VALUES (:number, :name, :reg, :branch ,;remarks)";
          $stm = $pdo->prepare($sql);
          $stm->bindValue(':number', $number, PDO::PARAM_INT);
          $stm->bindValue(':name', $name, PDO::PARAM_STR);
          $stm->bindValue(':reg', $reg, PDO::PARAM_INT);
          $stm->bindValue(':branch', $branch, PDO::PARAM_STR);
          $stm->bindValue(':remarks', $remarks, PDO::PARAM_STR);

          if ($stm->execute()) {
            //レコードの表示
            $sql = "SELECT * FROM allstar2022"; //SQL文を作る
            $stm = $pdo->prepare($sql); //プリペアドステートメントを作る
            $stm->execute(); //SQL文を実行
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); //結果の取得(連想配列で受け取る)

            echo "<table border=1>";
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "得票数", "</th>";
            echo "</tr>";

            foreach ($result as $row) {
              echo "<tr>";
              echo "<td>", es($row['number']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['reg']), "</td>";
              echo "<td>", es($row['branch']), "</td>";
              echo "<td>", number_format(es($row['remarks'])), "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo '<span class="error">追加エラーがありました</span><br>';
          };
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