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


// Public name of the plugin info function
$plugin_info_function		= "Plugin_GlobalhistoryInfo";


// Public info function
function Plugin_GlobalhistoryInfo()
{
	global $strGlobalHistory, $strPluginGlobal, $strDelimiter, $strUseQuotes;
	
	$plugininfo = array (
		"plugin-name"			=> $strGlobalHistory,
		"plugin-description"	=> $strPluginGlobal,
		"plugin-author"			=> "Niels Leenheer",
		"plugin-export"			=> "csv",
		"plugin-authorize"		=> phpAds_Admin,
		"plugin-execute"		=> "Plugin_GlobalhistoryExecute",
		"plugin-import"			=> array (
			"delimiter"		=> array (
				"title"					=> $strDelimiter,
				"type"					=> "delimiter" ),
			"quotes"		=> array (
				"title"					=> $strUseQuotes,
				"type"					=> "quotes" ) )
	);
	
	return ($plugininfo);
}



/*********************************************************/
/* Private plugin function                               */
/*********************************************************/

function Plugin_GlobalhistoryExecute($delimiter='t', $quotes='')
{
	global $phpAds_config, $date_format;
	global $strGlobalHistory, $strTotal, $strDay, $strViews, $strClicks, $strCTRShort;
	
	// Expand delimiter and quotes
	if ($delimiter == 't')	$delimiter = "\t";
	if ($quotes == '1')		$quotes = "'";
	if ($quotes == '2')		$quotes = '"';
	
	header("Content-type: application/csv");
	header("Content-Disposition: inline; filename=\"publisherhistory.csv\"");
	
	if ($phpAds_config['compact_stats'])
	{
		$res_query = "
			SELECT
				DATE_FORMAT(day, '%Y%m%d') as date,
				DATE_FORMAT(day, '$date_format') as date_formatted,
				SUM(views) AS adviews,
				SUM(clicks) AS adclicks
			FROM
				".$phpAds_config['tbl_adstats']."
			GROUP BY
				day
			ORDER BY
				date
		";
		
		$res_banners = phpAds_dbQuery($res_query) or phpAds_sqlDie();
		
		while ($row_banners = phpAds_dbFetchArray($res_banners))
		{
			$stats [$row_banners['date_formatted']]['views'] = $row_banners['adviews'];
			$stats [$row_banners['date_formatted']]['clicks'] = $row_banners['adclicks'];
		}
	}
	else
	{
		$res_query = "
			SELECT
				DATE_FORMAT(t_stamp, '%Y%m%d') as date,
				DATE_FORMAT(t_stamp, '".$date_format."') as date_formatted,
				count(bannerid) as adviews
			FROM
				".$phpAds_config['tbl_adviews']."
			GROUP BY
				date, date_formatted
			ORDER BY
				date
		";
		
		$res_banners = phpAds_dbQuery($res_query) or phpAds_sqlDie();
		
		while ($row_banners = phpAds_dbFetchArray($res_banners))
		{
			$stats [$row_banners['date_formatted']]['views'] = $row_banners['adviews'];
			$stats [$row_banners['date_formatted']]['clicks'] = 0;
		}
		
		$res_query = "
			SELECT
				DATE_FORMAT(t_stamp, '%Y%m%d') as date,
				DATE_FORMAT(t_stamp, '".$date_format."') as date_formatted,
				count(bannerid) as adclicks
			FROM
				".$phpAds_config['tbl_adclicks']."
			GROUP BY
				date, date_formatted
			ORDER BY
				date
		";
		
		$res_banners = phpAds_dbQuery($res_query) or phpAds_sqlDie();
		
		while ($row_banners = phpAds_dbFetchArray($res_banners))
		{
			$stats [$row_banners['date_formatted']]['clicks'] = $row_banners['adclicks'];
		}
	}
	
	echo $quotes.$strGlobalHistory.$quotes."\n\n";
	echo $quotes.$strDay.$quotes.$delimiter.$quotes.$strViews.$quotes.$delimiter;
	echo $quotes.$strClicks.$quotes.$delimiter.$quotes.$strCTRShort.$quotes."\n";
	
	$totalclicks = 0;
	$totalviews = 0;
	
	if (isset($stats) && is_array($stats))
	{
		foreach (array_keys($stats) as $key)
		{
			$row = array();
			
			$row[] = $quotes.$key.$quotes;
			$row[] = $quotes.$stats[$key]['views'].$quotes;
			$row[] = $quotes.$stats[$key]['clicks'].$quotes;
			$row[] = $quotes.phpAds_buildCTR ($stats[$key]['views'], $stats[$key]['clicks']).$quotes;
			
			echo implode ($delimiter, $row)."\n";
			
			$totalclicks += $stats[$key]['clicks'];
			$totalviews += $stats[$key]['views'];
		}
	}
	
	echo "\n";
	echo $quotes.$strTotal.$quotes.$delimiter.$quotes.$totalviews.$quotes.$delimiter;
	echo $quotes.$totalclicks.$quotes.$delimiter.$quotes.phpAds_buildCTR ($totalviews, $totalclicks).$quotes."\n";
}

?>