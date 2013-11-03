<?php
//write kazua

//素数チェック
//$value 素数かどうかをチェックする値
function pc($value) {
    static $p = array();
    if (is_int($value) === false || $value <= 1) return false;
    else if (array_key_exists($value, $p) === true && $p[$value] === true) return true;
    else if (array_key_exists($value, $p) === true && $p[$value] === false) return false;
    $a = range(1, (int) round($value / 2));
    foreach ($a as $v) {
        if ($v !== 1 && $value % $v === 0) {
            $p[$value] = false;
            return false;
        }
    }
    $p[$value] = true;
    return true;
}

//test
$a = range(1, 1000);
$b = array_filter($a, "pc");
sort($b);
foreach ($b as $v)
    echo $v."<br />";
