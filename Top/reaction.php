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
		<h3 class="heading"><center>Top reaction wins</center></h3>
		<center>
        <table class="MYTABLE">
  <?php 
  $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
  mysql_select_db(SQL_DB, $con);
  $result = mysql_query("SELECT * FROM `playerinfo` ORDER BY `reactionwins` DESC LIMIT 10");
  $x = 0;
  $treactionwins1=''; $treactionwins1n=''; $treactionwins2=''; $treactionwins2n=''; $treactionwins3=''; $treactionwins3n=''; $treactionwins4=''; $treactionwins4n=''; $treactionwins5=''; $treactionwins5n=''; $treactionwins6=''; $treactionwins6n=''; $treactionwins7=''; $treactionwins7n=''; $treactionwins8=''; $treactionwins8n=''; $treactionwins9=''; $treactionwins9n=''; $treactionwins10=''; $treactionwins10n='';
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  {
	$x++;
	if($x==1)
	{
		$treactionwins1 = $row['reactionwins'];
		$treactionwins1n = $row['user'];
	}
	if($x==2)
	{
		$treactionwins2 = $row['reactionwins'];
		$treactionwins2n = $row['user'];
	}
	if($x==3)
	{
		$treactionwins3 = $row['reactionwins'];
		$treactionwins3n = $row['user'];
	}
	if($x==4)
	{
		$treactionwins4 = $row['reactionwins'];
		$treactionwins4n = $row['user'];
	}
	if($x==5)
	{
		$treactionwins5 = $row['reactionwins'];
		$treactionwins5n = $row['user'];
	}
	if($x==6)
	{
		$treactionwins6 = $row['reactionwins'];
		$treactionwins6n = $row['user'];
	}
	if($x==7)
	{
		$treactionwins7 = $row['reactionwins'];
		$treactionwins7n = $row['user'];
	}
	if($x==8)
	{
		$treactionwins8 = $row['reactionwins'];
		$treactionwins8n = $row['user'];
	}
	if($x==9)
	{
		$treactionwins9 = $row['reactionwins'];
		$treactionwins9n = $row['user'];
	}
	if($x==10)
	{
		$treactionwins10 = $row['reactionwins'];
		$treactionwins10n = $row['user'];
	}
  }
  $x = 0;
    echo "<TBODY><tr class='MYTABLE'>
  </tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#1</td>
  <td CLASS='MYTABLE' height=40>$treactionwins1n</td>
	<td CLASS='MYTABLE'>$treactionwins1 reaction test wins</td>		
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#2</td>
  <td CLASS='MYTABLE' height=40>$treactionwins2n</td>
	<td CLASS='MYTABLE'>$treactionwins2 reaction test wins</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#3</td>
  <td CLASS='MYTABLE' height=40>$treactionwins3n</td>
	<td CLASS='MYTABLE'>$treactionwins3 reaction test wins</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#4</td>
  <td CLASS='MYTABLE' height=40>$treactionwins4n</td>
	<td CLASS='MYTABLE'>$treactionwins4 reaction test wins</td>
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#5</td>
  <td CLASS='MYTABLE' height=40>$treactionwins5n</td>
	<td CLASS='MYTABLE'>$treactionwins5 reaction test wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#6</td>
  <td CLASS='MYTABLE' height=40>$treactionwins6n</td>
	<td CLASS='MYTABLE'>$treactionwins6 reaction test wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#7</td>
  <td CLASS='MYTABLE' height=40>$treactionwins7n</td>
	<td CLASS='MYTABLE'>$treactionwins7 reaction test wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#8</td>
  <td CLASS='MYTABLE' height=40>$treactionwins8n</td>
	<td CLASS='MYTABLE'>$treactionwins8 reaction test wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#9</td>
  <td CLASS='MYTABLE' height=40>$treactionwins9n</td>
	<td CLASS='MYTABLE'>$treactionwins9 reaction test wins</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#10</td>
  <td CLASS='MYTABLE' height=40>$treactionwins10n</td>
	<td CLASS='MYTABLE'>$treactionwins10 reaction test wins</td>	
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