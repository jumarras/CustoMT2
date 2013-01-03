<?php
function Template($template){
	global $lang;
	$file_content = @file_get_contents('style/templates/'.$template.'.tpl');
	if($file_content)
		return preg_replace ('#\{{([a-z0-9\-_]*?)\}}#Ssie' , '( ( isset($lang[\'\1\']) ) ? $lang[\'\1\'] : \'\' );' , $file_content);
	else
		return $lang['templaterror'];

}
?>