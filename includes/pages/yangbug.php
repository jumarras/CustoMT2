<?php
$lang['title'] = $lang['yangbug'];
if($_GET['action'] == 'edititem'){
	if($_POST['submit']){
		$buy = mysql_real_escape_string($_POST['buy']);
		$sale = mysql_real_escape_string($_POST['sale']);
		$item = mysql_real_escape_string($_POST['item']);
		$query = mysql_query('SELECT vnum FROM player.item_proto WHERE locale_name = "'.$item.'"');
		$item = mysql_fetch_assoc($query);
		$query = mysql_query('UPDATE player.item_proto SET gold = "'.$sale.'", shop_buy_price = "'.$buy.'" WHERE vnum = "'.$item['vnum'].'"');
		$lang['body'] = 'Has editado el objeto con exito.';
	}
	else{
		$vnum = mysql_real_escape_string($_GET['vnum']);
		$query = mysql_query('SELECT locale_name, gold, shop_buy_price FROM player.item_proto WHERE vnum = "'.$vnum.'"');
		while($row = mysql_fetch_assoc($query)){
			$lang['body'] =  '
			<form method="post" action="index.php?page=yangbug&action=edititems">
				Objeto: <input type="text" name="item" value="'.$row['locale_name'].'" readonly="readonly"><br>
				Precio de compra: <input type="text" name="buy" value="'.$row['gold'].'"><br>
				Precio de venta: <input type="text" name="sale" value="'.$row['shop_buy_price'].'"><br>
				<input type="submit" name="submit" value="Aceptar Cambios">
			</form>';
		}
	}
	
}
else{
	$query = mysql_query('SELECT locale_name, vnum FROM player.item_proto WHERE gold < shop_buy_price');
	$count = mysql_num_rows($query);
	if($count != 0){
		while($row = mysql_fetch_assoc($query)){
			$lang['body'] .= $row['locale_name'].' <a href="index.php?page=yangbug&action=edititem&vnum='.$row['vnum'].'">Editar</a><br>';
		}
	}
	else
		$lang['body'] =  'No hay ningun bug con los objetos en venta.';
}
?>