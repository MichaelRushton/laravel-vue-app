<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use Laravel\Passport\Client;

class GetClientFromBearerToken
{
    public function handle(string $bearer_token): ?Client
    {

        if (! $decoded = base64_decode(explode('.', $bearer_token)[1] ?? '')) {
            return null;
        }

        return Client::find(json_decode($decoded, false)?->sub);

    }
}
