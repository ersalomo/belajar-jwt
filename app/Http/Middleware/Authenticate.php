<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->routeIs('home.*')) {
                session()->flash('fail', 'you must login first');
                $returnUrl = URL::full();
                return route('auth', [
                    'fail' => true,
                    'returnUrl' => $returnUrl,
                ]);
            }
            if ($request->routeIs('admin.*')) {
                session()->flash('fail', 'you must login first');
                $returnUrl = URL::full();
                return route('admin-auth.index', [
                    'fail' => true,
                    'returnUrl' => $returnUrl,
                ]);
            }
        }
    }
}
