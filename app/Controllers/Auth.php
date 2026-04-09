<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function login(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            $redirectTo = session()->get('redirect_after_login');
            session()->remove('redirect_after_login');

            return redirect()->to(is_string($redirectTo) && $redirectTo !== '' ? $redirectTo : '/');
        }

        return $this->renderLoginPage();
    }

    public function attemptLogin(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $login    = trim((string) $this->request->getPost('login'));
        $password = (string) $this->request->getPost('password');

        $identifier = mb_strtolower($login);

        $data = [
            'login'    => $identifier,
            'password' => $password,
        ];

        $rules = [
            'login' => [
                'label' => 'E-mail cím vagy felhasználónév',
                'rules' => 'required|min_length[3]|max_length[191]',
            ],
            'password' => [
                'label' => 'Jelszó',
                'rules' => 'required|min_length[8]|max_length[72]',
            ],
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->renderLoginPage(['login' => $login], $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user      = $userModel
            ->where('email', $identifier)
            ->orWhere('username', $identifier)
            ->first();

        if (! $user || ! password_verify($password, $user['password_hash'])) {
            return $this->renderLoginPage(
                ['login' => $login],
                ['login' => 'Hibás e-mail cím/felhasználónév vagy jelszó.']
            );
        }

        $session = session();
        $session->regenerate(true);
        $session->set([
            'user_id'       => (int) $user['id'],
            'user_name'     => $user['name'],
            'user_username' => $user['username'],
            'user_email'    => $user['email'],
            'is_logged_in'  => true,
        ]);

        $redirectTo = $session->get('redirect_after_login');
        $session->remove('redirect_after_login');

        return redirect()->to(is_string($redirectTo) && $redirectTo !== '' ? $redirectTo : '/');
    }

    public function logout(): RedirectResponse
    {
        $session = session();
        $session->remove(['user_id', 'user_name', 'user_username', 'user_email', 'is_logged_in']);
        $session->regenerate(true);

        return redirect()->to('/login/')->with('success', 'Sikeresen kijelentkeztél.');
    }

    public function register(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        return $this->renderRegisterPage();
    }

    public function storeRegister(): string|RedirectResponse
    {
        if ($this->isLoggedIn()) {
            return redirect()->to('/');
        }

        $data = [
            'name'     => trim((string) $this->request->getPost('name')),
            'username' => mb_strtolower(trim((string) $this->request->getPost('username'))),
            'email'    => mb_strtolower(trim((string) $this->request->getPost('email'))),
            'password' => (string) $this->request->getPost('password'),
        ];

        $rules = [
            'name' => [
                'label' => 'Név',
                'rules' => 'required|min_length[3]|max_length[100]',
            ],
            'username' => [
                'label' => 'Felhasználónév',
                'rules' => 'required|min_length[3]|max_length[30]|alpha_dash|is_unique[users.username]',
            ],
            'email' => [
                'label' => 'E-mail cím',
                'rules' => 'required|valid_email|max_length[191]|is_unique[users.email]',
            ],
            'password' => [
                'label' => 'Jelszó',
                'rules' => 'required|min_length[8]|max_length[72]',
            ],
        ];

        if (! $this->validateData($data, $rules)) {
            return $this->renderRegisterPage($data, $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->insert([
            'name'          => $data['name'],
            'username'      => $data['username'],
            'email'         => $data['email'],
            'password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login/')->with('success', 'Sikeres regisztráció. Most már bejelentkezhetsz.');
    }

    private function renderLoginPage(array $old = [], array $errors = []): string
    {
        return $this->twig->render('templates/login.twig', $this->withAuthData([
            'html_title'       => 'Bejelentkezés',
            'html_description' => 'Jelentkezz be az AnimeDB oldalra.',
            'success'          => session()->getFlashdata('success'),
            'notice'           => session()->getFlashdata('notice'),
            'errors'           => $errors,
            'old'              => [
                'login' => $old['login'] ?? '',
            ],
            'csrf'             => [
                'name' => csrf_token(),
                'hash' => csrf_hash(),
            ],
        ]));
    }

    private function renderRegisterPage(array $old = [], array $errors = []): string
    {
        return $this->twig->render('templates/register.twig', $this->withAuthData([
            'html_title'       => 'Regisztráció',
            'html_description' => 'Hozz létre egy új AnimeDB fiókot.',
            'errors'           => $errors,
            'old'              => [
                'name'     => $old['name'] ?? '',
                'username' => $old['username'] ?? '',
                'email'    => $old['email'] ?? '',
            ],
            'csrf'             => [
                'name' => csrf_token(),
                'hash' => csrf_hash(),
            ],
        ]));
    }

    private function withAuthData(array $data): array
    {
        return array_merge($data, [
            'auth' => [
                'isLoggedIn' => $this->isLoggedIn(),
                'user'       => [
                    'id'       => session()->get('user_id'),
                    'name'     => session()->get('user_name'),
                    'username' => session()->get('user_username'),
                    'email'    => session()->get('user_email'),
                ],
            ],
        ]);
    }

    private function isLoggedIn(): bool
    {
        return session()->get('is_logged_in') === true;
    }
}
