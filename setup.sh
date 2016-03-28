#!/bin/bash

function exec_cmd() {
  echo ">> $1";
  eval $1;
}

# Database Setup
echo "--- Database Setup ---";
exec_cmd "sqlite3 web/domus.db < web/scripts/sql/create_tables.sql";
exec_cmd "sqlite3 web/domus.db .tables";
