<?php

	/*
		PHP SA:MP Server Signature Creator
		Copyright © 2011 RyDeR`
	*/
	
	header("Content-Type: image/png");
	
	$szData = $_GET['serverIP'];
	$bHasException = false;
	
	if(isset($szData))
	{
		require("Source/Includes/sampQuery.php");
		
		list($szIP, $szPort) = explode(':', $szData);
		
		try
		{
			$cQuery = new sampQuery($szIP, $szPort);
		}
		catch(sampQueryException $cException)
		{
			$bHasException = true;
		}
		
		try
		{
			$cQuery->getServerInfo($iPassword, $iPlayers, $iSlot, $szHostname, $szGameMode, $szMap);
		}
		catch(sampQueryException $cException)
		{
			$bHasException = true;
			
		}
		
		$rImage = imagecreate(675, 18);
		
		if($rImage)
		{
			$rImageIcon = imagecreatefrompng("/images" . (($iPassword) ? ("Locked") : ("Unlocked")) . ".png");
			
			if($rImageIcon)
			{
				$iWhite = imagecolorallocate($rImage, 0xFF, 0xFF, 0xFF);
				$iBlack = imagecolorallocate($rImage, 0x0, 0x0, 0x0);
				$iGrey = imagecolorallocate($rImage, 0xEF, 0xEF, 0xEF);

				imagecopymerge($rImage, $rImageIcon, 7, 2, 0, 0, 13, 14, 100);
				imagefill($rImage, 0, 0, $iGrey);
									
				$fX = 28.0;
				
				imagefilledrectangle($rImage, $fX, 0, $fX += 0.5, 18, $iWhite);
				imagefilledrectangle($rImage, $fX += 250.0, 0, $fX, 18, $iWhite);
				imagefilledrectangle($rImage, $fX += 60.0, 0, $fX, 18, $iWhite);
				imagefilledrectangle($rImage, $fX += 120.0, 0, $fX, 18, $iWhite);
				imagefilledrectangle($rImage, $fX += 90.0, 0, $fX, 18, $iWhite);
									
				$szFont = "Source/Fonts/verdana.ttf";								
				$fX = 32.0;
				
				writeBoundedImageText($rImage, $fX, 13.0, 197, 7.5, $szFont, $iBlack, $szHostname);
				writeBoundedImageText($rImage, $fX += 250, 13.0, 45, 7.5, $szFont, $iBlack, $iPlayers . '/' . $iSlot);
				writeBoundedImageText($rImage, $fX += 60.0, 13.0, 97, 7.5, $szFont, $iBlack, $szGameMode);
				writeBoundedImageText($rImage, $fX += 120.0, 13.0, 70, 7.5, $szFont, $iBlack, $szMap);
				writeBoundedImageText($rImage, $fX += 90.0, 13.0, 146, 7.5, $szFont, $iBlack, $szIP . ':' . $szPort);
				
				imagepng($rImage);
				
				imagecolordeallocate($rImage, $iWhite);					
				imagecolordeallocate($rImage, $iBlack);
				imagecolordeallocate($rImage, $iGrey);
				
				imagedestroy($rImage);
				imagedestroy($rImageIcon);
			}
		}
	}
	
	function writeBoundedImageText(&$rImage, $fX, $fY, $iWidth, $fSize, $szFont, $iColor, $szText) // RyDeR`
	{
		$iTmpWidth = 0;
		$iTextLen = strlen($szText);
		
		for($i = 0; $i < $iTextLen; ++$i)
		{
			$aDim = imagettfbbox($fSize, 0.0, $szFont, $szText[$i]);
			
			$iTmpWidth += ($aDim[2] - $aDim[0]);
			
			if($iTmpWidth > $iWidth)
			{
				imagettftext($rImage, $fSize, 0.0, $fX, $fY, $iColor, $szFont, substr($szText, 0, $i));
				return ;
			}
		}
		imagettftext($rImage, $fSize, 0.0, $fX, $fY, $iColor, $szFont, $szText);
	}
?>