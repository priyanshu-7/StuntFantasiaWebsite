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
		<ul>
			<li class="first"><a href="index.php" title="">Home</a></li>
			<li><a href="stats.php" title="">Player Stats</a></li>
			<li><a href="admins.php" title="">Staff</a></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php?l=a" title="">Admin Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php" title="">User Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
			<li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
			<li><?php echo'<a href="info.php" title="">Server Info</a>'?></li>
			<li><?php echo'<a href="http://forum.stunt-fantasia.com" title="">Forum</a>'?></li>
			
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>

<html>
<body>
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
		<h3 class="heading"><center>Top Kills</center></h3>
		<center>
        <table class="MYTABLE">
  <?php 
  $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
  mysql_select_db(SQL_DB, $con);
  $result = mysql_query("SELECT * FROM `playerinfo` ORDER BY `kills` DESC LIMIT 10");
  $x = 0;
  $tkills1=''; $tkills1n=''; $tkills2=''; $tkills2n=''; $tkills3=''; $tkills3n=''; $tkills4=''; $tkills4n=''; $tkills5=''; $tkills5n=''; $tkills6=''; $tkills6n=''; $tkills7=''; $tkills7n=''; $tkills8=''; $tkills8n=''; $tkills9=''; $tkills9n=''; $tkills10=''; $tkills10n='';
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
  {
	$x++;
	if($x==1)
	{
		$tkills1 = $row['kills'];
		$tkills1n = $row['user'];
	}
	if($x==2)
	{
		$tkills2 = $row['kills'];
		$tkills2n = $row['user'];
	}
	if($x==3)
	{
		$tkills3 = $row['kills'];
		$tkills3n = $row['user'];
	}
	if($x==4)
	{
		$tkills4 = $row['kills'];
		$tkills4n = $row['user'];
	}
	if($x==5)
	{
		$tkills5 = $row['kills'];
		$tkills5n = $row['user'];
	}
	if($x==6)
	{
		$tkills6 = $row['kills'];
		$tkills6n = $row['user'];
	}
	if($x==7)
	{
		$tkills7 = $row['kills'];
		$tkills7n = $row['user'];
	}
	if($x==8)
	{
		$tkills8 = $row['kills'];
		$tkills8n = $row['user'];
	}
	if($x==9)
	{
		$tkills9 = $row['kills'];
		$tkills9n = $row['user'];
	}
	if($x==10)
	{
		$tkills10 = $row['kills'];
		$tkills10n = $row['user'];
	}
  }
  $x = 0;
    echo "<TBODY><tr class='MYTABLE'>
  </tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#1</td>
  <td CLASS='MYTABLE' height=40>$tkills1n</td>
	<td CLASS='MYTABLE'>$tkills1 kills</td>		
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#2</td>
  <td CLASS='MYTABLE' height=40>$tkills2n</td>
	<td CLASS='MYTABLE'>$tkills2 kills</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#3</td>
  <td CLASS='MYTABLE' height=40>$tkills3n</td>
	<td CLASS='MYTABLE'>$tkills3 kills</td>	
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#4</td>
  <td CLASS='MYTABLE' height=40>$tkills4n</td>
	<td CLASS='MYTABLE'>$tkills4 kills</td>
	</tr>
<tr CLASS='MYTABLE'>
<td CLASS='MYTABLE' height=40>#5</td>
  <td CLASS='MYTABLE' height=40>$tkills5n</td>
	<td CLASS='MYTABLE'>$tkills5 kills</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#6</td>
  <td CLASS='MYTABLE' height=40>$tkills6n</td>
	<td CLASS='MYTABLE'>$tkills6 kills</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#7</td>
  <td CLASS='MYTABLE' height=40>$tkills7n</td>
	<td CLASS='MYTABLE'>$tkills7 kills</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#8</td>
  <td CLASS='MYTABLE' height=40>$tkills8n</td>
	<td CLASS='MYTABLE'>$tkills8 kills</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#9</td>
  <td CLASS='MYTABLE' height=40>$tkills9n</td>
	<td CLASS='MYTABLE'>$tkills9 kills</td>	
	</tr>
	<tr CLASS='MYTABLE'>
	<td CLASS='MYTABLE' height=40>#10</td>
  <td CLASS='MYTABLE' height=40>$tkills10n</td>
	<td CLASS='MYTABLE'>$tkills10 kills</td>	
	</tr>
	</TBODY>";
  ?>
</table>
</div>

</center>
</div>
</body>
</html>
<div style="clear: both;">&nbsp;</div>
<div id="footer">
	<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
<?php 
mysql_close($con);
?></p>
	</div>
</body>
</html>





