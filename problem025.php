<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2025
//write kazua
for ($a = array(1 => "1", "1"), $i = 3; strlen($a[$i - 1]) < 1000; $i++)
    $a[$i] = bcadd($a[$i - 2], $a[$i - 1]);

echo ($i - 1);
