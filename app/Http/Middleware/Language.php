<?php
/**
 * Created by PhpStorm.
 * User: minhphuc429
 * Date: 6/15/18
 * Time: 16:33
 */

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale'))
            app()->setLocale(session('locale'));
        app()->setLocale(config('app.locale'));

        return $next($request);
    }
}
