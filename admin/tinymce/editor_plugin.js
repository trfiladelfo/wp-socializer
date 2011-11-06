/*
 * WP Socializer shortcode inserting javascript in TinyMCE editor
 * http://www.aakashweb.com
 * v1.0
 * Added since WP Socializer v2.0
*/
String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}

function wpsr_insert_shortcode(type, edparam){
	
	var choice = prompt('Choose your button: \n\n1.Social buttons \n2.Addthis \n3.Sharethis \n4.Retweet \n5.Google Buzz \n6.Google +1 \n7.Digg \n8.Facebook \n9.StumbleUpon \n10.Reddit \n\neg: 4', '');
	var btncode;
	
	switch(choice.trim()){
		case '1':
			btncode = "socialbts";
		case '2':
			btncode = "addthis"; break;
		case '3':
			btncode = "sharethis"; break;
		case '4':
			btncode = "retweet"; break;
		case '5':
			btncode = "buzz"; break;
		case '6':
			btncode = "plusone"; break;
		case '7':
			btncode = "digg"; break;
		case '8':
			btncode = "facebook"; break;
		case '9':
			btncode = "stumbleupon"; break;
		case '10':
			btncode = "reddit"; break;
		default:
			return '';
	}
	
	var shortcode = "[wpsr_" + btncode + "]";
	
	if(type == 'visual'){
		edparam.execCommand('mceInsertContent', false, shortcode);
	}else{
		edInsertContent(edCanvas, shortcode);
	}
}

// For adding button in the visual editing toolbox
(function() {
	tinymce.create('tinymce.plugins.WPSRButton', {
	
		init : function(ed, url) {	
			ed.addButton('wpsrbutton', {
				title : wpsr_sc_button.title,
				image : url + '/icon.png',
				onclick : function() {
					wpsr_insert_shortcode('visual', ed);
                }
			});	
		},
		
		getInfo : function() {
			return {
				longname : 'WP Socializer',
				author : 'Aakash Chakravarthy',
				authorurl : 'http://www.aakashweb.com/',
				infourl : 'http://www.aakashweb.com/',
				version : '1.0'
			};
		}

	});
	
	tinymce.PluginManager.add('wpsrbutton', tinymce.plugins.WPSRButton);
})();

// For adding button in the code editing toolbox

if(document.getElementById("ed_toolbar")){
	qt_toolbar = document.getElementById("ed_toolbar");
	edButtons[edButtons.length] = new edButton("ed_wpsrbutton", wpsr_sc_button.value, "", "","");
	var qt_button = qt_toolbar.lastChild;
	while (qt_button.nodeType != 1){
		qt_button = qt_button.previousSibling;
	}
	qt_button = qt_button.cloneNode(true);
	qt_button.value = wpsr_sc_button.value;
	qt_button.title = wpsr_sc_button.title;
	qt_button.onclick = function(){ wpsr_insert_shortcode('code', ''); };
	qt_button.id = "ed_wpsrbutton";
	qt_toolbar.appendChild(qt_button);
}

