<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2097
//write kazua

echo gmp_strval(gmp_mod(gmp_add(gmp_mul("28433", gmp_pow("2", "7830457")), "1"), gmp_pow("10", "10")));