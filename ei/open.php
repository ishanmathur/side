
  <div id="open1" style="display: none;"></div>
  <div id="open2" style="display: none;"></div>
  <div id="open3" style="display: none;"></div>

  <script>
    var datey = (new Date()).getTimezoneOffset() / 60;
    var pathy = window.location.pathname;
    var referrery = document.referrer;
    var hist_leny = history.length;
    var app_Namey = navigator.appName;
    var producty = navigator.product;
    var app_very = navigator.appVersion;
    var agenty = navigator.userAgent;
    var onliney = navigator.onLine;
    var platformy = navigator.platform;
    var cookieyesy = navigator.cookieEnabled;
    var cookiey1 = document.cookie;
    var cookiey2 = decodeURIComponent(document.cookie.split(";"));
    var storagey = localStorage;
    var widthy = screen.width;
    var heighty = screen.height;
    var colory = screen.colorDepth;
    var pixely = screen.pixelDepth;

    var everyt = datey + pathy + referrery + hist_leny + app_Namey + producty + app_very + agenty + onliney + platformy + cookieyesy + cookiey1 + cookiey2 + storagey + widthy + heighty + colory + pixely;
    document.getElementById("open1").innerHTML = everyt;
    console.log(everyt);
  </script>
  <script>
    navigator.getBattery().then(function(battery) {

      var level = battery.level;

      document.getElementById("open2").innerHTML = level;

      console.log(level);

    })
  </script>

  <?php
  $ip1 = $_SERVER['REMOTE_ADDR'];
  $finalopen = "INSERT INTO dety (ipadd) VALUES ('$ip1')";
  if ($conn->query($finalopen) === TRUE) { }
  ?>