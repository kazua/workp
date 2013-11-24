<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%208
//write kazua

function problem008() {
    for ($a = 1; $a < 1000; $a++)
        for ($b = 1; $b < 1000 - $a; $b++)
            if (pow($a, 2) + pow($b, 2) == pow(1000 - $a - $b, 2))
                return ($a * $b * (1000 - $a - $b));
}

echo problem008();