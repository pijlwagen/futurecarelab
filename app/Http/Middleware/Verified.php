<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Verified
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!Auth::user()->isVerified()) {
            session()->flash('danger', 'Uw account is nog niet geverifieerd.');
            return redirect(route('home'));
        }

        return $response;
    }
}
