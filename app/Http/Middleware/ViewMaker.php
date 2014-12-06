<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Auth;

class ViewMaker implements Middleware {

	/**
	 * Makes all generic data for all views after signon
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return views
	 */
	public function handle($request, Closure $next)
	{
    }

}
