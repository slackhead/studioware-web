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
$location = str_replace("/..", '',$navigation);

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

if (file_exists($view . '.php')) {
    $page = $view . '.php';
} else
    $page = 'default.php';

#if (!file_exists('files/' . $location) && $location != 'links' && $location != 'packages') {
#    header('Location: /', true, 404);
#    $page = 'default.php';
#}

if (file_exists('files/' . $location) && !is_dir('files/' . $location)) {
    header('Location: ' . '/files/' . $location);
    die();
}

/** Build the page **/
// header includes the navigation for now.
require_once "header.php";
//require_once "navigation.php";
?>
<div id="content" class="clearfix">
<?php #require_once $page;
if (isset($page) && (file_exists('files/' . $location) || file_exists($location)) || file_exists($navigation . '.php')) {
        require_once $page;
}
else {
    header('HTTP/1.1 404 Not Found');
    require_once 'default.php';
}
#echo $page . '<br>';
#echo $location . '<br>';
require_once "footer.php"; ?>
<?php
/** Actually do the output **/
$pageContents = ob_get_contents ();
ob_end_clean ();
echo str_replace(array('<!--TITLE-->', '<!--SITEURL-->'), array($pageTitle, $siteURL), $pageContents);
?>

