<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Paste\Pre;

class CacheMiddleware implements Middleware {

	/**
     * Middleware that retrieves from and save to cache
	 */

	public function handle($request, Closure $next)
	{
        // performs a check on the cache for the page before executing method in controller
		$key = $this->makeCacheKey($request->url());
        if (Cache::has($key)) return Cache::get($key);

        $response = $next($request);

        // after controller execution, save the page to cache
        if (!Cache::has($key)) Cache::put($key, $response.ob_get_contents(), 60);
        return $response;
    }

    protected function makeCacheKey($url){
        return 'route_'.Str::slug($url);
    }
}