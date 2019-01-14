<?php 
include("servervariables.php"); 
include("crypting.php");
include("database.php");
if(!isset($_SESSION['logged']))
{
	die;
}
if(checksessioncookie(1) == 0 && isset($_SESSION['logged']))
{
	echo "Cookie error malfunction, please visit the cookie monster for more information";
	die;
}
if(getadmin() == 0)
{
	die("You are not admin, you cannot access the ACP.");
}
?>
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
<div id="center">
	<div class="boxed">
		  </h1>           
            <?php 
			 $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
			 mysql_select_db(SQL_DB, $con);
			 $result = mysql_query("SELECT `ip` FROM `banlog`");
			 $bans = mysql_num_rows($result);
			 $result = mysql_query("SELECT `user` FROM `playerinfo`");
			 $players = mysql_num_rows($result);
			 $result = mysql_query("SELECT `user` FROM `playerinfo` WHERE adminlvl > 0");
			 $admins = mysql_num_rows($result);
			 $result = mysql_query("SELECT `ip` FROM `banlog` WHERE `banned`=1");
			 $bans2 = mysql_num_rows($result);
			 echo "<center><table CLASS='MYTABLE'>
			  <caption><strong>Server Statistics</strong></caption>
			  <tr CLASS='MYTABLE'>
				<th width=150 CLASS='MYTABLE'><br>Category</th>
				<th width CLASS='MYTABLE'><br>Value</th>
			  </tr>
			  <tr CLASS='MYTABLE'>
				<td CLASS='MYTABLE'><br>Total Bans</td>
				<td CLASS='MYTABLE'><br>$bans</td>
			  </tr>
			  <tr CLASS='MYTABLE'>
				<td CLASS='MYTABLE'>Current Bans</td>
				<td CLASS='MYTABLE'>$bans2</td>
			  </tr>
			  <tr CLASS='MYTABLE'>
				<td CLASS='MYTABLE'>Players</td>
				<td CLASS='MYTABLE'>$players</td>
			  </tr>
			  <tr CLASS='MYTABLE'>
				<td CLASS='MYTABLE'>Admins</td>
				<td CLASS='MYTABLE'>$admins</td>
			  </tr>
			</table>
			</center>";
			?>
	  </p>
</div>
</div>
<!-- end #center -->
<div style="clear: both;">&nbsp;</div>
<div id="footer">
<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>
