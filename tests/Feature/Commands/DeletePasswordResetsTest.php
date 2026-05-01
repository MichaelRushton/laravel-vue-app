<?php

declare(strict_types=1);

use App\Models\PasswordReset;

test('delete password resets before date', function () {

    PasswordReset::factory(5)->create();

    $this->travel($days = 365 + 11)->days();

    PasswordReset::factory(10)->create();

    $this->artisan('password-resets:delete --before="'.today()->subDays($days - 1).'"');

    expect(PasswordReset::count())
        ->toBe(10);

});
