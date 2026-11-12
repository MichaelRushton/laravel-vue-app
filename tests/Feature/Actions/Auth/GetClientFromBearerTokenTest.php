<?php

declare(strict_types=1);

use App\Actions\Auth\GetClientFromBearerToken;
use Illuminate\Support\Str;
use Laravel\Passport\Client;

test('returns null if not valid jwt', function () {

    expect(new GetClientFromBearerToken()->handle(''))
        ->toBeNull();

});

test('returns null if unknown client', function () {

    $uuid = Str::uuid();

    $bearer_token = base64_encode('{}').'.'.base64_encode("{\"sub\":\"$uuid\"}");

    expect(new GetClientFromBearerToken()->handle($bearer_token))
        ->toBeNull();

});

test('returns client if known', function () {

    $client1 = Client::factory()->asClientCredentials()->create();

    $bearer_token = base64_encode('{}').'.'.base64_encode("{\"sub\":\"$client1->id\"}");

    expect($client2 = new GetClientFromBearerToken()->handle($bearer_token))
        ->toBeInstanceOf(Client::class);

    expect($client2->id)
        ->toBe($client1->id);

});
