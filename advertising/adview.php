<?php // $Revision: 3988 $

/************************************************************************/
/* Openads 2.0                                                          */
/* ===========                                                          */
/*                                                                      */
/* Copyright (c) 2000-2007 by the Openads developers                    */
/* For more information visit: http://www.openads.org                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/



// Figure out our location
define ('phpAds_path', '.');


// Set invocation type
define ('phpAds_invocationType', 'adview');



/*********************************************************/
/* Include required files                                */
/*********************************************************/

require	(phpAds_path."/config.inc.php"); 
require (phpAds_path."/libraries/lib-io.inc.php");
require (phpAds_path."/libraries/lib-db.inc.php");

if ($phpAds_config['log_adviews'] || $phpAds_config['acl'])
{
	require (phpAds_path."/libraries/lib-remotehost.inc.php");
	
	if ($phpAds_config['acl'])
		require (phpAds_path."/libraries/lib-limitations.inc.php");
}

require (phpAds_path."/libraries/lib-log.inc.php");
require	(phpAds_path."/libraries/lib-view-main.inc.php");
require (phpAds_path."/libraries/lib-cache.inc.php");



/*********************************************************/
/* Register input variables                              */
/*********************************************************/

phpAds_registerGlobal ('clientid', 'clientID', 'what', 'source',
					   'n');



/*********************************************************/
/* Main code                                             */
/*********************************************************/

$url = parse_url($phpAds_config['url_prefix']);


if (isset($clientID) && !isset($clientid)) $clientid = $clientID;
if (!isset($clientid)) $clientid = 0;
if (!isset($what)) $what = '';
if (!isset($source)) $source = '';
if (!isset($n)) $n = 'default';

// Remove referer, to be sure it doesn't cause problems with limitations
if (isset($_SERVER['HTTP_REFERER'])) unset($_SERVER['HTTP_REFERER']);
if (isset($HTTP_REFERER)) unset($HTTP_REFERER);


if (phpAds_dbConnect())
{
	mt_srand(floor((isset($n) && strlen($n) > 5 ? hexdec($n[0].$n[2].$n[3].$n[4].$n[5]): 1000000) * (double)microtime()));
	
	// Reset followed zone chain
	$phpAds_followedChain = array();
	
	$found = false;
	$first = true;
	
	while (($first || $what != '') && $found == false)
	{
		$first = false;
		
		if (substr($what,0,5) == 'zone:')
		{
			if (!defined('LIBVIEWZONE_INCLUDED'))
				require (phpAds_path.'/libraries/lib-view-zone.inc.php');
			
			$row = phpAds_fetchBannerZone($what, $clientid, '', $source, false);
		}
		else
		{
			if (!defined('LIBVIEWDIRECT_INCLUDED'))
				require (phpAds_path.'/libraries/lib-view-direct.inc.php');
			
			$row = phpAds_fetchBannerDirect($what, $clientid, '', $source, false);
		}
		
		if (is_array ($row))
			$found = true;
		else
			$what  = $row;
	}
}
else
{
	$found = false;
}


if ($found)
{
	// Get the data we need to display the banner
	$row = array_merge($row, phpAds_getBannerDetails($row['bannerid']));

	// Log this impression
	if ($phpAds_config['block_adviews'] == 0 ||
	   ($phpAds_config['block_adviews'] > 0 && 
	   (!isset($_COOKIE['phpAds_blockView'][$row['bannerid']]) ||
	   	$_COOKIE['phpAds_blockView'][$row['bannerid']] <= time())))
	{
		if ($phpAds_config['log_adviews'])
			phpAds_logImpression ($row['bannerid'], $row['clientid'], $row['zoneid'], $source);
		
		// Send block cookies
		if ($phpAds_config['block_adviews'] > 0)
			phpAds_setCookie ("phpAds_blockView[".$row['bannerid']."]", time() + $phpAds_config['block_adviews'],
							  time() + $phpAds_config['block_adviews'] + 43200);
	}
	
	
	// Set delivery cookies
	phpAds_setDeliveryCookies($row);	
	
	
	// Send bannerid headers
	$cookie = array();
	$cookie['bannerid'] = $row["bannerid"];
	
	// Send zoneid headers
	if ($row['zoneid'] != 0)
		$cookie['zoneid'] = $row['zoneid'];
	
	// Send source headers
	if (isset($source) && $source != '')
		$cookie['source'] = $source;
	
	
	switch ($row['storagetype'])
	{
		case 'url':
			$row['imageurl'] = str_replace ('{timestamp}', time(), $row['imageurl']);
			$row['url']      = str_replace ('{timestamp}', time(), $row['url']);
			
			
			// Replace random
			if (preg_match ('#\{random(:([0-9]+)){0,1}\}#i', $row['imageurl'], $matches))
			{
				if ($matches[2])
					$lastdigits = $matches[2];
				else
					$lastdigits = 8;
				
				$lastrandom = '';
				
				for ($r=0; $r<$lastdigits; $r=$r+9)
					$lastrandom .= (string)mt_rand (111111111, 999999999);
				
				$lastrandom  = substr($lastrandom, 0 - $lastdigits);
				$row['imageurl'] = str_replace ($matches[0], $lastrandom, $row['imageurl']);
			}
			
			if (preg_match ('#\{random(:([0-9]+)){0,1}\}#i', $row['url'], $matches))
			{
				if ($matches[2])
					$randomdigits = $matches[2];
				else
					$randomdigits = 8;
				
				if (isset($lastdigits) && $lastdigits == $randomdigits)
					$randomnumber = $lastrandom;
				else
				{
					$randomnumber = '';
					
					for ($r=0; $r<$randomdigits; $r=$r+9)
						$randomnumber .= (string)mt_rand (111111111, 999999999);
					
					$randomnumber  = substr($randomnumber, 0 - $randomdigits);
				}
				
				$row['url'] = str_replace ($matches[0], $randomnumber, $row['url']);
			}
			
			// Store destination URL
			$cookie['dest'] = $row['url'];
			
			// Redirect to the banner
			phpAds_setCookie ("phpAds_banner[".$n."]", serialize($cookie), 0);
			phpAds_flushCookie ();
			
			header("Location: ".$row['imageurl']);
			break;
		
		
		case 'web':
			$cookie['dest'] = $row['url'];
			
			// Redirect to the banner
			phpAds_setCookie ("phpAds_banner[".$n."]", serialize($cookie), 0);
			phpAds_flushCookie ();
			
			header("Location: ".$row['imageurl']);
			break;
		
		
		case 'sql':
			$cookie['dest'] = $row['url'];
			
			if (isset($_SERVER['HTTP_USER_AGENT']))
			{
				if (preg_match ("#Mozilla/(1|2|3|4)#", $_SERVER['HTTP_USER_AGENT']) && !preg_match("#compatible#", $_SERVER['HTTP_USER_AGENT']))
				{
					// Workaround for Netscape 4 problem
					// with animated GIFs. Redirect to
					// adimage to prevent banner changing
					// at the end of each animation loop
					
					phpAds_setCookie ("phpAds_banner[".$n."]", serialize($cookie), 0);
					phpAds_flushCookie ();
					
					if ($_SERVER['SERVER_PORT'] == 443) $phpAds_config['url_prefix'] = str_replace ('http://', 'https://', $phpAds_config['url_prefix']);
					header ("Location: ".str_replace('{url_prefix}', $phpAds_config['url_prefix'], $row['imageurl']));
				}
				else
				{
					// Workaround for IE 4-5.5 problem
					// Load the banner from the database
					// and show the image directly to prevent
					// broken images when shown during a
					// form submit
					
					$res = phpAds_dbQuery("
						SELECT
							contents
						FROM
							".$phpAds_config['tbl_images']."
						WHERE
							filename = '".$row['filename']."'
					");
					
					if ($image = phpAds_dbFetchArray($res))
					{
						phpAds_setCookie ("phpAds_banner[".$n."]", serialize($cookie), 0);
						phpAds_flushCookie ();
						
						header ('Content-Type: image/'.$row['contenttype'].'; name='.md5(microtime()).'.'.$row['contenttype']);
						header ('Content-Length: '.strlen($image['contents']));
						echo $image['contents'];
					}
				}
			}
			
			break;
	}
}
else
{
	phpAds_setCookie ("phpAds_banner[".$n."]", 'DEFAULT', 0);
	phpAds_flushCookie ();
	
	if ($phpAds_config['default_banner_url'] != '')
		header ("Location: ".$phpAds_config['default_banner_url']);
	else
	{
		// Show 1x1 Gif, to ensure not broken image icon
		// is shown.
		
		header("Content-Type: image/gif");
		header("Content-Length: 43");
		
		echo chr(0x47).chr(0x49).chr(0x46).chr(0x38).chr(0x39).chr(0x61).chr(0x01).chr(0x00).
		     chr(0x01).chr(0x00).chr(0x80).chr(0x00).chr(0x00).chr(0x04).chr(0x02).chr(0x04).
		 	 chr(0x00).chr(0x00).chr(0x00).chr(0x21).chr(0xF9).chr(0x04).chr(0x01).chr(0x00).
		     chr(0x00).chr(0x00).chr(0x00).chr(0x2C).chr(0x00).chr(0x00).chr(0x00).chr(0x00).
		     chr(0x01).chr(0x00).chr(0x01).chr(0x00).chr(0x00).chr(0x02).chr(0x02).chr(0x44).
		     chr(0x01).chr(0x00).chr(0x3B);
	}
}

if ($phpAds_config['auto_maintenance'])
{
	// Perform auto maintenance!
	require (phpAds_path.'/libraries/lib-automaintenance.inc.php');
	phpAds_performAutoMaintenance();
}

?>