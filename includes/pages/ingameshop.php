<?php
$lang['title'] = $lang['editshop'];
if($_GET['action'] == 'editnpcname'){
	if(isset($_POST['submit'])){
		$npc_vnum = mysql_real_escape_string($_POST['npc']);
		$npc_name = mysql_real_escape_string($_POST['name']);
		$query = mysql_query('UPDATE player.shop SET name = "'.$npc_name.'" WHERE shop_vnum = "'.$npc_vnum.'"');
		$lang['body'] = 'Has editado el NPC con exito.';
	}
	elseif(isset($_GET['npc'])){
		$npc_vnum = mysql_real_escape_string($_GET['npc']);
		$query = mysql_query('SELECT name FROM player.shop WHERE vnum = "'.$npc_vnum.'"');
		$npc_name = mysql_fetch_assoc($query);
		$lang['body'] = '
		<form method="post" action="index.php?page=ingameshop&action=editnpcname">
			Nombre del NPC: <input type="text" name="npc" value="'.$npc_name['name'].'"><br>
			<input type="submit" name="submit" value="Aceptar Cambios">
		</form>';
	}
}
elseif($_GET['action'] == 'editnpcitems'){
	if(isset($_POST['submit'])){
		$npc_vnum = mysql_real_escape_string($_POST['npc']);
		$item_vnum = mysql_real_escape_string($_POST['item']);
		$count = mysql_real_escape_string($_POST['count']);
		$query = mysql_query('UPDATE player.shop_item SET item_vnum = "'.$item_vnum.'", count = "'.$count.'" WHERE shop_vnum = "'.$npc_vnum.'" AND item_vnum = "'.$item_vnum.'"');
		$lang['body'] = 'Has editado el objeto con exito.';
	}
	elseif(isset($_GET['npc']) && isset($_GET['item'])){
		$npc_vnum = mysql_real_escape_string($_GET['npc']);
		$item_vnum = mysql_real_escape_string($_GET['item']);
		$count = mysql_real_escape_string($_GET['count']);
		$query = mysql_query('SELECT name FROM player.shop WHERE vnum = "'.$npc_vnum.'"');
		$npc_name = mysql_fetch_assoc($query);
		$lang['body'] = '
		<form method="post" action="index.php?page=ingameshop&action=edititems">
			NPC: <input type="text" name="npc" value="'.$npc_name['name'].'" readonly="readonly"><br>
			Item VNUM: <input type="text" name="item" value="'.$item_vnum.'"><br>
			Cantidad: <input type="text" name="count" value="'.$count.'"><br>
			<input type="submit" name="submit" value="Aceptar Cambios">
		</form>';
	}
	elseif(isset($_GET['npc'])){
		$npc_vnum = mysql_real_escape_string($_GET['npc']);
		$query = mysql_query('SELECT item_vnum, count FROM player.shop_item WHERE shop_vnum = "'.$npc_vnum.'"');
		while($row = mysql_fetch_assoc($query)){
			$query2 = mysql_query('SELECT locale_name FROM player.item_proto WHERE vnum = "'.$row['item_vnum'].'"');
			$name = mysql_fetch_assoc($query2);
			$lang['body'] .= $name['locale_name'].' - 	<a href="index.php?page=ingameshop&action=editnpcitems&npc='.$npc_vnum.'&item='.$row['item_vnum'].'&count='.$row['count'].'">Editar</a> <a href="index.php?page=ingameshop&action=deletenpcitems&npc='.$npc_vnum.'&item='.$row['item_vnum'].'">Eliminar</a><br>';
		}
	}
}
elseif($_GET['action'] == 'deletenpcitems'){
	if(isset($_GET['npc']) && isset($_GET['item'])){
		$npc_vnum = mysql_real_escape_string($_GET['npc']);
		$item_vnum = mysql_real_escape_string($_GET['item']);
		$query = mysql_query('DELETE FROM player.shop_item WHERE shop_vnum = "'.$npc_vnum.'" AND item_vnum = "'.$item_vnum.'"');
		$lang['body'] = 'Has eliminado el objeto con exito.';
	}
}
elseif($_GET['action'] == 'addnpcitems'){
	if(isset($_POST['submit'])){
		$npc_vnum = mysql_real_escape_string($_POST['npc']);
		$item_vnum = mysql_real_escape_string($_POST['item']);
		$count = mysql_real_escape_string($_POST['count']);
		$query = mysql_query('INSERT INTO player.shop_item SET shop_vnum = "'.$npc_vnum.'", item_vnum = "'.$item_vnum.'", count = "'.$count.'"');
		$lang['body'] = 'Has añadido el objeto con exito.';
	}
	elseif(isset($_GET['npc'])){
		$npc_vnum = mysql_real_escape_string($_GET['npc']);
		$query = mysql_query('SELECT name FROM player.shop WHERE vnum = "'.$npc_vnum.'"');
		$npc_name = mysql_fetch_assoc($query);
		$lang['body'] = '
		<form method="post" action="index.php?page=ingameshop&action=addnpcitems">
			NPC: <input type="text" name="npc" value="'.$npc_name['name'].'" readonly="readonly"><br>
			Item VNUM: <input type="text" name="item" value=""><br>
			Cantidad: <input type="text" name="count" value=""><br>
			<input type="submit" name="submit" value="Añadir Objeto">
		</form>';
	}
}
else{
	$query = mysql_query('SELECT name, vnum FROM player.shop');
	while($row = mysql_fetch_assoc($query))
		$lang['body'] .= $row['name'].' - <a href="index.php?page=ingameshop&action=addnpcitems&npc='.$row['vnum'].'"">Añadir objetos</a> - <a href="index.php?page=ingameshop&action=editnpcitems&npc='.$row['vnum'].'">Editar Objetos</a> - <a href="index.php?page=ingameshop&action=editnpcname&npc='.$row['vnum'].'">Cambiar Nombre</a><br>';
}
?>