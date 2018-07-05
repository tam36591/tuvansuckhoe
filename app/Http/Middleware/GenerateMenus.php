<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('side-menu', function ($menu) {
            $menu->add('Post', 'admin/posts');
            $menu->add('Category', 'admin/categories');
            $menu->add('Tag', 'admin/tags');
            $menu->add('Feedback', 'admin/feedbacks');
            $menu->add('User', 'admin/users');
            $menu->add('Role', 'admin/roles');
        });

        return $next($request);
    }
}
