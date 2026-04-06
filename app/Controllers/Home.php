<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->twig->render('home.twig', [
            'html_title' => 'Főoldal',
            'html_description' => 'Nézz körül az animék széles választékában, itt mindent megtalálsz!'
        ]);
    }
}