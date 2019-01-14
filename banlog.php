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
          <center><h1>Ban Log</h1>
          Last Five Bans
<style type="text/css">
table.MYTABLE {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.MYTABLE th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.MYTABLE td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>		  
          <table class='MYTABLE'>
          <tr CLASS='MYTABLE'>
					<th CLASS='MYTABLE' height=40 width=80>User</th>
					<th CLASS='MYTABLE' height=40 width=80>Time</th>
					<th CLASS='MYTABLE' height=40 width=80>IP</th>
					<th CLASS='MYTABLE' height=40 width=180>Reason</th>
					<th CLASS='MYTABLE' height=40 width=80>Admin</th>
					<th CLASS='MYTABLE' height=40 width=80>Still Banned</th>
				  </tr>
          <?php 
			$result = mysql_query("SELECT * FROM `banlog` LIMIT 5");
			echo mysql_error();
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
			{	
				$time =  $row['time'];
				$name =  $row['name'];
				$ip =  $row['ip'];
				$reason =  $row['reason'];
				$admin = $row['admin'];
				$banned = $row['banned'];
				if($banned == 0) $banned = 'No';
				if($banned == 1) $banned = 'Yes';
				echo " <tr CLASS='MYTABLE'>
					<td CLASS='MYTABLE' height=40 width=80>$name</td>
					<td CLASS='MYTABLE' height=40 width=80>$time</td>
					<td CLASS='MYTABLE' height=40 width=80>$ip</td>
					<td CLASS='MYTABLE' height=40 width=180>$reason</td>
					<td CLASS='MYTABLE' height=40 width=80>$admin</td>
					<td CLASS='MYTABLE' height=40 width=80>$banned</td>
				  </tr>";
			}
		  ?>  
          </table>
          <p>
          <h1>Search Bans</h1>
          <form action="logshow.php" method="post">
          <br>User Name | IP Address &nbsp;<br>
          <input name="user" type="text">  <input name="ip" type="text">
          <br><input name="submit" value='   submit   ' type="submit">
          </form>
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