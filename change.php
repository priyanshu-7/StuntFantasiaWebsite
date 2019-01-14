<?php 
include("servervariables.php"); 
include("crypting.php");
include("database.php"); 
if(checksessioncookie(0) == 0 && isset($_SESSION['logged']))
{
	echo "Cookie error malfunction, please visit the cookie monster for more information";
	die;
}?>
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
		<p>
        <?php 
		if(!isset($_POST['x'])) echo "Cookie monster dislikes!";
		if(isset($_POST['x']) && strval($_POST['x']) < 3)
		{
			$con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
			mysql_select_db(SQL_DB, $con);
			$user = getuser();
			if($_POST['x']==1)
			{
				$result = mysql_query("SELECT `password` FROM `playerinfo` WHERE user='$user'");
				while($array = mysql_fetch_array($result, MYSQL_ASSOC)) $pass = $array['password'];
				if(!isset($_POST['cpass'])) echo 'COOKIE MONSTER DISLIKES';
				{
					if($_POST['npass'] != $_POST['cnpass'])
					{
						echo "<center>Your passwords did not match! <br>Redirecting back to the password changing page.</center>";
						echo '<meta http-equiv="REFRESH" content="5;url=changepass.php">';
						
					}
					else if (strtoupper(hash('whirlpool',$_POST['cpass'])) != $pass)
					{
						echo "<center>Your old password was incorrect! <br>Redirecting back to the password changing page.</center>";
						echo '<meta http-equiv="REFRESH" content="5;url=changepass.php">';
					}
					else
					{
						$inputpass = strtoupper(hash('whirlpool', $_POST['npass']));
						mysql_query("UPDATE `playerinfo` SET `password` = '$inputpass' WHERE user = '$user'");
						echo "<center>Your Password has been changed! <br>Redirecting back to the user panel.</center>";
						echo '<meta http-equiv="REFRESH" content="5;url=playerpage.php">';
					}
				}
			}
			if($_POST['x']==2)
			{
				if(!isset($_POST['email'])) echo 'COOKIE MONSTER DISLIKES';
				if(isset($_POST['email']))
				{
					$email = htmlentities(mysql_real_escape_string($_POST['email']));
					$user = getuser();
					mysql_query("UPDATE `playerinfo` SET email = '$email' WHERE `user` = '$user'");
					echo "<center>Your email has been set to $email. Redirecting momentarily.</center>";
					echo '<meta http-equiv="REFRESH" content="5;url=playerpage.php">';
				}
				
			}
		}
		mysql_close($con);
		?>
</div>
</div>
<!-- end #center -->
<div style="clear: both;">&nbsp;</div>
<div id="footer">
	<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>