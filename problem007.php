<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%207
//write kazua

$p = array();
$i = 2;

$f = function ($value) {
    global $p;
    $a = range(1, (int) sqrt($value));
    foreach ($a as $v) if ($v !== 1 && $value % $v === 0) return false;
    $p[] = $value;
    return true;
};
while (count($p) < 10001) {
    $f($i);
    $i++;
}
echo end($p);