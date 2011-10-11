<?php
/*
 * Retweet buttons Processor code for WP Socializer Plugin
 * Version : 1.0
 * Author : Aakash Chakravarthy
*/

function wpsr_retweet_topsy_script(){
	echo '<script type="text/javascript" src="http://cdn.topsy.com/topsy.js?init=topsyWidgetCreator"></script>';
}

function wpsr_retweet_bt_used(){

	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_content = $wpsr_template1['content'];
	$is_retweetbt_used = strpos($wpsr_template1_content, '{retweet-bt}');

	if ($is_retweetbt_used === false) {
		return 0;
	} else {
		return 1;
	}
	
}

function wpsr_retweet_bt(){
	
	global $post;
	
	$details = wpsr_get_post_details(1);
	
	$permalink = $details['permalink'];
	$title = $details['title'];
	
	# Get Retweet Button Options
	$wpsr_retweet = get_option('wpsr_retweet_data');
	
	$wpsr_retweet_username = $wpsr_retweet['username'];
	$wpsr_retweet_type = $wpsr_retweet['type'];
	$wpsr_retweet_service = $wpsr_retweet['service'];
	$wpsr_retweet_topsytheme = $wpsr_retweet['topsytheme'];
	
	switch($wpsr_retweet_service){
	
		// Tweetmeme Button
		case "tweetmeme" :
		
			## Start Output
			$wpsr_retweet_tweetmeme_processed = "\n<!-- Start WP Socializer Plugin - Retweet Button -->\n";
			
			$wpsr_retweet_tweetmeme_processed .= 
			'<script type="text/javascript">' . "\n" . "<!--\n" . 
				'tweetmeme_url = "' . $permalink . '"; ' . 
				'tweetmeme_style = "' . $wpsr_retweet_type . '"; ' . 
				'tweetmeme_source = "' . $wpsr_retweet_username . '"; ' . "\n" . "\n-->" . 
			'</script>' . "\n" . 
			'<script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>';
			
			$wpsr_retweet_tweetmeme_processed .= "\n<!-- End WP Socializer Plugin - Retweet Button -->\n";
			## End Output
			
			return $wpsr_retweet_tweetmeme_processed;
		break;
		
		
		// Topsy Button
		case "topsy" :

			if($wpsr_retweet_type == 'normal'){
				$wpsr_retweet_type = "big";
			}else{
				$wpsr_retweet_type = '';
			}
			
			## Start Output
			$wpsr_retweet_topsy_processed .= "\n<!-- Start WP Socializer Plugin - Retweet Button -->\n";
			
			$wpsr_retweet_topsy_processed .= 
			'<div class="topsy_widget_data"><!--{' .  
				'"url": "' . $permalink . '", ' . 
				'"title": "'. $title . '", ' . 
				'"style": "'. $wpsr_retweet_type . '", ' . 
				'"nick": "'. $wpsr_retweet_username . '", ' . 
				'"theme": "'. $wpsr_retweet_topsytheme . '", ' . 
			'}--></div>';
			
			$wpsr_retweet_topsy_processed .= "\n<!-- End WP Socializer Plugin - Retweet Button -->\n";
			## End Output
			
			return $wpsr_retweet_topsy_processed;
		break;
		
		
		// Retweet Button
		case "retweet" :
		
			if($wpsr_retweet_type == 'normal'){
				$wpsr_retweet_type = "";
			}else{
				$wpsr_retweet_type = "size = 'small'; "; 
			}
			
			## Start Output
			$wpsr_retweet_retweet_processed .= "\n<!-- Start WP Socializer Plugin - Retweet Button -->\n";
			
			$wpsr_retweet_retweet_processed .= 
			'<script type="text/javascript">' . "\n" . "//<!--\n" .
				"url = '" . $permalink . "';" . 
				"username  = '" . $wpsr_retweet_username . "';" . 
				$wpsr_retweet_type . "\n//-->" . 
			'</script>' .
			'<script type="text/javascript" src="http://www.retweet.com/static/retweets.js"></script>';
			
			$wpsr_retweet_retweet_processed .= "\n<!-- End WP Socializer Plugin - Retweet Button -->\n";
			## End Output
			
			return $wpsr_retweet_retweet_processed;
		break;
	}
}

?>