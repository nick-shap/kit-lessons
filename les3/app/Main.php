<?php

namespace App;

class Main
{
    private object $view;
    private object $request;
    private object $comput;

    public function __construct()
    {
        $this->view = new View();
        $this->request = new Request();
        $this->comput = new Compute();
    }

    public function init()
    {
        $validated = $this->request->validate();

        $calcTotal = $this->comput->calculateResult($validated);
        $sqrtTotal = $this->comput->square($validated);

        $calcData = [...$validated, 'total' => $calcTotal];
        $sqrtData = [...$validated, 'total' => $sqrtTotal];

        $result = $this->view->render($calcData, 'calculator');
        $result .= $this->view->render($sqrtData, 'sqrt');

        echo $result;
    }
}
