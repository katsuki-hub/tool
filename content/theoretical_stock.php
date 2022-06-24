<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "理論株価" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "理論株価" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <h2>大診断拡張版2022夏号</h2>
        <div class="br30"></div>
        <form method="POST" action="theoretical_data.php">
          <ul>
            <li>
              <label>株価診断<br>
                <input type="text" name="code" placeholder="証券コード or 社名">
              </label>
            </li>
            <li><input type="submit" value="検索する"></li>
          </ul>
        </form>
        <div class="br30"></div>
        <div class="frame1">
          理論株価とは、会社が持っている価値（企業価値）を元に計算された株価です。<br>
          その会社の「あるべき株価」とも言えます。<br>
          PERと同じように、投資判断に使える指標(割安性)に使えますが、理論株価は会社の価値を元に計算しているので、PERよりも厳密に割安性が測れます。
        </div>
        ※四半期に渡って更新予定！！現在の指標は2022年6月8日データ
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>