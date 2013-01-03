<?php
$lang['title'] = $lang['mysql'];
if($_GET['action'] == 'query'){
	if(!empty($_POST['query'])){
		$query = mysql_fetch_assoc($_POST['query']);
		$doquery = mysql_query($query);
		$lang['body'] = 'Query añadida correctamente.';
	}
	else
		$lang['body'] = 'Debes añadir una query.';
}
else
	$lang['body'] = '
	<form method="post" action="query.php?action=query">
		<textarea name="query"></textarea><br>
		<input type="submit" name="submit" value="Añadir Query">
	</form>
	';
?>