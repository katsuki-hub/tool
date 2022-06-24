<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "理論株価" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
  table {
    margin-left: 20px;
  }

  ol li {
    list-style-type: circle;
  }
  </style>
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
        <small>※四半期に渡って更新予定！！<br>現在の指標は2022年6月8日データ</small>
        <div class="br30"></div>
        <h2>2022年経済カレンダー</h2>
        <h3>FOMC(連邦公開市場委員会)の開催日程</h3>
        <div class="frame">
          FOMCとは連邦公開市場委員会の略称で、アメリカの政策金利などの重要な金融政策を決定する会合のことです。アメリカの金融政策はマーケットに与える影響が大きく、市場関係者の予想との乖離があれば株式市場や為替市場が大きく変動することもある
        </div>
        <table border="5">
          <tr>
            <th>開催回</th>
            <th>開催日</th>
          </tr>
          <tr>
            <td>第1回</td>
            <td>1月25日と26日</td>
          </tr>
          <tr>
            <td>第2回</td>
            <td>3月15日と16日</td>
          </tr>
          <tr>
            <td>第3回</td>
            <td>5月3日と4日</td>
          </tr>
          <tr>
            <td>第4回</td>
            <td>6月14日と15日</td>
          </tr>
          <tr>
            <td>第5回</td>
            <td>7月26日と27日</td>
          </tr>
          <tr>
            <td>第6回</td>
            <td>9月20日と21日</td>
          </tr>
          <tr>
            <td>第7回</td>
            <td>11月1日と2日</td>
          </tr>
          <tr>
            <td>第8回</td>
            <td>12月13日と14日</td>
          </tr>
        </table>

        <h3>ECB理事会の開催日程</h3>
        <div class="frame">
          ECB理事会とは欧州中央銀行の最高意思決定機関のことで、ユーロ圏の統一的な金融政策を決定する機関のことです。議事要旨が公開されないため、理事会終了後の記者会見が投資家から注目されています。
        </div>
        <table border="5">
          <tr>
            <th>開催回</th>
            <th>開催日</th>
          </tr>
          <tr>
            <td>第1回</td>
            <td>2月3日</td>
          </tr>
          <tr>
            <td>第2回</td>
            <td>3月10日</td>
          </tr>
          <tr>
            <td>第3回</td>
            <td>4月14日</td>
          </tr>
          <tr>
            <td>第4回</td>
            <td>6月9日</td>
          </tr>
          <tr>
            <td>第5回</td>
            <td>7月21日</td>
          </tr>
          <tr>
            <td>第6回</td>
            <td>9月8日</td>
          </tr>
          <tr>
            <td>第7回</td>
            <td>10月27日</td>
          </tr>
          <tr>
            <td>第8回</td>
            <td>12月15日</td>
          </tr>
        </table>

        <h3>日銀金融政策決定会合の開催日程</h3>
        <div class="frame">
          日銀金融政策決定会合とは、日本銀行が金融政策の方針や運営にかかわる事項を討議・決定する会合です。会合の決定内容以外にも、日銀総裁の会見や年4回公表されるレポート「経済・物価情勢の展望」などが投資家から注目されています。
        </div>
        <table border="5">
          <tr>
            <th>開催回</th>
            <th>開催日</th>
          </tr>
          <tr>
            <td>第1回</td>
            <td>1月17日と18日</td>
          </tr>
          <tr>
            <td>第2回</td>
            <td>3月17日と18日</td>
          </tr>
          <tr>
            <td>第3回</td>
            <td>4月27日と28日</td>
          </tr>
          <tr>
            <td>第4回</td>
            <td>6月16日と17日</td>
          </tr>
          <tr>
            <td>第5回</td>
            <td>7月20日と21日</td>
          </tr>
          <tr>
            <td>第6回</td>
            <td>9月21日と22日</td>
          </tr>
          <tr>
            <td>第7回</td>
            <td>10月27日と28日</td>
          </tr>
          <tr>
            <td>第8回</td>
            <td>12月19日と20日</td>
          </tr>
        </table>

        <h3>2022年重要イベント</h3>
        <h4>6月</h4>
        <ol>
          <li>26日～28日主要7か国</li>
          <li>9日にECB理事会</li>
          <li>15日に連邦公開市場委員会（FOMC）結果発表</li>
          <li>17日に日銀金融政策決定会合の結果発表</li>
        </ol>
        <h4>7月</h4>
        <ol>
          <li>参議院議員選挙</li>
          <li>米連邦準備委員会（FRB）議長半期議会証言</li>
          <li>1日に全国企業短期経済観測調査（日銀短観）発表</li>
          <li>21日にECB理事会</li>
          <li>21日に日銀金融政策決定会合の結果発表および「経済・物価情勢の展望」の発表</li>
          <li>27日に連邦公開市場委員会（FOMC）結果発表</li>
        </ol>
        <h4>8月</h4>
        <ol>
          <li>米カンザスシティー連銀経済シンポジウム（ジャクソンホール会議）</li>
        </ol>
        <h4>9月</h4>
        <ol>
          <li>9月8日にECB理事会</li>
          <li>9月15日～18日に東京ゲームショウ開催</li>
          <li>9月21日に連邦公開市場委員会（FOMC）結果発表</li>
          <li>9月22日に日銀金融政策決定会合の結果発表</li>
        </ol>
        <h4>10月</h4>
        <ol>
          <li>2日にブラジル大統領総選挙</li>
          <li>3日に全国企業短期経済観測調査（日銀短観）発表</li>
          <li>27日にECB理事会</li>
          <li>28日に日銀金融政策決定会合の結果発表および「経済・物価情勢の展望」の発表</li>
          <li>30日に欧州で夏時間が終了</li>
          <li>30日～31日にG20首脳会議（インドネシア）</li>
          <li>月内にIMF年次総会</li>
          <li>月内にノーベル賞発表</li>
          <li>中国共産党大会</li>
        </ol>
        <h4>11月</h4>
        <ol>
          <li>2日に連邦公開市場委員会（FOMC）結果発表</li>
          <li>6日に米国で夏時間が終了</li>
          <li>7日～18日に国連気候変動枠組み条約第27回締結国会議（COP27）開催（エジプト）</li>
          <li>8日に米国中間選挙</li>
          <li>11日に中国大規模ネット通販セール「独身の日」</li>
          <li>21日にFIFAワールドカップ開幕（カタール）</li>
          <li>25日に米国ブラックフライデー</li>
          <li>28日に米国サイバーマンデー</li>
        </ol>
        <h4>12月</h4>
        <ol>
          <li>10日にノーベル賞授賞式（ストックホルム）</li>
          <li>14日に全国企業短期経済観測調査（日銀短観）発表</li>
          <li>14日に連邦公開市場委員会（FOMC）結果発表</li>
          <li>15日にECB理事会</li>
          <li>20日に日銀金融政策決定会合の結果発表</li>
        </ol>
      </section>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>