<?php
//array_reduceLeftとarray_reduceRight
//write kazua

//array_reduceLeft
//$a:array 入力の配列
//$f:callback => mixed callback ( mixed &$result , mixed $item )
//$i イニシャル値
function array_reduceLeft(array $a, callable  $f, $i = null) {
    $r = $i;
    foreach ($a as $v) {
        if (isset($r)) $r = $f($r, $v);
        else $r = $v;
    }
    return $r;
}
//array_reduceRight
//$a:array 入力の配列
//$f:callback => mixed callback ( mixed $item , mixed &$result )
//$i イニシャル値
function array_reduceRight(array $a, callable  $f, $i = null) {
    $r = $i;
    foreach (array_reverse($a) as $v) {
        if (isset($r)) $r = $f($v, $r);
        else $r = $v;
    }
    return $r;
}

//test
$a = array(1, 3, 5, 9);
$r = array_reduceLeft($a, function ($r, $i) {
    return $r -= $i;
});
echo $r . "<br />";

$a = array(1, 3, 5, 9);
$r = array_reduceRight($a, function ($i, $r) {
    return $i -= $r;
});
echo $r . "<br />";

$a = array(1, 3, 5, 9);
$r = array_reduceLeft($a, function ($r, $i) {
    return $r -= $i;
},3);
echo $r . "<br />";

$a = array(1, 3, 5, 9);
$r = array_reduceRight($a, function ($i, $r) {
    return $i -= $r;
},3);
echo $r . "<br />";
