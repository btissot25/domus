$(document).ready(function() {

  initPage(getURLParameter("page"));

});

function initPage(iPage) {
  if (iPage === null || iPage === "home") {
    initWidgets();
  } else if (iPage === "stats") {
    createChart("chart-cont");
  } else {
    $(".page-wrapper").append("<h1>ERROR 404</h1>");
  }
}