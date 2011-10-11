<?php
/*
 * Retweet buttons Processor code for WP Socializer Plugin
 * Version : 1.0
 * Author : Aakash Chakravarthy
*/

function wpsr_digg_script(){
	echo "
<script type=\"text/javascript\">
(function() {
	var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'http://widgets.digg.com/buttons.js';
	s1.parentNode.insertBefore(s, s1);
})();
</script>";
}

function wpsr_digg_bt_used(){

	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_content = $wpsr_template1['content'];
	$is_diggbt_used = strpos($wpsr_template1_content, '{digg-bt}');

	if ($is_diggbt_used === false) {
		return 0;
	} else {
		return 1;
	}
	
}

function wpsr_digg_bt(){
	
	global $post;
	
	$details = wpsr_get_post_details();
	
	$permalink = urlencode($details['permalink']);
	$title = urlencode($details['title']);
	
	## Digg Options
	$wpsr_digg = get_option('wpsr_digg_data');
	
	$wpsr_digg_type = $wpsr_digg['type'];
	
	## Start Output
	$wpsr_digg_bt_processed .= "\n<!-- Start WP Socializer Plugin - Digg Button -->\n";
	
	$wpsr_digg_bt_processed .= '<span  style="margin-top:-10px"><a class="DiggThisButton ' . $wpsr_digg_type . '" href="http://digg.com/submit?url=' . $permalink . '&amp;title=' . $title . '"></a></span>';
	
	$wpsr_digg_bt_processed .= "\n<!-- End WP Socializer Plugin - Digg Button -->\n";
	## End Output
	
	return $wpsr_digg_bt_processed;
}

?>