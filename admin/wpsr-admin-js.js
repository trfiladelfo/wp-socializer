$j = jQuery.noConflict();
$j(document).ready(function(){

	// Tab Initializements
	var tabs = $j("#tabs").tabs({fx: {opacity: 'toggle', duration: 'fast'} });
	var subTabs = $j(".subTabs").tabs({fx: {opacity: 'toggle', duration: 'fast'} });
	
	$j("#tabs").tabs().find(".ui-tabs-nav").sortable({axis:'y'});
	
	$j(".outLink").attr('target', '_blank');
	$j(".outLink").each(function(){
		$j(this).attr('href', $j(this).attr('rel'));
	});
	
	// For admin menu working
	$j('a[href="admin.php?page=wp_socializer#tab-9"], a[href="#tab-9"]').live('click', function(e){
		e.preventDefault();
		tabs.tabs('select', 8);
	});
	
	$j('a[href="admin.php?page=wp_socializer#tab-10"]').click(function(){
		tabs.tabs('select', 9);
	});
	
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
	
	$j('.parentLi').hover(function(){
		$j(this).children('ul').fadeIn('fast');
	}, function(){
		$j(this).children('ul').fadeOut('fast');
	});
	
	// Oneclick functions
	//$j('.templatesList').html("<img src='images/load.gif' alt='loading...' />");
	$j.ajax({
        type: "GET",
		url: $j('.tmplUrl').text(),
		dataType: "xml",
		success: function(xml){
			$j(xml).find('item').each(function(){
				name = $j(this).attr('name');
				author = $j(this).attr('author');
				version = $j(this).attr('version');
				image = $j('.tmplImg').text() + $j(this).attr('image');
				url = $j(this).attr('url')
				vars = $j(this).find('settings').text();
				temp1 = 'wpsr_template1_content==' + $j(this).find('template1').text() + ';;';
				temp2 = 'wpsr_template2_content==' + $j(this).find('template2').text() + ';;';
				cnt1 = 'wpsr_content1==' + $j(this).find('custom1').text() + ';;';
				cnt2 = 'wpsr_content2==' + $j(this).find('custom2').text() + ';;';
				
				nameHtml = '<div class="templateHead">' + name + '</div>';
				versionHtml = '<div class="templateDetails">by <a href=' + url + ' target="_blank">' + author + '</a> version ' + version + '</div>';
				applyBt = '<span class="templateBt applyBt">Apply</span>';
				hiddenHtml = '<textarea class="templateCont">' + vars + temp1 + temp2 + cnt1 + cnt2 + '</textarea>';
		
				itemContent = applyBt + hiddenHtml + nameHtml + versionHtml;
				$j('.templatesList').append('<div class="templateItem" rel="' + image + '">' + itemContent + '</div>');
			});
		}
	});
	
	$j('.templateItem').live('mouseover', function(e){
		$j(this).append('<div class="tooltip">Preview: <br/><img src="' + $j(this).attr('rel') + '"/></div>');
		$j('.tooltip').css({
			'margin-top': 25,
			'margin-left': -10
		});
	}).live('mouseout', function(){
		$j(this).children('.tooltip').remove();
	});

	$j('.applyBt').live('click', function(){
		cnt = $j(this).next('.templateCont').text();
		cntSplit = cnt.split(';;');
		
		$j(this).fadeOut(500).fadeIn(500).addClass('applyBtYellow');
		
		for(i=0; i<cntSplit.length; i++){
			element = cntSplit[i].split('==');
			eleId = '#' + $j.trim(element[0]);
			eleValue = $j.trim(element[1]);
					
			if($j(eleId).attr('type') == 'checkbox'){
				if(eleValue == 0){
					$j(eleId).removeAttr('checked');
				}else{
					$j(eleId).attr('checked', 'checked');
				}
			}else if($j(eleId).attr('type') == 'radio'){
				$j(eleId + '[value=' + eleValue + ']').attr('checked', 'checked');
			}else{
				$j(eleId).val(eleValue);
			}
		}
		
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
	
	setTimeout(function(){
		$j('.autoHide').fadeOut(function(){ $j(this).remove(); });
	}, 8000);
	
	$j('.message .close').click(function(){
		$j(this).parent().slideUp();
	});
	
	$j('.codePopupIco').click(function(e){
		e.preventDefault();
		
		$j('.codePopup').hide();
		
		var code = $j(this).attr('alt');
		var info = $j('.codePopupInfo').html();
		$j(this).after('<div class="codePopup"><span class="popClose">x</span><textarea readonly="readonly" class="codePopupCode">' + code + '</textarea>' + info + '</div>');
			
		$j('.codePopup').css({
			'left' : e.pageX - 200,
			'top' :  e.pageY - 16
		});
	});
	
	$j('.popClose').live('click', function(e){
		$j(this).parent().fadeOut();
	});
	
	$j('.donateBox').mouseover(function(e){
		$j('.donatePopup').fadeIn();
	});
	
	$j('.mBox').prepend('<span class="popClose">x</span>');
	
	// Intro box
	if($j('.introWrap').length != 0){
	$j.ajax({
        type: "GET",
		url: 'http://query.yahooapis.com/v1/public/yql?q=%20SELECT%20*%20FROM%20xml%20WHERE%20url%3D%22http%3A%2F%2Fvaakash.kodingen.com%2Fwpsr.xml%22&env=http%3A%2F%2Fdatatables.org%2Falltables.env',
		dataType: "xml",
		success: function(xml){
			try{
				ver = '[version="' + $j('.wpsrVer').text() + '"]';
				$j(xml).find('content' + ver).each(function(){
					$j('.iContent').hide();
					$j('.iContent').html($j(this).text());
					$j('.iContent').fadeIn();
				});
			}
			catch(err){
				$j('.iContent').html('<p>For more details: </p>');
			}
		},
		error: function(err){
			$j('.iContent').html('<b>New in this version: </b> <a href="http://www.aakashweb.com/wordpress-plugins/wp-socializer/" target="_blank">Click here</a> to view the new features and changes');
		}
	});
	iUrl = 'http://stats.wordpress.com/g.gif?host=vaakash.kodingen.com&blog=24923956&v=ext&post=0&rand=' + Math.random() + '&ref=' + encodeURI($j('.blogUrl').text());
	$j('.introWrap').after('<img src="' + iUrl + '" class="statsIco"/>');
	}
	
	// Tooltip 
	$j('.showTooltip').live('mouseover', function(e) {
		var tip = $j(this).attr('title');
		$j(this).attr('title','');
		$j(this).append('<div class="tooltip">' + tip + '</div>');
		$j('.tooltip').css({
			'margin-top': -$j(this).children('.tooltip').outerHeight(),
			'margin-left': -($j(this).children('.tooltip').outerWidth() + 20)
		});
	}).mouseout(function(){
		$j(this).attr('title',$j('.tooltip').html());
		$j(this).children('div.tooltip').remove();
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
	
	$j('#wpsr_retweet_twittersettings').hide();
	$j('#wpsr_retweet_service').change(function(){
		if($j('#wpsr_retweet_service').val() == 'twitter'){
			$j('#wpsr_retweet_twittersettings').slideDown();
		}
		if($j('#wpsr_retweet_service').val() != 'twitter'){
			$j('#wpsr_retweet_twittersettings').slideUp();
		}
	});
	if($j('#wpsr_retweet_service').val() == 'twitter'){
		$j('#wpsr_retweet_twittersettings').slideDown();
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

	$j('.parentLi li, .btn').click(function(){
		var id = $j(this).parent().attr('bxid');
		
		var openTag = ($j(this).attr('openTag') == null) ? '' : $j(this).attr('openTag');
		var closeTag = ($j(this).attr('closeTag') == null) ? '' : $j(this).attr('closeTag');
		
		awQuickTags(id, openTag, closeTag,'');
		
		if($j(this).attr('class') != 'btn'){
			$j(this).parent().fadeOut();
		}
	});
	
	// Live search
	$j('#wpsr_search_buttons').keyup(function(event){
		var search_text = $j(this).val();
		var rg = new RegExp(search_text,'i');
		$j('#wpsr_socialbt_list li').each(function(){
			if($j.trim($j(this).text()).search(rg) == -1){
				$j(this).hide();
			}else{
				$j(this).show();
			}
		});
	});
	
	$j('#wpsr_search_buttons').focus(function(){
		if($j(this).val() == $j(this).attr('alt')){
			$j(this).val('');
		}
	}).blur(function(){
		if($j(this).val() == ''){
			$j(this).val($j(this).attr('alt'));
		}
	});
	
	$j('.wpsr_reset_trigger').click(function(){
		$j('.wpsr_reset_confirm').slideDown();
	});
	
	$j('.wpsr_reset_cancel').click(function(){
		$j('.wpsr_reset_confirm').slideUp();
	});
	
	$j('#wpsr_settings_disablebtlist').click(function(){
		$j('#wpsr_settings_disablebuttons').val($j(this).val());
	});
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

function openServiceSelctor(windowUrl, id){
	var atw = window.open(windowUrl + document.getElementById(id).value, 'wpsr_services_popup','width=500,height=623,scrollbars=1');
	atw.focus();
	return false;
}

function addthisSetTargetField(gotValue, targetField){
	document.getElementById(targetField).value = gotValue;
	window.focus();
}

/* AW Quick tab editor */
function awQuickTags(tbField,openTg,closeTg,btType){contentBox=document.getElementById(tbField);var src;var href;var style;var divStyle;var divId;if(document.selection){contentBox.focus();sel=document.selection.createRange();if(btType==''){sel.text=insertTagsAll('',openTg,sel.text,closeTg,'');}if(btType=='a'){sel.text=insertTagLink('',openTg,sel.text,closeTg,'');}if(btType=='img'){sel.text=insertTagImage('',openTg,sel.text,closeTg,'');}if(btType=='replace'){sel.text=insertTagReplacable('',openTg,sel.text,closeTg,'');}}else if(contentBox.selectionStart||contentBox.selectionStart=='0'){var startPos=contentBox.selectionStart;var endPos=contentBox.selectionEnd;var front=(contentBox.value).substring(0,startPos);var back=(contentBox.value).substring(endPos,contentBox.value.length);var selectedText=contentBox.value.substring(startPos,endPos);if(btType==''){contentBox.value=insertTagsAll(front,openTg,selectedText,closeTg,back);contentBox.selectionStart=startPos+contentBox.value.length;contentBox.selectionEnd=startPos+openTg.length+selectedText.length;}if(btType=='a'){contentBox.value=insertTagLink(front,openTg,selectedText,closeTg,back);contentBox.selectionStart=startPos+contentBox.value.length;contentBox.selectionEnd=startPos+openTg.length+selectedText.length+8+href.length;}if(btType=='img'){contentBox.value=insertTagImage(front,openTg,selectedText,closeTg,back);contentBox.selectionStart=startPos+contentBox.value.length;contentBox.selectionEnd=startPos+openTg.length+selectedText.length+7+src.length+closeTg.length;}if(btType=='replace'){contentBox.value=insertTagReplacable(front,openTg,selectedText,closeTg,back);contentBox.selectionStart=startPos+contentBox.value.length;contentBox.selectionEnd=startPos+openTg.length;}}else{contentBox.value+=myValue;contentBox.focus();}function insertTagsAll(frontText,openTag,selectedText,closeTag,backText){return frontText+openTg+selectedText+closeTg+backText;}function insertTagLink(frontText,openTag,selectedText,closeTag,backText){href=prompt('Enter the URL of the Link','http://');if(href!='http://'&&href!=null){return frontText+openTg+'href="'+href+'">'+selectedText+closeTg+backText;}else{return frontText+selectedText+backText;}}function insertTagImage(frontText,openTag,selectedText,closeTag,backText){src=prompt('Enter the URL of the Image','http://');if(src!='http://'&&src!=null){return frontText+openTg+'src="'+src+'" '+closeTg+selectedText+backText;}else{return frontText+selectedText+backText;}}function insertTagImage(frontText,openTag,selectedText,closeTag,backText){src=prompt('Enter the URL of the Image','http://');if(src!='http://'&&src!=null){return frontText+openTg+'src="'+src+'" '+closeTg+selectedText+backText;}else{return frontText+selectedText+backText;}}function insertTagReplacable(frontText,openTag,selectedText,closeTag,backText){return frontText+openTg+backText;}}function awQuickTagsHeading(tbField,headingBox){contentBox=document.getElementById(tbField);hBox=document.getElementById(headingBox);contentBox.focus();if(document.selection){contentBox.focus();sel=document.selection.createRange();sel.text='<h'+hBox.value+'>'+sel.text+'</h'+hBox.value+'>';}else if(contentBox.selectionStart||contentBox.selectionStart=='0'){var startPos=contentBox.selectionStart;var endPos=contentBox.selectionEnd;var front=(contentBox.value).substring(0,startPos);var back=(contentBox.value).substring(endPos,contentBox.value.length);var selectedText=contentBox.value.substring(startPos,endPos);contentBox.value=front+'<h'+hBox.value+'>'+selectedText+'</h'+hBox.value+'>'+back;contentBox.selectionStart=startPos+contentBox.value.length;contentBox.selectionEnd=startPos+4+selectedText.length;}}