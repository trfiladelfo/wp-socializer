<?php
/*
 * Google +1 button Processor code for WP Socializer Plugin
 * Version : 3.0
 * Author : Aakash Chakravarthy
*/

function wpsr_plusone_script(){
	// Return the script
	return "\n<!-- WP Socializer - +1 Script -->\n".
	'<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>'.
	"\n<!-- WP Socializer - End +1 Script -->\n";
}

function wpsr_plusone_bt_used(){

	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template_content = $wpsr_template1['content'] . $wpsr_template2['content'];
	$is_plusonebt_used = strpos_arr($wpsr_template_content, array('{plusone-small}', '{plusone-medium}', '{plusone-standard}', '{plusone-tall}'));

	if ($is_plusonebt_used === false) {
		return 0;
	} else {
		return 1;
	}
	
}

function wpsr_plusone($args = ''){

	global $post;
	
	$details = wpsr_get_post_details();
	$def_url = $details['permalink'];
	$def_title = $details['title'];

	$defaults = array (
		'output' => 'button',
 		'url' => $def_url,
 		'title' => $def_title,
		'type' => 'standard',
		//'text' => __('+1 this' ,'wpsr'),
		//'image' => WPSR_PUBLIC_URL . 'buttons/plusone-bt.png',
		//'params' => '',
	);
	
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$plusone_processed = "\n<!-- Start WP Socializer Plugin - +1 Button -->\n";
	
	switch($output){
		// Display the ordinary button
		case 'button':
			$plusone_processed .= '<g:plusone size="' . $type . '" href="' . $url . '" ' . $params . '></g:plusone>';
		break;
		
	}
	
	$plusone_processed .= "\n<!-- End WP Socializer Plugin - +1 Button -->\n";
	
	return $plusone_processed;
}

function wpsr_plusone_bt($type = 'standard'){

	## Start Output
	$wpsr_plusone_bt_processed = wpsr_plusone(array(
		'output' => 'button',
		'type' => $type,
	));
	## End Output
	
	return $wpsr_plusone_bt_processed;
}

function wpsr_plusone_rss_bt(){

	## Start Output
	$wpsr_plusone_processed = '';
	## End Output
	
	return $wpsr_plusone_processed;
}
?>