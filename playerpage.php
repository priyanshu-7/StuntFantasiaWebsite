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
if(checksessioncookie(0) == 0 && isset($_SESSION['logged']))
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
            <li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
		    <li><?php echo'<a href="info.php" title="">Server Info</a>'?></li>
			<li><?php echo'<a href="http://forum.stunt-fantasia.com/" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<!-- end #left -->
<?php 
mysql_close($con);
?></p>
	</div>
</div>
<!-- end #right -->
<div id="center">
	<div class="boxed">       
		    <center><h1>User Control Panel</h1></center>
          <?php 
		  $con = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD);
		  mysql_select_db(SQL_DB, $con);
		  if(isset($_POST['password']) && isset($_POST['user']))
		  {
			  $pass = hash( 'whirlpool', htmlentities(mysql_real_escape_string($_POST['password'])));
		  	  $user = htmlentities(mysql_real_escape_string($_POST['user']));
		  }
		  else
		  {
		  	  $user = htmlentities(mysql_real_escape_string(getuser()));
		  }
		  if(isset($_POST['password']) && isset($_POST['user'])) 
		  {
			  $result = mysql_query("SELECT `adminlvl` FROM `playerinfo` WHERE `user` = '$user' AND `password` = '$pass'");
			  if(mysql_num_rows($result) !=0)
			  {
				   while ($row2 = mysql_fetch_array($result, MYSQL_ASSOC)) $alvl = $row2['adminlvl'];
				   givesessioncookie($user, $alvl);
			  }
		  }
		  if(!isset($_POST['password']) && !isset($_POST['user'])) 
		  {
			  $user = getuser();
			  $result = mysql_query("SELECT `user` FROM `playerinfo` WHERE `user` = '$user'");
		  }
		  if(!mysql_num_rows($result)) echo "<strong><center>Incorrect Username Or Password!</center></strong>";
		  else
		  {
			  $result = mysql_query("SELECT * FROM `playerinfo` WHERE `user` = '$user' LIMIT 1");
			  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
			  {
				  $user = $row['user'];
				  $kills = $row['kills'];
				  $deaths = $row['deaths'];
				  $score = $row['score'];
				  $money = $row['money'];
				  $goldpots = $row['goldpots'];
				  $derbywins = $row['derbywins'];
				  $reactionwins = $row['reactionwins'];
				  
			  }
			  if(!strlen($email)) $email = "None set";
			  echo "<center><strong>Welcome, $user</strong></center>";
			  echo"<center><table border='5'>
			  <tr>
				<td width=80 height=40>Username</td>
				<td width=90> $user</td>
				<td rowspan=3 width=200><center><a href='changepass.php'><img src='images/passlogo.png'><br></center></a></td>
				
			  </tr>
			  <tr>
				<td height=40><center>Kills</td>
				<td>$kills</td></center>
				
			  </tr>
			  <tr>
				<td height=10><center>Deaths</td>
				<td>$deaths</td></center>
				
			  </tr>
			  <tr>
				<td height=40><center>Score</td>
				<td>$score</td></center>

			  </tr>
			  <tr>
				<td height=40><center>Money</td>
				<td>$$money</td></center>
				
			  </tr>
			  <tr>
				<td height=40><center>Goldpots found</td>
				<td>$goldpots</td></center>
			  </tr>
			  <tr>
				<td height=40><center>Derby wins</td>
				<td>$derbywins</td></center>
			  </tr>
			  	<tr>
				<td height=40><center>Reaction test wins</td>
				<td>$reactionwins</td></center>
			  </tr>
			</table><br><a href='logout.php'>Logout</a></center>";

		  }
		  mysql_close($con);
		  ?>   
	  </p>
</div>
</div>
<!-- end #center -->
<div style="clear: both;">&nbsp;</div>
<div id="footer">
	<p id="legal"><font size ='2'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>
