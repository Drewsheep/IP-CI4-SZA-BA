<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index(): string
    {
        return $this->twig->render('templates/account.twig', [
            'html_title'       => 'Fiókom',
            'html_description' => 'A bejelentkezett fiókod áttekintő oldala.',
            'auth'             => [
                'isLoggedIn' => session()->get('is_logged_in') === true,
                'user'       => [
                    'id'       => session()->get('user_id'),
                    'name'     => session()->get('user_name'),
                    'username' => session()->get('user_username'),
                    'email'    => session()->get('user_email'),
                ],
            ],
        ]);
    }
}
