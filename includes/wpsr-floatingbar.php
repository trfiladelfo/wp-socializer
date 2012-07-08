<?php
/*
 * Floating share bar Processor code for WP Socializer Plugin
 * Version : 1.1
 * Since : v2.4
 * Author : Aakash Chakravarthy
*/

## Floating share bar processor
function wpsr_process_floatingbts(){
	global $wpsr_floating_bar_bts;
	$wpsr_floatbts = get_option('wpsr_template_floating_bar_data');
	$content = '';
	
	if($wpsr_floatbts['disabled'] == 1)
		return '';
	
	$selSplitted = explode(',', $wpsr_floatbts['selectedbts']);
	$noSel = count($selSplitted);
	
	for($i=0; $i < $noSel; $i++){
		$content .= '<div class="wpsr_floatbt">' . $wpsr_floating_bar_bts[$selSplitted[$i]][$wpsr_floatbts['position']] . "</div>" ;
	}
	
	$width = (($wpsr_floatbts['position'] == 'bottom_fixed') ? 'style="width:' . $wpsr_floatbts['bottomfixed_width'] . 'px"' : '');
	
	$start = '<div class="wpsr-floatbar-' . $wpsr_floatbts['position'] . ' wpsr-floatbar-' . $wpsr_floatbts['theme'] . ($wpsr_floatbts['floatleft_movable'] ? ' wpsr-floatbar-movable ' : '') . ' clearfix" ' . $width . '>';
	$end = '<div class="wpsr-linkback"><a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank">WP Socializer</a> <a href="http://www.aakashweb.com" target="_blank" class="wpsr_linkaw">Aakash Web</a></div>';
	
	if($wpsr_floatbts['position'] == 'bottom_fixed')
		$end .= '<div title="Collapse the Share bar" class="wpsr_hidebt"></div>';
	
	$end .= '</div>';
	
	return $start . $content . $end;
	
}

## Floating bar conditions check.
function wpsr_floatingbts_check(){
	$wpsr_floatbts = get_option('wpsr_template_floating_bar_data');
	$flag = 0;
	
	if($wpsr_floatbts['disabled'])
		return 0;
	if (is_single() == 1 && $wpsr_floatbts['insingle'] == 1){
		$flag = 1;
	}elseif (is_page() == 1 && $wpsr_floatbts['inpage'] == 1){
		$flag = 1;
	}
	
	if($flag && !empty($wpsr_floatbts['selectedbts'])){
		return true;
	}
}

## Print the buttons and the JS in the footer.
function wpsr_floatingbts_output(){
	$wpsr_floatbts = get_option('wpsr_template_floating_bar_data');
	if(wpsr_floatingbts_check()){
		echo do_shortcode(wpsr_process_floatingbts());
		echo '
<!-- Start WP Socializer | Floating bar - JS file-->
<script type="text/javascript" src="' . WPSR_PUBLIC_URL . 'js/wp-socializer-floating-bar-js.js?v=' . WPSR_VERSION . '"></script>
<!-- End WP Socializer | Floating bar - JS file -->
';
	}
}
add_action('wp_footer', 'wpsr_floatingbts_output');

## Add the floating bar anchor to the content
function wpsr_floatingbts_anchor($content = ''){
	if (wpsr_floatingbts_check()){
		return '<span class="wpsr_floatbts_anchor"></span>' . $content;
	}else{
		return $content;
	}
}
add_action('the_content', 'wpsr_floatingbts_anchor');
?>