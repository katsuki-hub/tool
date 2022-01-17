<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "コロナウイルス県ごとの感染数" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "CIVID 県別累積感染数" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>COVID 累積データ</h2>
          <?php
          $url = "https://covid19-japan-web-api.now.sh/api/v1/prefectures";
          $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
          $arr = json_decode($json, true);

          $updated = $arr[0]['last_updated']['cases_date'];
          $time_value = $updated;
          echo "データ取得日：", date('Y年m月d日', strtotime($time_value)), "<br>取得データの前日累計";
          ?>

          <h3>全国累積データ</h3>
          <div class="frame">
            <?php
            $sumCases = 0;
            $sumDeaths = 0;
            $sumPcr = 0;
            foreach ($arr as $value) {
              $sumCases += $value['cases'];
              $sumDeaths += $value['deaths'];
              $sumPcr += $value['pcr'];
            }
            //数字フォーマット
            $sumCases_fmt = number_format($sumCases);
            $sumDeaths_fmt = number_format($sumDeaths);
            $sumPcr_fmt = number_format($sumPcr);
            //出力フォーム
            $allCases = "感染者数　　" . $sumCases_fmt . "人\n" . "<br>" . PHP_EOL;
            $allDeaths = "死者数　　　" . $sumDeaths_fmt . "人\n" . "<br>" . PHP_EOL;
            $allPcr = "PCR件数　　" . $sumPcr_fmt . "人\n" . "<br>" . PHP_EOL;
            echo "$allCases";
            echo "$allDeaths";
            echo "$allPcr";
            ?>
          </div>

          <h3>県別累積データ</h3>
          <p><small><span class="error">※感染者数順に参照</span></small></p>
          <!-- 多次元配列のソート -->
          <?php
          foreach ($arr as $key => $value) {
            $sort[$key] = $value['cases'];
          }
          array_multisort($sort, SORT_DESC, $arr);
          ?>

          <!-- データ出力 -->
          <?php
          foreach ($arr as $data) {
            $ja = "都道府県名　　" . $data['name_ja'] . "\n" . "<br>" . PHP_EOL;
            $cases = "感染者数　　" . number_format($data['cases']) . "人\n" . "<br>" . PHP_EOL;
            $deaths = "死者数　　　" . number_format($data['deaths']) . "人\n" . "<br>" . PHP_EOL;
            $pcr = "PCR件数　　" . number_format($data['pcr']) . "人\n" . "<br>" . "<HR>" . PHP_EOL;
            $virusData = array(
              $ja, $cases, $deaths, $pcr,
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