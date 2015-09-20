<?php
			/**
			 * Open-Realty
			 *
			 * Open-Realty is free software; you can redistribute it and/or modify
			 * it under the terms of the Open-Realty License as published by
			 * Transparent Technologies; either version 1 of the License, or
			 * (at your option) any later version.
			 *
			 * Open-Realty is distributed in the hope that it will be useful,
			 * but WITHOUT ANY WARRANTY; without even the implied warranty of
			 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
			 * Open-Realty License for more details.
			 * http://www.open-realty.org/license_info.html
			 *
			 * You should have received a copy of the Open-Realty License
			 * along with Open-Realty; if not, write to Transparent Technologies
			 * RR1 Box 162C, Kingsley, PA  18826  USA
			 *
			 * @author Ryan C. Bonham <ryan@transparent-tech.com>
			 * @copyright Transparent Technologies 2004
			 * @link http://www.open-realty.org Open-Realty Project
			 * @link http://www.transparent-tech.com Transparent Technologies
			 * @link http://www.open-realty.org/license_info.html Open-Realty License
			 */
				$config = array();
				global $config;
				global $db_type;
				$db_type = "mysql";
				$db_user = "salutist_orlt1";
				$db_password = "b9u7lPD2JWkG";
				$db_database = "salutist_orlt1";
				$db_server = "localhost";
				$sf_phys_path = "/home2/salutist/public_html/SouFun";
				$config["table_prefix_no_lang"] = "default_";
				// this is the setup for the ADODB library
				include_once($sf_phys_path."/include/class/adodb/adodb.inc.php");
				include_once($sf_phys_path."/include/misc.inc.php");
				$misc = new misc();
				$conn = &ADONewConnection($db_type);
				$conn->PConnect($db_server, $db_user, $db_password, $db_database);
				$sql = "SELECT * FROM ".$config["table_prefix_no_lang"]."controlpanel";
				$recordSet = $conn->Execute($sql);
				if (!$recordSet)
				{
					echo("Unable to retrieve control panel settings");die;
				}
				// Loop throught Control Panel and save to Array
				$config["version"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_version"]);
				$config["basepath"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_basepath"]);
				$config["baseurl"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_baseurl"]);
				$config["admin_name"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_admin_name"]);
				$config["admin_email"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_admin_email"]);
				$config["site_email"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_site_email"]);
				$config["company_name"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_company_name"]);
				$config["company_location"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_company_location"]);
				$config["company_logo"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_company_logo"]);
				$config["automatic_update_check"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_automatic_update_check"]);
				$config["url_style"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_url_style"]);
				$config["seo_default_keywords"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_default_keywords"]);
				$config["seo_default_description"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_default_description"]);
				$config["seo_listing_keywords"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_listing_keywords"]);
				$config["seo_listing_description"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_listing_description"]);
				$config["seo_default_title"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_default_title"]);
				$config["seo_listing_title"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_listing_title"]);
				$config["seo_url_seperator"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_seo_url_seperator"]);
				if (isset($_SESSION["template"]))
					{
						$config["template"] = $_SESSION["template"];
					} else {
						$config["template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_template"]);
					}
				$config["admin_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_admin_template"]);
				$config["listing_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_listing_template"]);
				$config["agent_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_template"]);
				$config["template_listing_sections"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_template_listing_sections"]);
				$config["search_result_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_search_result_template"]);
				$config["vtour_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vtour_template"]);
				$config["lang"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_lang"]);
				$config["listings_per_page"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_listings_per_page"]);
				$config["search_step_max"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_search_step_max"]);
				$config["max_search_results"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_search_results"]);
				$config["add_linefeeds"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_add_linefeeds"]);
				$config["strip_html"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_strip_html"]);
				$config["allowed_html_tags"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allowed_html_tags"]);
				$config["money_sign"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_money_sign"]);
				$config["show_no_photo"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_no_photo"]);
				$config["number_format_style"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_number_format_style"]);
				$config["number_decimals_number_fields"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_number_decimals_number_fields"]);
				$config["number_decimals_price_fields"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_number_decimals_price_fields"]);
				$config["money_format"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_money_format"]);
				$config["date_format"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_date_format"]);
				$date_format[1] = "mm/dd/yyyy";
				$date_format[2] = "yyyy/dd/mm";
				$date_format[3] = "dd/mm/yyyy";
				$date_format_timestamp[1] = "m/d/Y";
				$date_format_timestamp[2] = "Y/d/m";
				$date_format_timestamp[3] = "d/m/Y";
				$config["date_format_long"] = $date_format[$config["date_format"]];
				$config["date_format_timestamp"] = $date_format_timestamp[$config["date_format"]];
				$config["max_listings_uploads"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_uploads"]);
				$config["max_listings_upload_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_upload_size"]);
				$config["max_listings_upload_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_upload_width"]);
				$config["max_listings_upload_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_upload_height"]);
				$config["max_user_uploads"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_user_uploads"]);
				$config["max_user_upload_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_user_upload_size"]);
				$config["max_user_upload_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_user_upload_width"]);
				$config["max_user_upload_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_user_upload_height"]);
				$config["max_vtour_uploads"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_vtour_uploads"]);
				$config["max_vtour_upload_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_vtour_upload_size"]);
				$config["max_vtour_upload_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_vtour_upload_width"]);
				$config["allowed_upload_extensions"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allowed_upload_extensions"]);
				$config["make_thumbnail"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_make_thumbnail"]);
				$config["thumbnail_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_thumbnail_width"]);
				$config["gdversion2"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_gd_version"]);
				$config["thumbnail_prog"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_thumbnail_prog"]);
				$config["path_to_imagemagick"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_path_to_imagemagick"]);
				$config["resize_img"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_resize_img"]);
				$config["jpeg_quality"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_jpeg_quality"]);
				$config["use_expiration"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_use_expiration"]);
				$config["days_until_listings_expire"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_days_until_listings_expire"]);
				$config["allow_member_signup"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allow_member_signup"]);
				$config["allow_agent_signup"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allow_agent_signup"]);
				$config["agent_default_active"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_active"]);
				$config["agent_default_admin"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_admin"]);
				$config["agent_default_feature"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_feature"]);
				$config["agent_default_moderate"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_moderate"]);
				$config["agent_default_logview"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_logview"]);
				$config["agent_default_edit_site_config"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_site_config"]);
				$config["agent_default_edit_member_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_member_template"]);
				$config["agent_default_edit_agent_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_agent_template"]);
				$config["agent_default_edit_listing_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_listing_template"]);
				$config["agent_default_canChangeExpirations"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_canchangeexpirations"]);
				$config["agent_default_editpages"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_editpages"]);
				$config["agent_default_havevtours"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_havevtours"]);
				$config["agent_default_num_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_num_listings"]);
				$config["agent_default_num_featuredlistings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_num_featuredlistings"]);
				$config["agent_default_can_export_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_can_export_listings"]);
				$config["agent_default_edit_all_users"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_all_users"]);
				$config["agent_default_edit_all_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_all_listings"]);
				$config["agent_default_edit_property_classes"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_edit_property_classes"]);
				$config["moderate_agents"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_moderate_agents"]);
				$config["moderate_members"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_moderate_members"]);
				$config["moderate_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_moderate_listings"]);
				$config["export_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_export_listings"]);
				$config["email_notification_of_new_users"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_email_notification_of_new_users"]);
				$config["email_information_to_new_users"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_email_information_to_new_users"]);
				$config["email_notification_of_new_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_email_notification_of_new_listings"]);
				$config["allowed_upload_types"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allowed_upload_types"]);
				$config["configured_langs"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_configured_langs"]);
				$config["configured_show_count"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_configured_show_count"]);
				$config["sortby"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_search_sortby"]);
				$config["sorttype"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_search_sorttype"]);
				$config["special_sortby"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_special_search_sortby"]);
				$config["special_sorttype"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_special_search_sorttype"]);
				$config["email_users_notification_of_new_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_email_users_notification_of_new_listings"]);
				$config["num_featured_listings"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_num_featured_listings"]);
				$config["map_type"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_map_type"]);
				$config["map_address"] =$misc->make_db_unsafe($recordSet->fields["controlpanel_map_address"]);
				$config["map_address2"] =$misc->make_db_unsafe($recordSet->fields["controlpanel_map_address2"]);
				$config["map_address3"] =$misc->make_db_unsafe($recordSet->fields["controlpanel_map_address3"]);
				$config["map_address4"] =$misc->make_db_unsafe($recordSet->fields["controlpanel_map_address4"]);
				$config["map_city"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_map_city"]);
				$config["map_state"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_map_state"]);
				$config["map_zip"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_map_zip"]);
				$config["map_country"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_map_country"]);
				$config["wysiwyg_editor"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_wysiwyg_editor"]);
				$config["wysiwyg_execute_php"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_wysiwyg_execute_php"]);
				$config["show_listedby_admin"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_listedby_admin"]);
				$config["show_next_prev_listing_page"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_next_prev_listing_page"]);
				$config["show_notes_field"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_notes_field"]);
				$config["multiple_pclass_selection"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_multiple_pclass_selection"]);
				$config["vtour_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vtour_width"]);
				$config["vtour_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vtour_height"]);
				$config["vtour_fov"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vtour_fov"]);
				$config["vt_popup_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vt_popup_width"]);
				$config["vt_popup_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vt_popup_height"]);
				$config["zero_price"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_zero_price"]);
				$config["vcard_phone"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_phone"]);
				$config["vcard_fax"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_fax"]);
				$config["vcard_mobile"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_mobile"]);
				$config["vcard_address"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_address"]);
				$config["vcard_city"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_city"]);
				$config["vcard_state"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_state"]);
				$config["vcard_zip"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_zip"]);
				$config["vcard_country"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_country"]);
				$config["vcard_url"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_url"]);
				$config["vcard_notes"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_vcard_notes"]);
				$config["demo_mode"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_demo_mode"]);
				$config["feature_list_separator"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_feature_list_separator"]);
				$config["search_list_separator"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_search_list_separator"]);
				$config["use_email_image_verification"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_use_email_image_verification"]);
				$config["rss_title_featured"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_title_featured"]);
				$config["rss_desc_featured"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_desc_featured"]);
				$config["rss_listingdesc_featured"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_listingdesc_featured"]);
				$config["rss_title_lastmodified"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_title_lastmodified"]);
				$config["rss_desc_lastmodified"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_desc_lastmodified"]);
				$config["rss_listingdesc_lastmodified"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_listingdesc_lastmodified"]);
				$config["rss_limit_lastmodified"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_limit_lastmodified"]);
				$config["resize_by"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_resize_by"]);
				$config["resize_thumb_by"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_resize_thumb_by"]);
				$config["thumbnail_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_thumbnail_height"]);
				$config["charset"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_charset"]);
				$config["wysiwyg_show_edit"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_wysiwyg_show_edit"]);
				$config["textarea_short_chars"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_textarea_short_chars"]);
				$config["main_image_display_by"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_main_image_display_by"]);
				$config["main_image_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_main_image_width"]);
				$config["main_image_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_main_image_height"]);
				$config["number_columns"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_number_columns"]);
				$config["rss_limit_featured"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_rss_limit_featured"]);
				$config["force_decimals"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_force_decimals"]);
				$config["max_listings_file_uploads"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_file_uploads"]);
				$config["max_listings_file_upload_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_listings_file_upload_size"]);
				$config["allowed_file_upload_extensions"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_allowed_file_upload_extensions"]);
				$config["file_icon_width"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_icon_image_width"]);
				$config["file_icon_height"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_icon_image_height"]);
				$config["show_file_icon"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_file_icon"]);
				$config["file_display_option"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_file_display_option"]);
				$config["file_display_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_file_size"]);
				$config["agent_default_havefiles"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_havefiles"]);
				$config["agent_default_haveuserfiles"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_agent_default_haveuserfiles"]);
				$config["max_users_file_uploads"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_users_file_uploads"]);
				$config["max_users_file_upload_size"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_max_users_file_upload_size"]);
				$config["disable_referrer_check"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_disable_referrer_check"]);
				$config["price_field"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_price_field"]);
				$config["users_per_page"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_users_per_page"]);
				$config["use_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_use_help_link"]);
				$config["main_admin_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_main_admin_help_link"]);
				$config["add_listing_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_add_listing_help_link"]);
				$config["edit_listing_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_help_link"]);
				$config["edit_user_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_user_help_link"]);
				$config["user_manager_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_user_manager_help_link"]);
				$config["page_editor_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_page_editor_help_link"]);
				$config["modify_listing_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_modify_listing_help_link"]);
				$config["edit_listing_images_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_images_help_link"]);
				$config["edit_vtour_images_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_vtour_images_help_link"]);
				$config["edit_listing_files_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_files_help_link"]);
				$config["edit_agent_template_add_field_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_agent_template_add_field_help_link"]);
				$config["edit_agent_template_field_order_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_agent_template_field_order_help_link"]);
				$config["edit_member_template_add_field_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_member_template_add_field_help_link"]);
				$config["edit_member_template_field_order_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_member_template_field_order_help_link"]);
				$config["edit_listing_template_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_template_help_link"]);
				$config["edit_listing_template_add_field_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_template_add_field_help_link"]);
				$config["edit_listings_template_field_order_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listings_template_field_order_help_link"]);
				$config["edit_listing_template_search_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_template_search_help_link"]);
				$config["edit_listing_template_search_results_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_edit_listing_template_search_results_help_link"]);
				$config["show_property_classes_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_property_classes_help_link"]);
				$config["configure_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_configure_help_link"]);
				$config["view_log_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_view_log_help_link"]);
				$config["addon_transparentmaps_admin_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_transparentmaps_admin_help_link"]);
				$config["addon_transparentmaps_geocode_all_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_transparentmaps_geocode_all_help_link"]);
				$config["addon_transparentRETS_config_server_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_transparentRETS_config_server_help_link"]);
				$config["addon_transparentRETS_config_imports_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_transparentRETS_config_imports_help_link"]);
				$config["edit_user_template_member_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_user_template_member_help_link"]);
				$config["edit_user_template_agent_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_user_template_agent_help_link"]);
				$config["modify_property_class_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_modify_property_class_help_link"]);
				$config["insert_property_class_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_insert_property_class_help_link"]);
				$config["addon_IDXManager_config_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_IDXManager_config_help_link"]);
				$config["addon_IDXManager_classmanager_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_IDXManager_classmanager_help_link"]);
				$config["addon_csvloader_admin_help_link"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_addon_csvloader_admin_help_link"]);
				$config["show_admin_on_agent_list"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_show_admin_on_agent_list"]);
				$config["use_signup_image_verification"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_use_signup_image_verification"]);
				$config["controlpanel_mbstring_enabled"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_mbstring_enabled"]);
				$config["require_email_verification"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_require_email_verification"]);
				$config["blog_requires_moderation"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_blog_requires_moderation"]);
				$config["maintenance_mode"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_maintenance_mode"]);
				$config["notify_listings_template"] = $misc->make_db_unsafe($recordSet->fields["controlpanel_notify_listings_template"]);
				//Determine which table to use based on language
				$config["table_prefix"] = "default_$config[lang]_";
				if (!isset($_SESSION["users_lang"]))
				{
					$config["lang_table_prefix"] = "default_$config[lang]_";
				}
				else
				{
					$config["lang_table_prefix"] = "default_$_SESSION[users_lang]_";
				}
				///////////////////////////////////////////////////
				// Path Settings
				// These Paths are set based on setting in the control panel
				$config["path_to_thumbnailer"] = $config["basepath"]."/include/thumbnail".$config["thumbnail_prog"].".php"; // path to the thumnailing tool
				$config["template_path"] = $config["basepath"]."/template/".$config["template"]; // leave off the trailing slashes
				$config["template_url"] = $config["baseurl"]."/template/".$config["template"]; // leave off the trailing slashes
				$config["admin_template_path"] = $config["basepath"]."/admin/template/".$config["admin_template"]; // leave off the trailing slashes
				$config["admin_template_url"] = $config["baseurl"]."/admin/template/".$config["admin_template"]; // leave off the trailing slashes
				///////////////////////////////////////////////////
				// MISCELLENEOUS SETTINGS
				// you shouldn"t have to mess with these things unless you rename a folder, etc...
				$config["listings_upload_path"] = $config["basepath"]."/images/listing_photos";
				$config["listings_view_images_path"] = $config["baseurl"]."/images/listing_photos";
				$config["user_upload_path"] = $config["basepath"]."/images/user_photos";
				$config["user_view_images_path"] = $config["baseurl"]."/images/user_photos";
				$config["vtour_upload_path"] = $config["basepath"]."/images/vtour_photos";
				$config["vtour_view_images_path"] = $config["baseurl"]."/images/vtour_photos";
				$config["file_icons_path"] = $config["basepath"]."/files";
				$config["listings_view_file_icons_path"] = $config["baseurl"]."/files";
				$config["listings_file_upload_path"] = $config["basepath"]."/files/listings";
				$config["listings_view_file_path"] = $config["baseurl"]."/files/listings";
				$config["users_file_upload_path"] = $config["basepath"]."/files/users";
				$config["users_view_file_path"] = $config["baseurl"]."/files/users";

?>
