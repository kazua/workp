<?php
//write kazua
//剰余を使わずにFizzBuzz

$f = function ($n) {
    $a = array(null, null, null, Fizz, null, Buzz, Fizz, null, null, Fizz,
            Buzz, null, Fizz, null, null, FizzBuzz);
    $r = $a[$n - 15 * (int) ($n / 16)];
    if (isset($r)) echo $r."<br />";
    else echo $n."<br />";
};
array_walk(range(1, 100), $f);