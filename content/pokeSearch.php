<?php
require_once("../common/es.php"); //PHPのフォーム~入力データのチェック~で参照してね
$backURL = "pokemon.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

if (empty($_POST)) { //空の時エラー
  header("Location:{$backURL}");
  exit();
} else if (!isset($_POST["type"]) || ($_POST["type"] === "")) {
  header("Location:{$backURL}");
  exit();
}

//接続パラメーター
$user = 'LAA1192529';
$passwoed = 'katsu4426';
$dbName = 'LAA1192529-tool';
$host = 'mysql202.phy.lolipop.lan';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "ポケモン図鑑" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
    .pokename {
      text-align: center;
      font-weight: bold;
      font-size: 22px;
      overflow: hidden;
      width: 100%;
    }

    .status {
      margin-top: -30px;
    }

    .left img {
      float: left;
      width: 50%;
    }

    .right {
      float: right;
      width: 45%;
      text-align: left;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "ポケモン図鑑" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <h2>ポケモンデータ</h2>
        <?php
        $type = $_POST["type"];
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT*FROM `pokemon-data` WHERE types1 LIKE(:type) OR types2 LIKE'%$type%'";
          $stm = $pdo->prepare($sql); //プリペアドステートメント作成
          $stm->bindValue(':type', "%{$type}%", PDO::PARAM_STR);
          $stm->execute(); //SQL文の実行
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
          if (count($result) > 0) {
            echo "{$type}タイプのポケモン一覧", "\n", "<br><br>", PHP_EOL;
            foreach ($result as $row) {
              echo '<div class="pokename">';
              echo "No：", es($row['no']), "\n", "<br>", PHP_EOL;
              echo es($row['name']), "\n", "<br>", PHP_EOL;

              echo '<div class="left">';
              echo '<img src="../images/pokemon/' . es($row['no']) . '.png">';
              echo '</div>';
              echo '<div class="right">';
              echo "<br><br>";
              echo "分類：", es($row['Classification']), "ポケモン", "\n", "<br>", PHP_EOL;
              echo "高さ：", es($row['height']), "m", "\n", "<br>", PHP_EOL;
              echo "重さ：", es($row['weight']), "kg", "\n", "<br>", PHP_EOL;
              echo '</div>';
              echo '</div>';

              echo "<table border=1>";
              echo "<tr>";
              echo "<th>", "タイプ1", "</th>";
              echo "<th>", "タイプ2", "</th>";
              echo "<th>", "特性", "</th>";
              echo "<th>", "夢特性", "</th>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>", es($row['types1']), "</td>";
              echo "<td>", es($row['types2']), "</td>";
              echo "<td>", es($row['abilities']), "</td>";
              echo "<td>", es($row['hiddenAbilities']), "</td>";
              echo "</tr>";
              echo "</table>";
              echo '<table border=1 class="status">';
              echo "<tr>";
              echo "<th>", "ＨＰ", "</th>";
              echo "<th>", "攻撃", "</th>";
              echo "<th>", "防御", "</th>";
              echo "<th>", "特攻", "</th>";
              echo "<th>", "特防", "</th>";
              echo "<th>", "早さ", "</th>";
              echo "<th>", "種族値", "</th>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>", es($row['hp']), "</td>";
              echo "<td>", es($row['attack']), "</td>";
              echo "<td>", es($row['defence']), "</td>";
              echo "<td>", es($row['spAttack']), "</td>";
              echo "<td>", es($row['spDefence']), "</td>";
              echo "<td>", es($row['speed']), "</td>";
              echo "<td>", es($row['total']), "</td>";
              echo "</tr>";
              echo "</table>";
              echo "<p>" . es($row['form']) . "</p><br><HR>";
            }
          } else {
            echo "{$type}ポケモンは見つかりませんでした。";
          }
        } catch (Exception $e) {
          echo '<span class="error">エラーがありました</span><br>';
          echo $e->getMessage();
        }
        ?>
        <p><a href="<?php echo $backURL ?>">戻る</a></p>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>