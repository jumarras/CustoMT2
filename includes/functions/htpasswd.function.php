<?php
function crypt_apr1_md5($plainpasswd,$salt=null) {  
	$tmp = "";
	if ($salt == null) $salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
	$len = strlen($plainpasswd);
	$text = $plainpasswd.'$apr1$'.$salt;
	$bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
	for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
	for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
	$bin = pack("H32", md5($text));
	for($i = 0; $i < 1000; $i++) {
	  $new = ($i & 1) ? $plainpasswd : $bin;
	  if ($i % 3) $new .= $salt;
	  if ($i % 7) $new .= $plainpasswd;
	  $new .= ($i & 1) ? $bin : $plainpasswd;
	  $bin = pack("H32", md5($new));
	}
	for ($i = 0; $i < 5; $i++) {
	  $k = $i + 6;
	  $j = $i + 12;
	  if ($j == 16) $j = 5;
	  $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
	}
	$tmp = chr(0).chr(0).$bin[11].$tmp;
	$tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
	"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
	"./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
	return "$"."apr1"."$".$salt."$".$tmp;
}

function htpasswdadd($user, $pass){
	$salt = substr($salt, 0, 8);
	if (!$handle = fopen('.htpasswd', 'a'))
		return 'No se puede abrir el archivo';
	if (fwrite($handle, $user.':'.crypt_apr1_md5($pass, $salt)."\n") === FALSE)
		return 'No se puede abrir el archivo';
	fclose($handle);
}

function htpasswddelete($user){
	$file = file_get_contents('.htpasswd');
	$file = explode("\n", $file);
	$count = count($file) - 1;
	if($count > 1){
		unlink('.htpasswd');
		if (!$handle = fopen('.htpasswd', 'a'))
			return 'No se puede abrir el archivo';
		for($i = 0; $i <= $count; $i++){
			$userlist = explode(':', $file[$i]);
			if($user != $userlist[0] && $userlist[0] != ''){
				if (fwrite($handle, $userlist[0].':'.$userlist[1]."\n") === FALSE)
					return 'No se puede abrir el archivo';
			}
		}
		fclose($handle);
	}
	else
		return 'Solo tienes un usuario, crea uno nuevo y borra el antiguo.';
}

function htpasswdupdate($user, $pass){
	$salt = substr($salt, 0, 8);
	$file = file_get_contents('.htpasswd');
	$file = explode("\n", $file);
	$count = count($file) - 1;
	unlink('.htpasswd');
	if (!$handle = fopen('.htpasswd', 'a'))
		return 'No se puede abrir el archivo';
	for($i = 0; $i <= $count; $i++){
		$userlist = explode(':', $file[$i]);
		if($user == $userlist[0]){
			if (fwrite($handle, $userlist[0].':'.crypt_apr1_md5($pass, $salt)."\n") === FALSE)
				return 'No se puede abrir el archivo';
		}
		else{
			if($userlist[0] != ''){
				if (fwrite($handle, $userlist[0].':'.$userlist[1]."\n") === FALSE)
					return 'No se puede abrir el archivo';
			}
		}
	}
	fclose($handle);
	return 'Contraseña editada correctamente.';
}

function htpasswdshow(){
	$file = file_get_contents('.htpasswd');
	$file = explode("\n", $file);
	$count = count($file) - 1;
	for($i = 0; $i <= $count; $i++){
		$userlist = explode(':', $file[$i]);
		if($userlist[0] != '')
			$list .= $userlist[0].'/';
	}
	return $list;
}
?>