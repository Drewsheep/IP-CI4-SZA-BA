<?php

echo twig_conf()->render('errors/404.twig', [
    'html_title' => '404',
    'html_description' => 'Sajnáljuk, de ez az oldal nem létezik vagy megváltozott.'
]);