/***********************************************************
*    main チャート
***********************************************************/

chartColor = "#FFFFFF";

let ctx = document.getElementById('bigDashboardChart').getContext("2d");
let gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");
let myChart = new Chart(ctx, {});
// let chartData = 'label: "Data",
//                  borderColor: chartColor,
//                  pointBorderColor: chartColor,
//                  pointBackgroundColor: "#1e3d60",
//                  pointHoverBackgroundColor: "#1e3d60",
//                  pointHoverBorderColor: chartColor,
//                  pointBorderWidth: 1,
//                  pointHoverRadius: 7,
//                  pointHoverBorderWidth: 2,
//                  pointRadius: 5,
//                  fill: true,
//                  backgroundColor: gradientFill,
//                  borderWidth: 2';

// Startページ読み込み時
function initDashboardPageChartsWeek(){
  myChart = new Chart(ctx, {
    type    : 'line',
    data    : {
      labels: ["MON", "TUE", "WEN", "THE", "FRI", "SAT", "SUN"],
      datasets: [{
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
        borderWidth: 2',
        data: [250, 160, 120, 140, 190, 95, 78]
      }]
    },
    options : {
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
    }
  });
}

//Week
function chnageWeekChart(chart) {
  chart.data = {
    labels: ["MON", "TUE", "WEN", "THE", "FRI", "SAT", "SUN"],
    datasets: [{
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
      borderWidth: 2',
      data: [250, 160, 120, 140, 190, 95, 78]
    }]
  }
  chart.update();
}

//Month
function changeMonthChart(chart) {
  chart.data = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
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
      borderWidth: 2',
      data: [50, 150, 100, 190, 130, 190, 250, 160, 120, 140, 190, 95]
    }]
  }
  chart.update();
}
