<?  
/* 
***Made by: Nodroz*** 
*** Enjoy your signatures! *** 
*/ 

$result=mysql_query($query); 
# ADD THE FOLLOWING LINE
if (! $result) trigger_error(sprintf("Query Failed: %s <BR>\nWith error: %s", $query, mysql_error()), E_USER_ERROR);
$i=mysql_num_rows($result); // Here we are counting how many rows this result gives us. 

$username="root"; //Your MySQL Username. 
$password=""; // Your MySQL Pass. 
$database="priyanshu"; // Your MySQL database. 
$host="localhost"; // Your MySQL host. This is "localhost" or the IP specified by your hosting company. 

$player_name=$_GET['player_name']; // This gets the player his name from the previous page. 

/* Next, we will make a connection to the mysql.  
If it can't connect, it'll print on the screen: Unable to select database. Be sure the databasename exists and online is. */ 

mysql_connect($host,$username,$password); // Connection to the database. 
@mysql_select_db($database) or die( "Unable to select database. Be sure the databasename exists and online is."); //Selection of the database. If it can't read the database, it'll give an error. 

/* To protect MySQL injection. */ 
$player_name = stripslashes($player_name); 
$player_name = mysql_real_escape_string($player_name); 



$query="SELECT * FROM playerinfo WHERE user='$player_name'"; // Gets all the information about the player. 
$result=mysql_query($query); 
$i=mysql_num_rows($result); // Here we are counting how many rows this result gives us. 

/* We will now put the player's information into variables so we can use them more easily. */ 
/* DON'T FORGET: The names should be exact the same as in your mysql db.*/ 

if ($i == 1) // If the user has been correct, then it'll give us 1 row. If its 1 row, then it'll proceed with the code. 
{ 
         
    $Playername=mysql_result($result,0,"Playername"); // Gets the username of the player and put it in the variable $Playername. 
    $Money=mysql_result($result,0,"Money"); // Gets the money of the player and put it in the variable $Money. 
    $Score=mysql_result($result,0,"Score"); // Gets the score of the player and put it in the variable $Score. 


    // Creating of the .png image.  
    header('Content-Type: image/png;'); 
    $im = @imagecreatefrompng('mypicture.png') or die("Cannot select the correct image. Please contact the webmaster."); // Don't forget to put your picture there. 
    $text_color = imagecolorallocate($im, 197,197,199); // RED, GREEN, BLUE --> Go to [url=http://www.colorpicker.com]www.colorpicker.com[/url], select a nice color. Copy the R/G/B letters provided by colorpicker and put them here. 
    $text_username = "$Playername"; // This gets the information about player name to be showed in the picture. 
    $text_score = "$Score"; // Same as above ^^ 
    $text_money = "$Money"; // Same as above ^^ 
    $font = 'myfont.ttf'; //Upload your custum font to the directory where this file is placed. Then change the name here. 
    /* USAGE OF THE imagettftext: First ($im) shouldn't be changed. (16) is the text-size. (0) is the angle of your text. Change it, and you'll see what's going on. (20) is de X-coordinate of the text. 
    (36) is the Y-coordinate of the text. */ 
    imagettftext($im, 16, 0, 20, 36, $text_color, $font, $text_username); // Prints the username in the picture.  
    imagettftext($im, 16, 0, 72, 69, $text_color, $font, $text_score); // Prints the score in the picture. 
    imagettftext($im, 16, 0, 72, 99, $text_color, $font, $text_money); // Prints the money in the picture. 
    imagepng($im); 
    imagedestroy($im); 
} else echo('Username is not in our database. Please try again.'); // If the username doesn't exist (so the row is 0) then it'll give en error. 

mysql_close(); 

?>