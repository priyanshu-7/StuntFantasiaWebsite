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
	echo "You are not an admin, you cannot access the ACP.";
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
		  </h1>       
          <?php if(isset($_GET['t']))
		  {
		    echo '
			<center><h1>Unban a Player</h1></center>   
			<center><form action="setban.php" method="post">
            <br>Player Name
            <br><input name="pname" type="text"><br>
			<br>Or<br>
			<br>Player IP
            <br><input name="pip" type="text"><br>
            <br><input name="submit" type="submit" value="   submit   ">
			<input name="type" type="hidden" value="unban">
            </form></center>';
		  }
		  else
		  {
			  echo '
			<center><h1>Ban a Player</h1></center>   
			<center><form action="setban.php" method="post">
            <br>Player Name
            <br><input name="pname" type="text"><br>
			<br>Or<br>
			<br>Player IP
            <br><input name="pip" type="text"><br>
			<br>Reason
			<br><input name="reason" type="text">
            <br><input name="submit" type="submit" value="   submit   ">
			<input name="type" type="hidden" value="ban">
            </form></center>';
		  }
		  ?>  
	  <p></p>
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