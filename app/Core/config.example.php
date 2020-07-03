<?php

/**
 * This class is to handle the requests.
 * It does Check if the routes are valid to handle the request.
 * If the method is correct and if the url is correct.
 *
 *  Jasper Stolwijk
 *  2018-2021
 *  (C) Copyright JasperStolwijk2020
 *  Dictaat 11 MVC
 */

// check .htaccess RewriteBase in root folder

// Folderpaths
define("APPROOT", dirname(dirname(__FILE__)));

/**
 * NL: De reden om geen domain toe te voegen is omdat ik dit gebruik voor m'n routing.
 * Ik gebruik $_SERVER magic method -> REQUEST_URI
 * Hieruit kan je dus vanuit elk deel op je schijf de routing goed gebruiken.
 */
define("URLROOT", "/periode-4/dictaat-12");
define("DOMAIN", "http://school.localhost:2080");

// Sitename
define("SITENAME", "Bikecenter");
define("APPVERSION", "0.0.2");

// DB
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "root");
define("DBPORT", "3306");
define("DBNAME", "db_name");

// Salt Hashing
define ("SALTHEADER","POL789GHJ213798FDHSJA");
define ("SALTTRAILER","PLDS9078CVB6");