<?php

namespace App;

class Compute
{
    public static function calculateResult($data):float|string
    {
        if (empty($data)) {
            return 0.0;
        }

        if ($data["second_num"] == 0 && $data["sign"] == "/") {
            return "На ноль делить нельзя";
        }

        $result = "return $data[first_num] $data[sign] $data[second_num];";

        return eval($result);
    }

    public static function square($data):float
    {
        if(empty($data)){
            return 0.0;
        }

        return $data["num"] * $data["num"];
    }
}
