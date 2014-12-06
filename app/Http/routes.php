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
$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index'] );
// Logout with a closure
//$router->get('/logout', function(){
//    \Illuminate\Support\Facades\Auth::logout();
//    echo "Logged out";
//    return redirect('/');
//});

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
