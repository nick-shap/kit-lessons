<?php

class Calculator{

    function __construct(){
        $data = $this->getData();
        $result = $this->calculateResult($data);
        echo $this->showTemplate($data, $result);
    }

    private function calculateResult($data){
        if ($data["num2"] == 0 && $data["sign"] == "/"){
            return "На ноль делить нельзя";
        }

        $result = "return $data[num1] $data[sign] $data[num2];";

        return eval($result);
    }

    private function showTemplate($data, $result){
        ob_start();
        include "view.php";
        return ob_get_clean();
    }

    private function getData(){
        return [
            "num1" => isset($_POST["first_num"]) ? intval($_POST["first_num"]) : 0,
            "num2" => isset($_POST["second_num"]) ? intval($_POST["second_num"]) : 0,
            "sign" => $_POST["sign"] ?? "+",
        ];
    }

}