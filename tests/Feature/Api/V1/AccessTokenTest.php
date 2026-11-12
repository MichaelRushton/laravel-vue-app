<?php

declare(strict_types=1);

use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Passport\Client;

test('fail', function () {

    $this->postJson(route('passport.token'), [
        'grant_type' => 'client_credentials',
        'client_id' => 'test',
        'client_secret' => 'test',
    ])
        ->assertUnauthorized();

});

test('success', function () {

    $client = Client::factory()->asClientCredentials()->create();

    $this->postJson(route('passport.token'), [
        'grant_type' => 'client_credentials',
        'client_id' => $client->id,
        'client_secret' => $client->plainSecret,
    ])
        ->assertOk()
        ->assertJson(fn (AssertableJson $json) => $json->where('token_type', 'Bearer')
            ->has('access_token')
            ->etc()
        );

});
