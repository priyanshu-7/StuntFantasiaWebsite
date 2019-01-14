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
	echo "Your admin level is not high enough to view bans!";
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
          <center><h1>Ban Information</h1>
    
          <?php 
		  if(!isset($_POST['ip']) && !isset($_POST['user']))
		  {
			  echo "You didn't enter a IP or user! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=banlog.php'>";
			  
		  }
		  else
		  {
			$isbanned = 0;
			if($_POST['ip'] != '' && $_POST['user'] =='')
			{
				$ip = htmlentities(mysql_real_escape_string($_POST['ip']));
				$result = mysql_query("SELECT * FROM `banlog` WHERE ip='$ip' AND banned=1 LIMIT 1");
				if(mysql_num_rows($result)) $isbanned = 1;
			}
			if($_POST['user'] != '' && $_POST['ip'] =='')
			{
				$user = htmlentities(mysql_real_escape_string($_POST['user']));
				$result = mysql_query("SELECT * FROM `banlog` WHERE name='$user' AND banned=1 LIMIT 1");
				if(mysql_num_rows($result)) $isbanned = 1;
			}
			if($_POST['user'] != '' && $_POST['ip'] !='')
			{
				$user = htmlentities(mysql_real_escape_string($_POST['user']));
				$ip = htmlentities(mysql_real_escape_string($_POST['ip']));
				$result = mysql_query("SELECT * FROM `banlog` WHERE name='$user' AND ip='$ip' AND banned=1 LIMIT 1");
				if(mysql_num_rows($result)) $isbanned = 1;
			}
			if($isbanned == 1)
			{
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				{	
					$user = $row['name'];
					$time =  $row['time'];
					$name =  $row['name'];
					$ip =  $row['ip'];
					$reason =  $row['reason'];
					$admin = $row['admin'];
				}
				echo "<table CLASS='MYTABLE'>
				<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>User</td>
					<td CLASS='MYTABLE' height=40 width=80>$user</td>
				</tr>
				<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>Time</td>
					<td CLASS='MYTABLE' height=40 width=80>$time</td>
				</tr>
				<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>IP</td>
					<td CLASS='MYTABLE' height=40 width=80>$ip</td>
				</tr>
				<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>Reason</td>
					<td CLASS='MYTABLE' height=40 width=80>$reason</td>
				</tr>
				<tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>Admin</td>
					<td CLASS='MYTABLE' height=40 width=80>$admin</td>
				</tr>
				</table>
				<p>
				<form action='setban.php' method='post'>
				<input name='unban' type='submit' value='   Unban   '>
				<input name='type' type='hidden' value='unban'>
				<input name='pname' type='hidden' value='$user'>
				<input name='pip' type='hidden' value='$ip'>
				</form>
				";
		   }
		   if($isbanned == 0)
		   {
			   echo "The User / IP you have entered isn't banned. Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=banlog.php'>";
		   }
		  }
		  ?>  
          </table>
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