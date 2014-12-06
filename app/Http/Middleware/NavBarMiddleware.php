<?php namespace App\Http\Middleware;

use App\Course;
use App\Course_code;
use App\Subject;
use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Paste\Pre;

class NavBarMiddleware implements Middleware {

	/**
	 * Views to be shared across all views once user is logged in
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $user = Auth::user('id','username');
        view()->share('user', $user);                                    // user information
        view()->share('subject_list', Subject::listing());                   // system subject list
        view()->share('mycourses', Course::userCourses($user->id));    // courses user enrolled in
        view()->share('course_list', Course::course_list());                     // system course list
        view()->share('teachable_courses', Course_code::teachable_courses($user->id)); //courses a user is authorized to teach                    // system course list
        return $next($request);
	}

}