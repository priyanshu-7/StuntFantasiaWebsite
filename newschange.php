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
if(getadmin() < 5)
{
	echo "Your admin level is not high enough to change news!";
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
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<h1><?php echo SERVERNAME;?></h1>
	<h2><?php echo SLOGAN;?></h2>
</div>
<div id="left">
	<div id="menu" class="boxed">
		<h2 class="heading">Pages</h2>
		<ul>
			<li class="first"><a href="index.php" title="">Home</a></li>
			<li><a href="stats.php" title="">Player Stats</a></li>
			<li><a href="admins.php" title="">Admins</a></li>
			<li><?php echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
            <li><?php echo'<a href="map.php" title="">Server Live Map</a>'?></li>
			<?php if(defined("FORUMURL")) echo "<li><a href='FORUMURL'>Forums</a></li>"; else echo  "<p>&nbsp;</p>";?>
            <table>
            <tr>
            <?php include("amsg.php"); ?>
            </tr>
            </table>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<!-- end #left -->
<div id="right">
	<div class="boxed">
		<h2 class="heading">News</h2>
<p>
<?php 
include("news.php");
?></p>
	</div>
</div>
<!-- end #right -->
<div id="center">
	<div class="boxed">
		<h1 class="heading">Welcome to <?php echo SERVERNAME;?>!
		  </h1>       
          <center>
          <h1>News Editing</h1>
          <?php 
		  if(!isset($_POST['msg']) && !isset($_POST['amsg']))
		  {
			  echo 'Welcome to the news editing page. The player news is located on the right hand side of your page and the admin news (Only visible by admins) is located on the bottom left of your page. HTML tags are enabled so you can use certain tags.
		<form action="newschange.php" method="post">
        <table>
        <tr><td height = 50><br><center>Admin News
        <br><input name="amsg" type="text"></center></td></tr>
        <tr><td height = 50><br><center>Player News
        <br><input name="msg" type="text"></center></td></tr>
        <tr><td height = 50><center><input name="submit" type="submit" value="   submit   "></center></td></tr>
        </form>
        </table>';  
		  }
		  else
		  {
			  if($_POST['msg'] == '' && $_POST['amsg'] == '')
			  {
				  echo "No values where inserted! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=newschange.php";
			  }
			  if($_POST['msg'] != '' && $_POST['amsg'] == '')
			  {
				  $msg = htmlentities(mysql_escape_string($_POST['msg']));
				  $time = time();
				  $admin = getuser();
				  mysql_query("INSERT INTO `news` (`message`, `author`, `date`) VALUES ('$msg', '$admin', $time)");
				  echo "Player News edited! You will need to refresh your page or visit another one for it to appear! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
			  }
			  if($_POST['msg'] == '' && $_POST['amsg'] != '')
			  {
				  $msg = htmlentities(mysql_escape_string($_POST['amsg']));
				  $time = time();
				  $admin = getuser();
				  mysql_query("INSERT INTO `adminmsg` (`message`, `author`, `date`) VALUES ('$msg', '$admin', $time)");
				  echo "Admin News edited! You will need to refresh your page or visit another one for it to appear! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
			  }
			  if($_POST['msg'] != '' && $_POST['amsg'] != '')
			  {
				  $msg = htmlentities(mysql_escape_string($_POST['msg']));
				  $msg2 = htmlentities(mysql_escape_string($_POST['amsg']));
				  $time = time();
				  $admin = getuser();
				  mysql_query("INSERT INTO `news` (`message`, `author`, `date`) VALUES ('$msg', '$admin', '$time')");
				   mysql_query("INSERT INTO `adminmsg` (`message`, `author`, `date`) VALUES ('$msg2', '$admin', $time)");
				  echo "Player and Admin News edited! You will need to refresh your page or visit another one for it to appear! Redirecting momenterially. <meta http-equiv='REFRESH' content='5;url=adminpage.php'>";
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
	<p id="legal">Copyright <?php echo SERVERNAME;?>. All Rights Reserved. Website created and designed By [HiC]TheKiller and XFlawless. Icons by glyphish.</p>
	<p id="links"><a href="index.php">Home</a> | <a href="stats.php">Stats</a> | <a href="admins.php">Admins</a> | <a href=<?php if(isset($_SESSION['logged'])) echo "adminpage.php"; else echo "login.php?l=a";?>>ACP</a> | <a href=<?php if(isset($_SESSION['logged'])) echo "playerpage.php"; else echo "login.php";?>>UCP</a>  </p>
</div>
</body>
</html>
<?php mysql_close($con); ?>