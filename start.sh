#!/bin/bash
port_number=8080;
cd web;
echo "";
echo ">> bower update";
bower update;
echo "";
echo ">> php -S localhost:$port_number"
php -S localhost:$port_number;
