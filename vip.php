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
			<li><?php echo'<a href="http://forum.stunt-fantasia.com/" title="">Forum</a>'?></li>
		</ul>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
	</div>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">window.onerror = function(){return true;};</script>

</div>
</body>
</html>

<p>      </p>
<div class="greybox">
    <h3><font size=18><font color='green'>VIP features</h3>
	
	<h2><font size=5><font color='black'>Access to the vip chat using "!".</h2>
	<h2><font size=5><font color='black'>Special name color on forum.</h2>
    <h2><font size=5><font color='black'>Ability to use /rainbow command for the vehicle rainbow color feature.</h2>
    <h2><font size=5><font color='black'>Ability to use /vplate command for using a custom number plate.</h2>
    <h2><font size=5><font color='black'>Ability to spawn a jetpack (even at deathmatches!).</h2>
	<h2><font size=5><font color='black'>and much more...</h2>
	
    <h3><font size=18><font color='green'>Paying methods</h3>
	
	<h2><font size=5><font color='black'>Currently we only accept PayPal(tm).</h2>
	<h2><font size=5><font color='black'>Scroll down to read how to pay and other important things below.</h2>
	
    <h3><font size=18><font color='green'>How to pay and other important things</h3>
	
	<h2><font size=5><font color='blue'>The price for buying VIP level is 7 Euros.</h2>
	<h2><font size=5><font color='black'>In order to pay you need to click on the "BUY NOW" button below.</h2>
	<h2><font size=5><font color='black'>After paying, don't forget to message your PayPal(tm) name and e-mail to Priyanshu7 on forums or IRC to receive your vip status.</h2>
	<h2><font size=5><font color='black'>You will receive VIP status within 24 hours after you pay.</h2>
	
    <h3><font size=18><font color='green'>Buy VIP now!</h3>
	
	
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<img src="images/arrow.png" HEIGHT="40" WIDTH="40" BORDER="0">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

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
