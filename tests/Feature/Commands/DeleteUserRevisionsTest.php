<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\UserRevision;

test('delete user revisions before date', function () {

    User::factory(5)->create();

    $this->travel($days = 365 + 11)->days();

    User::factory(10)->create();

    $this->artisan('users:delete-revisions --before="'.today()->subDays($days - 1).'"');

    expect(UserRevision::count())
        ->toBe(10);

});
