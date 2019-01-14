<?php
if(isset($_POST['password']) && isset($_POST['user']))
{
	$pass = hash( 'whirlpool', htmlentities(mysql_escape_string($_POST['password'])));
	$user = htmlentities(mysql_escape_string($_POST['user']));
	$result = mysql_query("SELECT `user` FROM `playerinfo` WHERE `user` = '$user' AND `password` = '$pass'");
	if(mysql_num_rows($result))
	{
		$con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
		mysql_select_db(SQL_DB, $con);
		$result = mysql_query("SELECT * FROM `adminmsg` ORDER BY `date` DESC LIMIT 1");
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
			echo $row['message'];
			echo "<br><br><strong>By ";
			echo $row['author'] . " on " . date("d/m/20y", $row['date']) . "</strong>";
		}
	}
}
else
{
		$con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
		mysql_select_db(SQL_DB, $con);
		$result = mysql_query("SELECT * FROM `adminmsg` ORDER BY `date` DESC LIMIT 1");
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
			echo $row['message'];
			echo "<br><br><strong>By ";
			echo $row['author'] . " on " . date("d/m/20y", $row['date']) . "</strong>";
		}
}
?>

