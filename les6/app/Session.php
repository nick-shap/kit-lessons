<?php

namespace App;

class Session
{
    public function init()
    {
        session_start();
    }

    public function destroy()
    {
        session_destroy();
    }
}
