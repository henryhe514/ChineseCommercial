<?php // $Revision: 3865 $

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







// Settings help translation strings

$GLOBALS['phpAds_hlp_dbhost'] = "

        ���� �� ���� ����� �� ���� ������� �� ".$phpAds_dbmsname." ������ ��� ���� ������";

		

$GLOBALS['phpAds_hlp_dbport'] = "

        ���� �� ���� ����� (port) �� ���� ������� ".$phpAds_dbmsname." ����� ��� ���� ������. ����� ����� �� ���� ".$phpAds_dbmsname." ��� <i>".

		($phpAds_dbmsname == 'MySQL' ? '3306' : '5432')."</i>.

		";

				

$GLOBALS['phpAds_hlp_dbuser'] = "

        ���� �� �� ������ �� ��� ������� �� ".$phpAds_productname." ����� ������ ��� ������ �".$phpAds_dbmsname." .

		";

		

$GLOBALS['phpAds_hlp_dbpassword'] = "

        ���� �� ������ ��� ".$phpAds_productname." ����� ������ ��� ������ �".$phpAds_dbmsname." .

		";

		

$GLOBALS['phpAds_hlp_dbname'] = "

        ���� �� �� ���� ������� ��� ".$phpAds_productname." ����� �� ������� ���. ���� ����� ������� ��� ��� ���� �� ����. ".$phpAds_productname." <b>��</b> ����� ���� ������ �� ��� �� ����.";

		

$GLOBALS['phpAds_hlp_persistent_connections'] = "

        ������ ������ ����� ���� ����� �� ".$phpAds_productname." ����� �������� ������ ������ ������ �� ����. ��� �� ��� ����� �����, ��� ������ ������ ������� ����� �� ���� ���� ����� ������ ����� ���� ���� ��� ����� ������ ����. �� ����� ������ ���� �� ����� ���� ���� ����� ������� ������� �������. �� ".$phpAds_productname." ������ ����� ��� ������, 

����� ����� ����� �� ������� ������.

		";

		

$GLOBALS['phpAds_hlp_insert_delayed'] = "

        ".$phpAds_dbmsname." ����� �� ����� ���� ���� ������ ������. �� �� �� ������ ���� ����, ���� �".$phpAds_productname." ����� ����� ���� ����� ����� ��� ����� ����� ������� ����. �� ������� ������� �����, �� ����� ����� �������� ������ ����� ������ ������ ����� ������� ���� ��� ���� ����.

		";

		

$GLOBALS['phpAds_hlp_compatibility_mode'] = "

      �� �� �� ���� ������ ".$phpAds_productname." �� ���� ����� ���, �� ���� ����� �� ���� �� ��� ������ ���� �������. �� ��� ����� ������ ���� ������ (local mode) ����� �� ����� �������, ".$phpAds_productname." ����� �� ��� ������ ����� ������� ����� ��� ���� ��� ���� �".$phpAds_productname." ������. 

		�� ������ ����� ���� (�� ����) ���� ��� ������ ������ ����.

		";

		

$GLOBALS['phpAds_hlp_table_prefix'] = "

     �� ���� ������� ��� ".$phpAds_productname." ������ ����� �� ��� �������, ����� ������ ������ ����� �������. ��� ��, �� ���� ����� ���� ������ �� ".$phpAds_productname."

 ����� ���� ������, ���� ������ ��������� �������� ��� �����.";

		

$GLOBALS['phpAds_hlp_table_type'] = "

        ".$phpAds_dbmsname." ����� ����� ���� ����. ��� ���� �� �� ������� �������� ��, ����� ������ ������ �� ".$phpAds_productname." ��������. MyISAM ��� ����� ����� ������ ��� ����� �� ".$phpAds_dbmsname.". ����� ����� ���� ��� ������ �� ���� ���.

		";		

		

$GLOBALS['phpAds_hlp_url_prefix'] = "

        ".$phpAds_productname." ����� ���� ���� ��� ������ ���� ��� ����� �����. ���� ����� �� ����� �-URL �� ������� �� ".$phpAds_productname." ������, ������: <i>http://www.your-url.com/".$phpAds_productname."</i>.";

		

$GLOBALS['phpAds_hlp_my_header'] =

$GLOBALS['phpAds_hlp_my_footer'] = "

        ��� ��� ���� ����� �� ����� ����� ������ �� ������ (������: /home/login/www/header.htm) 

       ��� ����� ����� ����� �/�� ����� ��� ���� �� ���� ������.

        ���� ����� ���� �� ��� HTML ������ ��� (���� ��� ����� �-HTML ����� ������ ����� ��� &lt;body> �� &lt;html>).

		";

		

$GLOBALS['phpAds_hlp_content_gzip_compression'] = "

	������ ����� ���� ����	GZIP ����� ���� ������� ������ ����� �� ������ ��� ��� ����� ������ ����.

��� ����� ���, �� ���� ����� ����� ������ ����� PHP 4.0.5 �����, �� ����� GZIP ������.

		";

		

$GLOBALS['phpAds_hlp_language'] = "

       ���� �� ���� ����� ������ ���� ���� ".$phpAds_productname.". ��� �� ���� ���� �������� ������ ������ �� ������ ���������. ��� ��� ��: ��� ���� ����� ��� ���� ��� ����� ����� ���� ���� ������, ������ ��� ����� ����� �� ���� �����.		";

		

$GLOBALS['phpAds_hlp_name'] = "

    ���� �� ��� ���� ���� ������ ������ ��. ���� �� ����� ��� ����� ���� ������ (���� ������). �� ����� �� ���� ��� (����� ����), ����� ����� �� ".$phpAds_productname." ����� ���.

		";

		

$GLOBALS['phpAds_hlp_company_name'] = "

       ��� �� ����� ����� ��������� �-".$phpAds_productname." �����.

		";

		

$GLOBALS['phpAds_hlp_override_gd_imageformat'] = "

        ".$phpAds_productname." ���� ��� ����� �� ������ GD ������ �� ����, ������ ������ ���� ����� ����� ����� ����� �����. ����, ���� ������ �� �� ���� ����� �� ����, ����� ���� ������� �� PHP ���� ������� ����� �� ����� ����� ����.

�� ".$phpAds_productname." ����� ������ �������� �� ����� ������ �����, ��� ���� ����� ����� ��. ��������� ��: none, png, jpeg, gif.

		";

		

$GLOBALS['phpAds_hlp_p3p_policies'] = "

    ��� �-".$phpAds_productname." ����� ������ ����� ������ ���� P3P ���� ���� ������ ��.		";

		

$GLOBALS['phpAds_hlp_p3p_compact_policy'] = "

       ������� ��������� ����� ������ ������ (�����). ������ �������� ���: 'CUR ADM OUR NOR STA NID', ������� �-Internet Explorer ����� 6 ���� �� ������ �-".$phpAds_productname." ���� ��� �����. �� ��� ����, ��� ���� ����� ������ ��� ��� ������ ���� �������� ������� ���� ���.

		";

		

$GLOBALS['phpAds_hlp_p3p_policy_location'] = "

      �� ��� ���� ������ ������� ������ ����, ��� ���� ����� �� ������.

		";

		

$GLOBALS['phpAds_hlp_log_beacon'] = "

	����� (Beacons) ���� ������ ����� ����� ����� �������� ����� ��� ����� ����. �� ��� ����� ����� ��, ".$phpAds_productname." ����� ��������  ��� ������ ������� ������ ��� ���. �� ���� ����� ��, ������� ����� �� �� ������ �� �����. �� ���� �����, ��� �� ���� ����� ������ ��� ��� ����� ����� �� ����.

		";



$GLOBALS['phpAds_hlp_compact_stats'] = "

       ������ ".$phpAds_productname." ���� ����� ����� ������, ��� ����� ���� ���� ����� �� �����, �� �� ����� ����� �� ���� �������. �� ���� ����� ���� ������ ������ ����� ������, ���� ������ �� ���� �� ".$phpAds_productname." ����� �� ������� ���� �� ��������� - ��������� ��������, ��� ������ �������� �� ����� �� ����, �� �� ���� ������ �����. ��������� �������� �� ����� �� ��������� �����. �� ��� ���� ������ ��� ���, ��� ����� ��.		";

		

$GLOBALS['phpAds_hlp_log_adviews'] = "

       ���� ��� �� ������� �������. �� ���� ���� ������ ������ ����� �������, ��� ������ ��.	";

		

$GLOBALS['phpAds_hlp_block_adviews'] = "

	�� ����� ����� ���� �� �����,  ����� ����� �� ��� ".$phpAds_productname." ��� ���. ����� �� ����� ������ ��� ����� ��� ����� ��� ���� ������ ����� ���� ������ ������.������: �� ���� ���� �� �-300 �����, ".$phpAds_productname." ���� ������ �� ���� ����� �� �� ��� �� ���� ���� ���� ���� ���� ����� 5 ����. ����� �� ����� �� �� ������ <i>����� ������ ������ ������</i> ������ ������� ����� ����� �����.

		";

		

$GLOBALS['phpAds_hlp_log_adclicks'] = "

    ���� ��� �� ������� �������, �� ���� ���� ����� ��������� ����� ���� ������ �� ������, ��� ���� ����� ������ ��.		";

		

$GLOBALS['phpAds_hlp_block_adclicks'] = "

	�� ���� ����� ������ �� ���� ����� ����� ��� �� ��� ".$phpAds_productname." 

		��� ���. ����� �� ��� ������ ��� ���� ��� ���� ��� ��� ���� ���� ���� ������ ������ ������ ������. ������: �� ���� ���� �� �-300 �����, ".$phpAds_productname." ���� ������ �� ����� �� ����� �� ���� ����� ����� �-5 ����  ��������. ����� �� ����� �� �� ������ ���� �����.

		";

		

$GLOBALS['phpAds_hlp_log_source'] = "

		�� ��� ����� �������� �� ����� ���� ������ �� �����, ��� �� ���� ����� ���� �� ����� �������, �� ����� ����� ��������� ���� �� ����� ���� �������. �� ��� �� ����� �������� �� �����, �� �� ��� �� ���� ����� �� �����, ��� ���� ����� ���� ������ ��.

		";



$GLOBALS['phpAds_hlp_geotracking_stats'] = "

		�� ��� ����� ����� ��������, ��� ���� �� ����� �� ����� �������� ����� �������. �� ����� ������ ��, ���� ����� ��������� ����� ����� ���� ������ �������, ����� �� ���� ����� ������ ������.

		������ �� ���� �� �� ��� ����� ���������� ��������� (������, verbose).

		";

				

$GLOBALS['phpAds_hlp_log_hostname'] = "

		�� ��� ���� ����� �� �� ���� �� ����� �-IP �� �� ���� ���� ����������, ��� ���� ����� ������ ��. ������ ����� ����� �� ����� ���� ��� ����� ��� ���� ������. ������ �� ������ �� ������ ��������� ��������� (verbose).

		";

		

$GLOBALS['phpAds_hlp_log_iponly'] = "

		����� �� ����� ������ �� ����� ����� ���� �� ����� �������. �� ��� ����� ����� ��,  ".$phpAds_productname." ����� ����� ���� ����� ������/����, �� ����� ����� ���� ���� �-IP ����. ������ �� ���� ������ �� �� ������ ���� ����� ���� ���� �� ".$phpAds_productname.", ����� ������ �� ����� �- ����� ����.

		";

				

$GLOBALS['phpAds_hlp_reverse_lookup'] = "

		�� ������ ���� ���� ��� ��� �� ����, �� ������ ������� ������ �� �����. �� ��� ���� ������ �� �� ������ ���� ������ ������ �/�� ����� ��������� ����� ���� ��, ����� ���� ����� �� �����, ���� ����� ������ ��. ����� �� ������ ���� ��� ���; ����� ���� �� ����� �������.

		";

		

		

$GLOBALS['phpAds_hlp_proxy_lookup'] = "

	���� ������ �������� ���� ������ (proxy) ����� �������� ����. ����� �� ".$phpAds_productname." ����� �� ����� �-IP �� ��� �� ��� ������� ����� �� �� �����. �� ����� ����� ��, ".$phpAds_productname." ���� ����� �� ����� �-IP �� ����� ������ ������� ��� �������. �� ��� ������ ����� �� ������ ������� �� �����, ��� ����� ������ �� ������� ����� ���. ������ �� ���� ������ ������ ����, ����� ���� ���� �� ����� ������.

		";





$GLOBALS['phpAds_hlp_auto_clean_tables'] = 	"";

$GLOBALS['phpAds_hlp_auto_clean_tables_interval'] = "

		�� ������ �� ������, ���������� ������ ����� �������� ���� ��� ���� ����� ���. ������, �� ���� 5 ������, ��������� ���� ���� �-5 ������ ����� ��������

		";

$GLOBALS['phpAds_hlp_auto_clean_userlog'] = 	"";	

$GLOBALS['phpAds_hlp_auto_clean_userlog'] = 

$GLOBALS['phpAds_hlp_auto_clean_userlog_interval'] = "

		������ �� ���� �������� ����� ���� ����� ���� ��� ���� ����� ������� ����� ���.

		";



$GLOBALS['phpAds_hlp_geotracking_type'] = "

		����� �������� �� ".$phpAds_productname." ����� �� ����� �-IP �� ����� ����� ��������. ������ �� ���� �� ���� ����� ������ ������ �� ����� ���� ���� ����� ����� ������ ����� ������ �� ������. �� ������ ����� ���, �� ����� ����� ��� �� ���� ������ ������. ".$phpAds_productname." ����� ��� ������ ������� �� IP2Country 

		�-<a href='http://www.maxmind.com/?rId=phpadsnew2' target='_blank'>GeoIP</a>.

		";

		

$GLOBALS['phpAds_hlp_geotracking_location'] = "

		������ ����� ��� �� ������ ����� GeoIP �� Apache, ����� ������ �-".$phpAds_productname." t���� ���� ���� ������� ������ ��������. ����� ���� ������ �� ���� ���� ������� ����� ����, ���� ������ ����� ������ ����� ���� ��.

		";

		

$GLOBALS['phpAds_hlp_geotracking_cookie'] = "

		���� ����� �-IP ������ �������� ����� ���. ��� ����� �-".$phpAds_productname." ���� ��� ��� ��� ����� �����, ���� ����� �� ����� �����. ��� ���� ����� ����, ".$phpAds_productname." ����� ����� �� ����� ����� ���� ������.

		";

				

$GLOBALS['phpAds_hlp_ignore_hosts'] = "

      �� ���� ���� ����� ������ ������� ���� ���� �����, ��� ���� ������ ���� ����� ���. �� ������ ����� ����� ���� (Reverse lookup) ���� ������ �� ���� ������ IP,  ���� ���� ������ �� ������ IP. ���� ������ �� ������ ������� (wildcards ��� ���� '*.altavista.com' �� '192.168.*').

		";

		

$GLOBALS['phpAds_hlp_begin_of_week'] = "

      ���� ��� ������� ����� ����� ���� ���, ����� ��������/������ ������� ���� �����, ���� ����� ����� ���.	";

		

$GLOBALS['phpAds_hlp_percentage_decimals'] = "

        ���� ��� ����� ���� ������ ����� ������ ������ ����������.

		";

		

$GLOBALS['phpAds_hlp_warn_admin'] = "

        ".$phpAds_productname." ����� ����� ������ �� ������� ���� ���� ���� �� ������ �� ������ �������. �� ����� ������ ����.

		";

		

$GLOBALS['phpAds_hlp_warn_client'] = "

        ".$phpAds_productname." ����� ����� ������ ������ �� ��� ��������� ��� ���� ����� ������ �� ������ �� ������. ���� �� ����� ������ ����.		";

		

$GLOBALS['phpAds_hlp_qmail_patch'] = "

		��� ������� �� qmail ������ ���, ��� ���� ������� ����� ����	".$phpAds_productname." ����� �� ������� ���� ��� �����. �� ����� ����� ��, ".$phpAds_productname." ���� ������ ������ ����� ������� qmail.

		";

		

$GLOBALS['phpAds_hlp_warn_limit'] = "

       ��� �����".$phpAds_productname." ����� ����� ������ ����� �������. ���� �� ���� �� 100 ������ ����.	";



$GLOBALS['phpAds_hlp_allow_invocation_plain'] = 

$GLOBALS['phpAds_hlp_allow_invocation_js'] = 

$GLOBALS['phpAds_hlp_allow_invocation_frame'] = 

$GLOBALS['phpAds_hlp_allow_invocation_xmlrpc'] = 

$GLOBALS['phpAds_hlp_allow_invocation_local'] = 

$GLOBALS['phpAds_hlp_allow_invocation_interstitial'] = 

$GLOBALS['phpAds_hlp_allow_invocation_popup'] = "

		������ ��� ������� ����� �� ��� ������ �� ������. �� ��� ����� ������ ���� �����, ��� �� ���� ���� ������� ����� ����� ����. ����: ����� ������ ����� ����� �� �� ������� - �� �� �� ������ ������ ���� ���� �����.	";

		

$GLOBALS['phpAds_hlp_con_key'] = "

        ".$phpAds_productname." ����� ����� ����� ����, ����� ����� ������ �����. ������ ������ ���� ������ ������. ������� ������ �� ���� ������ ����� ���� �����. ����� ������ ����.		";

		

$GLOBALS['phpAds_hlp_mult_key'] = "

     �� ��� ����� ������ ����� ������ ������, ���� ����� ���� ���� ��� �� ���� ���� �� ����. ������ �� ����� ����� �� ��� ���� ����� ���� ����� ���. ������ ������ ����.	";

		

$GLOBALS['phpAds_hlp_acl'] = "

      �� ��� �� ����� ������� ����, ���� ������ ������ ��. �� ���� �� ".$phpAds_productname." ����.

		";

		

$GLOBALS['phpAds_hlp_default_banner_url'] = "";

$GLOBALS['phpAds_hlp_default_banner_target'] = "

       �� ".$phpAds_productname." �� ����� ������ ����� �������, �� ����� ����� ���� ���� ���, ������ - �� ���� ������� ��� �� ����, ��� �� ���� �����. �� ������� �������� ����� ���� �����, ��� ���� ������ ���� ������ ���. ����� ������� ��� �� ����� ������ ����� �� �����, ��� ���� �� ����� �� �� ����� ������ ������ ����� �������. ������ �� ����� ������ ����.";

		

$GLOBALS['phpAds_hlp_delivery_caching'] = "

		���� ������ ����� ������, ".$phpAds_productname." ������ ������ ����� ����� �� �� ����� ����� ������ ����� �����. ����� ������ �� ���� ����� ������� ������ ����, �� ������ ����� ���� ���� ����� ����� ���� ����� �� ������ ������ ����� ����� ��� ����� �����, ����� ����� �� ��. ����� ��� ���� �� ����� ������ ���� �������� ������ �����.

		";



		

$GLOBALS['phpAds_hlp_type_sql_allow'] = "";

$GLOBALS['phpAds_hlp_type_web_allow'] = "";

$GLOBALS['phpAds_hlp_type_url_allow'] = "";

$GLOBALS['phpAds_hlp_type_html_allow'] = "";

$GLOBALS['phpAds_hlp_type_txt_allow'] = "

        ".$phpAds_productname." ����� ������ ������ ����� �� ������ ������ ���� ������ �����. ��� �������� �������� ������ ������� ����� �� ����. ��� ���� ������ ����� ����� ������ ���� �-".$phpAds_productname." ����� ���� ����� ������� ���� SQL �� ���� ������ ����. ���� ������ �� ����� ������� ���� ������ �� ���� HTML ����� ����.		";

		

$GLOBALS['phpAds_hlp_type_web_mode'] = "

  �� ��� ���� ������ ������� ��������� �� ����, ���� ���� �� ������ ���. �� ��� ���� ����� �� ������� ������ ������, ��� ������ �� �<i>����� ������</i>. �� ��� ���� ����� �� ����� �� ��� ����� (FTP) ������, ��� ������ �� �<i>��� FTP �����</i>. ������ ������� ���� ����� ������ �������� FTP ����� �� ���� ������.

		";

		

$GLOBALS['phpAds_hlp_type_web_dir'] = "

       ���� �� ������� ������ ".$phpAds_productname." ����� ������ �� ����� �����. ������ �� ����� ����� ���� ����� ������ �� ��� PHP, ��� ���� ���� ���� ����� �� ����� ����� ������� (chmod) ���� ����� ���. ������� ������ ����� ����� ������ ������� �� ���� (����� ����), ������ ����� ����� ������ ���� ������ ���� ����. ��� �� ����� �� ���� ������ (���� ���� [/]). ��� ���� ����� ������ �� �� �� ���� �� ���� ������� �<i>����� ������</i>.

		";

		

$GLOBALS['phpAds_hlp_type_web_ftp_host'] = "

	�� ���� �� ���� ������� �<i>��� FTP ������</i> ���� ����� �� ����� �-IP �� �� ����� (������) �� ��� �-FTP ����� �-".$phpAds_productname." ����� ������ �� ������� ������.	";

      

$GLOBALS['phpAds_hlp_type_web_ftp_path'] = "

	�� ���� �� ���� ������� �<i>��� FTP ������</i> ���� ����� �� ������� �� ���� ���, ���� �".$phpAds_productname." ����� ������ �� ������� ������.	";

      

$GLOBALS['phpAds_hlp_type_web_ftp_user'] = "

		�� ���� �� ���� ������� �<i>��� FTP ������</i> ���� ����� �� �� ������ ��� ".$phpAds_productname." ����� ������ ��� ������ ���� �-FTP �������.

		";

      

$GLOBALS['phpAds_hlp_type_web_ftp_password'] = "

		�� ���� �� ���� ������� �<i>��� FTP ������</i> ���� ����� �� ������ ��� ".$phpAds_productname." ����� ������ ��� ������ ���� �-FTP �������.";

      

$GLOBALS['phpAds_hlp_type_web_url'] = "

       �� ��� ����� �� ������� �� ��� �������, ".$phpAds_productname." ����� ���� ���� �����  URL ������� ����� ������� ������ ����. �� �� ����� ���� ����  (/).";

		

$GLOBALS['phpAds_hlp_type_html_auto'] = "

       �� ������ �� ����� ".$phpAds_productname." ���� �������� �� ��� ������� ����  HTML ��� ����� ����� ������. ����� ���, ���� ���� ����� ������ �� �� ���� ���� �� �� ����.";

		

$GLOBALS['phpAds_hlp_type_html_php'] = "

      ���� ����� �".$phpAds_productname." ������ ��� PHP ������ ���� ���� ���� HTML. ������ �� ����� ������ ����.";

		

$GLOBALS['phpAds_hlp_admin'] = "

       �� ������ �� ������ (������������). ������� �� �� ���� ������ ����� ������.";

		

$GLOBALS['phpAds_hlp_pwold'] = 

$GLOBALS['phpAds_hlp_pw'] = 

$GLOBALS['phpAds_hlp_pw2'] = "

       ��� ����� �� ������ �� �����, ���� ���� �� ������ ������ �����. �����, ����� ����� �� ������ ����� ������, ���� ������ ������.";

		

$GLOBALS['phpAds_hlp_admin_fullname'] = "

        ���� �� ��� ���� �� ������/����. ��� �� ����� ����� ������ ��������� �������.	";

		

$GLOBALS['phpAds_hlp_admin_email'] = "

      ����� ������� �� ������/����. �� ������ ������ ���� (�-)  ������ ����������� �������.";

		

$GLOBALS['phpAds_hlp_admin_email_headers'] = "

      ��� ���� ����� �� ����� ������� ��� ".$phpAds_productname." ������ ������ ������.";

		

$GLOBALS['phpAds_hlp_admin_novice'] = "

      �� ��� ���� ���� ����� ���� ����� �����/��, ������ �� ������, ��� ������ ��.	";

		

$GLOBALS['phpAds_hlp_client_welcome'] = 

$GLOBALS['phpAds_hlp_client_welcome_msg'] = "

     �� ����� ����� ��, ���� ����� ����� ����� ������ ��� ����� ���� ��� ������ ������. ��� ���� ������ ���� ����� ������ �� ��� ����� ����� 'welcome.html' ����� ������� 'admin/templates'. ���� ����� ����� �� �� �� �����, ���, ����� ���, ����� ������ ������ ������.";

		

$GLOBALS['phpAds_hlp_updates_frequency'] = "

		�� ��� ���� ����� ��� ���� ����� ���� �� ".$phpAds_productname." ��� ���� ����� ������� ��. ���� ����� �� �������� ���� ����� ��� �����, ���  ".$phpAds_productname." ���� ������� ���� ��������. �� ����� ����� ����, ����� ����� ���� �� ����� �����.";

		

$GLOBALS['phpAds_hlp_userlog_email'] = "

	�� ��� ���� ����� ���� �� ������� ����� ������� ".$phpAds_productname." ��� ���� ����� ������� ��. ������ ������� ������ ������ ������.	";

		

$GLOBALS['phpAds_hlp_userlog_priority'] = "

		��� ����� ������� ��������� ���� �����, ��� ���� ����� ��� ����� ������ ����� ��� ���. ���� ���� �� ������� ����� ���� ������ ������ ��� ����. ����� ���� ����� ������ �� ��� ���� ����� ���� ������ ����� ��� ����� ������ ����� ���������. ������ ������ ���� ����� ������.	";



$GLOBALS['phpAds_hlp_userlog_autoclean'] = "

		��� ������ ����� ������� ���� �����, ���� ����� ����� ����� �� ���� ����� ����� ��. ���� �� ���� ����� ������.

		";

			

$GLOBALS['phpAds_hlp_default_banner_weight'] = "

		�� ��� ���� ������ ����� ���� ������ ���� ����, ��� ���� ����� �� �� ���. ����� ����� ��� 1.";

		

$GLOBALS['phpAds_hlp_default_campaign_weight'] = "

		�� ��� ���� ������ ����� ������ ������ ���� ����, ��� ���� ����� �� ����� ������ ���. ����� ����� ��� 1.	";

		

$GLOBALS['phpAds_hlp_gui_show_campaign_info'] = "

		�� ������ �� ������, ���� ���� ���� �� ������ ���� ����� <i>����� ������</i> . ���� ���� �� ���� �� ���� ������� �������, ����� ������ ������� ���������.";

		

$GLOBALS['phpAds_hlp_gui_show_banner_info'] = "

		�� ������ �� �����, ���� ���� ����� �� ���� ���� ����� <i>����� ������</i> . ���� ���� �� ���� �� ���� ����� (���� ����� ����� ���� ����), ����� ����, ���� ����� ������.";

		

$GLOBALS['phpAds_hlp_gui_show_campaign_preview'] = "

	�� ������ �� ������ ����� �� ������� ����� ����� ����� <i>����� ������</i> . �� ������� �����, ����� ���� ���� ����� ��� ���� �� ��� ����� �� ������ ����� ���� ����� <i>����� ������</i>.

		";

		

$GLOBALS['phpAds_hlp_gui_show_banner_html'] = "

		�� ������ �� ����� ���� ���� HTML ����� ��������, ���� ����� ��� HTML ����. ������ �� ����� ������ ���� ����� ������� ���� HTML ������ ������ �� ���� ������. �� ������ �� ����� ����� ����� ����� ����� HTML ���� ������� ����� �� ����� <i>��� ����</i> ����� ���� �-HTML.";

		

$GLOBALS['phpAds_hlp_gui_show_banner_preview'] = "

		�� ������ �� ����� ���� ���� ������ ��  ������� <i>������ �����</i>, 

		<i>������� �����</i> �-<i>������ �������</i>. �� ������ �� ������, ����� ���� ����� ����� ������� ����� �� ����� <i>��� ����</i> ������ �������.";

		

$GLOBALS['phpAds_hlp_gui_hide_inactive'] = "

	�� ������ �� ����� �� ������� ����� ������, ��������� ���������, ������ ������� ������� <i>������� �������</i> �-<i>����� ������</i>. �� ������� �� �����, ����� ����� ����� ������� �������� ������� ����� �� ����� <i>��� ���</i> ������� �������	";



$GLOBALS['phpAds_hlp_gui_show_matching'] = "

		�� ������ �� �����, ����� ����� ����� ����� <i>������ �������</i> , ��  <i>����� ������</i> ��� ����� ������. �� ����� ����� ������ ��� ������ ������� ������ �� ��������� �������. ���� ���� �� ����� ������ ����� �� ������� �������.

		";

		

$GLOBALS['phpAds_hlp_gui_show_parents'] = "

		�� ������ �� �����, ��������� ������� �� ������� ����� ����� <i>������ �������</i>, �� <i>����� ����</i> ��� ����� ������. �� ����� ����� ����� ���� �� ���� ���� ������. �� ���� �� �������� ������� ���� ������-�� ���� �� ������ ���� �������.

		";



$GLOBALS['phpAds_hlp_gui_link_compact_limit'] = "

		������ ���� �� ������� ���������� ������� ������ �����<i>������ �������</i>.

	����� ����� �� ���� ����� ���� ���� (�� �� �� ������ ����), ������ �� ������ ����� ���� ���� �� ������ �����.

		";

					

?>