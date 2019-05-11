<?php

if(!defined('SQL_SERVER')) define('SQL_SERVER', '...');

if(!defined('SQL_USERNAME')) define('SQL_USERNAME', '...');

if(!defined('SQL_PASSWORD')) define('SQL_PASSWORD', '...');

if(!defined('SQL_DB')) define('SQL_DB', '...');

$con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);

mysql_select_db(SQL_DB, $con);

?>
