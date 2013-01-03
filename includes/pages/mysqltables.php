<?php
$lang['title'] = $lang['mysql'];
if($_GET['action'] == 'listsatabases'){
	$db = mysql_real_escape_string($_GET['db']);
	$query = mysql_query('SHOW TABLES FROM '.$db);
	while($row = mysql_fetch_array($query)){
		$query2 = mysql_query('CHECK TABLE '.$db.'.'.$row[0]);
		while($row2 = mysql_fetch_array($query2)){
			$lang['body'] .= $row2[0].' '.$row2[3].' - <a href="index.php?page=mysqltables&action=repair&db='.$db.'&table='.$row[0].'">Reparar</a><br>';
		}
	}
}
elseif($_GET['action'] == 'repair'){
	$table = mysql_real_escape_string($_GET['table']);
	$db = mysql_real_escape_string($_GET['db']);
	$query = mysql_query('REPAIR TABLE '.$db.'.'.$table);
	while($row = mysql_fetch_array($query)){
		$lang['body'] .= $row[0].' '.$row[3].'<br>';
	}
}
else{
	$query = mysql_query('SHOW DATABASES');
	while($row = mysql_fetch_array($query)){
		$lang['body'] .= '<a href="index.php?page=mysqltables&action=listsatabases&db='.$row[0].'">'.$row[0].'</a><br>';
	}
}
?>