<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "債権係数" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "債権係数" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>債権に対して調達希望額から計算</h2>

        <?php require_once "../common/es.php";
        if (!checkEn($_POST)) { //文字エンコードの検証
          $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
          $err = "Encoding Error! The espected encoding is" . $encoding;
          exit($err); //エラーメッセージを出してコードのキャンセルする
        }
        $_POST = es($_POST); //HTMLエスケープ(xss対策)
        ?>

        <b>調達希望額を入力してください</b>





      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>