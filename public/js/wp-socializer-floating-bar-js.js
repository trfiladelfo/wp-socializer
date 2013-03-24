/*
 * Copyright 2012 Aakash Chakravarthy - www.aakashweb.com
 * Created for WP Socializer - Wordpress Plugin
 * v1.3
*/

if(typeof jQuery == 'undefined'){
	if(typeof document.getElementsByClassName == 'function'){
		document.getElementsByClassName('wpsr-floatbar-float_left')[0].style.display = 'none';
		console.log('WP Socializer float bar: There is a Javascript error in the page and the floatbar is hidden');
	}
}

jQuery(document).ready(function(){
	var $floatbar = jQuery(".wpsr-floatbar-float_left");
	var $anchor = jQuery('.wpsr_floatbts_anchor');
	
	// Init effects
	$floatbar.hide().fadeIn(2000);
	
    // Position the left float bar to the anchor
	var wpsr_position_floatbar = function(){
		anchorOffset = jQuery('.wpsr_floatbts_anchor').offset();
		barDistance = jQuery('.wpsr_floatbts_anchor').attr('data-offset');
		
		$floatbar.css({
			position: "absolute",
			top: anchorOffset.top + "px",
			left: (anchorOffset.left - $floatbar.outerWidth() - barDistance)
		});
	}
	
	// On window scroll
	if(jQuery(".wpsr-floatbar-movable").length > 0){
		jQuery(window).scroll(function(){
			var b = jQuery(window).scrollTop();
			var d = anchorOffset.top;
			var c = $floatbar;
			if(b>d-30){
				c.css({position:"fixed", top: "30px"});
			}else{
				if(b<=d){
					c.css({position:"absolute", top: anchorOffset.top + "px"});
				}
			}
		});
	}

	// On Window resize
	jQuery(window).resize(function(){
		wpsr_position_floatbar();
	});
	
	if(window.addEventListener){
		window.addEventListener("load", wpsr_position_floatbar, false);}
	else if (window.attachEvent){
		window.attachEvent("onload", wpsr_position_floatbar);
	}
	
	wpsr_position_floatbar();
	
	// Hiding the bar
	var shareBarWidth = jQuery('.wpsr-floatbar-bottom_fixed').width();
	
	var hideShareBar = function(){
		var $this = jQuery('.wpsr_hidebt');
		$this.siblings().fadeOut('slow', function(){
			$this.parent().animate({
				width: '20px'
			}).attr('data-hidden', 1);
		});
	};
	
	var showShareBar = function(){
		var $this = jQuery('.wpsr_hidebt');
		$this.parent().animate({
			width: shareBarWidth
		}, function(){
			$this.siblings().fadeIn('slow');
		}).attr('data-hidden', 0);
		
	};
	
	jQuery('.wpsr_hidebt').click(function(){
		if(jQuery(this).parent().attr('data-hidden') == 1){
			showShareBar();
		}else{
			hideShareBar();
		}
	});
	
});