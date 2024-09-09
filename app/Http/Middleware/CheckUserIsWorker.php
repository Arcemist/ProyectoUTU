<?php

namespace App\Http\Middleware;

use App\Enums\UserType;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIsWorker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(Auth::user()->Type() == UserType::TRABAJADOR->value)) {
            return response(null);
        }

        return $next($request);
    }
}
