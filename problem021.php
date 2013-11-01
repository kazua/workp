<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2021
//write kazua
$y = array();

$f = function($num) {
    global $y;
    $d = array();
    for ($i = 1; $i <= $num / 2; $i++) if ($num % $i == 0) $d[] = $i;
    $y[$num] = array_sum($d);
};

$r = 0;
for ($i = 1; $i <= 10000; $i++) $f($i);
foreach ($y as $k => $v) if (array_key_exists($v, $y) && $y[$v] == $k && $v != $k) $r += $k;
echo $r;
