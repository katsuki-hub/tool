<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

<head>
  <?php $title = "コロナウイルス日別感染数" ?>
  <?php require_once "../common/head.php"; ?>
  <style>
    @media screen and (max-width:500px) {
      table {
        font-size: 13px;
      }
    }

    @media screen and (min-width:600px) {
      table {
        font-size: 20px;
      }
    }

    .th {
      background-color: rgba(126, 179, 140, 0.6);
    }

    .day {
      background-color: rgba(126, 179, 140, 0.2);
    }

    .all {
      background-color: rgba(255, 207, 205, 0.6);
      ;
    }

    .fukuoka {
      background-color: rgba(160, 245, 126, 0.6);
    }
  </style>
</head>

<body>
  <header>
    <?php $headerTitle = "CIVUD 日別感染数" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <div class="wall">
    <div class="main-wrapper">
      <article>
        <section>
          <h2>福岡県の新規感染者データ</h2>
          <h3>直近の日別データ</h3>
          <small>※データは厚生労働省が発行しているオープンデータを参照<br>（都道府県・政令指定都市・中核都市が毎日HPにて発表するデータおよびHER-SYSデータに基づいた患者属性情報）</small>
          <div class="br30"></div>
          <div>
            <canvas id="myChart"></canvas>
          </div>
          <?php
          //https://covid19.mhlw.go.jp/public/opendata/newly_confirmed_cases_daily.csv
          $csv = fopen('../data/newly_confirmed_cases_daily.csv', 'r');

          echo '<table border="8">';
          echo '<tr class="th">
          <th>日付</th>
          <th>全国</th>
          <th>福岡県</th>
          <th>東京都</th>
          <th>大阪府</th>
          <th>沖縄県</th>
          </tr>';
          while (($csvdata = fgetcsv($csv, 80008000)) !== false) {
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
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var ChartData;
    var ctx = document.getElementById('myChart').getContext('2d');

    ChartData = new Chart(ctx, {

      type: 'bar',
      data: {
        //X軸の情報
        labels: ['2021年1月', '2月', '3月', '4月', '5月', '6月', '7月', "8月", "9月", "10月", "11月", "12月"],
        //Y軸の情報
        datasets: [{
            //グラフの種類
            type: 'bar',
            //凡例名
            label: "全国感染者",
            //情報
            data: [154700, 41838, 42300, 117482, 153674, 52977, 126687, 567572, 208102, 17389, 4371, 5805],
            //背景色
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            //線色
            borderColor: 'rgb(255, 99, 132)',
            //先の太さ
            borderWidth: 1,
          },
          {
            type: 'line', //折れ線グラフ
            label: "福岡県",
            data: [7217, 1888, 953, 4418, 10688, 1433, 434, 25703, 8818, 548, 182, 182],
            backgroundColor: "rgba(54,162,235,0.2)",
            borderColor: "rgb(54,162,235)",
            borderWidth: 1.2,
            //ポイントの背景色
            pointBackgroundColor: "rgba(255, 99, 132, 0.2)",
            //ポイントの形(circle[○],rect[□],triangle[△]等がある)
            pointStyle: 'circle',
            //ポイントの半径
            radius: 4,
            //ホバー時のポイント背景色
            pointHoverBackgroundColor: "rgba(255, 99, 132, 0.2)",
            //ホバー時のポイントの半径
            pointHoverRadius: 6,
            //ホバー時のポイント背景色
            pointHoverBorderColor: "rgb(255, 99, 132)",
            //ホバー時の先の太さ
            pointHoverBorderWidth: 2,
            //ベジェ曲線の張力（0＝直線） 
            lineTension: 0,
            //線下を塗りつぶすかどうか
            fill: false,
            //軸のID（複数軸存在する場合）
            yAxisID: "y2"
          }
        ]
      },
      options: {
        legend: {
          //凡例
          display: true
        },
        tooltips: {
          //ツールチップ
          enabled: true
        },
        scales: {
          //Y軸のオプション
          yAxes: [{
              scaleLabel: {
                fontColor: "black"
              },
              gridLines: {
                color: "rgba(126, 126, 126, 0.4)",
                zeroLineColor: "black"
              },
              ticks: {
                fontColor: "black",
                beginAtZero: true,
                suggestedMax: 250,
                stepSize: 50
              }
            },
            {
              id: "y2",
              position: "right",
              autoSkip: true,
              gridLines: {
                display: false
              },
              ticks: {
                fontColor: "black",
                beginAtZero: true,
                max: 100,
                stepSize: 20,
                callback: function(val) {
                  return val + '%';
                }
              }
            }
          ],
          //X軸のオプション
          xAxes: [{
            scaleLabel: {
              fontColor: "black",
              display: true,
              labelString: '日付'
            },
            gridLines: {
              color: "rgba(126, 126, 126, 0.4)",
              zeroLineColor: "black"
            },
            ticks: {
              fontColor: "black"
            }
          }]
        }
      }
    });
  </script>
</body>

</html>