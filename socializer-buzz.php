<?php
/*
 * Google Buzz buttons Processor code for WP Socializer Plugin
 * Version : 1.0
 * Author : Aakash Chakravarthy
*/

function wpsr_buzz_post(){

	global $post;
	
	$details = wpsr_get_post_details();

	$permalink = $details['permalink'];
	$title = $details['title'];
	
	# Get Buzz Post Options
	$wpsr_buzz = get_option('wpsr_buzz_data');
	
	$wpsr_buzz_style = $wpsr_buzz['style'];
	$wpsr_buzz_size = $wpsr_buzz['size'];
	$wpsr_buzz_lang = $wpsr_buzz['language'];
	$wpsr_buzz_page = $wpsr_buzz['page'];
	$wpsr_buzz_custompage = $wpsr_buzz['custompage'];
	$wpsr_buzz_profile = $wpsr_buzz['profile'];
	
	$wpsr_buzz_page = ' data-url="' . $permalink . '"' ;
	
	if($wpsr_buzz_style != 'link'){
		$wpsr_buzz_style = ' data-button-style="' . $wpsr_buzz_size . '-' . $wpsr_buzz_style . '"';
	}
	
	if($wpsr_buzz_lang != 'en'){
		$wpsr_buzz_lang = ' data-locale="' . $wpsr_buzz_lang . '"' ;
	}else{
		$wpsr_buzz_lang = '';
	}
	
	## Start Output
	$wpsr_buzz_post_processed .= "\n<!-- Start WP Socializer Plugin - Google Buzz Post Button -->\n";
	
	$wpsr_buzz_post_processed .= 
	'<a title="Post on Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post"' . $wpsr_buzz_style . $wpsr_buzz_page . $wpsr_buzz_lang . '></a>' . "\n" .
	'<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>';
	
	$wpsr_buzz_post_processed .= "\n<!-- End WP Socializer Plugin - Google Buzz Post Button -->\n";
	## End Output
	
	return $wpsr_buzz_post_processed;
}

function wpsr_buzz_follow(){

	# Get Buzz Follow Options
	$wpsr_buzz = get_option('wpsr_buzz_data');
	
	$wpsr_buzz_profile = $wpsr_buzz['profile'];
	$wpsr_buzz_followbttext = $wpsr_buzz['followbttext'];
	
	## Start Output
	$wpsr_buzz_follow_processed .= "\n<!-- Start WP Socializer Plugin - Google Buzz Follow Button -->\n";
	
	$wpsr_buzz_follow_processed .= 
	'<a target="_blank" class="google-buzz-button" ' . 
	'title="' . $wpsr_buzz_followbttext . '" href="' . $wpsr_buzz_profile . '" data-button-style="follow">' . $wpsr_buzz_followbttext . '</a>' . "\n" . 
	'<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>';
	
	$wpsr_buzz_follow_processed .= "\n<!-- End WP Socializer Plugin - Google Buzz Follow Button -->\n";
	## End Output
	
	return $wpsr_buzz_follow_processed;
}

?>