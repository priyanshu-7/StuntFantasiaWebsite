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
	die( "You are not admin, you cannot access the ACP.");
}
if(getadmin() == 1)
{
	echo "Your admin level is not high enough to view players information!";
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
		    <center><h1>View Player Information</h1></center>   
			<?php
			$user = htmlentities(mysql_real_escape_string($_POST['pname']));
			  $result = mysql_query("SELECT * FROM `playerinfo` WHERE user='$user' LIMIT 1");
			  if(!mysql_num_rows($result))
			  {
				  echo "$user is not a valid user! Redirecting back to the info page.";
				  echo '<meta http-equiv="REFRESH" content="5;url=information.php?s=s">';
			  }
			  if(mysql_num_rows($result) == 1)
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
					  $query2 = mysql_query("SELECT `ip` FROM `banlog` WHERE IP = '$ip' AND banned=1 LIMIT 1");
					  if(mysql_num_rows($query2) != 0)
					  {
						   $ip = $row['IP'] . " (Banned)";
						   $banned = 'Yes';
					  }
					  $query2 = mysql_query("SELECT `name` FROM `banlog` WHERE name = '$user' AND banned=1 LIMIT 1");
					  if(mysql_num_rows($query2) != 0) 
					  {
						  $user = $row['user'] . " (Banned)";
						  $banned = 'Yes';
					  }
				  }
				  echo"<center><table class='MYTABLE'><center><table border='5'>
				  <caption>Information for $user2</caption>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>User</td>
					<td CLASS='MYTABLE'>$user</a></td>
				
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
					<td CLASS='MYTABLE' height=40>Admin Level </td>
					<td CLASS='MYTABLE'>$admin</td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Email</td>
					<td CLASS='MYTABLE'>$email</td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>IP</td>
					<td CLASS='MYTABLE'>$ip</td>
				  </tr>
				  <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40>Banned</td>
					<td CLASS='MYTABLE'>$banned</td>
				  </tr>
				</table></center>";
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