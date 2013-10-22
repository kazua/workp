<?php
//array_scanLeftとarray_scanRight
//write kazua

//$a array
//$f callback
//$i initial

function array_scanLeft($a, $f, $i) {
    $r = array($i);
    foreach ($a as $v)
        array_push($r, $f($r[sizeof($r) - 1], $v));
    return $r;
}

function array_scanRight($a, $f, $i) {
    $r = array($i);
    foreach (array_reverse($a) as $v)
        array_unshift($r, $f($v, $r[0]));
    return $r;
}
//test
var_dump(array_scanLeft(range(1, 3), function ($z, $n) {
    return $z - $n;
}, 100));
var_dump(array_scanRight(range(1, 3), function ($n, $z) {
    return $n - $z;
}, 100));
