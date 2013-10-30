<?php
//array_bcproduct
//write kazua

//$a array
function array_bcproduct($a) {
    $r = "1";
    foreach ($a as $v)
        $r = bcmul($r, $v);
    return $r;
}

//test
var_dump(array_product(range(1, 100)));
echo "<br />";
var_dump(array_bcproduct(range(1, 100)));
echo "<br />";
var_dump(array_product(array()));
echo "<br />";
var_dump(array_bcproduct(array()));
