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
<?php
require "samp_query.php";

$serverIP = "91.121.97.26";
$serverPort = 7827;

try
{
    $rQuery = new QueryServer( $serverIP, $serverPort );

    $aInformation = $rQuery->GetInfo( );
    $aServerRules = $rQuery->GetRules( );
    $aBasicPlayer = $rQuery->GetPlayers( );
    $aTotalPlayers = $rQuery->GetDetailedPlayers( );

    $rQuery->Close( );
}
catch (QueryServerException $pError)
{
    echo '<h3><div style="text-align:center;">Server is currently offline.</h3></div>', '<h3><div style="text-align:center;">Please check again later.</h3></div>' ;
}

if(isset($aInformation) && is_array($aInformation)){
?>

  <div class="box333">
          <td><td><h3><font size=5>Hostname</font></td> </h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo htmlentities($aInformation['Hostname']); ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Gamemode</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo htmlentities($aInformation['Gamemode']); ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Players</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo $aInformation['Players']; ?> / <?php echo $aInformation['MaxPlayers']; ?></td>
      </tr>
      <tr>
          <td><td><h3><font size=3>Map</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo htmlentities($aInformation['Map']); ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Weather</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo $aServerRules['weather']; ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Time</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo $aServerRules['worldtime']; ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Version</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo $aServerRules['version']; ?></td></font></td> </h3>
      </tr>
      <tr>
          <td><td><h3><font size=3>Password</font></td></h3>
          <td><td><h3><font size=3><font color='green'><td><?php echo $aInformation['Password'] ? 'Yes' : 'No'; ?></td></td></font></td> </h3>
      </tr>
  </div>

  <br />
  <h3>Online Players</h3>
  <?php
  if(!is_array($aTotalPlayers) || count($aTotalPlayers) == 0){
      echo '<br /><i>None</i>';
  } else {
  ?>
	  <table width="400">
	      <tr>
	          <td><b><h3>Player ID</b></td>
	          <td><b><h3>Nickname</b></td>
	          <td><b><h3>Score</b></td>
	      </tr>
	  <?php
	  foreach($aTotalPlayers AS $id => $value){
	  ?>
	      <tr>
	          <td><?php echo $value['PlayerID']; ?></td>
	          <td><?php echo htmlentities($value['Nickname']); ?></td>
	          <td><?php echo $value['Score']; ?></td>
	      </tr>
	  <?php
	  }
	
	  echo '</table>';
	}
}
?>
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