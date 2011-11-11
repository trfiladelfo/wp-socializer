<?php
/*
 * Main Admin Page for WP Socializer Plugin
 * Author : Aakash Chakravarthy
*/

$wpsr_donate_link='http://bit.ly/wpsrDonate';

function wpsr_admin_menu() {

	$icon = WPSR_ADMIN_URL .'images/wp-socializer-20.png';
	
	add_menu_page('WP Socializer - Admin page', 'WP Socializer', 'manage_options', 'wp_socializer', 'wpsr_admin_page', $icon);
	add_submenu_page('wp_socializer', 'WP Socializer - Admin page', 'WP Socializer', 'manage_options', 'wp_socializer', 'wpsr_admin_page');
	add_submenu_page('wp_socializer', 'WP Socializer - Placement', 'Placement', 'manage_options', 'wp_socializer#tab-9', 'wpsr_admin_page');
	add_submenu_page('wp_socializer', 'WP Socializer - Settings', 'Settings', 'manage_options', 'wp_socializer#tab-10', 'wpsr_admin_page');
	add_submenu_page('wp_socializer', 'WP Socializer - In widgets and posts', 'In widgets & posts', 'manage_options', 'wp_socializer_other', 'wpsr_admin_page_other');
}
add_action('admin_menu', 'wpsr_admin_menu');

## Load the Javascripts
function wpsr_admin_js() {

	$admin_js_url = WPSR_ADMIN_URL . 'wpsr-admin-js.js';
	$colorpicker_js_url = WPSR_ADMIN_URL . 'colorpicker/jquery.colorPicker.js';
	
	if (isset($_GET['page']) && ($_GET['page'] == 'wp_socializer' || $_GET['page'] == 'wp_socializer_other')){
		wp_enqueue_script('jquery'); 
		wp_enqueue_script('jquery-ui-core', false, array('jquery')); 
		wp_enqueue_script('jquery-ui-sortable', false, array('jquery','jquery-ui-core')); 
		wp_enqueue_script('jquery-ui-tabs', false, array('jquery','jquery-ui-core','jquery-ui-sortable')); 
		wp_enqueue_script('wp-socializer-admin-js', $admin_js_url, array('jquery','jquery-ui-core','jquery-ui-sortable', 'jquery-ui-tabs'));
		wp_enqueue_script('wp-socializer-colorpicker-js', $colorpicker_js_url, array('jquery','jquery-ui-core','jquery-ui-tabs', 'jquery-ui-sortable', 'wp-socializer-admin-js'));
	}
}
add_action('admin_print_scripts', 'wpsr_admin_js');


## Load the CSS
function wpsr_admin_css() {

	if (isset($_GET['page']) && ($_GET['page'] == 'wp_socializer' || $_GET['page'] == 'wp_socializer_other')) {
		wp_enqueue_style('wp-socializer-admin-css', WPSR_ADMIN_URL . 'wpsr-admin-css.css'); 
	}
}
add_action('admin_print_styles', 'wpsr_admin_css');

## Misc functions
function wpsr_addmi($name){
	return "<img src='" . WPSR_ADMIN_URL . "images/buttons/{$name}.png' />";
}
function wpsr_addcodeico($code){
	echo "<img src='" . WPSR_ADMIN_URL . "images/codeIcon.png' width='16' height='16' align='absmiddle' class='codePopupIco' alt='{$code}' />";
}
function wpsr_addtoolbar($id){
echo 
'<div class="toolbar">
	<ul class="tbButtons">
		<li class="parentLi btn">
			<span class="admSprites socialButtons"></span>Social buttons
			<ul bxid="' . $id . '">
				<li openTag="{social-bts-16px}">Social buttons 16px</li>
				<li openTag="{social-bts-32px}">Social buttons 32px</li>
			</ul>	
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites addthisIcon"></span>Addthis
			<ul bxid="' . $id . '">
				<li class="showTooltip" openTag="{addthis-tb-16px}" title="' . wpsr_addmi('addthis-tb-16px') . '">Toolbox 16px</li>
				<li class="showTooltip" openTag="{addthis-tb-32px}" title="' . wpsr_addmi('addthis-tb-32px') . '">Toolbox 32px</li>
				<li class="showTooltip" openTag="{addthis-sc}" title="' . wpsr_addmi('adthis-sharecount') . '">Sharecount</li>
				<li class="showTooltip" openTag="{addthis-bt}" title="' . wpsr_addmi('addthis-buttons') . '">Buttons</li>
			</ul>	
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites sharethisIcon"></span>Sharethis
			<ul bxid="' . $id . '">
				<li class="showTooltip" openTag="{sharethis-vcount}" title="' . wpsr_addmi('sharethis-vcount') . '">Vertical Count</li>
				<li class="showTooltip" openTag="{sharethis-hcount}" title="' . wpsr_addmi('sharethis-hcount') . '">Horizontal Count</li>
				<li class="showTooltip" openTag="{sharethis-large}" title="' . wpsr_addmi('sharethis-large') . '">Large Buttons</li>
				<li class="showTooltip" openTag="{sharethis-regular}" title="' . wpsr_addmi('sharethis-regular') . '">Regular Buttons</li>
				<li class="showTooltip" openTag="{sharethis-regular2}" title="' . wpsr_addmi('sharethis-regular-notext') . '">Regular Buttons (no-text)</li>
				<li class="showTooltip" openTag="{sharethis-bt}" title="' . wpsr_addmi('sharethis-buttons') . '">Buttons</li>
				<li class="showTooltip" openTag="{sharethis-classic}" title="' . wpsr_addmi('sharethis-classic') . '">Classic</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites facebookIcon"></span>Facebook
			<ul bxid="' . $id . '">
				<li openTag="{facebook-like}">Like button</li>
				<li openTag="{facebook-share}">Share button</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites buzzIcon"></span>Google
			<ul bxid="' . $id . '">
				<li openTag="{plusone-small}">+1 - Small</li>
				<li openTag="{plusone-medium}">+1 - Medium</li>
				<li openTag="{plusone-standard}">+1 - Standard</li>
				<li openTag="{plusone-tall}">+1 - Tall</li>
				<li openTag="{buzz-post}">Google buzz Post button</li>
				<li openTag="{buzz-follow}">Google buzz Follow button</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites retweetIcon"></span>Retweet & Digg
			<ul bxid="' . $id . '">
				<li openTag="{retweet-bt}">Retweet button</li>
				<li openTag="{digg-bt}">Digg button</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites stumbleuponIcon"></span>StumbleUpon
			<ul bxid="' . $id . '">
				<li class="showTooltip" openTag="{stumbleupon-1}" title="' . wpsr_addmi('stumbleupon-bts') . '">Type 1</li>
				<li class="showTooltip" openTag="{stumbleupon-2}" title="' . wpsr_addmi('stumbleupon-bts') . '">Type 2</li>
				<li class="showTooltip" openTag="{stumbleupon-3}" title="' . wpsr_addmi('stumbleupon-bts') . '">Type 3</li>
				<li class="showTooltip" openTag="{stumbleupon-5}" title="' . wpsr_addmi('stumbleupon-bts') . '">Type 5</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites redditIcon"></span>Reddit
			<ul bxid="' . $id . '">
				<li class="showTooltip" openTag="{reddit-1}" title="' . wpsr_addmi('reddit-bts') . '">Type 1</li>
				<li class="showTooltip" openTag="{reddit-2}" title="' . wpsr_addmi('reddit-bts') . '">Type 2</li>
				<li class="showTooltip" openTag="{reddit-3}" title="' . wpsr_addmi('reddit-bts') . '">Type 3</li>
			</ul>
		</li>
		
		<li class="parentLi btn">
			<span class="admSprites customIcon"></span>Other buttons
			<ul bxid="' . $id . '">
				<li openTag="{custom-1}">Custom 1</li>
				<li openTag="{custom-2}">Custom 2</li>
			</ul>
		</li>
			
		<li class="parentLi btn">Headings
			<ul bxid="' . $id . '">
				<li openTag="&lt;h1&gt;" closeTag="&lt;/h1&gt;">Heading 1</li>
				<li openTag="&lt;h2&gt;" closeTag="&lt;/h2&gt;">Heading 2</li>
				<li openTag="&lt;h3&gt;" closeTag="&lt;/h3&gt;">Heading 3</li>
				<li openTag="&lt;h4&gt;" closeTag="&lt;/h4&gt;">Heading 4</li>
				<li openTag="&lt;h5&gt;" closeTag="&lt;/h5&gt;">Heading 5</li>
				<li openTag="&lt;h6&gt;" closeTag="&lt;/h6&gt;">Heading 6</li>
			</ul>
		</li>
		
		<li class="parentLi btn">Float
			<ul bxid="' . $id . '">
				<li openTag=\' style="float:left"\'>Float Left</li>
				<li openTag=\' style="float:right"\'>Float Right</li>
			</ul>
		</li>
		
	</ul>
	
	<ul class="tbButtons" bxid="' . $id . '">
		<li class="btn" openTag="&lt;p&gt;" closeTag="&lt;/p&gt;">p</li>
		<li class="btn" openTag="&lt;/br&gt;">br</li>
		<li class="btn" openTag="&lt;span&gt;" closeTag="&lt;/span&gt;">span</li>
		<li class="btn" openTag="&lt;div&gt;" closeTag="&lt;/div&gt;">div</li>
		<li class="btn" openTag="&lt;/hr&gt;">hr</li>
		<li class="btn" openTag="&lt;ul&gt;" closeTag="&lt;/ul&gt;">ul</li>
		<li class="btn" openTag="&lt;li&gt;" closeTag="&lt;/li&gt;">li</li>
		<li class="btn" openTag="&lt;div style=&quot;clear: both&quot;&gt;&lt;/div&gt;">clearer</li>
		<li class="btn"><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" title="Help" target="_blank">?</a></li>
	</ul>	
</div>';
}

## Default values
function wpsr_reset_values(){
	$wpsr_temp1_def = '<div class="buttons-wrap clearfix">
	<span class="margin15 floatleft">{retweet-bt}</span>
	<span class="margin15 floatleft">{facebook-like}</span>
	<span class="margin15 floatleft">{stumbleupon-1}</span>
	<span class="margin15 floatleft">{reddit-1}</span>
	<span class="margin15 floatleft">{plusone-small}</span>
</div>';
	
	$wpsr_temp2_def = '<h2>' . __('Share and Enjoy' ,'wpsr') . '</h2>
{social-bts-32px}';
	
	## Addthis defaults
	$wpsr_addthis['username'] = '';
	$wpsr_addthis['language'] = 'en';
	$wpsr_addthis['button'] = 'lg-share-'; 
	
	$wpsr_addthis['tb_16pxservices'] = $wpsr_addthis['tb_32pxservices'] = 'facebook,twitter,digg,delicious,email,compact';
	$wpsr_addthis['sharecount'] = 'normal';
	
	$wpsr_addthis['btbrand'] = '';
	$wpsr_addthis['clickback'] = 1;
	$wpsr_addthis['btheadclr'] = '#000000';
	$wpsr_addthis['btheadbgclr'] = '#f2f2f2';
	
	update_option("wpsr_addthis_data", $wpsr_addthis);
	
	## Sharethis defaults
	$wpsr_sharethis['vcount_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['hcount_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['buttons_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['large_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['regular_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['regular2_order'] = 'facebook,twitter,email,sharethis';
	$wpsr_sharethis['pubkey'] = '';
	$wpsr_sharethis['addp'] = 1;
	
	update_option("wpsr_sharethis_data", $wpsr_sharethis);
	
	## Buzz Defaults
	$wpsr_buzz['style'] = 'count';
	$wpsr_buzz['size'] = 'normal';
	$wpsr_buzz['language'] = 'en';
	$wpsr_buzz['profile'] = 'http://profiles.google.com/me';
	$wpsr_buzz['followbttext'] = 'Follow Me';
	
	update_option("wpsr_buzz_data", $wpsr_buzz);
	
	## Retweet Defaults
	$wpsr_retweet['username'] = '';
	$wpsr_retweet['type'] = 'compact';
	$wpsr_retweet['service'] = 'twitter';
	$wpsr_retweet['topsytheme'] = 'blue';
	$wpsr_retweet['twitter_recacc'] = '';
	$wpsr_retweet['twitter_lang'] = 'en';
	
	update_option("wpsr_retweet_data", $wpsr_retweet);
	
	## Digg Defaults
	$wpsr_digg['type'] = 'DiggCompact';
	
	update_option("wpsr_digg_data", $wpsr_digg);
	
	## Facebook Defaults
	$wpsr_facebook['btstyle'] = 'button_count';
	$wpsr_facebook['showfaces'] = 0;
	$wpsr_facebook['width'] = 80;
	$wpsr_facebook['verb'] = 'like';
	$wpsr_facebook['font'] = 'arial';
	$wpsr_facebook['color'] = 'light';
	$wpsr_facebook['shstyle'] = 'button';
	$wpsr_facebook['counter'] = 1;
	$wpsr_facebook['counterplacement'] = 'above';
	
	update_option("wpsr_facebook_data", $wpsr_facebook);
	
	## Social Button Defaults
	$wpsr_socialbt['selected16px'] = 'facebook,twitter,delicious,digg,googlebuzz,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['selected32px'] = 'facebook,twitter,delicious,digg,googlebuzz,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['target'] = 0;
	$wpsr_socialbt['loadcss'] = 1;
	$wpsr_socialbt['effect'] = 'opacity';
	$wpsr_socialbt['label'] = 0;
	$wpsr_socialbt['columns'] = 'no';
	$wpsr_socialbt['imgpath16px'] = WPSR_SOCIALBT_IMGPATH . '16/';
	$wpsr_socialbt['imgpath32px'] = WPSR_SOCIALBT_IMGPATH . '32/';
	$wpsr_socialbt['usesprites'] = 1;
	
	update_option('wpsr_socialbt_data', $wpsr_socialbt);
	
	## Custom Defaults
	$wpsr_custom['custom1'] = '';
	$wpsr_custom['custom2'] = '';
	
	update_option("wpsr_custom_data", $wpsr_custom);
	
	## Placement Defaults | Template 1
	$wpsr_template1['content'] = $wpsr_temp1_def;
	$wpsr_template1['inhome'] = 0;
	$wpsr_template1['insingle'] = 1;
	$wpsr_template1['inpage'] = 1;
	$wpsr_template1['incategory'] = 0;
	$wpsr_template1['intag'] = 0;
	$wpsr_template1['indate'] = 0;
	$wpsr_template1['inauthor'] = 0;
	$wpsr_template1['insearch'] = 0;
	$wpsr_template1['inexcerpt'] = 0;
	$wpsr_template1['infeed'] = 0;
	$wpsr_template1['abvcontent'] = 1;
	$wpsr_template1['blwcontent'] = 0;
	$wpsr_template1['addp'] = 0;
	
	update_option("wpsr_template1_data", $wpsr_template1);
	
	## Placement Defaults | Template 2
	$wpsr_template2['content'] = $wpsr_temp2_def;
	$wpsr_template2['inhome'] = 1;
	$wpsr_template2['insingle'] = 1;
	$wpsr_template2['inpage'] = 1;
	$wpsr_template2['incategory'] = 1;
	$wpsr_template2['intag'] = 1;
	$wpsr_template2['indate'] = 1;
	$wpsr_template2['inauthor'] = 1;
	$wpsr_template2['insearch'] = 1;
	$wpsr_template2['inexcerpt'] = 1;
	$wpsr_template2['infeed'] = 1;
	$wpsr_template2['abvcontent'] = 0;
	$wpsr_template2['blwcontent'] = 1;
	$wpsr_template2['addp'] = 0;
	
	update_option("wpsr_template2_data", $wpsr_template2);
	
	## Settings Defaults
	$wpsr_settings['rssoutput'] = '';
	$wpsr_settings['bitlyusername'] = '';
	$wpsr_settings['bitlyapi'] = '';
	$wpsr_settings['disablewpsr'] = 0;
	$wpsr_settings['scriptsplace'] = 'header';
	
	update_option("wpsr_settings_data", $wpsr_settings);
}

## Check what to show in the admin
function wpsr_show_admin(){
	if(get_option('wpsr_version') == WPSR_VERSION){
		return 1;
	}else{
		return 0;
	}
}

## Fix version 1.0 settings
function wpsr_version1_fix(){
	$wpsr_socialbt['selected16px'] = 'facebook,twitter,delicious,digg,googlebuzz,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['selected32px'] = 'facebook,twitter,delicious,digg,googlebuzz,stumbleupon,addtofavorites,email,rss';
	$wpsr_socialbt['imgpath16px'] = WPSR_SOCIALBT_IMGPATH . '16/';
	$wpsr_socialbt['imgpath32px'] = WPSR_SOCIALBT_IMGPATH . '32/';
	update_option('wpsr_socialbt_data', $wpsr_socialbt);
}

## Admin Menu
function wpsr_admin_page(){

	$wpsr_updated = false;
	
	## Get the global variables
	global $wpsr_socialsites_list, $wpsr_addthis_lang_array, $wpsr_buzz_lang_array, $wpsr_button_code_list, $wpsr_donate_link;
	
	## Assign the defaults for new users
	$wpsr_addthis = get_option('wpsr_addthis_data');
	$wpsr_sharethis = get_option('wpsr_sharethis_data');
	$wpsr_buzz = get_option('wpsr_buzz_data');
	$wpsr_retweet = get_option('wpsr_retweet_data');
	$wpsr_digg = get_option('wpsr_digg_data');
	$wpsr_facebook = get_option('wpsr_facebook_data');
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	$wpsr_custom = get_option('wpsr_custom_data');
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	$wpsr_settings = get_option('wpsr_settings_data');
	
	if(empty($wpsr_addthis) && empty($wpsr_sharethis) && empty($wpsr_digg) && empty($wpsr_retweet) && empty($wpsr_digg) && empty($wpsr_buzz) && empty($wpsr_facebook) && empty($wpsr_template1) && empty($wpsr_template2) && empty($wpsr_settings) && empty($wpsr_custom)){
		wpsr_reset_values();
	}
	
	if($wpsr_socialbt['imgpath16px'] == WPSR_URL . 'social-icons/16/'){
		wpsr_version1_fix();
		$wpsr_v1fix = true;
	}
	
	if ($_POST['wpsr_reset']){
		wpsr_reset_values();
		$wpsr_reseted = true;
	}
	
	if ($_POST['wpsr_intro_submit']){
		update_option("wpsr_version", WPSR_VERSION);
	}
	
	if ($_POST["wpsr_submit"]) {
		## Addthis options
		$wpsr_addthis['username'] = $_POST['wpsr_addthis_username'];
		$wpsr_addthis['language'] = $_POST['wpsr_addthis_lang'];
		$wpsr_addthis['button'] = $_POST['wpsr_addthis_button'];
		
		$wpsr_addthis['tb_16pxservices'] = $_POST['wpsr_addthis_tb_16pxservices'];
		$wpsr_addthis['tb_32pxservices'] = $_POST['wpsr_addthis_tb_32pxservices'];
		$wpsr_addthis['sharecount'] = $_POST['wpsr_addthis_sharecount'];
		
		$wpsr_addthis['btbrand'] = $_POST['wpsr_addthis_btbrand'];
		$wpsr_addthis['clickback'] = $_POST['wpsr_addthis_clickback'];
		$wpsr_addthis['btheadclr'] = $_POST['wpsr_addthis_btheadclr'];
		$wpsr_addthis['btheadbgclr'] = $_POST['wpsr_addthis_btheadbgclr'];
		
		update_option("wpsr_addthis_data", $wpsr_addthis);
		
		## Sharethis Options
		$wpsr_sharethis['vcount_order'] = $_POST['wpsr_sharethis_vcount_order'];
		$wpsr_sharethis['hcount_order'] = $_POST['wpsr_sharethis_hcount_order'];
		$wpsr_sharethis['buttons_order'] = $_POST['wpsr_sharethis_buttons_order'];
		$wpsr_sharethis['large_order'] = $_POST['wpsr_sharethis_large_order'];
		$wpsr_sharethis['regular_order'] = $_POST['wpsr_sharethis_regular_order'];
		$wpsr_sharethis['regular2_order'] = $_POST['wpsr_sharethis_regular2_order'];
		$wpsr_sharethis['pubkey'] = $_POST['wpsr_sharethis_pubkey'];
		$wpsr_sharethis['addp'] = $_POST['wpsr_sharethis_addp'];
		
		update_option("wpsr_sharethis_data", $wpsr_sharethis);
		
		## Buzz Options
		$wpsr_buzz['style'] = $_POST['wpsr_buzz_style'];
		$wpsr_buzz['size'] = $_POST['wpsr_buzz_size'];
		$wpsr_buzz['language'] = $_POST['wpsr_buzz_lang'];
		$wpsr_buzz['page'] = $_POST['wpsr_buzz_page'];
		$wpsr_buzz['profile'] = $_POST['wpsr_buzz_profile'];
		$wpsr_buzz['followbttext'] = $_POST['wpsr_buzz_followbttext'];
		
		update_option("wpsr_buzz_data", $wpsr_buzz);
		
		## Retweet Options
		$wpsr_retweet['username'] = $_POST['wpsr_retweet_username'];
		$wpsr_retweet['type'] = $_POST['wpsr_retweet_type'];
		$wpsr_retweet['service'] = $_POST['wpsr_retweet_service'];
		$wpsr_retweet['topsytheme'] = $_POST['wpsr_retweet_topsytheme'];
		$wpsr_retweet['twitter_recacc'] = $_POST['wpsr_retweet_twitter_recacc'];
		$wpsr_retweet['twitter_lang'] = $_POST['wpsr_retweet_twitter_lang'];
		
		update_option("wpsr_retweet_data", $wpsr_retweet);
		
		## Digg Options
		$wpsr_digg['type'] = $_POST['wpsr_digg_type'];
		
		update_option("wpsr_digg_data", $wpsr_digg);
		
		## Facebook Options
		$wpsr_facebook['btstyle'] = $_POST['wpsr_facebook_btstyle'];
		$wpsr_facebook['showfaces'] = $_POST['wpsr_facebook_showfaces'];
		$wpsr_facebook['width'] = $_POST['wpsr_facebook_width'];
		$wpsr_facebook['verb'] = $_POST['wpsr_facebook_verb'];
		$wpsr_facebook['font'] = $_POST['wpsr_facebook_font'];
		$wpsr_facebook['color'] = $_POST['wpsr_facebook_color'];
		$wpsr_facebook['shstyle'] = $_POST['wpsr_facebook_shstyle'];
		$wpsr_facebook['counter'] = $_POST['wpsr_facebook_counter'];
		$wpsr_facebook['counterplacement'] = $_POST['wpsr_facebook_counterplacement'];
		
		update_option("wpsr_facebook_data", $wpsr_facebook);
		
		## Social Button Options
		$wpsr_socialbt['target'] = $_POST['wpsr_socialbt_target'];
		$wpsr_socialbt['loadcss'] = $_POST['wpsr_socialbt_loadcss'];
		$wpsr_socialbt['effect'] = $_POST['wpsr_socialbt_effect'];
		$wpsr_socialbt['label'] = $_POST['wpsr_socialbt_label'];
		$wpsr_socialbt['columns'] = $_POST['wpsr_socialbt_columns'];
		$wpsr_socialbt['selected16px'] = $_POST['wpsr_socialbt_selected16px'];
		$wpsr_socialbt['selected32px'] = $_POST['wpsr_socialbt_selected32px'];
		$wpsr_socialbt['imgpath16px'] = $_POST['wpsr_socialbt_imgpath16px'];
		$wpsr_socialbt['imgpath32px'] = $_POST['wpsr_socialbt_imgpath32px'];
		$wpsr_socialbt['usesprites'] = $_POST['wpsr_socialbt_usesprites'];
		
		update_option('wpsr_socialbt_data', $wpsr_socialbt);
		
		## Custom Options
		$wpsr_custom['custom1'] = stripslashes($_POST['wpsr_custom1']);
		$wpsr_custom['custom2'] = stripslashes($_POST['wpsr_custom2']);
		
		update_option("wpsr_custom_data", $wpsr_custom);
		
		## Placement Options | Template 1
		$wpsr_template1['content'] = stripslashes($_POST['wpsr_template1_content']);
		$wpsr_template1['inhome'] = $_POST['wpsr_template1_inhome'];
		$wpsr_template1['insingle'] = $_POST['wpsr_template1_insingle'];
		$wpsr_template1['inpage'] = $_POST['wpsr_template1_inpage'];
		$wpsr_template1['incategory'] = $_POST['wpsr_template1_incategory'];
		$wpsr_template1['intag'] = $_POST['wpsr_template1_intag'];
		$wpsr_template1['indate'] = $_POST['wpsr_template1_indate'];
		$wpsr_template1['inauthor'] = $_POST['wpsr_template1_inauthor'];
		$wpsr_template1['insearch'] = $_POST['wpsr_template1_insearch'];
		$wpsr_template1['inexcerpt'] = $_POST['wpsr_template1_inexcerpt'];
		$wpsr_template1['infeed'] = $_POST['wpsr_template1_infeed'];
		$wpsr_template1['abvcontent'] = $_POST['wpsr_template1_abvcontent'];
		$wpsr_template1['blwcontent'] = $_POST['wpsr_template1_blwcontent'];
		$wpsr_template1['addp'] = $_POST['wpsr_template1_addp'];
		
		update_option("wpsr_template1_data", $wpsr_template1);
		
		## Placement Options | Template 2
		$wpsr_template2['content'] = stripslashes($_POST['wpsr_template2_content']);
		$wpsr_template2['inhome'] = $_POST['wpsr_template2_inhome'];
		$wpsr_template2['insingle'] = $_POST['wpsr_template2_insingle'];
		$wpsr_template2['inpage'] = $_POST['wpsr_template2_inpage'];
		$wpsr_template2['incategory'] = $_POST['wpsr_template2_incategory'];
		$wpsr_template2['intag'] = $_POST['wpsr_template2_intag'];
		$wpsr_template2['indate'] = $_POST['wpsr_template2_indate'];
		$wpsr_template2['inauthor'] = $_POST['wpsr_template2_inauthor'];
		$wpsr_template2['insearch'] = $_POST['wpsr_template2_insearch'];
		$wpsr_template2['inexcerpt'] = $_POST['wpsr_template2_inexcerpt'];
		$wpsr_template2['infeed'] = $_POST['wpsr_template2_infeed'];
		$wpsr_template2['abvcontent'] = $_POST['wpsr_template2_abvcontent'];
		$wpsr_template2['blwcontent'] = $_POST['wpsr_template2_blwcontent'];
		$wpsr_template2['addp'] = $_POST['wpsr_template2_addp'];
		
		update_option("wpsr_template2_data", $wpsr_template2);
		
		## Settings options
		$wpsr_settings['rssurl'] = $_POST['wpsr_settings_rssurl'];
		$wpsr_settings['bitlyusername'] = $_POST['wpsr_settings_bitlyusername'];
		$wpsr_settings['bitlyapi'] = $_POST['wpsr_settings_bitlyapi'];
		$wpsr_settings['disablewpsr'] = $_POST['wpsr_settings_disablewpsr'];
		$wpsr_settings['scriptsplace'] = $_POST['wpsr_settings_scriptsplace'];
		
		update_option("wpsr_settings_data", $wpsr_settings);
		
		$wpsr_updated = true;
		
		if(get_option("wpsr_active") == 0){
			update_option("wpsr_active", 1);
		}
	}
	
	if($wpsr_updated == true){
		echo "<div class='message updated fixedMsg autoHide'><p>" . __('Updated successfully', 'wpsr') . "</p></div>";
	}
	
	if($wpsr_reseted == true){
		echo "<div class='message updated fixedMsg autoHide'><p>" . __('Values are set to defaults successfully', 'wpsr') . "</p></div>";
	}
	
	if($wpsr_v1fix == true){
		echo "<div class='message updated fixedMsg autoHide'><p>" . __('You have upgraded from version 1.0, So some settings are fixed to suit new version.', 'wpsr') . "</p></div>";
	}

	## Addthis Options
	$wpsr_addthis = get_option('wpsr_addthis_data');
	
	$wpsr_addthis_username = $wpsr_addthis['username'];
	$wpsr_addthis_lang = $wpsr_addthis['language'];
	
	$wpsr_addthis_button = $wpsr_addthis['button'];
	
	$wpsr_addthis_tb_16pxservices = $wpsr_addthis['tb_16pxservices'];
	$wpsr_addthis_tb_32pxservices = $wpsr_addthis['tb_32pxservices'];
	$wpsr_addthis_sharecount = $wpsr_addthis['sharecount'];
	
	$wpsr_addthis_btbrand = $wpsr_addthis['btbrand'];
	$wpsr_addthis_clickback = $wpsr_addthis['clickback'];
	$wpsr_addthis_btheadclr = $wpsr_addthis['btheadclr'];
	$wpsr_addthis_btheadbgclr = $wpsr_addthis['btheadbgclr'];
	
	$wpsr_addthis_btheadclr = $wpsr_addthis_btheadclr;
	$wpsr_addthis_btheadbgclr = $wpsr_addthis_btheadbgclr;
 	
	## Sharethis options
	$wpsr_sharethis = get_option('wpsr_sharethis_data');
	
	$wpsr_sharethis_vcount_order = $wpsr_sharethis['vcount_order'];
	$wpsr_sharethis_hcount_order = $wpsr_sharethis['hcount_order'];
	$wpsr_sharethis_buttons_order = $wpsr_sharethis['buttons_order'];
	$wpsr_sharethis_large_order = $wpsr_sharethis['large_order'];
	$wpsr_sharethis_regular_order = $wpsr_sharethis['regular_order'];
	$wpsr_sharethis_regular2_order = $wpsr_sharethis['regular2_order'];
	$wpsr_sharethis_pubkey = $wpsr_sharethis['pubkey'];
	$wpsr_sharethis_addp = $wpsr_sharethis['addp'];
	
	## Buzz Options
	$wpsr_buzz = get_option('wpsr_buzz_data');
	
	$wpsr_buzz_style = $wpsr_buzz['style'];
	$wpsr_buzz_size = $wpsr_buzz['size'];
	$wpsr_buzz_lang = $wpsr_buzz['language'];
	$wpsr_buzz_page = $wpsr_buzz['page'];
	$wpsr_buzz_custompage = $wpsr_buzz['custompage'];
	$wpsr_buzz_profile = $wpsr_buzz['profile'];
	$wpsr_buzz_followbttext = $wpsr_buzz['followbttext'];
	
	## Retweet Options
	$wpsr_retweet = get_option('wpsr_retweet_data');
	
	$wpsr_retweet_username = $wpsr_retweet['username'];
	$wpsr_retweet_type = $wpsr_retweet['type'];
	$wpsr_retweet_service = $wpsr_retweet['service'];
	$wpsr_retweet_topsytheme = $wpsr_retweet['topsytheme'];
	$wpsr_retweet_twitter_recacc = $wpsr_retweet['twitter_recacc'];
	$wpsr_retweet_twitter_lang = $wpsr_retweet['twitter_lang'];
	
	## Digg Options
	$wpsr_digg = get_option('wpsr_digg_data');
	
	$wpsr_digg_type = $wpsr_digg['type'];
	
	## Facebook Options
	$wpsr_facebook = get_option('wpsr_facebook_data');
	
	$wpsr_facebook_btstyle = $wpsr_facebook['btstyle'];
	$wpsr_facebook_showfaces = $wpsr_facebook['showfaces'];
	$wpsr_facebook_width = $wpsr_facebook['width'];
	$wpsr_facebook_verb = $wpsr_facebook['verb'];
	$wpsr_facebook_font = $wpsr_facebook['font'];
	$wpsr_facebook_color = $wpsr_facebook['color'];
	$wpsr_facebook_bturl = $wpsr_facebook['bturl'];
	$wpsr_facebook_bturlcustom = $wpsr_facebook['bturlcustom'];
	$wpsr_facebook_shstyle = $wpsr_facebook['shstyle'];
	$wpsr_facebook_counter = $wpsr_facebook['counter'];
	$wpsr_facebook_counterplacement = $wpsr_facebook['counterplacement'];
	$wpsr_facebook_shurl = $wpsr_facebook['shurl'];
	$wpsr_facebook_shurlcustom = $wpsr_facebook['shurlcustom'];
	
	## Social Button options
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	
	$wpsr_socialbt_target = $wpsr_socialbt['target'];
	$wpsr_socialbt_loadcss = $wpsr_socialbt['loadcss'];
	$wpsr_socialbt_effect = $wpsr_socialbt['effect'];
	$wpsr_socialbt_label = $wpsr_socialbt['label'];
	$wpsr_socialbt_columns = $wpsr_socialbt['columns'];
	$wpsr_socialbt_selected16px = $wpsr_socialbt['selected16px'];
	$wpsr_socialbt_selected32px = $wpsr_socialbt['selected32px'];
	$wpsr_socialbt_usesprites = $wpsr_socialbt['usesprites'];
	$wpsr_socialbt_imgpath16px = (empty($wpsr_socialbt['imgpath16px'])) ? WPSR_SOCIALBT_IMGPATH . '16/' : $wpsr_socialbt['imgpath16px'];
	$wpsr_socialbt_imgpath32px = (empty($wpsr_socialbt['imgpath32px'])) ? WPSR_SOCIALBT_IMGPATH . '32/' : $wpsr_socialbt['imgpath32px'];
	
	## Custom Options
	$wpsr_custom = get_option('wpsr_custom_data');
	
	$wpsr_custom1 = $wpsr_custom['custom1'];
	$wpsr_custom2 = $wpsr_custom['custom2'];
	
	## Placement Options | Template 1 
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_content = $wpsr_template1['content'];
	$wpsr_template1_inhome = $wpsr_template1['inhome'];
	$wpsr_template1_insingle = $wpsr_template1['insingle'];
	$wpsr_template1_inpage = $wpsr_template1['inpage'];
	$wpsr_template1_incategory = $wpsr_template1['incategory'];
	$wpsr_template1_intag = $wpsr_template1['intag'];
	$wpsr_template1_indate = $wpsr_template1['indate'];
	$wpsr_template1_inauthor = $wpsr_template1['inauthor'];
	$wpsr_template1_insearch = $wpsr_template1['insearch'];
	$wpsr_template1_inexcerpt = $wpsr_template1['inexcerpt'];
	$wpsr_template1_infeed = $wpsr_template1['infeed'];
	$wpsr_template1_abvcontent = $wpsr_template1['abvcontent'];
	$wpsr_template1_blwcontent = $wpsr_template1['blwcontent'];
	$wpsr_template1_addp = $wpsr_template1['addp'];
	
	## Placement Options | Template 2
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template2_content = $wpsr_template2['content'];
	$wpsr_template2_inhome = $wpsr_template2['inhome'];
	$wpsr_template2_insingle = $wpsr_template2['insingle'];
	$wpsr_template2_inpage = $wpsr_template2['inpage'];
	$wpsr_template2_incategory = $wpsr_template2['incategory'];
	$wpsr_template2_intag = $wpsr_template2['intag'];
	$wpsr_template2_indate = $wpsr_template2['indate'];
	$wpsr_template2_inauthor = $wpsr_template2['inauthor'];
	$wpsr_template2_insearch = $wpsr_template2['insearch'];
	$wpsr_template2_inexcerpt = $wpsr_template2['inexcerpt'];
	$wpsr_template2_infeed = $wpsr_template2['infeed'];
	$wpsr_template2_abvcontent = $wpsr_template2['abvcontent'];
	$wpsr_template2_blwcontent = $wpsr_template2['blwcontent'];
	$wpsr_template2_addp = $wpsr_template2['addp'];
	
	## Settings options
	$wpsr_settings = get_option('wpsr_settings_data');
	
	$wpsr_settings_rssurl = $wpsr_settings['rssurl'];
	$wpsr_settings_bitlyusername = $wpsr_settings['bitlyusername'];
	$wpsr_settings_bitlyapi = $wpsr_settings['bitlyapi'];
	$wpsr_settings_disablewpsr = $wpsr_settings['disablewpsr'];
	$wpsr_settings_scriptsplace = $wpsr_settings['scriptsplace'];
	
	if($wpsr_settings_disablewpsr) $wpsr_is_disabled = '<span class="redText"> | ' . __('Disabled', 'wpsr') . '</span>';

?>

<?php if(wpsr_show_admin() == 1): ?>
<!-- Main ADMIN page -->
<div class="wrap">

<div id="tabs">
	
	<div class="header">
		<div class="headerTitle"><h2><img width="32" height="32" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" align="absmiddle"/>&nbsp;WP Socializer<span class="smallText"> v<?php echo WPSR_VERSION; ?><?php echo $wpsr_is_disabled; ?></span></h2></div>
		
		<div class="promoBox">
			<div class="promos plusoneBox">
			<div class="text"><?php _e('+1 this plugin', 'wpsr'); ?></div>
			<?php echo wpsr_admin_buttons('+1'); ?>
			</div>
			
			<div class="promos likeBox">
				<div class="iframeWrap">
					<div class="text"><?php _e('Like this plugin', 'wpsr'); ?></div>
					<?php echo wpsr_admin_buttons('fb'); ?>
				</div>
			</div>
			
			<div class="promos donateBox">
				<div class="wrap">
					<div class="txt1"><a href="<?php echo $wpsr_donate_link; ?>" target="_blank"><?php _e('Donate', 'wpsr'); ?></a></div>
					<div class="txt2"><a href="<?php echo $wpsr_donate_link; ?>" target="_blank"><?php _e('and Support', 'wpsr'); ?></a></div>
				</div>
			</div>
			
			<div class="donatePopup">
				<span class="popClose">x</span>
				<strong><?php _e('Make your donation with Paypal', 'wpsr'); ?></strong>
				<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="donations@aakashweb.com">
					<input type="hidden" name="item_name" value="Donation">
					<input type="hidden" name="item_number" value="Donation for WP Socializer plugin">
					<?php _e('Select your Donation amount:', 'wpsr'); ?><br />$
					<select name="amount" class="dd"><?php 
					  for($d=10; $d<80; $d = $d+5){ echo "<option value='$d'>$d</option>"; }
					  for($d=100; $d<305; $d = $d+50){ echo "<option value='$d'>$d</option>"; }
					  ?><option value=""><?php _e('Custom', 'wpsr'); ?></option>
					</select>
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="return" value="http://www.aakashweb.com/?src=donation">
					<input type="submit" class="button" value="<?php _e('Donate with PayPal!', 'wpsr'); ?>">
				</form>
			</div>
			
		</div>
	</div>
	
	<ul id="tabsList">
		<li><a href="#tab-1"><span class='admSprites oneclickIcon'></span>One click<br/>
		<small class="info">Select inbuilt templates</small></a></li>
		
		<h5 class="tabGroup">Customize buttons below</h5>
		
		<li><a href="#tab-2"><span class='admSprites socialButtons'></span>Social Buttons</a></li>
		<li><a href="#tab-3"><span class='admSprites addthisIcon'></span>Addthis</a></li>
		<li><a href="#tab-4"><span class='admSprites sharethisIcon'></span>Sharethis</a></li>
		<li><a href="#tab-5"><span class='admSprites buzzIcon'></span>Google Buzz</a></li>
		<li><a href="#tab-6"><span class='admSprites retweetIcon'></span>Retweet &amp; Digg</a></li>
		<li><a href="#tab-7"><span class='admSprites facebookIcon'></span>Facebook</a></li>
		<li><a href="#tab-8"><span class='admSprites customIcon'></span>Custom</a></li>
		<li class="placementTab"><a href="#tab-9"><span class='admSprites placementIcon'></span>Placement<br/>
		<small class="info">Place buttons in this tab</small></a>
		</li>
		<li><a href="#tab-10"><span class='admSprites settingsIcon'></span><?php _e('Settings', 'wpsr'); ?></a></li>
		
		<h5 class="tabGroup">Links</h5>
		
		<li><a class="outLink" rel="http://www.aakashweb.com/docs/wp-socializer-docs/"><span class='admSprites documentationIcon'></span><?php _e('Documentation', 'wpsr'); ?></a></li>
		<li><a class="outLink" rel="http://www.aakashweb.com/forum/"><span class='admSprites supportIcon'></span><?php _e('Support', 'wpsr'); ?></a></li>
		<li><a class="outLink" rel="http://www.aakashweb.com/wordpress-plugins/wp-socializer/"><span class='admSprites minusIcon'></span><?php _e('Manual Placement', 'wpsr'); ?></a></li>
		<li><a class="outLink" rel="admin.php?page=wp_socializer_other"><span class='admSprites minusIcon'></span>In Widgets</a></li>
		<li><a class="outLink" rel="admin.php?page=wp_socializer_other"><span class='admSprites minusIcon'></span>In Posts</a></li>
		
	</ul>
	
	<!-- Hidden elements -->
	<div class="codePopupInfo" style="display:none">
		<br />
		<small><?php _e('Use the above code <a href="#tab-9">here</a>, to insert the button', 'wpsr'); ?></small>
	</div>
	
	<span class="wpsrVer" style="display:none"><?php echo WPSR_VERSION; ?></span>
	<span class="tmplUrl" style="display:none"><?php echo WPSR_ADMIN_URL . 'templates/templates.xml'; ?></span>
	<span class="tmplImg" style="display:none"><?php echo WPSR_ADMIN_URL . 'templates/'; ?></span>
	<!-- End hidden elements -->
	
<form method="post">
	<!--ONE CLICK -->
	<div id="tab-1" class="tabContent">
		<h4>One click setup</h4>
		<div class="templatesList">
		<img src="<?php echo WPSR_ADMIN_URL; ?>images/one-click-header.jpg" class="imgHead"/>
		<p class="smallText"><?php _e('Select a template and click apply.', 'wpsr'); ?><br/>Selecting the below template will overwrite the current template you are using.</p>
		</div>
		<a href="http://www.aakashweb.com/docs/wp-socializer-docs/creating-a-custom-template/" target="_blank"><?php _e('Create a template', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/docs/wp-socializer-docs/creating-a-custom-template/" target="_blank"><?php _e('Submit a template', 'wpsr'); ?></a>
	</div>
	
	<!-- SOCIAL BTS -->
	<div id="tab-2" class="tabContent">
	<input type="hidden" id="wpsr_socialbt_selected16px" name="wpsr_socialbt_selected16px" value="<?php echo $wpsr_socialbt_selected16px; ?>" />
	<input type="hidden" id="wpsr_socialbt_selected32px" name="wpsr_socialbt_selected32px" value="<?php echo $wpsr_socialbt_selected32px; ?>" />
	<h4><?php _e('Social Buttons', 'wpsr'); ?> <?php wpsr_addcodeico('16px Buttons : {social-bts-16px}' . "\n" . '32px Buttons : {social-bts-32px}'); ?></h4>
	<div class="section">
	<span class="smallText">
	<?php _e('Click the icon size to select and "x" button to remove selected. Click and drag to reorder selected sites', 'wpsr'); ?>
	</span>
	<br />
		<div style="float:left; width:70%;">
		<h5><?php _e('Available buttons', 'wpsr'); ?> <input type="text" id="wpsr_search_buttons" title="<?php _e('Filter buttons', 'wpsr'); ?>" value="<?php _e('Filter', 'wpsr'); ?> ..." alt="<?php _e('Filter', 'wpsr'); ?> ..."/></h5>
		
		<?php 
			$spriteImage16px = WPSR_SOCIALBT_IMGPATH . 'wp-socializer-sprite-16px.png';
			$spriteMaskImage16px = WPSR_SOCIALBT_IMGPATH . 'wp-socializer-sprite-mask-16px.gif';
			
			echo '<ul id="wpsr_socialbt_list">';
			foreach ($wpsr_socialsites_list as $sitename => $property) {
			
				$spritesYCoord = get_sprite_coord($sitename, $wpsr_socialsites_list, '16px');
				$finalSprites = '0px -' . $spritesYCoord . 'px';    'wp-socializer-sprite-mask-16px.gif';
				
				echo 
				"\n<li>" .
				'<img src="' . $spriteMaskImage16px . '" alt="' . $sitename . '" style="background-position:' . $finalSprites . '" />' . 
				'<span class="sb_name">' . $sitename . '</span>' . 
				'<span class="sb_add16px">16</span>';
				
				if($property['support32px'] == 1){
					echo '<span class="sb_add32px">32</span>';
				}
				
			}
			echo '</ul>';
		?>
		</div>
		
		<div style="float:right; width:30%">
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 16px </h4>
			<ul class="wpsr_socialbt_selected_list" id="wpsr_socialbt_selected_list_16px">
			<?php
				$wpsr_socialbt_splited16px = explode(',', $wpsr_socialbt_selected16px);
	
				for($i=0; $i < count($wpsr_socialbt_splited16px); $i++){
					echo "\n<li><span class=\"sb_name\">" . $wpsr_socialbt_splited16px[$i] . '</span><span class="sb_close">x</span></li>';
				}
				
			?>
			</ul>
			
			<div style="clear:both;"></div>
			
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 32px</h4>
			<ul class="wpsr_socialbt_selected_list" id="wpsr_socialbt_selected_list_32px">
			<?php
				$wpsr_socialbt_splited32px = explode(',', $wpsr_socialbt_selected32px);
	
				for($i=0; $i < count($wpsr_socialbt_splited32px); $i++){
					echo "\n<li><span class=\"sb_name\">" . $wpsr_socialbt_splited32px[$i] . '</span><span class="sb_close">x</span></li>';
				}
				
			?>
			</ul>
		</div>
		
		<span style="clear:both; display:block"></span>
		
	</div>
	
	<h4><?php _e('Settings', 'wpsr'); ?></h4>
	<div class="section">
	<table width="100%" border="0">
      <tr>
        <td height="35"><?php _e('Open links in new tab/window', 'wpsr'); ?></td>
        <td><select id="wpsr_socialbt_target" name="wpsr_socialbt_target">
          <option <?php echo $wpsr_socialbt_target == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_socialbt_target == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="35"><?php _e('Image on Hover effect', 'wpsr'); ?> </td>
        <td><select id="wpsr_socialbt_effect" name="wpsr_socialbt_effect">
          <option <?php echo $wpsr_socialbt_effect == 'jump' ? ' selected="selected"' : ''; ?> value="jump">Jump Effect</option>
          <option <?php echo $wpsr_socialbt_effect == 'opacity' ? ' selected="selected"' : ''; ?> value="opacity">Transparency Effect</option>
		  <option <?php echo $wpsr_socialbt_effect == 'none' ? ' selected="selected"' : ''; ?> value="none"><?php _e('No Effect', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="40"><?php _e('Show Label for buttons', 'wpsr'); ?> </td>
        <td><select id="wpsr_socialbt_label" name="wpsr_socialbt_label">
          <option <?php echo $wpsr_socialbt_label == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_socialbt_label == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="53"><?php _e('Show Icons in', 'wpsr'); ?> <br />
		<span class="smallText"><?php _e('Very very effective when labels are enabled (try it)', 'wpsr'); ?></span>		</td>
        <td><select id="wpsr_socialbt_columns" name="wpsr_socialbt_columns">
          <option <?php echo $wpsr_socialbt_columns == 'no' ? ' selected="selected"' : ''; ?> value="no">No Column</option>
          <option <?php echo $wpsr_socialbt_columns == '5' ? ' selected="selected"' : ''; ?> value="5">5 Columns</option>
		  <option <?php echo $wpsr_socialbt_columns == '4' ? ' selected="selected"' : ''; ?> value="4">4 Columns</option>
		  <option <?php echo $wpsr_socialbt_columns == '3' ? ' selected="selected"' : ''; ?> value="3">3 Columns</option>
		  <option <?php echo $wpsr_socialbt_columns == '2' ? ' selected="selected"' : ''; ?> value="2">2 Columns</option>
        </select></td>
      </tr>
      <tr>
        <td height="53"><?php _e('Image folder', 'wpsr'); ?><br />
		<span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>		</td>
        <td> 
          <input name="wpsr_socialbt_imgpath16px" type="text" id="wpsr_socialbt_imgpath16px" value="<?php echo $wpsr_socialbt_imgpath16px; ?>" size="40" />
          (16px)<br />
		   
          <input name="wpsr_socialbt_imgpath32px" type="text" id="wpsr_socialbt_imgpath32px" value="<?php echo $wpsr_socialbt_imgpath32px; ?>" size="40" />
          (32px)</td>
      </tr>
      <tr>
        <td height="35"><?php _e('Use Sprites', 'wpsr'); ?></td>
        <td><select id="wpsr_socialbt_usesprites" name="wpsr_socialbt_usesprites">
          <option <?php echo $wpsr_socialbt_usesprites == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_socialbt_usesprites == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
      </tr>
    </table>
	</div>

	</div>
	
	<!-- ADDTHIS PAGE -->
	<div id="tab-3" class="tabContent">
	
		<h4>Toolbox</h4>
		<div class="section">
		  <table width="100%" height="139" border="0" class="tableClr">

            <tr>
              <th height="30">Toolbox type </th>
              <th><?php _e('Services', 'wpsr'); ?></th>
            </tr>
            <tr>
              <td width="35%" height="53"><label for="wpsr_addthis_tb_16pxservices"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/addthis-tb-16px.png" title="16px Icons"/></label></td>
              <td width="65%"><input name="wpsr_addthis_tb_16pxservices" type="text" id="wpsr_addthis_tb_16pxservices" value="<?php echo $wpsr_addthis_tb_16pxservices; ?>" size="35" /> <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_addthis_tb_16pxservices&bt=addthis&val=', 'wpsr_addthis_tb_16pxservices');" />
			  <?php wpsr_addcodeico('{addthis-tb-16px}'); ?>
			  <br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>
			  
			  </td>
            </tr>
            <tr>
              <td height="48"><label for="wpsr_addthis_tb_32pxservices"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/addthis-tb-32px.png" title="32px Icons"/></label></td>
              <td><input name="wpsr_addthis_tb_32pxservices" type="text" id="wpsr_addthis_tb_32pxservices" value="<?php echo $wpsr_addthis_tb_32pxservices; ?>" size="35" /> <input class="button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_addthis_tb_32pxservices&bt=addthis&val=', 'wpsr_addthis_tb_32pxservices');"/>
			  <?php wpsr_addcodeico('{addthis-tb-32px}'); ?>
			  <br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span>
			  
			  </td>
            </tr>
          </table>
		</div>
		
		<h4>Sharecount <?php wpsr_addcodeico('{addthis-sc}'); ?></h4>
		<div class="section">
		  <table width="100%" height="100" border="0">
            <tr>
              <td height="54"><label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="normal" <?php echo $wpsr_addthis_sharecount == 'normal' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/sharecount-vertical.png" title="Sharecount - Large"/></label></td>
              <td><label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="pill" <?php echo $v == 'pill' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/sharecount-horizontal.png" title="Sharecount - Pill style"/></label></td>
            </tr>
            <tr>
              <td height="40" colspan="2"><label><input name="wpsr_addthis_sharecount" id="wpsr_addthis_sharecount" type="radio" value="grouped" <?php echo $wpsr_addthis_sharecount == 'grouped' ? ' checked="checked"' : ''; ?> /> <img src="http://cache.addthiscdn.com/www/q0197/images/gtc-like-tweet-share.png" title="Sharecount - grouped"/></label></td>
            </tr>
          </table>
		</div>
		
		<h4><?php _e('Buttons', 'wpsr'); ?> <?php wpsr_addcodeico('{addthis-bt}'); ?></h4>
		<div class="section">
		<table width="100%" height="42" border="0">
          <tr>
            <td height="38"><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="lg-share-" <?php echo $wpsr_addthis_button == 'lg-share-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/lg-share-<?php echo $wpsr_addthis_lang; ?>.gif" alt="Share button - Large"/></label></td>
			
            <td><label>
            <input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="sm-share-" <?php echo $wpsr_addthis_button == 'sm-share-' ? ' checked="checked"' : ''; ?> />
            <img src="http://s7.addthis.com/static/btn/v2/sm-share-en.gif" alt="Share button - Small"/></label></td>
          </tr>
        </table>
		</div>

		<h4><?php _e('Optional button Settings', 'wpsr'); ?></h4>
		<div class="section">
		<table width="100%" border="0">
          <tr>
            <td height="52"><label for="wpsr_addthis_username"><?php _e('Add This Username', 'wpsr'); ?></label></td>
            <td><input type="text" id="wpsr_addthis_username"  name="wpsr_addthis_username" value="<?php echo $wpsr_addthis_username; ?>" />
              <br />
              <span class="smallText">
              <?php _e('If available', 'wpsr'); ?>
              </span></td>
            <td><label for="wpsr_addthis_lang"><?php _e('Language', 'wpsr'); ?></label></td>
            <td><select name="wpsr_addthis_lang" id="wpsr_addthis_lang">
              <?php foreach ($wpsr_addthis_lang_array as $lang=>$name){echo "<option value=\"$lang\"". ($lang == $wpsr_addthis_lang ? " selected":"") . ">$name</option>";}?>
            </select>            </td>
          </tr>
          <tr>
            <td width="13%" height="52"><label for="wpsr_addthis_btbrand"><?php _e('Brand Name', 'wpsr'); ?></label></td>
            <td width="30%"><input name="wpsr_addthis_btbrand" id="wpsr_addthis_btbrand" type="text" value="<?php echo $wpsr_addthis_btbrand; ?>"/><br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span></td>
			
            <td width="14%"><label for="wpsr_addthis_clickback"><?php _e('Track Clickback', 'wpsr'); ?></label></td>
            <td width="43%"><select id="wpsr_addthis_clickback" name="wpsr_addthis_clickback">
          <option <?php echo $wpsr_addthis_clickback == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_addthis_clickback == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
          </tr>
          <tr>
            <td><?php _e('Header Color', 'wpsr'); ?></td>
            <td><input name="wpsr_addthis_btheadclr" id="wpsr_addthis_btheadclr" type="text" value="<?php echo $wpsr_addthis_btheadclr; ?>"/></td>
            <td><?php _e('Header Background', 'wpsr'); ?></td>
            <td><input name="wpsr_addthis_btheadbgclr" id="wpsr_addthis_btheadbgclr" type="text" value="<?php echo $wpsr_addthis_btheadbgclr; ?>"/></td>
          </tr>
        </table>
		</div>
		
	</div><!-- Addthis box -->
	
	<!-- SHARETHIS PAGE -->
	<div id="tab-4" class="tabContent">
		<h4>Sharethis</h4>
		<div class="section">
		  <table width="100%" height="517" border="0" class="tableClr">
		  	<tr>
              <th width="50%" height="21"><?php _e('Buttons', 'wpsr'); ?><br />
			  <span class="smallText"><?php _e('Button type', 'wpsr'); ?></span></th>
              <th width="50%"><?php _e('Button Order', 'wpsr'); ?><br />
			  <span class="smallText"><?php _e('Reorder, remove or add social buttons', 'wpsr'); ?></span></th>
            </tr>
            <tr>
              <td width="50%" height="69"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-vcount.png" /></td>
              <td width="50%"><input name="wpsr_sharethis_vcount_order" id="wpsr_sharethis_vcount_order" type="text" value="<?php echo $wpsr_sharethis_vcount_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_vcount_order&bt=sharethis&val=', 'wpsr_sharethis_vcount_order');" /><?php wpsr_addcodeico('{sharethis-vcount}'); ?></td>
            </tr>
            <tr>
              <td height="64"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-hcount.png" /></td>
              <td><input name="wpsr_sharethis_hcount_order" id="wpsr_sharethis_hcount_order" type="text" value="<?php echo $wpsr_sharethis_hcount_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_hcount_order&bt=sharethis&val=', 'wpsr_sharethis_hcount_order');" /><?php wpsr_addcodeico('{sharethis-hcount}'); ?></td>
            </tr>
            <tr>
              <td height="65"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-buttons.png" /></td>
              <td><input name="wpsr_sharethis_buttons_order" id="wpsr_sharethis_buttons_order" type="text" value="<?php echo $wpsr_sharethis_buttons_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_buttons_order&bt=sharethis&val=', 'wpsr_sharethis_buttons_order');" /><?php wpsr_addcodeico('{sharethis-bt}'); ?></td>
            </tr>
            <tr>
              <td height="67"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-large.png" /></td>
              <td><input name="wpsr_sharethis_large_order" id="wpsr_sharethis_large_order" type="text" value="<?php echo $wpsr_sharethis_large_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_large_order&bt=sharethis&val=', 'wpsr_sharethis_large_order');" /><?php wpsr_addcodeico('{sharethis-large}'); ?></td>
            </tr>
            <tr>
              <td height="70"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-regular.png" /></td>
              <td><input name="wpsr_sharethis_regular_order" id="wpsr_sharethis_regular_order" type="text" value="<?php echo $wpsr_sharethis_regular_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_regular_order&bt=sharethis&val=', 'wpsr_sharethis_regular_order');" /><?php wpsr_addcodeico('{sharethis-regular}'); ?></td>
            </tr>
            <tr>
              <td height="75"><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-regular-notext.png" /></td>
              <td><input name="wpsr_sharethis_regular2_order" id="wpsr_sharethis_regular2_order" type="text" value="<?php echo $wpsr_sharethis_regular2_order; ?>"/>
			  <input class="submit button" type="button" value="Select services" onclick="openServiceSelctor('<?php echo WPSR_ADMIN_URL; ?>wpsr-services-selector.php?id=wpsr_sharethis_regular2_order&bt=sharethis&val=', 'wpsr_sharethis_regular2_order');" /><?php wpsr_addcodeico('{sharethis-regular2}'); ?></td>
            </tr>
            <tr>
              <td><img src="<?php echo WPSR_ADMIN_URL; ?>images/buttons/sharethis-classic.png" /></td>
              <td><?php wpsr_addcodeico('{sharethis-classic}'); ?></td>
            </tr>
          </table>
		</div>
		
		<h4><?php _e('Settings', 'wpsr'); ?></h4>
		<div class="section">
			<table width="100%" height="100" border="0">
			  <tr>
				<td width="31%" height="49"><label for="wpsr_sharethis_pubkey">Sharethis Publisher Key</label></td>
				<td width="69%"><input name="wpsr_sharethis_pubkey" type="text" id="wpsr_sharethis_pubkey" value="<?php echo $wpsr_sharethis_pubkey; ?>" size="50" /><br /><span class="smallText"><?php _e('You can see you publisher key in this page. ', 'wpsr'); ?> <a href="http://sharethis.com/account/" target="_blank"><?php _e('Click here', 'wpsr'); ?></a></span></td>
			  </tr>
			  <tr>
			    <td><label for="wpsr_sharethis_addp">Automatically wrap with paragraph</label></td>
			    <td><select id="wpsr_sharethis_addp" name="wpsr_sharethis_addp">
          <option <?php echo $wpsr_sharethis_addp == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_sharethis_addp == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
		      </tr>
			</table>
		</div>
		
	</div>
	
	<!-- GOOGLE BUZZ PAGE -->
	<div id="tab-5" class="tabContent">
		<p class="notice"><strong>Note:</strong> Google Buzz will shutdown in a Week. <a href="http://googleblog.blogspot.com/2011/10/fall-sweep.html" target="_blank">Source</a></p>
		
		<h4><?php _e('Post to Buzz button', 'wpsr'); ?><?php wpsr_addcodeico('{buzz-post}'); ?></h4>
		<div class="section">
		<table width="100%" height="181" border="0">
          <tr>
            <td width="29%" height="21"><?php _e('Style', 'wpsr'); ?></td>
            <td width="71%" rowspan="2">
			<label><input name="wpsr_buzz_style" id="wpsr_buzz_style" type="radio" value="count" <?php echo $wpsr_buzz_style == 'count' ? ' checked="checked"' : ''; ?> /> <?php _e('Show Button and counter', 'wpsr'); ?></label><br />
			<label><input name="wpsr_buzz_style" id="wpsr_buzz_style" type="radio" value="button" <?php echo $wpsr_buzz_style == 'button' ? ' checked="checked"' : ''; ?> /> <?php _e('Show Button only', 'wpsr'); ?></label><br />
			<label><input name="wpsr_buzz_style" id="wpsr_buzz_style" type="radio" value="link" <?php echo $wpsr_buzz_style == 'link' ? ' checked="checked"' : ''; ?> /> <?php _e('Show Link only', 'wpsr'); ?></label>			</td>
          </tr>
          <tr>
            <td height="53">&nbsp;</td>
          </tr>
          <tr>
            <td height="63"><?php _e('Size', 'wpsr'); ?><br /><span class="smallText"><?php _e('Not for link', 'wpsr'); ?></span></td>
            <td><label><input name="wpsr_buzz_size" id="wpsr_buzz_size" type="radio" value="normal" <?php echo $wpsr_buzz_size == 'normal' ? ' checked="checked"' : ''; ?> /> <?php _e('Normal', 'wpsr'); ?></label>
              <br />
              <label><input name="wpsr_buzz_size" id="wpsr_buzz_size" type="radio" value="small" <?php echo $wpsr_buzz_size == 'small' ? ' checked="checked"' : ''; ?> /> <?php _e('Small', 'wpsr'); ?></label></td>
          </tr>
          <tr>
            <td height="34"><label for="wpsr_buzz_lang"><?php _e('Language', 'wpsr'); ?></label></td>
            <td><select name="wpsr_buzz_lang" id="wpsr_buzz_lang"><?php foreach ($wpsr_buzz_lang_array as $lang=>$name){echo "<option value=\"$lang\"". ($lang == $wpsr_buzz_lang ? " selected":"") . ">$name</option>";}?></select></td>
          </tr>
        </table>
		</div>

		<h4><?php _e('Follow on Buzz button', 'wpsr'); ?><?php wpsr_addcodeico('{buzz-follow}'); ?></h4>
		<div class="section">
		<table width="100%" border="0">
          <tr>
            <td width="30%"><label for="wpsr_buzz_profile"><?php _e('Profile URL', 'wpsr'); ?></label></td>
            <td width="70%"><input name="wpsr_buzz_profile" id="wpsr_buzz_profile" type="text" value="<?php echo $wpsr_buzz_profile ?>" size="35"/><br /><span class="smallText"><?php _e('Don\'t know your profile URL?', 'wpsr'); ?> <a href="http://profiles.google.com/me" target="_blank"><?php _e('Click here', 'wpsr'); ?></a></span></td>
          </tr>
          <tr>
            <td height="36"><label for="wpsr_buzz_followbttext"><?php _e('Button Text', 'wpsr'); ?></label></td>
            <td><input name="wpsr_buzz_followbttext" id="wpsr_buzz_followbttext" type="text" value="<?php echo $wpsr_buzz_followbttext ?>" size="35"/></td>
          </tr>
        </table>
		</div>
		
	</div><!-- Buzz box -->
	
	<!-- RETWEET AND DIGG PAGE -->
	<div id="tab-6" class="tabContent">
	
		<h4><?php _e('General', 'wpsr'); ?><?php wpsr_addcodeico('{retweet-bt}'); ?></h4>
		<div class="section">
		<table width="100%" height="76" border="0">
		  <tr>
			<td width="30%" height="37"><label for="wpsr_retweet_username"><?php _e('Twitter Username', 'wpsr'); ?></label></td>
			<td width="70%">@<input name="wpsr_retweet_username" id="wpsr_retweet_username" type="text" value="<?php echo $wpsr_retweet_username; ?>"/></td>
		  </tr>
		  <tr>
			<td><label for="wpsr_retweet_type"><?php _e('Retweet Button Type', 'wpsr'); ?></label></td>
			<td><select id="wpsr_retweet_type" name="wpsr_retweet_type">
			  <option <?php echo $wpsr_retweet_type == 'normal' ? ' selected="selected"' : ''; ?> value="normal"><?php _e('Normal (Big)', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_retweet_type == 'compact' ? ' selected="selected"' : ''; ?> value="compact"><?php _e('Compact', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_retweet_type == 'nocount' ? ' selected="selected"' : ''; ?> value="nocount"><?php _e('No Count (only for Twitter\'s Official Button)', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		</table>
		</div>
		
		<h4><?php _e('Choose a service', 'wpsr'); ?></h4>
		<div class="section">
		<table width="100%" border="0">
		  <tr>
			<td width="30%"><label for="wpsr_retweet_service"><?php _e('Retweet Service', 'wpsr'); ?></label></td>
			<td width="70%"><select id="wpsr_retweet_service" name="wpsr_retweet_service">
			  <option <?php echo $wpsr_retweet_service == 'twitter' ? ' selected="selected"' : ''; ?> value="twitter"><?php _e('Twitter\'s Official Button', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_retweet_service == 'tweetmeme' ? ' selected="selected"' : ''; ?> value="tweetmeme">TweetMeme</option>
			  <option <?php echo $wpsr_retweet_service == 'topsy' ? ' selected="selected"' : ''; ?> value="topsy">Topsy</option>
			  <option <?php echo $wpsr_retweet_service == 'retweet' ? ' selected="selected"' : ''; ?> value="retweet">Retweet</option>
			</select>
	
			<div id="wpsr_retweet_topsysettings">
			<table width="100%" border="0">
			  <tr>
				<td width="32%"><?php _e('Select a theme for topsy', 'wpsr'); ?></td>
				<td width="68%">
				  <select id="wpsr_retweet_topsytheme" name="wpsr_retweet_topsytheme">
					<option value="blue" <?php echo $wpsr_retweet_topsytheme == 'blue' ? ' selected="selected"' : ''; ?> >blue</option>
					<option value="brown" <?php echo $wpsr_retweet_topsytheme == 'brown' ? ' selected="selected"' : ''; ?>>brown</option>
					<option value="jade" <?php echo $wpsr_retweet_topsytheme == 'jade' ? ' selected="selected"' : ''; ?>>jade</option>
					<option value="brick-red" <?php echo $wpsr_retweet_topsytheme == 'brick-red' ? ' selected="selected"' : ''; ?>>brick-red</option>
					<option value="sea-foam" <?php echo $wpsr_retweet_topsytheme == 'sea-foam' ? ' selected="selected"' : ''; ?>>sea-foam</option>
					<option value="mustard" <?php echo $wpsr_retweet_topsytheme == 'mustard' ? ' selected="selected"' : ''; ?>>mustard</option>
					<option value="hot-pink" <?php echo $wpsr_retweet_topsytheme == 'hot-pink' ? ' selected="selected"' : ''; ?>>hot-pink</option>
				  </select>
				</td>
			  </tr>
			</table>
			</div>
			
			<div id="wpsr_retweet_twittersettings">			
			<table width="100%" height="75" border="0">
			  <tr>
				<td width="32%" height="34"><?php _e('Recommend people', 'wpsr'); ?> </td>
				<td width="68%"><input name="wpsr_retweet_twitter_recacc" type="text" id="wpsr_retweet_twitter_recacc" value="<?php echo $wpsr_retweet_twitter_recacc; ?>" size="40"/><br />
				<span class="smallText"><?php _e('Twitter Username: Description (Optional)', 'wpsr'); ?></span>
				</td>
			  </tr>
			  <tr>
				<td><?php _e('Language', 'wpsr'); ?></td>
				<td><select id="wpsr_retweet_twitter_lang" name="wpsr_retweet_twitter_lang">
				  <option value="en" <?php echo $wpsr_retweet_twitter_lang == 'en' ? ' selected="selected"' : ''; ?>>English</option>
				  <option value="fr" <?php echo $wpsr_retweet_twitter_lang == 'fr' ? ' selected="selected"' : ''; ?>>French</option>
				  <option value="de" <?php echo $wpsr_retweet_twitter_lang == 'de' ? ' selected="selected"' : ''; ?>>German</option>
				  <option value="es" <?php echo $wpsr_retweet_twitter_lang == 'es' ? ' selected="selected"' : ''; ?>>Spanish</option>
				  <option value="ja" <?php echo $wpsr_retweet_twitter_lang == 'ja' ? ' selected="selected"' : ''; ?>>Japanese</option>
				</select></td>
			  </tr>
			</table>
			</div>
			
			</td>
		  </tr>
		</table>
		</div>
	
		<h4><?php _e('Digg Button', 'wpsr'); ?><?php wpsr_addcodeico('{digg-bt}'); ?></h4>
		<div class="section">
		<table width="100%" border="0">
		  <tr>
			<td width="31%"><label for="wpsr_digg_type"><?php _e('Digg Button type', 'wpsr'); ?></label></td>
			<td width="69%"><select id="wpsr_digg_type" name="wpsr_digg_type">
			  <option <?php echo $wpsr_digg_type == 'DiggMedium' ? ' selected="selected"' : ''; ?> value="DiggMedium"><?php _e('Medium', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_digg_type == 'DiggWide' ? ' selected="selected"' : ''; ?> value="DiggLarge"><?php _e('Wide', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_digg_type == 'DiggCompact' ? ' selected="selected"' : ''; ?> value="DiggCompact"><?php _e('Compact', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_digg_type == 'DiggIcon' ? ' selected="selected"' : ''; ?> value="DiggIcon"><?php _e('Icon', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		</table>
		</div>
	
	</div>
	
	<!-- FACEBOOK PAGE -->
	<div id="tab-7" class="tabContent">
		<h4><?php _e('Like Button', 'wpsr'); ?><?php wpsr_addcodeico('{facebook-like}'); ?></h4>
		<div class="section">
		<table width="100%" border="0">
		  <tr>
			<td width="30%" height="31"><label for="wpsr_facebook_btstyle"><?php _e('Button Style', 'wpsr'); ?></label></td>
			<td width="70%"><select id="wpsr_facebook_btstyle" name="wpsr_facebook_btstyle">
			  <option <?php echo $wpsr_facebook_btstyle == 'standard' ? ' selected="selected"' : ''; ?> value="standard"><?php _e('Standard', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_btstyle == 'button_count' ? ' selected="selected"' : ''; ?> value="button_count"><?php _e('Button count', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_btstyle == 'box_count' ? ' selected="selected"' : ''; ?> value="box_count"><?php _e('Box count', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td height="35"><label for="wpsr_facebook_showfaces"><?php _e('Show Faces', 'wpsr'); ?></label></td>
			<td><select id="wpsr_facebook_showfaces" name="wpsr_facebook_showfaces">
			  <option <?php echo $wpsr_facebook_showfaces == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_showfaces == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td height="49"><label for="wpsr_facebook_width"><?php _e('Width', 'wpsr'); ?></label></td>
			<td><input name="wpsr_facebook_width" id="wpsr_facebook_width" type="text" value="<?php echo $wpsr_facebook_width; ?>"/><br /><span class="smallText"><?php _e('In pixels', 'wpsr'); ?></span></td>
		  </tr>
		  <tr>
			<td height="35"><label for="wpsr_facebook_verb"><?php _e('Verb to Display', 'wpsr'); ?></label></td>
			<td><select id="wpsr_facebook_verb" name="wpsr_facebook_verb">
			  <option <?php echo $wpsr_facebook_verb == 'like' ? ' selected="selected"' : ''; ?> value="like"><?php _e('Like', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_verb == 'recommend' ? ' selected="selected"' : ''; ?> value="recommend"><?php _e('Recommend', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		  <tr>
			<td height="37"><label for="wpsr_facebook_font"><?php _e('Font', 'wpsr'); ?></label></td>
			<td><select id="wpsr_facebook_font" name="wpsr_facebook_font">
			  <option <?php echo $wpsr_facebook_font == 'arial' ? ' selected="selected"' : ''; ?> value="arial">Arial</option>
			  <option <?php echo $wpsr_facebook_font == 'lucida grande' ? ' selected="selected"' : ''; ?> value="lucida grande">Lucida Grande</option>
			  <option <?php echo $wpsr_facebook_font == 'segoe ui' ? ' selected="selected"' : ''; ?> value="segoe ui">Segoe UI</option>
			  <option <?php echo $wpsr_facebook_font == 'tahoma' ? ' selected="selected"' : ''; ?> value="tahoma">Tahoma</option>
			  <option <?php echo $wpsr_facebook_font == 'trebuchet ms' ? ' selected="selected"' : ''; ?> value="trebuchet ms">Trebuchet MS</option>
			  <option <?php echo $wpsr_facebook_font == 'verdana' ? ' selected="selected"' : ''; ?> value="verdana">Verdana</option>
			</select></td>
		  </tr>
		  <tr>
			<td height="38"><label for="wpsr_facebook_color"><?php _e('Color scheme', 'wpsr'); ?></label></td>
			<td><select id="wpsr_facebook_color" name="wpsr_facebook_color">
			  <option <?php echo $wpsr_facebook_color == 'light' ? ' selected="selected"' : ''; ?> value="light"><?php _e('Light', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_color == 'dark' ? ' selected="selected"' : ''; ?> value="dark"><?php _e('Dark', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		</table>
		</div>
		
		<p class="notice"><strong>Note:</strong> The Facebook share button has been deprecated. Try using the like button. <a href="https://developers.facebook.com/docs/share/" target="_blank">Source</a></p>
		
		<h4><?php _e('Share Button', 'wpsr'); ?><?php wpsr_addcodeico('{facebook-share}'); ?></h4>
		<div class="section">	
		<table width="100%" height="121" border="0">
		  <tr>
			<td width="30%" height="47"><?php _e('Style', 'wpsr'); ?></td>
			<td width="70%">
			<label><input name="wpsr_facebook_shstyle" id="wpsr_facebook_shstyle" type="radio" value="button" <?php echo $wpsr_facebook_shstyle == 'button' ? ' checked="checked"' : ''; ?> /><?php _e('Button', 'wpsr'); ?></label>
				  <br />
				  <label><input name="wpsr_facebook_shstyle" id="wpsr_facebook_shstyle" type="radio" value="link" <?php echo $wpsr_facebook_shstyle == 'link' ? ' checked="checked"' : ''; ?> /><?php _e('Link', 'wpsr'); ?></label></td>
		  </tr>
		  <tr>
			<td height="68"><?php _e('Show Counter', 'wpsr'); ?><br /><span class="smallText"><?php _e('Not for link', 'wpsr'); ?></span></td>
			<td><select id="wpsr_facebook_counter" name="wpsr_facebook_counter">
			  <option <?php echo $wpsr_facebook_counter == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			  <option <?php echo $wpsr_facebook_counter == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
			</select><br />
			<span id="wpsr_facebook_counterplacement">
				<label><input name="wpsr_facebook_counterplacement" id="wpsr_facebook_counterplacement" type="radio" value="above" <?php echo $wpsr_facebook_counterplacement == 'above' ? ' checked="checked"' : ''; ?> /><?php _e('Above the button', 'wpsr'); ?></label>
				  <br />
				  <label><input name="wpsr_facebook_counterplacement" id="wpsr_facebook_counterplacement" type="radio" value="inline" <?php echo $wpsr_facebook_counterplacement == 'inline' ? ' checked="checked"' : ''; ?> /><?php _e('Inline with the Button', 'wpsr'); ?></label>
			</span>		</td>
		  </tr>
		</table>
		</div>

	</div>
	
	<!-- CUSTOM BUTTONS PAGE -->
	<div id="tab-8" class="tabContent">
		<h4><?php _e('Custom 1', 'wpsr'); ?><?php wpsr_addcodeico('{custom-1}'); ?></h4>
		<div class="section">
		<textarea name="wpsr_custom1" id="wpsr_custom1" cols="60" rows="8" class="custom_box"><?php echo $wpsr_custom1; ?></textarea><br />
		<span class="smallText"><?php printf(__('Enter any share button code. Use %s for the page url and %s for page title', 'wpsr'), '{url}', '{title}'); ?></span>
		</div>
		
		<h4><?php _e('Custom 2', 'wpsr'); ?><?php wpsr_addcodeico('{custom-2}'); ?></h4>
		<div class="section">
		<textarea name="wpsr_custom2" id="wpsr_custom2" cols="60" rows="8" class="custom_box"><?php echo $wpsr_custom2; ?></textarea><br />
		<span class="smallText"><?php printf(__('Enter any share button code. Use %s for the page url and %s for page title', 'wpsr'), '{url}', '{title}'); ?></span>
		</div>
	
	</div>
	
	<!-- TEMPLATE PAGE -->
	<div id="tab-9" class="tabContent">
	
	<p class="notice">If you want to edit or use an already made template, then select it from the "<strong>One click</strong>" tab</p>
	
	<div class="subTabs">
		<ul class="subTabList">
			<li><a href="#sub-tab-1"><?php _e('Template 1', 'wpsr'); ?></a></li>
			<li><a href="#sub-tab-2"><?php _e('Template 2', 'wpsr'); ?></a></li>
		</ul>
		
	<div id="sub-tab-1" class="subTabContent">
		<div class="section">
		
		<div class="templateInfo"><?php _e('Use the menu below to insert the buttons into the template', 'wpsr'); ?><br />
		<?php _e('All HTML/CSS tags can be used. The button codes can be wrapped with HTML tags for proper aligning.', 'wpsr'); ?>
		</div>
		
		<div class="toolbarWrap">
			<?php wpsr_addtoolbar('wpsr_template1_content'); ?>
			<textarea name="wpsr_template1_content" id="wpsr_template1_content" rows="10"><?php echo $wpsr_template1_content; ?></textarea>
		</div>

		<div class="placement_options">
		
		  <table width="100%" height="237" border="0">
            <tr>
              <td height="38" colspan="3"><label>
                <input name="wpsr_template1_addp" type="checkbox" value="1" <?php echo $wpsr_template1_addp == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Automatically add paragraphs', 'wpsr'); ?>
              </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="36" colspan="4"><h4><?php _e('Where to show these buttons ?', 'wpsr'); ?></h4></td>
              </tr>
            <tr>
              <td height="107" colspan="3">
			  
		<label><input name="wpsr_template1_inhome" id="wpsr_template1_inhome" type="checkbox" value="1" <?php echo $wpsr_template1_inhome == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in front page', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_insingle" id="wpsr_template1_insingle" type="checkbox" value="1" <?php echo $wpsr_template1_insingle == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in individual posts', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_inpage" id="wpsr_template1_inpage" type="checkbox" value="1" <?php echo $wpsr_template1_inpage == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_incategory" id="wpsr_template1_incategory" type="checkbox" value="1" <?php echo $wpsr_template1_incategory == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in archive pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_intag" id="wpsr_template1_intag" type="checkbox" value="1" <?php echo $wpsr_template1_intag == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Tag pages', 'wpsr'); ?></label> <br />		</td>
              <td width="41%">
		<label><input name="wpsr_template1_indate" id="wpsr_template1_indate" type="checkbox" value="1" <?php echo $wpsr_template1_indate == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in date archives', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_inauthor" id="wpsr_template1_inauthor" type="checkbox" value="1" <?php echo $wpsr_template1_inauthor == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in author pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_insearch" id="wpsr_template1_insearch" type="checkbox" value="1" <?php echo $wpsr_template1_insearch == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in search pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_inexcerpt" id="wpsr_template1_inexcerpt" type="checkbox" value="1" <?php echo $wpsr_template1_inexcerpt == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Excerpt', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template1_infeed" id="wpsr_template1_infeed" type="checkbox" value="1" <?php echo $wpsr_template1_infeed == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in RSS feeds', 'wpsr'); ?></label>			  </td>
            </tr>
            <tr>
              <td width="12%"><strong>
                <?php _e('Position', 'wpsr'); ?>
              </strong></td>
              <td width="22%"><label><input name="wpsr_template1_abvcontent" id="wpsr_template1_abvcontent" type="checkbox" value="1" <?php echo $wpsr_template1_abvcontent == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Above content', 'wpsr'); ?></label></td>
              <td width="25%"><label><input name="wpsr_template1_blwcontent" id="wpsr_template1_blwcontent" type="checkbox" value="1" <?php echo $wpsr_template1_blwcontent == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Below content', 'wpsr'); ?></label></td>
              <td>&nbsp;</td>
            </tr>
          </table>
		</div><!-- Placement Options -->
		
		</div><!-- Section -->
	</div><!-- Sub tab 1 -->
		
	<div id="sub-tab-2" class="subTabContent">		
	<div class="section">
	
		<div class="templateInfo"><?php _e('Use the menu below to insert the buttons into the template', 'wpsr'); ?><br />
			<?php _e('All HTML/CSS tags can be used. The button codes can be wrapped with HTML tags for proper aligning.', 'wpsr'); ?>
		</div>
		
		<div class="toolbarWrap">
			<?php wpsr_addtoolbar('wpsr_template2_content'); ?>
			<textarea name="wpsr_template2_content" id="wpsr_template2_content" rows="10"><?php echo $wpsr_template2_content; ?></textarea>
		</div>

		<div class="placement_options">
		
		  <table width="100%" height="237" border="0">
            <tr>
              <td height="38" colspan="3"><label>
                <input name="wpsr_template2_addp" id="wpsr_template2_addp" type="checkbox" value="1" <?php echo $wpsr_template2_addp == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Automatically add paragraphs', 'wpsr'); ?>
              </label></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="36" colspan="4"><h4><?php _e('Where to show these buttons ?', 'wpsr'); ?></h4></td>
              </tr>
            <tr>
              <td height="107" colspan="3">
			  
		<label><input name="wpsr_template2_inhome" id="wpsr_template2_inhome" type="checkbox" value="1" <?php echo $wpsr_template2_inhome == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in front page', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_insingle" id="wpsr_template2_insingle" type="checkbox" value="1" <?php echo $wpsr_template2_insingle == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in individual posts', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_inpage" id="wpsr_template2_inpage" type="checkbox" value="1" <?php echo $wpsr_template2_inpage == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_incategory" id="wpsr_template2_incategory" type="checkbox" value="1" <?php echo $wpsr_template2_incategory == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in archive pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_intag" id="wpsr_template2_intag" type="checkbox" value="1" <?php echo $wpsr_template2_intag == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Tag pages', 'wpsr'); ?></label> <br />		</td>
              <td width="41%">
		<label><input name="wpsr_template2_indate" id="wpsr_template2_indate" type="checkbox" value="1" <?php echo $wpsr_template2_indate == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in date archives', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_inauthor" id="wpsr_template2_inauthor" type="checkbox" value="1" <?php echo $wpsr_template2_inauthor == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in author pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_insearch" id="wpsr_template2_insearch" type="checkbox" value="1" <?php echo $wpsr_template2_insearch == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in search pages', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_inexcerpt" id="wpsr_template2_inexcerpt" type="checkbox" value="1" <?php echo $wpsr_template2_inexcerpt == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Excerpt', 'wpsr'); ?></label> <br />
		
		<label><input name="wpsr_template2_infeed" id="wpsr_template2_infeed" type="checkbox" value="1" <?php echo $wpsr_template2_infeed == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in RSS feeds', 'wpsr'); ?></label>			  </td>
            </tr>
            <tr>
              <td width="12%"><strong><?php _e('Position', 'wpsr'); ?></strong></td>
              <td width="22%"><label><input name="wpsr_template2_abvcontent" id="wpsr_template2_abvcontent" type="checkbox" value="1" <?php echo $wpsr_template2_abvcontent == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Above content', 'wpsr'); ?></label></td>
              <td width="25%"><label><input name="wpsr_template2_blwcontent" id="wpsr_template2_blwcontent" type="checkbox" value="1" <?php echo $wpsr_template2_blwcontent == "1" ? 'checked="checked"' : ""; ?> />
                <?php _e('Below content', 'wpsr'); ?></label></td>
              <td>&nbsp;</td>
            </tr>
          </table>
		</div><!-- Placement Options -->
	
	</div><!-- Section -->
	</div><!-- Sub tab 2 -->
	
</div><!-- Sub tabs -->
	
	<div class="smallText"><strong><?php _e('FAQ', 'wpsr'); ?>:</strong> <a href="http://www.aakashweb.com/faqs/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Why sometimes the buttons are not aligned properly in the page ?', 'wpsr'); ?></a></div>
	
	</div>
	
	<!-- SETTINGS -->
	<div id="tab-10" class="tabContent">
		<h4>RSS <?php _e('Settings', 'wpsr'); ?></h4>
		<div class="section">
			<table width="100%" height="39" border="0">
              
			  
			   <tr>
                <td width="49%" height="35">RSS <?php _e('URL', 'wpsr'); ?><br />
	<span class="smallText"><?php _e('Leave blank to use default Wordpress RSS feed.', 'wpsr'); ?> <br/><?php _e('You can use Feedburner feed URL also', 'wpsr'); ?></span></td>
                <td width="51%"><input name="wpsr_settings_rssurl" type="text" id="wpsr_settings_rssurl" value="<?php echo $wpsr_settings_rssurl; ?>" size="60"/>
                 </td>
		      </tr>
            </table>
		</div>
		
		<h4>Bit.ly <?php _e('Integration', 'wpsr'); ?></h4>
		<div class="section">
			<table width="100%" height="39" border="0">
              <tr>
                <td width="49%" height="35"><label for="wpsr_settings_bitlyusername">Bit.ly <?php _e('Username', 'wpsr'); ?></label></td>
                <td width="51%"><input name="wpsr_settings_bitlyusername" id="wpsr_settings_bitlyusername" type="text" value="<?php echo $wpsr_settings_bitlyusername; ?>"/></td>
              </tr>
			  
			  <tr>
                <td width="49%" height="35"><label for="wpsr_settings_bitlyapi">Bit.ly API Key</label></td>
                <td width="51%"><input name="wpsr_settings_bitlyapi" id="wpsr_settings_bitlyapi" type="text" value="<?php echo $wpsr_settings_bitlyapi; ?>"/></td>
              </tr>
			  
            </table>
		</div>
		
		<h4><?php _e('WP Socializer Settings', 'wpsr'); ?></h4>
		<div class="section">
			<table width="100%" height="84" border="0">
              <tr>
                <td width="49%" height="40"><label for="wpsr_settings_scriptsplace"><?php _e('Load button scripts in ', 'wpsr'); ?></label></td>
                <td width="51%"><select id="wpsr_settings_scriptsplace" name="wpsr_settings_scriptsplace">
                  <option <?php echo $wpsr_settings_scriptsplace == 'header' ? ' selected="selected"' : ''; ?> value="header"><?php _e('Header (recommended)', 'wpsr'); ?></option>
                  <option <?php echo $wpsr_settings_scriptsplace == 'footer' ? ' selected="selected"' : ''; ?> value="footer"><?php _e('Footer', 'wpsr'); ?></option>
                </select></td>
              </tr>
              <tr>
                <td height="34"><?php _e('Load WP Socializer CSS', 'wpsr'); ?>
                  <br />
                  <span class="smallText">
                  <?php _e('Note: templates, hover effects &amp; column will not work', 'wpsr'); ?>
                </span></td>
                <td><select id="wpsr_socialbt_loadcss" name="wpsr_socialbt_loadcss">
                  <option <?php echo $wpsr_socialbt_loadcss == '1' ? ' selected="selected"' : ''; ?> value="1">
                    <?php _e('Yes', 'wpsr'); ?>
                  </option>
                  <option <?php echo $wpsr_socialbt_loadcss == '0' ? ' selected="selected"' : ''; ?> value="0">
                    <?php _e('No', 'wpsr'); ?>
                  </option>
                </select></td>
              </tr>
          </table>
		</div>
		
		<h4><?php _e('Disable WP Socializer', 'wpsr'); ?></h4>
		<table width="100%" height="52" border="0">
		  <tr>
			<td width="49%" height="48"><?php _e('Temporarily disable all WP-Socializer buttons ', 'wpsr'); ?><br />
			<span class="smallText"><?php _e('Disabling will stop displaying all buttons, templates', 'wpsr'); ?></span> </td>
			<td width="51%"><select id="wpsr_settings_disablewpsr" name="wpsr_settings_disablewpsr">
				<option <?php echo $wpsr_settings_disablewpsr == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
				<option <?php echo $wpsr_settings_disablewpsr == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
			</select></td>
		  </tr>
		</table>
	</div>
	
	<div class="footer">
		<input class="button-primary" type="submit" name="wpsr_submit" id="wpsr_submit" value="     <?php _e('Update', 'wpsr'); ?>     " />
		<span class="button wpsr_reset_trigger" style="float:right">&nbsp;&nbsp;<?php _e('Reset all', 'wpsr'); ?>&nbsp;&nbsp;</span>
	</div><!-- Footer -->
	
	<span class="wpsr_reset_confirm">
			<input class="button" type="submit" name="wpsr_reset" id="wpsr_reset" value="  <?php _e('Sure', 'wpsr'); ?>   " /> | <a class="button wpsr_reset_cancel">   <?php _e('Cancel', 'wpsr'); ?>   </a>
	</span>
</form>

</div><!-- Tabs -->

<div class="credits">
	<a href="http://www.aakashweb.com/" title="Aakash Web" target="_blank"><?php _e('a Aakash Web plugin', 'wpsr'); ?></a>
</div><!-- Credits -->
	
</div><!-- Wrap -->
<?php endif; ?>

<?php if(wpsr_show_admin() == 0): ?>
<!-- Version Intro -->
<div class="wrap">
	<span class="wpsrVer" style="display:none"><?php echo WPSR_VERSION; ?></span>
	<span class="blogUrl" style="display:none"><?php echo get_option('siteurl'); ?></span>
	
	<div class="introWrap">
		<form method="post">
			<input class="button-primary alignright" style="margin-top:20px" type="submit" name="wpsr_intro_submit" id="wpsr_intro_submit" value="     <?php _e('Start using WP Socializer', 'wpsr'); echo ' v' . WPSR_VERSION; ?>     " />
		</form>
		<h2><img width="32" height="32" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" align="absmiddle"/> WP Socializer <sup><span class="smallText">v<?php echo WPSR_VERSION; ?></span></sup></h2>
		<div class="iBox">
		
		<ul class="iShare clearfix">
			<li><?php echo wpsr_admin_buttons('fb'); ?></li>
			<li><?php echo wpsr_admin_buttons('twitter'); ?></li>
			<li><?php echo wpsr_admin_buttons('+1'); ?></li>
			<li><?php echo wpsr_admin_buttons('at'); ?></li>
		</ul>
		
		<div class="iContent"><img src="<?php echo WPSR_ADMIN_URL . 'images/load.gif'; ?>" /></div>
	
		<p class="irefLinks"><b><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Full Features', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/docs/wp-socializer-docs/" target="_blank"><?php _e('Documentation', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/forum/" target="_blank"><?php _e('Support', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/forum/" target="_blank"><?php _e('Bug Report', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/#videos-tab" target="_blank"><?php _e('Video Demo & Tutorials', 'wpsr'); ?></a></b></p>
			
		</div>
		
		<form class="iForm" method="post">
			<input class="button-primary" type="submit" name="wpsr_intro_submit" id="wpsr_intro_submit" value="     <?php _e('Start using WP Socializer', 'wpsr'); echo ' v' . WPSR_VERSION; ?>     " />
		</form>
	</div>
</div>
<?php endif; ?>

<?php
}

function wpsr_admin_buttons($type){
	switch($type){
		case 'fb':
		return '<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAakash-Web%2F102453489826234&amp;layout=button_count&amp;show_faces=true&amp;width=48&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>';
		break;
		
		case '+1':
		return '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="medium" href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/"></g:plusone>';
		
		case 'twitter':
		return '<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" data-text="Check this out !: WP Socializer - Wordpress plugin - Aakash Web" data-count="horizontal" data-via="vaakash">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>';
		
		case 'at':
		return '<div class="addthis_toolbox addthis_default_style" addthis:url="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" addthis:title="WP Socializer - Wordpress plugin - Aakash Web"><a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a></div>
<script type="text/javascript">var addthis_share = { templates: {twitter: "Check out http://www.aakashweb.com/wordpress-plugins/wp-socializer/ (from @vaakash)"}}</script><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=vaakash"></script>';
	}
}


function wpsr_meta_box(){
	global $post;
	
	$wpsr_post_disabletemplate1 = 0;
	$wpsr_post_disabletemplate2 = 0;
	
	if (get_post_meta($post->ID,'_wpsr-disable-template1', true)) {
		$wpsr_post_disabletemplate1 = 1;
	}
	
	if (get_post_meta($post->ID,'_wpsr-disable-template2', true)) {
		$wpsr_post_disabletemplate2 = 1;
	}
	
?>
	<a name="wp_socializer" id="wp_socializer"></a>
	<img width="20" height="20" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" style="float:right; margin-top:-28px; margin-left:28px"/><style>.postbox:hover img{display:none;}</style>
	
	<table width="100%" border="0">
	  <tr>
		<td><label><input name="wpsr_post_disabletemplate1" id="wpsr_post_disabletemplate1" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate1 == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Disable template 1', 'wpsr'); ?></label></td>
	  </tr>
	  <tr>
		<td><label><input name="wpsr_post_disabletemplate2" id="wpsr_post_disabletemplate2" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate2 == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Disable template 2', 'wpsr'); ?></label></td>
	  </tr>
	  <tr>
		<td height="28"><small><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Help', 'wpsr'); ?></a> | <a href="admin.php?page=wp_socializer" target="_blank"><?php _e('Settings', 'wpsr'); ?></a></small></td>
	  </tr>
</table>
	
<?php
}

## Add the meta box to post editing page
function wpsr_add_meta_box() {
	add_meta_box('wp-socializer','WP Socializer','wpsr_meta_box','post','side');
	add_meta_box('wp-socializer','WP Socializer','wpsr_meta_box','page','side');
}
add_action('admin_menu', 'wpsr_add_meta_box');

function wpsr_insert_post($post_id) {
	if ($_POST['wpsr_post_disabletemplate1'] == 1) {
		add_post_meta($post_id, '_wpsr-disable-template1', 1, true);
	}else{
		delete_post_meta($post_id, '_wpsr-disable-template1');
	}
	
	if ($_POST['wpsr_post_disabletemplate2'] == 1) {
		add_post_meta($post_id, '_wpsr-disable-template2', 1, true);
	}else{
		delete_post_meta($post_id, '_wpsr-disable-template2');
	}
}
add_action('wp_insert_post', 'wpsr_insert_post');
?>