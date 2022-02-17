<?php
require_once("../common/es.php");
$backURL = "pokemon.php";
//接続パラメーター
$user = 'katsuki';
$passwoed = 'katsu4426';
$dbName = 'pokemon';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "ポケモン図鑑" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "ポケモン図鑑" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>全ポケモンデータ</h2>
          <?php
          try {
            $pdo = new PDO($dsn, $user, $passwoed);
            //プリペアドステートメントのエミュレーションを無効にする
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //例外がスローされる設定にする
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `pokemon-data`"; //SQL文を作る
            $stm = $pdo->prepare($sql); //プリペアドステートメントを作る
            $stm->execute(); //SQL文を実行
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); //結果の取得(連想配列で受け取る)
            echo "<table border=1>";
            echo "<tr>";
            echo "<th>", "No", "</th>";
            echo "<th>", "なまえ", "</th>";
            echo "<th>", "タイプ1", "</th>";
            echo "<th>", "タイプ2", "</th>";
            echo "<th>", "分類", "</th>";
            echo "<th>", "高さ", "</th>";
            echo "<th>", "重さ", "</th>";
            echo "</tr>";

            foreach ($result as $row) {
              echo "<tr>";
              echo "<td>", es($row['no']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['types1']), "</td>";
              echo "<td>", es($row['types2']), "</td>";
              echo "<td>", es($row['Classification']), "</td>";
              echo "<td>", es($row['height']), "m", "</td>";
              echo "<td>", es($row['weight']), "kg", "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } catch (Exception $e) { //接続失敗で例外処理実行
            echo '<span class="error">エラーがありました</span><br>';
            echo $e->getMessage();
            exit();
          }
          ?>
          <HR>
          <p><a href="<?php echo $backURL ?>">戻る</a></p>

        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>