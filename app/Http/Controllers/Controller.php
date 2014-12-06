<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Auth\Guard;

abstract class Controller extends BaseController {

	use ValidatesRequests;

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth', ['except' => 'login']);
    }
}
