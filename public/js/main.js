if ('serviceWorker' in navigator) {
  /***********************************************************
  *  PWA 
  *    ネットワークリクエストをインターセプト（横取り）して
  *    応答できるプログラミング可能なプロキシを配置。
  ***********************************************************/

  // register service worker
  navigator.serviceWorker.register('/service-worker.js');

}
