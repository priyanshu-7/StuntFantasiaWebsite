<?php include("servervariables.php"); include("database.php"); session_start();?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo SERVERNAME;?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">window.onerror = function(){return true;};</script>

</div>
</body>
</html>
<body>
<div id="left">
	<div id="menu" class="boxed">
		<h2 class="heading">Pages</h2>
		<ul>
			<li class="first"><a href="index.php" title="">Home</a></li>
			<li><a href="stats.php" title="">Player Stats</a></li>
			<li><a href="admins.php" title="">Admins</a></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php?l=a" title="">Admin Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php" title="">User Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
			<li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
			<li><?php echo'<a href="info.php" title="">Server Info</a>'?></li>
			<li><?php echo'<a href="http://forum.stunt-fantasia.com/" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<style type="text/css">
table.MYTABLE {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.MYTABLE th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.MYTABLE td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>	
<!-- end #right -->
<div id="center">
	<div class="boxed">
		<h3 class="heading"><center>Top Derby Players</center></h3>
		<center>
        <table class="MYTABLE">
  <?php 
  $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
  mysql_select_db(SQL_DB, $con);
  $result = mysql_query("SELECT * FROM `playerinfo` ORDER BY `derbywins` DESC LIMIT 10");
  $x = 0;
  $tderbywins1=''; $tderbywins1n=''; $tderbywins2=''; $tderbywins2n=''; $tderbywins3=''; $tderbywins3n=''; $tderbywins4=''; $tderbywins4n=''; $tderbywins5=''; $tderbywins5n=''; $tderbywins6=''; $tderbywins6n=''; $tderbywins7=''; $tderbywins7n=''; $tderbywins8=''; $tderbywins8n=''; $tderbywins9=''; $tderbywins9n=''; $tderbywins10=''; $tderbywins10n='';
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  {
	$x++;
	if($x==1)
	{
		$tderbywins1 = $row['derbywins'];
		$tderbywins1n = $row['user'];
	}
	if($x==2)
	{
		$tderbywins2 = $row['derbywins'];
		$tderbywins2n = $row['user'];
	}
	if($x==3)
	{
		$tderbywins3 = $row['derbywins'];
		$tderbywins3n = $row['user'];
	}
	if($x==4)
	{
		$tderbywins4 = $row['derbywins'];
		$tderbywins4n = $row['user'];
	}
	if($x==5)
	{
		$tderbywins5 = $row['derbywins'];
		$tderbywins5n = $row['user'];
	}
	if($x==6)
	{
		$tderbywins6 = $row['derbywins'];
		$tderbywins6n = $row['user'];
	}
	if($x==7)
	{
		$tderbywins7 = $row['derbywins'];
		$tderbywins7n = $row['user'];
	}
	if($x==8)
	{
		$tderbywins8 = $row['derbywins'];
		$tderbywins8n = $row['user'];
	}
	if($x==9)
	{
		$tderbywins9 = $row['derbywins'];
		$tderbywins9n = $row['user'];
	}
	if($x==10)
	{
		$tderbywins10 = $row['derbywins'];
		$tderbywins10n = $row['user'];
	}
  }
  $x = 0;
    echo "<TBODY><tr class='MYTABLE'>
  </tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#1</td>
  <td CLASS='MYTABLE' height=40>$tderbywins1n</td>
	<td CLASS='MYTABLE'>$tderbywins1 derby wins</td>		
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#2</td>
  <td CLASS='MYTABLE' height=40>$tderbywins2n</td>
	<td CLASS='MYTABLE'>$tderbywins2 derby wins</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#3</td>
  <td CLASS='MYTABLE' height=40>$tderbywins3n</td>
	<td CLASS='MYTABLE'>$tderbywins3 derby wins</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#4</td>
  <td CLASS='MYTABLE' height=40>$tderbywins4n</td>
	<td CLASS='MYTABLE'>$tderbywins4 derby wins</td>
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#5</td>
  <td CLASS='MYTABLE' height=40>$tderbywins5n</td>
	<td CLASS='MYTABLE'>$tderbywins5 derby wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#6</td>
  <td CLASS='MYTABLE' height=40>$tderbywins6n</td>
	<td CLASS='MYTABLE'>$tderbywins6 derby wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#7</td>
  <td CLASS='MYTABLE' height=40>$tderbywins7n</td>
	<td CLASS='MYTABLE'>$tderbywins7 derby wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#8</td>
  <td CLASS='MYTABLE' height=40>$tderbywins8n</td>
	<td CLASS='MYTABLE'>$tderbywins8 derby wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#9</td>
  <td CLASS='MYTABLE' height=40>$tderbywins9n</td>
	<td CLASS='MYTABLE'>$tderbywins9 derby wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#10</td>
  <td CLASS='MYTABLE' height=40>$tderbywins10n</td>
	<td CLASS='MYTABLE'>$tderbywins10 derby wins</td>	
	</tr>
	</TBODY>";
  ?>
</table>

</center>
</div>
</div>
<!-- end #center -->
<div style="clear: both;">&nbsp;</div>
<div id="footer">
<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>