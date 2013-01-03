<?php
$lang['title'] = $lang['editeditems'];
include_once('bonus.php');
if(!empty($_GET['item'])){
	$item_id = mysql_real_escape_string($_GET['item']);
	$query = mysql_query('SELECT id, owner_id, vnum, attrtype0, attrtype1, attrtype2, attrtype3, attrtype4, attrvalue0, attrvalue1, attrvalue2, attrvalue3, attrvalue4 FROM player.item WHERE id = "'.$item_id .'" LIMIT 1');
	while($row = mysql_fetch_assoc($query)){
		$find_user = mysql_query('SELECT account_id, name FROM player.player WHERE id = "'.$row['owner_id'].'"');
		$user = mysql_fetch_assoc($find_user);
		$find_item = mysql_query('SELECT locale_name FROM player.item_proto WHERE vnum = "'.$row['vnum'].'"');
		$item = mysql_fetch_assoc($find_item);
		$lang['body'] .= '
			<table>
				<tr>
					<td>OWNER:</td>
					<td>'.$user['name'].' ('.$user['account_id'].')</td>
				</tr>
				<tr>
					<td>ITEM:</td>
					<td>'.$item['locale_name'].'('.$row['id'].')</td>
				</tr>
				<tr>
					<td>attrtype0:</td>
					<td>'.$row['attrtype0'].' -> '.$row['attrvalue0'].'</td>
				</tr>
				<tr>
					<td>attrtype1:</td>
					<td>'.$row['attrtype1'].' -> '.$row['attrvalue1'].'</td>
				</tr>
				<tr>
					<td>attrtype2:</td>
					<td>'.$row['attrtype2'].' -> '.$row['attrvalue2'].'</td>
				</tr>
				<tr>
					<td>attrtype3:</td>
					<td>'.$row['attrtype3'].' -> '.$row['attrvalue3'].'</td>
				</tr>
				<tr>
					<td>attrtype4:</td>
					<td>'.$row['attrtype4'].' -> '.$row['attrvalue4'].'</td>
				</tr>
			</table>';
	}
}
else{
	$bonuses = array($_1, $_2, $_3, $_4, $_5, $_6, $_7, $_8, $_9, $_10, $_11, $_12, $_13, $_14, $_15, $_16, $_17, $_18, $_19, $_20, $_21, $_22, $_23, $_24, $_25, $_26, $_27, $_28, $_29, $_30, $_31, $_32, $_33, $_34, $_35, $_36, $_37, $_38, $_39, $_40, $_41, $_42, $_43, $_44, $_45, $_46, $_47, $_48, $_49, $_50, $_51, $_52, $_53, $_54, $_55, $_56, $_57, $_58, $_59, $_60, $_61, $_62, $_63, $_64, $_65, $_66, $_67, $_68, $_69, $_70, $_71, $_72, $_73, $_74, $_75, $_76, $_77, $_78, $_79, $_80, $_81);
	$bonuses_count = count($bonuses);
	$i = '';
	for ($i = 1; $i < $bonuses_count; $i++){
		if($i != $bonuses[47][0] ||$i != $bonuses[48][0] ||$i != $bonuses[49][0]){
			$query = mysql_query('SELECT id, owner_id, vnum, attrtype0, attrtype1, attrtype2, attrtype3, attrtype4, attrvalue0, attrvalue1, attrvalue2, attrvalue3, attrvalue4 FROM player.item WHERE 
				attrtype0 = '.$bonuses[$i][0].' AND attrvalue0 > '.$bonuses[$i][2].' OR
				attrtype1 = '.$bonuses[$i][0].' AND attrvalue1 > '.$bonuses[$i][2].' OR
				attrtype2 = '.$bonuses[$i][0].' AND attrvalue2 > '.$bonuses[$i][2].' OR
				attrtype3 = '.$bonuses[$i][0].' AND attrvalue3 > '.$bonuses[$i][2].' OR
				attrtype4 = '.$bonuses[$i][0].' AND attrvalue4 > '.$bonuses[$i][2].' ORDER BY owner_id ASC');
				$lang['body'] .= $bonuses[$i][1].'<br>';
		}
		if($query != 0){
			while($row = mysql_fetch_assoc($query)){
				$lang['body'] .= '<a href="index.php?page=editeditems&item='.$row['id'].'">'.$row['id'].'</a><br>';
			}
		}
	}
}
?>