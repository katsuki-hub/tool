<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "各国別感染数" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "CIVID 国内外の発生状況" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>COVID 世界累積データ</h2>
          <?php
          $url = "https://data.corona.go.jp/converted-json/occurrence_status_overseas.json";
          $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
          $arr = json_decode($json, true);

          $updated = $arr[0]['date'];
          $time_value = $updated;
          echo "データ取得日：", date('Y年m月d日', strtotime($time_value));
          ?>

          <h3>世界累積データ</h3>
          <div class="frame">
            <?php
            $all = $arr[197];
            echo "感染者数：　" . $all['infectedNum'] . "人\n" . "<br>";
            echo "　死者数：　" . $all['deceasedNum'] . "人\n" . "<br>";
            ?>
          </div>

          <h3>各国別データ</h3>
          <?php
          foreach ($arr as $data) {
            $contry = "　　　国名：　" . $data['dataName'] . "\n" . "<br>";
            $cases = "感染者数：　" . $data['infectedNum'] . "人\n" . "<br>";
            $deaths = "　死者数：　" . $data['deceasedNum'] . "人\n" . "<br><HR>";

            $virusData = array(
              $contry, $cases, $deaths
            );
            echo implode('▲', $virusData);
          }
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