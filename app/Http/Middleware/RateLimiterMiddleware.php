<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RateLimiterMiddleware
{
    protected $limiter ;

    public function __construct(RateLimiter $limiter){
        $this -> limiter = $limiter;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->ip();
        echo $key;
        if($this->limiter->tooManyAttempts($key, 5)){
            return new Response('too Many attemps', 429);
        }
        $this->limiter->hit($key, 60);
        return $next($request);
    }
}
