<?php

// ax + b = 0
function line($a = 0, $b = 0)
{
    if (is_numeric($a) && is_numeric($b)) {
        if ($a != 0) {
            return [
                "x" => -$b / $a
            ];
        }
    } else {
        print_r('Введите числа');
    }
    return [];
}
// ax^2 + bx + c = 0
function square($a = 0, $b = 0, $c = 0)
{
    if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
        if ($a === 0) {
            return line($b, $c);
        } elseif ($a != 0) {
            $D = $b * $b - 4 * $a * $c;
            if ($D < 0) {
                print_r('Нет рациональных корней');
            } else {
                $x1 = (-$b + sqrt($D)) / 2 * $a;
                $x2 = (-$b - sqrt($D)) / 2 * $a;
                return [
                    "x1" => $x1,
                    "x2" => $x2
                ];
            }
        }
    } else {
        print_r('Введите числа');
    }
    return [];
}
// ax^3 + bx^2 + cx + d = 0
function cube($a = 0, $b = 0, $c = 0, $d = 0) {
    if (is_numeric($a) && is_numeric($b) && is_numeric($c) && is_numeric($d)) {
        if ($a === 0) {
            return [(square($b, $c, $d))];
        } elseif ($a != 0) {
            //формула Виета
            $Q = ($a * $a - 3 * $b) / 9;
            $R = (2 * $a * $a * $a - 9 * $a * $b + 27 * $c) / 54;
            $S = $Q * $Q * $Q - $R * $R;


            if ($S > 0) {
                $alpha = 1 / 3 * acos($R / (pow($Q, 3 / 2)));

                $x1 = (-2) * pow($Q, 1 / 2) * cos($alpha) - $a / 3;
                $x2 = (-2) * pow($Q, 1 / 2) * cos($alpha + 2 / 3 * pi()) - $a / 3;
                $x3 = (-2) * pow($Q, 1 / 2) * cos($alpha - 2 / 3 * pi()) - $a / 3;

                return [
                    "x1" => ("$x1 <br/>"),
                    "x2" => ("$x2 <br/>"),
                    "x3" => ("$x3 <br/>"),
                ];
            }

            if ($S < 0) {

                if ($Q > 0) {
                    $alpha = 1 / 3 * acosh(abs($R) / (pow($Q, 3 / 2)));
                    $Re = gmp_sign(settype($R, "integer")) * pow($Q, 1 / 2) * cosh($alpha) - $a / 3;
                    $Im = pow(3, 1 / 2) * pow($Q, 1 / 2) * sinh($alpha);

                    $x1 = (-2) * $Re;

                    return [
                        "x1" => ("$x1 <br/>"),
                        "x2" => ("$Re + i * $Im<br/>"),
                        "x3" => ("$Re - i * $Im<br/>"),
                    ];
                }

                if ($Q < 0) {
                    $alpha = 1 / 3 * asinh(abs($R) / (pow(abs($Q), 3 / 2)));
                    $Re = gmp_sign(settype($R, "integer")) * pow(abs($Q), 1 / 2) * sinh($alpha) - $a / 3;
                    $Im = pow(3, 1 / 2) * pow(abs($Q), 1 / 2) * cosh($alpha);

                    $x1 = (-2) * $Re;

                    return [
                        "x1" => ("$x1 <br/>"),
                        "x2" => ("$Re + i * $Im<br/>"),
                        "x3" => ("$Re - i * $Im<br/>"),
                    ];
                }

                if ($Q = 0) {
                    $x1 = (-1) * pow(($c - ($a * $a * $a / 27)), 1 / 3) - $a / 3;
                    $Re = (-1) * ($a + $x1) / 2;
                    $Im = 1 / 2 * pow(abs(($a - 3 * $x1) * ($a + $x1) - 4 * $b), 1 / 2);


                    return [
                        "x1" => ("$x1 <br/>"),
                        "x2" => ("$Re + i * $Im<br/>"),
                        "x3" => ("$Re - i * $Im<br/>"),
                    ];
                }
            }

            if ($S = 0) {
                $x1 = (-2) * pow($R, 1 / 3) - $a / 3;
                $x2 = pow($R, 1 / 3) - $a / 3;

                return [
                    "x1" => $x1,
                    "x2" => $x2,
                ];
            }
        } else {
            print_r('Введите числа');
        }
        return [];
    }
    return [];
}
print_r(cube(1, 3, -10, -23));