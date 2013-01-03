<?php
$lang['title'] = $lang['createobject'];
if(!empty($_POST['user_name']) && !empty($_POST['vnum'])){
	$user_name = mysql_real_escape_string($_POST['user_name']);
	$vnum = mysql_real_escape_string($_POST['vnum']);
	$socket1id = mysql_real_escape_string($_POST['socket1id']);
	$socket2id = mysql_real_escape_string($_POST['socket2id']);
	$socket3id = mysql_real_escape_string($_POST['socket3id']);
	$socket1value = mysql_real_escape_string($_POST['socket1value']);
	$socket2value = mysql_real_escape_string($_POST['socket2value']);
	$socket3value = mysql_real_escape_string($_POST['socket3value']);
	$bonus1id = mysql_real_escape_string($_POST['bonus1id']);
	$bonus2id = mysql_real_escape_string($_POST['bonus2id']);
	$bonus3id = mysql_real_escape_string($_POST['bonus3id']);
	$bonus4id = mysql_real_escape_string($_POST['bonus4id']);
	$bonus5id = mysql_real_escape_string($_POST['bonus5id']);
	$bonus6id = mysql_real_escape_string($_POST['bonus6id']);
	$bonus7id = mysql_real_escape_string($_POST['bonus7id']);
	$bonus1value = mysql_real_escape_string($_POST['bonus1value']);
	$bonus2value = mysql_real_escape_string($_POST['bonus2value']);
	$bonus3value = mysql_real_escape_string($_POST['bonus3value']);
	$bonus4value = mysql_real_escape_string($_POST['bonus4value']);
	$bonus5value = mysql_real_escape_string($_POST['bonus5value']);
	$bonus6value = mysql_real_escape_string($_POST['bonus6value']);
	$bonus7value = mysql_real_escape_string($_POST['bonus7value']);
	$sockets = ' ';
	if($socket1id != ''){
		$num1 = 100 * $socket1value;
		$num2 = $socket1id;
		$total = $num1 + $num2;
		$sockets .= ', socket0 = "'.$total.'"';
	}
	if($socket2id != ''){
		$num1 = 100 * $socket2value;
		$num2 = $socket2id;
		$total = $num1 + $num2;
		$sockets .= ', socket1 = "'.$total.'"';
	}
	if($socket3id != ''){
		$num1 = 100 * $socket3value;
		$num2 = $socket3id;
		$total = $num1 + $num2;
		$sockets .= ', socket2 = "'.$total.'"';
	}
	$bonusid = ' ';    
	if($bonus1id != '')
		$bonusid .= ', attrtype0 = "'.$bonus1id.'"';
	if($bonus2id != '')
		$bonusid .= ', attrtype1 = "'.$bonus2id.'"';
	if($bonus3id != '')
		$bonusid .= ', attrtype2 = "'.$bonus3id.'"';
	if($bonus4id != '')
		$bonusid .= ', attrtype3 = "'.$bonus4id.'"';
	if($bonus5id != '')
		$bonusid .= ', attrtype4 = "'.$bonus5id.'"';
	if($bonus6id != '')
		$bonusid .= ', attrtype5 = "'.$bonus6id.'"';
	if($bonus7id != '')
		$bonusid .= ', attrtype6 = "'.$bonus7id.'"';
	$bonusvalue = ' ';    
	if($bonus1value != '')
		$bonusvalue .= ', attrvalue0 = "'.$bonus1value.'"';
	if($bonus2value != '')
		$bonusvalue .= ', attrvalue1 = "'.$bonus2value.'"';
	if($bonus3value != '')
		$bonusvalue .= ', attrvalue2 = "'.$bonus3value.'"';
	if($bonus4value != '')
		$bonusvalue .= ', attrvalue3 = "'.$bonus4value.'"';
	if($bonus5value != '')
		$bonusvalue .= ', attrvalue4 = "'.$bonus5value.'"';
	if($bonus6value != '')
		$bonusvalue .= ', attrvalue5 = "'.$bonus6value.'"';
	if($bonus7value != '')
		$bonusvalue .= ', attrvalue6 = "'.$bonus7value.'"';
		
	$query_user = mysql_query('SELECT account_id FROM player.player WHERE name = "'.$user_name.'"');
	$user_id = mysql_fetch_assoc($query_user);
	$pos = 0;
	$result = mysql_query('SELECT pos FROM player.item WHERE owner_id = "'.$user_id['account_id'].'" AND window = "MALL" ORDER BY pos ASC', $scon);
	if(mysql_num_rows($result) >= 0){
		while($data = mysql_fetch_assoc($result)){
			if($data['pos'] == $pos)
				$pos = $pos + 1; 
			else
				break; 
		}
		if($pos >= 45)
			$lang['body'] .='El almacen esta lleno, saca algun objeto.';
	}
	$giveitem = mysql_query('INSERT INTO player.item SET owner_id = "'.$user_id['account_id'].'", window = "MALL", pos = "'.$pos.'", count = "1", vnum = "'.$vnum.'"'.$sockets.$bonusid.$bonusvalue, $scon);
	$lang['body'] .= 'Objeto Creado con exito. El objeto se encuentra en el almacen de la Itemshop.';
	$log = LogAction('Ha creado el objeto '.$vnum.'.');	
}
else{
	$lang['body'] .= '<form action="index.php?page=createobject" method="POST">
	Nomnre del PJ: <input type="text" name="user_name"><br>Objeto: <select name="vnum">';
	$query = mysql_query('SELECT locale_name, vnum FROM player.item_proto ORDER BY locale_name ASC');
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '<option value="'.$row['vnum'].'">'.$row['locale_name'].'('.$row['vnum'].')</option>';
	}
	for ($i = 1; $i <= 3; $i++){
		$lang['body'] .='</select><br>Piedra '.$i.':<select name="socket'.$i.'id">
				<option value="">Selecciona una piedra</option>
				<option value="28030">Penetracion</option>
				<option value="28031">Criticos</option>
				<option value="28032">Repeticion</option>
				<option value="28033">Guerrero</option>
				<option value="28034">Ninja</option>
				<option value="28035">Sura</option>
				<option value="28036">Chaman</option>
				<option value="28037">Monstruo</option>
				<option value="28038">Evasion</option>
				<option value="28039">Evasion Fechas</option>
				<option value="28040">SP</option>
				<option value="28041">HP</option>
				<option value="28042">Defensa</option>
				<option value="28043">Velocidad</option>
			</select> 
			<select name="socket'.$i.'value">
				<option value="1">+1</option>
				<option value="2">+2</option>
				<option value="3">+3</option>
				<option value="4">+4</option>
				<option value="5">+5</option>
				<option value="6">+6</option>
				<option value="7">+7</option>
				<option value="8">+8</option>
				<option value="9">+9</option>
			</select><br>';
	}
	for ($i = 1; $i <= 7; $i++){
		$lang['body'] .='Bonus '.$i.':<select name="bonus'.$i.'id">
				<option value="">Selecciona un bonus</option>
				<option value="1">Max HP</option>
				<option value="2">Max SP</option>
				<option value="3">VIT</option>
				<option value="4">INT</option>
				<option value="5">STR</option>
				<option value="6">DEX</option>
				<option value="7">Velocidad de ataque</option>
				<option value="8">Velocidad de movimiento</option>
				<option value="9">Velocidad de magia</option>
				<option value="10">Regeneracion de HP</option>
				<option value="11">Regeneracion de SP</option>
				<option value="12">Envenenamiento</option>
				<option value="13">Probabilidad de aturdir (valor 1)</option>
				<option value="14">Probabilidad de caida - (valor 1)</option>
				<option value="15">Probabilidad de critico</option>
				<option value="16">Probabilidad de penetracion</option>
				<option value="17">Fuerza contra humanos</option>
				<option value="18">Fuerza contra animales</option>
				<option value="19">Fuerza contra orcos</option>
				<option value="20">Fuerza contra misticos</option>
				<option value="21">Fuerza contra no-muertos</option>
				<option value="22">Fuerza contra demonios</option>
				<option value="23">Probabilidad de robar HP</option>
				<option value="24">Probabilidad de robar SP</option>
				<option value="29">Resistencia espada</option>
				<option value="30">Resistencia dos-manos</option>
				<option value="31">Resistencia dagas</option>
				<option value="32">Resistencia campanas</option>
				<option value="33">Resistencia fan</option>
				<option value="34">Resistencia flechas</option>
				<option value="35">Resistencia fuego</option>
				<option value="36">Resistencia luz</option>
				<option value="37">Resistencia magia</option>
				<option value="38">Resistencia viento</option>
				<option value="41">Resistencia veneno</option>
				<option value="43">Doble XP</option>
				<option value="44">Doble YANG</option>
				<option value="45">DOBLE ITEMS</option>
			</select> 
			 - Valor: <input type="text" name="bonus'.$i.'value"><br>';
	}
	$lang['body'] .='<input type="submit" name="submit" value="Crear Objeto">
</form>';
}
?>