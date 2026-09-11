<?php

declare(strict_types=1);

return [
    'content-security-policy' => env('HTTP_HEADER_CONTENT_SECURITY_POLICY', "default-src 'self'"),
    'permissions-policy' => env('HTTP_HEADER_PERMISSIONS_POLICY', 'camera=(), microphone=(), geolocation=()'),
    'referrer-policy' => env('HTTP_HEADER_REFERRER_POLICY', 'strict-origin-when-cross-origin'),
    'strict-transport-security' => env('HTTP_HEADER_STRICT_TRANSPORT_SECURITY', 'max-age=31536000; includeSubDomains; preload'),
    'x-content-type-options' => env('HTTP_HEADER_X_CONTENT_TYPE_OPTIONS', 'nosniff'),
    'x-frame-options' => env('HTTP_HEADER_X_FRAME_OPTIONS', 'DENY'),
    'x-xss-protection' => env('HTTP_HEADER_X_XSS_PROTECTION', '1; mode=block'),
];
