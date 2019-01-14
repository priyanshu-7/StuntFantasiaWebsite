<?php

if(!defined('SQL_SERVER')) define('SQL_SERVER', 'fr1.game.kingj.net');

if(!defined('SQL_USERNAME')) define('SQL_USERNAME', 'Neonman');

if(!defined('SQL_PASSWORD')) define('SQL_PASSWORD', 'samp4life');

if(!defined('SQL_DB')) define('SQL_DB', 'neonman');

$con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);

mysql_select_db(SQL_DB, $con);

?>
