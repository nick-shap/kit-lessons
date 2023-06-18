<?php
namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    private $twig;

    public function render($template, $data): string
    {
        if (!$this->twig) {
            $loader = new FilesystemLoader(VIEWS_DIR);
            $this->twig = new Environment($loader);
            $this->twig->addGlobal('appUrl', APP_URL);
        }

        return $this->twig->render($template.'.twig', $data);
    }
}
