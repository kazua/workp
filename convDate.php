<?php
//write kazua

//JQueryのコントロールを使ったりして2000/12/23等の形式の文字列が渡すように限定するかんじ
function convGtJDate($src) {
    list($year, $month, $day) = explode("/", $src);
    if (!@checkdate($month, $day, $year) || $year < 1869 || strlen($year) !== 4
            || strlen($month) !== 2 || strlen($day) !== 2) return false;
    $date = str_replace("/", "", $src);
    $gengo = "";
    $wayear = 0;
    if ($date >= 19890108) {
        $gengo = "平成";
        $wayear = $year - 1988;
    } elseif ($date >= 19261225) {
        $gengo = "昭和";
        $wayear = $year - 1925;
    } elseif ($date >= 19120730) {
        $gengo = "大正";
        $wayear = $year - 1911;
    } else {
        $gengo = "明治";
        $wayear = $year - 1868;
    }
    switch ($wayear) {
        case 1:
            $wadate = $gengo."元年".$month."月".$day."日";
            break;
        default:
            $wadate = $gengo.sprintf("%02d", $wayear)."年".$month."月".$day."日";
    }
    return $wadate;
}
//test
echo convGtJDate("1981/12/02").PHP_EOL;
echo convGtJDate("1912/07/30").PHP_EOL;
echo convGtJDate("1927/05/16").PHP_EOL;
echo convGtJDate("1890/01/16").PHP_EOL;
var_dump(convGtJDate("1866/01/16"));
var_dump(convGtJDate("1866/01/"));
var_dump(convGtJDate("1890/1/16"));
var_dump(convGtJDate("1981/12/2"));
