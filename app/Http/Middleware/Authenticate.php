<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Redirect the user if they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Jika permintaan adalah request JSON, maka tidak ada redirect
        if ($request->expectsJson()) {
            return null;
        }

        // Jika bukan request JSON, arahkan ke halaman login
        return route('login');
    }
}
