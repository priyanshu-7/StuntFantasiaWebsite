<?php 
include("servervariables.php"); 
include("crypting.php");
include("database.php");
if(!isset($_SESSION['logged']))
{
	if(!isset($_POST['user']) || !isset($_POST['password']))
	{
		die;
	}
}
if(getadmin() == 0)
{
	echo "You are not admin, you cannot access the ACP.";
die;
}
if(getadmin() < 2)
{
	echo "Your admin level is not high enough to set bans!";
	die;
}
if(checksessioncookie(1) == 0 && isset($_SESSION['logged']))
{
	echo "Cookie error malfunction, please visit the cookie monster for more information";
	die;
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
			<li><?php echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
            <li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
			<?php if(defined("FORUMURL")) echo "<li><a href='FORUMURL'>Forums</a></li>"; else echo  "<p>&nbsp;</p>";?>
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
		 	if($_POST['pname'] != '' && $_POST['pip'] == '')
			{
				$user = htmlentities(mysql_real_escape_string($_POST['pname']));
				$result = mysql_query("SELECT `user` FROM `playerinfo` WHERE `user` = '$user'");
				if(!mysql_num_rows($result))
				{
					echo "<center>There is nobody with the name $user registered!</center>";
				}
				if(mysql_num_rows($result))
				{
					if($_POST['type'] == 'unban')
					{
						$result2 = mysql_query("SELECT `name` FROM `banlog` WHERE `name` = '$user' AND banned=1 LIMIT 1");
						if(!mysql_num_rows($result2)) echo "<center>$user is not banned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=ban.php?t=u'>";
						if(mysql_num_rows($result2)) 
						{
							mysql_query("UPDATE `banlog` SET banned=0 WHERE `name` = '$user'");
							echo "<center>$user has been unbanned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
						}
					}
					if($_POST['type'] == 'ban')
					{
						$result2 = mysql_query("SELECT `name` FROM `banlog` WHERE `name` = '$user' AND banned=1");
						if(mysql_num_rows($result2)) echo "<center>$user is already banned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=ban.php'>";
						if(!mysql_num_rows($result2))
						{
							$admin = getuser();
							$time = date("F j, Y, g:i a");
							$reason = htmlentities(mysql_escape_string($_POST['reason']));
							mysql_query("INSERT INTO `banlog` (time, name, ip, reason, admin, banned) VALUES('$time', '$user', '-', '$reason', '$admin', 1)");
							echo "<center>$user has been banned for $reason. Redirecting momenterially.</center><meta http-equiv='REFRESH' content='5;url=adminpage.php'><br>";
						}
					}
				}
			}
			if($_POST['pip'] != '' && $_POST['pname'] == '')
			{
					$ip = htmlentities(mysql_real_escape_string($_POST['pip']));
					if($_POST['type'] == 'unban')
					{
						$result2 = mysql_query("SELECT `ip` FROM `banlog` WHERE `ip` = '$ip' AND banned=1 LIMIT 1");
						if(!mysql_num_rows($result2)) echo "<center>$ip is not banned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=ban.php?t=u'>";
						if(mysql_num_rows($result2)) 
						{
							mysql_query("UPDATE `banlog` SET banned=0 WHERE `ip` = '$ip'");
							echo "<center>The IP $ip has been unbanned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=adminpage.php'><br>";
						}
					}
					if($_POST['type'] == 'ban')
					{
						$result2 = mysql_query("SELECT `ip` FROM `banlog` WHERE `ip` = '$ip' AND banned=1 LIMIT 1");
						if(mysql_num_rows($result2)) echo "<center>$ip is already banned! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=ban.php'><br>";
						if(!mysql_num_rows($result2))
						{
							$admin = getuser();
							$time = date("F j, Y, g:i a");
							$reason = htmlentities(mysql_escape_string($_POST['reason']));
							mysql_query("INSERT INTO `banlog` (time, name, ip, reason, admin, banned) VALUES('$time', '-', '$ip', '$reason', '$admin', 1)");
							echo "<center>The IP $ip has been banned for $reason. Redirecting momenterially. </center><meta http-equiv='REFRESH' content='5;url=adminpage.php'><br>";
						}
					}
				}
				if($_POST['pip'] != '' && $_POST['pname'] != '')
				{
					$ip = htmlentities(mysql_escape_string($_POST['pip']));
					$user = htmlentities(mysql_escape_string($_POST['pname']));
					if($_POST['type'] == 'unban')
					{
						$result2 = mysql_query("SELECT `ip` FROM `banlog` WHERE `ip` = '$ip' AND banned=1 AND `name` = '$user' LIMIT 1");
						if(!mysql_num_rows($result2)) echo "$user with the IP $ip is not banned! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=ban.php?t=u'>";
						if(mysql_num_rows($result2)) 
						{
							mysql_query("UPDATE `banlog` SET banned=0 WHERE `ip` = '$ip' AND `name` = '$user'");
							echo "The user $user with the IP $ip has been unbanned! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'><br>";
						}
					}
					if($_POST['type'] == 'ban')
					{
						$result2 = mysql_query("SELECT `ip` FROM `banlog` WHERE `ip` = '$ip' AND banned=1 AND `name` = '$user' LIMIT 1");
						if(mysql_num_rows($result2)) echo "$user with the ip of $ip is already banned! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=ban.php'><br>";
						if(!mysql_num_rows($result2))
						{
							$admin = getuser();
							$time = date("F j, Y, g:i a");
							$reason = htmlentities(mysql_escape_string($_POST['reason']));
							mysql_query("INSERT INTO `banlog` (time, name, ip, reason, admin, banned) VALUES('$time', '$user', '$ip', '$reason', '$admin', 1)");
							echo "$user with the IP $ip has been banned for $reason. Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'><br>";
						}
					}
				}
			
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
<?php mysql_close($con); ?>