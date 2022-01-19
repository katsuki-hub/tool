<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "コロナウイルス日別感染数" ?>
  <?php require_once "../common/head.php"; ?>
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
          <?php
          //https://covid19.mhlw.go.jp/public/opendata/newly_confirmed_cases_daily.csv
          $csv = fopen('../data/newly_confirmed_cases_daily.csv', 'r');

          while (($csvdata = fgetcsv($csv, 4096)) !== false) {
            list($item_date, $item_infection,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, $item_fukuoka) = $csvdata;
            echo date('Y年m月d日', strtotime($item_date)) . ',' . "{$item_infection}人" . ',' . "{$item_fukuoka}人" . '<br>' . "\n";
          }
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