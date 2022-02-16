<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "ポケモン図鑑" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "ポケモン図鑑" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>ポケモン図鑑</h2>
          <!-- 
          <form method="POST" action="pokeSearch.php">
            <ul>
              <li>
                <label>ポケモンを検索：<br>
                  <input type="text" name="name" placeholder="ポケモンを入力">
                </label>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form><br>
          -->

          <form method="POST" action="pokeSearch.php">
            <ul>
              <li>
                <span>タイプで検索：</span><br>
                <select name="type">
                  <option value="ノーマル">ノーマル</option>
                  <option value="くさ">くさ</option>
                  <option value="ほのお">ほのお</option>
                  <option value="みず">みず</option>
                  <option value="ひこう">ひこう</option>
                  <option value="どく">どく</option>
                  <option value="むし">むし</option>
                  <option value="でんき">でんき</option>
                  <option value="じめん">じめん</option>
                  <option value="フェアリー">フェアリー</option>
                  <option value="かくとう">かくとう</option>
                  <option value="いわ">いわ</option>
                  <option value="エスパー">エスパー</option>
                  <option value="はがね">はがね</option>
                  <option value="こおり">こおり</option>
                  <option value="ゴースト">ゴースト</option>
                  <option value="ドラゴン">ドラゴン</option>
                </select>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form>
          <div class="br50"></div>

          <form action="pokeAll.php" style="text-align: center;">
            <input type="submit" value="全ポケモン表示">
          </form><br>

        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>