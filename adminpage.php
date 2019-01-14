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
           <li><?php echo'<a href="http://forum.stunt-fantasia.com/" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<!-- end #right -->
<div id="center">
	<div class="boxed">     
		    <center><h1>Admin Panel</h1>  
            <?php 
		  	if(isset($_POST['password']) && isset($_POST['user']))
		  	{
			  $pass = hash( 'whirlpool', htmlentities( mysql_real_escape_string($_POST['password'])));
		  	  $user = htmlentities( mysql_real_escape_string($_POST['user']));
			  $result = mysql_query("SELECT `adminlvl` FROM `playerinfo` WHERE `user` = '$user' AND `password` = '$pass' LIMIT 1");
			  if(!mysql_num_rows($result))
			  {
				 die("Incorrect username or password!");;
			  }
			  else
			  {
				  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				  {
					  $alvll = $row['adminlvl'];
				  }
			  	  givesessioncookie($user, $alvll);
			  }
		  	}
			if(isset($_SESSION['logged']))
			{
				if(getadmin() == 0)
				{
							echo "You are not admin, you cannot access the ACP.";
die;
				}
				else
				{
					
					$alvl = getadmin();
					if($alvl == 1)
					{
						echo "<table border='0'>
						<tr>
						<td width=200><center><a href='statistics.php'><img src='images/stats.png'><br></a></center></td>
						<td width=200 height=200><center><a href='banlog.php'><img src='images/lock.png'><br></a></center></td>
						</tr>
					</table>";
	
					}
					if($alvl == 2)
					{
						echo "<table border='0'>
						<tr>
						<td width=200 height=200><center><a href='statistics.php'><img src='images/stats.png'><br></a></center></td>
						<td width=200 height=200><center><a href='information.php'><img src='images/info.png'><br></a></center></td>
						<td width=200 height=200><center><a href='ban.php?t=u'><img src='images/tick.png'><br></a></center></td>
						<td width=200 height=200><center><a href='ban.php'><img src='images/cross.png'><br></a></center></td>
						</tr>
						<tr>
						<td width=200 height=200><center><a href='banlog.php'><img src='images/lock.png'><br></a></center></td>
						</table>";
					}
					if($alvl == 3)
					{
						echo "<table border='0'>
						<tr>
						<td width=200 height=200><center><a href='statistics.php'><img src='images/stats.png'><br></a></center></td>
						<td width=200 height=200><center><a href='information.php'><img src='images/info.png'><br></a></center></td>
						<td width=200 height=200><center><a href='ban.php?t=u'><img src='images/tick.png'><br></a></center></td>
						<td width=200 height=200><center><a href='ban.php'><img src='images/cross.png'><br></a></center></td>
						</tr>
						<tr>
						<td width=200 height=200><center><a href='banlog.php'><img src='images/lock.png'><br></a></center></td>
						<td width=200 height=200><center><a href='updateinfo.php'><img src='images/update.png'><br></a></center></td>
						<td width=200 height=200><center><a href='deleteplayer.php'><img src='images/delete.png'><br></a></center></td>
						</table>";
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
</center> 
</html>
<?php mysql_close($con); ?>