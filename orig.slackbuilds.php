<?php
/**
 * slackbuilds.php
 */
$path     = dirname(realpath(__FILE__));
$location = str_replace("/..", '',$navigation);
$files    = array();
$folders  = array();
$readme   = false;
$previouscrumbs = '';

date_default_timezone_set('UTC');

if (!file_exists('files/' . $location)) {
    header('HTTP/1.1 404 Not Found');
    echo '<script type="text/javascript">location.href = "/";</script>';
    #echo 'files/' . $location;
    exit;
}


$lists   = get_filtered_dirlist($location, 'slackbuilds');
$files   = $lists['files'];
$folders = $lists['folders'];
$folders = array_diff($folders, array(".testing"));
$folders = array_diff($folders, array(".subs"));
$folders = array_diff($folders, array(".newlayout"));

// simulate some breadcrumbs
$crumbs = explode('/',$location);

// is there a readme?
if (file_exists("files/$location/README")) {
    $readme = file_get_contents("files/$location/README");
        $readme = str_replace("<", "&lt;", $readme);
        $readme = str_replace(">", "&gt;", $readme);
}
?>

<?php if (count($crumbs) > 1): ?>
<div class="breadcrumbs">
<?php foreach ($crumbs as $crumb): ?>
<span class="crumb"><a href="<!--SITEURL-->/files/<?php echo "${previouscrumbs}${crumb}"; $previouscrumbs .= "$crumb/"; ?>"><?php echo $crumb; ?></a> / </span>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ($readme): ?>
<p class="readme"><?php echo $readme; ?></p>
<?php endif; ?>

<?php
if (isset($crumb)) {
    $infofile = "files/$location/$crumb.info";
    if (file_exists($infofile)) {
        $info = parse_ini_file($infofile);

        $slackbuild = $info['PRGNAM'] . ".tar.gz";
        $homepage = $info['HOMEPAGE'];
        $download = explode("\\", $info['DOWNLOAD']);
        $md5sum = explode("\\", $info['MD5SUM']);
        $download64 = explode("\\", $info['DOWNLOAD_x86_64']);
        $md5sum64 = explode("\\", $info['MD5SUM_x86_64']);
        if ( array_key_exists('REQUIRES', $info) )
            $requires = explode("\\", $info['REQUIRES']);

        // left div
        print "<div style=\"float: left;\"><p>\n";

        print "Homepage:&nbsp;<br />\n";
        print "Source:<br />\n";
        for ( $i = 1; $i < count($download); $i++ )
        {
            print "<br />\n";
        }
        print "md5sum:<br />\n";
        for ( $i = 1; $i < count($md5sum); $i++ )
        {
            print "<br />\n";
        }
        if ( $download64[0] != "" )
        {
            for ( $i = 1; $i < count($download64); $i++ )
            {
                print "<br />\n";
            }
            print "md5sum:<br />\n";
            for ( $i = 1; $i < count($md5sum64); $i++ )
            {
                print "<br />\n";
            }
        }
        if ( array_key_exists('REQUIRES', $info) )
        {
            if ( $requires[0] != "" )
            {
                print "Requires:<br />\n";
            }
        }
        if ( file_exists ( "files/$location/$slackbuild" ) )
        {
            print "SlackBuild:<br />";
        }
        print "</p></div>";

        // right div
        print "<div style=\"margin-top: 10px; margin-bottom:20px;\"><p>";

        print "<a class=\"toplink\" href=\"" . $homepage . "\">" . $homepage . "</a><br />";
        for ( $i = 0; $i < count($download); $i++ )
        {
            print "<a class=\"toplink\" href=\"" . $download[$i] . "\">" . basename($download[$i]) . "</a><br />\n";
        }
        for ( $i = 0; $i < count($md5sum); $i++ )
        {
            print $md5sum[$i]. "<br />\n";
        }

        if ( $download64[0] != "" )
        {
            for ( $i = 0; $i < count($download64); $i++ )
            {
                print "<a class=\"toplink\" href=\"" . $download64[$i] . "\">" . basename($download64[$i]) . "</a><br />\n";
            }
            for ( $i = 0; $i < count($md5sum64); $i++ )
            {
                print $md5sum64[$i]. "<br />\n";
            }
        }

        if ( array_key_exists('REQUIRES', $info) )
        {
            if ( $requires[0] != "" )
            {
                print $requires[0] . "<br />\n";
            }
        }

        if ( file_exists ( "files/$location/$slackbuild" ) )
        {
            print "<a class=\"toplink\" href=\"<!--SITEURL-->/files/$location/$slackbuild\">$slackbuild</a><br />";
        }
        print "</p></div>";
    }
}
?>

<?php if (!empty($folders) || !empty($files)): ?>
<ul class="listing">
    <li class="heading">
        <span class="name">Filename</span>
        <span class="size">Size</span>
        <span class="time">Modification Time</span>
    </li>
<?php foreach ($folders as $folder): ?>
    <li class="folder">
        <a class="name" href="<!--SITEURL-->/<?php echo "$location/$folder/"; ?>"><?php echo $folder; ?>/</a>
        <span class="size">Directory</span>
        <span class="time"><?php echo date("Y-m-d H:i:s", filemtime("files/$location/$folder")); ?>
    </li>
<?php endforeach; ?>
<?php foreach($files as $file): ?>
    <li>
        <a class="name" href="<!--SITEURL-->/files/<?php echo "$location/$file"; ?>"><?php echo $file; ?></a>
        <span class="size"><?php echo round(filesize("files/$location/$file")/1024); ?> KB</span>
        <span class="time"><?php echo date("Y-m-d H:i:s", filemtime("files/$location/$file")); ?></span>
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<p class="warning">All packages and scripts on this website come with the following disclaimer. By using these scripts and packages it is assumed that you accept this.
</p><p class="warning">
This software is provided by the author ''as is'' and any express or implied warranties, including, but not limited to, the implied warranties of merchantability and fitness for a particular purpose are disclaimed. In no event shall the author be liable for any direct, indirect, incidental, special, exemplary, or consequential damages (including, but not limited to, procurement of substitute goods or services; loss of use, data, or profits; or business interruption) however caused and on any theory of liability, whether in contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of this software, even if advised of the possibility of such damage.</p>
