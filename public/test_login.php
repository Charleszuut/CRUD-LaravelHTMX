<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

require __DIR__.'/../bootstrap/app.php';

$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Request::create('/login', 'POST', [
    'email' => 'rek@gmail.com',
    'password' => '12345678',
]);

$response = $kernel->handle($request);
$kernel->terminate($request, $response);

if (Auth::check()) {
    echo 'User is authenticated: ' . Auth::user()->email;
} else {
    echo 'Authentication failed.';
}
