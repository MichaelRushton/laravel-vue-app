<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Middleware\EnsureClientIsResourceOwner;

Route::prefix('v1')
    ->name('api.v1.')
    ->middleware(EnsureClientIsResourceOwner::class)
    ->group(base_path('routes/api/v1.php'));
