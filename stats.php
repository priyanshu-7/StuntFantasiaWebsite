<?php include("servervariables.php"); session_start(); include('database.php');?>
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
		<ul>
			<li class="first"><a href="index.php" title="">Home</a></li>
			<li><a href="stats.php" title="">Player Stats</a></li>
			<li><a href="admins.php" title="">Admins</a></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php?l=a" title="">Admin Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php" title="">User Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
			<li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
			<li><?php echo'<a href="info.php" title="">Server Info</a>'?></li>
			<li><?php echo'<a href="http://forum.stunt-fantasia.com/" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<?php 
mysql_close($con);
?></p>
	</div>
</div>
<!-- end #right -->
<div id="center">
	<div class="boxed">
		<center><h3 class="heading"><font face="Player Stats"><font size='12'>Player Stats</h3></center></font>
		<center><table border="0" height='300'>
  <tr>
    <td width=200><center><a href='checkstats.php?s=s'><img src='images/magnify.png'><br></a></center></td>
    <td width=200><center><a href='checkstats.php'><img src='images/scales.png'><br></a></center></td>
    <td width=200><center><a href='toplist.php'><img src='images/top.png'><br></a></center></td>
  </tr>
</table>
</center>
</div>
</div>
<div style="clear: both;">&nbsp;</div>
<div id="footer">
	<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
<!-- end #center -->