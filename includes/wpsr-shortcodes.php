<?php
/*
 * Shortcodes for WP Socializer plugin
 * Version : 2.1
 * Author : Aakash Chakravarthy
 * Since : 2.0
 */
 
## Social buttons Shortcode
function wpsr_socialbts_shortcode($atts){
	return wpsr_socialbts($atts);
}
add_shortcode('wpsr_socialbts', 'wpsr_socialbts_shortcode');

## Addthis button Shortcode
function wpsr_addthis_shortcode($atts){
	return wpsr_addthis($atts) . wpsr_addthis_script();
}
add_shortcode('wpsr_addthis', 'wpsr_addthis_shortcode');

## Sharethis button Shortcode
function wpsr_sharethis_shortcode($atts){
	return wpsr_sharethis($atts) . wpsr_sharethis_script();
}
add_shortcode('wpsr_sharethis', 'wpsr_sharethis_shortcode');

## Retweet button Shortcode
function wpsr_retweet_shortcode($atts){
	if($atts['service'] == 'twitter'  || $atts['service'] == ''){
		$script = wpsr_retweet_twitter_script();
	}elseif($atts['service'] == 'topsy'){
		$script = wpsr_retweet_topsy_script();
	}elseif($atts['service'] == 'tweetmeme' || $atts['service'] == 'retweet'){
		$script = '';
	}
	
	return wpsr_retweet($atts) . $script;
}
add_shortcode('wpsr_retweet', 'wpsr_retweet_shortcode');

## Google Buzz button Shortcode - Removed since v2.3
function wpsr_buzz_shortcode($atts){
	return '';
}
add_shortcode('wpsr_buzz', 'wpsr_buzz_shortcode');

## Google Plusone button Shortcode
function wpsr_plusone_shortcode($atts){
	return wpsr_plusone($atts) . wpsr_plusone_script();
}
add_shortcode('wpsr_plusone', 'wpsr_plusone_shortcode');

## Digg button Shortcode
function wpsr_digg_shortcode($atts){
	return wpsr_digg($atts) . wpsr_digg_script();
}
add_shortcode('wpsr_digg', 'wpsr_digg_shortcode');

## Facebook Shortcode
function wpsr_facebook_shortcode($atts){
	return wpsr_facebook($atts);
}
add_shortcode('wpsr_facebook', 'wpsr_facebook_shortcode');

## StumbleUpon Shortcode
function wpsr_stumbleupon_shortcode($atts){
	return wpsr_stumbleupon($atts) . wpsr_stumbleupon_script();
}
add_shortcode('wpsr_stumbleupon', 'wpsr_stumbleupon_shortcode');

## Reddit Shortcode
function wpsr_reddit_shortcode($atts){
	return wpsr_reddit($atts);
}
add_shortcode('wpsr_reddit', 'wpsr_reddit_shortcode');

## LinkedIn Shortcode - since v2.3
function wpsr_linkedin_shortcode($atts){
	return wpsr_linkedin($atts) . wpsr_linkedin_script();
}
add_shortcode('wpsr_linkedin', 'wpsr_linkedin_shortcode');

## Pinterest Shortcode - since v2.4
function wpsr_pinterest_shortcode($atts){
	return wpsr_pinterest($atts) . wpsr_pinterest_script();
}
add_shortcode('wpsr_pinterest', 'wpsr_pinterest_shortcode');
?>