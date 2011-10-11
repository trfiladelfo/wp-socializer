<?php
/*
 * Social buttons Processor code for WP Socializer Plugin
 * Version : 3.2
 * Author : Aakash Chakravarthy
*/

function wpsr_socialbts_script(){

	global $wpsr_pluginpath;
	
	echo "\n<!-- Start WP Socializer | Social Buttons CSS File -->\n";
	echo '<link rel="stylesheet" type="text/css" media="all" href="' . $wpsr_pluginpath . 'wp-socializer-buttons-css.css" /> ';
	echo "\n<!-- End WP Socializer | Social Buttons CSS File -->\n";
}

function wpsr_addtofavorites_script(){
	echo "
<script type=\"text/javascript\">function addToFavotites(url)  
{  a
    var title = document.title; 
    if (window.sidebar) // Firefox  
        window.sidebar.addPanel(title, url, '');  
    else if(window.opera && window.print) // Opera  
    {  
        var elem = document.createElement('a');  
        elem.setAttribute('href',url);  
        elem.setAttribute('title',title);  
        elem.setAttribute('rel','sidebar'); // Opera 7+  
        elem.click();  
    }   
    else if(document.all) // IE  
        window.external.AddFavorite(url, title);  
}</script>";
}

function wpsr_social_bts_used($pixel){
	## Get template data
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_content = $wpsr_template1['content'];
	
	$is_socialbts_used_16px = strpos($wpsr_template1_content, '{social-bts-16px}');
	$is_socialbts_used_32px = strpos($wpsr_template1_content, '{social-bts-32px}');
	
	switch($pixel){
		case '16px' :
			if ($is_socialbts_used_16px === false) {
				return 0;
			} else {
				return 1;
			}
		break;
			
		case '32px' :
			if ($is_socialbts_used_32px === false) {
				return 0;
			} else {
				return 1;
			}
		break;
	}
}

function wpsr_addtofavorites_bt_used(){
	## Get Social Button options
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	
	$wpsr_socialbt_selected16px = $wpsr_socialbt['selected16px'];
	$wpsr_socialbt_selected32px = $wpsr_socialbt['selected32px'];
	
	$in_selected_16px = in_array("Add to favorites", explode(',', $wpsr_socialbt_selected16px));
	$in_selected_32px = in_array("Add to favorites", explode(',', $wpsr_socialbt_selected32px));
	

	if (wpsr_social_bts_used('16px') && $in_selected_16px) {
		return 1;
	} elseif (wpsr_social_bts_used('32px') && $in_selected_32px){
		return 1;
	}

	
}

function get_sprite_coord($to_find_Key = '', $in_Array = '', $pixel){
	$index = 0;
	$pixel = $pixel + 1;
	
	switch ($pixel){
		case '17' :
		// Start the counter
		foreach ($in_Array as $key => $value) {
			if($key == $to_find_Key){
				return $index * $pixel ;
			}
			$index++;
		}
		
		break;
		
		case '33':
		// Start the counter
		foreach ($in_Array as $key => $value) {
			if(isset($value['support32px'])){
				if($key == $to_find_Key){
					return $index * $pixel ;
				}
				$index++;
			}
		}
		break;
	} // End switch
	
} // End function

function wpsr_social_bts($pixel){
	
	global $post, $wpsr_socialsites_list, $wpsr_socialbt_defaultimagepath;
	
	$details = wpsr_get_post_details();
	
	$permalink = urlencode($details['permalink']);
	$title = urlencode($details['title']);
	$excerpt = urlencode($details['excerpt']);
	$rss = get_bloginfo('rss_url');
	$blogname = urlencode(get_bloginfo('name') . ' ' . get_bloginfo('description'));
	
	$replace_with = array(
		$permalink, $title, $rss, 
		$blogname, $excerpt
	);
	
	$to_be_replaced = array(
		'{permalink}', '{title}', '{rss-url}', 
		'{blogname}', '{excerpt}'
	);
	
	## Get Social Button options
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	
	$wpsr_socialbt_target = $wpsr_socialbt['target'];
	$wpsr_socialbt_loadcss = $wpsr_socialbt['loadcss'];
	$wpsr_socialbt_effect = $wpsr_socialbt['effect'];
	$wpsr_socialbt_label = $wpsr_socialbt['label'];
	$wpsr_socialbt_columns = $wpsr_socialbt['columns'];
	$wpsr_socialbt_selected16px = $wpsr_socialbt['selected16px'];
	$wpsr_socialbt_selected32px = $wpsr_socialbt['selected32px'];
	$wpsr_socialbt_usesprites = $wpsr_socialbt['usesprites'];
	
	$wpsr_socialbt_imgpath16px = ($wpsr_socialbt['imgpath16px'] != '') ? $wpsr_socialbt['imgpath16px'] : $wpsr_socialbt_defaultimagepath . '16/';
	$wpsr_socialbt_imgpath32px = ($wpsr_socialbt['imgpath32px'] != '') ? $wpsr_socialbt['imgpath32px'] : $wpsr_socialbt_defaultimagepath . '32/';
	
	if($wpsr_socialbt_target = 1){
		$finalTarget = ' target="_blank" ';
	}
	
	## Start processing
	$wpsr_socialbt_processed .= "\n<!-- Start WP Socializer - Social Buttons - Output -->\n";
	
	switch($pixel){
	
		// Check Icons Size
		case '16px' :
		
			// Sprites URL
			$spriteImage16px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-16px.png';
			$spriteMaskImage16px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-mask-16px.gif';
			
			// Split the selected 16px sites
			$wpsr_socialbt_splitted = explode(',', $wpsr_socialbt_selected16px);
			
			$wpsr_socialbt_processed .= '<div class="wp-socializer 16px">' . "\n" ;
			$wpsr_socialbt_processed .= '<ul class="wp-socializer-' . $wpsr_socialbt_effect . ' columns-' . $wpsr_socialbt_columns . '">';
			
			// Print the selected sites
			for($i = 0; $i < count($wpsr_socialbt_splitted); $i++){
				$sitename = $wpsr_socialbt_splitted[$i];
				$finalTitle =  $sitename;
				$finalPermalink = str_replace($to_be_replaced, $replace_with, $wpsr_socialsites_list[$sitename]['url']);
				$finalIcon = $wpsr_socialbt_imgpath16px . $wpsr_socialsites_list[$sitename]['icon'];
				$spritesYCoord = get_sprite_coord($sitename, $wpsr_socialsites_list, '16');
				$finalSprites = '0px -' . $spritesYCoord . 'px';
				
				// Check whether label is enabled
				if($wpsr_socialbt_label == 1){
					$finalLabel = '<span class="wp-socializer-label"><a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' . $finalTitle . '</a></span>';
				}else{
					$finalLabel = '';
				}
				
				$wpsr_socialbt_processed .= "\n <li>";
				
				// Check whether sprites is enabled
				if($wpsr_socialbt_usesprites == '1'){
				
					$wpsr_socialbt_processed .= 
					'<a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' .
					'<img src="' . $spriteMaskImage16px . '" alt="' . $finalTitle . '" style="width:16px; height:16px; background: transparent url(' . $spriteImage16px . ') no-repeat; background-position:' . $finalSprites . '; border:0;">' .
					"</a>" . $finalLabel ;
					
				}else{
					
					$wpsr_socialbt_processed .= 
					'<a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' .
					'<img src="' . $finalIcon . '" alt="' . $finalTitle . '" border="0">' .
					"</a>" . $finalLabel ;

				}
				$wpsr_socialbt_processed .= "</li> \n ";
			}
			
		$wpsr_socialbt_processed .= "</ul> \n";
		$wpsr_socialbt_processed .= '<div class="wp-socializer-clearer"></div>';
		$wpsr_socialbt_processed .= '</div>';
			
		break;
		
		// Check icon size
		case '32px' :
		
			// Sprites URL
			$spriteImage32px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-32px.png';
			$spriteMaskImage32px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-mask-32px.gif';
			
			// Split the selected 32px sites
			$wpsr_socialbt_splitted = explode(',', $wpsr_socialbt_selected32px);
			
			$wpsr_socialbt_processed .= '<div class="wp-socializer 32px">' . "\n" ;
			$wpsr_socialbt_processed .= '<ul class="wp-socializer-' . $wpsr_socialbt_effect . ' columns-' . $wpsr_socialbt_columns . '">';
			
			// Print the selected sites
			for($i = 0; $i < count($wpsr_socialbt_splitted); $i++){
				$sitename = $wpsr_socialbt_splitted[$i];
				$finalTitle =  $sitename;
				$finalPermalink = str_replace($to_be_replaced, $replace_with, $wpsr_socialsites_list[$sitename]['url']);
				$finalIcon = $wpsr_socialbt_imgpath32px . $wpsr_socialsites_list[$sitename]['icon'];
				$spritesYCoord = get_sprite_coord($sitename, $wpsr_socialsites_list, '32');
				$finalSprites = '0px -' . $spritesYCoord . 'px';
				
				// Check whether label is enabled
				if($wpsr_socialbt_label == 1){
					$finalLabel = '<span class="wp-socializer-label"><a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' . $finalTitle . '</a></span>';
				}else{
					$finalLabel = '';
				}
				
				$wpsr_socialbt_processed .= "\n <li>";
				
				// Check whether sprites is enabled
				if($wpsr_socialbt_usesprites == '1'){
				
					$wpsr_socialbt_processed .=  
					'<a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' .
					'<img src="' . $spriteMaskImage32px . '" alt="' . $finalTitle . '" style="width:32px; height:32px; background: transparent url(' . $spriteImage32px . ') no-repeat; background-position:' . $finalSprites . '; border:0;">' .
					"</a>" . $finalLabel ;
					
				}else{
					
					$wpsr_socialbt_processed .=  
					'<a href="' . $finalPermalink . '" title="' . $finalTitle . '"' . $finalTarget . '>' .
					'<img src="' . $finalIcon . '" alt="' . $finalTitle . '" border="0">' .
					"</a>" . $finalLabel ;

				}
				
				$wpsr_socialbt_processed .= "</li> \n ";
			}
			
		$wpsr_socialbt_processed .= "</ul> \n";
		$wpsr_socialbt_processed .= '<div class="wp-socializer-clearer"></div>';
		$wpsr_socialbt_processed .= '</div>';
	}

	$wpsr_socialbt_processed .= "\n<!-- End WP Socializer - Social Buttons Output -->\n";
	
	return $wpsr_socialbt_processed;
}

?>