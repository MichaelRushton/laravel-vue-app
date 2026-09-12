<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;
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

        return $response;
    }

    protected function setContentSecurityPolicyHeader(Response $response): void
    {

        if (app()->environment('local') && file_exists(base_path('/public/hot'))) {
            return;
        }

        $nonce = Vite::cspNonce();

        $response->headers->set('Content-Security-Policy', implode('; ', [
            "default-src 'self'",
            "style-src 'self' 'nonce-$nonce'",
        ]));

    }

    protected function setPermissionsPolicyHeader(Response $response): void
    {
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');
    }

    protected function setReferrerPolicyHeader(Response $response): void
    {
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    protected function setStrictTransportSecurityHeader(Response $response): void
    {
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');
    }

    protected function setXContentTypeOptionsHeader(Response $response): void
    {
        $response->headers->set('X-Content-Type-Options', 'nosniff');
    }

    protected function setXFrameOptionsHeader(Response $response): void
    {
        $response->headers->set('X-Frame-Options', 'DENY');
    }
}
