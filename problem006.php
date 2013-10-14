<?php
//write kazua
for ($i = 1; $i <= 100; $i++) {
    $a1 += pow($i, 2);
    $a2 += $i;
}
$result = pow($a2, 2) - $a1;
echo $result;