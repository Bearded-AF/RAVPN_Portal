<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckReferer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next, $page): Response
 {
     $referer = $request->headers->get('referer');
     if (parse_url($referer, PHP_URL_PATH) !== $page) {
         abort(403, 'Unauthorized action.');
     }
     return $next($request);
 }

}
