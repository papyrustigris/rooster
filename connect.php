<?php

define('DB_NAME', 'roostrtv_db');
define('DB_USER', 'roostrtv');
define('DB_PASSWORD','Rezin123');
define('DB_HOST','205.178.146.115');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
  die('error connecting: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link);

if (!$db_selected) {
  die('can\'t use ' . DB_NAME . ': ' . mysql_error());
}