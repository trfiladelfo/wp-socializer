<?php
/*
 * Facebook buttons Processor code for WP Socializer Plugin
 * Version : 1.0
 * Author : Aakash Chakravarthy
*/

function wpsr_facebook_like(){
	
	global $post;
	
	$details = wpsr_get_post_details();
	
	$permalink = urlencode($details['permalink']);
	$title = urlencode($details['title']);
	
	## Get Facebook Options
	$wpsr_facebook = get_option('wpsr_facebook_data');
	
	$wpsr_facebook_btstyle = $wpsr_facebook['btstyle'];
	$wpsr_facebook_showfaces = $wpsr_facebook['showfaces'];
	$wpsr_facebook_width = $wpsr_facebook['width'];
	$wpsr_facebook_verb = $wpsr_facebook['verb'];
	$wpsr_facebook_font = $wpsr_facebook['font'];
	$wpsr_facebook_color = $wpsr_facebook['color'];
	$wpsr_facebook_bturl = $wpsr_facebook['bturl'];
	$wpsr_facebook_bturlcustom = $wpsr_facebook['bturlcustom'];
	
	if($wpsr_facebook_btstyle == 'standard' && $wpsr_facebook_showfaces == 1){
		$wpsr_facebook_height = 80;
	}
	if ($wpsr_facebook_btstyle == 'standard' && $wpsr_facebook_showfaces == 0){
		$wpsr_facebook_height = 35;
	}
	if ($wpsr_facebook_btstyle == 'button_count'){
		$wpsr_facebook_height = 21;
	}
	
	$wpsr_facebook_like_processed .= "\n<!-- Start WP Socializer Plugin - Facebook Like Button -->\n";
	
	$wpsr_facebook_like_processed .= 
	'<iframe src="http://www.facebook.com/plugins/like.php?' . 
	'&amp;href=' . $permalink . 
	'&amp;layout=' . $wpsr_facebook_btstyle . 
	'&amp;show_faces=' . $wpsr_facebook_showfaces . 
	'&amp;width=' . $wpsr_facebook_width . 
	'&amp;action=' . $wpsr_facebook_verb . 
	'&amp;font=' . $wpsr_facebook_font . 
	'&amp;colorscheme=' . $wpsr_facebook_color . 
	'&amp;height=' . $wpsr_facebook_height . 
	'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . $wpsr_facebook_width . 'px; height:' . $wpsr_facebook_height . 'px;" allowTransparency="true"></iframe>'; 
	
	$wpsr_facebook_like_processed .= "\n<!-- End WP Socializer Plugin - Facebook Like Button -->\n";
	
	return $wpsr_facebook_like_processed;
}

function wpsr_facebook_share(){
	
	global $post;
	
	$details = wpsr_get_post_details();
	
	$permalink = urlencode($details['permalink']);
	$title = urlencode($details['title']);
	
	## Get Facebook Options
	$wpsr_facebook = get_option('wpsr_facebook_data');

	$wpsr_facebook_shstyle = $wpsr_facebook['shstyle'];
	$wpsr_facebook_counter = $wpsr_facebook['counter'];
	$wpsr_facebook_counterplacement = $wpsr_facebook['counterplacement'];
	$wpsr_facebook_shurl = $wpsr_facebook['shurl'];
	$wpsr_facebook_shurlcustom = $wpsr_facebook['shurlcustom'];
	
	if($wpsr_facebook_shstyle == 'button' && $wpsr_facebook_counter == 1){
		if($wpsr_facebook_counterplacement == 'above'){
			$wpsr_facebook_shstyle = 'box_count';
		}else{
			$wpsr_facebook_shstyle = 'button_count';
		}
	}elseif($wpsr_facebook_shstyle == 'button' && $wpsr_facebook_counter == 0){
		$wpsr_facebook_shstyle = 'button';
	}elseif($wpsr_facebook_shstyle == 'link'){
		$wpsr_facebook_shstyle = 'icon_link';
	}
	
	$wpsr_facebook_share_processed .= "\n<!-- Start WP Socializer Plugin - Facebook Share Button -->\n";
	
	$wpsr_facebook_share_processed .= 
	'<a name="fb_share" type="' . $wpsr_facebook_shstyle . '" href="http://www.facebook.com/sharer.php?u=' . $permalink . '&amp;t=' . $title . '">Share</a>' . 
	'<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>' ;
	
	$wpsr_facebook_share_processed .= "\n<!-- End WP Socializer Plugin - Facebook Share Button -->\n";
	
	return $wpsr_facebook_share_processed;
}

?>