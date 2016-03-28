<?php

class DatabaseHandler {

  private static $db = "domus.db";

  private static function getDatabasePath() {
    return dirname(__DIR__) . "/" . self::$db;
  }

  public static function executeSelect($query, $iColumns) {

    $oArray = array();

    try {

      if (!file_exists(self::getDatabasePath())) {

        $oArray["error"] = "The database is not setup yet.";

      } else {

       $dbh = new PDO("sqlite:" . self::getDatabasePath());

        $oArray = array();
        $rowIndex = 0;
        foreach ($dbh->query($query) as $row) {
          foreach ($iColumns as $column) {
            $oArray[$rowIndex][$column] = $row[$column];
          }
          $rowIndex++;
        }

        $dbh = null;

      }

    } catch(PDOException $e) {
      $oArray["error"] = $e->getMessage();
    }

    return $oArray;

  }

}

?>