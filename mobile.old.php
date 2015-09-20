<?
@require('include/common.php');

$parState = isset($_GET["state"]) ? $_GET["state"] : "";
$parType = isset($_GET["pclass"]) ? $_GET["pclass"] : "";
$parAction = isset($_GET["action"]) ? $_GET["action"] : "";
$parKeywords = isset($_GET["searchtext"]) ? $_GET["searchtext"] : "";

function displayMobileListings($sql)
{
global $conn;
$misc = new misc();

$bizcounter = 0;

$rs = $conn->Execute ($sql);

if(!empty($rs)){
 while (!$rs->EOF) 
  {
	$bizcounter++;
	$listing_id = $misc->make_db_unsafe ($rs->fields['listingsdb_id']);
	$listing_title = $misc->make_db_unsafe ($rs->fields['listingsdb_title']);
	
	$sql_getdescription = "select listingsdbelements_field_value as fulldesc from default_en_listingsdbelements where listingsdbelements_field_name = 'full_desc' and listingsdb_id = " . $listing_id . " limit 1";
	$rs_desc = $conn->Execute($sql_getdescription);
	
	if(!$rs_desc->EOF)
		$listing_fulldesc = $misc->make_db_unsafe($rs_desc->fields['fulldesc']);

	if(empty($listing_fulldesc)) $listing_fulldesc = "No description provided.";
	elseif(strlen($listing_fulldesc)>300) $listing_fulldesc = substr($listing_fulldesc,0,300) . "...";

	$sql_getprice = "select listingsdbelements_field_value as price from default_en_listingsdbelements where listingsdbelements_field_name = 'price' and listingsdb_id = " . $listing_id . " limit 1";
	$rs_price = $conn->Execute($sql_getprice);
	if(!$rs_price->EOF)
		$listing_price = $misc->make_db_unsafe($rs_price->fields['price']);
	
	if(empty($listing_price)) $listing_price = "Negotiable";
	
	//$sql_getimage = "select listingsimages_thumb_file_name as image from default_en_listingsimages where listingsdb_id = " . $listing_id . " limit 1";
	
	$sql_getimage = "select listingsimages_file_name as image from default_en_listingsimages where listingsdb_id = " . $listing_id . " limit 1";
	
	$rs_image = $conn->Execute($sql_getimage);
	if(!$rs_image->EOF)
		$listing_image = $misc->make_db_unsafe($rs_image->fields['image']);
	
	if(empty($listing_image)) $listing_image = '/images/nophoto.gif';
	else $listing_image = '/images/listing_photos/' . $listing_image;
	
	//echo "<!-- Title: $listing_title Full: $listing_fulldesc Price: $listing_price Image: $listing_image -->";
	
?>
        <tr>
          <td bgcolor="#EEEEEE"><a href="/moblisting.php?action=listingview&listingID=<?=$listing_id?>"><img src="<?=$listing_image?>" width="320" /><br />
            <strong><?=$listing_title?></strong> </a>
            <p><?=$listing_fulldesc?></p>
            <strong> $<?=$listing_price?> </strong>
          </td>
        </tr>        	
<?
	$listing_fulldesc = "";
	$listing_price = "";
	$listing_image = "";

	$rs->MoveNext();
  }
  
  if($bizcounter<1){?>
	<tr><td>
    	No business listing found matching your search request.  
    </td></tr>  
  <? 
  }elseif($bizcounter > 11){ ?>
  	<tr><td align="center">
      <input type="button" class="bluebtn" value="Prev" onClick="loadPrevious();">
	  <input type="button" class="bluebtn" value="Next" onClick="loadNext();">
    </td></tr>
  <?
  }
 }
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

function buyPage()
{
	window.location = "/mobile.php";
}

function searchPage()
{
	pnlSearch = document.getElementById("pnlSearch");
	if(pnlSearch.style.display == "none")
	{
		pnlSearch.style.display = "inline";
	}else{
		pnlSearch.style.display = "none";
	}
}

function loadPrevious()
{
	window.location = "/mobile.php?action=showprevious";
}

function loadNext()
{
	window.location = "/mobile.php?action=shownext";
}

</script>
</head>
<body>
<img src="/images/chinesecommercialmobilebanner.png" width="320"><br/>
<div align="center">
  <input type="button" class="bluebtn" value="Search" onClick="searchPage();">
  <input type="button" class="bluebtn" value="Sell" onClick="sellPage();">
  <div class="blokbox" id="pnlSearch" style="display:none;">
    <div class="blokcontent">
      <form action="mobile.php" method="get">
        <input type="hidden" name="action" value="searchresults">
        <table border=0 cellpadding="0" cellspacing="0" width="100%">
          <tr align="center">
            <td><input name="searchtext" type="text" class="mobinput" placeholder="Keywords 关键词"></td>
          </tr>
          <tr align="center">
            <td><select name="state" class="mobinput">
                <option value="">State 生意所在地</option>
                <option value="NSW">NSW 新南威尔士州</option>
                <option value="VIC">VIC 维多利亚州</option>
                <option value="QLD">QLD 昆士兰州</option>
                <option value="WA">WA 西澳大利亚</option>
                <option value="SA">SA 南澳大利亚</option>
                <option value="NT">NT 北领地</option>
                <option value="ACT">ACT 堪培拉</option>
                <option value="TAS">TAS 塔斯马尼亚</option>
              </select></td>
          </tr>
          <tr align="center">
            <td><select name="pclass" class="mobinput">
                <option value="">Type 业务种类</option>
                <option value="1" title="Accomodation">Accomodation 住宿 </option>
                <option value="2" title="Advertising">Advertising 广告 </option>
                <option value="3" title="Automotive">Automotive 汽车/机械 </option>
                <option value="4" title="Beauty/Massage">Beauty 美容/按摩 </option>
                <option value="5" title="Education/Training">Education 教育 </option>
                <option value="6" title="Entertainment/Video/KTV">Entertainment 娱乐/媒体制作/KTV </option>
                <option value="7" title="Duty Free">Duty Free 免税商铺 </option>
                <option value="8" title="Financial">Finance 财经 </option>
                <option value="9" title="Fashion/Clothing/Shoes">Fashion 时装/成衣/零售 </option>
                <option value="10" title="Fast Food/Restaurant/Cafe">Food 食品/餐馆/咖啡馆 </option>
                <option value="11" title="Franchise">Franchise 特许经营连锁店 </option>
                <option value="12" title="Gaming and Internet Cafe">Internet 博彩业/网吧 </option>
                <option value="13" title="Health Food">Health Food 健康食品/保健品 </option>
                <option value="14" title="Home/Garden">Home and Garden 家居 </option>
                <option value="15" title="Insurance">Insurance 保险 </option>
                <option value="16" title="Import/Export">Import Export 进出口 </option>
                <option value="17" title="Industrial/Manufacturing">Industrial 工业/制造业 </option>
                <option value="18" title="Medical">Medical 医药 </option>
                <option value="19" title="Media and Newspaper">Media 媒体/报纸 </option>
                <option value="20" title="Professional services">Pro Services 专业服务 </option>
                <option value="21" title="Retail">Retail 零售 </option>
                <option value="22" title="Services">Services 服务 </option>
                <option value="23" title="Real Estate">Real Estate 房地产 </option>
                <option value="24" title="Tourism">Tourism 旅游业 </option>
                <option value="25" title="Translation">Translation 翻译 </option>
                <option value="26" title="Transportation">Transport 交通运输 </option>
                <option value="27" title="Other">Other 其他 </option>
              </select></td>
          </tr>
          <tr align="center">
            <td><select name="price-max" class="mobinput">
                <option value="100000">&lt; $100,000</option>
                <option value="250000">&lt; $250,000</option>
                <option value="500000">&lt; $500,000</option>
                <option value="750000">&lt; $750,000</option>
                <option value="1000000">$1,000,000 +</option>
                <option value="5000000000000" selected title="Business Value">Value 价钱</option>
              </select></td>
          </tr>
          <tr align="center">
            <td align="center"><input type="submit" class="mobutton" value="Go 搜索">
            <td>
          </tr>
        </table>
      </form>
    </div>
    <div class="blokfooter">
      <div>&nbsp;</div>
    </div>
  </div>
  <div id="pnlListings">
    <table cellspacing="5" width="340">
      <tbody>      
<?

$searchResultsInfo = "";

$sql = "select listingsdb_id, listingsdb_title, listingsdb_last_modified from default_en_listingsdb where listingsdb_active = 'yes'";

if($parAction == "searchresults"){
	$sql .= " and listingsdb_id in (select listingsdb_id from default_en_listingsdbelements where listingsdb_id > 0";
	if(!empty($parState)){
		$sql .= " and listingsdbelements_field_name = 'state' and listingsdbelements_field_value = '$parState'";
	}
	if(!empty($parType)){
		$sql .= " and listingsdbelements_field_name = 'property_class' and listingsdbelements_field_value = '$parType'";
	}
	$sql .= ")";
	$searchResultsInfo .= '<tr><td>Searching for Matching Listings..</td></tr>';
}

$sql .= " order by RAND() limit 12";
displayMobileListings($sql);

/*
$sql = "select listingsdb_id, listingsdb_title from default_en_listingsdb where listingsdb_active = 'yes' order by listingsdb_last_modified asc limit 6";
displayMobileListings($sql);
*/

?>      
      
      </tbody>
    </table>
  </div>  
</div>

<img src="http://seeaustralia.mobi/img/logo_CDMC.png"> <br />
©2015 Chinese Digital Media Corporation


</body>
</html>
<!-- This page was generated in 0.207 seconds -->
