<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2063
//write kazua
$a = array_sum(
         array_map(
             function ($value) {
                 if (log(10 / $value) != 0) $r = (int) (log(10) / log(10 / $value));
                 else $r = 0;
                 return $r;
             },
             range(1, 10)
         )
     );
echo $a;