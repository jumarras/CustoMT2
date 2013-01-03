<?php
$handler = opendir('includes/functions/');
while ($file = readdir($handler)) {
	if ($file != '.' && $file != '..')
		include_once 'includes/functions/'.$file;
}
?>