function initWidgets() {
  var widgetsList = {
    "temperature": "default",
    "humidity": "default",
    "meteo": "meteo",
    "time": "time"
  };

  $.each(widgetsList, function(itWidget, itWidgetType) {
    loadWidget(itWidget, itWidgetType);
  });
}

function loadWidget(iWidget, iWidgetType) {
  if (iWidgetType === "time") {
    setInterval("loadTimeWidget()", 500);
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
        var wrapped = $("<div>" + data.value + "</div>");
        wrapped.find("link, title, meta, script").remove();
        $("#" + iWidget + "-content").html(wrapped.html());
      } else {
        $("#" + iWidget + "-value").text(data.value);
        $("#" + iWidget + "-comparison").text(data.comparison);
      }
    }
  });

}

function loadTimeWidget() {
  $("#date").text(moment().format("ddd, MMMM DD, YYYY"));
  $("#time").text(moment().format("HH:mm:ss"));
}