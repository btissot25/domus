function createChart(iId) {

  var target = $("#dimension").val();

  $('#' + iId).highcharts({
    chart: {
      backgroundColor: 'rgba(0, 0, 0, 0.0001)',
      style: {
        color: "#fff"
      }
    },
    credits: {
      enabled: false
    },
    title: {
      text: null//'July temperatures'
    },
    xAxis: {
      type: 'datetime',
      labels: {
        style: {
          color: 'white'
        }
      }
    },
    yAxis: {
      title: {
        text: null
      },
      labels: {
        style: {
          color: 'white'
        }
      }
    },
    tooltip: {
      crosshairs: true,
      shared: true,
      valueSuffix: getTooltipSuffix(target)
    },
    legend: {
      symbolRadius: 4,
      itemStyle: {
        color: 'white'
      }
    },
    series: [{
      name: 'Average',
      data: averages,
      color: 'black',
      zIndex: 1,
      marker: {
        fillColor: 'white',
        lineWidth: 2,
        lineColor: 'black'
      }
    }, {
      name: 'Range',
      data: ranges,
      showInLegend: true,
      type: 'arearange',
      lineWidth: 0,
      linkedTo: ':previous',
      color: 'white',
      fillOpacity: 0.3,
      zIndex: 0
    }]
  });
}

function getTooltipSuffix(iTarget) {
  var oSuffix;
  switch(iTarget) {
    case "temperature":
      oSuffix = "°C";
      break;
    case "humidity":
      oSuffix = "%";
      break;
    default:
      oSuffix = "";
  }
  return oSuffix;
}