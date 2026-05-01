<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schedule;

Schedule::command('users:delete-revisions', ['--before' => today()->subDays(365)])->daily();
Schedule::command('users:delete-impersonations', ['--before' => today()->subDays(365)])->daily();
Schedule::command('sign-ins:delete', ['--before' => today()->subDays(365)])->daily();
Schedule::command('password-resets:delete', ['--before' => today()->subDays(365)])->daily();
