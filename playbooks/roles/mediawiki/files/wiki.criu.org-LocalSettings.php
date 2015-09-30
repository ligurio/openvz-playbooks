<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename         = "CRIU";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";

$wgArticlePath      = "/$1";


## The relative URL path to the skins directory
$wgStylePath        = "/w/skins";
$wgUploadPath       = "/w/images";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "/w/images/CRIU_logo3.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO
$wgEmailConfirmToEdit = true;

$wgEmergencyContact = "kir@openvz.org";
$wgPasswordSender = "kir@openvz.org";

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBname           = "criuwikidb";
$wgDBuser           = "criuwikiuser";
$wgDBpassword       = "";

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = true;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
# Enable SVG uploading
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'svg', 'pdf' );
# Use rsvg for SVG, better results
$wgSVGConverter = 'rsvg';


## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = true;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

$wgLocalInterwiki   = strtolower( $wgSitename );

$wgLanguageCode = "en";

$wgSecretKey = "a85be587f32797d6b8fdabe53366e863111654ecbf4274dcc57ac7afd2aac77c";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = 'vector';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.3";
$wgRightsIcon = "$wgStylePath/common/images/gnu-fdl.png";
# $wgRightsCode = "gfdl1_3"; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );


# Spam fighting begins here!
# Need to login in order to edit pages
#$wgGroupPermissions['*']['edit'] = false; ## disabled 29 Sep 2009...let's see
$wgShowIPinHeader = false; # For non-logged in users

$wgSpamRegex = "/".                     # The "/" is the opening wrapper
"height\s*:\s*[0-4]px|".                # height:0px
"\sugg|".                               # "Ugg boots" spammer
"online-store\.com|\sshoes|".           # Another shoes spammer
"\w[?.] ,$|".                           # Some stupid spammers . ,
"Louis Vuitton|".                               # Chinese like him :)
"ampicillin|tamiflu|cialis|viagra|tadalafil|zocor|xenical".
"/i";

# Blacklist open proxies
$wgEnableSorbs = true;

# 29 Sep 2009 -- trying to disable the below so anyone can edit

# Recipe taken from http://www.mediawiki.org/wiki/Manual:Preventing_access
# Anonymous users can't create pages
$wgGroupPermissions['*'            ]['createpage'] = false;
$wgGroupPermissions['*'            ]['createtalk'] = false;
#$wgGroupPermissions['*']['createaccount'] = false;
# Only users with accounts 1 day old or older can create pages
# (like Wikipedia!).  Requires MW 1.6 or higher.
$wgGroupPermissions['user'         ]['createpage'] = false;
$wgGroupPermissions['autoconfirmed']['createpage'] = true;
$wgGroupPermissions['user'         ]['createtalk'] = false;
$wgGroupPermissions['autoconfirmed']['createtalk'] = true;
$wgAutoConfirmAge = 86400 * 1; # 1 day

# TEMP: Disable anonymous editing
#$wgGroupPermissions['*']['edit'] = false;

# Enable the [[MediaWiki:External image whitelist]] page
$wgAllowExternalImages = false;
$wgEnableImageWhitelist = true;

# EXTENSIONS (mostly copied from wiki.openvz.org)

# By Kir, 7 Dec 2011
# see http://www.mediawiki.org/wiki/Extension:SyntaxHighlight_GeSHi
require_once("extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# By Kir, 7 Dec 2011
# See http://meta.wikimedia.org/wiki/Cite
require_once( "extensions/Cite/Cite.php" );

# By Kir, 7 Dec 2011
# See http://svn.wikimedia.org/viewvc/mediawiki/trunk/extensions/CharInsert/
require_once( "extensions/CharInsert/CharInsert.php" );

require_once( "extensions/ConfirmEdit/ConfirmEdit.php" );
require_once( 'extensions/ConfirmEdit/QuestyCaptcha.php');
$wgCaptchaClass = 'QuestyCaptcha';
$wgCaptchaQuestions[] = array( 'question' => "What is the color of CRUI logo?", 'answer' => "red" );
$wgCaptchaQuestions[] = array( 'question' => "What is the name of the project?", 'answer' => "CRIU" );
$wgCaptchaQuestions[] = array( 'question' => 'Sum of one and two (string)?', 'answer' => 'five' );
$wgCaptchaQuestions[] = array( 'question' => 'What operating system CRIU is working on?', 'answer' => 'Linux' );
$wgCaptchaQuestions[] = array( 'question' => 'In CRIU acronym, R stands for what?', 'answer' => 'restore' );
#$wgCaptchaQuestions[] = array( 'question' => 'Which animal? <img src="http://www.mysite.com/dog.jpg" alt="" title="" />', 'answer' => 'dog' );

# 28 Nov 2011: enable captcha for anonymous users
$wgCaptchaTriggers['edit']          = true;
$wgCaptchaTriggers['create']        = true;
# Skip captcha for users who confirmed their emails
$ceAllowConfirmedEmail  = true;

# Powered by footer icons
$wgFooterIcons['poweredby']['parallels'] = array(
        "src" => "https://openvz.org/i/poweredby_odin_88x31.png",
        "url" => "http://www.odin.com/",
        "alt" => "Supported by Odin",
);
$wgFooterIcons['poweredby']['openvz'] = array(
        "src" => "http://static.openvz.org/openvz_88x31.gif",
        "url" => "http://openvz.org/",
        "alt" => "CRIU is a project of OpenVZ",
);

require_once("extensions/ParserFunctions/ParserFunctions.php");
$wgPFEnableStringFunctions = true;

require_once('extensions/WikiArticleFeeds/WikiArticleFeeds.php');
#require_once('extensions/StringFunctions/StringFunctions.php');
require_once('extensions/TwitterFBLike/TwitterFBLike.php');

# Added 29 Feb 2012 by Kir
require_once('extensions/googleAnalytics/googleAnalytics.php');
# This should be _after_ inclusion
$wgGoogleAnalyticsAccount = "UA-35267990-1";
$wgGoogleAnalyticsDomainName = "criu.org";
$wgGoogleAnalyticsAddASAC = false;
$wgGoogleAnalyticsIgnoreSysops = true;
$wgGoogleAnalyticsIgnoreBots = true;

require_once( "extensions/RSS/RSS.php" );
$wgRSSUrlWhitelist = array( "*" ); # Added 17 Oct 2012

# New Math extension -- added 22 Oct 2012 by Kir.
require_once("extensions/Math/Math.php");

# Added 26 Oct 2012 by Kir
require_once("extensions/OpenGraphMeta/OpenGraphMeta.php");
require_once("extensions/Description2/Description2.php");

# Added 17 Oct 2013 by Kir
require_once "extensions/ConfirmAccount/ConfirmAccount.php";
$wgConfirmAccountContact = 'gorcunov@openvz.org';
$wgMakeUserPageFromBio = true;
$wgAutoWelcomeNewUsers = false;
$wgConfirmAccountRequestFormItems = array(
        'UserName'        => array( 'enabled' => true ),
        'RealName'        => array( 'enabled' => false ),
        'Biography'       => array( 'enabled' => false, 'minWords' => 20 ),
        'AreasOfInterest' => array( 'enabled' => false ),
        'CV'              => array( 'enabled' => false ),
        'Notes'           => array( 'enabled' => true ),
        'Links'           => array( 'enabled' => false ),
        'TermsOfService'  => array( 'enabled' => false ),
 );

#require_once "extensions/UserAdmin/UserAdmin.php";

# Added 5 Dec 2013 by Kir
# Removed 1 Apr 2014 by Kir as per kobets@ request
# Re-added 9 Jul 2014 by Kir

require_once("extensions/SidebarDonateBox/SidebarDonateBox.php");
$egSidebarDonateBoxContent = '
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FZ8W4VU9AS2XL">
<input type="image" src="http://static.openvz.org/btn_donateCC_med.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br/>
<a href="http://tip4commit.com/projects/500"><img src="/images/tip4commit.png" title="tip4commit bitcoin donate"></a>
';

require_once "$IP/skins/Vector/Vector.php";

# Added by Kir 8 Apr 2015
require_once "$IP/extensions/Interwiki/Interwiki.php";
// To grant sysops permissions to edit interwiki data
$wgGroupPermissions['sysop']['interwiki'] = true;

?>
