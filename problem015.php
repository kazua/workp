<?php
//write kazua
$n = 20;
echo array_product(range(1, 2 * $n)) / pow(array_product(range(1, $n)), 2);