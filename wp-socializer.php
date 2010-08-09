<?php
/*
Plugin Name: WP Socializer
Plugin URI: http://www.aakashweb.com/
Description: WP Socializer is an advanced and powerful plugin for adding bookmarking buttons like addthis, buzz, digg, retweet, facebook like/share for posts.
Version: 1.0
Author: Aakash Chakravarthy
Author URI: http://www.aakashweb.com/
License: GPL2
*/

## WP Socializer Global variables

define('WPSR_VERSION', '1.0');
define('WPSR_AUTHOR', 'Aakash Chakravarthy');

if (!defined('WP_CONTENT_URL')) {
	$wpsr_pluginpath = get_option('siteurl').'/wp-content/plugins/'.plugin_basename(dirname(__FILE__)).'/';
} else {
	$wpsr_pluginpath = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)) . '/';
}

$wpsr_socialbt_defaultimagepath = $wpsr_pluginpath . 'social-icons/';

$wpsr_socialsites_list =  array(
	
	'Add to favorites' => array(
	 	'icon' => 'addtofavorites.png',
	 	'url' => 'javascript:addToFavotites(\'{permalink}\');',
		'support32px' => 1,
	 ),
	 
	 // B
	 
	'BarraPunto' => array(
		'icon' => 'barrapunto.png',
		'url' => 'http://barrapunto.com/submit.pl?subj={title}&amp;story={permalink}',
	),
	
	'Bitacoras.com' => array(
		'icon' => 'bitacoras.png',
		'url' => 'http://bitacoras.com/anotaciones/{permalink}',
	),
	
	'BlinkList' => array(
		'icon' => 'blinklist.png',
		'url' => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url={permalink}&amp;Title={title}',
		'support32px' => 1,
	),
	
	'Blogger' => array(
        'icon' => 'blogger.png',
        'url' => 'http://www.blogger.com/blog_this.pyra?t&u={permalink}&n={title}&pli=1',
		'support32px' => 1,
    ),
	
	'blogmarks' => array(
		'icon' => 'blogmarks.png',
		'url' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url={permalink}&amp;title={title}',
	),

	'Blogosphere News' => array(
		'icon' => 'blogospherenews.png',
		'url' => 'http://www.blogospherenews.com/submit.php?url={permalink}&amp;title={title}',
	),

	'blogtercimlap' => array(
		'icon' => 'blogter.png',
		'url' => 'http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title={title}&amp;url={permalink}',
	),
	
	'Faves' => array(
		'icon' => 'bluedot.png',
		'url' => 'http://faves.com/Authoring.aspx?u={permalink}&amp;title={title}',
	),
	
	'Box.net' => array(
        'icon' => 'box.png',
        'url' => 'https://www.box.net/api/1.0/import?url={permalink}&name={title}&description={excerpt}&import_as=link',
    ), 
	
	// C
	
	'connotea' => array(
		'icon' => 'connotea.png',
		'url' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri={permalink}&amp;title={title}&amp;description={excerpt}',
	),

	'Current' => array(
		'icon' => 'current.png',
		'url' => 'http://current.com/clipper.htm?url={permalink}&amp;title={title}',
	),
	
	// D
	
	'del.icio.us' => array(
		'icon' => 'delicious.png',
		'url' => 'http://delicious.com/post?url={permalink}&amp;title={title}&amp;notes={excerpt}',
		'support32px' => 1,
	),
	
	'Designbump' => array(
		'icon' => 'designbump.png',
		'url' => 'http://designbump.com/user/login?destination=submit?url={permalink}&title={title}&body={excerpt}',
		'support32px' => 1,
	),
	
	'Design Float' => array(
		'icon' => 'designfloat.png',
		'url' => 'http://www.designfloat.com/submit.php?url={permalink}&amp;title={title}',
		'support32px' => 1,
	),
	
	'Digg' => array(
		'icon' => 'digg.png',
		'url' => 'http://digg.com/submit?phase=2&amp;url={permalink}&amp;title={title}&amp;bodytext={excerpt}',
		'support32px' => 1,
	),
	
	'Diggita' => array(
        'icon' => 'diggita.png',
        'url' => 'http://www.diggita.it/submit.php?url={permalink}&title={title}',
    ),
	
	'Diigo' => array(
		'icon' => 'diigo.png',
		'url' => 'http://www.diigo.com/post?url={permalink}&amp;title={title}',
	),

	'DotNetKicks' => array(
		'icon' => 'dotnetkicks.png',
		'url' => 'http://www.dotnetkicks.com/kick/?url={permalink}&amp;title={title}',
	),

	'DZone' => array(
		'icon' => 'dzone.png',
		'url' => 'http://www.dzone.com/links/add.html?url={permalink}&amp;title={title}',
		'support32px' => 1,
	),
	
	// E
	
	'eKudos' => array(
		'icon' => 'ekudos.png',
		'url' => 'http://www.ekudos.nl/artikel/nieuw?url={permalink}&amp;title={title}&amp;desc={excerpt}',
	),

	'email' => array(
		'icon' => 'email_link.png',
		'url' => 'mailto:?subject={title}&amp;body={permalink}',
		'support32px' => 1,
	),
	
	// F
	
	'Facebook' => array(
		'icon' => 'facebook.png',
		'url' => 'http://www.facebook.com/share.php?u={permalink}&amp;t={title}',
		'support32px' => 1,
	),

	'Fark' => array(
		'icon' => 'fark.png',
		'url' => 'http://cgi.fark.com/cgi/fark/farkit.pl?h={title}&amp;u={permalink}',
	),

	'Fleck' => array(
		'icon' => 'fleck.png',
		'url' => 'http://beta3.fleck.com/bookmarklet.php?url={permalink}&amp;title={title}',
	),

	'FriendFeed' => array(
		'icon' => 'friendfeed.png',
		'url' => 'http://www.friendfeed.com/share?title={title}&amp;link={permalink}',
		'support32px' => 1,
	),
	
	'Friendster' => array(
		'icon' => 'friendster.png',
		'url' => 'http://www.friendster.com/sharer.php?u={permalink}&t={title}',
		'support32px' => 1,
	),

	'FSDaily' => array(
		'icon' => 'fsdaily.png',
		'url' => 'http://www.fsdaily.com/submit?url={permalink}&amp;title={title}',
	),
	
	// G
	
	'Global Grind' => array (
		'icon' => 'globalgrind.png',
		'url' => 'http://globalgrind.com/submission/submit.aspx?url={permalink}&amp;type=Article&amp;title={title}',
	),
	
	'Google' => array (
		'icon' => 'google.png',
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk={permalink}&amp;title={title}&amp;annotation={excerpt}',
		'support32px' => 1,
	),
	
	'Google Buzz' => array(
        'icon' => 'googlebuzz.png',
        'url' => 'http://www.google.com/buzz/post?url={permalink}',
		'support32px' => 1,
    ),
	
	'Google Reader' => array(
        'icon' => 'googlereader.png',
        'url' => 'http://www.google.com/reader/link?url={permalink}&title={title}',
		'support32px' => 1,
    ), 
	
	'Gwar' => array(
		'icon' => 'gwar.png',
		'url' => 'http://www.gwar.pl/DodajGwar.html?u={permalink}',
	),
	
	// H
	
	'HackerNews' => array(
		'icon' => 'hackernews.png',
		'url' => 'http://news.ycombinator.com/submitlink?u={permalink}&amp;t={title}',
	),

	'Haohao' => array(
		'icon' => 'haohao.png',
		'url' => 'http://www.haohaoreport.com/submit.php?url={permalink}&amp;title={title}',
	),

	'HealthRanker' => array(
		'icon' => 'healthranker.png',
		'url' => 'http://healthranker.com/submit.php?url={permalink}&amp;title={title}',
	),

	'HelloTxt' => array(
        'icon' => 'hellotxt.png',
        'url' => 'http://hellotxt.com/?status={title}+{permalink}',
    ),

	'Hemidemi' => array(
		'icon' => 'hemidemi.png',
		'url' => 'http://www.hemidemi.com/user_bookmark/new?title={title}&amp;url={permalink}',
	),

	'Hyves' => array(
		'icon' => 'hyves.png',
		'url' => 'http://www.hyves.nl/profilemanage/add/tips/?name={title}&amp;text={excerpt}+{permalink}&amp;rating=5',
		'support32px' => 1,
	),
	
	// I
	
	'Identi.ca' => array(
		'icon' => 'identica.png',
		'url' => 'http://identi.ca/notice/new?status_textarea={permalink}',
	),
	
	'Internetmedia' => array(
		'icon' => 'im.png',
		'url' => 'http://internetmedia.hu/submit.php?url={permalink}',
	),
		
	'IndianPad' => array(
		'icon' => 'indianpad.png',
		'url' => 'http://www.indianpad.com/submit.php?url={permalink}',
	),
	
	// K
	
	'Kirtsy' => array(
		'icon' => 'kirtsy.png',
		'url' => 'http://www.kirtsy.com/submit.php?url={permalink}&amp;title={title}',
	),
	
	// L
	
	'laaik.it' => array(
		'icon' => 'laaikit.png',
		'url' => 'http://laaik.it/NewStoryCompact.aspx?uri={permalink}&amp;headline={title}&amp;cat=5e082fcc-8a3b-47e2-acec-fdf64ff19d12',
	),
	
	'LaTafanera' => array(
        'icon' => 'latafanera.png',
        'url' => 'http://latafanera.cat/submit.php?url={permalink}',
    ),
	
	'LinkaGoGo' => array(
		'icon' => 'linkagogo.png',
		'url' => 'http://www.linkagogo.com/go/AddNoPopup?url={permalink}&amp;title={title}',
	),
	
	'LinkArena' => array(
		'icon' => 'linkarena.png',
		'url' => 'http://linkarena.com/bookmarks/addlink/?url={permalink}&amp;title={title}',
	),
	
	'LinkedIn' => array(
		'icon' => 'linkedin.png',
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url={permalink}&amp;title={title}&amp;source={blogname}&amp;summary={excerpt}',
		'support32px' => 1,
	),

	'Linkter' => array(
		'icon' => 'linkter.png',
		'url' => 'http://www.linkter.hu/index.php?action=suggest_link&amp;url={permalink}&amp;title={title}',
	),
	
	'Live' => array(
		'icon' => 'live.png',
		'url' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;url={permalink}&amp;title={title}',
		'support32px' => 1,
	),
	
	// M
	
	'Meneame' => array(
		'icon' => 'meneame.png',
		'url' => 'http://meneame.net/submit.php?url={permalink}',
	),
	
	'MisterWong' => array(
		'icon' => 'misterwong.png',
		'url' => 'http://www.mister-wong.com/addurl/?bm_url={permalink}&amp;bm_description={title}&amp;plugin=wp-socializer',
		'support32px' => 1,
	),

	/*'MisterWong.DE' => array(
		'icon' => 'misterwong.png',
		'url' => 'http://www.mister-wong.de/addurl/?bm_url={permalink}&amp;bm_description={title}&amp;plugin=soc',
		'sameImageAs' => 'MisterWong',
	),*/
	
	'Mixx' => array(
		'icon' => 'mixx.png',
		'url' => 'http://www.mixx.com/submit?page_url={permalink}&amp;title={title}',
		'support32px' => 1,
	),
	
	'MOB' => array(
        'icon' => 'mob.png',
        'url' => 'http://www.mob.com/share.php?u={permalink}&t={title}',
    ), 
	
	'MSNReporter' => array(
		'icon' => 'msnreporter.png',
		'url' => 'http://reporter.nl.msn.com/?fn=contribute&amp;Title={title}&amp;URL={permalink}&amp;cat_id=6&amp;tag_id=31&amp;Remark={excerpt}',
	),
	
	'muti' => array(
		'icon' => 'muti.png',
		'url' => 'http://www.muti.co.za/submit?url={permalink}&amp;title={title}',
	),
	
	'MyShare' => array(
		'icon' => 'myshare.png',
		'url' => 'http://myshare.url.com.tw/index.php?func=newurl&amp;url={permalink}&amp;desc={title}',
	),

	'MySpace' => array(
		'icon' => 'myspace.png',
		'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?u={permalink}&amp;t={title}',
		'support32px' => 1,
	),
	
	// N
	
	'N4G' => array(
		'icon' => 'n4g.png',
		'url' => 'http://www.n4g.com/tips.aspx?url={permalink}&amp;title={title}',
	),
	
	'Netvibes' => array(
		'icon' => 'netvibes.png',
		'url' =>	'http://www.netvibes.com/share?title={title}&amp;url={permalink}',
		'support32px' => 1,
	),
	
	'Netvouz' => array(
		'icon' => 'netvouz.png',
		'url' => 'http://www.netvouz.com/action/submitBookmark?url={permalink}&amp;title={title}&amp;popup=no',
	),
	
	'NewsVine' => array(
		'icon' => 'newsvine.png',
		'url' => 'http://www.newsvine.com/_tools/seed&amp;save?u={permalink}&amp;h={title}',
		'support32px' => 1,
	),

	'NuJIJ' => array(
		'icon' => 'nujij.png',
		'url' => 'http://nujij.nl/jij.lynkx?t={title}&amp;u={permalink}&amp;b={excerpt}',
	),
	
	// O
	
	'Orkut' => array(
		'icon' => 'orkut.png',
		'url' => 'http://promote.orkut.com/preview?nt=orkut.com&amp;tt={title}&amp;du={permalink}&amp;cn={excerpt}',
		'support32px' => 1,
	),
	
	// P
	
	'PDF' => array(
		'icon' => 'pdf.png',
		'url' => 'http://www.printfriendly.com/print?url={permalink}',
	),
	
	'Ping.fm' => array(
		'icon' => 'ping.png',
		'url' => 'http://ping.fm/ref/?link={permalink}&amp;title={title}&amp;body={excerpt}',
		'support32px' => 1,
	),

	'Posterous' => array(
		'icon' => 'posterous.png',
		'url' => 'http://posterous.com/share?linkto={permalink}&amp;title={title}&amp;selection={excerpt}',
		'support32px' => 1,
	),
	
	'Print' => array(
		'icon' => 'printfriendly.png',
		'url' => 'http://www.printfriendly.com/print?url={permalink}',
		'support32px' => 1,
	),
	
	'Propeller' => array(
		'icon' => 'propeller.png',
		'url' => 'http://www.propeller.com/submit/?url={permalink}',
	),
	
	// R
	
	'Ratimarks' => array(
		'icon' => 'ratimarks.png',
		'url' => 'http://ratimarks.org/bookmarks.php/?action=add&address={permalink}&amp;title={title}',
	),

	'Rec6' => array(
		'icon' => 'rec6.png',
		'url' => 'http://rec6.via6.com/link.php?url={permalink}&amp;={title}',
	),

	'Reddit' => array(
		'icon' => 'reddit.png',
		'url' => 'http://reddit.com/submit?url={permalink}&amp;title={title}',
		'support32px' => 1,
	),

	'RSS' => array(
		'icon' => 'rss.png',
		'url' => '{rss-url}',
		'support32px' => 1,
	),
	
	// S
	
	'Scoopeo' => array(
		'icon' => 'scoopeo.png',
		'url' => 'http://www.scoopeo.com/scoop/new?newurl={permalink}&amp;title={title}',
	),	

	'Segnalo' => array(
		'icon' => 'segnalo.png',
		'url' => 'http://segnalo.alice.it/post.html.php?url={permalink}&amp;title={title}',
	),
	
	'SheToldMe' => array(
        'icon' => 'shetoldme.png',
        'url' => 'http://shetoldme.com/publish?url={permalink}&title={title}',
    ),
	
	'Simpy' => array(
		'icon' => 'simpy.png',
		'url' => 'http://www.simpy.com/simpy/LinkAdd.do?href={permalink}&amp;title={title}',
	),

	'Slashdot' => array(
		'icon' => 'slashdot.png',
		'url' => 'http://slashdot.org/bookmark.pl?title={title}&amp;url={permalink}',
	),

	'Socialogs' => array(
		'icon' => 'socialogs.png',
		'url' => 'http://socialogs.com/add_story.php?story_url={permalink}&amp;story_title={title}',
	),
	
	'SphereIt' => array(
		'icon' => 'sphere.png',
		'url' => 'http://www.sphere.com/search?q=sphereit:{permalink}&amp;title={title}',
	),

	'Sphinn' => array(
		'icon' => 'sphinn.png',
		'url' => 'http://sphinn.com/index.php?c=post&amp;m=submit&amp;link={permalink}',
		'support32px' => 1,
	),

	'StumbleUpon' => array(
		'icon' => 'stumbleupon.png',
		'url' => 'http://www.stumbleupon.com/submit?url={permalink}&amp;title={title}',
		'support32px' => 1,
	),
	
	// T
	
	'Techmeme' => array( 
		'icon' => 'techmeme.png',
		'url' => 'http://twitter.com/home/?status=tip%20@Techmeme%20{permalink}%20{title}', 
	), 

	'Technorati' => array(
		'icon' => 'technorati.png',
		'url' => 'http://technorati.com/faves?add={permalink}',
		'support32px' => 1,
	),

	'Tipd' => array(
		'icon' => 'tipd.png',
		'url' => 'http://tipd.com/submit.php?url={permalink}',
	),
	
	'Tumblr' => array(
		'icon' => 'tumblr.png',
		'url' => 'http://www.tumblr.com/share?v=3&amp;u={permalink}&amp;t={title}&amp;s={excerpt}',
		'support32px' => 1,
	),
	
	'Twitter' => array(
		'icon' => 'twitter.png',
		'url' => 'http://twitter.com/home?status={title}%20-%20{permalink}',
		'support32px' => 1,
	),
	
	// U
	
	'Upnews' => array(
		'icon' => 'upnews.png',
		'url' => 'http://www.upnews.it/submit?url={permalink}&amp;title={title}',
	),
	
	// V
	
	'viadeo FR' => array(
        'icon' => 'viadeo.png',
        'url' => 'http://www.viadeo.com/shareit/share/?url={permalink}&title={title}&urllanguage=fr',
    ),
	
	// W
	
	'Webnews.de' => array(
        'icon' => 'webnews.png',
        'url' => 'http://www.webnews.de/einstellen?url={permalink}&amp;title={title}',
    ),

	'Webride' => array(
		'icon' => 'webride.png',
		'url' => 'http://webride.org/discuss/split.php?uri={permalink}&amp;title={title}',
	),
	
	'Wikio' => array(
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.com/vote?url={permalink}',
	),
	
	/*'Wikio FR' => array(
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.fr/vote?url={permalink}',
		'sameImageAs' => 'Wikio',
	),

	'Wikio IT' => array(
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.it/vote?url={permalink}',
		'sameImageAs' => 'Wikio',
	),*/
	
	'Wists' => array(
		'icon' => 'wists.png',
		'url' => 'http://wists.com/s.php?c=&amp;r={permalink}&amp;title={title}',
	),
	
	'Wykop' => array(
		'icon' => 'wykop.png',
		'url' => 'http://www.wykop.pl/dodaj?url={permalink}',
	),
	
	// X
	
	'Xerpi' => array(
		'icon' => 'xerpi.png',
		'url' => 'http://www.xerpi.com/block/add_link_from_extension?url={permalink}&amp;title={title}',
	),
	
	// Y
	
	'Yahoo! Bookmarks' => array(
		'icon' => 'yahoo.png',
		'url' => 'http://bookmarks.yahoo.com/toolbar/savebm?u={permalink}&amp;t={title}&opener=bm&amp;ei=UTF-8&amp;d={excerpt}',
		'support32px' => 1,
	),
	
	'YahooBuzz' => array(
		'icon' => 'yahoobuzz.png',
		'url' => 'http://buzz.yahoo.com/submit/?submitUrl={permalink}&amp;submitHeadline={title}&amp;submitSummary={excerpt}&amp;submitAssetType=text',
		'support32px' => 1,
	),

	'Yigg' => array(
		'icon' => 'yiggit.png',
		'url' => 'http://yigg.de/neu?exturl={permalink}&amp;exttitle={title}',
	 ),
	
);

$wpsr_button_code_list = array(
	"{social-bts-16px}", "{social-bts-32px}", "{addthis-bt}", 
	"{buzz-post}", "{buzz-follow}", "{retweet-bt}", 
	"{digg-bt}", "{facebook-like}", "{facebook-share}", 
	"{custom-1}", "{custom-2}"
);

$wpsr_addthis_lang_array = array(
	'en'=>'English', 'ar'=>'Arabic', 'zh'=>'Chinese', 'cs'=>'Czech', 'da'=>'Danish', 'nl'=>'Dutch','fa'=>'Farsi', 'fi'=>'Finnish', 'fr'=>'French', 'ga'=>'Gaelic', 'de'=>'German', 'el'=>'Greek', 'he'=>'Hebrew', 'hi'=>'Hindi', 'it'=>'Italian', 'ja'=>'Japanese', 'ko'=>'Korean', 'lv'=>'Latvian', 'lt'=>'Lithuanian', 'no'=>'Norwegian', 'pl'=>'Polish', 'pt'=>'Portugese', 'ro'=>'Romanian', 'ru'=>'Russian', 'sk'=>'Slovakian', 'sl'=>'Slovenian', 'es'=>'Spanish', 'sv'=>'Swedish', 'th'=>'Thai', 'ur'=>'Urdu', 'cy'=>'Welsh', 'vi'=>'Vietnamese'
);


$wpsr_buzz_lang_array = array(
	'en'=>'English', 'ar'=>'Arabic', 'zh'=>'Chinese', 'cs'=>'Czech', 'da'=>'Danish', 'nl'=>'Dutch','fa'=>'Farsi', 'fi'=>'Finnish', 'fr'=>'French', 'ga'=>'Gaelic', 'de'=>'German', 'el'=>'Greek', 'he'=>'Hebrew', 'hi'=>'Hindi', 'it'=>'Italian', 'ja'=>'Japanese', 'ko'=>'Korean', 'lv'=>'Latvian', 'lt'=>'Lithuanian', 'no'=>'Norwegian', 'pl'=>'Polish', 'pt'=>'Portugese', 'ro'=>'Romanian', 'ru'=>'Russian', 'sk'=>'Slovakian', 'sl'=>'Slovenian', 'es'=>'Spanish', 'sv'=>'Swedish', 'th'=>'Thai', 'vi'=>'Vietnamese'
);


## Include WP Socializer Processer files
require_once('socializer-admin.php');
require_once('socializer-addthis.php');
require_once('socializer-buzz.php');
require_once('socializer-retweet.php');
require_once('socializer-digg.php');
require_once('socializer-facebook.php');
require_once('socializer-socialbuttons.php');
require_once('socializer-custom.php');

## wpsr Is active check
function wpsr_is_active(){
    if (get_option("wpsr_active") == 1) {
        return 1;
    }else{
		return 0;
    }
}

## wpsr plugin activate
function wpsr_plugin_activate(){
	update_option("wpsr_active", 1);
}
register_deactivation_hook(__FILE__, 'wpsr_plugin_activate');

## wpsr plugin deactivate
function wpsr_plugin_deactivate(){
	update_option("wpsr_active", 0);
}
register_deactivation_hook(__FILE__, 'wpsr_plugin_deactivate');

## Admin Notices
function wpsr_admin_notices(){
	if(!wpsr_is_active() && $_GET['page'] != 'wp-socializer/socializer-admin.php'){
		echo '<div class="updated fade"><p><b>WP Socializer</b> plugin is intalled. You should immediately adjust <a href="options-general.php?page=wp-socializer/socializer-admin.php">the settings</a></p></div>';
	}
}
add_action('admin_notices', 'wpsr_admin_notices');

## Action Links
function wpsr_plugin_actions($links, $file){
	static $this_plugin;
	if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);
	if( $file == $this_plugin ){
		$settings_link = '<a href="options-general.php?page=wp-socializer/socializer-admin.php">Settings</a> ' . '|' . ' <a href="http://www.aakashweb.com/">Support</a>';
		$links = array_merge( array($settings_link), $links);
	}
	return $links;
}
add_filter('plugin_action_links', 'wpsr_plugin_actions', 10, 2);

/**
  * One function for displaying the buttons in theme files
  * Use wp_socializer(the button code or template name) in the theme files to print the 
  * button or the template
  * 
  * Available button codes are given in the variable $wpsr_button_code_list (line 582) without brackets
  * Available template name are 'template1' and 'template2'
  */
  
function wp_socializer($to_display){
	switch($to_display){
		case 'social-bts-16px' :
			return wpsr_social_bts('16px');
			break;
			
		case 'social-bts-32px' :
			return wpsr_social_bts('32px');
			break;
			
		case 'addthis-bt' :
			return wpsr_addthis_bt();
			break;
			
		case 'buzz-post' :
			return wpsr_buzz_post();
			break;
			
		case 'buzz-follow' :
			return wpsr_buzz_follow();
			break;
			
		case 'retweet-bt' :
			return wpsr_retweet_bt();
			break;
			
		case 'digg-bt' :
			return wpsr_digg_bt();
			break;
			
		case 'facebook-like' :
			return wpsr_facebook_like();
			break;
			
		case 'facebook-share' :
			return wpsr_facebook_share();
			break;
			
		case 'custom-1' :
			return wpsr_custom_bt('custom1');
			break;
			
		case 'custom-2' :
			return wpsr_custom_bt('custom2');
			break;
		
		case 'template-1' :
			return wpsr_process_template('template1');
			break;
			
		case 'template-2' :
			return wpsr_process_template('template2');
			break;
	}
}

/**
  * One function for getting the url and title of the page
  * outside the loop and inside the loop
  *
  * Uses super variables to get the page url outside loop and wp_title() to 
  * to get the page title. 
  */

function wpsr_get_post_details(){
	// Get the global variables
	global $post;
	
	// Inside loop
	$permalink_inside_loop = get_permalink($post->ID);
	$title_inside_loop = str_replace('+', '%20', get_the_title($post->ID));
	$excerpt_inside_loop = strip_tags(strip_shortcodes($post->post_excerpt));
	// If excerpt is null
	if($excerpt_inside_loop == ''){
		$excerpt_inside_loop = substr(strip_tags(strip_shortcodes($post->post_content)), 0, 250);
	}
	
	// Outside loop
	$permalink_outside_loop = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$title_outside_loop = str_replace('+', '%20', wp_title('', 0));
	$excerpt_outside_loop = $title_outside_loop;
	// If title is null
	if($title_outside_loop == ''){
		$title_outside_loop = str_replace('+', '%20', get_bloginfo('name'));
	}
	
	if(in_the_loop()){
		$details = array(
			'permalink' => $permalink_inside_loop,
			'title' => $title_inside_loop,
			'excerpt' => $excerpt_inside_loop
		);
		
	}else{
		$details = array(
			'permalink' => $permalink_outside_loop,
			'title' => $title_outside_loop,
			'excerpt' => $excerpt_outside_loop
		);
	}
	
	return $details;

}


## Check whether the output is given by the_excerpt() or the_content() function
function wpsr_is_excerpt($excerpt = ''){
	if(!defined('IS_EXCERPT')){
  		define('IS_EXCERPT', true);
	}
	return $excerpt;
}
add_filter('get_the_excerpt', 'wpsr_is_excerpt');

function wpsr_process_template($the_template){

	// Get the global variables
	global $wpsr_button_code_list;
	
	// Get the processed button codes
	$wpsr_social_bts_16px = wpsr_social_bts('16px');
	$wpsr_social_bts_32px = wpsr_social_bts('32px');
	$wpsr_addthis_bt = wpsr_addthis_bt();
	$wpsr_buzz_post = wpsr_buzz_post();
	$wpsr_buzz_follow = wpsr_buzz_follow();
	$wpsr_retweet_bt = wpsr_retweet_bt();
	$wpsr_digg_bt = wpsr_digg_bt();
	$wpsr_facebook_like = wpsr_facebook_like();
	$wpsr_facebook_share = wpsr_facebook_share();
	$wpsr_custom1 = wpsr_custom_bt('custom1');
	$wpsr_custom2 = wpsr_custom_bt('custom2');
	
	$wpsr_button_processed_list = array(
		$wpsr_social_bts_16px, $wpsr_social_bts_32px, $wpsr_addthis_bt, 
		$wpsr_buzz_post, $wpsr_buzz_follow, $wpsr_retweet_bt, 
		$wpsr_digg_bt, $wpsr_facebook_like, $wpsr_facebook_share, 
		$wpsr_custom1, $wpsr_custom2
	);
	
	// Get the placement options | Template 1&2
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template1_content = $wpsr_template1['content'];
	$wpsr_template2_content = $wpsr_template2['content'];
	
	switch($the_template){
		case 'template1' :
			$wpsr_template1_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list, $wpsr_template1_content);
			return $wpsr_template1_processed;
			
		case 'template2' :
			$wpsr_template2_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list, $wpsr_template2_content);
			return $wpsr_template2_processed;
	}
}

## Print the output of template1
function wpsr_output_template1($content = ''){

	// Get the global variables
	global $post;
	
	// Get the placement options
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_inhome = $wpsr_template1['inhome'];
	$wpsr_template1_insingle = $wpsr_template1['insingle'];
	$wpsr_template1_inpage = $wpsr_template1['inpage'];
	$wpsr_template1_incategory = $wpsr_template1['incategory'];
	$wpsr_template1_intag = $wpsr_template1['intag'];
	$wpsr_template1_indate = $wpsr_template1['indate'];
	$wpsr_template1_inauthor = $wpsr_template1['inauthor'];
	$wpsr_template1_insearch = $wpsr_template1['insearch'];
	$wpsr_template1_infeed = $wpsr_template1['infeed'];
	$wpsr_template1_abvcontent = $wpsr_template1['abvcontent'];
	$wpsr_template1_blwcontent = $wpsr_template1['blwcontent'];
	
	// Check page conditionals
	if (is_home() == 1 && $wpsr_template1_inhome == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif (is_single() == 1 && $wpsr_template1_insingle == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif (is_page() == 1 && $wpsr_template1_inpage == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif (is_category() == 1 && $wpsr_template1_incategory == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
	
	}elseif (is_tag() == 1 && $wpsr_template1_intag == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif (is_date() == 1 && $wpsr_template1_indate == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif (is_author() == 1 && $wpsr_template1_inauthor == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif(is_search() == 1 && $wpsr_template1_insearch == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}elseif(is_feed() == 1 && $wpsr_template1_infeed == 1){
		$wpsr_template1_processed = wpsr_process_template('template1');
		
	}else{
		$wpsr_template1_processed = '' ;
	}
	
	/**  
	 * If the output is given by the_excerpt() function 
	 * and if the excerpt is empty generate the custom excerpt from the content 
	 * 
	 * Used to remove the widget/button text printed along with the content
	 */
	
	if(defined('IS_EXCERPT') && IS_EXCERPT ){
		if(empty($post->post_excerpt)){
			$content = substr(strip_tags(strip_shortcodes($post->post_content), '<p>'),0,250);
		}
	}
	
	// Check whether displaying template1 in the post is enabled
	if (get_post_meta($post->ID,'_wpsr-disable-template1', true) != 1){
	
		// Check position conditionals
		if($wpsr_template1_abvcontent == 1 && $wpsr_template1_blwcontent == 1){
			return $wpsr_template1_processed . $content . $wpsr_template1_processed;
			
		}elseif($wpsr_template1_abvcontent == 1){
			return $wpsr_template1_processed . $content;
		
		}elseif($wpsr_template1_blwcontent == 1){
			return $content . $wpsr_template1_processed;
		
		}else{
			return $content;
		}
	
	}else{
		return $content;
	}
	
}

## Print the output of template2
function wpsr_output_template2($content = ''){

	// Get the global variables
	global $post;
	
	// Get the placement options
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template2_inhome = $wpsr_template2['inhome'];
	$wpsr_template2_insingle = $wpsr_template2['insingle'];
	$wpsr_template2_inpage = $wpsr_template2['inpage'];
	$wpsr_template2_incategory = $wpsr_template2['incategory'];
	$wpsr_template2_intag = $wpsr_template2['intag'];
	$wpsr_template2_indate = $wpsr_template2['indate'];
	$wpsr_template2_inauthor = $wpsr_template2['inauthor'];
	$wpsr_template2_insearch = $wpsr_template2['insearch'];
	$wpsr_template2_infeed = $wpsr_template2['infeed'];
	$wpsr_template2_abvcontent = $wpsr_template2['abvcontent'];
	$wpsr_template2_blwcontent = $wpsr_template2['blwcontent'];
	
	// Check page conditionals
	if (is_home() == 1 && $wpsr_template2_inhome == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif (is_single() == 1 && $wpsr_template2_insingle == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif (is_page() == 1 && $wpsr_template2_inpage == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif (is_category() == 1 && $wpsr_template2_incategory == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
	
	}elseif (is_tag() == 1 && $wpsr_template2_intag == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif (is_date() == 1 && $wpsr_template2_indate == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif (is_author() == 1 && $wpsr_template2_inauthor == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif(is_search() == 1 && $wpsr_template2_insearch == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}elseif(is_feed() == 1 && $wpsr_template2_infeed == 1){
		$wpsr_template2_processed = wpsr_process_template('template2');
		
	}else{
		$wpsr_template2_processed = '' ;
	}
	
	// Check whether displaying template1 in the post is enabled
	if (get_post_meta($post->ID,'_wpsr-disable-template2', true) != 1){
	
		// Check position conditionals
		if($wpsr_template2_abvcontent == 1 && $wpsr_template2_blwcontent == 1){
			return $wpsr_template2_processed . $content . $wpsr_template2_processed;
			
		}elseif($wpsr_template2_abvcontent == 1){
			return $wpsr_template2_processed . $content;
		
		}elseif($wpsr_template2_blwcontent == 1){
			return $content . $wpsr_template2_processed;
		
		}else{
			return $content;
		}
	
	}else{
		return $content;
	}
	
}

## Add required filters and check whether WP Socializer is disabled
$wpsr_settings = get_option('wpsr_settings_data');

if(!$wpsr_settings['disablewpsr']){
	// Filters
	add_filter('the_content', 'wpsr_output_template1');
	add_filter('the_content', 'wpsr_output_template2');
	
	// Check whether to print in excerpts
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	if($wpsr_template1['inexcerpt']){
		add_filter('the_excerpt', 'wpsr_output_template1');
	}
	
	if($wpsr_template2['inexcerpt']){
		add_filter('the_excerpt', 'wpsr_output_template2');
	}
}

## Add the button scripts to the header
function wpsr_scripts_adder(){

	global $wpsr_pluginpath;
	
	## Social Button options
	$wpsr_socialbt = get_option('wpsr_socialbt_data');
	$wpsr_socialbt_loadcss = $wpsr_socialbt['loadcss'];
	
	if($wpsr_socialbt_loadcss == 1){
		wpsr_socialbts_script();
	}
	
	# Get Retweet Button Option
	$wpsr_retweet = get_option('wpsr_retweet_data');
	$wpsr_retweet_service = $wpsr_retweet['service'];
	
	if(wpsr_retweet_bt_used() == 1 && $wpsr_retweet_service == 'topsy'){
		wpsr_retweet_topsy_script();
	}
	
	if(wpsr_digg_bt_used() == 1){
		wpsr_digg_script();
	}
	
}

if(!$wpsr_settings['disablewpsr']){
	if($wpsr_settings['scriptsplace'] == 'header'){
		add_action('wp_head', 'wpsr_scripts_adder');
	}else{
		add_action('wp_footer', 'wpsr_scripts_adder');
	}
}

## Add the misc/small scripts to the footer
function wpsr_footer(){
	if(wpsr_addtofavorites_bt_used()){
		wpsr_addtofavorites_script();
	}
}
add_action('wp_footer', 'wpsr_footer');

## Admin Dashboard
if(!function_exists('aw_dashboard')){
	function aw_dashboard() {
		$rss = array('url' => 'http://feeds2.feedburner.com/aakashweb', 'items' => '5','show_date' => 0, 'show_summary'=> 1);
		$subscribe = "window.open('http://feedburner.google.com/fb/a/mailverify?uri=aakashweb', 'win','menubar=1,resizable=1,width=600,height=500'); return false;" ;
		echo '<div class="rss-widget">';
		echo '<a href="http://www.aakashweb.com/wordpress-plugins/" target="_blank"><img src="http://a.imageshack.us/img844/5834/97341029.png" align="right"/></a>';
		echo '<p>'; wp_widget_rss_output($rss); echo '</p>';
		echo '<hr style="border-top: 1px solid #fff;"/>';
		echo '<p><a href="#" onclick="' . $subscribe . '">Subscribe to Updates</a> | <a href="http://twitter.com/vaakash" target="_blank">Follow on Twitter</a> | <a href="http://www.aakashweb.com/" target="_blank">Home Page</a></p>';
		echo "</div>";
	}
	
	function aw_dashboard_setup() {
		wp_add_dashboard_widget('aw_dashboard', __( 'AW Latest Updates' ), 'aw_dashboard');
	}
	add_action('wp_dashboard_setup', 'aw_dashboard_setup');
}

?>