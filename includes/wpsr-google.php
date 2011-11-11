<?php
/*
 * Google Buzz and plusone buttons Processor code for WP Socializer Plugin
 * Version : 2.0
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

/*
 * Google Buzz button
 */
 
function wpsr_buzz_script(){
	// Return the script
	return "\n<!-- WP Socializer - Buzz Script -->\n".
	'<script type="text/javascript" src="http://www.google.com/buzz/api/button.js"></script>'.
	"\n<!-- WP Socializer - End Buzz Script -->\n";
}

function wpsr_buzz_bt_used(){

	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template_content = $wpsr_template1['content'] . $wpsr_template2['content'];
	$is_buzzbt_used = strpos_arr($wpsr_template_content, array('{buzz-post}', '{buzz-follow}'));

	if ($is_buzzbt_used === false) {
		return 0;
	} else {
		return 1;
	}
	
}

function wpsr_buzz($args = ''){
	global $post;
	
	$details = wpsr_get_post_details();
	$def_url = $details['permalink'];
	$def_title = $details['title'];

	$defaults = array (
		'output' => 'button',
 		'url' => $def_url,
 		'title' => $def_title,
		'type' => 'post',
		'style' => 'count',
		'size' => 'normal',
		'lang' => 'en',
		'profile' => 'http://profiles.google.com/me',
		'follow_text' => 'Follow Me',
		'follow_url' => '',
		'text' => __('Buzz this' ,'wpsr'),
		'image' => WPSR_PUBLIC_URL . 'buttons/buzz-bt.png',
		'params' => '',
	);
	
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);
	
	$buzz_processed = "\n<!-- Start WP Socializer Plugin - Google Buzz Button -->\n";
	
	switch($output){
		// Output the ordinary button
		case 'button':
			switch($type){
				// Display the Google Buzz post button
				case 'post':
					$page = ' data-url="' . $url . '"' ;
					
					if($style != 'link'){
						$style = ' data-button-style="' . $size . '-' . $style . '"';
					}else{
						$style = ' data-button-style="link"';
					}
					
					if($lang != 'en'){
						$lang = ' data-locale="' . $lang . '"' ;
					}else{
						$lang = '';
					}

					$buzz_processed .= '<a title="Post on Google Buzz" class="google-buzz-button" href="http://www.google.com/buzz/post"' . $style . $page . $lang . '></a>';
					
				break;
				
				// Display the Google Buzz follow button
				case 'follow':
					$buzz_processed .= '<a target="_blank" class="google-buzz-button" title="' . $follow_text . '" href="' . $profile . '" data-button-style="follow">' . $follow_text . '</a>';
					
				break;
			}
		break;
		
		// Output the Image format
		case 'image':
			switch($type){
				// Display the Google Buzz post button
				case 'post':
					$buzz_processed .= '<a href="http://www.google.com/buzz/post?url=' . $url . '" ' . $params . '><img src="' . $image . '" /></a>';
				break;
				
				// Display the Google Buzz follow button
				case 'follow':
					$buzz_processed .= '<a href="' . $follow_url . '" ' . $params . '><img src="' . WPSR_URL . 'public/images/follow-bt.png" /></a>';
				break;
			}
		break;
		
		// Output the Text format
		case 'text':
			switch($type){
				// Display the Google Buzz post button
				case 'post':
					$buzz_processed .= '<a href="http://www.google.com/buzz/post?url=' . $url . '" ' . $params . '>' . $text . '</a>';
				break;
				
				// Display the Google Buzz follow button
				case 'follow':
					$buzz_processed .= '<a href="' . $follow_url . '" ' . $params . '>' . $follow_text . '</a>';
				break;
			}
		break;
	}
	
	$buzz_processed .= "\n<!-- End WP Socializer Plugin - Google Buzz Button -->\n";
	
	return $buzz_processed;
}

function wpsr_buzz_bt($type){

	## Get Buzz Post Options
	$wpsr_buzz = get_option('wpsr_buzz_data');
	
	## Start Output
	$wpsr_buzz_processed = wpsr_buzz(array(
		'output' => 'button',
		'type' => $type,
		'style' => $wpsr_buzz['style'],
		'size' => $wpsr_buzz['size'],
		'lang' => $wpsr_buzz['language'],
		'profile' => $wpsr_buzz['profile'],
		'follow_text' => $wpsr_buzz['followbttext'],
	));
	## End Output
	
	return $wpsr_buzz_processed;
}

function wpsr_buzz_rss_bt($type){

	## Get Buzz Options
	$wpsr_buzz = get_option('wpsr_buzz_data');
	
	## Start Output
	$wpsr_buzz_processed = wpsr_buzz(array(
		'output' => 'text',
		'type' => $type,
		'follow_url' => $wpsr_buzz['profile'],
		'follow_text' => $wpsr_buzz['followbttext'],
		'params' => 'target="_blank"',
	));
	## End Output
	
	return $wpsr_buzz_processed;
}

?>