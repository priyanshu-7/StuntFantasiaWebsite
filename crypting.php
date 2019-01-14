<?php
session_start();
include("servervariables.php"); 

function convert($str,$ky='')
{ 
	if($ky=='') return $str; 
	$ky=str_replace(chr(32),'',$ky); 
	if(strlen($ky)<8)exit('key error'); 
	$kl=strlen($ky)<32?strlen($ky):32; 
	$k=array();for($i=0;$i<$kl;$i++){ 
	$k[$i]=ord($ky{$i})&0x1F;} 
	$j=0;for($i=0;$i<strlen($str);$i++){ 
	$e=ord($str{$i}); 
	$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
	$j++;$j=$j==$kl?0:$j;} 
	return $str; 
} 

function givesessioncookie($username, $adminlevel)
{
	$string = "||" . $_SERVER['REMOTE_ADDR'] . "||" . $username . "||"  . $adminlevel;
	$_SESSION['logged'] = convert($string, PASSWORDHASH);
}

function getuser()
{
	$decrpt = convert($_SESSION['logged'], PASSWORDHASH);
	$str = explode("||", $decrpt);
	return $str[2];
}

function getadmin()
{
	$decrpt = convert($_SESSION['logged'], PASSWORDHASH);
	$str = explode("||", $decrpt);
	return $str[3];
}

function checksessioncookie($admin)
{	
	if(!isset($_SESSION['logged']))
	{
		return 0;
	}
	$decrpt = convert($_SESSION['logged'], PASSWORDHASH);
	if(strpos($decrpt,$_SERVER['REMOTE_ADDR']) != 2)
	{
		return 0;
	}
	$str = explode("||", $decrpt);
	if($_SERVER['REMOTE_ADDR'] == $str[1])
	{
		if(strlen($str[1]) < 25)
		{
			if($admin == 1 && $str[2] > 0)
			{
					return 1;
			}
			else if($admin == 1 && $str[2] == 0)
			{
				return 2; 
			}
			else if($admin == 0)
			{
				return 1;
			}
		}
	}
	return 0;
}	

//Credits to whover made it decrypt / encrypt
?>