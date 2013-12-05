<?php

function get_filtered_dirlist($location, $defaultpath, $userexcludes = array()) {
	$files = array();
	$folders = array();
	$excludes = array_merge(array('.', '..', '.config', 'index.php', 'README'),$userexcludes);
	// attempt to open the relative path.
	if (!is_dir("files/$location")) {
		$location = $defaultpath;
	}
	$dirlist = scandir("files/$location");

	// get our files & folders
	foreach ($dirlist as $listent) {
		if (in_array($listent, $excludes, true)) {
			continue;
                }
                  else if (strpos("$listent", ".tar.gz") > 0) {
                        continue;
		} else if (is_dir("files/$location/$listent")) {
			$folders[] = $listent;
		} else {
			$files[] = $listent;
		}
	}
	return array('files' => $files, 'folders' => $folders);
}
?>
