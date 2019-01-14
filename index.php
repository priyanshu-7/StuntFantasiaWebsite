<?php include("servervariables.php"); include("database.php"); session_start();?>
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
			<li><a href="admins.php" title="">Staff</a></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php?l=a" title="">Admin Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="adminpage.php" title="">Admin Control Panel</a>'?></li>
			<li><?php if(!isset($_SESSION['logged'])) echo'<a href="login.php" title="">User Control Panel</a>'; if(isset($_SESSION['logged'])) echo'<a href="playerpage.php" title="">User Control Panel</a>'?></li>
			<li><?php echo'<a href="shop.php" title="">Shop</a>'?></li>
			<li><?php echo'<a href="info.php" title="">Server Info</a>'?></li>
			<li><?php echo'<a href="http://forum.stunt-fantasia.com" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">window.onerror = function(){return true;};</script>
<!-- Slideshow stuff -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/mhgallery.js"></script>
<script type="text/javascript" src="js/initgallery.js"></script>
<link rel="stylesheet" href="js/mhgallery.css" type="text/css" />
<!-- End of head section codes -->


</head>
<body>
<div style="text-align:center;">

<div id="mhgallery">
<style type="text/css"> #mhgallery img { display:none; } </style>
<img src="images/01.jpg" title="01" />
<img src="images/02.jpg" title="02" />
<img src="images/03.jpg" title="03" />
<img src="images/04.jpg" title="04" />
</div>
<!-- End of Slideshow stuff -->
<h1><font size=18><font color='black'>Welcome to Stunt Fantasia's website!</font></h1>
<hr noshade size=3 width="50%">
<h2><font size=3><font color='black'>Stunt Fantasia is a server which has a bit of everything that is, Stunt, Deathmatch, Freeroam, Minigames and much much more waiting for you!</font></h2>
<h2><font size=3><font color='black'>Join our forums to stay updated with everything happening on and around the server.</font></h2>
<h2><font size=3><font color='black'>You can also join our IRC channel #sf at the server irc.tl.</font></h2>
<h2><font size=3><font color='black'>Server is currently in beta phase. So you may face bugs, please report them to the owners.</font></h2>
<hr noshade size=3 width="50%">


</div>
</body>
</html>
<div style="clear: both;">&nbsp;</div>
<div id="footer">
	<p id="legal"><font size ='3'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
<?php 
mysql_close($con);
?></p>
	</div>
</body>
</html>





