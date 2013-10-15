<?php
//write kazua
echo pow(array_sum(range(1, 100)), 2)
        - array_sum(array_map(function ($value) {
                            return pow($value, 2);
                        },
                        range(1, 100)));