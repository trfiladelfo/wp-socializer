$j = jQuery.noConflict();

$j(document).ready(function(){

	// Tab Initializements
	$j("#tabs").tabs({fx: {opacity: 'toggle'} });
	$j("#tabs").tabs().find(".ui-tabs-nav").sortable({axis:'x'});
	
	$j(".helpLink").attr('href', 'http://www.aakashweb.com/');
	
	// Color picker Initializements
	$j('#wpsr_addthis_btheadclr').colorPicker();
	$j('#wpsr_addthis_btheadbgclr').colorPicker();
	
	// Sorter Initializements
	$j('#wpsr_socialbt_selected_list_16px, #wpsr_socialbt_selected_list_32px').sortable({
		stop : wpsr_socialbt_selectedgenerator,
		opacity : 0.5,
		scroll : true,
		revert : true
	});
	
	function wpsr_socialbt_selectedgenerator(){
		// 16 px
		var socialBtSelected16px = [];
		$j("#wpsr_socialbt_selected_list_16px li .sb_name").each(function(){
			socialBtSelected16px.push($j(this).text());
		});
		var groupedSocialBtSelected16px = socialBtSelected16px.join(',');
		$j("#wpsr_socialbt_selected16px").val(groupedSocialBtSelected16px);
		
		// 32 px
		var socialBtSelected32px = [];
		$j("#wpsr_socialbt_selected_list_32px li .sb_name").each(function(){
			socialBtSelected32px.push($j(this).text());
		});
		var groupedSocialBtSelected32px = socialBtSelected32px.join(',');
		$j("#wpsr_socialbt_selected32px").val(groupedSocialBtSelected32px);
	}
	
	// Append list 16px
	$j('#wpsr_socialbt_list li .sb_add16px').click(function(){
		var text16px =  $j.trim($j(this).parent().text().replace('16', '').replace('32', ''));
		var appendList16px = '<li><span class="sb_name">' + text16px + '</span><span class="sb_close">x</span></li>';
		$j('#wpsr_socialbt_selected_list_16px').append(appendList16px);
		wpsr_socialbt_selectedgenerator();
		
		var temp = $j(this).parent().children('.sb_name').text();
		
		$j(this).parent().children('.sb_name').fadeOut(function(){
			$j(this).text('Added !');
		});
		
		$j(this).parent().children('.sb_name').fadeIn();
	
		$j(this).parent().children('.sb_name').fadeOut(function(){
			$j(this).parent().children('.sb_name').text(temp);
		});

		$j(this).parent().children('.sb_name').fadeIn();
		
	});
	
	// Append list 32px
	$j('#wpsr_socialbt_list li .sb_add32px').click(function(){
		var text32px = $j.trim($j(this).parent().text().replace('16', '').replace('32', ''));
		var appendList32px = '<li><span class="sb_name">' + text32px + '</span><span class="sb_close">x</span></li>';
		$j('#wpsr_socialbt_selected_list_32px').append(appendList32px);
		wpsr_socialbt_selectedgenerator();
		
		var temp = $j(this).parent().children('.sb_name').text();
		
		$j(this).parent().children('.sb_name').fadeOut(function(){
			$j(this).text('Added !');
		});
		
		$j(this).parent().children('.sb_name').fadeIn();
	
		$j(this).parent().children('.sb_name').fadeOut(function(){
			$j(this).parent().children('.sb_name').text(temp);
		});

		$j(this).parent().children('.sb_name').fadeIn();
		
	});
	
	//Delete List 16px
	$j('#wpsr_socialbt_selected_list_16px li .sb_close').live("click", function() {
		$j(this).parent().fadeOut('slow', function(){
			$j(this).remove();
			wpsr_socialbt_selectedgenerator();
		});
	});
	
	//Delete List 32px
	$j('#wpsr_socialbt_selected_list_32px li .sb_close').live("click", function() {
		$j(this).parent().fadeOut('slow', function(){
			$j(this).remove();
			wpsr_socialbt_selectedgenerator();
		});
	});
	
	// Basic Admin Functions
	
	$j('h4').append('<span class="max_min" title="Collapse">-</span>');

	$j('h4 .max_min').toggle(
		function(){ 
			$j(this).parent().next().slideUp();
			$j(this).text('+'); 
		},
		function(){ 
			$j(this).parent().next().slideDown(); 
			$j(this).text('-'); 
		}
	);
	
	
	$j('.message').append('<span class="close">x</span>');
	
	$j('.message .close').click(function(){
		$j(this).parent().slideUp();
	});
	
	
	// Retweet Page
	$j('#wpsr_retweet_topsysettings').hide();
	$j('#wpsr_retweet_service').change(function(){
		if($j('#wpsr_retweet_service').val() == 'topsy'){
			$j('#wpsr_retweet_topsysettings').slideDown();
		}
		if($j('#wpsr_retweet_service').val() != 'topsy'){
			$j('#wpsr_retweet_topsysettings').slideUp();
		}
	});
	if($j('#wpsr_retweet_service').val() == 'topsy'){
		$j('#wpsr_retweet_topsysettings').slideDown();
	}
	
	// Facebook Page
	
	$j('#wpsr_facebook_counterplacement').hide();
	$j('#wpsr_facebook_counter').change(function(){
		if($j('#wpsr_facebook_counter').val() == '1'){
			$j('#wpsr_facebook_counterplacement').slideDown();
		}
		if($j('#wpsr_facebook_counter').val() != '1'){
			$j('#wpsr_facebook_counterplacement').slideUp();
		}
	});
	if($j('#wpsr_facebook_counter').val() == '1'){
		$j('#wpsr_facebook_counterplacement').slideDown();
	}
	
});

function openSubForm(){
	subWindow = window.open('','preview','height=500,width=600');
	var tmp = subWindow.document;
	tmp.write('<html><head><title>Subscribe to Aakash Web</title>');
	tmp.write('</head><body><p><b>Select an option</b></p><ul><li><a href="http://feedburner.google.com/fb/a/mailverify?uri=aakashweb">Subscribe Now</a></li><li><a href="http://feeds2.feedburner.com/aakashweb" target="_blank">Read the feeds</a></li></ul>');
	tmp.write('</body></html>');
	subWindow.moveTo(200,200);
	tmp.close();
}

function openAddthis(){
	window.open ("http://www.addthis.com/bookmark.php?v=250&username=vaakash&title=WP Socializer - Wordpress plugin&url=http://www.aakashweb.com/wordpress-plugins/wp-socializer/", "open_window","location=0,status=0,scrollbars=1,width=500,height=600");
}