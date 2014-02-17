<?php
//write kazua
//世界で闘うプログラマ本1-5 by PHP

//test
$a = new worldproblem1_5();
echo $a->zip("kkkksssllllllllllllssssaaaaaaaaa").PHP_EOL;
echo $a->zip("sssswwwweeeddfffffff").PHP_EOL;
echo $a->zip("aweyerhhhhhhferyerrrrrrr").PHP_EOL;
echo $a->zip("sdfsdfsdgrgegeh").PHP_EOL;

class worldproblem1_5{
	function zip($str){
		$cnt = 1;
		$bf = $str[0];
		$zstr = "";
		for($i =1;$i < strlen($str);$i++){
			if($str[$i] === $bf) $cnt++;
			else{
				$zstr .= $bf.$cnt;
				$bf = $str[$i];
				$cnt = 1;
			}
		}
		if (strlen($str) < strlen($zstr.$bf.$cnt)) return $str;
		else return $zstr.$bf.$cnt;
	}
}