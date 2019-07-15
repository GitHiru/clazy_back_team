/***********************************************************
*    チャート データ取得
***********************************************************/
//Ajax （リクエスト）データ取得
//whereで期間指定（carbonで日付or曜日決める）
//SQL groupBy グループ化＋集計関数が使える（合計値）
//（query vilderで記述）

//返って来たデータを配列に変換
//wData.datasets.data = return data
//json 文字列にしてから配列
//

$(document).on('click', '.js-like', function() {
    let userId = $(this).siblings('.user-id').val();

    chart(diaryId);
})

function chart(diaryId, $clickedBtn) {
    $.ajax({
        url: 'diary/' + diaryId +'/like',
        type: 'POST',
        dataTyupe: 'json',

        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }//token送信
    })
    .then(
        function (data) {
          //jsonでデータを取得（文字列）

          //文字列データを配列変換

          wData.datasets.data = return data;
        },
        function (error) {
            console.log(error);
        }
    )
}








/***********************************************************
*    チャート 描画
***********************************************************/

chartColor = "#FFFFFF";

let myChart;
let ctx = document.getElementById('bigDashboardChart').getContext("2d");
let gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");


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
