<?php
/*
 * Admin Page for WP Socializer Plugin
 * Author : Aakash Chakravarthy
*/

load_plugin_textdomain('wpsr', false, basename(dirname(__FILE__)) . '/languages/');

## Load the sidebar
require('adm-sidebar.php');
$wpsr_donate_link='https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=donations@aakashweb.com&amp;item_name=Donation for WP Socializer Plugin&amp;amount=&amp;currency_code=USD';

## Load the Javascripts
function wpsr_admin_js() {
	global $wpsr_pluginpath;
	$admin_js_url = $wpsr_pluginpath . 'socializer-admin-js.js';
	$colorpicker_js_url = $wpsr_pluginpath . 'js/colorpicker/jquery.colorPicker.js';
	
	if (isset($_GET['page']) && $_GET['page'] == 'wp-socializer/socializer-admin.php'){
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
	global $wpsr_pluginpath;
	
	if (isset($_GET['page']) && $_GET['page'] == 'wp-socializer/socializer-admin.php') {
		wp_enqueue_style('wp-socializer-admin-css', $wpsr_pluginpath . 'socializer-admin-css.css'); 
	}
}
add_action('admin_print_styles', 'wpsr_admin_css');


## Admin Menu
function wpsr_admin_page(){

	$wpsr_updated = false;
	
	## Get the global variables
	global $wpsr_socialsites_list, $wpsr_socialbt_defaultimagepath, $wpsr_addthis_lang_array, $wpsr_buzz_lang_array, $wpsr_button_code_list, $wpsr_pluginpath, $wpsr_donate_link;
	
	if ($_POST["wpsr_submit"]) {
		## Addthis options
		$wpsr_addthis['username'] = $_POST['wpsr_addthis_username'];
		$wpsr_addthis['language'] = $_POST['wpsr_addthis_lang'];
		$wpsr_addthis['button'] = $_POST['wpsr_addthis_button'];
		$wpsr_addthis['btbrand'] = $_POST['wpsr_addthis_btbrand'];
		$wpsr_addthis['btservices'] = $_POST['wpsr_addthis_btservices'];
		$wpsr_addthis['btheadclr'] = $_POST['wpsr_addthis_btheadclr'];
		$wpsr_addthis['btheadbgclr'] = $_POST['wpsr_addthis_btheadbgclr'];
		
		update_option("wpsr_addthis_data", $wpsr_addthis);
		
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
		$wpsr_facebook['bturl'] = $_POST['wpsr_facebook_bturl'];
		$wpsr_facebook['shstyle'] = $_POST['wpsr_facebook_shstyle'];
		$wpsr_facebook['counter'] = $_POST['wpsr_facebook_counter'];
		$wpsr_facebook['counterplacement'] = $_POST['wpsr_facebook_counterplacement'];
		$wpsr_facebook['shurl'] = $_POST['wpsr_facebook_shurl'];
		
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
		$wpsr_template1['inhome'] = $_POST['wpsr_template1_inhome'];
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
		
		update_option("wpsr_template1_data", $wpsr_template1);
		
		## Placement Options | Template 2
		$wpsr_template2['content'] = stripslashes($_POST['wpsr_template2_content']);
		$wpsr_template2['inhome'] = $_POST['wpsr_template2_inhome'];
		$wpsr_template2['insingle'] = $_POST['wpsr_template2_insingle'];
		$wpsr_template2['inhome'] = $_POST['wpsr_template2_inhome'];
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
		
		update_option("wpsr_template2_data", $wpsr_template2);
		
		## Settings options
		$wpsr_settings['disablewpsr'] = $_POST['wpsr_settings_disablewpsr'];
		$wpsr_settings['scriptsplace'] = $_POST['wpsr_settings_scriptsplace'];
		
		update_option("wpsr_settings_data", $wpsr_settings);
		
		$wpsr_updated = true;
		
		if(get_option("wpsr_active") == 0){
			update_option("wpsr_active", 1);
		}
	}
	
	if($wpsr_updated == true){
		echo "<div class='message updated'><p>" . __('Updated successfully', 'wpsr') . "</p></div>";
	}
	
	## Addthis Options
	$wpsr_addthis = get_option('wpsr_addthis_data');
	
	$wpsr_addthis_username = $wpsr_addthis['username'];
	$wpsr_addthis_lang = $wpsr_addthis['language'];
	$wpsr_addthis_button = $wpsr_addthis['button'];
	$wpsr_addthis_btbrand = $wpsr_addthis['btbrand'];
	$wpsr_addthis_btservices = $wpsr_addthis['btservices'];
	$wpsr_addthis_btheadclr = $wpsr_addthis['btheadclr'];
	$wpsr_addthis_btheadbgclr = $wpsr_addthis['btheadbgclr'];
	
	$wpsr_addthis_btheadclr = ($wpsr_addthis_btheadclr == '') ? '#000' : $wpsr_addthis_btheadclr;
	$wpsr_addthis_btheadbgclr = ($wpsr_addthis_btheadbgclr == '') ? '#f2f2f2' : $wpsr_addthis_btheadbgclr;
 	
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
	$wpsr_socialbt_imgpath16px = ($wpsr_socialbt['imgpath16px'] != '') ? $wpsr_socialbt['imgpath16px'] : $wpsr_socialbt_defaultimagepath . '16/';
	$wpsr_socialbt_imgpath32px = ($wpsr_socialbt['imgpath32px'] != '') ? $wpsr_socialbt['imgpath32px'] : $wpsr_socialbt_defaultimagepath . '32/';
	
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
	
	## Settings options
	$wpsr_settings = get_option('wpsr_settings_data');
	
	$wpsr_settings_disablewpsr = $wpsr_settings['disablewpsr'];
	$wpsr_settings_scriptsplace = $wpsr_settings['scriptsplace'];
	
	if($wpsr_settings_disablewpsr) $wpsr_is_disabled = '<span class="redText"> | ' . __('Disabled', 'wpsr') . '</span>';

?>

<div class="wrap">

	<h2><img width="32" height="32" src="<?php echo $wpsr_pluginpath; ?>images/wp-socializer.png" align="absmiddle"/>&nbsp;WP Socializer<span class="smallText"> v<?php echo WPSR_VERSION; ?><?php echo $wpsr_is_disabled; ?></span></h2>
	
<div id="leftContent">
	<div id="tabs">
	
	<ul id="tabsList">
		<li><a href="#tab-1">Social Buttons</a></li>
		<li><a href="#tab-2">Add This</a></li>
		<li><a href="#tab-3">Google Buzz</a></li>
		<li><a href="#tab-4">Retweet &amp; Digg</a></li>
		<li><a href="#tab-5">Facebook</a></li>
		<li><a href="#tab-6">Custom</a></li>
		<li><a href="#tab-7">Placement</a></li>
		<li><a href="#tab-8" title="Settings"><img src="<?php echo $wpsr_pluginpath; ?>images/settings.png" alt="settings" /></a></li>
		<li><a class="helpLink" target="_blank"><img src="<?php echo $wpsr_pluginpath; ?>images/help.png" alt="settings" /></a></li>
	</ul>
	
	
<form method="post">

	<div id="tab-1" class="tabContent">
	
	<input type="hidden" id="wpsr_socialbt_selected16px" name="wpsr_socialbt_selected16px" value="<?php echo $wpsr_socialbt_selected16px; ?>" />
	<input type="hidden" id="wpsr_socialbt_selected32px" name="wpsr_socialbt_selected32px" value="<?php echo $wpsr_socialbt_selected32px; ?>" />
	
	<h4><?php _e('Social Buttons', 'wpsr'); ?></h4>
	<div class="section">
	<span class="smallText">
	<?php _e('Click the icon size to select and "x" button to remove selected. Click and drag to reorder selected sites', 'wpsr'); ?>
	</span>
		<span style="float:left; width:70%;">
		<h5><?php _e('Available buttons', 'wpsr'); ?></h5>
		
		<?php 
			$spriteImage16px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-16px.png';
			$spriteMaskImage16px = $wpsr_socialbt_defaultimagepath . 'wp-socializer-sprite-mask-16px.gif';
			
			echo '<ul id="wpsr_socialbt_list">';
			foreach ($wpsr_socialsites_list as $sitename => $property) {
			
				$spritesYCoord = get_sprite_coord($sitename, $wpsr_socialsites_list, '16');
				$finalSprites = '0px -' . $spritesYCoord . 'px';'wp-socializer-sprite-mask-16px.gif';
				
				echo 
				"\n<li>" .
				'<img src="' . $spriteMaskImage16px . '" alt="' . $sitename . '" style="background-position:' . $finalSprites . '">' . 
				'<span class="sb_name">' . $sitename . '</span>' . 
				'<span class="sb_add16px">16</span>';
				
				if($property['support32px'] == 1){
					echo '<span class="sb_add32px">32</span>';
				}
				
			}
			echo '</ul>';
		?>
		</span>
		
		<span style="float:right; width:30%">
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 16px </h4>
			
			<ul class="wpsr_socialbt_selected_list" id="wpsr_socialbt_selected_list_16px">
			<?php
				$wpsr_socialbt_splited16px = explode(',', $wpsr_socialbt_selected16px);
	
				for($i=0; $i < count($wpsr_socialbt_splited16px); $i++){
					echo "\n<li><span class=\"sb_name\">" . $wpsr_socialbt_splited16px[$i] . '</span><span class="sb_close">x</span></li>';
				}
				
			?>
			</ul>
			
			<span style="clear:both; display:block"></span>
			
			<h4><?php _e('Selected buttons', 'wpsr'); ?> | 32px</h4>
			<ul class="wpsr_socialbt_selected_list" id="wpsr_socialbt_selected_list_32px">
			<?php
				$wpsr_socialbt_splited32px = explode(',', $wpsr_socialbt_selected32px);
	
				for($i=0; $i < count($wpsr_socialbt_splited32px); $i++){
					echo "\n<li><span class=\"sb_name\">" . $wpsr_socialbt_splited32px[$i] . '</span><span class="sb_close">x</span></li>';
				}
				
			?>
			</ul>
			
		</span>
		
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
        <td height="35"><?php _e('Load WP Socializer CSS', 'wpsr'); ?><br />
          <span class="smallText"><?php _e('Note: hover effects &amp; column will not be available', 'wpsr'); ?></span></td>
        <td><select id="wpsr_socialbt_loadcss" name="wpsr_socialbt_loadcss">
          <option <?php echo $wpsr_socialbt_loadcss == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_socialbt_loadcss == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
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
	
	<p class="codeBox"><?php echo sprintf(__('For using the 16px buttons, use the code %s in the placement template', 'wpsr'), '<span>{social-bts-16px}</span>'); ?></p>
	<p class="codeBox"><?php echo sprintf(__('For using the 32px buttons, use the code %s in the placement template', 'wpsr'), '<span>{social-bts-32px}</span>'); ?></p>
	
	</div>

	<div id="tab-2" class="tabContent">
		<h4><?php _e('General', 'wpsr'); ?></h4>
		<div class="section">
		<table width="100%" height="38" border="0">
          <tr>
            <td width="19%"><label for="wpsr_addthis_username"><?php _e('Add This Username', 'wpsr'); ?></label></td>
            <td width="31%"><input type="text" id="wpsr_addthis_username"  name="wpsr_addthis_username" value="<?php echo $wpsr_addthis_username; ?>" /><br /><span class="smallText"><?php _e('If available', 'wpsr'); ?></span></td>
            <td width="12%"><label for="wpsr_addthis_lang"><?php _e('Language', 'wpsr'); ?></label></td>
            <td width="38%"><select name="wpsr_addthis_lang"><?php foreach ($wpsr_addthis_lang_array as $lang=>$name){echo "<option value=\"$lang\"". ($lang == $wpsr_addthis_lang ? " selected":"") . ">$name</option>";}?></select></td>
          </tr>
        </table>
		</div>
		
		<h4><?php _e('Choose the Bookmarking or sharing button', 'wpsr'); ?></h4>
		
		<div class="section">
		<table width="100%" height="118" border="0">
          <tr>
            <td height="38"><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="lg-share-" <?php echo $wpsr_addthis_button == 'lg-share-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/lg-share-<?php echo $wpsr_addthis_lang; ?>.gif" alt="Share button - Large"/></label></td>
			
            <td><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="lg-bookmark-" <?php echo $wpsr_addthis_button == 'lg-bookmark-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/lg-bookmark-en.gif" alt="Bookmark button - Large"/></label></td>
          </tr>
		  
          <tr>
            <td height="36"><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="lg-addthis-" <?php echo $wpsr_addthis_button == 'lg-addthis-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/lg-addthis-en.gif" alt="Addthis button - Large"/></label></td>
			
            <td><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="sm-share-" <?php echo $wpsr_addthis_button == 'sm-share-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/sm-share-en.gif" alt="Share button - Small"/></label></td>
			
          </tr>
          <tr>
            <td><label><input name="wpsr_addthis_button" id="wpsr_addthis_button" type="radio" value="sm-bookmark-" <?php echo $wpsr_addthis_button == 'sm-bookmark-' ? ' checked="checked"' : ''; ?> /> <img src="http://s7.addthis.com/static/btn/v2/sm-bookmark-en.gif" alt="Bookmark button - Small"/></label></td>
            <td>&nbsp;</td>
          </tr>
        </table>
		</div>
		
		<h4><?php _e('Optional button Settings', 'wpsr'); ?></h4>
		
		<div class="section">
		<table width="100%" border="0">
          <tr>
            <td width="13%" height="52"><label for="wpsr_addthis_btbrand"><?php _e('Brand Name', 'wpsr'); ?></label></td>
            <td width="30%"><input name="wpsr_addthis_btbrand" type="text" value="<?php echo $wpsr_addthis_btbrand; ?>"/><br /><span class="smallText"><?php _e('Leave blank to use default', 'wpsr'); ?></span></td>
			
            <td width="14%"><label for="wpsr_addthis_btservices"><?php _e('Custom services', 'wpsr'); ?></label></td>
            <td width="43%"><input name="wpsr_addthis_btservices" type="text" value="<?php echo $wpsr_addthis_btservices; ?>"/><br /><span class="smallText"><?php _e('comma-seperated', 'wpsr'); ?> | <?php _e('Leave blank to use default', 'wpsr'); ?></span></td>
			
          </tr>
          <tr>
            <td><?php _e('Header Color', 'wpsr'); ?></td>
            <td><input name="wpsr_addthis_btheadclr" id="wpsr_addthis_btheadclr" type="text" value="<?php echo $wpsr_addthis_btheadclr; ?>"/></td>
            <td><?php _e('Header Background', 'wpsr'); ?></td>
            <td><input name="wpsr_addthis_btheadbgclr" id="wpsr_addthis_btheadbgclr" type="text" value="<?php echo $wpsr_addthis_btheadbgclr; ?>"/></td>
          </tr>
        </table>
		</div>
		
		<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{addthis-bt}</span>'); ?></p>
		
	</div><!-- Addthis box -->
	
	<div id="tab-3" class="tabContent">
	
		<h4><?php _e('Post to Buzz button', 'wpsr'); ?></h4>
		
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
            <td><label><input name="wpsr_buzz_size" id="radio" type="radio" value="normal" <?php echo $wpsr_buzz_size == 'normal' ? ' checked="checked"' : ''; ?> /> <?php _e('Normal', 'wpsr'); ?></label>
              <br />
              <label><input name="wpsr_buzz_size" id="radio" type="radio" value="small" <?php echo $wpsr_buzz_size == 'small' ? ' checked="checked"' : ''; ?> /> <?php _e('Small', 'wpsr'); ?></label></td>
          </tr>
          <tr>
            <td height="34"><?php _e('Language', 'wpsr'); ?></td>
            <td><select name="wpsr_buzz_lang"><?php foreach ($wpsr_buzz_lang_array as $lang=>$name){echo "<option value=\"$lang\"". ($lang == $wpsr_buzz_lang ? " selected":"") . ">$name</option>";}?></select></td>
          </tr>
        </table>
		</div>
		
		<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{buzz-post}</span>'); ?></p>
		
		<h4><?php _e('Follow on Buzz button', 'wpsr'); ?></h4>
		
		<div class="section">
		<table width="100%" border="0">
          <tr>
            <td width="30%"><?php _e('Profile URL', 'wpsr'); ?> </td>
            <td width="70%"><input name="wpsr_buzz_profile" type="text" value="<?php echo $wpsr_buzz_profile ?>" size="35"/><br /><span class="smallText"><?php _e('Don\'t know your profile URL?', 'wpsr'); ?> <a href="http://profiles.google.com/me" target="_blank"><?php _e('Click here', 'wpsr'); ?></a></span></td>
          </tr>
          <tr>
            <td height="36"><?php _e('Button Text', 'wpsr'); ?></td>
            <td><input name="wpsr_buzz_followbttext" type="text" value="<?php echo $wpsr_buzz_followbttext ?>" size="35"/></td>
          </tr>
        </table>
		</div>
		
		<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{buzz-follow}</span>'); ?></p>
		
	</div><!-- Buzz box -->
	
	<div id="tab-4" class="tabContent">
	
	<h4><?php _e('General', 'wpsr'); ?></h4>
	
	<div class="section">
	<table width="100%" height="76" border="0">
      <tr>
        <td width="30%" height="37"><?php _e('Twitter Username', 'wpsr'); ?></td>
        <td width="70%">@<input name="wpsr_retweet_username" type="text" value="<?php echo $wpsr_retweet_username; ?>"/></td>
      </tr>
      <tr>
        <td><?php _e('Retweet Button Type', 'wpsr'); ?></td>
        <td><select id="wpsr_retweet_type" name="wpsr_retweet_type">
          <option <?php echo $wpsr_retweet_type == 'normal' ? ' selected="selected"' : ''; ?> value="normal"><?php _e('Normal (Big)', 'wpsr'); ?></option>
          <option <?php echo $wpsr_retweet_type == 'compact' ? ' selected="selected"' : ''; ?> value="compact"><?php _e('Compact', 'wpsr'); ?></option>
        </select></td>
      </tr>
    </table>
	</div>
	
	<h4><?php _e('Choose a service', 'wpsr'); ?></h4>
	
	<div class="section">
	<table width="100%" border="0">
      <tr>
        <td width="30%"><?php _e('Retweet Service', 'wpsr'); ?></td>
        <td width="70%"><select id="wpsr_retweet_service" name="wpsr_retweet_service">
          <option <?php echo $wpsr_retweet_service == 'tweetmeme' ? ' selected="selected"' : ''; ?> value="tweetmeme">TweetMeme</option>
          <option <?php echo $wpsr_retweet_service == 'topsy' ? ' selected="selected"' : ''; ?> value="topsy">Topsy</option>
		  <option <?php echo $wpsr_retweet_service == 'retweet' ? ' selected="selected"' : ''; ?> value="retweet">Retweet</option>
        </select><br />
		<span id="wpsr_retweet_topsysettings">
		<?php _e('Select a theme for topsy', 'wpsr'); ?> 
		<select id="wpsr_retweet_topsytheme" name="wpsr_retweet_topsytheme">
		  <option value="blue" <?php echo $wpsr_retweet_topsytheme == 'blue' ? ' selected="selected"' : ''; ?> >blue</option>
		  <option value="brown" <?php echo $wpsr_retweet_topsytheme == 'brown' ? ' selected="selected"' : ''; ?>>brown</option>
		  <option value="jade" <?php echo $wpsr_retweet_topsytheme == 'jade' ? ' selected="selected"' : ''; ?>>jade</option>
		  <option value="brick-red" <?php echo $wpsr_retweet_topsytheme == 'brick-red' ? ' selected="selected"' : ''; ?>>brick-red</option>
		  <option value="sea-foam" <?php echo $wpsr_retweet_topsytheme == 'sea-foam' ? ' selected="selected"' : ''; ?>>sea-foam</option>
		  <option value="mustard" <?php echo $wpsr_retweet_topsytheme == 'mustard' ? ' selected="selected"' : ''; ?>>mustard</option>
		  <option value="hot-pink" <?php echo $wpsr_retweet_topsytheme == 'hot-pink' ? ' selected="selected"' : ''; ?>>hot-pink</option>
		</select>
		</span></td>
      </tr>
    </table>
	</div>
	<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{retweet-bt}</span>'); ?></p>
	
	<h4><?php _e('Digg Button', 'wpsr'); ?></h4>
	<div class="section">
	<table width="100%" border="0">
      <tr>
        <td width="31%"><?php _e('Digg Button type', 'wpsr'); ?></td>
        <td width="69%"><select id="wpsr_digg_type" name="wpsr_digg_type">
          <option <?php echo $wpsr_digg_type == 'DiggMedium' ? ' selected="selected"' : ''; ?> value="DiggMedium"><?php _e('Medium', 'wpsr'); ?></option>
          <option <?php echo $wpsr_digg_type == 'DiggLarge' ? ' selected="selected"' : ''; ?> value="DiggLarge"><?php _e('Large', 'wpsr'); ?></option>
		  <option <?php echo $wpsr_digg_type == 'DiggCompact' ? ' selected="selected"' : ''; ?> value="DiggCompact"><?php _e('Compact', 'wpsr'); ?></option>
		  <option <?php echo $wpsr_digg_type == 'DiggIcon' ? ' selected="selected"' : ''; ?> value="DiggIcon"><?php _e('Icon', 'wpsr'); ?></option>
        </select></td>
      </tr>
    </table>
	</div>
	<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{digg-bt}</span>'); ?></p>
	
	</div>
	
	<div id="tab-5" class="tabContent">
	<h4><?php _e('Like Button', 'wpsr'); ?></h4>
	<div class="section">
	<table width="100%" border="0">
      <tr>
        <td width="30%" height="31"><?php _e('Button Style', 'wpsr'); ?></td>
        <td width="70%"><select id="wpsr_facebook_btstyle" name="wpsr_facebook_btstyle">
          <option <?php echo $wpsr_facebook_btstyle == 'standard' ? ' selected="selected"' : ''; ?> value="standard"><?php _e('Standard', 'wpsr'); ?></option>
          <option <?php echo $wpsr_facebook_btstyle == 'button_count' ? ' selected="selected"' : ''; ?> value="button_count"><?php _e('Button and count', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="35"><?php _e('Show Faces', 'wpsr'); ?></td>
        <td><select id="wpsr_facebook_showfaces" name="wpsr_facebook_showfaces">
          <option <?php echo $wpsr_facebook_showfaces == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
          <option <?php echo $wpsr_facebook_showfaces == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="49"><?php _e('Width', 'wpsr'); ?></td>
        <td><input name="wpsr_facebook_width" type="text" value="<?php echo $wpsr_facebook_width; ?>"/><br /><span class="smallText"><?php _e('In pixels', 'wpsr'); ?></span></td>
      </tr>
      <tr>
        <td height="35"><?php _e('Verb to Display', 'wpsr'); ?></td>
        <td><select id="wpsr_facebook_verb" name="wpsr_facebook_verb">
          <option <?php echo $wpsr_facebook_verb == 'like' ? ' selected="selected"' : ''; ?> value="like"><?php _e('Like', 'wpsr'); ?></option>
          <option <?php echo $wpsr_facebook_verb == 'recommend' ? ' selected="selected"' : ''; ?> value="recommend"><?php _e('Recommend', 'wpsr'); ?></option>
        </select></td>
      </tr>
      <tr>
        <td height="37"><?php _e('Font', 'wpsr'); ?></td>
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
        <td height="38"><?php _e('Color scheme', 'wpsr'); ?></td>
        <td><select id="wpsr_facebook_color" name="wpsr_facebook_color">
          <option <?php echo $wpsr_facebook_color == 'light' ? ' selected="selected"' : ''; ?> value="light"><?php _e('Light', 'wpsr'); ?></option>
          <option <?php echo $wpsr_facebook_color == 'dark' ? ' selected="selected"' : ''; ?> value="dark"><?php _e('Dark', 'wpsr'); ?></option>
        </select></td>
      </tr>
    </table>
	</div>
	
	<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{facebook-like}</span>'); ?></p>
	
	
	<h4><?php _e('Share Button', 'wpsr'); ?></h4>
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
	
	<p class="codeBox"><?php echo sprintf(__('For using this button, use the code %s in the placement template', 'wpsr'), '<span>{facebook-share}</span>'); ?></p>
	
	</div>
	
	<div id="tab-6" class="tabContent">
	<h4><?php _e('Custom 1', 'wpsr'); ?></h4>
	<div class="section">
	<textarea name="wpsr_custom1" cols="60" rows="8" class="template_box"><?php echo $wpsr_custom1; ?></textarea><br />
	<span class="smallText"><?php printf(__('Enter any share button code. Use %s for the page url and %s for page title', 'wpsr'), '{url}', '{title}'); ?></span>
	</div>
	<p class="codeBox"><?php echo sprintf(__('For using this, use the code %s in the placement template', 'wpsr'), '<span>{custom-1}</span>'); ?></p>
	
	<h4><?php _e('Custom 2', 'wpsr'); ?></h4>
	<div class="section">
	<textarea name="wpsr_custom2" cols="60" rows="8" class="template_box"><?php echo $wpsr_custom2; ?></textarea><br />
	<span class="smallText"><?php printf(__('Enter any share button code. Use %s for the page url and %s for page title', 'wpsr'), '{url}', '{title}'); ?></span>
	</div>
	
	<p class="codeBox"><?php echo sprintf(__('For using this, use the code %s in the placement template', 'wpsr'), '<span>{custom-2}</span>'); ?></p>
	
	</div>
	
	<div id="tab-7" class="tabContent">
	
	<p class="codeBox"><?php _e('Available button codes', 'wpsr'); ?> <?php foreach($wpsr_button_code_list as $code){ echo '<span>' . $code . '</span>'; }?></p>
	
	<h4><?php _e('Template 1', 'wpsr'); ?></h4>
	<div class="section">
	
	<div class="placement_left">
		<textarea name="wpsr_template1_content" id="wpsr_template1_content" cols="60" rows="10" class="template_box"><?php echo $wpsr_template1_content; ?></textarea>
	</div>
	
	<div class="placement_right">
	
	<label><input name="wpsr_template1_inhome" type="checkbox" value="1" <?php echo $wpsr_template1_inhome == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in front page', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_insingle" type="checkbox" value="1" <?php echo $wpsr_template1_insingle == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in individual posts', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_inpage" type="checkbox" value="1" <?php echo $wpsr_template1_inpage == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_incategory" type="checkbox" value="1" <?php echo $wpsr_template1_incategory == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in archive pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_intag" type="checkbox" value="1" <?php echo $wpsr_template1_intag == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Tag pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_indate" type="checkbox" value="1" <?php echo $wpsr_template1_indate == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in date archives', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_inauthor" type="checkbox" value="1" <?php echo $wpsr_template1_inauthor == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in author pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_insearch" type="checkbox" value="1" <?php echo $wpsr_template1_insearch == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in search pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_inexcerpt" type="checkbox" value="1" <?php echo $wpsr_template1_inexcerpt == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Excerpt', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template1_infeed" type="checkbox" value="1" <?php echo $wpsr_template1_infeed == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in RSS feeds', 'wpsr'); ?></label>
	
	</div>
	
	<div style="clear:both"></div>
	
	<table width="100%" height="40" border="0">
      <tr>
        <td width="19%"><strong><?php _e('Position', 'wpsr'); ?></strong></td>
        <td width="21%"><label><input name="wpsr_template1_abvcontent" type="checkbox" value="1" <?php echo $wpsr_template1_abvcontent == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Above content', 'wpsr'); ?></label></td>
        <td width="60%"><label><input name="wpsr_template1_blwcontent" type="checkbox" value="1" <?php echo $wpsr_template1_blwcontent == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Below content', 'wpsr'); ?></label></td>
      </tr>
    </table>
	
	</div>
	
	<h4><?php _e('Template 2', 'wpsr'); ?></h4>
	<div class="section">
	
	<div class="placement_left">
		<textarea name="wpsr_template2_content" id="wpsr_template2_content" cols="60" rows="10" class="template_box"><?php echo $wpsr_template2_content; ?></textarea>
	</div>
	
	<div class="placement_right">
	
	<label><input name="wpsr_template2_inhome" type="checkbox" value="1" <?php echo $wpsr_template2_inhome == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in front page', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_insingle" type="checkbox" value="1" <?php echo $wpsr_template2_insingle == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in individual posts', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_inpage" type="checkbox" value="1" <?php echo $wpsr_template2_inpage == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_incategory" type="checkbox" value="1" <?php echo $wpsr_template2_incategory == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in archive pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_intag" type="checkbox" value="1" <?php echo $wpsr_template2_intag == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Tag pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_indate" type="checkbox" value="1" <?php echo $wpsr_template2_indate == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in date archives', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_inauthor" type="checkbox" value="1" <?php echo $wpsr_template2_inauthor == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in author pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_insearch" type="checkbox" value="1" <?php echo $wpsr_template2_insearch == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in search pages', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_inexcerpt" type="checkbox" value="1" <?php echo $wpsr_template2_inexcerpt == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in Excerpt', 'wpsr'); ?></label> <br />
	
	<label><input name="wpsr_template2_infeed" type="checkbox" value="1" <?php echo $wpsr_template2_infeed == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Show in RSS feeds', 'wpsr'); ?></label>
	
	</div>
	
	<div style="clear:both"></div>
	
	<table width="100%" height="40" border="0">
      <tr>
        <td width="19%"><strong><?php _e('Position', 'wpsr'); ?></strong></td>
        <td width="21%"><label><input name="wpsr_template2_abvcontent" type="checkbox" value="1" <?php echo $wpsr_template2_abvcontent == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Above content', 'wpsr'); ?></label></td>
        <td width="60%"><label><input name="wpsr_template2_blwcontent" type="checkbox" value="1" <?php echo $wpsr_template2_blwcontent == "1" ? 'checked="checked"' : ""; ?> /> <?php _e('Below content', 'wpsr'); ?></label></td>
      </tr>
    </table>
	
	</div>

	</div>
	
	<div id="tab-8" class="tabContent">
		<h4><?php _e('WP Socializer Settings', 'wpsr'); ?></h4>
		<div class="section">
			<table width="100%" height="39" border="0">
              <tr>
                <td width="46%" height="35"><?php _e('Load button scripts in ', 'wpsr'); ?></td>
                <td width="54%"><select id="wpsr_settings_scriptsplace" name="wpsr_settings_scriptsplace">
                  <option <?php echo $wpsr_settings_scriptsplace == 'header' ? ' selected="selected"' : ''; ?> value="header"><?php _e('Header (recommended)', 'wpsr'); ?></option>
                  <option <?php echo $wpsr_settings_scriptsplace == 'footer' ? ' selected="selected"' : ''; ?> value="footer"><?php _e('Footer', 'wpsr'); ?></option>
                </select></td>
              </tr>
            </table>
		</div>
			<h4><?php _e('Disable WP Socializer', 'wpsr'); ?></h4>
		    <table width="100%" height="52" border="0">
              <tr>
                <td width="46%" height="48"><?php _e('Temporarily disable all WP-Socializer buttons ', 'wpsr'); ?><br />
                    <span class="smallText"><?php _e('Disabling will stop displaying all buttons, templates', 'wpsr'); ?></span> </td>
                <td width="54%"><select id="wpsr_settings_disablewpsr" name="wpsr_settings_disablewpsr">
                    <option <?php echo $wpsr_settings_disablewpsr == '0' ? ' selected="selected"' : ''; ?> value="0"><?php _e('No', 'wpsr'); ?></option>
                    <option <?php echo $wpsr_settings_disablewpsr == '1' ? ' selected="selected"' : ''; ?> value="1"><?php _e('Yes', 'wpsr'); ?></option>
                </select></td>
              </tr>
            </table>
	</div>
	
	<div class="bottomWrap">
		<div class="bottomWrapLeft">
			<input class="button-primary" type="submit" name="wpsr_submit" id="wpsr_submit" value="     <?php _e('Update', 'wpsr'); ?>     " />
		</div>
		
		<div class="bottomWrapRight">
			<a href="<?php echo $wpsr_donate_link; ?>" target="_blank"><?php _e('Donate', 'wpsr'); ?></a> | <a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Help', 'wpsr'); ?></a> | <a href="http://twitter.com/vaakash" target="_blank"><?php _e('Twitter', 'wpsr'); ?></a><br />
		  <a href="http://www.aakashweb.com/" target="_blank"><?php _e('a aakashweb.com plugin', 'wpsr'); ?></a> </div>
		
		<div style="clear:both"></div>
		
	</div>
	
</form>
</div><!-- Tabs -->

</div><!-- Left Content -->

<?php wpsr_admin_sidebar(); ?><!-- Sidebar -->

</div><!-- Wrap -->

<?php
}
add_action('admin_menu', 'wpsr_addpage');

function wpsr_addpage() {
    add_submenu_page('options-general.php', 'WP Socializer', 'WP Socializer', 10, __FILE__, 'wpsr_admin_page');
}

/**
  * Adds a meta box in posr editing pages, which enables
  * to turn on/off templates for that post
  */

function wpsr_meta_box(){

	// Get global variables
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
	<input name="wpsr_post_disabletemplate1" id="wpsr_post_disabletemplate1" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate1 == "1" ? 'checked="checked"' : ""; ?> /><label for="wpsr_post_disabletemplate1"> <?php _e('Disable template 1', 'wpsr'); ?></label><br />

	<input name="wpsr_post_disabletemplate2" id="wpsr_post_disabletemplate2" type="checkbox" value="1" <?php echo $wpsr_post_disabletemplate2 == "1" ? 'checked="checked"' : ""; ?> /><label for="wpsr_post_disabletemplate2"> <?php _e('Disable template 2', 'wpsr'); ?></label><br />
	
	<p><a href="http://www.aakashweb.com/faqs/wordpress-plugins/wp-socializer/" target="_blank"><?php _e('Help', 'wpsr'); ?></a></p>
	
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