<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Client;

abstract class TestCase extends BaseTestCase
{
    public function actingAsClient(Client $client): static
    {

        $response = $this->postJson(route('passport.token'), [
            'grant_type' => 'client_credentials',
            'client_id' => $client->id,
            'client_secret' => $client->plainSecret,
        ]);

        $access_token = $response->json()['access_token'] ?? '';

        return $this->withHeaders([
            'Authorization' => "Bearer $access_token",
        ]);

    }
}
