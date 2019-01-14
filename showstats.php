<?php 
if(!isset($_POST['search']))
{
	die("There has been a error, please press backspace and try again!");
}
include("servervariables.php"); session_start(); include('database.php');?>
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
<!-- end #right -->
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}

window.onload=function(){
	altRows('alternatecolor');
}
</script>

<div id="center">
	<div class="boxed">
	<font color="green">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet" type="text/css" />
		<h1 class="heading"><center>Stats Comparison</center></h1>
		<center>
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
        <?php
		if($_POST['search'] == 'single')
		{
			  $user = htmlentities(mysql_real_escape_string($_POST['user1']));
			  $result = mysql_query("SELECT * FROM `playerinfo` WHERE user='$user' LIMIT 1");
			  if(!mysql_num_rows($result))
			  {
				  echo "$user is not a valid user! Redirecting back to the stats page.";
				  echo '<meta http-equiv="REFRESH" content="5;url=checkstats.php?s=s">';
			  }
			  if(mysql_num_rows($result) == 1)
			  {
				  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				  {
					  $user = $row['user'];
					  $kills = $row['kills'];
					  $deaths = $row['deaths'];
					  $score = $row['score'];
					  $money = $row['money'];
					  $derbywins = $row['derbywins'];
					  $reactionwins = $row['reactionwins'];
					  $goldpots = $row['goldpots'];
				  }
				  echo"<table class='MYTABLE'>
				  <caption>Statistics for $user</caption>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80><b>User</b></td>
					<td CLASS='MYTABLE'><b>$user</b></a></td>
				
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Kills</td>
					<td CLASS='MYTABLE'>$kills</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Deaths</td>
					<td CLASS='MYTABLE'>$deaths</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Score</td>
					<td CLASS='MYTABLE'>$score</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Money</td>
					<td CLASS='MYTABLE'>$$money</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Derby wins</td>
					<td CLASS='MYTABLE'>$derbywins</td>	
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Reaction Test wins</td>
					<td CLASS='MYTABLE'>$reactionwins</td>	
				  </tr>
				  	<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Goldpots found</td>
					<td CLASS='MYTABLE'>$goldpots</td>	
				  </tr>
				</table>";
			}
		}
		if($_POST['search'] == 'double')
		{
			  $user = htmlentities(mysql_real_escape_string($_POST['user1']));
			  $result = mysql_query("SELECT * FROM `playerinfo` WHERE user='$user' LIMIT 1");
			  if(!mysql_num_rows($result))
			  {
				  echo "$user is not a valid user! Redirecting back to the stats page.<br>";
				  echo '<meta http-equiv="REFRESH" content="5;url=checkstats.php">';
			  }
			  $user2 = htmlentities(mysql_real_escape_string($_POST['user2']));
			  $result2 = mysql_query("SELECT * FROM `playerinfo` WHERE user='$user2' LIMIT 1");
			  if(!mysql_num_rows($result2))
			  {
				  echo "$user2 is not a valid user! Redirecting back to the stats page.";
				  echo '<meta http-equiv="REFRESH" content="5;url=checkstats.php">';
			  }
			  if(mysql_num_rows($result2) == 1 && mysql_num_rows($result) == 1)
			  {
				  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				  {
					  $user = $row['user'];
					  $kills = $row['kills'];
					  $deaths = $row['deaths'];
					  $score = $row['score'];
					  $money = $row['money'];
					  $derbywins = $row['derbywins'];
					  $reactionwins = $row['reactionwins'];
					  $goldpots = $row['goldpots'];
				  }
				  while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) 
				  {
					  $user2 = $row2['user'];
					  $kills2 = $row2['kills'];
					  $deaths2 = $row2['deaths'];
					  $score2 = $row2['score'];
					  $money2 = $row2['money'];
					  $derbywins2 = $row2['derbywins'];
					  $reactionwins2 = $row2['reactionwins'];
					  $goldpots2 = $row2['goldpots'];
				  }
				  echo"<table class='mytable'>
				  <tbody>
				  <caption>Statistics for $user and $user2</caption>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>User #1</td>
					<td CLASS='MYTABLE'><b>$user</b></a></td>
					<td CLASS='MYTABLE' width=75>&nbsp;</td>
					<td CLASS='MYTABLE' height=40 width=80>User #2</td>
					<td CLASS='MYTABLE'><b>$user2</b></a></td>
				
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Kills</td>
					<td CLASS='MYTABLE'>$kills</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Kills</td>
					<td CLASS='MYTABLE'>$kills2</td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Deaths</td>
					<td CLASS='MYTABLE'>$deaths</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Deaths</td>
					<td CLASS='MYTABLE'>$deaths2</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Score</td>
					<td CLASS='MYTABLE'>$score</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Score</td>
					<td CLASS='MYTABLE'>$score2</td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Money</td>
					<td CLASS='MYTABLE'>$$money</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Money</td>
					<td CLASS='MYTABLE'>$$money2</td>
					
				  </tr>
				  	<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Derby Wins</td>
					<td CLASS='MYTABLE'>$derbywins</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Derby Wins</td>
					<td CLASS='MYTABLE'>$derbywins2</td>
					
				  </tr>
				    <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Reaction Test Wins</td>
					<td CLASS='MYTABLE'>$reactionwins</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Reaction Test Wins</td>
					<td CLASS='MYTABLE'>$reactionwins2</td>
					
				  </tr>
				  	<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Goldpots found</td>
					<td CLASS='MYTABLE'>$goldpots</td>
					<td CLASS='MYTABLE'>&nbsp;</td>
					<td CLASS='MYTABLE' height=40>Goldpots found</td>
					<td CLASS='MYTABLE'>$goldpots2</td>
					
				  </tr>
				  </tbody>
				</table>";
			}
		}
		 ?>
</font>
</center>
</div>
</div>
<div style="clear: both;">&nbsp;</div>
<div id="footer">
<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>