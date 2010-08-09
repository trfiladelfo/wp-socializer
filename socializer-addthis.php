<?php
/*
 * Addthis button Processor code for WP Socializer Plugin
 * Version : 1.0
 * Author : Aakash Chakravarthy
*/

function wpsr_addthis_uniqueid(){
    $rand_no  = dechex(mt_rand(0,min(0xffffffff,mt_getrandmax())));
    $current_time = dechex(time());
    $unique_id =  $current_time . str_pad($rand_no, 8, '0', STR_PAD_LEFT);
    return $unique_id;
} 


function wpsr_addthis_bt(){

	global $post;
	
	$details = wpsr_get_post_details();
	
	$permalink = $details['permalink'];
	$title = $details['title'];
	
	## Get Addthis Options
	$wpsr_addthis = get_option('wpsr_addthis_data');
	
	$wpsr_addthis_lang = $wpsr_addthis['language'];
	$wpsr_addthis_button = $wpsr_addthis['button'];
	$wpsr_addthis_btbrand = $wpsr_addthis['btbrand'];
	$wpsr_addthis_btservices = $wpsr_addthis['btservices'];
	$wpsr_addthis_btheadclr = $wpsr_addthis['btheadclr'];
	$wpsr_addthis_btheadbgclr = $wpsr_addthis['btheadbgclr'];
	
	# Config settings
	if($wpsr_addthis['username'] != ''){
		$wpsr_addthis_username = '&amp;username=' . $wpsr_addthis['username'];
	}else{
		$wpsr_addthis_username = '&amp;username=wp-' . wpsr_addthis_uniqueid();
	}
	
	if($wpsr_addthis['language'] != 'lg-share-'){
		$wpsr_addthis_lang = 'en';
	}
	
	if($wpsr_addthis_btbrand != ''){
		$wpsr_addthis_btbrand = 'ui_cobrand: "' . $wpsr_addthis_btbrand .'"' . ",\n";
	}else{
		$wpsr_addthis_btbrand = '';
	}
	
	if($wpsr_addthis_btheadclr != ''){
		$wpsr_addthis_btheadclr = 'ui_header_color: "' . $wpsr_addthis_btheadclr . '"' . ",\n";
	}else{
		$wpsr_addthis_btheadclr = '';
	}
	
	if($wpsr_addthis_btheadbgclr != ''){
		$wpsr_addthis_btheadbgclr = 'ui_header_background: "' . $wpsr_addthis_btheadbgclr . '"' . ",\n";
	}else{
		$wpsr_addthis_btheadbgclr = '';
	}
	
	if($wpsr_addthis_btservices != ''){
		$wpsr_addthis_btservices = 'services_compact: "' . $wpsr_addthis_btservices .'"' . ",\n";
	}else{
		$wpsr_addthis_btservices = '';
	}
	
	$wpsr_addthis_btwidthcheck = strpos($wpsr_addthis_button, 'lg');

	if ($wpsr_addthis_btwidthcheck === false) {
		$wpsr_addthis_btwidth = '83';
	} else {
		$wpsr_addthis_btwidth = '125';
	}
	
	$wpsr_addthis_bt_config = $wpsr_addthis_btbrand . $wpsr_addthis_btheadclr . $wpsr_addthis_btheadbgclr . $wpsr_addthis_btservices;
	
	# Config 2 Settings
	$wpsr_addthis_url = ' addthis:url="' . $permalink .'"' ;
	$wpsr_addthis_title = ' addthis:title="' . $title .'"' ;
	
	$wpsr_addthis_bt_config2 = $wpsr_addthis_url . $wpsr_addthis_title;
	
	$wpsr_addthis_bt_settings  = 
	"\n<script type=\"text/javascript\">\n" .
	"<!--\n" .
	"var addthis_config = { \n" . 
	$wpsr_addthis_bt_config .
	"}\n//-->" .
	"</script>\n";
	
	$wpsr_addthis_bt_processed .= "\n<!-- Start WP Socializer Plugin - Addthis Button -->\n";
	
	## Start Output
	$wpsr_addthis_bt_processed .= 
	'<a class="addthis_button" href="http://addthis.com/bookmark.php?v=250' . 
	$wpsr_addthis_username .
	'"' . $wpsr_addthis_bt_config2 . '><img src="http://s7.addthis.com/static/btn/v2/'.
	$wpsr_addthis_button . $wpsr_addthis_lang . 
	'.gif" width="' . $wpsr_addthis_btwidth . '" height="16" alt="Bookmark and Share" style="border:0"/>' .
	'</a>' .
	$wpsr_addthis_bt_settings .
	'<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#' .
	$wpsr_addthis_username .
	'"></script>' ;
	
	$wpsr_addthis_bt_processed .= "\n<!-- End WP Socializer Plugin - Addthis Button -->\n";
	## End Output
	
	return $wpsr_addthis_bt_processed;
	
}

?>