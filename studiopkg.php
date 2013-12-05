<?php
/**
 * slackbuilds.php
 */

$path     = dirname(realpath(__FILE__));
$location = 'tools/'.str_replace("/..", '',$navigation);
$readme   = false;
$previouscrumbs = '';

date_default_timezone_set('UTC');

$lists   = get_filtered_dirlist($location, 'studiopkg');
$files   = $lists['files'];
$folders = $lists['folders'];

// simulate some breadcrumbs
$crumbs = explode('/',$location);

// is there a readme?
if (file_exists("files/$location/README")) {
	$readme = file_get_contents("files/$location/README");
}
?>

<?php if (count($crumbs) > 1): ?>
<div class="breadcrumbs">
<?php foreach ($crumbs as $crumb): ?>
<span class="crumb"><a href="<!--SITEURL-->/<?php echo "${previouscrumbs}${crumb}"; $previouscrumbs .= "$crumb/"; ?>"><?php echo $crumb; ?> / </a></span>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ($readme): ?>
<p class="readme"><?php echo $readme; ?></p>
<?php endif; ?>

<?php if (!empty($folders) || !empty($files)): ?>
<ul class="listing">
	<li class="heading">
		<span class="name">Filename</span>
		<span class="size">Size</span>
		<span class="time">Modification Time</span>
	</li>
<?php foreach ($folders as $folder): ?>
	<li class="folder">
		<a class="name" href="<!--SITEURL-->/<?php echo "files/$location/$folder/"; ?>"><?php echo $folder; ?>/</a>
		<span class="size">Directory</span>
		<span class="time"><?php echo date("Y-m-d H:i:s", filemtime("files/$location/$folder")); ?>
	</li>
<?php endforeach; ?>
<?php foreach($files as $file): ?>
	<li>
		<a class="name" href="<!--SITEURL-->/<?php echo "files/$location/$file"; ?>"><?php echo $file; ?></a>
		<span class="size"><?php echo round(filesize("files/$location/$file")/1024); ?> KB</span>
		<span class="time"><?php echo date("Y-m-d H:i:s", filemtime("files/$location/$file")); ?></span>
	</li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<p class="warning">All packages and scripts on this website come with the following disclaimer. By using these scripts and packages it is assumed that you accept this.
</p><p>
This software is provided by the author ''as is'' and any express or implied warranties, including, but not limited to, the implied warranties of merchantability and fitness for a particular purpose are disclaimed. In no event shall the author be liable for any direct, indirect, incidental, special, exemplary, or consequential damages (including, but not limited to, procurement of substitute goods or services; loss of use, data, or profits; or business interruption) however caused and on any theory of liability, whether in contract, strict liability, or tort (including negligence or otherwise) arising in any way out of the use of this software, even if advised of the possibility of such damage.</p>
