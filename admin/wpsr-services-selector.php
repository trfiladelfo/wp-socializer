<?php
	
	if(empty($_GET['id']) || empty($_GET['val']) || empty($_GET['bt'])) die('<!-- Empty parameters -->');
	
	$id = sanitize($_GET['id']);
	$val = sanitize($_GET['val']);
	$bt = sanitize($_GET['bt']);
	
	$addthis_services = array("100zakladok", "2tag", "2linkme", "a1webmarks", "addio", "menu", "adfty", "adifni", "aerosocial", "allmyfaves", "amazonwishlist", "amenme", "aim", "aolmail", "arto", "aviary", "baang", "baidu", "bebo", "bentio", "biggerpockets", "bitly", "bizsugar", "bleetbox", "blinklist", "blip", "blogger", "bloggy", "blogmarks", "blogtrottr", "blurpalicious", "boardlite", "bobrdobr", "bonzobox", "bookmarkedbyus", "socialbookmarkingnet", "bookmarkycz", "bookmerkende", "bordom", "box", "brainify", "bryderi", "buddymarks", "buzzzy", "camyoo", "care2", "chiq", "cirip", "citeulike", "classicalplace", "clickazoo", "clply", "cndig", "colivia", "technerd", "connotea", "cosmiq", "delicious", "designbump", "designmoo", "digthiswebhost", "digaculturanet", "digg", "diggita", "diglog", "digo", "digzign", "diigo", "dipdive", "domelhor", "dosti", "dotnetkicks", "dotnetshoutout", "woscc", "douban", "drimio", "dropjack", "dwellicious", "dzone", "edelight", "efactor", "ekudos", "elefantapl", "email", "mailto", "embarkons", "eucliquei", "evernote", "extraplay", "ezyspot", "fabulously40", "facebook", "informazione", "fark", "farkinda", "fashiolista", "fashionburner", "favable", "faves", "favlogde", "favoritende", "favorites", "favoritus", "flaker", "flosspro", "folkd", "followtags", "forceindya", "thefreedictionary", "fresqui", "friendfeed", "friendster", "funp", "fwisp", "gabbr", "gacetilla", "gamekicker", "givealink", "globalgrind", "gmail", "goodnoows", "google", "googlebuzz", "googlereader", "googletranslate", "gravee", "greaterdebater", "grono", "grumper", "habergentr", "hackernews", "hadashhot", "hatena", "hazarkor", "gluvsnap", "hedgehogs", "hellotxt", "hipstr", "hitmarks", "hotbookmark", "hotklix", "hotmail", "w3validator", "hyves", "idearef", "identica", "igoogle", "ihavegot", "instapaper", "investorlinks", "iorbix", "isociety", "iwiw", "jamespot", "jisko", "joliprint", "jumptags", "zooloo", "kaboodle", "kaevur", "kipup", "kirtsy", "kledy", "kommenting", "latafaneracat", "laaikit", "ladenzeile", "librerio", "linkninja", "linkagogo", "linkedin", "linksgutter", "linkshares", "linkuj", "livefavoris", "livejournal", "lockerblogger", "logger24", "lynki", "mymailru", "markme", "mashbord", "mawindo", "meccho", "meinvz", "mekusharim", "memori", "meneame", "live", "mindbodygreen", "misterwong", "misterwong_de", "mixx", "moemesto", "mototagz", "mrcnetworkit", "multiply", "myaol", "mylinkvault", "myspace", "n4g", "netlog", "netvibes", "netvouz", "newsmeback");
	
	$sharethis_services = array("facebook", "fark", "faves", "fresqui", "friendfeed", "funp", "gbuzz", "google_bmarks", "kirsty", "linkedin", "meaneame", "messenger", "mister_wong", "mixx", "myspace", "n4g", "newsvine", "oknotizie", "propeller", "reddit", "simpy", "slashdot", "sonico", "sphinn", "stumbleupon", "technorati", "twackle", "twine", "twitter", "windows_live", "xanga", "yahoo_bmarks", "ybuzz", "yigg");

// Clean the GET variables.
function sanitize($input) {
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);
	
	$output = htmlspecialchars(preg_replace($search, '', $input));
	return $output;
} // Thanks to CSS Tricks
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Select the services</title>
<link rel="stylesheet" href="wpsr-admin-mini-css.css" type="text/css" media="all" /> 

<script language="JavaScript" type="text/javascript">
<!--

var NS4 = (navigator.appName == "Netscape" && parseInt(navigator.appVersion) < 5);

function updateAndClose(val, id){
	opener.document.getElementById(id).value = val;
	window.close();
}

function addOption(theSel, theText, theValue){
	var newOpt = new Option(theText, theValue);
	var selLength = theSel.length;
	theSel.options[selLength] = newOpt;
	loopSelected();
}

function deleteOption(theSel, theIndex){ 
	var selLength = theSel.length;
	if(selLength>0){
		theSel.options[theIndex] = null;
	}
	loopSelected();
}

function moveOptions(theSelFrom, theSelTo){
  
	var selLength = theSelFrom.length;
	var selectedText = new Array();
	var selectedValues = new Array();
	var selectedCount = 0;
	
	var i;
	
	// Find the selected Options in reverse order
	// and delete them from the 'from' Select.
	for(i=selLength-1; i>=0; i--){
		if(theSelFrom.options[i].selected){
			selectedText[selectedCount] = theSelFrom.options[i].text;
			selectedValues[selectedCount] = theSelFrom.options[i].value;
			deleteOption(theSelFrom, i);
			selectedCount++;
		}
	}
  
	// Add the selected text/values in reverse order.
	// This will add the Options to the 'to' Select
	// in the same order as they were in the 'from' Select.
	for(i=selectedCount-1; i>=0; i--){
		addOption(theSelTo, selectedText[i], selectedValues[i]);
	}
	
	loopSelected();
}

function moveUp(lst){
	if(lst.selectedIndex == -1){
		alert('Please select an Item to move up.');
	}else{
		if(lst.selectedIndex == 0){
			alert('First element cannot be moved up');
			return false
		}else{
			var tempValue = lst.options[lst.selectedIndex].value; 
			var tempIndex = lst.selectedIndex-1; 
			lst.options[lst.selectedIndex].value = lst.options[lst.selectedIndex-1].value; 
			lst.options[lst.selectedIndex-1].value = tempValue; 
			var tempText = lst.options[lst.selectedIndex].text; 
			lst.options[lst.selectedIndex].text = lst.options[lst.selectedIndex-1].text; 
			lst.options[lst.selectedIndex-1].text = tempText; 
			lst.selectedIndex = tempIndex;
			loopSelected();
		}
	} 
	return false;
}

function moveDown(lst){
	if(lst.selectedIndex == -1){
		alert('Please select an Item to move down');
	}else{
		if(lst.selectedIndex == lst.options.length-1){
			alert('Last element cannot be moved down'); 
		}else{ 
			var tempValue = lst.options[lst.selectedIndex].value; 
			var tempIndex = lst.selectedIndex+1; 
			lst.options[lst.selectedIndex].value = lst.options[lst.selectedIndex+1].value; 
			lst.options[lst.selectedIndex+1].value = tempValue; 
			var tempText = lst.options[lst.selectedIndex].text; 
			lst.options[lst.selectedIndex].text = lst.options[lst.selectedIndex+1].text; 
			lst.options[lst.selectedIndex+1].text = tempText; 
			lst.selectedIndex = tempIndex;
			loopSelected();
		} 
	} 
	return false;
}

function loopSelected(){
	var txtSelectedValuesObj = document.getElementById('services');
	var selectedArray = new Array();
	var selObj = document.getElementById('sel2');
	var i;
	var count = 0;
	for (i=0; i<selObj.options.length; i++) {
		if (selObj.options[i].value) {
			selectedArray[count] = selObj.options[i].value;
			count++;
		}
	}
	txtSelectedValuesObj.value = selectedArray;
}

//http://www.mredkj.com/tutorials/tutorial004.html-->
</script>

<script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>

<body>
<div id="wrapper">
  <div id="google_translate_element"></div>
  <h2>Select the services</h2>
  <small>Use Control key to select multiple services.</small>
  <form>
<table width="100%" border="0">
	<tr>
		<td width="44%">
			<select name="sel1" id="sel1" size="20" multiple="multiple" style="width:100%">
			<?php 
				switch($bt){
					case 'addthis':
						foreach($addthis_services as $srvc){
							echo "<option value='$srvc'>$srvc</option>";
						}
					break;
					
					case 'sharethis':
						foreach($sharethis_services as $srvc){
							echo "<option value='$srvc'>$srvc</option>";
						}
					break;
				}
			?>
</select>		</td>
		<td width="11%" align="center" valign="middle">
			<p>
			  <input type="button" value="--&gt;" onclick="moveOptions(this.form.sel1, this.form.sel2);" title="Add" />
			  <br />
			    <input type="button" value="&lt;--" onclick="moveOptions(this.form.sel2, this.form.sel1);" title="Remove" />
		  </p>
		  <br />
			<p>
			    <input type="button" value=" Up " onclick="moveUp(this.form.sel2);" title="Up" />
              <br />
			    <input type="button" value="Down" onclick="moveDown(this.form.sel2);" title="Down" />		
		        </p>
			</td>
		<td width="45%">
			<select name="sel2" id="sel2"  size="20" multiple="multiple" style="width:100%">
				<?php 
					$selVal = $val;
					if($selVal != ''){
						$expSel = explode(',', $selVal);
						foreach ($expSel as $eSel){
							echo "<option value='$eSel'>$eSel</option>";
						}
					}
					
				?>
		    </select>
		</td>
      </tr>
</table>
<br />
<p>Selected services:<br/> <input name="services" type="text" id="services" value="<?php echo $val; ?>" size="40"/>
<input type="hidden" id="targetId" name="targetId" value="<?php echo $id; ?>"/>

</form>
</p>
<p>
  <input type="button" onclick="updateAndClose(document.getElementById('services').value, document.getElementById('targetId').value);" value="Update" />
</p>
<p align="center"><a href="http://www.aakashweb.com/" target="_blank">Aakash Web</a> | <a href="http://www.aakashweb.com/">Help</a> </p>
</div>

</body>
</html>