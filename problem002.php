<?php
//write kazua
$num1 = 1;
$num2 = 1;
$result = 0;
$i = 0;
while ($i < 4000000) {
    if ($i % 2 === 0) $result += $i;
    $i = $num1 + $num2;
    $num2 = $num1;
    $num1 = $i;
}
echo $result;
