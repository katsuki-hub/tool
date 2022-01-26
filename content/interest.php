<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "借入利率と利息制限法の知識" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "利息の計算" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <?php require_once "../common/es.php";
      if (!checkEn($_POST)) { //文字エンコードの検証
        $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
        $err = "Encoding Error! The espected encoding is" . $encoding;
        exit($err); //エラーメッセージを出してコードのキャンセルする
      }
      $_POST = es($_POST); //HTMLエスケープ(xss対策)
      ?>
      <section>
        <h2>返済利息の計算</h2>
        <h3>返済期間と金額と年利を入力してください</h3>

        <!--$_POSTの数字の入力チェック-->
        <?php
        if (isset($_POST["cash"])) {
          $isNum = is_numeric($_POST["cash"]); //数値かどうか確認
          if ($isNum) {
            $cash = $_POST["cash"];
            $error = "";
          } else {
            $cash = "";
            $error = '<span class = "error">金額を入力してください！</span>';
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
            $error2 = '<span class = "error">年利を入力してください！</span>';
          }
        } else { //POSTされた値がない場合
          $isNum2 = false;
          $rate = "";
          $error2 = "";
        }

        if (isset($_POST["day"])) {
          $isNum3 = is_numeric($_POST["day"]); //数値かどうか確認
          if ($isNum3) {
            $day = $_POST["day"];
            $error3 = "";
          } else {
            $day = "";
            $error3 = '<span class = "error">借入日数を入力してください！</span>';
          }
        } else { //POSTされた値がない場合
          $isNum3 = false;
          $day = "";
          $error3 = "";
        }
        ?>

        <!--入力フォーム-->
        <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
          <ul>
            <li>
              <label>
                　　元金：<input type="number" name="cash" value="<?php echo $cash; ?>">
              </label>円
              <?php echo "<br>{$error}<br>" ?>
              <label>
                　　年利：<input type="text" name="rate" value="<?php echo $rate; ?>">
              </label>％
              <?php echo "<br>{$error2}<br>" ?>
            </li>
            <label>
              借入日数：<input type="number" name="day" value="<?php echo $day; ?>">
            </label>日
            <?php echo "<br>{$error3}<br>" ?>
            <li><input type="submit" value="計算する"></li>
          </ul>
        </form>

        <!-- 数値だった場合計算結果表示 -->
        <?php
        if ($isNum && $isNum2 && $isNum3) {
          echo "<HR>";
          $cash_fmt = number_format($cash);
          $interestRate = $rate / 100;
          $interest = $cash * $interestRate / 365 * $day;
          $interestFloor = floor($interest);
          $interest_fmt = number_format($interestFloor);
          echo '<div class = "frame">', '<span class="line">', "元金{$cash_fmt}円、年利{$rate}％、借入日数{$day}日", '</span><br><br>', "返済利息は<b>{$interest_fmt}円</b>です。<br>", '<small class="error">※1円未満の端数切り捨て</small>', '</div>';
        }
        ?>

        <div class="br50"></div>
        <h2>利息制限法による金利の上限</h2>
        <div class="frame">
          <ul>
            <li>元本の額が10万円未満：年20％</li>
            <li>元本の額が10万円以上100万円未満：年18％</li>
            <li>元本の額が100万円以上：年15％</li>
          </ul>
        </div>
        <p>上限が定められており、元金に対して上記の利率を超えないよう定められています。<br>利息制限法1条により、定める利率により計算した金額を超えるときは、その超過部分について、無効とする。</p>
        <div class="br30"></div>
        <h2>遅延損害金</h2>
        <p>「延滞利息」や「遅延利息」とも呼ばれますが、遅延損害金は利息ではありません。<br>また、利息と遅延損害金は別々のものなので、同時に発生することはなく、二重で請求されることはありません。</p>
        <div class="br30"></div>
        <h2>利息制限法が定める遅延損害金の上限利率</h2>
        <div class="frame">
          <p>※利息制限法4条1項<br>金銭を目的とする消費貸借上の債務の不履行による賠償額の予定は、その賠償額の元本に対する割合が第一条に規定する率の一・四六倍を超えるときは、その超過部分について、無効とする。</p>
        </div>
        <h3>利率の上限額</h3>
        <table border="1">
          <tr bgcolor="pink">
            <th>借入総額</th>
            <th>10万円未満</th>
            <th>10万～100万円</th>
            <th>100万円以上</th>
          </tr>
          <tr>
            <td bgcolor="pink">利息</td>
            <td>20％</td>
            <td>18％</td>
            <td>15％</td>
          </tr>
          <tr>
            <td bgcolor="pink">遅延損害金</td>
            <td>29.2％</td>
            <td>26.28％</td>
            <td>21.9％</td>
          </tr>
        </table>
        <p>※利息制限法7条1項により、『営業的金銭消費貸借上の債務』の遅延損害金の利率は最大20%です。<br>大手消費者金融では遅延損害金の利率は20%に定められています。</p>
        <div class="br30"></div>
        <div class="frame1">
          <b>豆知識</b><br>利息制限法を根拠に刑事罰や行政処分が科せられることはありませんが、業として行われるお金の貸し借りの上限利率が年20％を超えた場合は出資法違反による刑事罰の対象となります。
        </div>
        <div class="br30"></div>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>