<?php
function UpdateBonus(){

$query = mysql_query('SELECT apply, lv5 FROM player.item_attr');
	while ($row = mysql_fetch_row($query)) {
		$count = count($row);
		$y = 0;
		while ($y < $count){
			$c_row = current($row);
			$bonus .=  $c_row.':';
			next($row);
			$y = $y + 1;
		}
		$bonus .= "\n";
	}
	return $bonus;
}
?>