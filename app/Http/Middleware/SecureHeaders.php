<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $this->setContentSecurityPolicyHeader($response);
        $this->setPermissionsPolicyHeader($response);
        $this->setReferrerPolicyHeader($response);
        $this->setStrictTransportSecurityHeader($response);
        $this->setXContentTypeOptionsHeader($response);
        $this->setXFrameOptionsHeader($response);
        $this->setXXSSProtectionHeader($response);

        return $response;
    }

    protected function setContentSecurityPolicyHeader(Response $response): void
    {
        // $response->headers->set('Content-Security-Policy', config('headers.content-security-policy'));
    }

    protected function setPermissionsPolicyHeader(Response $response): void
    {
        $response->headers->set('Permissions-Policy', config('headers.permissions-policy'));
    }

    protected function setReferrerPolicyHeader(Response $response): void
    {
        $response->headers->set('Referrer-Policy', config('headers.referrer-policy'));
    }

    protected function setStrictTransportSecurityHeader(Response $response): void
    {
        $response->headers->set('Strict-Transport-Security', config('headers.strict-transport-security'));
    }

    protected function setXContentTypeOptionsHeader(Response $response): void
    {
        $response->headers->set('X-Content-Type-Options', config('headers.x-content-type-options'));
    }

    protected function setXFrameOptionsHeader(Response $response): void
    {
        $response->headers->set('X-Frame-Options', config('headers.x-frame-options'));
    }

    protected function setXXSSProtectionHeader(Response $response): void
    {
        $response->headers->set('X-XSS-Protection', config('headers.x-xss-protection'));
    }
}
