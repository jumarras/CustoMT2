<?php
function IncludeLang($language){
	global $lang;
	include ('includes/languages/'.LANGUAGE.'.php');
}
?>