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

          foreach ($arr as $data) {
            $ja = "都道府県名　　" . $data['name_ja'] . "\n" . "<br>" . PHP_EOL;
            $cases = "発生件数　　" . $data['cases'] . "人\n" . "<br>" . PHP_EOL;
            $deaths = "死者数　　　" . $data['deaths'] . "人\n" . "<br>" . PHP_EOL;
            $pcr = "pcr件数　　" . $data['pcr'] . "人\n" . "<br>" . "<HR>" . PHP_EOL;
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