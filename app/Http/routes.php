<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// Get Home
$router->get('/', ['as' => 'home', 'uses' => 'CourseCodeController@index'] );
$router->get('/500', function(){ return \Illuminate\Support\Facades\View::make('_500');});
/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
*/

$router->controller('auth', 'AuthController');

$router->controller('password', 'PasswordController');
$router->resource('enrollment', 'EnrollmentController');
$router->resource('course_code', 'CourseCodeController');
$router->controller('course', 'CourseController');
$router->resource('subject', 'SubjectController');


// functions for course_sections
$router->post('/section/notes_order', 'SectionController@notes_order');
$router->resource('section', 'SectionController');

// extra functions for note controller
$router->get('/note/{id}/duplicate', 'NoteController@duplicate');
$router->post('/note/position', 'NoteController@postPosition');
$router->post('/note/{id}/delete', 'NoteController@destroy');
$router->resource('note', 'NoteController');

$router->get('/fblogin', 'OauthController@FacebookLogin');



$router->get('switches', ['middleware' => 'navbar', function()
{
    return view('switches');
}]);
// testing
$router->get('/switches', function() {
    return View::make('switches');
});


//Paypay payment
Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus',
));