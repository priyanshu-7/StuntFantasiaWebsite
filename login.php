<?php include("servervariables.php");  include('database.php');
if(isset($_GET['l']))
{
	if($_GET['l'] == "a")
	{
		define("logintype", "admin");
	}
}
else define("logintype", "player");
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
	<div class="boxed"><center>
		    <p>
		  <h1>Login </h1>   
          <?php 
		  if(logintype == "admin") echo "<form name='form1' method='post' action='adminpage.php'>"; 
		  if(logintype == "player") echo "<form name='form1' method='post' action='playerpage.php'>"; 
		  ?>   
		    <p>Username <br>
            <input type="text" name="user" id="user">
            <br>
            Password<br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" name="submit" id="Login" value="   Login   ">
	        </p>
	        </p>
          </form>
	  </center></p>
</div>
</div>
<!-- end #center -->
<div style="clear: both;">&nbsp;</div>
<div id="footer">
<p id="legal"><font size ='2'><font color = 'white'>Copyright <?php echo SERVERNAME;?>.</font></p>
</div>
</body>
</html>
