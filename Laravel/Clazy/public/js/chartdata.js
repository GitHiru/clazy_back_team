$(function() {
  /***********************************************************
  *    チャート 描画
  ***********************************************************/

  chartColor = "#FFFFFF";


  let myChart;
  let ctx = document.getElementById('bigDashboardChart').getContext("2d");
  let gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
      gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
      gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

  //▼  描画データ  (週)
  let wData = {
    labels: ["SUN", "MON", "TUE", "WEN", "THE", "FRI", "SAT"],
    datasets: [{
      data:[],
      label: "Data",
      borderColor: chartColor,
      pointBorderColor: chartColor,
      pointBackgroundColor: "#1e3d60",
      pointHoverBackgroundColor: "#1e3d60",
      pointHoverBorderColor: chartColor,
      pointBorderWidth: 1,
      pointHoverRadius: 7,
      pointHoverBorderWidth: 2,
      pointRadius: 5,
      fill: true,
      backgroundColor: gradientFill,
      borderWidth: 2
    }]
  };
  //▼  描画データ  (月)
  let mData = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
      data: [],
      label: "Data",
      borderColor: chartColor,
      pointBorderColor: chartColor,
      pointBackgroundColor: "#1e3d60",
      pointHoverBackgroundColor: "#1e3d60",
      pointHoverBorderColor: chartColor,
      pointBorderWidth: 1,
      pointHoverRadius: 7,
      pointHoverBorderWidth: 2,
      pointRadius: 5,
      fill: true,
      backgroundColor: gradientFill,
      borderWidth: 2
    }]
  };
  //▼  描画オプション
  const options = {
    layout: {
      padding: {
        left: 20,
        right: 20,
        top: 0,
        bottom: 0
      }
    },
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: '#fff',
      titleFontColor: '#333',
      bodyFontColor: '#666',
      bodySpacing: 4,
      xPadding: 12,
      mode: "nearest",
      intersect: 0,
      position: "nearest"
    },
    legend: {
      position: "bottom",
      fillStyle: "#FFF",
      display: false
    },
    scales: {
      yAxes: [{
        ticks: {
          fontColor: "rgba(255,255,255,0.4)",
          fontStyle: "bold",
          beginAtZero: true,
          maxTicksLimit: 5,
          padding: 10
        },
        gridLines: {
          drawTicks: true,
          drawBorder: false,
          display: true,
          color: "rgba(255,255,255,0.1)",
          zeroLineColor: "transparent"
        }

      }],
      xAxes: [{
        gridLines: {
          zeroLineColor: "transparent",
          display: false,

        },
        ticks: {
          padding: 10,
          fontColor: "rgba(255,255,255,0.4)",
          fontStyle: "bold"
        }
      }]
    }
  };


  //▼  初期  描画
  initDashboardPageCharts(ctx, wData);

  chart();

  // ▼描画  （initialize）
  function initDashboardPageCharts(ctx , data){
    myChart = new Chart(ctx, {
      type    : 'bar',
      data    : data,
      options : options
    });
  }
  //▼ 描画切替  (週)
  function chnageWeekChart(chart) {
    chart.data = wData
    chart.update();
  }
  //▼ 描画切替  (月)
  function changeMonthChart(chart) {
    chart.data = mData
    chart.update();
  }


  //▼ 描画データ取得  (Ajax)
  function chart() {
      $.ajax({
          url: 'dashboard/chart',
          type: 'POST',
          dataType: 'json',

          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }//（token送信）※metaに設置
      })
      .then(
          function (res){
          /************
           *   成功   *
           ************/
            let wObj = res['wData']; //Recive data from PHP in aossciative array
            let wArr = Object.keys(wObj).map(function (key) { return wObj[key] });//Convert to array
            wData.datasets[0].data = wArr;

            let mObj = res['mData'];
            let mArr = Object.keys(mObj).map(function (key) { return mObj[key] });
            mData.datasets[0].data = mArr;

            chnageWeekChart(myChart);
            chnageMonthChart(myChart);
          },
          function (error) {
            /************
             *   失敗   *
             ************/
              console.log(error);
          }
      )
  }

});
