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
      width: 100%;
    }

    .red {
      color: red;
    }

    .submenu th {
      background: yellow;
    }

    .submenu td {
      background: #e5f0dd;
    }

    .rem {
      font-size: 11px;
    }

    h4 {
      font-weight: bold;
      font-style: italic;
      color: #4d4444;
    }

    .n1 {
      background: #ffffff;
    }

    .n2 {
      background: #000000;
      color: #ffffff;
    }

    .n3 {
      background: #ff0000;
      color: #ffffff;
    }

    .n4 {
      background: #0000ff;
      color: #ffffff;
    }

    .n5 {
      background: #ffff00;
    }

    .n6 {
      background: #00ff00;
    }

    .submenu button {
      font-size: 15px;
      font-weight: bold;
      margin: 25px auto;
      display: block;
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
            <td>遠藤エミ</td>
          </tr>
          <tr>
            <td>5/24~5/29</td>
            <td>ボートレースオールスター（笹川賞）</td>
            <td>宮島</td>
            <td>原田幸哉</td>
          </tr>
          <tr>
            <td>6/21~6/26</td>
            <td>グランドチャンピオン（グランドチャンピオン決定戦）</td>
            <td>唐津</td>
            <td>池田浩二</td>
          </tr>
          <tr>
            <td>7/19~7/24</td>
            <td>オーシャンカップ</td>
            <td>尼崎</td>
            <td>椎名豊</td>
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
        <h2>出場選手＆優勝戦結果</h2>
        <small class="red">※下記の☆レースをクリックすると出場選手が表示されます！</small>

        <h3>ボートレースクラシック優勝戦結果</h3>
        <div class="submenu">
          <button>☆第５７回ボートレースクラシック出場メンバー</button>
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
              echo '<td class="rem">', es($row['remarks']), "</td>";
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
        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>着</th>
                <th>枠</th>
                <th>選手名</th>
                <th>レースタイム</th>
                <th>ST</th>
              </tr>
              <tr>
                <td>１</td>
                <td class="n1">１</td>
                <td>遠藤 エミ</td>
                <td>1'46"7</td>
                <td>.07</td>
              </tr>
              <tr>
                <td>２</td>
                <td class="n4">４</td>
                <td>上條 暢嵩</td>
                <td>1'48"4</td>
                <td>.07</td>
              </tr>
              <tr>
                <td>３</td>
                <td class="n5">５</td>
                <td>中島 孝平</td>
                <td>1'49"8</td>
                <td>.07</td>
              </tr>
              <tr>
                <td>４</td>
                <td class="n2">２</td>
                <td>秦 英悟</td>
                <td>1'50"9</td>
                <td>.05</td>
              </tr>
              <tr>
                <td>５</td>
                <td class="n3">３</td>
                <td>毒島 誠</td>
                <td>1'51"2</td>
                <td>.06</td>
              </tr>
              <tr>
                <td>６</td>
                <td class="n6">６</td>
                <td>前田 将太</td>
                <td>1'52"0</td>
                <td>.07</td>
              </tr>
            </tbody>
          </table>
          <figcaption>優勝戦　12Ｒ　決まり手：逃げ</figcaption>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>天候</th>
                <th>風速</th>
                <th>波高</th>
                <th>スタート</th>
              </tr>
              <tr>
                <td>雨</td>
                <td>1m</td>
                <td>1cm</td>
                <td>向い風</td>
              </tr>
            </tbody>
          </table>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>2連単</th>
                <td class="n1">１</td>
                <td>ー</td>
                <td class="n4">４</td>
                <td>710円</td>
                <td class="red">3</td>
              </tr>
              <tr>
                <th>3連単</th>
                <td class="n1">１</td>
                <td class="n4">４</td>
                <td class="n5">５</td>
                <td>2,920円</td>
                <td class="red">10</td>
              </tr>
            </tbody>
          </table>
        </figure>
        <div class="br50"></div>

        <h3>ボートレースオールスター優勝戦結果</h3>
        <div class="submenu">
          <button>☆第49回ボートレースオールスター出場メンバー</button>
          <?php
          try {
            $sql2 = "SELECT * FROM allstar2022 order by remarks desc";
            $stm2 = $pdo->prepare($sql2);
            $stm2->execute();
            $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border=1 class="hidden">';
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "得票数", "</th>";
            echo "</tr>";

            foreach ($result2 as $row) {
              echo "<tr>";
              echo "<td>", es($row['number']), "</td>";
              echo "<td>", es($row['name']), "</td>";
              echo "<td>", es($row['reg']), "</td>";
              echo "<td>", es($row['branch']), "</td>";
              echo "<td>", number_format(es($row['remarks'])), "</td>";
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
        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>着</th>
                <th>枠</th>
                <th>選手名</th>
                <th>レースタイム</th>
                <th>ST</th>
              </tr>
              <tr>
                <td>１</td>
                <td class="n3">３</td>
                <td>原田 幸哉</td>
                <td>1'48"4</td>
                <td>.09</td>
              </tr>
              <tr>
                <td>２</td>
                <td class="n1">１</td>
                <td>白井 英治</td>
                <td>1'50"7</td>
                <td>.10</td>
              </tr>
              <tr>
                <td>３</td>
                <td class="n5">５</td>
                <td>篠崎 元志</td>
                <td>1'52"2</td>
                <td>.19</td>
              </tr>
              <tr>
                <td>４</td>
                <td class="n4">４</td>
                <td>石野 貴之</td>
                <td>1'53"2</td>
                <td>.18</td>
              </tr>
              <tr>
                <td>５</td>
                <td class="n2">２</td>
                <td>村松 修二</td>
                <td>1'53"3</td>
                <td>.12</td>
              </tr>
              <tr>
                <td>６</td>
                <td class="n6">６</td>
                <td>平高 奈菜</td>
                <td>1'53"5</td>
                <td>.17</td>
              </tr>
            </tbody>
          </table>
          <figcaption>優勝戦　12R　決まり手：まくり差し</figcaption>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>天候</th>
                <th>風速</th>
                <th>波高</th>
                <th>スタート</th>
              </tr>
              <tr>
                <td>晴れ</td>
                <td>3m</td>
                <td>3cm</td>
                <td>向い風</td>
              </tr>
            </tbody>
          </table>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>2連単</th>
                <td class="n3">３</td>
                <td>ー</td>
                <td class="n1">１</td>
                <td>1,380円</td>
                <td class="red">5</td>
              </tr>
              <tr>
                <th>3連単</th>
                <td class="n3">３</td>
                <td class="n5">５</td>
                <td class="n1">１</td>
                <td>5,840円</td>
                <td class="red">18</td>
              </tr>
            </tbody>
          </table>
        </figure>

        <div class="br50"></div>

        <h3>グランドチャンピオン優勝戦結果</h3>
        <div class="submenu">
          <button>☆第32回グランドチャンピオン出場メンバー</button>
          <?php
          try {
            $sql3 = "SELECT * FROM grandchampion2022";
            $stm3 = $pdo->prepare($sql3);
            $stm3->execute();
            $result3 = $stm3->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border=1 class="hidden">';
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "備考", "</th>";
            echo "</tr>";

            foreach ($result3 as $row) {
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
        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>着</th>
                <th>枠</th>
                <th>選手名</th>
                <th>レースタイム</th>
                <th>ST</th>
              </tr>
              <tr>
                <td>１</td>
                <td class="n1">１</td>
                <td>池田 浩二</td>
                <td>1'49"1</td>
                <td>.15</td>
              </tr>
              <tr>
                <td>２</td>
                <td class="n2">２</td>
                <td>上平 真二</td>
                <td>1'49"8</td>
                <td>.13</td>
              </tr>
              <tr>
                <td>３</td>
                <td class="n6">６</td>
                <td>赤岩 善生</td>
                <td>1'52"0</td>
                <td>.16</td>
              </tr>
              <tr>
                <td>４</td>
                <td class="n5">５</td>
                <td>柳沢 一</td>
                <td>1'52"8</td>
                <td>.17</td>
              </tr>
              <tr>
                <td>５</td>
                <td class="n4">４</td>
                <td>中野 次郎</td>
                <td>1'56"4</td>
                <td>.14</td>
              </tr>
              <tr>
                <td>６</td>
                <td class="n3">３</td>
                <td>山口 剛</td>
                <td>1'59"8</td>
                <td>.11</td>
              </tr>
            </tbody>
          </table>
          <figcaption>優勝戦　12R　決まり手：抜き</figcaption>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>天候</th>
                <th>風速</th>
                <th>波高</th>
                <th>スタート</th>
              </tr>
              <tr>
                <td>晴れ</td>
                <td>5m</td>
                <td>5cm</td>
                <td>向い風</td>
              </tr>
            </tbody>
          </table>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>2連単</th>
                <td class="n1">１</td>
                <td>ー</td>
                <td class="n2">２</td>
                <td>300円</td>
                <td class="red">1</td>
              </tr>
              <tr>
                <th>3連単</th>
                <td class="n1">１</td>
                <td class="n2">２</td>
                <td class="n6">６</td>
                <td>1,250円</td>
                <td class="red">3</td>
              </tr>
            </tbody>
          </table>
        </figure>
        <div class="br50"></div>

        <h3>オーシャンカップ優勝戦結果</h3>
        <div class="submenu">
          <button>☆第27回オーシャンカップ出場メンバー</button>
          <?php
          try {
            $sql4 = "SELECT * FROM ocean2022";
            $stm4 = $pdo->prepare($sql4);
            $stm4->execute();
            $result4 = $stm4->fetchAll(PDO::FETCH_ASSOC);

            echo '<table border=1 class="hidden">';
            echo "<tr>";
            echo "<th>", "登録番号", "</th>";
            echo "<th>", "選手名", "</th>";
            echo "<th>", "登録期", "</th>";
            echo "<th>", "支部", "</th>";
            echo "<th>", "備考", "</th>";
            echo "</tr>";

            foreach ($result4 as $row) {
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
        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>着</th>
                <th>枠</th>
                <th>選手名</th>
                <th>レースタイム</th>
                <th>ST</th>
              </tr>
              <tr>
                <td>１</td>
                <td class="n1">１</td>
                <td>椎名 豊</td>
                <td>1'49"7</td>
                <td>.11</td>
              </tr>
              <tr>
                <td>２</td>
                <td class="n2">２</td>
                <td>稲田 浩二</td>
                <td>1'51"0</td>
                <td>.16</td>
              </tr>
              <tr>
                <td>３</td>
                <td class="n5">５</td>
                <td>桐生 順平</td>
                <td>1'52"4</td>
                <td>.14</td>
              </tr>
              <tr>
                <td>４</td>
                <td class="n4">４</td>
                <td>太田 和美</td>
                <td>1'53"3</td>
                <td>.17</td>
              </tr>
              <tr>
                <td>５</td>
                <td class="n3">３</td>
                <td>丸岡 正典</td>
                <td>1'53"4</td>
                <td>.27</td>
              </tr>
              <tr>
                <td>６</td>
                <td class="n6">６</td>
                <td>片岡 雅裕</td>
                <td>1'56"5</td>
                <td>.14</td>
              </tr>
            </tbody>
          </table>
          <figcaption>優勝戦　12R　決まり手：逃げ</figcaption>
        </figure>

        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>天候</th>
                <th>風速</th>
                <th>波高</th>
                <th>スタート</th>
              </tr>
              <tr>
                <td>晴れ</td>
                <td>7m</td>
                <td>5cm</td>
                <td>向い風</td>
              </tr>
            </tbody>
          </table>
        </figure>


        <figure>
          <table border="3">
            <tbody>
              <tr>
                <th>2連単</th>
                <td class="n1">１</td>
                <td>ー</td>
                <td class="n2">２</td>
                <td>350円</td>
                <td class="red">1</td>
              </tr>
              <tr>
                <th>3連単</th>
                <td class="n1">１</td>
                <td class="n2">２</td>
                <td class="n5">５</td>
                <td>1,000円</td>
                <td class="red">1</td>
              </tr>
            </tbody>
          </table>
        </figure>


      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $(".submenu button").on("click", function() {
        $(this).next().toggleClass("hidden");
      });
    });
  </script>
</body>

</html>