<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "データ追記" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "データ追記" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>covid2022 Data Add</h2>
          <form method="POST" action="writeData.php">
            <ul>
              <li>
                <textarea name="csvData" cols="35" rows="8" maxlength="1000" placeholder="データ追記"></textarea>
              </li>
              <li><input type="submit" value="送信する"></li>
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