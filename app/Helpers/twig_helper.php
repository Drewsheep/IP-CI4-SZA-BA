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

        if (!function_exists('langFilter')) {
            function langFilter(string $file, string $key, array $params = []) {
                if (!str_contains($key, '.')) {
                    $key = $file . '.' . $key;
                }
                return lang($key, $params);
            }
        }

        $langFilters = [
            't' => 'Lang'
        ];

        foreach ($langFilters as $filter => $file) {
            $twig->addFilter(new TwigFilter($filter, function ($key, $params = []) use ($file) {
                return langFilter($file, $key, $params);
            }));
        }


        $twig->addFunction(new TwigFunction('asset', function ($path) {
            $path = ltrim($path, '/');
            $fullPath = FCPATH . $path;

            if (file_exists($fullPath)) {
                $version = filemtime($fullPath);
            } else {
                $version = time();
            }

            return '/' . $path . '?v=' . $version;
        }));

        $twig->addFunction(new TwigFunction('current_url', fn() => current_url()));
        
        return $twig;
    }
}