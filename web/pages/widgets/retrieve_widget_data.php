<?php

include_once '../DatabaseHandler.class.php';

$return = array();

if (isset($_POST["target"]) && !empty($_POST["target"])) {
  switch ($_POST["target"]) {
    case "temperature":
      $return = retrieveData("TEMPERATURE");
      break;
    case "humidity":
      $return = retrieveData("HUMIDITY");
      break;
    case "weight":
      $return = retrieveData("WEIGHT");
      break;
    case "meteo":
      $return["value"] = file_get_contents('http://widget.meteocity.com/NjAwNHw1fDJ8MXwxfEZGRkZGRnwxfEZGRkZGRnxjfDE-/');
      break;
    default:
      $return["error"] = "Unknown widget...";
  }
}

function retrieveData($table = "TEMPERATURE") {
  $sql = "SELECT MAX(TIMESTAMP) AS TIMESTAMP, VALUE FROM $table;";
  $columns = array("TIMESTAMP", "VALUE");
  return dumpData(DatabaseHandler::executeSelect($sql, $columns));
}

function dumpData($iData) {
  $output = array();
  if (array_key_exists("error", $iData)) {
    $output["error"] = $iData["error"];
  } else if (count($iData) == 1) {
    $output["value"] = $iData[0]["VALUE"];
    $output["comparison"] = "+1"; //TODO
    $output["lastUpdate"] = $iData[0]["TIMESTAMP"];
  } else {
    $output["error"] = "Something went wrong...";
  }
  return $output;
}

echo(json_encode($return));

?>