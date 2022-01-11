<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "円ドル変換ツール" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "円ドル変換ツール" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>


          <?php
          $url = "http://fx.mybluemix.net/"; //公開されているjsonデータのURL
          $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
          $arr = json_decode($json, true);

          if ($arr === NULL) {
            echo "データがありません";
          } else {

            echo "$arr{array[20]}";
          }
          ?>



          <h2>円を米ドルに変換</h2>

          <h2>米ドルを円に変換</h2>


          <a href="https://www.bk.mufg.jp/tameru/gaika/realtime/chart.html"><img src="../images/chart.png" alt="外国為替相場チャート表"></a>

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