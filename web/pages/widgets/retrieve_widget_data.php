<?php

$return = array();

if (isset($_POST["target"]) && !empty($_POST["target"])) {
  switch ($_POST["target"]) {
    case "temperature":
      $return["value"] = "21";
      $return["comparison"] = "+1";
      break;
    case "humidity":
      $return["value"] = "68";
      $return["comparison"] = "-5";
      break;
    case "meteo":
      $return["value"] = file_get_contents('http://widget.meteocity.com/NjAwNHw1fDJ8MXwxfEZGRkZGRnwxfEZGRkZGRnxjfDE-/');
      break;
    default:
      $return["value"] = "-";
      $return["comparison"] = "-";
  }
}

echo(json_encode($return));

?>