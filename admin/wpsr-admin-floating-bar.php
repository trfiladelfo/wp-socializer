<?php
/*
 * Floating Share bar admin Page for WP Socializer Plugin
 * Author : Aakash Chakravarthy
*/

function wpsr_floatbts_reset_values(){
	$wpsr_floatbts['selectedbts'] = 'Facebook,Retweet,Google +1,Email,Print';
	$wpsr_floatbts['position'] = 'float_left';
	$wpsr_floatbts['theme'] = 'white';
	
	$wpsr_floatbts['insingle'] = 1;
	$wpsr_floatbts['inpage'] = 1;
	$wpsr_floatbts['disabled'] = 0;
	
	$wpsr_floatbts['floatleft_movable'] = 1;
	$wpsr_floatbts['bottomfixed_width'] = 900;
			
	update_option('wpsr_template_floating_bar_data', $wpsr_floatbts);
}

function wpsr_admin_page_floating_bar(){

	if(isset($_POST["wpsr_floatbts_reset"]) && check_admin_referer('wpsr_floatbts_main_form')){
		wpsr_floatbts_reset_values();
		$reset = 1;
	}
	
	if (isset($_POST["wpsr_floatbts_submit"]) && check_admin_referer('wpsr_floatbts_main_form')){
	
		$wpsr_floatbts['selectedbts'] = stripslashes($_POST['wpsr_floatbts_selectedbts']);
		$wpsr_floatbts['position'] = $_POST['wpsr_floatbts_position'];
		$wpsr_floatbts['theme'] = $_POST['wpsr_floatbts_theme'];
		
		$wpsr_floatbts['insingle'] = $_POST['wpsr_floatbts_insingle'];
		$wpsr_floatbts['inpage'] = $_POST['wpsr_floatbts_inpage'];
		$wpsr_floatbts['inpage'] = $_POST['wpsr_floatbts_inpage'];
		$wpsr_floatbts['disabled'] = $_POST['wpsr_floatbts_disabled'];
		
		$wpsr_floatbts['floatleft_movable'] = $_POST['wpsr_floatbts_floatleft_movable'];
		$wpsr_floatbts['bottomfixed_width'] = stripslashes($_POST['wpsr_floatbts_bottomfixed_width']);
				
		update_option('wpsr_template_floating_bar_data', $wpsr_floatbts);
		$updated = 1;
	}
	
	if($updated == true){
		echo "<div class='message updated autoHide'><p>" . __('Updated successfully', 'wpsr') . "</p></div>";
	}
	
	if($reset == true){
		echo "<div class='message updated autoHide'><p>" . __('Values are set to defaults successfully', 'wpsr') . "</p></div>";
	}
	
	## Assign the defaults to temp variables
	$wpsr_floatbts = get_option('wpsr_template_floating_bar_data');
	
	## Set the defaults to the First time users.
	if($wpsr_floatbts == ''){
		wpsr_floatbts_reset_values();
	}
?>
	
<div class="wrap">
	<div class="header">
		<?php echo wpsr_admin_buttons('fbrec'); ?>
		<h2><img width="32" height="32" src="<?php echo WPSR_ADMIN_URL; ?>images/wp-socializer.png" align="absmiddle"/>&nbsp;WP Socializer<span class="smallText"> v<?php echo WPSR_VERSION; ?><?php echo $wpsr_is_disabled; ?></span></h2>
		<span class="subTitle">Floating Share Bar</span>
	</div><!-- Header -->
	
	<ul class="wpsr_share_wrap">
	<li class="wpsr_donate" data-width="300" data-height="220" data-url="<?php echo WPSR_ADMIN_URL . 'js/share.php?i=1'; ?>"><a href="#"></a></li>
	<li class="wpsr_share" data-width="350" data-height="85" data-url="<?php echo WPSR_ADMIN_URL . 'js/share.php?i=2'; ?>"><a href="#"></a></li>
	<li class="wpsr_pressthis" title="Share a small post about this plugin in your blog !"><a href="press-this.php" target="_blank"></a></li>
	</ul>
	
	<form id="content" method="post">
	
	<ul id="tabs" class="clearfix">
		<li><a href="#">Customize</a></li>
		<li style="float:right"><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank">Help</a></li>
	</ul>
	
	<h3>Settings:</h3>
	<div class="section">
		<table width="100%" height="194" border="0">
		  <tr>
			<td width="35%" height="52">Position of the Floating share bar</td>
			<td width="65%">
			<label><input type="radio" name="wpsr_floatbts_position" <?php echo $wpsr_floatbts['position'] == 'float_left' ? ' checked="checked"' : ''; ?> value="float_left"/> Left Float</label><br/>
			<label><input type="radio" name="wpsr_floatbts_position" <?php echo $wpsr_floatbts['position'] == 'bottom_fixed' ? ' checked="checked"' : ''; ?> value="bottom_fixed"/> Bottom Fixed</label></td>
		  </tr>
		  <tr>
		    <td height="41">Color theme </td>
		    <td><label>
		      <select name="wpsr_floatbts_theme">
		        <option <?php echo $wpsr_floatbts['theme'] == 'white' ? ' selected="selected"' : ''; ?> value="white" >White</option>
		        <option <?php echo $wpsr_floatbts['theme'] == 'dark' ? ' selected="selected"' : ''; ?> value="dark" >Dark</option>
	          </select>
		    </label></td>
	      </tr>
		  <tr>
		    <td height="54">Show the floating bar in </td>
		    <td><label><input name="wpsr_floatbts_insingle" id="wpsr_floatbts_insingle" type="checkbox" value="1" <?php echo $wpsr_floatbts['insingle'] == "1" ? 'checked="checked"' : ""; ?> /> In individual posts</label> <br />
			
	<label><input name="wpsr_floatbts_inpage" id="wpsr_floatbts_inpage" type="checkbox" value="1" <?php echo $wpsr_floatbts['inpage'] == "1" ? 'checked="checked"' : ""; ?> /> In Pages</label>
	</td>
	      </tr>
		  <tr>
		  	<td height="37">Temporarily disable the floating bar</td>
		  	<td><input name="wpsr_floatbts_disabled" id="wpsr_floatbts_disabled" type="checkbox" value="1" <?php echo $wpsr_floatbts['disabled'] == "1" ? 'checked="checked"' : ""; ?> /></td>
		  </tr>
	  </table>
	</div>
	
	<h3>Select the buttons</h3>
	<div class="section">
		<h4>Available buttons &nbsp; <small class="smallText">(Click to add buttons)</small></h4>
		<small><span class="redText">New:</span> Try out the new comments button (Beta) (<a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank">Feedback</a>)</small>
		<ul class="floatBtsList clearfix">
			<?php
				global $wpsr_floating_bar_bts;
				foreach($wpsr_floating_bar_bts as $k => $v){
					echo '<li>' . $k .  '</li>';
				}
			?>
		</ul>
		
		<h4>Selected buttons &nbsp; <small class="smallText">(Double click to remove button)</small></h4>
		<ul class="floatBtsSel clearfix">
			<?php
				if(!empty($wpsr_floatbts['selectedbts'])){
					$selSplitted = explode(',', $wpsr_floatbts['selectedbts']);
					for($i=0; $i < count($selSplitted); $i++){
						echo '<li>' . $selSplitted[$i] . '</li>' . "\n";
					}
				}
			?>
		</ul>
		
	</div>
	
	<h3>Other Settings</h3>
	<div class="section">
		<table width="100%" border="0">
		  <tr>
			<td width="35%">For &quot;Left float&quot;</td>
			<td width="65%"><label><input name="wpsr_floatbts_floatleft_movable" id="wpsr_floatbts_floatleft_movable" type="checkbox" value="1" <?php echo $wpsr_floatbts['floatleft_movable'] == "1" ? 'checked="checked"' : ""; ?> /> Move the floating bar</label></td>
		  </tr>
		  <tr>
			<td>For &quot;Bottom Fixed&quot; </td>
			<td>Width of the floating bar <input name="wpsr_floatbts_bottomfixed_width" id="wpsr_floatbts_bottomfixed_width" type="text" value="<?php echo $wpsr_floatbts['bottomfixed_width']; ?>"/>px </td>
		  </tr>
		</table>
	</div>
	
	<div class="footer">
	<?php wp_nonce_field('wpsr_floatbts_main_form'); ?>
	<input type="hidden" name="wpsr_floatbts_selectedbts" id="wpsr_floatbts_selectedbts" value="<?php echo $wpsr_floatbts['selectedbts']; ?>" />
	<input class="button-primary" type="submit" name="wpsr_floatbts_submit" id="wpsr_floatbts_submit" value="<?php _e('Update', 'wpsr'); ?>" />
	<input class="button alignright" type="submit" name="wpsr_floatbts_reset" id="wpsr_floatbts_reset" value="  <?php _e('Reset', 'wpsr'); ?>   " />
	</div><!-- Footer -->
	
	</form>
	
	<div class="bottomInfo">
		<p align="center"><a href="https://twitter.com/vaakash" class="twitter-follow-button" data-show-count="false" data-width="130px" data-align="center">Follow @vaakash</a></p>
		<p align="center"><a href="http://www.aakashweb.com/" class="credits" target="_blank">a Aakash Web plugin</a></p>
	</div>
	
</div>

<?php
}
?>