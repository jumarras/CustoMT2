<?php
$lang['title'] = $lang['editadmin'];
if($_GET['action'] == 'addadmin'){
	if(isset($_POST['submit'])){
		$mAccount = mysql_real_escape_string($_POST['account']);
		$mName = mysql_real_escape_string($_POST['pj']);
		$mAuthority = mysql_real_escape_string($_POST['authority']);
		$authority = ($mAuthority == 1) ? 'IMPLEMENTOR' : '';
		$authority = ($mAuthority == 2) ? 'HIGH_WIZARD' : '';
		$authority = ($mAuthority == 3) ? 'GOD' : '';
		$authority = ($mAuthority == 4) ? 'LOW_WIZARD' : '';
		$authority = ($mAuthority == 5) ? 'PLAYER' : '';
		$query = mysql_query('INSERT INTO common.gmlist SET mName = "'.$mName.'", mAuthority = "'.$mAuthority.'", mAccount = "'.$mAccount.'"');
		$lang['body'] = 'Has añadido la cuenta con exito.';
	}
	else{
		$lang['body'] = '<form method="post" action="index.php?page=ingameadmins&action=addadmin">
				Nombre de la Cuenta: <input type="text" name="account" value="'.$row['mAccount'].'"><br>
				Nombre del PJ: <input type="text" name="pj" value="'.$row['mName'].'"><br>
				Autorizacion:   <select name="authority">
									<option value="1">IMPLEMENTOR</option>
									<option value="2">HIGH_WIZARD</option>
									<option value="3">GOD</option>
									<option value="4">LOW_WIZARD</option>
									<option value="5">PLAYER</option>
								</select><br>
				<input type="submit" name="submit" value="Añadir Cuenta">
			</form>';
	}
}
elseif($_GET['action'] == 'editadmin'){
	if(isset($_POST['submit'])){
		$mAccount = mysql_real_escape_string($_POST['account']);
		$mName = mysql_real_escape_string($_POST['pj']);
		$mAuthority = mysql_real_escape_string($_POST['authority']);
		$authority = ($mAuthority == 1) ? 'IMPLEMENTOR' : '';
		$authority = ($mAuthority == 2) ? 'HIGH_WIZARD' : '';
		$authority = ($mAuthority == 3) ? 'GOD' : '';
		$authority = ($mAuthority == 4) ? 'LOW_WIZARD' : '';
		$authority = ($mAuthority == 5) ? 'PLAYER' : '';
		$query = mysql_query('UPDATE common.gmlist SET mName = "'.$mName.'", mAuthority = "'.$mAuthority.'" WHERE mAccount = "'.$mAccount.'"');
		$lang['body'] = 'Has editado la cuenta con exito.';
	}
	else{
		$mID = mysql_real_escape_string($_GET['id']);
		$query = mysql_query('SELECT mAccount, mAuthority, mName FROM common.gmlist WHERE mID = "'.$mID.'"');
		while($row = mysql_fetch_assoc($query)){
			switch ($row['mAuthority']){
				case 'IMPLEMENTOR': $authority = '1'; break;
				case 'HIGH_WIZARD': $authority = '2'; break;
				case 'GOD': $authority = '3'; break;
				case 'LOW_WIZARD': $authority = '4'; break;
				case 'PLAYER': $authority = '5'; break;
			}
			$lang['body'] = '<form method="post" action="index.php?page=ingameadmins&action=editadmin">
					Nombre de la Cuenta: <input type="text" name="account" value="'.$row['mAccount'].'" readonly="readonly"><br>
					Nombre del PJ: <input type="text" name="pj" value="'.$row['mName'].'"><br>
					Autorizacion:   <select name="authority">';
					$lang['body'] .= ($authority == 1) ? '<option value="1" selected>IMPLEMENTOR</option>' : '<option value="1">IMPLEMENTOR</option>';
					$lang['body'] .= ($authority == 2) ? '<option value="2" selected>HIGH_WIZARD</option>' : '<option value="2">HIGH_WIZARD</option>';
					$lang['body'] .= ($authority == 3) ? '<option value="3" selected>GOD</option>' : '<option value="3">GOD</option>';
					$lang['body'] .= ($authority == 4) ? '<option value="4" selected>LOW_WIZARD</option>' : '<option value="4">LOW_WIZARD</option>';
					$lang['body'] .= ($authority == 5) ? '<option value="5" selected>PLAYER</option>' : '<option value="5">PLAYER</option>';
					$lang['body'] .= '				</select><br>
					<input type="submit" name="submit" value="Aceptar Cambios">
				</form>';
		}
	}
}
elseif($_GET['action'] == 'deleteadmin'){
	$mID = mysql_real_escape_string($_GET['mID']);
	$query = mysql_query('DELETE FROM common.gmlist WHERE mID = "'.$mID.'"');
	$lang['body'] =  'Has eliminado la cuenta con exito.';
}
else{
	$query = mysql_query('SELECT mID, mName, mAuthority FROM common.gmlist');
	while($row = mysql_fetch_assoc($query))
		$lang['body'] .= $row['mName'].' - <a href="index.php?page=ingameadmins&action=editadmin&id='.$row['mID'].'">Editar GM</a> - <a href="index.php?page=ingameadmins&action=deleteadmin&id='.$row['mID'].'">Eliminar GM</a><br>';
	$lang['body'] .= '<a href="index.php?page=ingameadmins&action=addadmin">-> Añadir GM <-</a>';
}
?>