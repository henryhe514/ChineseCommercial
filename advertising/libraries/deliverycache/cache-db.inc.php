<?php // $Revision: 3830 $

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


// Set define to prevent duplicate include
define ('LIBVIEWCACHE_INCLUDED', true);


function phpAds_cacheFetch ($name)
{
	global $phpAds_config;
	
	$cacheres = phpAds_dbQuery("SELECT * FROM ".$phpAds_config['tbl_cache']." WHERE cacheid = '".$name."'");
	
	if ($cacherow = phpAds_dbFetchArray($cacheres))
		return unserialize($cacherow['content']);
	else
		return false;
}

function phpAds_cacheStore ($name, $cache)
{
	global $phpAds_config;
	
	$cache = addslashes(serialize($cache));
	
	$result = phpAds_dbQuery("UPDATE ".$phpAds_config['tbl_cache']." SET content = '".$cache."' WHERE cacheid = '".$name."'");
	
    if (phpAds_dbAffectedRows() == 0) 
    	$result = phpAds_dbQuery("INSERT INTO ".$phpAds_config['tbl_cache']." (cacheid, content) VALUES ('".$name."', '".$cache."')");
}

function phpAds_cacheDelete ($name='')
{
	global $phpAds_config;
	
	if ($name == '')
		$result = phpAds_dbQuery("DELETE FROM ".$phpAds_config['tbl_cache']);
	else
		$result = phpAds_dbQuery("DELETE FROM ".$phpAds_config['tbl_cache']." WHERE cacheid = '".$name."'");
}


function phpAds_cacheInfo ()
{
	global $phpAds_config;
	
	$result = array();
	
	$cacheres = phpAds_dbQuery("SELECT cacheid, LENGTH(content) AS len FROM ".$phpAds_config['tbl_cache']);
	
	while ($cacherow = phpAds_dbFetchArray($cacheres))
		$result[$cacherow['cacheid']] = $cacherow['len'];
	
	return $result;
}

?>