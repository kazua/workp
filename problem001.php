<?php
//write kazua
$result = 0;
$result = array_sum(array_filter(range(1, 999),
                function ($value) {
                    return (($value % 3 == 0) || ($value % 5 == 0));
                }));
echo $result;
