<script language="javascript">



</script>
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
if(getadmin() < 3)
{
	echo "Your admin level is not high enough to update player information!";
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
          <center>
          <?php 
		  if(!isset($_POST['pname']) && !isset($_POST['hvalue']))
		  {
				  echo'
				<center><h1>Edit Player Information</h1>  
				<form action="updateinfo.php" method="post">
				<br>Player Name
				<br><input name="pname" type="text">
				<br><input name="submit" type="submit" value="   submit   ">
				</form></center>';
		  }
		  if(isset($_POST['pname']))
		  {
			  $user = htmlentities(mysql_real_escape_string($_POST['pname']));
			  $result = mysql_query("SELECT * FROM `playerinfo` WHERE `user`='$user' LIMIT 1");
			  if(!mysql_num_rows($result)) echo "$user is not a valid player! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=updateinfo.php'>";
			  else{
			  echo "<h3>Edit information for $user";
			  if(mysql_num_rows($result) != 0)
			  {
				  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				  {
					  $kills = $row['kills'];
					  $deaths = $row['deaths'];
					  $score = $row['score'];
					  $money = $row['money'];
					  $admin = $row['adminlvl'];
					  $email = $row['email'];
					  $ip = $row['IP'];
					  $banned = 'No';
					  $user = $row['user'];
					  $user2 = $row['user'];
					  $query2 = mysql_query("SELECT `ip` FROM `banlog` WHERE IP = '$ip' AND banned=1");
					  if(mysql_num_rows($query2) != 0)
					  {
						   $ip = $row['IP'] . " (Banned)";
						   $banned = 'Yes';
					  }
					  $query2 = mysql_query("SELECT `name` FROM `banlog` WHERE name = '$user' AND banned=1");
					  if(mysql_num_rows($query2) != 0) 
					  {
						  $user = $row['user'] . " (Banned)";
						  $banned = 'Yes';
					  }
				  }
				  echo"<form action='updateinfo.php' method='post'><center><table class='MYTABLE'>
				  <tr CLASS='MYTABLE'>
					<th CLASS='MYTABLE' height=40 width=80>Category</td>
					<th CLASS='MYTABLE'>Value</td>
		
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>User</td>
					<td CLASS='MYTABLE'><input name='user' type='text' value='$user'></td>
		
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>Password</td>
					<td CLASS='MYTABLE'><input name='pass' type='text' value='Unknown (Crypted)'></td>
		
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Kills</td>
					<td CLASS='MYTABLE'><input name='kills' type='text' value='$kills'></td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Deaths</td>
					<td CLASS='MYTABLE'><input name='deaths' type='text' value='$deaths'></td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Score</td>
					<td CLASS='MYTABLE'><input name='score' type='text' value='$score'></td>
					
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Money</td>
					<td CLASS='MYTABLE'><input name='money' type='text' value='$money'></td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Admin Level</td>
					<td CLASS='MYTABLE'><input name='admin' type='text' value='$admin'></td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Email</td>
					<td CLASS='MYTABLE'><input name='email' type='text' value='$email'></td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>IP</td>
					<td CLASS='MYTABLE'><input name='ip' type='text' value='$ip'></td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Banned</td>
					<td CLASS='MYTABLE'><input name='banned' type='text' value='$banned'  readonly='true'></td>
				  </tr>
				</table><input name='hvalue' type='hidden' value='$user'><input name='submit' type='submit' value='   Submit   ' ></form></center>";
			  }
		  }
		  }
		  if(isset($_POST['hvalue']))
		  {
				  $user = htmlentities(mysql_escape_string($_POST['hvalue']));
				  $user2 = $_POST['user'];
				  $pass = $_POST['pass'];
				  $kills = $_POST['kills'];
				  $deaths = $_POST['deaths'];
				  $score = $_POST['score'];
				  $money = $_POST['money'];
				  $admin = $_POST['admin'];
				  $email = $_POST['email'];
				  $ip = $_POST['ip'];
				  if($pass == 'Unknown (Crypted)')
				  {
					  mysql_query("UPDATE `playerinfo` SET `user`='$user2', `kills`=$kills, `deaths`=$deaths, `score`=$score, `money`=$money, `adminlvl`=$admin, `email`='$email', `ip`='$ip' WHERE `user` = '$user'");
					  echo "$user2 information has been updated! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
				  }
				  else if($pass != 'Unknown (Crypted)')
				  {
					  $pass = hash("whirlpool", $_POST['pass']);
					  mysql_query("UPDATE `playerinfo` SET `user`='$user2', `password`='$pass', `kills`=$kills, `deaths`=$deaths, `score`=$score, `money`=$money, `adminlvl`=$admin, `email`='$email', `ip`='$ip' WHERE `user` = '$user'");
					  echo "$user2 information has been updated! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
					  echo mysql_error();
				  }
		  
		  }
		  ?>
		</center>    
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