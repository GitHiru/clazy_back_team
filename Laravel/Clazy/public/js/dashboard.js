$(function() {
      // default
      // demo.initDashboardPageChartsWeek();
      initDashboardPageChartsWeek();
      // Week
      document.getElementById('w').onclick = function(){
        chnageWeekChart(myChart);
      };
      // Month
      document.getElementById('m').onclick = function(){
        changeMonthChart(myChart);
      };

      $("#modal-2").modal("show");
});//jquery