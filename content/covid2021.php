<!doctype html>
<html lang="covid2021" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "コロナウイルス日別感染数2021年" ?>
  <?php require_once "../common/head.php"; ?>
  <link href="../css/covidOption.css" rel="stylesheet" type="text/css">
</head>

<body>
  <header>
    <?php $headerTitle = "2021年感染者数" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>福岡県の新規感染者データ</h2>
          <small>※データは厚生労働省が発行しているオープンデータを参照<br>（都道府県・政令指定都市・中核都市が毎日HPにて発表するデータおよびHER-SYSデータに基づいた患者属性情報）</small>
          <h3>2021年の日別データ</h3>
          <div class="br30"></div>
          <div class="chart">
            <canvas id="myChart" height="180"></canvas>
          </div>
          <div class="yearSelect">
            <form id="form">
              <select name="select">
                <option value="covidDay.php">2022年</option>
                <option value="covid2021.php">2021年</option>
                <option value="covid2020.php">2020年</option>
              </select>
            </form>
          </div>
          <?php
          //https://covid19.mhlw.go.jp/public/opendata/newly_confirmed_cases_daily.csv
          $csv = fopen('../data/covid_2021.csv', 'r');

          echo '<table border="8">';
          echo '<tr class="th">
          <th>日付</th>
          <th>全国</th>
          <th>福岡県</th>
          <th>東京都</th>
          <th>大阪府</th>
          <th>沖縄県</th>
          </tr>';
          while (($csvdata = fgetcsv($csv, 8000)) !== false) {
            list($item_date, $item_infection,,,,,,,,,,,,, $item_tokyo,,,,,,,,,,,,,, $item_osaka,,,,,,,,,,,,, $item_fukuoka,,,,,,, $item_okinawa) = $csvdata;

            $all = number_format($item_infection);
            $fukuoka = number_format($item_fukuoka);
            $tokyo = number_format($item_tokyo);
            $osaka = number_format($item_osaka);
            $okinawa = number_format($item_okinawa);

            echo '<tr>' . '<td class="day">' . "$item_date" . '</td>' . '<td class="all">' . "{$all}人" . '</td>' . '<td class="fukuoka">' . "{$fukuoka}人" . '</td>' . '<td>' . "{$tokyo}人" . '</td>' . '<td>' . "{$osaka}人" . '</td>' . '<td>' . "{$okinawa}人" . '</td>' . '</tr>' . "\n";
          }
          echo '</table>';
          fclose($csv);
          ?>

        </section>
      </article>
    </div><!-- /main-wrapper -->
  </div><!-- /wall -->
  <?php require_once "../common/footer.php"; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../script/location.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['2021年1月', '2月', '3月', '4月', '5月', '6月', '7月', "8月", "9月", "10月", "11月", "12月"],
        datasets: [{
            type: 'bar',
            label: "全国感染者",
            data: [154700, 41838, 42300, 117482, 153674, 52977, 126687, 567572, 208102, 17391, 4372, 5807],
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1,
            yAxisID: "y1"
          },
          {
            type: 'line', //折れ線グラフ
            label: "福岡県",
            data: [7217, 1888, 953, 4418, 10688, 1433, 3848, 25703, 8818, 548, 182, 182],
            backgroundColor: "rgba(54,162,235,0.2)",
            borderColor: "rgb(54,162,235)",
            borderWidth: 1.2,
            pointBackgroundColor: "rgba(54,162,235,0.2)",
            radius: 4,
            pointHoverBackgroundColor: "rgba(54,162,235,0.2)",
            pointHoverRadius: 6,
            pointHoverBorderColor: "rgb(54,162,235)",
            pointHoverBorderWidth: 2, //ホバー時の先の太さ
            lineTension: 0, //ベジェ曲線の張力（0＝直線）
            fill: false, //線下を塗りつぶすかどうか
            yAxisID: "y2" //軸のID（複数軸存在する場合）
          }
        ],
      },
      options: {
        scales: {
          "y2": {
            display: false
          }
        }
      }
    });
  </script>
</body>

</html>