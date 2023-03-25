<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse as LaravelAddQueuedCookiesToResponse;
use Illuminate\Contracts\Cookie\QueueingFactory as CookieJar;

class AddQueuedCookiesToResponse extends LaravelAddQueuedCookiesToResponse
{
    public function __construct(CookieJar $cookies)
    {
        parent::__construct($cookies);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->cookie('consent') == null) {
            return $next($request);
        }
        return parent::handle($request, $next);
    }
}
