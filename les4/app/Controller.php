<?php

namespace App;

class Controller
{
    public function homeAction()
    {
        return View::render([], 'home');
    }

    public function notFoundAction()
    {
        return View::render([], '404');
    }
    public function calcAction(Request $request)
    {
        $validated = $request->validate();
        $total = Compute::calculateResult($validated);
        $data = [...$validated, 'total' => $total];
        return View::render($data, 'calculator');
    }
    public function squareAction(Request $request)
    {
        $validated = $request->validate();
        $total = Compute::square($validated);
        $data = [...$validated, 'total' => $total];
        return View::render($data, 'sqrt');
    }
}