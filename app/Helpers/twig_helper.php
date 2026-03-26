<?php

use Config\Paths;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;

if (!function_exists('twig_conf')) {
    function twig_conf() {
        static $twig = null;

        if ($twig !== null) {
            return $twig;
        }

        $appPaths = new Paths();
        $loader = new FilesystemLoader($appPaths->viewDirectory);

        $isDev = ENVIRONMENT === 'development';
        $twig = new Environment($loader, [
            'cache' => WRITEPATH . 'cache/twig',
            'debug' => $isDev,
            'auto_reload' => $isDev
        ]);

        if ($isDev) {
            $twig->addExtension(new DebugExtension());
        }
        
        return $twig;
    }
}