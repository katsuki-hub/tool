<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name=”robots” content=”noindex”>
<title><?= $title ?></title>
<meta name="description" content="仕事ツール等の便利なWEBツールサイトです">
<meta name="keywords" content="WEBツール,プログラミング,便利ボックス">
<link href="../css/style.css?v=20220119" rel="stylesheet" type="text/css">
<link rel="icon" type="image/x-icon" href="../favicon.ico">
<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="192x192" href="../android-touch-icon.png">
<meta property="og:title" content="仕事ツール">
<meta property="og:type" content="website">
<meta property="og:description" content="仕事ツール等の便利なWEBツールサイトです">
<meta property="og:url" content="https://tool.katsumaru.blog/">
<meta property="og:site_name" content="WEBツール">
<meta property="og:image" content="https://tool.katsumaru.blog/images/tool.jpg">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="WEBツール">
<link rel="apple-touch-icon" href="../apple-touch-icon.png">
<link rel="manifest" href="../manifest.json">
<script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
      .then((reg) => {
        console.log('Service worker registered.', reg);
      });
  }
</script>