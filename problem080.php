<?php
//http://odz.sakura.ne.jp/projecteuler/index.php?cmd=read&page=Problem%2080
//write kazua
echo
    array_sum(
        array_map(
            function ($value) {
                return
                    array_sum(
                        str_split(
                            substr(
                                str_replace(".", "", ((string) $value)),
                                0,
                                100)
                            )
                        );
            },
            array_filter(
                array_map(
                    function ($value) {
                        return bcsqrt($value, 100);
                    },
                    range(1, 100)
                ),
                function ($value) {
                    return (int) $value != (double) $value;
                }
            )
        )
    );
