<?php namespace App\Http\Controllers;

use App\Course;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Paste\Pre;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller for the Homepage or User's Dashboard
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	$router->get('/', 'HomeController@showWelcome');
	|
	*/
    protected $auth;

    protected $user;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
//        $this->user = Auth::user();
        $this->middleware('auth');//, ['except' => 'getLogout']);
        $this->middleware('navbar');//, ['except' => 'getLogout']);
    }

    public function index()
	{
        return view('dashboard.index');
	}
}
