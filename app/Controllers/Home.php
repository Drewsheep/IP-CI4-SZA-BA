<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->twig->render('home.twig', [
            'html_title' => 'Animék, filmek, sorozatok',
            'html_description' => 'Animék tárháza'
        ]);
    }
}