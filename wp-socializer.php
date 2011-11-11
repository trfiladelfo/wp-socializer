<?php
/*
Plugin Name: WP Socializer
Version: 2.2
Plugin URI: http://www.aakashweb.com/
Description: WP Socializer is an advanced and powerful plugin for adding bookmarking buttons like social buttons, addthis, digg, retweet, facebook like/share in posts and excerpts.
Author: Aakash Chakravarthy
Author URI: http://www.aakashweb.com/
*/

if(!defined('WP_CONTENT_URL')) {
	$wpsr_url = get_option('siteurl') . '/wp-content/plugins/' . plugin_basename(dirname(__FILE__)).'/';
}else{
	$wpsr_url = WP_CONTENT_URL . '/plugins/' . plugin_basename(dirname(__FILE__)) . '/';
}

define('WPSR_VERSION', '2.2');
define('WPSR_AUTHOR', 'Aakash Chakravarthy');
define('WPSR_URL', $wpsr_url);
define('WPSR_PUBLIC_URL', WPSR_URL . 'public/');
define('WPSR_ADMIN_URL', WPSR_URL . 'admin/');
define('WPSR_SOCIALBT_IMGPATH', WPSR_PUBLIC_URL . 'social-icons/');

$wpsr_socialsites_list = array(
	
	'addtofavorites' => array(
		'name' => 'Add to favorites',
		'titleText' => '{de-title}',
	 	'icon' => 'addtofavorites.png',
	 	'url' => '{de-url}" onclick="addBookmark(event);" rel="sidebar',
		'support32px' => 1,
	 ),
	 
	 // B
	 
	'barrapunto' => array(
		'name' => 'BarraPunto',
		'titleText' => __('Share this on ', 'wpsr') . 'BarraPunto',
		'icon' => 'barrapunto.png',
		'url' => 'http://barrapunto.com/submit.pl?subj={title}&amp;story={url}',
	),
	
	'bitacoras' => array(
		'name' => 'Bitacoras.com',
		'titleText' => __('Share this on ', 'wpsr') . 'Bitacoras',
		'icon' => 'bitacoras.png',
		'url' => 'http://bitacoras.com/anotaciones/{url}',
	),
	
	'blinklist' => array(
		'name' => 'BlinkList',
		'titleText' => __('Share this on ', 'wpsr') . 'BlinkList',
		'icon' => 'blinklist.png',
		'url' => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url={url}&amp;Title={title}',
		'support32px' => 1,
	),
	
	'blip' => array(
		'name' => 'Blip',
		'titleText' => __('Share this on ', 'wpsr') . 'Blip',
		'icon' => 'blip.png',
		'url' => 'http://blip.pl/dashboard?body={title}+{url}',
		'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011
	
	'blogger' => array(
		'name' => 'Blogger',
		'titleText' => __('Post this on ', 'wpsr') . 'Blogger',
        'icon' => 'blogger.png',
        'url' => 'http://www.blogger.com/blog_this.pyra?t&u={url}&n={title}&pli=1',
		'support32px' => 1,
    ),
	
	'blogmarks' => array(
		'name' => 'Blogmarks',
		'titleText' => __('Share this on ', 'wpsr') . 'BlogMarks',
		'icon' => 'blogmarks.png',
		'url' => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url={url}&amp;title={title}',
	),

	'blogospherenews' => array(
		'name' => 'Blogosphere News',
		'titleText' => __('Submit this to ', 'wpsr') . 'Blogosphere News',
		'icon' => 'blogospherenews.png',
		'url' => 'http://www.blogospherenews.com/submit.php?url={url}&amp;title={title}',
	),

	'blogtercimlap' => array(
		'name' => 'Blogter Cimlap',
		'titleText' => __('Share this on ', 'wpsr') . 'blogtercimlap',
		'icon' => 'blogter.png',
		'url' => 'http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title={title}&amp;url={url}',
	),
	
	'faves' => array(
		'name' => 'Faves',
		'titleText' => __('Share this on ', 'wpsr') . 'Faves',
		'icon' => 'bluedot.png',
		'url' => 'http://faves.com/Authoring.aspx?u={url}&amp;title={title}',
	),
	
	'boxnet' => array(
		'name' => 'Box.net',
		'titleText' => __('Add this on ', 'wpsr') . 'Box.net',
        'icon' => 'box.png',
        'url' => 'https://www.box.net/api/1.0/import?url={url}&name={title}&description={excerpt}&import_as=link',
    ), 
	
	// C
	
	'connotea' => array(
		'name' => 'Connotea',
		'titleText' => __('Share this on ', 'wpsr') . 'Connotea',
		'icon' => 'connotea.png',
		'url' => 'http://www.connotea.org/addpopup?continue=confirm&amp;uri={url}&amp;title={title}&amp;description={excerpt}',
	),

	'current' => array(
		'name' => 'Current',
		'titleText' => __('Share this on ', 'wpsr') . 'Current',
		'icon' => 'current.png',
		'url' => 'http://current.com/clipper.htm?url={url}&amp;title={title}',
	),
	
	// D
	
	'delicious' => array(
		'name' => 'Delicious',
		'titleText' => __('Post this on ', 'wpsr') . 'Delicious',
		'icon' => 'delicious.png',
		'url' => 'http://delicious.com/post?url={url}&amp;title={title}&amp;notes={excerpt}',
		'support32px' => 1,
	),
	
	'designbump' => array(
		'name' => 'Designbump',
		'titleText' => __('Share this on ', 'wpsr') . 'Designbump',
		'icon' => 'designbump.png',
		'url' => 'http://designbump.com/user/login?destination=submit?url={url}&title={title}&body={excerpt}',
		'support32px' => 1,
	),
	
	'designfloat' => array(
		'name' => 'Design Float',
		'titleText' => __('Submit this to ', 'wpsr') . 'Design Float',
		'icon' => 'designfloat.png',
		'url' => 'http://www.designfloat.com/submit.php?url={url}&amp;title={title}',
		'support32px' => 1,
	),
	
	'digg' => array(
		'name' => 'Digg',
		'titleText' => __('Submit this to ', 'wpsr') . 'Digg',
		'icon' => 'digg.png',
		'url' => 'http://digg.com/submit?phase=2&amp;url={url}&amp;title={title}&amp;bodytext={excerpt}',
		'support32px' => 1,
	),
	
	'diggita' => array(
		'name' => 'Diggita',
		'titleText' => __('Submit this to ', 'wpsr') . 'Diggita',
        'icon' => 'diggita.png',
        'url' => 'http://www.diggita.it/submit.php?url={url}&title={title}',
    ),
	
	'diigo' => array(
		'name' => 'Diigo',
		'titleText' => __('Post this on ', 'wpsr') . 'Diigo',
		'icon' => 'diigo.png',
		'url' => 'http://www.diigo.com/post?url={url}&amp;title={title}',
	),

	'dotnetkicks' => array(
		'name' => 'DotNetKicks',
		'titleText' => __('Share this on ', 'wpsr') . 'DotNetKicks',
		'icon' => 'dotnetkicks.png',
		'url' => 'http://www.dotnetkicks.com/kick/?url={url}&amp;title={title}',
	),

	'dzone' => array(
		'name' => 'DZone',
		'titleText' => __('Add this to ', 'wpsr') . 'DZone',
		'icon' => 'dzone.png',
		'url' => 'http://www.dzone.com/links/add.html?url={url}&amp;title={title}',
		'support32px' => 1,
	),
	
	// E
	
	'ekudos' => array(
		'name' => 'eKudos',
		'titleText' => __('Share this on ', 'wpsr') . 'eKudos',
		'icon' => 'ekudos.png',
		'url' => 'http://www.ekudos.nl/artikel/nieuw?url={url}&amp;title={title}&amp;desc={excerpt}',
	),

	'email' => array(
		'name' => 'Email',
		'titleText' => __('Email this ', 'wpsr') . '',
		'icon' => 'email.png',
		'url' => 'mailto:{email}?subject={de-title}&amp;body={de-excerpt} - {de-url}',
		'support32px' => 1,
	),
	
	// F
	
	'facebook' => array(
		'name' => 'Facebook',
		'titleText' => __('Share this on ', 'wpsr') . 'Facebook',
		'icon' => 'facebook.png',
		'url' => 'http://www.facebook.com/share.php?u={url}&amp;t={title}',
		'support32px' => 1,
	),

	'fark' => array(
		'name' => 'Fark',
		'titleText' => __('Share this on ', 'wpsr') . 'Fark',
		'icon' => 'fark.png',
		'url' => 'http://cgi.fark.com/cgi/fark/farkit.pl?h={title}&amp;u={url}',
	),

	'fleck' => array(
		'name' => 'Fleck',
		'titleText' => __('Share this on ', 'wpsr') . 'Fleck',
		'icon' => 'fleck.png',
		'url' => 'http://beta3.fleck.com/bookmarklet.php?url={url}&amp;title={title}',
	),

	'friendfeed' => array(
		'name' => 'FriendFeed',
		'titleText' => __('Share this on ', 'wpsr') . 'FriendFeed',
		'icon' => 'friendfeed.png',
		'url' => 'http://www.friendfeed.com/share?title={title}&amp;link={url}',
		'support32px' => 1,
	),
	
	'friendster' => array(
		'name' => 'Friendster',
		'titleText' => __('Share this on ', 'wpsr') . 'Friendster',
		'icon' => 'friendster.png',
		'url' => 'http://www.friendster.com/sharer.php?u={url}&t={title}',
		'support32px' => 1,
	),

	'fsdaily' => array(
		'name' => 'FSDaily',
		'titleText' => __('Share this on ', 'wpsr') . 'FSDaily',
		'icon' => 'fsdaily.png',
		'url' => 'http://www.fsdaily.com/submit?url={url}&amp;title={title}',
	),
	
	// G
	
	'gadugadu' => array(
		'name' => 'Gadu-Gadu',
		'titleText' => __('Share this on ', 'wpsr') . 'Gadu-Gadu',
      'icon' => 'gadugadu.png',
      'url' => 'http://www.gadu-gadu.pl/polec?title={title}&url={url}',
      'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011
	
	'globalgrind' => array(
		'name' => 'Global Grind',
		'titleText' => __('Submit this to ', 'wpsr') . 'Global Grind',
		'icon' => 'globalgrind.png',
		'url' => 'http://globalgrind.com/submission/submit.aspx?url={url}&amp;type=Article&amp;title={title}',
	),
	
	'google' => array(
		'name' => 'Google',
		'titleText' => __('Bookmark this on ', 'wpsr') . 'Google',
		'icon' => 'google.png',
		'url' => 'http://www.google.com/bookmarks/mark?op=edit&amp;bkmk={url}&amp;title={title}&amp;annotation={excerpt}',
		'support32px' => 1,
	),
	
	'googlebuzz' => array(
		'name' => 'Google Buzz',
		'titleText' => __('Post this on ', 'wpsr') . 'Google Buzz',
        'icon' => 'googlebuzz.png',
        'url' => 'http://www.google.com/buzz/post?url={url}',
		'support32px' => 1,
    ),
	
	'googlereader' => array(
		'name' => 'Google Reader',
		'titleText' => __('Share this on ', 'wpsr') . 'Google Reader',
        'icon' => 'googlereader.png',
        'url' => 'http://www.google.com/reader/link?url={url}&title={title}',
		'support32px' => 1,
    ), 
	
	'grono' => array(
		'name' => 'Grono',
		'titleText' => __('Share this on ', 'wpsr') . 'Grono',
		'icon' => 'grono.png',
		'url' => 'http://grono.net/pub/popup/link/urlfetch/?url={url}&title={title}',
		'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011
	
	'gwar' => array(
		'name' => 'Gwar',
		'titleText' => __('Share this on ', 'wpsr') . 'Gwar',
		'icon' => 'gwar.png',
		'url' => 'http://www.gwar.pl/DodajGwar.html?u={url}',
	),
	
	// H
	
	'hackernews' => array(
		'name' => 'HackerNews',
		'titleText' => __('Share this on ', 'wpsr') . 'HackerNews',
		'icon' => 'hackernews.png',
		'url' => 'http://news.ycombinator.com/submitlink?u={url}&amp;t={title}',
	),

	'haohao' => array(
		'name' => 'Haohao',
		'titleText' => __('Submit this to ', 'wpsr') . 'Haohao',
		'icon' => 'haohao.png',
		'url' => 'http://www.haohaoreport.com/submit.php?url={url}&amp;title={title}',
	),

	'healthranker' => array(
		'name' => 'HealthRanker',
		'titleText' => __('Submit this to ', 'wpsr') . 'HealthRanker',
		'icon' => 'healthranker.png',
		'url' => 'http://healthranker.com/submit.php?url={url}&amp;title={title}',
	),

	'hellotxt' => array(
		'name' => 'HelloTxt',
		'titleText' => __('Share this on ', 'wpsr') . 'HelloTxt',
        'icon' => 'hellotxt.png',
        'url' => 'http://hellotxt.com/?status={title}+{url}',
    ),

	'hemidemi' => array(
		'name' => 'Hemidemi',
		'titleText' => __('Bookmark this on ', 'wpsr') . 'Hemidemi',
		'icon' => 'hemidemi.png',
		'url' => 'http://www.hemidemi.com/user_bookmark/new?title={title}&amp;url={url}',
	),

	'hyves' => array(
		'name' => 'Hyves',
		'titleText' => __('Share this on ', 'wpsr') . 'Hyves',
		'icon' => 'hyves.png',
		'url' => 'http://www.hyves.nl/profilemanage/add/tips/?name={title}&amp;text={excerpt}+{url}&amp;rating=5',
		'support32px' => 1,
	),
	
	// I
	
	'identica' => array(
		'name' => 'Identi.ca',
		'titleText' => __('Share this on ', 'wpsr') . 'Identi.ca',
		'icon' => 'identica.png',
		'url' => 'http://identi.ca/notice/new?status_textarea={url}',
	),
	
	'internetmedia' => array(
		'name' => 'Internetmedia',
		'titleText' => __('Share this on ', 'wpsr') . 'Internetmedia',
		'icon' => 'im.png',
		'url' => 'http://internetmedia.hu/submit.php?url={url}',
	),
		
	'indianpad' => array(
		'name' => 'IndianPad',
		'titleText' => __('Submit this to ', 'wpsr') . 'IndianPad',
		'icon' => 'indianpad.png',
		'url' => 'http://www.indianpad.com/submit.php?url={url}',
	),
	
	'instapaper' => array(
		'name' => 'Instapaper',
		'titleText' => __('Add this to ', 'wpsr') . 'Instapaper',
		'icon' => 'instapaper.png',
		'url' => 'http://www.instapaper.com/hello2?url={url}&title={title}',
		'support32px' => 1,
	),
	
	// K
	
	'kciuk' => array(
		'name' => 'Kciuk',
		'titleText' => __('Share this on ', 'wpsr') . 'Kciuk',
		'icon' => 'kciuk.png',
		'url' => 'http://www.kciuk.pl/Dodaj-link/?{url}?{title}/?auto',
		'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011
	
	'kirtsy' => array(
		'name' => 'Kirtsy',
		'titleText' => __('Submit this to ', 'wpsr') . 'Kirtsy',
		'icon' => 'kirtsy.png',
		'url' => 'http://www.kirtsy.com/submit.php?url={url}&amp;title={title}',
	),
	
	// L
	
	'laaikit' => array(
		'name' => 'laaik.it',
		'titleText' => __('Share this on ', 'wpsr') . 'laaik.it',
		'icon' => 'laaikit.png',
		'url' => 'http://laaik.it/NewStoryCompact.aspx?uri={url}&amp;headline={title}&amp;cat=5e082fcc-8a3b-47e2-acec-fdf64ff19d12',
	),
	
	'latafanera' => array(
		'name' => 'LaTafanera',
		'titleText' => __('Submit this to ', 'wpsr') . 'LaTafanera',
        'icon' => 'latafanera.png',
        'url' => 'http://latafanera.cat/submit.php?url={url}',
    ),
	
	'linkagogo' => array(
		'name' => 'LinkaGoGo',
		'titleText' => __('Share this on ', 'wpsr') . 'LinkaGoGo',
		'icon' => 'linkagogo.png',
		'url' => 'http://www.linkagogo.com/go/AddNoPopup?url={url}&amp;title={title}',
	),
	
	'linkarena' => array(
		'name' => 'LinkArena',
		'titleText' => __('Add this to ', 'wpsr') . 'LinkArena',
		'icon' => 'linkarena.png',
		'url' => 'http://linkarena.com/bookmarks/addlink/?url={url}&amp;title={title}',
	),
	
	'linkedin' => array(
		'name' => 'LinkedIn',
		'titleText' => __('Share this on ', 'wpsr') . 'LinkedIn',
		'icon' => 'linkedin.png',
		'url' => 'http://www.linkedin.com/shareArticle?mini=true&amp;url={url}&amp;title={title}&amp;source={blogname}&amp;summary={excerpt}',
		'support32px' => 1,
	),

	'linkter' => array(
		'name' => 'Linkter',
		'titleText' => __('Share this on ', 'wpsr') . 'Linkter',
		'icon' => 'linkter.png',
		'url' => 'http://www.linkter.hu/index.php?action=suggest_link&amp;url={url}&amp;title={title}',
	),
	
	'live' => array(
		'name' => 'Live',
		'titleText' => __('Add this to ', 'wpsr') . 'Live',
		'icon' => 'live.png',
		'url' => 'https://favorites.live.com/quickadd.aspx?marklet=1&amp;url={url}&amp;title={title}',
		'support32px' => 1,
	),
	
	// M
	
	'meneame' => array(
		'name' => 'Meneame',
		'titleText' => __('Submit this to ', 'wpsr') . 'Meneame',
		'icon' => 'meneame.png',
		'url' => 'http://meneame.net/submit.php?url={url}',
	),
	
	'misterwong' => array(
		'name' => 'Mister Wong',
		'titleText' => __('Add this to ', 'wpsr') . 'Mister Wong',
		'icon' => 'misterwong.png',
		'url' => 'http://www.mister-wong.com/addurl/?bm_url={url}&amp;bm_description={title}&amp;plugin=wp-socializer',
		'support32px' => 1,
	),

	/*'MisterWong.DE' => array(
		'icon' => 'misterwong.png',
		'url' => 'http://www.mister-wong.de/addurl/?bm_url={url}&amp;bm_description={title}&amp;plugin=soc',
		'sameImageAs' => 'MisterWong',
	),*/
	
	'mixx' => array(
		'name' => 'Mixx',
		'titleText' => __('Submit this to ', 'wpsr') . 'Mixx',
		'icon' => 'mixx.png',
		'url' => 'http://www.mixx.com/submit?page_url={url}&amp;title={title}',
		'support32px' => 1,
	),
	
	'mob' => array(
		'name' => 'MOB',
		'titleText' => __('Share this on ', 'wpsr') . 'MOB',
        'icon' => 'mob.png',
        'url' => 'http://www.mob.com/share.php?u={url}&t={title}',
    ), 
	
	'msnreporter' => array(
		'name' => 'MSNReporter',
		'titleText' => __('Share this on ', 'wpsr') . 'MSNReporter',
		'icon' => 'msnreporter.png',
		'url' => 'http://reporter.nl.msn.com/?fn=contribute&amp;Title={title}&amp;URL={url}&amp;cat_id=6&amp;tag_id=31&amp;Remark={excerpt}',
	),
	
	'muti' => array(
		'name' => 'Muti',
		'titleText' => __('Share this on ', 'wpsr') . 'Muti',
		'icon' => 'muti.png',
		'url' => 'http://www.muti.co.za/submit?url={url}&amp;title={title}',
	),
	
	'myshare' => array(
		'name' => 'MyShare',
		'titleText' => __('Share this on ', 'wpsr') . 'MyShare',
		'icon' => 'myshare.png',
		'url' => 'http://myshare.url.com.tw/index.php?func=newurl&amp;url={url}&amp;desc={title}',
	),

	'myspace' => array(
		'name' => 'MySpace',
		'titleText' => __('Post this on ', 'wpsr') . 'MySpace',
		'icon' => 'myspace.png',
		'url' => 'http://www.myspace.com/Modules/PostTo/Pages/?u={url}&amp;t={title}',
		'support32px' => 1,
	),
	
	// N
	
	'n4g' => array(
		'name' => 'N4G',
		'titleText' => __('Share this on ', 'wpsr') . '',
		'icon' => 'n4g.png',
		'url' => 'http://www.n4g.com/tips.aspx?url={url}&amp;title={title}',
	),
	
	'netvibes' => array(
		'name' => 'Netvibes',
		'titleText' => __('Share this on ', 'wpsr') . 'Netvibes',
		'icon' => 'netvibes.png',
		'url' =>	'http://www.netvibes.com/share?title={title}&amp;url={url}',
		'support32px' => 1,
	),
	
	'netvouz' => array(
		'name' => 'Netvouz',
		'titleText' => __('Share this on ', 'wpsr') . 'Netvouz',
		'icon' => 'netvouz.png',
		'url' => 'http://www.netvouz.com/action/submitBookmark?url={url}&amp;title={title}&amp;popup=no',
	),
	
	'newsvine' => array(
		'name' => 'NewsVine',
		'titleText' => __('Add this to ', 'wpsr') . 'NewsVine',
		'icon' => 'newsvine.png',
		'url' => 'http://www.newsvine.com/_tools/seed&amp;save?u={url}&amp;h={title}',
		'support32px' => 1,
	),
	
	'nk' => array(
		'name' => 'NK',
		'titleText' => __('Share this on ', 'wpsr') . 'NK',
		'icon' => 'nk.png',
		'url' => 'http://nasza-klasa.pl/sledzik?shout={title} {url}',
		'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011

	'nujij' => array(
		'name' => 'NuJIJ',
		'titleText' => __('Share this on ', 'wpsr') . 'NuJIJ',
		'icon' => 'nujij.png',
		'url' => 'http://nujij.nl/jij.lynkx?t={title}&amp;u={url}&amp;b={excerpt}',
	),
	
	// O
	
	'orkut' => array(
		'name' => 'Orkut',
		'titleText' => __('Share this on ', 'wpsr') . 'Orkut',
		'icon' => 'orkut.png',
		'url' => 'http://promote.orkut.com/preview?nt=orkut.com&amp;tt={title}&amp;du={url}&amp;cn={excerpt}',
		'support32px' => 1,
	),
	
	'osnews' => array(
		'name' => 'OSnews',
		'titleText' => __('Share this on ', 'wpsr') . 'OSnews',
		'icon' => 'osnews.png',
		'url' => 'http://osnews.pl/dodaj-niusa/?external=true&title={title}&url={url}',
		'support32px' => 1,
   ), // Added version 2.0 - 16-1-2011
	
	// P
	
	'pdf' => array(
		'name' => 'PDF',
		'titleText' => __('Convert to ', 'wpsr') . 'PDF',
		'icon' => 'pdf.png',
		'url' => 'http://www.printfriendly.com/print?url={url}',
	),
	
	'pingfm' => array(
		'name' => 'Ping.fm',
		'titleText' => __('Share this on ', 'wpsr') . 'Ping.fm',
		'icon' => 'ping.png',
		'url' => 'http://ping.fm/ref/?link={url}&amp;title={title}&amp;body={excerpt}',
		'support32px' => 1,
	),

	'posterous' => array(
		'name' => 'Posterous',
		'titleText' => __('Share this on ', 'wpsr') . 'Posterous',
		'icon' => 'posterous.png',
		'url' => 'http://posterous.com/share?linkto={url}&amp;title={title}&amp;selection={excerpt}',
		'support32px' => 1,
	),
	
	'print' => array(
		'name' => 'Print',
		'titleText' => __('Print this article ', 'wpsr') . '',
		'icon' => 'printfriendly.png',
		'url' => 'http://www.printfriendly.com/print?url={url}',
		'support32px' => 1,
	),
	
	'propeller' => array(
		'name' => 'Propeller',
		'titleText' => __('Submit this to ', 'wpsr') . 'Propeller',
		'icon' => 'propeller.png',
		'url' => 'http://www.propeller.com/submit/?url={url}',
	),
	
	// R
	
	'ratimarks' => array(
		'name' => 'Ratimarks',
		'titleText' => __('Add this to ', 'wpsr') . 'Ratimarks',
		'icon' => 'ratimarks.png',
		'url' => 'http://ratimarks.org/bookmarks.php/?action=add&address={url}&amp;title={title}',
	),

	'rec6' => array(
		'name' => 'Rec6',
		'titleText' => __('Share this on ', 'wpsr') . 'Rec6',
		'icon' => 'rec6.png',
		'url' => 'http://rec6.via6.com/link.php?url={url}&amp;={title}',
	),

	'reddit' => array(
		'name' => 'Reddit',
		'titleText' => __('Submit this to ', 'wpsr') . 'Reddit',
		'icon' => 'reddit.png',
		'url' => 'http://reddit.com/submit?url={url}&amp;title={title}',
		'support32px' => 1,
	),

	'rss' => array(
		'name' => 'RSS',
		'titleText' => __('Subscribe to ', 'wpsr') . 'RSS',
		'icon' => 'rss.png',
		'url' => '{rss-url}',
		'support32px' => 1,
	),
	
	// S
	
	'scoopeo' => array(
		'name' => 'Scoopeo',
		'titleText' => __('Share this on ', 'wpsr') . 'Scoopeo',
		'icon' => 'scoopeo.png',
		'url' => 'http://www.scoopeo.com/scoop/new?newurl={url}&amp;title={title}',
	),	

	'segnalo' => array(
		'name' => 'Segnalo',
		'titleText' => __('Post this on ', 'wpsr') . 'Segnalo',
		'icon' => 'segnalo.png',
		'url' => 'http://segnalo.alice.it/post.html.php?url={url}&amp;title={title}',
	),
	
	'shetoldme' => array(
		'name' => 'SheToldMe',
		'titleText' => __('Share this on ', 'wpsr') . 'SheToldMe',
        'icon' => 'shetoldme.png',
        'url' => 'http://shetoldme.com/publish?url={url}&title={title}',
    ),
	
	'simpy' => array(
		'name' => 'Simpy',
		'titleText' => __('Add this to ', 'wpsr') . 'Simpy',
		'icon' => 'simpy.png',
		'url' => 'http://www.simpy.com/simpy/LinkAdd.do?href={url}&amp;title={title}',
	),

	'slashdot' => array(
		'name' => 'Slashdot',
		'titleText' => __('Share this on ', 'wpsr') . 'Slashdot',
		'icon' => 'slashdot.png',
		'url' => 'http://slashdot.org/bookmark.pl?title={title}&amp;url={url}',
	),

	'socialogs' => array(
		'name' => 'Socialogs',
		'titleText' => __('Share this on ', 'wpsr') . 'Socialogs',
		'icon' => 'socialogs.png',
		'url' => 'http://socialogs.com/add_story.php?story_url={url}&amp;story_title={title}',
	),
	
	'sphereit' => array(
		'name' => 'SphereIt',
		'titleText' => __('Share this on ', 'wpsr') . 'SphereIt',
		'icon' => 'sphere.png',
		'url' => 'http://www.sphere.com/search?q=sphereit:{url}&amp;title={title}',
	),

	'sphinn' => array(
		'name' => 'Sphinn',
		'titleText' => __('Post this on ', 'wpsr') . 'Sphinn',
		'icon' => 'sphinn.png',
		'url' => 'http://sphinn.com/index.php?c=post&amp;m=submit&amp;link={url}',
		'support32px' => 1,
	),

	'stumbleupon' => array(
		'name' => 'StumbleUpon',
		'titleText' => __('Submit this to ', 'wpsr') . 'StumbleUpon',
		'icon' => 'stumbleupon.png',
		'url' => 'http://www.stumbleupon.com/submit?url={url}&amp;title={title}',
		'support32px' => 1,
	),
	
	// T
	
	'techmeme' => array( 
		'name' => 'Techmeme',
		'titleText' => __('Share this on ', 'wpsr') . 'Techmeme',
		'icon' => 'techmeme.png',
		'url' => 'http://twitter.com/home/?status=tip%20@Techmeme%20{url}%20{title}', 
	), 

	'technorati' => array(
		'name' => 'Technorati',
		'titleText' => __('Add this to ', 'wpsr') . 'Technorati',
		'icon' => 'technorati.png',
		'url' => 'http://technorati.com/faves?add={url}',
		'support32px' => 1,
	),

	'tipd' => array(
		'name' => 'Tipd',
		'titleText' => __('Submit this to ', 'wpsr') . 'Tipd',
		'icon' => 'tipd.png',
		'url' => 'http://tipd.com/submit.php?url={url}',
	),
	
	'tumblr' => array(
		'name' => 'Tumblr',
		'titleText' => __('Share this on ', 'wpsr') . 'Tumblr',
		'icon' => 'tumblr.png',
		'url' => 'http://www.tumblr.com/share?v=3&amp;u={url}&amp;t={title}&amp;s={excerpt}',
		'support32px' => 1,
	),
	
	'twitter' => array(
		'name' => 'Twitter',
		'titleText' => __('Tweet this !', 'wpsr') . '',
		'icon' => 'twitter.png',
		'url' => 'http://twitter.com/home?status={title}%20-%20{s-url}%20{twitter-username}',
		'support32px' => 1,
	),
	
	// U
	
	'upnews' => array(
		'name' => 'Upnews',
		'titleText' => __('Submit this to ', 'wpsr') . 'Upnews',
		'icon' => 'upnews.png',
		'url' => 'http://www.upnews.it/submit?url={url}&amp;title={title}',
	),
	
	// V
	
	'viadeofr' => array(
		'name' => 'Viadeo FR',
		'titleText' => __('Share this on ', 'wpsr') . 'Viadeo FR',
        'icon' => 'viadeo.png',
        'url' => 'http://www.viadeo.com/shareit/share/?url={url}&title={title}&urllanguage=fr',
    ),
	
	// W
	
	'webnewsde' => array(
		'name' => 'Webnews.de',
		'titleText' => __('Share this on ', 'wpsr') . 'Webnews.de',
        'icon' => 'webnews.png',
        'url' => 'http://www.webnews.de/einstellen?url={url}&amp;title={title}',
    ),

	'webride' => array(
		'name' => 'Webride',
		'titleText' => __('Share this on ', 'wpsr') . 'Webride',
		'icon' => 'webride.png',
		'url' => 'http://webride.org/discuss/split.php?uri={url}&amp;title={title}',
	),
	
	'wikio' => array(
		'name' => 'Wikio',
		'titleText' => __('Share this on ', 'wpsr') . 'Wikio',
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.com/vote?url={url}',
	),
	
	/*'Wikio FR' => array(
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.fr/vote?url={url}',
		'sameImageAs' => 'Wikio',
	),

	'Wikio IT' => array(
		'icon' => 'wikio.png',
		'url' => 'http://www.wikio.it/vote?url={url}',
		'sameImageAs' => 'Wikio',
	),*/
	
	'wists' => array(
		'name' => 'Wists',
		'titleText' => __('Share this on ', 'wpsr') . 'Wists',
		'icon' => 'wists.png',
		'url' => 'http://wists.com/s.php?c=&amp;r={url}&amp;title={title}',
	),
	
	'wykop' => array(
		'name' => 'Wykop',
		'titleText' => __('Share this on ', 'wpsr') . 'Wykop',
		'icon' => 'wykop.png',
		'url' => 'http://www.wykop.pl/dodaj?url={url}',
		'support32px' => 1,  // Added version 2.0 - 16-1-2011
	),
	
	// X
	
	'xerpi' => array(
		'name' => 'Xerpi',
		'titleText' => __('Add this to ', 'wpsr') . 'Xerpi',
		'icon' => 'xerpi.png',
		'url' => 'http://www.xerpi.com/block/add_link_from_extension?url={url}&amp;title={title}',
	),
	
	// Y
	
	'yahoobookmarks' => array(
		'name' => 'Yahoo! Bookmarks',
		'titleText' => __('Add this to ', 'wpsr') . 'Yahoo! Bookmarks',
		'icon' => 'yahoo.png',
		'url' => 'http://bookmarks.yahoo.com/toolbar/savebm?u={url}&amp;t={title}&opener=bm&amp;ei=UTF-8&amp;d={excerpt}',
		'support32px' => 1,
	),
	
	'yahoobuzz' => array(
		'name' => 'YahooBuzz',
		'titleText' => __('Submit this to ', 'wpsr') . 'YahooBuzz',
		'icon' => 'yahoobuzz.png',
		'url' => 'http://buzz.yahoo.com/submit/?submitUrl={url}&amp;submitHeadline={title}&amp;submitSummary={excerpt}&amp;submitAssetType=text',
		'support32px' => 1,
	),

	'yigg' => array(
		'name' => 'Yigg',
		'titleText' => __('Share this on ', 'wpsr') . 'Yigg',
		'icon' => 'yiggit.png',
		'url' => 'http://yigg.de/neu?exturl={url}&amp;exttitle={title}',
	 ),
	
);

$wpsr_button_code_list = array(
	"{social-bts-16px}", "{social-bts-32px}", "{addthis-bt}", 
	"{addthis-tb-16px}", "{addthis-tb-32px}", "{addthis-sc}", 
	"{sharethis-vcount}", "{sharethis-hcount}", "{sharethis-large}", 
	"{sharethis-regular}", "{sharethis-regular2}", "{sharethis-bt}", 
	"{sharethis-classic}", "{buzz-post}", "{buzz-follow}", 
	"{plusone-small}", "{plusone-medium}", "{plusone-standard}", 
	"{plusone-tall}", "{retweet-bt}", "{digg-bt}", 
	"{facebook-like}", "{facebook-share}", "{reddit-1}", 
	"{reddit-2}", "{reddit-3}", "{stumbleupon-1}", 
	"{stumbleupon-2}", "{stumbleupon-3}", "{stumbleupon-5}", 
	"{custom-1}", "{custom-2}"
);

$wpsr_addthis_lang_array = array(
	'en'=>'English', 'ar'=>'Arabic', 'zh'=>'Chinese', 'cs'=>'Czech', 'da'=>'Danish', 'nl'=>'Dutch','fa'=>'Farsi', 'fi'=>'Finnish', 'fr'=>'French', 'ga'=>'Gaelic', 'de'=>'German', 'el'=>'Greek', 'he'=>'Hebrew', 'hi'=>'Hindi', 'it'=>'Italian', 'ja'=>'Japanese', 'ko'=>'Korean', 'lv'=>'Latvian', 'lt'=>'Lithuanian', 'no'=>'Norwegian', 'pl'=>'Polish', 'pt'=>'Portugese', 'ro'=>'Romanian', 'ru'=>'Russian', 'sk'=>'Slovakian', 'sl'=>'Slovenian', 'es'=>'Spanish', 'sv'=>'Swedish', 'th'=>'Thai', 'ur'=>'Urdu', 'cy'=>'Welsh', 'vi'=>'Vietnamese'
);

$wpsr_buzz_lang_array = array(
	'en'=>'English', 'ar'=>'Arabic', 'zh'=>'Chinese', 'cs'=>'Czech', 'da'=>'Danish', 'nl'=>'Dutch','fa'=>'Farsi', 'fi'=>'Finnish', 'fr'=>'French', 'ga'=>'Gaelic', 'de'=>'German', 'el'=>'Greek', 'he'=>'Hebrew', 'hi'=>'Hindi', 'it'=>'Italian', 'ja'=>'Japanese', 'ko'=>'Korean', 'lv'=>'Latvian', 'lt'=>'Lithuanian', 'no'=>'Norwegian', 'pl'=>'Polish', 'pt'=>'Portugese', 'ro'=>'Romanian', 'ru'=>'Russian', 'sk'=>'Slovakian', 'sl'=>'Slovenian', 'es'=>'Spanish', 'sv'=>'Swedish', 'th'=>'Thai', 'vi'=>'Vietnamese'
);

## Initializations
function wpsr_init(){
	// Include the plugin translations
	load_plugin_textdomain('wpsr', false, dirname(plugin_basename( __FILE__ )) . '/languages');
}
add_action('init','wpsr_init');

## Include WP Socializer Processer files
require_once('admin/wpsr-admin.php');
require_once('admin/wpsr-admin-other.php');
require_once('includes/wpsr-addthis.php');
require_once('includes/wpsr-sharethis.php');
require_once('includes/wpsr-google.php'); // Since v2
require_once('includes/wpsr-retweet.php');
require_once('includes/wpsr-digg.php');
require_once('includes/wpsr-facebook.php');
require_once('includes/wpsr-socialbuttons.php');
require_once('includes/wpsr-other.php');
require_once('includes/wpsr-custom.php');
require_once('includes/wpsr-shortcodes.php');

## General functions
function strpos_arr($haystack, $needle) { 
    if(!is_array($needle)) $needle = array($needle); 
    foreach($needle as $what) { 
        if(($pos = strpos($haystack, $what))!==false) return $pos; 
    } 
    return false; 
} 

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
	if(!wpsr_is_active() && $_GET['page'] != 'wp_socializer'){
		echo '<div class="updated fade"><p>' . __('<b>WP Socializer</b> plugin is intalled. Please adjust your settings', 'wpsr') . ' <a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=wp_socializer">' . __('in this page', 'wpsr') . '.</a></p></div>';
	}
}
add_action('admin_notices', 'wpsr_admin_notices');

## Action Links
function wpsr_plugin_actions($links, $file){
	static $this_plugin;
	if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);
	if( $file == $this_plugin ){
		$settings_link = '<a href="admin.php?page=wp_socializer">' . __('Settings' ,'wpsr') . '</a> ' . '|' . ' <a href="http://www.aakashweb.com/" target="_blank">' . __('Support' ,'wpsr') . '</a>';
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
  
function wp_socializer($to_display, $params=""){
	switch($to_display){
		case 'socialbts' :
			return wpsr_socialbts($params);
			break;
			
		case 'addthis' :
			return wpsr_addthis($params);
			break;
			
		case 'sharethis' :
			return wpsr_sharethis($params);
			break;	
			
		case 'plusone' :
			return wpsr_plusone_bt($params);
			break;
			
		case 'buzz' :
			return wpsr_buzz($params);
			break;
			
		case 'retweet' :
			return wpsr_retweet($params);
			break;
			
		case 'digg' :
			return wpsr_digg($params);
			break;
			
		case 'facebook' :
			return wpsr_facebook($params);
			break;
			
		case 'plusone' :
			return wpsr_plusone($params);
			break;
			
		case 'stumbleupon' :
			return wpsr_stumbleupon($params);
			break;
		
		case 'reddit' :
			return wpsr_reddit($params);
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
  * Uses super variables to get the page url outside loop and wp_title()
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
			'title' => trim($title_inside_loop),
			'excerpt' => $excerpt_inside_loop
		);
		
	}else{
		$details = array(
			'permalink' => $permalink_outside_loop,
			'title' => trim($title_outside_loop),
			'excerpt' => $excerpt_outside_loop
		);
	}
	
	return $details;

}

function wpsr_process_template($the_template){

	// Get the global variables
	global $wpsr_button_code_list;
	
	// Get the processed button codes
	$wpsr_social_bts_16px = wpsr_socialbts_template('16px');
	$wpsr_social_bts_32px = wpsr_socialbts_template('32px');
	
	$wpsr_addthis_bt = wpsr_addthis_bt('button');
	$wpsr_addthis_tb16px = wpsr_addthis_bt('toolbar', '16px');
	$wpsr_addthis_tb32px = wpsr_addthis_bt('toolbar', '32px');
	$wpsr_addthis_sc = wpsr_addthis_bt('sharecount');
	
	$wpsr_sharethis_vcount = wpsr_sharethis_bt('vcount');
	$wpsr_sharethis_hcount = wpsr_sharethis_bt('hcount');
	$wpsr_sharethis_large = wpsr_sharethis_bt('large');
	$wpsr_sharethis_regular = wpsr_sharethis_bt('regular');
	$wpsr_sharethis_regular2 = wpsr_sharethis_bt('regular2');
	$wpsr_sharethis_buttons = wpsr_sharethis_bt('buttons');
	$wpsr_sharethis_classic = wpsr_sharethis_bt('classic');
	
	$wpsr_buzz_post = wpsr_buzz_bt('post');
	$wpsr_buzz_follow = wpsr_buzz_bt('follow');
	$wpsr_pone_small = wpsr_plusone_bt('small');
	$wpsr_pone_medium = wpsr_plusone_bt('medium');
	$wpsr_pone_standard = wpsr_plusone_bt('standard');
	$wpsr_pone_tall = wpsr_plusone_bt('tall');
	
	$wpsr_retweet_bt = wpsr_retweet_bt();
	$wpsr_digg_bt = wpsr_digg_bt();
	$wpsr_facebook_like = wpsr_facebook_bt('like');
	$wpsr_facebook_share = wpsr_facebook_bt('share');
	
	$wpsr_reddit_bts = array('', wpsr_reddit_bt('1'), wpsr_reddit_bt('2'), wpsr_reddit_bt('3'));
	$wpsr_stumbleupon_bts = array('', wpsr_stumbleupon_bt('1'), wpsr_stumbleupon_bt('2'), wpsr_stumbleupon_bt('3'), wpsr_stumbleupon_bt('5'));
	
	$wpsr_custom1 = wpsr_custom_bt('custom1');
	$wpsr_custom2 = wpsr_custom_bt('custom2');
	
	$wpsr_button_processed_list = array(
		$wpsr_social_bts_16px, $wpsr_social_bts_32px, $wpsr_addthis_bt, 
		$wpsr_addthis_tb16px, $wpsr_addthis_tb32px, $wpsr_addthis_sc, 
		$wpsr_sharethis_vcount, $wpsr_sharethis_hcount, $wpsr_sharethis_large, 
		$wpsr_sharethis_regular, $wpsr_sharethis_regular2, $wpsr_sharethis_buttons, 
		$wpsr_sharethis_classic, $wpsr_buzz_post, $wpsr_buzz_follow, 
		$wpsr_pone_small, $wpsr_pone_medium, $wpsr_pone_standard, 
		$wpsr_pone_tall, $wpsr_retweet_bt, $wpsr_digg_bt, 
		$wpsr_facebook_like, $wpsr_facebook_share, $wpsr_reddit_bts[1], 
		$wpsr_reddit_bts[2], $wpsr_reddit_bts[3], $wpsr_stumbleupon_bts[1], 
		$wpsr_stumbleupon_bts[2], $wpsr_stumbleupon_bts[3], $wpsr_stumbleupon_bts[4], 
		$wpsr_custom1, $wpsr_custom2
	);
	
	// RSS Buttons v2.0
	$wpsr_social_bts_16px_rss = wpsr_socialbts_rss('16px');
	$wpsr_social_bts_32px_rss = wpsr_socialbts_rss('32px');
	$wpsr_addthis_rss = wpsr_addthis_rss_bt();
	$wpsr_sharethis_rss = wpsr_sharethis_rss_bt();
	$wpsr_buzz_post_rss = wpsr_buzz_rss_bt('post');
	$wpsr_buzz_follow_rss = wpsr_buzz_rss_bt('follow');
	$wpsr_pone_rss = wpsr_plusone_rss_bt();
	$wpsr_retweet_rss = wpsr_retweet_rss_bt();
	$wpsr_digg_rss = wpsr_digg_rss_bt();
	$wpsr_facebook_rss = wpsr_facebook_rss_bt();
	$wpsr_reddit_rss = wpsr_reddit_rss_bt();
	$wpsr_stumbleupon_rss = wpsr_stumbleupon_rss_bt();
	
	$wpsr_button_processed_list_rss = array(
		$wpsr_social_bts_16px_rss, $wpsr_social_bts_32px_rss, $wpsr_addthis_rss, 
		$wpsr_addthis_rss, $wpsr_addthis_rss, $wpsr_addthis_rss, 
		$wpsr_sharethis_rss, $wpsr_sharethis_rss, $wpsr_sharethis_rss, 
		$wpsr_sharethis_rss, $wpsr_sharethis_rss, $wpsr_sharethis_rss, 
		$wpsr_sharethis_rss, $wpsr_buzz_post_rss, $wpsr_buzz_follow_rss, 
		$wpsr_pone_rss, $wpsr_pone_rss, $wpsr_pone_rss, 
		$wpsr_pone_rss, $wpsr_retweet_rss, $wpsr_digg_rss, 
		$wpsr_facebook_rss, $wpsr_facebook_rss, $wpsr_reddit_rss, 
		$wpsr_reddit_rss, $wpsr_reddit_rss, $wpsr_stumbleupon_rss, 
		$wpsr_stumbleupon_rss, $wpsr_stumbleupon_rss, $wpsr_stumbleupon_rss, 
		$wpsr_custom1, $wpsr_custom2
	); 

	// Get the placement options | Template 1&2
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
		
	$wpsr_template1_content = ($wpsr_template1['addp'] == 1) ? wpautop($wpsr_template1['content']) : $wpsr_template1['content'];
	$wpsr_template2_content = ($wpsr_template2['addp'] == 1) ? wpautop($wpsr_template2['content']) : $wpsr_template2['content'];
	
	switch($the_template){
		case 'template1' :
			$wpsr_template1_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list, $wpsr_template1_content);
			return $wpsr_template1_processed;
			
		case 'template2' :
			$wpsr_template2_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list, $wpsr_template2_content);
			return $wpsr_template2_processed;
		
		case 'rss1' :
			$wpsr_template1_content = strip_tags($wpsr_template1_content, '<h1><h2><h3><h4><h5><h6>');
			$wpsr_rss1_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list_rss, $wpsr_template1_content);
			return $wpsr_rss1_processed;
			
		case 'rss2' :
			$wpsr_template2_content = strip_tags($wpsr_template2_content, '<h1><h2><h3><h4><h5><h6>');
			$wpsr_rss2_processed = str_replace($wpsr_button_code_list, $wpsr_button_processed_list_rss, $wpsr_template2_content);
			return $wpsr_rss2_processed;
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
		$wpsr_template1_processed = $wpsr_template1_processed;
		
	}else{
		$wpsr_template1_processed = '' ;
	}
	
	/**  
	 * If the output is given by the_excerpt() function 
	 * and if the excerpt is empty generate the custom excerpt from the content 
	 * 
	 * Used to remove the widget/button text printed along with the content
	 */
	
	/* BUG in v1.0
	if(defined('IS_EXCERPT') && IS_EXCERPT ){
		if(empty($post->post_excerpt)){
			$content = substr(strip_tags(strip_shortcodes($post->post_content), '<p>'),0,250);
		}
	}
	*/
	
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

function wpsr_output_rss1($content = ''){
	// Get the global variables
	global $post;
	
	$wpsr_template1 = get_option('wpsr_template1_data');
	
	$wpsr_template1_infeed = $wpsr_template1['infeed'];
	$wpsr_template1_abvcontent = $wpsr_template1['abvcontent'];
	$wpsr_template1_blwcontent = $wpsr_template1['blwcontent'];
	
	$wpsr_rss1_processed = wpsr_process_template('rss1');
	
	if (get_post_meta($post->ID,'_wpsr-disable-template1', true) != 1){
		// Check position conditionals
		if($wpsr_template1_abvcontent == 1 && $wpsr_template1_blwcontent == 1){
			return $wpsr_rss1_processed . $content . $wpsr_template1_processed;
			
		}elseif($wpsr_template1_abvcontent == 1){
			return $wpsr_rss1_processed . $content;
		
		}elseif($wpsr_template1_blwcontent == 1){
			return $content . $wpsr_rss1_processed;
		
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
		$wpsr_template2_processed = $wpsr_template2_processed;
		
	}else{
		$wpsr_template2_processed = '' ;
	}
	
	// Check whether displaying template2 in the post is enabled
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

function wpsr_output_rss2($content = ''){
	// Get the global variables
	global $post;
	
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	$wpsr_template2_infeed = $wpsr_template2['infeed'];
	$wpsr_template2_abvcontent = $wpsr_template2['abvcontent'];
	$wpsr_template2_blwcontent = $wpsr_template2['blwcontent'];
	
	$wpsr_rss2_processed = wpsr_process_template('rss2');
	
	if (get_post_meta($post->ID,'_wpsr-disable-template2', true) != 1){
		// Check position conditionals
		if($wpsr_template2_abvcontent == 1 && $wpsr_template2_blwcontent == 1){
			return $wpsr_rss2_processed . $content . $wpsr_template2_processed;
			
		}elseif($wpsr_template2_abvcontent == 1){
			return $wpsr_rss2_processed . $content;
		
		}elseif($wpsr_template2_blwcontent == 1){
			return $content . $wpsr_rss2_processed;
		
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
	
	$wpsr_template1 = get_option('wpsr_template1_data');
	$wpsr_template2 = get_option('wpsr_template2_data');
	
	// Check whether to print in excerpts
	if($wpsr_template1['inexcerpt']){
		add_filter('the_excerpt', 'wpsr_output_template1');
	}
	
	if($wpsr_template2['inexcerpt']){
		add_filter('the_excerpt', 'wpsr_output_template2');
	}
	
	// For RSS
	if($wpsr_template1['infeed']){
		add_filter('the_content_feed', 'wpsr_output_rss1');
		add_filter('the_excerpt_rss', 'wpsr_output_rss1');
	}
	
	if($wpsr_template2['infeed']){
		add_filter('the_content_feed', 'wpsr_output_rss2');
		add_filter('the_excerpt_rss', 'wpsr_output_rss2');
	}
}

## Add the button scripts to the header
function wpsr_scripts_adder(){

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
		echo wpsr_retweet_topsy_script();
	}
	
	if(wpsr_retweet_bt_used() == 1 && $wpsr_retweet_service == 'twitter'){
		echo wpsr_retweet_twitter_script();
	}
	
	if(wpsr_digg_bt_used() == 1){
		echo wpsr_digg_script();
	}
	
	if(wpsr_addthis_is_used() == 1){
		echo wpsr_addthis_script();
	}
	
	if(wpsr_sharethis_is_used() == 1){
		echo wpsr_sharethis_script();
	}
	
	if(wpsr_buzz_bt_used() == 1){
		echo wpsr_buzz_script();
	}
	
	if(wpsr_plusone_bt_used() == 1){
		echo wpsr_plusone_script();
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
		$rss = array('url' => 'http://feeds2.feedburner.com/aakashweb', 'items' => '5','show_date' => 0, 'show_summary'=> 0);
		$subscribe = "window.open('http://feedburner.google.com/fb/a/mailverify?uri=aakashweb', 'win','menubar=1,resizable=1,width=600,height=500'); return false;" ;
		echo '<div class="rss-widget">';
		wp_widget_rss_output($rss);
		echo '<p><a href="#" onclick="' . $subscribe . '">Subscribe to Updates</a> | <a href="http://twitter.com/vaakash" target="_blank">Follow on Twitter</a> | <a href="http://www.aakashweb.com/" target="_blank">Home Page</a></p>';
		echo "</div>";
	}
	
	function aw_dashboard_setup() {
		wp_add_dashboard_widget('aw_dashboard', __( 'AW Latest Updates', 'wpsr'), 'aw_dashboard');
	}
	add_action('wp_dashboard_setup', 'aw_dashboard_setup');
}

## Add notification to the dashboard right now
function wpsr_dashboard_rightnow(){
	$wpsr_settings = get_option('wpsr_settings_data');
	$wpsr_settings_disablewpsr = $wpsr_settings['disablewpsr'];
	
	if($wpsr_settings_disablewpsr == 1){
		echo '<p class="message">' . __('WP Socializer is <span style="color:red;"><b>disabled</b></span>', 'wpsr') . '</p>';
	}
}
add_action('rightnow_end','wpsr_dashboard_rightnow');

function wpsr_adminbar() {
    global $wp_admin_bar, $wpdb, $post;
    if ( !is_super_admin() || !is_admin_bar_showing()){
		return;
	}
	
	$adminPage = get_option('home') . '/wp-admin/admin.php?page=wp_socializer'; // Broken link fix v2.1
	
	$wp_admin_bar->add_menu( array( 'id' => 'wpsr_adminbar_menu', 'title' => 'WP Socializer', 'href' => $adminPage));
	$wp_admin_bar->add_menu( array( 'parent' => 'wpsr_adminbar_menu', 'title' => __('Edit the templates', 'wpsr'), 'href' => $adminPage . '#tab-9'));
	
	if(is_single() || is_page()){
		$current_object = get_queried_object();
		$postEdit = get_option('home') . '/wp-admin/post.php?action=edit&post=' . $post->ID;
		$wp_admin_bar->add_menu( array( 'parent' => 'wpsr_adminbar_menu', 'title' => __('Disable WP Socializer in this page', 'wpsr'), 'href' => get_edit_post_link($current_object->ID) . '#wp_socializer' ));
	}
	
	$wp_admin_bar->add_menu( array( 'parent' => 'wpsr_adminbar_menu', 'title' => __('Help', 'wpsr'), 'href' => 'http://www.aakashweb.com/wordpress-plugins/wp-socializer/'));
	
}
add_action('admin_bar_menu', 'wpsr_adminbar', 1000);

/*
 * TinyMCE button for post editor
 * Used for adding shortcodes in posts
 * since v2.0
 */
  
function wpsr_add_wpsr_button() {

	if (!current_user_can('edit_posts') && ! current_user_can('edit_pages'))
		return;
	
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "wpsr_add_wpsrbutton_tinymce");
		add_filter('mce_buttons', 'wpsr_register_wpsrbutton_tinymce');
	}
}
 
function wpsr_register_wpsrbutton_tinymce($buttons) {
   array_push($buttons, "|", "wpsrbutton");
   return $buttons;
}

function wpsr_add_wpsrbutton_tinymce($plugin_array) {
   $plugin_array['wpsrbutton'] = WPSR_ADMIN_URL . 'tinymce/editor_plugin.js';
   return $plugin_array;
}

// init process for button control
add_action('init', 'wpsr_add_wpsr_button');

?>