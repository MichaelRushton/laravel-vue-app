<?php

declare(strict_types=1);

use Laravel\Passport\Client;

test('must be authenticated', function () {

    $this->getJson(route('api.v1.up'))
        ->assertUnauthorized();

});

test('success', function () {

    $this->actingAsClient(Client::factory()->asClientCredentials()->create())
        ->getJson(route('api.v1.up'))
        ->assertOk();

});
