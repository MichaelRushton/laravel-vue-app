<?php

declare(strict_types=1);

use App\Models\SignIn;

test('delete sign ins before date', function () {

    SignIn::factory(5)->create();

    $this->travel($days = 365 + 1)->days();

    SignIn::factory(10)->create();

    $this->artisan('sign-ins:delete --before="'.today()->subDays($days - 1).'"');

    expect(SignIn::count())
        ->toBe(10);

});
