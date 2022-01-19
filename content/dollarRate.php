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
          <?php require_once "../common/es.php";
          if (!checkEn($_POST)) { //文字エンコードの検証
            $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
            $err = "Encoding Error! The espected encoding is" . $encoding;
            exit($err); //エラーメッセージを出してコードのキャンセルする
          }
          $_POST = es($_POST); //HTMLエスケープ(xss対策)
          ?>

          <!--$_POSTの数字の入力チェック-->
          <?php
          if (isset($_POST["toYen"])) {
            $isNum = is_numeric($_POST["toYen"]); //数値かどうか確認
            if ($isNum) {
              $toYen = $_POST["toYen"];
              $error = "";
            } else {
              $toYen = "";
              $error = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum = false;
            $toYen = "";
            $error = "";
          }

          if (isset($_POST["toDoll"])) {
            $isNum2 = is_numeric($_POST["toDoll"]); //数値かどうか確認
            if ($isNum2) {
              $toDoll = $_POST["toDoll"];
              $error2 = "";
            } else {
              $toDoll = "";
              $error2 = '<span class = "error">数値を入力してください！</span>';
            }
          } else { //POSTされた値がない場合
            $isNum2 = false;
            $toDoll = "";
            $error2 = "";
          }
          ?>

          <?php
          $url = "http://fx.mybluemix.net/"; //公開されているjsonデータのURL
          $json = mb_convert_encoding(file_get_contents($url), 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
          $arr = json_decode($json, true);
          if ($arr === NULL) {
            echo "データがありません";
          } else {
            $dollRate = $arr['result']['rate']['USDJPY'];
          }
          echo "<b>", "※現在の米ドル/円：", $dollRate, "円です。", "</b><HR>";
          ?>

          <h2>円に変換</h2>
          <h3>日本円に換算したい＄を入力してください</h3>
          <!--入力フォーム-->
          <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
            <ul>
              <li>
                <label>
                  <input type="number" name="toYen" value="<?php echo $toYen; ?>">
                </label>ドル
                <?php echo "<br>{$error}<br>" ?>
              </li>
              <li><input type="submit" value="計算する"></li>
            </ul>
          </form>

          <?php
          if ($isNum) { //数値だった場合計算結果表示
            echo "<HR>";
            $toYen_fmt = number_format($toYen);
            $yen = $toYen * $dollRate;
            $yenFloor = floor($yen);
            $yen_fmt = number_format($yenFloor);
            echo '<div class = "frame">', "{$toYen_fmt}ドルは<br>", "<b>{$yen_fmt}円</b>に換算されます。", '</div>';
          }
          ?>
          <div class="br100"></div>

          <h2>米ドルに変換</h2>
          <h3>米ドルに換算したい￥を入力してください</h3>
          <!--入力フォーム-->
          <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
            <ul>
              <li>
                <label>
                  <input type="number" name="toDoll" value="<?php echo $toDoll; ?>">
                </label>円
                <?php echo "<br>{$error2}<br>" ?>
              </li>
              <li><input type="submit" value="計算する"></li>
            </ul>
          </form>

          <?php
          if ($isNum2) { //数値だった場合計算結果表示
            echo "<HR>";
            $toDoll_fmt = number_format($toDoll);
            $doll = $toDoll / $dollRate;
            $dollFloor = floor($doll * 100) / 100;
            echo '<div class = "frame">', "{$toDoll_fmt}円は<br>", "<b>{$dollFloor}ドル</b>に換算されます。", '</div>';
          }
          ?>
          <div class="br100"></div>
          <a href="https://www.bk.mufg.jp/tameru/gaika/realtime/chart.html"><img src="../images/chart.png" width="60%" alt="外国為替相場チャート表"></a>
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