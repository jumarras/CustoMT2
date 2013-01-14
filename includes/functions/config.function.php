<?php
function ConfigEdit($host, $user, $pass, $web, $language){
	if(file_exists('config.php'))
		unlink('config.php');
	if (!$handle = fopen('config.php', 'a'))
		return 'No se puede abrir el archivo';
$config = "<?php
define('GAME_HOST', '".$host."');
define('GAME_USER', '".$user."');
define('GAME_PASSWORD', '".$pass."');
define('WEBNAME', '".$web."');
define('LANGUAGE', '".$language."');
?>";
	if (fwrite($handle, $config) === FALSE)
		return 'No se puede abrir el archivo';
	return 'Configuracion editada correctamente.';
}
?>