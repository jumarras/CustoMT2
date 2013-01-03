<?php
$lang['title'] = $lang['itemfinder'];
if(!empty($_POST['submit']) && $_POST['submit']){
	if(!empty($_POST['username']) && !empty($_POST['vnum']) && $_POST['username'] && $_POST['vnum']){
			$POSTusername = mysql_real_escape_string($_POST['username']);
			$POSTvnum = mysql_real_escape_string($_POST['vnum']);
			$query = mysql_query('SELECT id FROM player.player WHERE name = "'.$POSTusername.'"');
			$exist = mysql_num_rows($query);
			if($exist > 0){
				$row = mysql_fetch_assoc($query);
				$USERid = $row['id'];
				$query = mysql_query('SELECT DISTINCT what FROM log.log WHERE who = "'.$USERid.'" AND vnum = "'.$POSTvnum.'"');
				$exist = mysql_num_rows($query);
				if($exist > 0){
					$lang['body'] .= 'Ha habido '.$exist.' resultados con este objeto.<br><br>';
					while($row = mysql_fetch_assoc($query)){
						$what = $row['what'];
						$lang['body'] .= '<a href="index.php?page=itemfinder&item_id='.$what.'">'.$what.'</a><br>';
					}
				}
				else
					$lang['body'] .='Este usuario no ha tenido nunca este objeto.';
			}
			else
				$lang['body'] .='Este nombre de usuario no existe.';
	}
	else
		$lang['body'] .='Debes introducir todos los datos.';
}
elseif(!empty($_GET['item_id']) && $_GET['item_id']){
	$item_id = mysql_real_escape_string($_GET['item_id']);
	$query = mysql_query('SELECT DISTINCT time, ip, x, y, how, who, vnum FROM log.log WHERE what = "'.$item_id.'" ORDER BY time ASC');
	while($row = mysql_fetch_assoc($query)){
		$date = $row['time'];
		$ip = $row['ip'];
		$how = $row['how'];
		$who = $row['who'];
		switch ($how){
			case 'GM': $state = 'Objeto creado por un GM.'; break;
			case 'DROP': $state = 'Ha tirado el objeto al suelo.'; break;
			case 'GET': $state = 'Ha recojido el objeto del suelo.'; break;
			case 'EXCHANGE_TAKE': $state = 'Ha obtenido el objeto de otro personaje desde comercio.'; break;
			case 'EXCHANGE_GIVE': $state = 'Ha vendido el objeto a otro personaje desde comercio.'; break;
			case 'SAFEBOX_PUT': $state = 'Ha dejado el objeto en el almacen.'; break;
			case 'SAFEBOX_GET': $state = 'Ha recojido el objeto del almacen.'; break;
			case 'USE_ITEM': $state = 'Ha usado el objeto.'; break;
			case 'REMOVE': $state = 'Ha eliminado el objeto.'; break;
			case 'GET_GOLD': $state = 'Ha recojido oro.'; break;
			case 'SELL': $state = 'Ha vendido el objeto.'; break;
			case 'SET_ATTR': $state = 'Ha añadido un bonus.'; break;
			case 'CHANGE_ATTRIBUTE': $state = 'Ha cambiado el bonus.'; break;
			case 'GET_GOLD': $state = 'Ha recivido oro.'; break;
			case 'ADD_ATTRIBUTE_SUCCES': $state = 'Ha añadido nuevo atributo.'; break;
			case 'REFINE SUCCESS': $state = 'Objeto upgradeado exitoso.'; break;
			case 'REMOVE (REFINE SUCCE': $state = 'Objeto upgradeado fracasado.'; break;
			default: $state = 'Accion no reconocida.';
		}
		$query2 = mysql_query('SELECT name FROM player.player WHERE id = "'.$who.'"');
		$row2 = mysql_fetch_assoc($query2);
		$who = $row3['name'];
		$lang['body'] .= $date.': '.$state.' - '.$who.' - ('.$ip.')<br>';
	}
}
else{
	$query = mysql_query('SELECT locale_name, vnum FROM player.item_proto ORDER BY locale_name ASC');
	$lang['body'] .= '<form name="finditem" method="post" action="index.php?page=itemfinder">
						Nombre de Usuario: <input type="text" name="username"><br>Objeto: <select name="vnum">';
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '<option value="'.$row['vnum'].'">'.$row['locale_name'].'('.$row['vnum'].')</option>';
	}
	$lang['body'] .= '</select><br>
						<input type="submit" value="Buscar" name="submit">
						</form>';
}
?>