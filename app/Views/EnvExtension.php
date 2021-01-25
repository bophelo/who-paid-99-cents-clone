<?php

namespace App\Views;

use Slim\Views\Twig;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class EnvExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('env', [
                $this, 'env'
            ])
        ];
    }

    public function env($key)
    {
        return $_ENV[$key] ?? null;
    }
}