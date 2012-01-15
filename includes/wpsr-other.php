<?php
/*
 * Reddit, StumbleUpon and LinkedIn buttons Processor code for WP Socializer Plugin
 * Version : 2.1
 * Since v2.0
 * Author : Aakash Chakravarthy
*/

// Reddit button
function wpsr_reddit($args = ''){

	global $post;
	
	$details = wpsr_get_post_details();
	$def_url = $details['permalink'];
	$def_title = $details['title'];

	$defaults = array (
		'output' => 'button',
 		'url' => $def_url,
 		'title' => $def_title,
		'type' => '2',
		'text' => __('Reddit this', 'wpsr'),
		'image' => WPSR_PUBLIC_URL . 'buttons/reddit-bt.gif',
		'params' => '',
	);
	
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$reddit_processed = "\n<!-- Start WP Socializer Plugin - Reddit Button -->\n";
	
	switch($output){
		// Display the ordinary button
		case 'button':
			$reddit_processed .= '<script type="text/javascript">reddit_url = "' . $url . '";reddit_title = "' . $title . '";reddit_newwindow="1";</script><script type="text/javascript" src="http://www.reddit.com/static/button/button' . $type . '.js"></script>';
		break;
		
		// Display the Image format
		case 'image':
			$reddit_processed .= '<a href="http://www.reddit.com/submit?url=' . urlencode($url) . '&amp;title=' . urlencode($title) . '" ' . $params . '><img src="' . $image . '" alt="Submit to Reddit"  /></a>';
		break;
		
		// Display the Text format
		case 'text':
			$reddit_processed .= '<a href="http://www.reddit.com/submit?url=' . urlencode($url) . '&amp;title=' . urlencode($title) . '" ' . $params . '>' . $text . '</a>';
		break;
	}
	
	$reddit_processed .= "\n<!-- End WP Socializer Plugin - Reddit Button -->\n";
	
	return $reddit_processed;
}

function wpsr_reddit_bt($type){

	## Start Output
	$wpsr_reddit_bt_processed = wpsr_reddit(array(
		'output' => 'button',
		'type' => $type,
	));
	## End Output
	
	return $wpsr_reddit_bt_processed;
}

function wpsr_reddit_rss_bt(){

	## Start Output
	$wpsr_reddit_processed = wpsr_reddit(array(
		'output' => 'text',
		'params' => 'target="_blank"',
	));
	## End Output
	
	return $wpsr_reddit_processed;
}

// StumbleUpon button
function wpsr_stumbleupon($args = ''){

	global $post;
	
	$details = wpsr_get_post_details();
	$def_url = $details['permalink'];
	$def_title = $details['title'];

	$defaults = array (
		'output' => 'button',
 		'url' => $def_url,
 		'title' => $def_title,
		'type' => '1',
		'text' => __('Stumble this' ,'wpsr'),
		'image' => WPSR_PUBLIC_URL . 'buttons/stumbleupon-bt.gif',
		'params' => '',
	);
	
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$reddit_processed = "\n<!-- Start WP Socializer Plugin - StumbleUpon Button -->\n";
	
	switch($output){
		// Display the ordinary button
		case 'button':
			$stumbleupon_processed .= '<script type="text/javascript" src="http://www.stumbleupon.com/hostedbadge.php?s=' . $type .'&r=' . $url . '"></script>';
		break;
		
		// Display the Image format
		case 'image':
			$stumbleupon_processed .= '<a href="http://www.stumbleupon.com/submit?url=' . urlencode($url) . '&title=' . urlencode($title) . '" ' . $params . '><img src="' . $image . '" alt="Submit to Stumbleupon"  /></a>';
		break;
		
		// Display the Text format
		case 'text':
			$stumbleupon_processed .= '<a href="http://www.stumbleupon.com/submit?url=' . urlencode($url) . '&title=' . urlencode($title) . '" ' . $params . '>' . $text . '</a>';
		break;
	}
	
	$stumbleupon_processed .= "\n<!-- End WP Socializer Plugin - StumbleUpon Button -->\n";
	
	return $stumbleupon_processed;
}

function wpsr_stumbleupon_bt($type){

	## Start Output
	$wpsr_stumbleupon_bt_processed = wpsr_stumbleupon(array(
		'output' => 'button',
		'type' => $type,
	));
	## End Output
	
	return $wpsr_stumbleupon_bt_processed;
}

function wpsr_stumbleupon_rss_bt(){

	## Start Output
	$wpsr_stumbleupon_processed = wpsr_stumbleupon(array(
		'output' => 'text',
		'params' => 'target="_blank"',
	));
	## End Output
	
	return $wpsr_stumbleupon_processed;
}

//LinkedIn button
function wpsr_linkedin_script(){
	// Return the script
	return "\n<!-- WP Socializer - LinkedIn Script -->\n".
	'<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>'.
	"\n<!-- WP Socializer - End LinkedIn Script -->\n";
}

function wpsr_linkedin_bt_used(){

	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template_content = $wpsr_template1['content'] . $wpsr_template2['content'];
	$is_linkedin_used = strpos_arr($wpsr_template_content, array('{linkedin-standard}', '{linkedin-right}', '{linkedin-top}'));

	if ($is_linkedin_used === false) {
		return 0;
	} else {
		return 1;
	}
	
}

function wpsr_linkedin($args = ''){

	global $post;
	
	$details = wpsr_get_post_details();
	$def_url = $details['permalink'];
	$def_title = $details['title'];

	$defaults = array (
		'output' => 'button',
 		'url' => $def_url,
 		'title' => $def_title,
		'type' => 'right',
		'text' => __('Submit this to ' ,'wpsr'),
		'image' => WPSR_PUBLIC_URL . 'buttons/linkedin-bt.png',
		'params' => '',
	);
	
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$linkedin_processed = "\n<!-- Start WP Socializer Plugin - LinkedIn Button -->\n";
	
	switch($output){
		// Display the ordinary button
		case 'button':
			$linkedin_processed .= '<script type="IN/Share" data-url="' . $url . '" data-counter="' . $type . '"></script>';
		break;
		
		// Display the Image format
		case 'image':
			$linkedin_processed .= '<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . urlencode($url) . '&amp;title=' . urlencode($title) . '" ' . $params . '><img src="' . $image . '" alt="Submit to linkedin"  /></a>';
		break;
		
		// Display the Text format
		case 'text':
			$linkedin_processed .= '<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . urlencode($url) . '&amp;title=' . urlencode($title) . '" ' . $params . '>' . $text . '</a>';
		break;
	}
	
	$linkedin_processed .= "\n<!-- End WP Socializer Plugin - LinkedIn Button -->\n";
	
	return $linkedin_processed;
}

function wpsr_linkedin_bt($type){

	## Start Output
	$wpsr_linkedin_bt_processed = wpsr_linkedin(array(
		'output' => 'button',
		'type' => $type,
	));
	## End Output
	
	return $wpsr_linkedin_bt_processed;
}

function wpsr_linkedin_rss_bt(){

	## Start Output
	$wpsr_linkedin_processed = wpsr_linkedin(array(
		'output' => 'text',
		'params' => 'target="_blank"',
	));
	## End Output
	
	return $wpsr_linkedin_processed;
}
?>