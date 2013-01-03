<?php
$lang['title'] = $lang['itemattr'];
if($_GET['action'] == 'show'){
	$apply = mysql_real_escape_string($_POST['apply']);
	$query = mysql_query('SELECT prob, lv1, lv2, lv3, lv4, lv5, weapon, body, wrist, foots, neck, head, shield, ear FROM player.item_attr WHERE apply = "'.$apply.'"');
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '
		<form method="post" action="index.php?page=itemattr&action=edit">
			Bonus: <input type="text" name="apply" value="'.$apply.'" readonly="readonly"><br>
			lv1: <input type="text" name="lv1" value="'.$row['lv1'].'"><br>
			lv2: <input type="text" name="lv2" value="'.$row['lv2'].'"><br>
			lv3: <input type="text" name="lv3" value="'.$row['lv3'].'"><br>
			lv4: <input type="text" name="lv4" value="'.$row['lv4'].'"><br>
			lv5: <input type="text" name="lv5" value="'.$row['lv5'].'"><br>
			weapon: <input type="text" name="weapon" value="'.$row['weapon'].'"><br>
			body: <input type="text" name="body" value="'.$row['body'].'"><br>
			wrist: <input type="text" name="wrist" value="'.$row['wrist'].'"><br>
			foots: <input type="text" name="foots" value="'.$row['foots'].'"><br>
			neck: <input type="text" name="neck" value="'.$row['neck'].'"><br>
			head: <input type="text" name="head" value="'.$row['head'].'"><br>
			shield: <input type="text" name="shield" value="'.$row['shield'].'"><br>
			ear: <input type="text" name="ear" value="'.$row['ear'].'"><br>
			<input type="submit" name="submit" value="Editar">
		</form>';
	}
}
elseif($_GET['action'] == 'edit'){
	$apply = mysql_real_escape_string($_POST['apply']);
	$lv1 = mysql_real_escape_string($_POST['lv1']);
	$lv2 = mysql_real_escape_string($_POST['lv2']);
	$lv3 = mysql_real_escape_string($_POST['lv3']);
	$lv4 = mysql_real_escape_string($_POST['lv4']);
	$lv5 = mysql_real_escape_string($_POST['lv5']);
	$weapon = mysql_real_escape_string($_POST['weapon']);
	$body = mysql_real_escape_string($_POST['body']);
	$wrist = mysql_real_escape_string($_POST['wrist']);
	$foots = mysql_real_escape_string($_POST['foots']);
	$neck = mysql_real_escape_string($_POST['neck']);
	$head = mysql_real_escape_string($_POST['head']);
	$shield = mysql_real_escape_string($_POST['shield']);
	$ear = mysql_real_escape_string($_POST['ear']);
	$query = mysql_query('UPDATE player.item_attr SET prob = "'.$prob.'", lv1 = "'.$lv1.'", lv2 = "'.$lv2.'", lv3 = "'.$lv3.'", lv4 = "'.$lv4.'", lv5 = "'.$lv5.'", weapon = "'.$weapon.'", body = "'.$body.'", wrist = "'.$wrist.'", foots = "'.$foots.'", neck = "'.$neck.'", head = "'.$head.'", shield = "'.$shield.'", ear = "'.$ear.'" WHERE apply = "'.$_POST['apply'].'"');
}
else{
	$query = mysql_query('SELECT apply FROM player.item_attr ORDER BY apply ASC');
	$lang['body'] .= '<form action="index.php?page=itemattr&action=show" method="post">Bonus: <select name="apply">';
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '<option value="'.$row['apply'].'">'.$row['apply'].'</option>';
	}
	$lang['body'] .= '<input type="submit" name="submit" value="Editar"></select></form>';
}
?>