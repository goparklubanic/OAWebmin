#!/bin/sh
mysql -u root -p$1 -e "DROP DATABASE IF EXISTS ayampedas";
mysql -u root -p$1 -e "CREATE DATABASE ayampedas";
mysql -u root -p$1 -e "GRANT ALL PRIVILEGES ON ayampedas.* to chikenspicy@localhost IDENTIFIED BY 'penam80ngan' WITH GRANT OPTION";


