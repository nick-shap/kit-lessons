<?php

function sumNumbers($num1, $num2){
    return $num1 + $num2;
}

function subtractNumbers($num1, $num2){
    return $num1 - $num2;
}

function multiplyNumbers($num1, $num2){
    return $num1 * $num2;
}

function devideNumbers($num1, $num2){
    if ($num2 != 0){
        return $num1 / $num2;
    }
    return "На ноль делить нельзя";

}