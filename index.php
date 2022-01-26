<!DOCTYPE html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name=”robots” content=”noindex”>
  <title>WEBツールボックス</title>
  <meta name="description" content="仕事ツール等の便利なWEBツールサイトです">
  <meta name="keywords" content="WEBツール,プログラミング,便利ボックス">
  <link href="css/style.css?v=20220126" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="android-touch-icon.png">
  <meta property="og:title" content="仕事ツール">
  <meta property="og:type" content="website">
  <meta property="og:description" content="仕事ツール等の便利なWEBツールサイトです">
  <meta property="og:url" content="https://tool.katsumaru.blog/">
  <meta property="og:site_name" content="WEBツール">
  <meta property="og:image" content="https://tool.katsumaru.blog/images/tool.jpg">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="WEBツール">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="manifest" href="manifest.json">
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('sw.js')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
    }
  </script>
</head>

<body>
  <header>
    <?php $headerTitle = "WEBツールボックス" ?>
    <?php require_once "common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <div class="chara"></div>
      <div class="chara2"></div>
      <div class="br50"></div>
      <section>
        <div class="column">
          <a href="content/covid.php" class="clm3"><img src="images/covid.png" alt="covid累積"></a>
          <a href="content/worldCovid.php" class="clm3"><img src="images/covid_world.png" alt="世界累積データ"></a>
          <a href="content/cividDay.php" class="clm3"><img src="images/covid_fukuoka.png" alt="covid福岡"></a>
          <a href="content/rate.php" class="clm3"><img src="images/saiken.png" alt="債権係数"></a>
          <a href="content/dollarRate.php" class="clm3"><img src="images/yendol.png" alt="円ドル変換"></a>
          <a href="content/interest.php" class="clm3"><img src="images/risoku.png" alt="利息計算"></a>
        </div><!-- /column -->
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <footer>
    <small>&copy; 2021 かつまるツールボックス</small>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="script/command.js"></script>
</body>


</html>