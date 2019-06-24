<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Blockade
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            if (Auth::user()->isBlocked()) {
                session()->flash('info', 'Dit account is geblokkeerd.');
                return redirect('/');
            }
        }

        return $response;
    }
}
