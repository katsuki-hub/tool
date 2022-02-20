<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "ポケモン図鑑" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
    .all input[type="submit"]:valid {
      font-size: 20px;
      font-weight: bold;
    }
  </style>
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
          <div class="br30"></div>
          <form method="POST" action="nameSearch.php">
            <ul>
              <li>
                <label>名前で検索：<br>
                  <input type="text" name="name" placeholder="なまえを入力">
                </label>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form><br>
          <hr>

          <form method="POST" action="pokeSearch.php">
            <ul>
              <li>
                <span>タイプで検索：</span><br>
                <select name="type">
                  <option value="ノーマル">ノーマル</option>
                  <option value="ほのお">ほのお</option>
                  <option value="みず">みず</option>
                  <option value="くさ">くさ</option>
                  <option value="ひこう">ひこう</option>
                  <option value="どく">どく</option>
                  <option value="むし">むし</option>
                  <option value="でんき">でんき</option>
                  <option value="じめん">じめん</option>
                  <option value="かくとう">かくとう</option>
                  <option value="エスパー">エスパー</option>
                  <option value="こおり">こおり</option>
                  <option value="いわ">いわ</option>
                  <option value="ゴースト">ゴースト</option>
                  <option value="ドラゴン">ドラゴン</option>
                  <option value="あく">あく</option>
                  <option value="はがね">はがね</option>
                  <option value="フェアリー">フェアリー</option>
                </select>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form><br>
          <hr>

          <p>※ガラル・ヒスイとアローラの一部は後日実装します。現在未対応</p>
          <form method="POST" action="local.php">
            <ul>
              <li>
                <span>地方で検索：</span><br>
                <select name="local">
                  <option value="カントー">カントー</option>
                  <option value="ジョウト">ジョウト</option>
                  <option value="ホウエン">ホウエン</option>
                  <option value="シンオウ">シンオウ</option>
                  <option value="イッシュ">イッシュ</option>
                  <option value="カロス">カロス</option>
                  <option value="アローラ">アローラ</option>
                  <option value="ガラル">ガラル</option>
                  <option value="ヒスイ">ヒスイ</option>
                  <option value="未確認">未確認</option>
                </select>
              </li>
              <li><input type="submit" value="検索する"></li>
            </ul>
          </form><br>
          <hr>
          <div class="br30"></div>

          <form action="pokeAll.php" style="text-align: center;" class="all">
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