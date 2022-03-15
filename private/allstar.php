<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "新規レコードSG" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "ボートレースオールスター" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>オールスター Data Add</h2>
          <form method="POST" action="insertSG.php">
            <ul>
              <li><label>登録番号：
                  <input type="number" name="number" placeholder="登録番号">
                </label></li>
              <li><label>　　名前：
                  <input type="text" name="name" placeholder="名前">
                </label></li>
              <li><label>　登録期：
                  <input type="number" name="reg" placeholder="登録期">
                </label></li>
              <li><label>　　支部：
                  <input type="text" name="branch" placeholder="所属支部">
                </label></li>
                <li><label>　得票数：
                  <input type="number" name="remarks" placeholder="得票数">
                </label></li>
              <li><input type="submit" value="追加する"></li>
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