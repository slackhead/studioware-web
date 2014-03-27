<?php
ob_start ();
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);

$pageTitle = 'Studioware';
?>



<!DOCTYPE html 
      PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><!--TITLE--></title>

<link href="/files/main.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" href="logo_take1-s-favicon.png"/>

<meta name="description" content="Studioware - bringing audio to Slackware."/>
<meta name="keywords" content="studioware,slackware,audio,sound,recording"/>

<script language="javascript" type="text/javascript" src="files/general_crap.js"></script>
</head>

<body style="height:100%">

<div id="top"></div>

<center>

<div id="main-wrapper">

<div id="head-wrapper">
<!--
<h1 class="banner">Studioware</h1>
<br />
<br />
-->
</div>

<div id="link-wrapper">
<a title="Home" href="http://www.studioware.org" class="toplink">Home</a> |&nbsp;
<a title="Latest News" href="index.php?news" class="toplink">Latest News</a> |&nbsp;
<a title="Applications List" href="http://www.studioware.org/wiki/index.php?title=Application_List" class="toplink">Applications List</a> |&nbsp;
<a title="SlackBuilds" href="slackbuilds" class="toplink">SlackBuilds</a> |&nbsp;
<a title="Packages" href="packages" class="toplink">Packages</a> |&nbsp;
<a title="Studiopkg" href="studiopkg" class="toplink">Studiopkg</a> |&nbsp;
<a title="Sekg" href="sepkg" class="toplink">Sepkg</a> |&nbsp;
<a title="Wiki" href="wiki" class="toplink">Wiki</a> |&nbsp;
<a title="Links" href="index.php?links" class="toplink">Links</a>
</div>

<br /><br />
<hr />


<div style="display: table; height: 90%; #position: relative; 
            width: 100%;overflow: hidden;">
    <div style=" #position: absolute; #top: 50%;display: table-cell;
                vertical-align: middle;width: 100%;">
      <div style=" #position: relative; #top: -50%;width: 100%;">
        <br />
        <br />
        <br />
        <br />
        <br />
        <h1 style="font-size: 80px; margin: auto; text-align: center;
            height:90%; vertical-align: middle;width: 100%;
            postition: relative; top: 50%; color: gray;">CRUNCH!
            <span style="font-size:15px;">(404)</span></h1>
        <br />
        <br />
        <br />
        <br />
        <br />
      </div>
    </div>
  </div>

<center>
<a href="" class="toplink" style="color:#777"><b>Top</b></a>
</center>

<div id="foot-wrapper">
<?php
include("footer.php");
?>
</div>
</div>

</center>

</body>
</html>

<?php
$pageContents = ob_get_contents ();
ob_end_clean ();
echo str_replace ('<!--TITLE-->', $pageTitle, $pageContents);
?>














