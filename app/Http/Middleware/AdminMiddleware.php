<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use const http\Client\Curl\AUTH_ANY;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */



    public function handle(Request $request, Closure $next)
    {
        //if (!$request->user() || !$request->user()->is_admin) {
        //    return response()->json(['message' => 'Unauthorized. Admins only.'], 403);
        //}
        //return $next($request);

        if (!auth()->check() || !auth()->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Admins only.'
            ], 403);
        }

        return $next($request);
    }}
/*
       if(Auth::check() && Auth::user()->is_admin){
            return $next($request);
        }
        // Jeśli użytkownik nie jest adminem, zwróć odpowiedź JSON z kodem 403
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized. Admins only.'
        ], 403);
       */






