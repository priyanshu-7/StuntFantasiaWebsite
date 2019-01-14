<?php
$result = mysql_query("SELECT * FROM `news` ORDER BY `date` DESC LIMIT 1");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
{
    echo $row['message'];
	echo "<br><br><strong>By ";
	echo $row['author'] . " on " . date("d/m/20y", $row['date']) . "</strong>";
}
?>