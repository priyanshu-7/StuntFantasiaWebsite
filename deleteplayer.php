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
	echo "Your admin level is not high enough to delete players!";
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
          <h1>Delete a player</h1>
          <?php 
		  if(!isset($_POST['user']))
		  {
			  echo '<center>This is where you can completely wipe a players information. Remember that once you delete their information, you cannot get it back. <br>Please be 100% sure when you do this!</center>';
			 echo '		  
	      <form action="deleteplayer.php" method="post">
		  <br>Username
		  <br><input name="user" type="text" value="Username" maxlength="24">
		  <br>Confirm<br>  <input name="check" type="checkbox" value="">
		  <br>Are you 100% sure?<br>  <input name="check2" type="checkbox" value="">
		  <br><input name="submit" type="submit" value="   submit   "></form>
		  '; 
		  }
		  else if(isset($_POST['user']))
		  {
			  if(!isset($_POST['check']) || !isset($_POST['check2']))
			  {
				  echo "<center>You have not checked both checkboxes! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=deleteplayer.php'>";
			  }
			  else
			  {
				  $user = htmlentities(mysql_escape_string($_POST['user']));
				  $result = mysql_query("SELECT `user` FROM `playerinfo` WHERE `user` = '$user' LIMIT 1");
				  if(!mysql_num_rows($result)) echo "<center>YThere is nobody with the name $user! Redirecting momenterially.</center> <meta http-equiv='REFRESH' content='5;url=deleteplayer.php'>";
				  else if(mysql_num_rows($result))
				  {
					  mysql_query("DELETE FROM `playerinfo` WHERE `user` = '$user'");
					  mysql_query("DELETE FROM `banlog` WHERE `name` = '$user'");
					  echo "<center>Y$user has been completely erased! Redirecting momenterially. </center><meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
				  }
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