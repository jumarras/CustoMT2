<?php
$lang['title'] = $lang['config'];
if($_GET['action'] == 'edit'){
	if($_POST['host'] && $_POST['user'] && $_POST['password'] && $_POST['webname'] && $_POST['language']){
		$host = mysql_real_escape_string($_POST['host']);
		$user = mysql_real_escape_string($_POST['user']);
		$password = mysql_real_escape_string($_POST['password']);
		$webname = mysql_real_escape_string($_POST['webname']);
		$language = mysql_real_escape_string($_POST['language']);
		$return = ConfigEdit($host, $user, $password, $webname, $language);
		if($return == true)
			$lang['body'] .= 'Configuracion editada correctamente';
		else
			$lang['body'] .= 'Ha ocurrido un error.';
	}
	else
		$lang['body'] .= 'Debes rellenar todos los campos.';
}
else{
	$lang['body'] = '<form method="post" action="index.php?page=config&action=edit">
						Host: <input type="text" name="host" value="'.GAME_HOST.'"><br>
						User: <input type="text" name="user" value="'.GAME_USER.'"><br>
						Password: <input type="password" name="password" value="hidden"><br>
						Nombre Metin2: <input type="text" name="webname" value="'.WEBNAME.'"><br>
						Idioma: <input type="text" name="language" value="'.LANGUAGE.'"  readonly="readonly"><br>
						<input type="submit" name="submit" value="Editar">
					</form>
	';
}
?>