/***********************************************************
*    main チャート
***********************************************************/

chartColor = "#FFFFFF";

let myChart;
let ctx = document.getElementById('bigDashboardChart').getContext("2d");
let gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

//■user毎にJson取得データを返す
// let wArray = <?php echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
// let mArray = <?php echo json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
// // console.log(array);

//■user毎に取得データを返す
//当該週データを取得
let wData = {
  labels: ["MON", "TUE", "WEN", "THE", "FRI", "SAT", "SUN"],
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
//月締め合算データを取得
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


// Startページ読み込み時
function initDashboardPageChartsWeek(){
  myChart = new Chart(ctx, {
    type    : 'line',
    data    : wData,
    options : options
  });
}

//Week
function chnageWeekChart(chart) {
  chart.data = wData
  chart.update();
}

//Month
function changeMonthChart(chart) {
  chart.data = mData
  chart.update();
}
