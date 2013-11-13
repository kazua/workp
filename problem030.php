<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2030
//write kazua
for ($i = 2; $i < pow(9, 5) * 5; $i++)
    if (array_sum(
            array_map(
                    function ($value) {
                        return pow($value, 5);
                    }, str_split($i))) === $i)
        $a[] = $i;

echo array_sum($a);