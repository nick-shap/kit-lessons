<?php

namespace App;

class View
{
    public function render(array $data, string $templateName)
    {
        ob_start();
        require './views/' . $templateName . '.php';
        return ob_get_clean();
    }
}