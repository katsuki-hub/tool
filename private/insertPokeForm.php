<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "新規レコード ポケモン" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <header>
    <?php $headerTitle = "新規レコード ポケモン" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>INSERT ポケモン</h2>
          <form method="POST" action="insertPokemon.php">
            <ul>
              <li><label>ＮＯ：
                  <input type="number" step="0.1" name="no" placeholder="番号">
                </label></li>
              <li><label>名前：
                  <input type="text" name="name" placeholder="なまえ">
                </label></li>
              <li><label>フォーム：
                  <input type="text" name="form" placeholder="フォームタイプ">
                </label></li>
              <li>
                <span>タイプ１：</span>
                <select name="types1">
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
              <li>
                <span>タイプ２：</span>
                <select name="types2">
                  <option value="-">-</option>
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
              <li><label>　特性：
                  <input type="text" name="abilities" placeholder="とくせい">
                </label></li>
              <li>
              <li><label>夢特性：
                  <input type="text" name="hiddenAbilities" placeholder="ゆめとくせい">
                </label></li>
              <li><label>ＨＰ：
                  <input type="number" name="hp" placeholder="ＨＰ">
                </label></li>
              <li><label>攻撃：
                  <input type="number" name="attack" placeholder="攻撃">
                </label></li>
              <li><label>防御：
                  <input type="number" name="defence" placeholder="防御">
                </label></li>
              <li><label>特攻：
                  <input type="number" name="spAttack" placeholder="特攻">
                </label></li>
              <li><label>特防：
                  <input type="number" name="spDefence" placeholder="特防">
                </label></li>
              <li><label>早さ：
                  <input type="number" name="speed" placeholder="早さ">
                </label></li>
              <li><label>合計値：
                  <input type="number" name="total" placeholder="合計種族値">
                </label></li>
              <li>
                <span>地方：</span>
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
              <li><label>分類：
                  <input type="text" name="Classification" placeholder="分類">
                </label></li>
              <li><label>高さ：
                  <input type="number" step="0.1" name="height" placeholder="高さ">
                </label></li>
              <li><label>重さ：
                  <input type="number" step="0.1" name="weight" placeholder="重さ">
                </label></li>
              <li>
              <li><input type="submit" value="登録する"></li>
            </ul>
          </form><br>
        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>