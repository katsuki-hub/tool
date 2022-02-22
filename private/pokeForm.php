<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "更新レコード ポケモン" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "更新レコード ポケモン" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>UPDATE ポケモン</h2>
          <form method="POST" action="updatePoke.php">
            <ul>
              <li><label>ＮＯ：
                  <input type="number" step="0.1" name="no" placeholder="番号">
                </label></li>
              <li><label>分類：
                  <input type="text" name="Classification" placeholder="分類">
                </label></li>
              <li><label>高さ：
                  <input type="number" step="0.1" name="height" placeholder="高さ">
                </label></li>
              <li><label>重さ：
                  <input type="number" step="0.1" name="weight" placeholder="重さ">
                </label></li>
              <li><input type="submit" value="更新する"></li>
            </ul>
          </form>
        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>