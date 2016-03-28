function initWidgets() {
  var widgetsList = {
    "temperature": "default",
    "humidity": "default",
    "weight": "default",
    "meteo": "meteo",
    "time": "time"
  };

  $.each(widgetsList, function(itWidget, itWidgetType) {
    loadWidget(itWidget, itWidgetType);
  });
}

function loadWidget(iWidget, iWidgetType) {
  if (iWidgetType === "time") {
    setInterval(loadTimeWidget, 500);
  } else {
    loadDefaultWidget(iWidget);
  }
}

function loadDefaultWidget(iWidget) {

  $("#" + iWidget).addClass("loading");

  $.ajax({
    url: "pages/widgets/retrieve_widget_data.php",
    method: "POST",
    async: true,
    data: {"target": iWidget},
    dataType: "json",
    complete: function() {
      $("#" + iWidget).removeClass("loading");
    },
    success: function(data) {
      if (iWidget === "meteo") {
        var content = data.value.replace(/http:\/\/widget.meteocity.com\/templates\/images\/icons1/g, "img/meteo");
        var wrapped = $("<div>" + content + "</div>");
        wrapped.find("link, title, meta, script").remove();
        $("#" + iWidget + "-content").html(wrapped.html());
      } else {
        if (!data.error) {
          $("#" + iWidget + "-value").text(data.value);
          $("#" + iWidget + "-comparison").text(data.comparison);
          $("#" + iWidget + " .widget-value").attr("title", "Last Update: " + data.lastUpdate);
          $("#" + iWidget + " .widget-evolution").removeClass("evoUp evoDown").addClass((data.comparison.indexOf("+") > -1) ? "evoUp" : "evoDown");
        } else {
          var listItem = "<li>" + data.error + "</li>";
          if ($("#error").html().indexOf(listItem) === -1) {
            $("#error").append(listItem).show();
          }
        }
      }
    }
  });

}

function loadTimeWidget() {
  $("#date").text(moment().format("ddd, MMMM DD, YYYY"));
  $("#time").text(moment().format("HH:mm:ss"));
}