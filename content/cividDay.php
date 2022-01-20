<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "コロナウイルス日別感染数" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
    @media screen and (max-width:500px) {
      table {
        font-size: 10px;
      }
    }

    .th {
      background-color: rgba(126, 179, 140, 0.6);
    }

    .day {
      background-color: rgba(126, 179, 140, 0.2);
    }

    .all {
      background-color: rgba(255, 207, 205, 0.6);
      ;
    }

    .fukuoka {
      background-color: rgba(160, 245, 126, 0.6);
    }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "CIVUD 日別感染数" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>福岡県の新規感染者データ</h2>
          <h3>直近の日別データ</h3>
          <small>※データは厚生労働省が発行しているオープンデータを参照<br>（都道府県・政令指定都市・中核都市が毎日HPにて発表するデータおよびHER-SYSデータに基づいた患者属性情報）</small>
          <?php
          //https://covid19.mhlw.go.jp/public/opendata/newly_confirmed_cases_daily.csv
          $csv = fopen('../data/newly_confirmed_cases_daily.csv', 'r');

          echo '<table border="8">';
          echo '<tr class="th">
          <th>日付</th>
          <th>全国</th>
          <th>福岡県</th>
          <th>東京都</th>
          <th>大阪府</th>
          <th>沖縄県</th>
          </tr>';
          while (($csvdata = fgetcsv($csv, 80008000)) !== false) {
            list($item_date, $item_infection,,,,,,,,,,,,, $item_tokyo,,,,,,,,,,,,,, $item_osaka,,,,,,,,,,,,, $item_fukuoka,,,,,,, $item_okinawa) = $csvdata;

            $all = number_format($item_infection);
            $fukuoka = number_format($item_fukuoka);
            $tokyo = number_format($item_tokyo);
            $osaka = number_format($item_osaka);
            $okinawa = number_format($item_okinawa);

            echo '<tr>' . '<td class="day">' . "$item_date" . '</td>' . '<td class="all">' . "{$all}人" . '</td>' . '<td class="fukuoka">' . "{$fukuoka}人" . '</td>' . '<td>' . "{$tokyo}人" . '</td>' . '<td>' . "{$osaka}人" . '</td>' . '<td>' . "{$okinawa}人" . '</td>' . '</tr>' . "\n";
          }
          echo '</table>';
          fclose($csv);
          ?>



        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>