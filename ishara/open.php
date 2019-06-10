<form method="get" name="ff" action="index.php">
  <!-- <textarea name="aa" id="aa"></textarea> -->
  <textarea name="bb" id="bb"></textarea>
</form>

<!-- <script>
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

  var everyt = datey + " .. " + pathy + " .. " + referrery + " .. " + hist_leny + " .. " + app_Namey + " .. " + producty + " .. " + app_very + " .. " + agenty + " .. " + onliney + " .. " + platformy + " .. " + cookieyesy + " .. " + cookiey1 + " .. " + cookiey2 + " .. " + storagey + " .. " + widthy + " .. " + heighty + " .. " + colory + " .. " + pixely + " .. ";
  document.getElementById("aa").innerHTML = everyt;
  console.log(everyt);
</script> -->

<script>
  navigator.getBattery().then(function(battery) {

    var level = battery.level;

    document.getElementById("bb").innerHTML = level * 100;

    console.log(level);

  })
</script>

<script>
  window.onload = function() {
    document.forms['ff'].submit()
  }
</script>