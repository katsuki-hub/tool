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
  <link href="css/style.css?v=20220109" rel="stylesheet" type="text/css">
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
      <section>
        <div class="column">
          <div class="clm3">
            <a href="content/rate.php"><img src="images/saiken.png" alt="債権係数"></a>
          </div>
          <div class="clm3">
            <a href="content/dollarRate.php"><img src="images/yendol.png" alt="円ドル変換"></a>
          </div>
        </div><!-- /column -->
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <footer>
    <?php require_once "common/footer.php"; ?>
  </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</html>