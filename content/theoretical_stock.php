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
      <article>
        <section>
          <h2>大診断拡張版2022夏号</h2>
          <div class="br30"></div>
          <form method="POST" action="theoretical_stock.php">
            <ul>
              <li>
                <label>名前で検索：<br>
                  <input type="text" name="code" placeholder="なまえを入力">
                </label>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form>


        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>