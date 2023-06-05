<?php

namespace App;

class View
{
    private $twig;

    public function render($template, $data)
    {
        if (!$this->twig) {
            $loader = new \Twig\Loader\FilesystemLoader(VIEWS_DIR);
            $this->twig = new \Twig\Environment($loader);
        }

        return $this->twig->render($template . 'twig', $data);
    }
}