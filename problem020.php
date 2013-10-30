<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2020
//write kazua
function array_bcproduct($a) {
    $r = "1";
    foreach ($a as $v)
        $r = bcmul($r, $v);
    return $r;
}
echo array_sum(str_split(array_bcproduct(range(1, 100))));