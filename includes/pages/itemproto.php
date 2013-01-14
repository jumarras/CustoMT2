<?php
$lang['title'] = $lang['itemproto'];
if($_GET['action'] == 'show'){
	$vnum = mysql_real_escape_string($_POST['vnum']);
	$query = mysql_query('SELECT locale_name, type, size, antiflag, refined_vnum, refine_set FROM player.item_proto WHERE vnum = "'.$vnum.'"') or die(mysql_error());
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '
		<form method="post" action="index.php?page=itemproto&action=edit">
			VNUM: <input type="text" name="vnum" value="'.$vnum.'" readonly="readonly"><br>
			Locale Name: <input type="text" name="localename" value="'.$row['locale_name'].'"><br>
			Type: <input type="text" name="type" value="'.$row['type'].'"><br>
			Size: <input type="text" name="size" value="'.$row['size'].'"><br>
			Antiflag: <input type="text" name="antiflag" value="'.$row['antiflag'].'"><br>
			Refined Vnum: <input type="text" name="refinedvnum" value="'.$row['refined_vnum'].'"><br>
			Refine Set: <input type="text" name="refineset" value="'.$row['refine_set'].'"><br>
			<input type="submit" name="submit" value="Editar">
		</form>
		';
	}
}
elseif($_GET['action'] == 'edit'){
	$vnum = mysql_real_escape_string($_GET['vnum']);
	$localename = mysql_real_escape_string($_GET['localename']);
	$type = mysql_real_escape_string($_GET['type']);
	$size = mysql_real_escape_string($_GET['size']);
	$antiflag = mysql_real_escape_string($_GET['antiflag']);
	$refinedvnum = mysql_real_escape_string($_GET['refinedvnum']);
	$refineset = mysql_real_escape_string($_GET['refineset']);
	$query = mysql_query('UPDATE player.item_proto SET locale_name = "'.$localename.'", type = "'.$type.'", size = "'.$size.'", antiflag = "'.$antiflag.'", refined_vnum = "'.$refinevnum.'", refine_set = "'.$refineset.'" WHERE vnum = "'.$vnum.'"');
	$lang['body'] = 'Has editado el objeto con exito.';
}
else
{
	$query = mysql_query('SELECT locale_name, vnum FROM player.item_proto ORDER BY locale_name ASC');
	$lang['body'] .= '<form action="index.php?page=itemproto&action=show" method="post">Item: <select name="vnum">';
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '<option value="'.$row['vnum'].'">'.$row['locale_name'].'</option>';
	}
	$lang['body'] .= '</select><input type="submit" name="submit" value="Editar"></form>';
}
?>