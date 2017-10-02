<?php
/**
 * index.php
 *
 * this is the main router file, it takes in parameters and builds
 * the final output that goes to the user.
 *
 * Certain values can be used throughout pages, some via PHP
 * and others that will be replaced in the final HTML.
 *
 * Replacements:
 * <!--TITLE--> - will be replaced with the PHP variable $pageTitle
 * <!--SITEURL--> - replaced with $siteURL
 *
 * PHP variables:
 *
 * $pageTitle - what gets placed in the <title> tag.
 * $siteURL - the main url.
 *
 */

/** Initial setup **/
ob_start ();
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
require_once('functions/dirfunctions.php');
require_once('functions/textfunctions.php');
require_once('functions/config.php');

/** Default values **/
$pageTitle = 'Studioware';
/** Determine our navigation, view, and params **/
$request_uri = trim(str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $_SERVER['REQUEST_URI']), '/');
$request_uri =  trim($_SERVER['REQUEST_URI'], '/');
$parts = explode('?', $request_uri, 2);
$navigation = array_shift($parts);

if (!empty($parts[0])) {
    $paramlist = explode('&', $parts[0]);
    foreach($paramlist as $param) {
        $parampart = explode('=', $param, 2);
        $params[$parampart[0]] = $parampart[1];
    }
}
unset($parts);

/** From the navigation, build the page.
 * First, determine the appropriate view
 */
//$view = array_shift(explode('/', $navigation));
$view = explode('/', $navigation);
$view = array_shift($view);
$filecheck = $sitePATH . '/files/' . $view;
$filecheck2 = $sitePATH . '/' . $view;

if (file_exists($view . '.php')) {
    $page = $view . '.php';

    if (($view != $navigation) && (!file_exists($sitePATH . '/files/' . $navigation))) {
        header('HTTP/1.1 404 Not Found');
        $page = 'default.php';
        #echo $filecheck;
        #echo '<br />' . $navigation;
        #echo '<br />' .$sitePATH . '/files/' . $navigation;
        #exit;
    }

} else {

    if (!file_exists($filecheck) && !file_exists($filecheck2 . '.php')) {
        header('HTTP/1.1 404 Not Found');
        $page = 'default.php';
}

else

    $page = 'default.php';
}

/** Build the page **/
// header includes the navigation for now.
require_once "header.php";
//require_once "navigation.php";
?>
<div id="content" class="clearfix">
<?php require_once $page;

require_once "footer.php"; ?>
<?php
/** Actually do the output **/
$pageContents = ob_get_contents ();
ob_end_clean ();
echo str_replace(array('<!--TITLE-->', '<!--SITEURL-->'), array($pageTitle, $siteURL), $pageContents);
?>

