<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null): ResponseInterface|string|null
    {
        if (session()->get('is_logged_in') === true) {
            return null;
        }

        if ($request->getMethod() === 'GET') {
            $path = trim($request->getUri()->getPath(), '/');
            session()->set('redirect_after_login', $path === '' ? '/' : '/' . $path . '/');
        }

        return redirect()->to('/login/')->with('notice', 'Az oldal megtekintéséhez előbb jelentkezz be.');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null): void
    {
    }
}
