<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Category::all()->count() === 0) {
            session()->flash('error', 'Categories found : 0. You need to have atleast 1 category created.');
            return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
