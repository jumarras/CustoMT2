<?php
function IncludeLang($language){
	global $lang;
	$handler = opendir('includes/languages/'.LANGUAGE.'/');
	while ($file = readdir($handler)) {
		if ($file != '.' && $file != '..')
			include_once 'includes/languages/'.LANGUAGE.'/'.$file;
	}
}
?>