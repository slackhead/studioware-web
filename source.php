<?php
/**
 * source.php
 */
$path     = dirname(realpath(__FILE__));
$location = str_replace("/..", '',$navigation);
$files    = array();
$folders  = array();
$readme   = false;
$previouscrumbs = '';

date_default_timezone_set('UTC');

$lists   = get_filtered_dirlist($location, 'slackbuilds');
$files   = $lists['files'];
$folders = $lists['folders'];
$folders = array_diff($folders, array(".testing"));
$folders = array_diff($folders, array(".subs"));
$folders = array_diff($folders, array(".newlayout"));

// simulate some breadcrumbs
$crumbs = explode('/',$location);

<?php if (count($crumbs) > 1): ?>
<div class="breadcrumbs">
<?php foreach ($crumbs as $crumb): ?>
<span class="crumb"><a href="<!--SITEURL-->/<?php echo "${previouscrumbs}${crumb}"; $previouscrumbs .= "$crumb/"; ?>"><?php echo $crumb; ?></a> / </span>
<?php endforeach; ?>
</div>
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

