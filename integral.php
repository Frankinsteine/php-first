<?php

function integral($f = null, $x1 = 0, $x2 = 0) {
    $eps = 0.01;
    $result = 0;
    eval("\$f = function (\$x = 0) { return {$f}; };");
    for ($i = $x1; $i <= $x2; $i+= $eps) {
        $result += $eps * (abs($f($i)) + abs($f($i + $eps))) / 2;
    }
    return $result;
}

function calcVolume($f = null, $a = 0, $b = 0) {
    $eps = 0.001;
    $S = 0;
    eval("\$ff = function(\$x = 0) { return {$f}; };");
    for ($i = $a; $i < $b; $i += $eps) {
        $S += $eps * $f($i)**2 * pi();
    }
    return $S;
}


