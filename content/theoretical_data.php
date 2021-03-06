<?php
require_once("../common/es.php"); //PHPのフォーム~入力データのチェック~で参照してね
$backURL = "theoretical_stock.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

if (empty($_POST)) { //空の時エラー
  header("Location:{$backURL}");
  exit();
} else if (!isset($_POST["code"]) || ($_POST["code"] === "")) {
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
  <?php $title = "理論株価" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  table {
    text-align: center;
    font-size: 13px;
  }

  th {
    background: rgba(215, 227, 157, 0.9);
  }

  .theory {
    color: rgb(1, 120, 85);
    font-weight: bold;
  }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "大診断拡張版2022夏号" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <h2>株価診断</h2>
        <?php
        $code = $_POST["code"];
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "SELECT*FROM `theoretical_stock` WHERE `code` LIKE(:code) OR `name` LIKE'%$code%'";
          $stm = $pdo->prepare($sql); //プリペアドステートメント作成
          $stm->bindValue(':code', "%{$code}%", PDO::PARAM_STR);
          $stm->execute(); //SQL文の実行
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
          if (count($result) > 0) {
            echo "『{$code}』の検索結果";
            foreach ($result as $row) {
              echo "<table border=1>";
              echo "<tr>";
              echo "<th>", "証券コード", "</th>";
              echo "<th>", "社名", "</th>";
              echo "<th>", "業種", "</th>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>", es($row['code']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['industry']), "</td>";
              echo "</tr>";
              echo "<tr>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>", "業績予想変化率", "</th>";
              echo "<th>", "PER", "</th>";
              echo "<th>", "PBR", "</th>";
              echo "</tr>";

              echo "<tr>";
              echo "<td>", es($row['predict']), "%", "</td>";
              echo "<td>", es($row['per']), "倍", "</td>";
              echo "<td>", es($row['pbr']), "倍", "</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>", "配当利回り", "</th>";
              echo "<th>", "理論株価", "</th>";
              echo "<th>", "理論株価修正余地", "</th>";
              echo "</tr>";

              echo "<tr>";
              echo "<td>", es($row['dividend']), "</td>";
              echo '<td class="theory">', es($row['theory']), "円", "</td>";
              echo "<td>", es($row['correct']), "円", "</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>", "業績進捗率", "</th>";
              echo "<th>", "進捗率四半期決算期", "</th>";
              echo "<th>", "会社計画営業増益率", "</th>";
              echo "</tr>";

              echo "<tr>";
              echo "<td>", es($row['performance']), "%", "</td>";
              echo "<td>", es($row['quarter']), "</td>";
              echo "<td>", es($row['increase']), "%", "</td>";
              echo "</tr>";

              echo "<tr>";
              echo "<th>", "破綻危険度", "</th>";
              echo "<th>", "株価日付", "</th>";
              echo "<th>", "株価",  "</th>";
              echo "</tr>";

              echo "<tr>";
              echo "<td>", es($row['dangerous']), "</td>";
              echo "<td>", es($row['day']), "</td>";
              echo "<td>", es($row['price']), "円", "</td>";
              echo "</tr>";

              echo "</table>", "<br>";
            }
          } else {
            echo "『{$code}』は見つかりませんでした。";
          }
        } catch (Exception $e) { //接続失敗で例外処理実行
          echo '<span class="error">エラーがありました</span><br>';
          echo $e->getMessage();
          exit();
        }
        ?>
        <HR>
        <p><a href="<?php echo $backURL ?>">戻る</a></p>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>