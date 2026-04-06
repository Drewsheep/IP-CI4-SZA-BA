<?php

echo twig_conf()->render('errors/production.twig', [
    'html_title' => 'Hoppá!',
    'html_description' => 'Valami hiba történt.'
]);