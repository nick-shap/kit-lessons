<?php

namespace App;

class Request
{
    public function validate():array
    {
        $result = [];

        foreach ($_POST as $key => $value)
        {
            $result[$key] = is_numeric($value) ? intval($value) : htmlspecialchars($value);
        }

        return $result;
    }
}
