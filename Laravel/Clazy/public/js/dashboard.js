$(function() {
      // default
      initDashboardPageChartsWeek();
      // Week
      document.getElementById('w').onclick = function(){
        chnageWeekChart(myChart);
      };
      // Month
      document.getElementById('m').onclick = function(){
        changeMonthChart(myChart);
      };

      // First modal
      $("#modal-2").modal("show");
});
