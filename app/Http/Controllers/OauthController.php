<?php namespace App\Http\Controllers;

use App\Follow;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\OAuth\Facades\OAuth;
use Paste\Pre;
use Symfony\Component\Console\Input\Input;

class OauthController extends Controller {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'logout']);
	}

    /**
     * Login user with facebook
     *
     * @return void
     */

    public function FacebookLogin() {
        // get fb service
        $fb = OAuth::consumer( 'facebook' );
         // get data from input
        $code = \Illuminate\Support\Facades\Input::get('code' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );
            // Retrieve user from database or create a new user from Facebook account
            try{
                $user = User::firstOrCreate([
                    'username' => $result['name'], 'email'=>$result['email'],
                    'image'=> "https://graph.facebook.com/".$result['id'].'/picture?type=large']);
            }
            catch (exception $e){
                return Redirect::back()->with('flash_message','Your email address is not verified by the authentication method you selected. You likely have forgotten to click on a "verify email address" link that Google or Facebook should have sent you during your subscribtion to their service.');
            }

            // Login user and then redirect
            $this->auth->login($user);
            return Redirect::intended('/');
        }

        // if not ask for permission first
        else {
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
            return Redirect::to( (string)$url );
        }
    }
}
