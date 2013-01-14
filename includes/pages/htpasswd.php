<?php
$lang['title'] = $lang['users'];
if($_GET['action'] == 'show'){
	$id = mysql_real_escape_string($_POST['id']);
	$lang['body'] .= '
	<form action="index.php?page=htpasswd&action=edit" method="post">
		Usuario: <input type="text" name="id" value="'.$id.'"><br>
		Nueva Contraseña: <input type="password" name="password" value=""><br>
		Repite Contraseña: <input type="password" name="repassword" value=""><br>
		<input type="submit" name="submit" value="Editar"></select>
	</form>
	';
}
elseif($_GET['action'] == 'edit'){
	if($_POST['password'] == $_POST['repassword']){
		$lang['body'] .= htpasswdupdate($_POST['id'], $_POST['password']);
	}
	else
		$lang['body'] .= 'La contraseña escrita no es la misma.';
}
else{
	$lang['body'] .= '<form action="index.php?page=htpasswd&action=show" method="post">ID: <select name="id">';
	$list = explode("/", htpasswdshow());
	$count = count($list) - 1;
	for($i = 0; $i <= $count; $i++){
		if($list[$i] != '')
			$lang['body'] .= '<option value="'.$list[$i].'">'.$list[$i].'</option>';
	}
	$lang['body'] .= '<input type="submit" name="submit" value="Editar"></select></form>';
}
?>