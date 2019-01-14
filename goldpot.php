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
<div id="myContainer">
<div id='cssmenu'>
<ul>
   <span>Toplist</span>
   <li class='active'><a href='toplist.php'><span>Top Kills</span></a></li>
   <li><a href='deaths.php'><span>Most Deaths</span></a></li>
   <li><a href='money.php'><span>Richest Players</span></a></li>
   <li><a href='reaction.php'><span>Top Reaction Winners</span></a></li>
   <li><a href='derby.php'><span>Top Derby Wins</span></a></li>
   <li><a href='goldpot.php'><span>Best Goldpot Hunters</span></a></li>
</ul>
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
<style> #myContainer div { float: left;	 width: 140px;} </style>
<!-- end #right -->
<div id="center">
	<div class="boxed">
		<h3 class="heading"><center>Top Goldpot Hunters</center></h3>
		<center>
        <table class="MYTABLE">
  <?php 
  $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
  mysql_select_db(SQL_DB, $con);
  $result = mysql_query("SELECT * FROM `playerinfo` ORDER BY `goldpots` DESC LIMIT 10");
  $x = 0;
  $tgoldpots1=''; $tgoldpots1n=''; $tgoldpots2=''; $tgoldpots2n=''; $tgoldpots3=''; $tgoldpots3n=''; $tgoldpots4=''; $tgoldpots4n=''; $tgoldpots5=''; $tgoldpots5n=''; $tgoldpots6=''; $tgoldpots6n=''; $tgoldpots7=''; $tgoldpots7n=''; $tgoldpots8=''; $tgoldpots8n=''; $tgoldpots9=''; $tgoldpots9n=''; $tgoldpots10=''; $tgoldpots10n='';
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  {
	$x++;
	if($x==1)
	{
		$tgoldpots1 = $row['goldpots'];
		$tgoldpots1n = $row['user'];
	}
	if($x==2)
	{
		$tgoldpots2 = $row['goldpots'];
		$tgoldpots2n = $row['user'];
	}
	if($x==3)
	{
		$tgoldpots3 = $row['goldpots'];
		$tgoldpots3n = $row['user'];
	}
	if($x==4)
	{
		$tgoldpots4 = $row['goldpots'];
		$tgoldpots4n = $row['user'];
	}
	if($x==5)
	{
		$tgoldpots5 = $row['goldpots'];
		$tgoldpots5n = $row['user'];
	}
	if($x==6)
	{
		$tgoldpots6 = $row['goldpots'];
		$tgoldpots6n = $row['user'];
	}
	if($x==7)
	{
		$tgoldpots7 = $row['goldpots'];
		$tgoldpots7n = $row['user'];
	}
	if($x==8)
	{
		$tgoldpots8 = $row['goldpots'];
		$tgoldpots8n = $row['user'];
	}
	if($x==9)
	{
		$tgoldpots9 = $row['goldpots'];
		$tgoldpots9n = $row['user'];
	}
	if($x==10)
	{
		$tgoldpots10 = $row['goldpots'];
		$tgoldpots10n = $row['user'];
	}
  }
  $x = 0;
    echo "<TBODY><tr class='MYTABLE'>
  </tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#1</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots1n</td>
	<td CLASS='MYTABLE'>$tgoldpots1 goldpots</td>		
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#2</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots2n</td>
	<td CLASS='MYTABLE'>$tgoldpots2 goldpots</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#3</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots3n</td>
	<td CLASS='MYTABLE'>$tgoldpots3 goldpots</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#4</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots4n</td>
	<td CLASS='MYTABLE'>$tgoldpots4 goldpots</td>
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#5</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots5n</td>
	<td CLASS='MYTABLE'>$tgoldpots5 goldpots</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#6</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots6n</td>
	<td CLASS='MYTABLE'>$tgoldpots6 goldpots</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#7</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots7n</td>
	<td CLASS='MYTABLE'>$tgoldpots7 goldpots</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#8</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots8n</td>
	<td CLASS='MYTABLE'>$tgoldpots8 goldpots</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#9</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots9n</td>
	<td CLASS='MYTABLE'>$tgoldpots9 goldpots</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#10</td>
  <td CLASS='MYTABLE' height=40>$tgoldpots10n</td>
	<td CLASS='MYTABLE'>$tgoldpots10 goldpots</td>	
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