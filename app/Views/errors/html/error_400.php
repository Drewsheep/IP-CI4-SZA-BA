<?php

echo twig_conf()->render('errors/400.twig', [
    'html_title' => '400',
    'html_description' => 'A böngésző olyan kérést küldött, amelyet a szerver nem tud feldolgozni.'
]);