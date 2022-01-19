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

          <h3>調達希望額と手数料を入力してください</h3>

          <!--$_POSTの数字の入力チェック-->
          <?php
          if (isset($_POST["cash"])) {
            $isNum = is_numeric($_POST["cash"]); //数値かどうか確認
            if ($isNum) {
              $cash = $_POST["cash"];
              $error = "";
            } else {
              $cash = "";
              $error = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum = false;
            $cash = "";
            $error = "";
          }

          if (isset($_POST["rate"])) {
            $isNum2 = is_numeric($_POST["rate"]); //数値かどうか確認
            if ($isNum2) {
              $rate = $_POST["rate"];
              $error2 = "";
            } else {
              $rate = "";
              $error2 = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum2 = false;
            $rate = "";
            $error2 = "";
          }
          ?>

          <!--入力フォーム-->
          <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
            <ul>
              <li>
                <label>
                  希望額：<input type="number" name="cash" value="<?php echo $cash; ?>">
                </label>円
                <?php echo "<br>{$error}<br>" ?>
                <label>
                  手数料：<input type="text" name="rate" value="<?php echo $rate; ?>">
                </label>％
                <?php echo "<br>{$error2}<br>" ?>
              </li>
              <li><input type="submit" value="計算する"></li>
            </ul>
          </form>

          <?php
          if ($isNum && $isNum2) { //数値だった場合計算結果表示
            echo "<HR>";
            $cash_fmt = number_format($cash);
            $interest = 100 / ($rate + 100);
            $buyBonds = $cash / $interest;
            $buyBonds_fmt = number_format($buyBonds);
            $bondsRate = 1 - $interest;
            $bondsRate100 = floor($bondsRate * 100 * 100) / 100;
            echo '<div class = "frame">', '<span class="line">', "調達希望額が{$cash_fmt}円の場合", '</span><br><br>', "買取債権額は<b>{$buyBonds_fmt}円</b>です。<br>債権から{$bondsRate100}％引きになります。", '</div>';
          }
          ?>

          <div class="br50"></div>

          <h2>債権額から計算</h2>
          <h3>債権額と手数料を入力してください</h3>

          <!--$_POSTの数字の入力チェック-->
          <?php
          if (isset($_POST["cash3"])) {
            $isNum3 = is_numeric($_POST["cash3"]); //数値かどうか確認
            if ($isNum3) {
              $cash3 = $_POST["cash3"];
              $error3 = "";
            } else {
              $cash3 = "";
              $error3 = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum3 = false;
            $cash3 = "";
            $error3 = "";
          }

          if (isset($_POST["rate4"])) {
            $isNum4 = is_numeric($_POST["rate4"]); //数値かどうか確認
            if ($isNum4) {
              $rate4 = $_POST["rate4"];
              $error4 = "";
            } else {
              $rate4 = "";
              $error4 = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum4 = false;
            $rate4 = "";
            $error4 = "";
          }
          ?>

          <!--入力フォーム-->
          <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
            <ul>
              <li>
                <label>
                  債権額：<input type="number" name="cash3" value="<?php echo $cash3; ?>">
                </label>円
                <?php echo "<br>{$error3}<br>" ?>
                <label>
                  手数料：<input type="text" name="rate4" value="<?php echo $rate4; ?>">
                </label>％
                <?php echo "<br>{$error4}<br>" ?>
              </li>
              <li><input type="submit" value="計算する"></li>
            </ul>
          </form>

          <?php
          if ($isNum3 && $isNum4) { //数値だった場合計算結果表示
            echo "<HR>";
            $cash_fmt3 = number_format($cash3);
            $interest4 = 100 / ($rate4 + 100);
            $buyBonds4 = $cash3 * $interest4;
            $buyBonds_fmt4 = number_format($buyBonds4);
            $bondsRate4 = 1 - $interest4;
            $bondsRate4100 = floor($bondsRate4 * 100 * 100) / 100;
            echo '<div class = "frame">', '<span class="line">', "売掛債権額が{$cash_fmt3}円の場合", '</span><br><br>', "資金調達額は<b>{$buyBonds_fmt4}円</b>です。<br>債権から{$bondsRate4100}％引きになります。", '</div>';
          }
          ?>

          <div class="br50"></div>
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