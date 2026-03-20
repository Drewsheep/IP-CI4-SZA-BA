<?php
declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SecureHeaders implements FilterInterface
{
    protected $headers = [
        'Referrer-Policy' => 'strict-origin-when-cross-origin',
        'X-Content-Type-Options' => 'nosniff',
        'X-Frame-Options' => 'DENY',
        'X-Download-Options' => 'noopen',
        'X-Permitted-Cross-Domain-Policies' => 'none',
        'X-XSS-Protection' => '0'
    ];

    protected $removeHeaders = [
        'X-Powered-By'
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        foreach ($this->headers as $header => $value) {
            $response->setHeader($header, $value);
        }

        foreach ($this->removeHeaders as $header) {
            header_remove($header);
        }

        return $response;
    }
}