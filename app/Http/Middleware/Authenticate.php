<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('/h4l4m4nl0g1nR4m4Y4n4');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        // $this->authenticate($request, $guards);
        if (!$request->session()->has('LoginSession')) {
            return redirect('/error');
        }

        return $next($request);
    }
}
