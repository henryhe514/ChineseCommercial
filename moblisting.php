<?
@require('include/common.php');

$parState = isset($_GET["state"]) ? $_GET["state"] : "";
$parType = isset($_GET["pclass"]) ? $_GET["pclass"] : "";
$parAction = isset($_GET["action"]) ? $_GET["action"] : "";
$parKeywords = isset($_GET["searchtext"]) ? $_GET["searchtext"] : "";

function displayListingDetails($sql)
{
//	$page = new page_user();	
//	$page->replace_listing_field_tags($_GET['listingID']);
	
		global $conn, $config, $rs_listingDetails;
		$misc = new misc();
		
		$rs = $conn->Execute ($sql);		
		if(!empty($rs))
		{
		   $listing_id = $misc->make_db_unsafe ($rs->fields['listingsdb_id']);
		   $listing_title = $misc->make_db_unsafe ($rs->fields['listingsdb_title']);
		   
		   //var_dump($listing_id);
		   
		   $sql_getListingDetail = "SELECT listingsdb_title, listingsdbelements_field_name, listingsdbelements_field_value FROM " . $config['table_prefix'] . "listingsdb, " . $config['table_prefix'] . "listingsdbelements WHERE "  . $config['table_prefix'] . "listingsdbelements.listingsdb_id = " . $listing_id;
		   
		   $rs_listingDetails = $conn->Execute ($sql_getListingDetail);
		   
		   //var_dump($rs_listingDetails);
		   		   
		   while (!$rs_listingDetails->EOF) 
		   {		
		      $listing_fieldname = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_name']); 
			  
			  switch ($listing_fieldname) 
			  {
					case "address":
						$listing_address = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_value']);
						break;
					case "city":
						$listing_city = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_value']);
						break;
					case "state":
						$listing_state = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_value']);
						break;
				    case "full_desc":
						$listing_fulldesc = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_value']);
						break;
//					case "city":
//						$listing_city = $misc->make_db_unsafe ($rs->fields['listingsdbelements_feild_value']);
//						break;
//					case "state":
//						$listing_state = $misc->make_db_unsafe ($rs->fields['listingsdbelements_feild_value']);
//						break;	
					default:
						$listing_value = $misc->make_db_unsafe ($rs_listingDetails->fields['listingsdbelements_field_value']);								
				} 
				 
		    	$rs_listingDetails->MoveNext();
				
		      }
			  
		 } 
				
?>
		
				<tr>
				  <td bgcolor="#EEEEEE"><a href="/moblisting.php?action=listingview&listingID=<?=$listing_id?>"><img src="<?=$listing_image?>" width="320" /><br />
					<strong><?=$listing_title?></strong> </a>
					<p><?=$listing_fulldesc?></p>
					<strong> $<?=$listing_address?> </strong> 
                    <strong> $<?=$listing_city?> </strong> 
                    <strong> $<?=$listing_state?> </strong> 
                                                                   
				  </td>
				</tr>  
		  
      
				
<?				
				
//				                 <td colspan="2" align="left" valign="top"><strong>Address</strong>: 34 High St<br>
//                    <strong>City</strong>: Berwick<br>
//                    <strong>State</strong>: VIC<br>
//                    <strong>Postcode</strong>: 3806<br>
//                    <strong>Country</strong>: Australia<br>
//                    <strong>Parking Spaces</strong>: 2<br>
//                    <strong>Asking Price</strong>: $165,000<br>
//                    <strong>Asset Value</strong>: $75,000<br>
//                    <strong>Year Founded</strong>: 2000<br>
//                    <strong>Annual Net Profit</strong>: $60,000<br>
//                    <strong>Annual Business Turnover</strong>: $450,000<br>
//                    <strong>Status</strong>: Active<br></td>
//                </tr>
				
//			   			
//			$sql_getdescription = "select listingsdbelements_field_value as fulldesc from default_en_listingsdbelements where listingsdbelements_field_name = 'full_desc' and   listingsdb_id = " . $listing_id . " limit 1";
//			$rs_desc = $conn->Execute($sql_getdescription);
//			
//			if(!$rs_desc->EOF)
//				$listing_fulldesc = $misc->make_db_unsafe($rs_desc->fields['fulldesc']);
//		
//			if(empty($listing_fulldesc)) $listing_fulldesc = "No description provided.";
//			elseif(strlen($listing_fulldesc)>300) $listing_fulldesc = substr($listing_fulldesc,0,300) . "...";
//		
//			$sql_getprice = "select listingsdbelements_field_value as price from default_en_listingsdbelements where listingsdbelements_field_name = 'price' and listingsdb_id = " . $listing_id . " limit 1";
//			$rs_price = $conn->Execute($sql_getprice);
//			if(!$rs_price->EOF)
//				$listing_price = $misc->make_db_unsafe($rs_price->fields['price']);
//			
//			if(empty($listing_price)) $listing_price = "Negotiable";
//			
//			//$sql_getimage = "select listingsimages_thumb_file_name as image from default_en_listingsimages where listingsdb_id = " . $listing_id . " limit 1";
//			
//			$sql_getimage = "select listingsimages_file_name as image from default_en_listingsimages where listingsdb_id = " . $listing_id . " limit 1";
//			
//			$rs_image = $conn->Execute($sql_getimage);
//			if(!$rs_image->EOF)
//				$listing_image = $misc->make_db_unsafe($rs_image->fields['image']);
//			
//			if(empty($listing_image)) $listing_image = '/images/nophoto.gif';
//			else $listing_image = '/images/listing_photos/' . $listing_image;
//			
//			$sql_getMigration = "select listingsdbelements_field_value as Migration from default_en_listingsdbelements where listingsdbelements_field_name = 'Mi_business' and listingsdb_id = " . $listing_id . " limit 1";
//			$rs_Migration = $conn->Execute($sql_getMigration);
//			if(!$rs_Migration->EOF) $listing_migration = $misc->make_db_unsafe($rs_Migration->fields['Migration']);
//			if(empty($listing_migration)) $listing_migration = "NA";
//			
//			//echo "<!-- Title: $listing_title Full: $listing_fulldesc Price: $listing_price Image: $listing_image -->";			
      	

//			$listing_fulldesc = "";
//			$listing_price = "";
//			$listing_image = "";
//			$listing_migration = "";
//			$display = "";
		
			//$rs->MoveNext();

	 
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="/template/rounded_boxes/style.css" type="text/css" />
<link rel="stylesheet" href="/ak.css" type="text/css" />
<title>Commercial Business Trading</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="javascript">
function sellPage()
{
	window.location = "/registerbusiness.html";
}
function backPage()
{
	window.location = "/mobile.php";
}
</script>
</head>

<body>
<img src="/images/chinesecommercialmobilebanner.png" width="320"><br/>
<div align="center">
  <input type="button" class="bluebtn" value="Back" onClick="backPage();">
  <input type="button" class="bluebtn" value="Sell" onClick="sellPage();">
  <div class="blokbox" id="pnlSearch" style="display:none;">
    <div class="blokfooter">
      <div>&nbsp;</div>
    </div>
  </div>
  
  
  <div id="pnlListings">
    <table cellspacing="5" width="340">
      <tbody>      
<?

     $listingID = $_GET['listingID'];

	 //$listingID = $misc->make_db_extra_safe($listingID);
	 
	//$sql = "SELECT listingsdb_id, listingsdb_title, listingsdbelements_field_value, listingsformelements_id, listingsformelements_field_type, listingsformelements_field_caption,listingsformelements_display_priv FROM "
//    . $config['table_prefix'] . "listingsdb, " . $config['table_prefix'] . "listingsdbelements, " . $config['table_prefix'] . "listingsformelements WHERE ((" . $config['table_prefix'] . "listingsdbelements.listingsdb_id = $listingID) AND (listingsformelements_field_name = listingsdbelements_field_name)) ORDER BY listingsformelements_rank ASC";

//     $sql = "SELECT listingsdb_id, listingsdb_title, listingsdbelements_feild_name, listingsdbelements_field_value FROM " . $config['table_prefix'] . "listingsdb, " . $config['table_prefix'] . "listingsdbelements WHERE "  . $config['table_prefix'] . "listingsdbelements.listingsdb_id = $listingID"

     $sql = "SELECT listingsdb_id, listingsdb_title FROM " . $config['table_prefix'] . "listingsdb WHERE listingsdb_id = " . $listingID;

     displayListingDetails($sql);

?>      
      
      </tbody>
    </table>
  </div>  
</div>

<img src="http://seeaustralia.mobi/img/logo_CDMC.png"> <br />


</body>
</html>




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



<!--<img src="/images/chinesecommercialmobilebanner.png" width="320"><br/>
<div align="center">
  <input type="button" class="bluebtn" value="Back" onclick="buyPage();">
  <input type="button" class="bluebtn" value="Sell" onclick="sellPage();">

  <div id="pnlListings">
    <table cellspacing="5" width="340">
      <tbody>
        <tr>
          <td bgcolor="#EEEEEE"><img src="/images/listing_photos/40_dawatesai.jpg" width="340" /><br /></td>
        </tr>
        <tr>
          <td align="left" valign="top"><table class="listing_result_top" style="font-size:10pt;" border="0" cellpadding="5" cellspacing="5" width="100%">
              <tbody>
                <tr>
                  <td colspan="2" align="left" valign="top">Can do Cafe , Restaurant and Bar, 店面在墨尔本东南区富人区繁忙商业街上，装修温馨漂亮，有酒牌，内可坐35人左右，外可坐10人左右，客源稳定，利润丰厚。<br></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" valign="top"><strong>Address</strong>: 34 High St<br>
                    <strong>City</strong>: Berwick<br>
                    <strong>State</strong>: VIC<br>
                    <strong>Postcode</strong>: 3806<br>
                    <strong>Country</strong>: Australia<br>
                    <strong>Parking Spaces</strong>: 2<br>
                    <strong>Asking Price</strong>: $165,000<br>
                    <strong>Asset Value</strong>: $75,000<br>
                    <strong>Year Founded</strong>: 2000<br>
                    <strong>Annual Net Profit</strong>: $60,000<br>
                    <strong>Annual Business Turnover</strong>: $450,000<br>
                    <strong>Status</strong>: Active<br></td>
                </tr>

                <tr>
                  <td colspan="2" align="left" valign="top"><p>
                    </p></td>
                </tr>
              </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td><iframe scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=34+High+St,+Berwick,+VIC,+3806,+AU&amp;hnear=34+High+St,+Berwick,+VIC,+3806,+AU&amp;iwloc=near&amp;output=embed" frameborder="0" height="350" width="340"></iframe></td>
                </tr>
              </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td><script type="text/javascript" src="http://form.jotformpro.com/jsform/51760713131951?listingid=40"></script>
                    <iframe onload="window.parent.scrollTo(0,0)" src="" allowtransparency="true" name="51760713131951" id="51760713131951" style="width: 100%; border: medium none; height: 572px;" scrolling="no" frameborder="0"></iframe></td>
                </tr>
              </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td align="left" valign="top"></td>
                  <td align="left" valign="top"></td>
                </tr>
                <tr>
                  <td colspan="2" class="listing_result_bottom" align="left" valign="top"><h3>Agent Info</h3>
                    <span class="field_caption">Phone</span>:&nbsp;215.850.0710 | <span class="field_caption">Mobile</span>:&nbsp;215.850.0710 | <span class="field_caption">Fax</span>:&nbsp;702.995.6591<br>
                    <span class="field_caption">Homepage</span>:&nbsp;<a href="http://chineseproperties.com.au" onclick="window.open(this.href,'_blank','location=1,resizable=1,status=1,scrollbars=1,toolbar=1,menubar=1');return false">http://chineseproperties.com.au</a><br></td>
                </tr>
              </tbody>
            </table>
            </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<img src="http://seeaustralia.mobi/img/logo_CDMC.png"> 
©2015 Chinese Digital Media Corporation

-->