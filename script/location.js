/*=====================
covidDayのlocation
=====================*/

var lang = document.querySelector("html").lang;

var opt;
if (lang === "covid2022") {
  opt = document.querySelector('option[value="covid2022.php"]');
} else if (lang === "covid2021") {
  opt = document.querySelector('option[value="covid2021.php"]');
} else if (lang === "covid2020") {
  opt = document.querySelector('option[value="covid2020.php"]');
}
opt.selected = true;

document.getElementById("form").select.onchange = function () {
  location.href = document.getElementById("form").select.value;
}