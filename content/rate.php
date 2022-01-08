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
  <div class="wall">
    <!-- main-wrapper -->
    <div class="main-wrapper">
      <article>
        <section>
          <h2>調達希望額から計算</h2>

          <?php require_once "../common/es.php";
          if (!checkEn($_POST)) { //文字エンコードの検証
            $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
            $err = "Encoding Error! The espected encoding is" . $encoding;
            exit($err); //エラーメッセージを出してコードのキャンセルする
          }
          $_POST = es($_POST); //HTMLエスケープ(xss対策)
          ?>

          <b>■調達希望額と手数料を入力してください</b>

          <!--$_POSTの数字の入力チェック-->
          <?php
          if (isset($_POST["cash"]) && (isset($_POST["rate"]))) {
            $isNum = is_numeric($_POST["cash"]); //数値かどうか確認
            if ($isNum) {
              $cash = $_POST["cash"];
              $rate = $_POST["rate"];
              $error = "";
            } else {
              $cash = "";
              $rate = "";
              $error = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum = false;
            $cash = "";
            $rate = "";
            $error = "";
          }
          ?>

          <!--入力フォーム-->
          <form method="$_POST" action="<?= es($_SERVER['PHP_SELF']); ?>">
            <ul class="nolist">
              <li>
                <label>調達金額：<input type="number" name="cash" value="<?= $cash; ?>">円</label><br>
                <label>　手数料：<input type="number" name="rate" value="<?= $rate; ?>">％</label>
              </li>
              <li><input type="submit" value="計算する"></li>
            </ul>
          </form>





          <h2>債権額から計算</h2>
          <b>■債権額と手数料を入力してください</b>
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