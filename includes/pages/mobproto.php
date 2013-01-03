<?php
$lang['title'] = $lang['mobproto'];
if($_GET['action'] == 'show'){
	$vnum = mysql_real_escape_string($_POST['vnum']);
	$query = mysql_query('SELECT locale_name, rank, type, battle_type, level, ai_flag, mount_capacity, setRaceFlag, setImmuneFlag, empire, folder, on_click, st, dx, ht, iq, damage_min, damage_max, max_hp, regen_cycle, regen_percent, gold_min, gold_max, exp, def, attack_speed, move_speed, aggressive_hp_pct, aggressive_sight, attack_range, drop_item, resurrection_vnum, enchant_curse, enchant_slow, enchant_poison, enchant_stun, enchant_critical, enchant_penetrate, resist_sword, resist_twohand, resist_dagger, resist_bell, resist_fan, resist_bow, resist_fire, resist_elect, resist_magic, resist_wind, resist_poison, dam_multiply, summon, drain_sp, mob_color, polymorph_item, skill_level0, skill_vnum0, skill_level1, skill_vnum1, skill_level2, skill_vnum2, skill_level3, skill_vnum3, skill_level4, skill_vnum4, sp_berserk, sp_stoneskin, sp_godspeed, sp_deathblow, sp_revive FROM player.mob_proto WHERE vnum = "'.$vnum.'"');
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '
		<form method="post" action="index.php?page=mobproto&action=edit">
			VNUM: <input type="text" name="vnum" value="'.$vnum.'" readonly="readonly"><br>
			Locale Name: <input type="text" name="localename" value="'.$row['locale_name'].'"><br>
			rank: <input type="text" name="rank" value="'.$row['rank'].'"><br>
			type: <input type="text" name="type" value="'.$row['type'].'"><br>
			battle_type: <input type="text" name="battle_type" value="'.$row['battle_type'].'"><br>
			level: <input type="text" name="level" value="'.$row['level'].'"><br>
			ai_flag: <input type="text" name="ai_flag" value="'.$row['ai_flag'].'"><br>
			mount_capacity: <input type="text" name="mount_capacity" value="'.$row['mount_capacity'].'"><br>
			setRaceFlag: <input type="text" name="setRaceFlag" value="'.$row['setRaceFlag'].'"><br>
			setImmuneFlag: <input type="text" name="setImmuneFlag" value="'.$row['setImmuneFlag'].'"><br>
			empire: <input type="text" name="empire" value="'.$row['empire'].'"><br>
			folder: <input type="text" name="folder" value="'.$row['folder'].'"><br>
			on_click: <input type="text" name="on_click" value="'.$row['on_click'].'"><br>
			st: <input type="text" name="st" value="'.$row['st'].'"><br>
			dx: <input type="text" name="dx" value="'.$row['dx'].'"><br>
			ht: <input type="text" name="ht" value="'.$row['ht'].'"><br>
			iq: <input type="text" name="iq" value="'.$row['iq'].'"><br>
			damage_min: <input type="text" name="damage_min" value="'.$row['damage_min'].'"><br>
			damage_max: <input type="text" name="damage_max" value="'.$row['damage_max'].'"><br>
			max_hp: <input type="text" name="max_hp" value="'.$row['max_hp'].'"><br>
			regen_cycle: <input type="text" name="regen_cycle" value="'.$row['regen_cycle'].'"><br>
			regen_percent: <input type="text" name="regen_percent" value="'.$row['regen_percent'].'"><br>
			gold_min: <input type="text" name="gold_min" value="'.$row['gold_min'].'"><br>
			gold_max: <input type="text" name="gold_max" value="'.$row['gold_max'].'"><br>
			exp: <input type="text" name="exp" value="'.$row['exp'].'"><br>
			def: <input type="text" name="def" value="'.$row['def'].'"><br>
			attack_speed: <input type="text" name="attack_speed" value="'.$row['attack_speed'].'"><br>
			move_speed: <input type="text" name="move_speed" value="'.$row['move_speed'].'"><br>
			aggressive_hp_pct: <input type="text" name="aggressive_hp_pct" value="'.$row['aggressive_hp_pct'].'"><br>
			aggressive_sight: <input type="text" name="aggressive_sight" value="'.$row['aggressive_sight'].'"><br>
			attack_range: <input type="text" name="attack_range" value="'.$row['attack_range'].'"><br>
			drop_item: <input type="text" name="drop_item" value="'.$row['drop_item'].'"><br>
			resurrection_vnum: <input type="text" name="resurrection_vnum" value="'.$row['resurrection_vnum'].'"><br>
			enchant_curse: <input type="text" name="enchant_curse" value="'.$row['enchant_curse'].'"><br>
			enchant_slow: <input type="text" name="enchant_slow" value="'.$row['enchant_slow'].'"><br>
			enchant_poison: <input type="text" name="enchant_poison" value="'.$row['enchant_poison'].'"><br>
			enchant_stun: <input type="text" name="enchant_stun" value="'.$row['enchant_stun'].'"><br>
			enchant_critical: <input type="text" name="enchant_critical" value="'.$row['enchant_critical'].'"><br>
			enchant_penetrate: <input type="text" name="enchant_penetrate" value="'.$row['enchant_penetrate'].'"><br>
			resist_sword: <input type="text" name="resist_sword" value="'.$row['resist_sword'].'"><br>
			resist_twohand: <input type="text" name="resist_twohand" value="'.$row['resist_twohand'].'"><br>
			resist_dagger: <input type="text" name="resist_dagger" value="'.$row['resist_dagger'].'"><br>
			resist_bell: <input type="text" name="resist_bell" value="'.$row['resist_bell'].'"><br>
			resist_fan: <input type="text" name="resist_fan" value="'.$row['resist_fan'].'"><br>
			resist_bow: <input type="text" name="resist_bow" value="'.$row['resist_bow'].'"><br>
			resist_fire: <input type="text" name="resist_fire" value="'.$row['resist_fire'].'"><br>
			resist_elect: <input type="text" name="resist_elect" value="'.$row['resist_elect'].'"><br>
			resist_magic: <input type="text" name="resist_magic" value="'.$row['resist_magic'].'"><br>
			resist_wind: <input type="text" name="resist_wind" value="'.$row['resist_wind'].'"><br>
			resist_poison: <input type="text" name="resist_poison" value="'.$row['resist_poison'].'"><br>
			dam_multiply: <input type="text" name="dam_multiply" value="'.$row['dam_multiply'].'"><br>
			summon: <input type="text" name="summon" value="'.$row['summon'].'"><br>
			drain_sp: <input type="text" name="drain_sp" value="'.$row['drain_sp'].'"><br>
			mob_color: <input type="text" name="mob_color" value="'.$row['mob_color'].'"><br>
			polymorph_item: <input type="text" name="polymorph_item" value="'.$row['polymorph_item'].'"><br>
			skill_level0: <input type="text" name="skill_level0" value="'.$row['skill_level0'].'"><br>
			skill_vnum0: <input type="text" name="skill_vnum0" value="'.$row['skill_vnum0'].'"><br>
			skill_level1: <input type="text" name="skill_level1" value="'.$row['skill_level1'].'"><br>
			skill_vnum1: <input type="text" name="skill_vnum1" value="'.$row['skill_vnum1'].'"><br>
			skill_level2: <input type="text" name="skill_level2" value="'.$row['skill_level2'].'"><br>
			skill_vnum2: <input type="text" name="skill_vnum2" value="'.$row['skill_vnum2'].'"><br>
			skill_level3: <input type="text" name="skill_level3" value="'.$row['skill_level3'].'"><br>
			skill_vnum3: <input type="text" name="skill_vnum3" value="'.$row['skill_vnum3'].'"><br>
			skill_level4: <input type="text" name="skill_level4" value="'.$row['skill_level4'].'"><br>
			skill_vnum4: <input type="text" name="skill_vnum4" value="'.$row['skill_vnum4'].'"><br>
			sp_berserk: <input type="text" name="sp_berserk" value="'.$row['sp_berserk'].'"><br>
			sp_stoneskin: <input type="text" name="sp_stoneskin" value="'.$row['sp_stoneskin'].'"><br>
			sp_godspeed: <input type="text" name="sp_godspeed" value="'.$row['sp_godspeed'].'"><br>
			sp_deathblow: <input type="text" name="sp_deathblow" value="'.$row['sp_deathblow'].'"><br>
			sp_revive: <input type="text" name="sp_revive" value="'.$row['sp_revive'].'"><br>
			<input type="submit" name="submit" value="Editar">
		';
	}
}
elseif($_GET['action'] == 'edit'){
	$vnum = mysql_real_escape_string($_POST['vnum']);
	$name = mysql_real_escape_string($_POST['name']);
	$locale_name = mysql_real_escape_string($_POST['locale_name']);
	$rank = mysql_real_escape_string($_POST['rank']);
	$type = mysql_real_escape_string($_POST['type']);
	$battle_type = mysql_real_escape_string($_POST['battle_type']);
	$level = mysql_real_escape_string($_POST['level']);
	$size = mysql_real_escape_string($_POST['size']);
	$ai_flag = mysql_real_escape_string($_POST['ai_flag']);
	$mount_capacity = mysql_real_escape_string($_POST['mount_capacity']);
	$setRaceFlag = mysql_real_escape_string($_POST['setRaceFlag']);
	$setImmuneFlag = mysql_real_escape_string($_POST['setImmuneFlag']);
	$empire = mysql_real_escape_string($_POST['empire']);
	$folder = mysql_real_escape_string($_POST['folder']);
	$on_click = mysql_real_escape_string($_POST['on_click']);
	$st = mysql_real_escape_string($_POST['st']);
	$dx = mysql_real_escape_string($_POST['dx']);
	$ht = mysql_real_escape_string($_POST['ht']);
	$iq = mysql_real_escape_string($_POST['iq']);
	$damage_min = mysql_real_escape_string($_POST['damage_min']);
	$damage_max = mysql_real_escape_string($_POST['damage_max']);
	$max_hp = mysql_real_escape_string($_POST['max_hp']);
	$regen_cycle = mysql_real_escape_string($_POST['regen_cycle']);
	$regen_percent = mysql_real_escape_string($_POST['regen_percent']);
	$gold_min = mysql_real_escape_string($_POST['gold_min']);
	$gold_max = mysql_real_escape_string($_POST['gold_max']);
	$exp = mysql_real_escape_string($_POST['exp']);
	$def = mysql_real_escape_string($_POST['def']);
	$attack_speed = mysql_real_escape_string($_POST['attack_speed']);
	$move_speed = mysql_real_escape_string($_POST['move_speed']);
	$aggressive_hp_pct = mysql_real_escape_string($_POST['aggressive_hp_pct']);
	$aggressive_sight = mysql_real_escape_string($_POST['aggressive_sight']);
	$attack_range = mysql_real_escape_string($_POST['attack_range']);
	$drop_item = mysql_real_escape_string($_POST['drop_item']);
	$resurrection_vnum = mysql_real_escape_string($_POST['resurrection_vnum']);
	$enchant_curse = mysql_real_escape_string($_POST['enchant_curse']);
	$enchant_slow = mysql_real_escape_string($_POST['enchant_slow']);
	$enchant_poison = mysql_real_escape_string($_POST['enchant_poison']);
	$enchant_stun = mysql_real_escape_string($_POST['enchant_stun']);
	$enchant_critical = mysql_real_escape_string($_POST['enchant_critical']);
	$enchant_penetrate = mysql_real_escape_string($_POST['enchant_penetrate']);
	$resist_sword = mysql_real_escape_string($_POST['resist_sword']);
	$resist_twohand = mysql_real_escape_string($_POST['resist_twohand']);
	$resist_dagger = mysql_real_escape_string($_POST['resist_dagger']);
	$resist_bell = mysql_real_escape_string($_POST['resist_bell']);
	$resist_fan = mysql_real_escape_string($_POST['resist_fan']);
	$resist_bow = mysql_real_escape_string($_POST['resist_bow']);
	$resist_fire = mysql_real_escape_string($_POST['resist_fire']);
	$resist_elect = mysql_real_escape_string($_POST['resist_elect']);
	$resist_magic = mysql_real_escape_string($_POST['resist_magic']);
	$resist_wind = mysql_real_escape_string($_POST['resist_wind']);
	$resist_poison = mysql_real_escape_string($_POST['resist_poison']);
	$dam_multiply = mysql_real_escape_string($_POST['dam_multiply']);
	$summon = mysql_real_escape_string($_POST['summon']);
	$drain_sp = mysql_real_escape_string($_POST['drain_sp']);
	$mob_color = mysql_real_escape_string($_POST['mob_color']);
	$polymorph_item = mysql_real_escape_string($_POST['polymorph_item']);
	$skill_level0 = mysql_real_escape_string($_POST['skill_level0']);
	$skill_vnum0 = mysql_real_escape_string($_POST['skill_vnum0']);
	$skill_level1 = mysql_real_escape_string($_POST['skill_level1']);
	$skill_vnum1 = mysql_real_escape_string($_POST['skill_vnum1']);
	$skill_level2 = mysql_real_escape_string($_POST['skill_level2']);
	$skill_vnum2 = mysql_real_escape_string($_POST['skill_vnum2']);
	$skill_level3 = mysql_real_escape_string($_POST['skill_level3']);
	$skill_vnum3 = mysql_real_escape_string($_POST['skill_vnum3']);
	$skill_level4 = mysql_real_escape_string($_POST['skill_level4']);
	$skill_vnum4 = mysql_real_escape_string($_POST['skill_vnum4']);
	$sp_berserk = mysql_real_escape_string($_POST['sp_berserk']);
	$sp_stoneskin = mysql_real_escape_string($_POST['sp_stoneskin']);
	$sp_godspeed = mysql_real_escape_string($_POST['sp_godspeed']);
	$sp_deathblow = mysql_real_escape_string($_POST['sp_deathblow']);
	$sp_revive = mysql_real_escape_string($_POST['sp_revive']);
	$query = mysql_query('UPDATE player.mob_proto SET locale_name = "'.$locale_name.'", rank = "'.$rank.'", type = "'.$type.'", battle_type = "'.$battle_type.'", level = "'.$level.'", size = "'.$size.'", ai_flag = "'.$ai_flag.'", mount_capacity = "'.$mount_capacity.'", setRaceFlag = "'.$setRaceFlag.'", setImmuneFlag = "'.$setImmuneFlag.'", empire = "'.$empire.'", folder = "'.$folder.'", on_click = "'.$on_click.'", st = "'.$st.'", dx = "'.$dx.'", ht = "'.$ht.'", iq = "'.$iq.'", damage_min = "'.$damage_min.'", damage_max = "'.$damage_max.'", max_hp = "'.$max_hp.'", regen_cycle = "'.$regen_cycle.'", regen_percent = "'.$regen_percent.'", gold_min = "'.$gold_min.'", gold_max = "'.$gold_max.'", exp = "'.$exp.'", def = "'.$def.'", attack_speed = "'.$attack_speed.'", move_speed = "'.$move_speed.'", aggressive_hp_pct = "'.$aggressive_hp_pct.'", aggressive_sight = "'.$aggressive_sight.'", attack_range = "'.$attack_range.'", drop_item = "'.$drop_item.'", resurrection_vnum = "'.$resurrection_vnum.'", enchant_curse = "'.$enchant_curse.'", enchant_slow = "'.$enchant_slow.'", enchant_poison = "'.$enchant_poison.'", enchant_stun = "'.$enchant_stun.'", enchant_critical = "'.$enchant_critical.'", enchant_penetrate = "'.$enchant_penetrate.'", resist_sword = "'.$resist_sword.'", resist_twohand = "'.$resist_twohand.'", resist_dagger = "'.$resist_dagger.'", resist_bell = "'.$resist_bell.'", resist_fan = "'.$resist_fan.'", resist_bow = "'.$resist_bow.'", resist_fire = "'.$resist_fire.'", resist_elect = "'.$resist_elect.'", resist_magic = "'.$resist_magic.'", resist_wind = "'.$resist_wind.'", resist_poison = "'.$resist_poison.'", dam_multiply = "'.$dam_multiply.'", summon = "'.$summon.'", drain_sp = "'.$drain_sp.'", mob_color = "'.$mob_color.'", polymorph_item = "'.$polymorph_item.'", skill_level0 = "'.$skill_level0.'", skill_vnum0 = "'.$skill_vnum0.'", skill_level1 = "'.$skill_level1.'", skill_vnum1 = "'.$skill_vnum1.'", skill_level2 = "'.$skill_level2.'", skill_vnum2 = "'.$skill_vnum2.'", skill_level3 = "'.$skill_level3.'", skill_vnum3 = "'.$skill_vnum3.'", skill_level4 = "'.$skill_level4.'", skill_vnum4 = "'.$skill_vnum4.'", sp_berserk = "'.$sp_berserk.'", sp_stoneskin = "'.$sp_stoneskin.'", sp_godspeed = "'.$sp_godspeed.'", sp_deathblow = "'.$sp_deathblow.'", sp_revive = "'.$sp_revive.'" WHERE vnum = "'.$vnum.'"');
	$lang['body'] .= 'Mob Editado con exito.';
}
else{
	$query = mysql_query('SELECT locale_name, vnum FROM player.mob_proto ORDER BY locale_name ASC');
	$lang['body'] .= '<form action="index.php?page=mobproto&action=show" method="post">MOB: <select name="vnum">';
	while($row = mysql_fetch_assoc($query)){
		$lang['body'] .= '<option value="'.$row['vnum'].'">'.$row['locale_name'].'</option>';
	}
	$lang['body'] .= '<input type="submit" name="submit" value="Editar"></select></form>';
}
?>