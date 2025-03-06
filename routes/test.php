<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-session', function () {
    session(['test_key' => 'test_value']);
    return 'Session value set!';
});
