<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!Auth::check()) {
            session()->flash('danger', 'U moet ingelogd zijn om deze actie uit te voeren.');
            return redirect(route('home'));
        }

        if (!Auth::user()->isAdmin()) {
            session()->flash('danger', 'U heeft niet genoeg rechten om deze actie uit te voeren.');
            return redirect(route('home'));
        }

        return $response;
    }
}
