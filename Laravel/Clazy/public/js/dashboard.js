$(function() {
  /***********************************************************
  *    チャート 描画 + モーダル 表示
  ***********************************************************/
      // Weekボタン押下処理
      document.getElementById('w').onclick = function(){
        chnageWeekChart(myChart);
      };
      // Monthボタン押下処理
      document.getElementById('m').onclick = function(){
        changeMonthChart(myChart);
      };


      // 初期モーダル表示
      $("#modal-2").modal("show");
});
