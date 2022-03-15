<?php
require_once("../common/es.php");
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
  <?php $title = "2022年SGスケジュール" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
    .hidden {
      display: none;
    }
    table {
      font-size: 13px;
    }
    .red {
      color: red;
    }
    .submenu th {
      background: yellow;
    }
    .submenu td {
      background: #f5cccc;
    }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "2022年SGスケジュール" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <h2>2022年のSG開催スケジュール</h2>
        <table border="10">
          <tr>
            <th>開催日程</th>
            <th>タイトル</th>
            <th>開催場</th>
            <th>優勝者</th>
          </tr>
          <tr>
            <td>3/16~3/21</td>
            <td>ボートレースクラシック（総理大臣杯）</td>
            <td>大村</td>
            <td></td>
          </tr>
          <tr>
            <td>5/24~5/29</td>
            <td>ボートレースオールスター（笹川賞）</td>
            <td>宮島</td>
            <td></td>
          </tr>
          <tr>
            <td>6/21~6/26</td>
            <td>グランドチャンピオン（グランドチャンピオン決定戦）</td>
            <td>唐津</td>
            <td></td>
          </tr>
          <tr>
            <td>7/19~7/24</td>
            <td>オーシャンカップ</td>
            <td>尼崎</td>
            <td></td>
          </tr>
          <tr>
            <td>8/23~8/28</td>
            <td>第68回ボートレースメモリアル（モーターボート記念）</td>
            <td>浜名湖</td>
            <td></td>
          </tr>
          <tr>
            <td>10/25~10/30</td>
            <td>ボートレースダービー（全日本選手権）</td>
            <td>常滑</td>
            <td></td>
          </tr>
          <tr>
            <td>11/22~11/27</td>
            <td>チャレンジカップ</td>
            <td>鳴門</td>
            <td></td>
          </tr>
          <tr>
            <td>12/13~12/18</td>
            <td>グランプリシリーズ</td>
            <td>大村</td>
            <td></td>
          </tr>
          <tr>
            <td>12/13~12/18</td>
            <td>グランプリ（賞金王決定戦）</td>
            <td>大村</td>
            <td></td>
          </tr>
        </table>
        <h2>出場選手</h2>
        <p class="red">※下記の☆レースをクリックすると出場選手が表示されます！</p>
        <div class="submenu">
          <h4>☆第５７回ボートレースクラシック出場メンバー</h4>
          <?php
          try {
            $pdo = new PDO($dsn, $user, $passwoed);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM classic2022";
            $stm = $pdo->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border=1 class="hidden">';
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "備考", "</th>";
            echo "</tr>";

            foreach ($result as $row) {
              echo "<tr>";
              echo "<td>", es($row['number']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['reg']), "</td>";
              echo "<td>", es($row['branch']), "</td>";
              echo "<td>", es($row['remarks']), "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } catch (Exception $e) {
            echo '<span class="error">エラーがあります</span><br>';
            echo $e->getMessage();
            exit();
          }
          ?>
        </div>

        <div class="submenu">
          <h4>☆第４９回ボートレースオールスター出場メンバー</h4>
          <?php
          try {
            $sql2 = "SELECT * FROM allstar2022";
            $stm2 = $pdo->prepare($sql2);
            $stm2->execute();
            $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border=1 class="hidden">';
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "備考", "</th>";
            echo "</tr>";

            foreach ($result2 as $row) {
              echo "<tr>";
              echo "<td>", es($row['number']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['reg']), "</td>";
              echo "<td>", es($row['branch']), "</td>";
              echo "<td>", es($row['remarks']), "</td>";
              echo "</tr>";
            }
            echo "</table>";
          } catch (Exception $e) {
            echo '<span class="error">エラーがあります</span><br>';
            echo $e->getMessage();
            exit();
          }
          ?>
        </div>




      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $(".submenu h4").on("click", function() {
        $(this).next().toggleClass("hidden");
      });
    });
  </script>
</body>

</html>