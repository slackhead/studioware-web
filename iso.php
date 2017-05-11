<head>
<link rel="stylesheet" href="http://www.studioware.org/stylesheets/site.css">
    <link rel="stylesheet" href="http://www.studioware.org/stylesheets/styles.css">
    <link rel="stylesheet" href="http://www.studioware.org/stylesheets/pygment_trac.css">
    <link rel="shortcut icon" href="favicon.ico"/>
    <script src="http://www.studioware.org/javascripts/scale.fix.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>


<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
require_once('functions/dirfunctions.php');
require_once('functions/textfunctions.php');
require_once('functions/config.php');
$pageTitle="Studioware Live!";

require_once "header.php";
//require_once "navigation.php";
?>

<p>
AlienBOB has kindly provided a Studioware Live ISO that can be burnt to DVD or
copied to a USB stick using dd or his iso2usb.sh script. More details here:
<a href="http://www.slackware.com/~alien/liveslak/">http://www.slackware.com/~alien/liveslak</a><br />
<br />
<a href="live/slackware64-live-studioware-14.2.iso">slackware64-live-studioware-14.2.iso</a><br />
<a href="live/slackware64-live-studioware-14.2.iso.asc">slackware64-live-studioware-14.2.iso.asc</a><br />
<a href="live/slackware64-live-studioware-14.2.iso.md5">slackware64-live-studioware-14.2.iso.md5</a><br />
</p>

<p>
There is a package update and one new package that you may want to install after
booting.<br />
<br />
To update, use sepkg:<br />
sepkg -u<br />
sepkg -i cpufreq<br />
sepkg -i fluxbox-menus<br />
</p>
<div id="content" class="clearfix">
<?php
require_once "footer.php"; ?>
