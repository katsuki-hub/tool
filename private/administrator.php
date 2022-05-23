<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "管理者用ページ" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  #box ul {
    width: 85%;
    margin: 0 auto 0 auto;
    counter-reset: list;
    list-style-type: none;
    position: relative;
    font: 14px/1.6 'Mv Boli', 'arial narrow', sans-serif;
    padding: 0.8em;
    background: #F2EFE7;
    -webkit-box-shadow: 0 0 40px rgba(0, 0, 0, 0.2) inset, 0 0 4px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 40px rgba(0, 0, 0, 0.2) inset, 0 0 4px rgba(0, 0, 0, 0.2);
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2) inset, 0 0 4px rgba(0, 0, 0, 0.2);
  }

  #box li {
    position: relative;
    padding: 6px 5px 6px 50px;
    margin: 7px 0;
    font-weight: bold;
    font-size: 12px;
    border-bottom: dashed 1px #ccc;
    color: #333;
  }

  #box li:first-child {
    margin-top: 0;
  }

  #box li::before {
    counter-increment: list;
    content: counter(list) ",";
    position: absolute;
    left: 15px;
    font-size: 16px;
    top: 50%;
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  #box li:hover::before {
    background-color: #ffd797;
    border-color: rgba(0, 0, 0, .08);
    border-width: .2em;
    color: #444;
    transform: scale(1.5);
    top: 5px;
  }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "管理者用ページ" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <section>
        <h2>Data Add</h2>
        <div id="box">
          <ul>
            <li><a href="write.php">covid FUKUOKA Add File</a></li>
            <li><a href="allstar.php">グラチャン~data~</a></li>
            <li><a href="classicRemarks.php">classic~備考データ~</a></li>
            <li><a href="pokeForm.php">POKEMON ~Size Data~</a></li>
            <li><a href="pokeProfAdd.php">POKEMON ~Profile Data~</a></li>
            <li><a href="insertPokeForm.php">POKEMON ~INSERT Data~</a></li>
          </ul>
        </div>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>