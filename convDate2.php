<?php
//write kazua

function convGtJDate($src) {
    list($year, $month, $day) = explode('/', $src);
    if (!@checkdate($month, $day, $year) || $year < 1869 || strlen($year) !== 4
            || strlen($month) !== 2 || strlen($day) !== 2) return false;
    $date = str_replace('/', '', $src);
    if ($date >= 19890108) {
        $gengo = '平成';
        $wayear = $year - 1988;
    } elseif ($date >= 19261225) {
        $gengo = '昭和';
        $wayear = $year - 1925;
    } elseif ($date >= 19120730) {
        $gengo = '大正';
        $wayear = $year - 1911;
    } else {
        $gengo = '明治';
        $wayear = $year - 1868;
    }
    switch ($wayear) {
        case 1:
            $wadate = $gengo.'元年'.$month.'月'.$day.'日';
            break;
        default:
            $wadate = $gengo.sprintf("%02d", $wayear).'年'.$month.'月'.$day.'日';
    }
    return $wadate;
}

function convJtGDate($src) {
    $a = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
    $g = mb_substr($src, 0, 2, 'UTF-8');
    array_unshift($a, $g);
    if (($g !== '明治' && $g !== '大正' && $g !== '昭和' && $g !== '平成')
            || (str_replace($a, '', $src) !== '年月日' && str_replace($a, '', $src) !== '元年月日')) return false;
    $y = strtok(str_replace($g, '', $src), '年月日');
    $m = strtok('年月日');
    $d = strtok('年月日');
    if (mb_strpos($src, '元年') !== false) $y = 1;
    if ($g === '平成') $y += 1988;
    elseif ($g === '昭和') $y += 1925;
    elseif ($g === '大正') $y += 1911;
    elseif ($g === '明治') $y += 1868;
    if (strlen($y) !== 4 || strlen($m) !== 2 || strlen($d) !== 2 || !@checkdate($m, $d, $y)) return false;
    return $y.'/'.$m.'/'.$d;
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
echo convJtGDate("昭和56年12月02日").PHP_EOL;
echo convJtGDate("大正元年07月30日").PHP_EOL;
echo convJtGDate("昭和02年05月16日").PHP_EOL;
echo convJtGDate("明治22年01月16日").PHP_EOL;
var_dump(convJtGDate("昭和56年12月32日"));
var_dump(convJtGDate("平成12年11月2日"));
var_dump(convJtGDate("嘉永元年1月6日"));
var_dump(convJtGDate("明治11年11年11日"));
