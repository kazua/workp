<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%20112
//write kazua
function ckBouncy($n) {
    if (strspn($n, "0123456789") != strlen($n)) return false;
    $k = $z = $g = str_split($n);
    sort($z);
    rsort($g);
    $r = ($k != $z) && ($k != $g);
    unset($k,$z,$g);
    gc_collect_cycles();
    return $r;
}
function problem112($i = 538, $b = 269) {
    for (; $b / $i * 100 < 99; $i++) if (ckBouncy($i)) $b++;
    return $i;
}

echo problem112();