<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_code;
use App\Enrollment;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Paste\Pre;

class EnrollmentController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('navbar');
        // Caching pages enable only for production
//        $this->middleware('cache');
    }

	public function index()
	{
		//
	}

	/**
	 * Show the form for enrolling in a course
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('enrollment.create');
	}

    /** Enrol students
     * @params  course_id
     * @return  course page
     *  1. check if already enrolled
     *  2. get course information from database
     *  3. payment
     *  4. enrol
     */
    public function store(Requests\EnrollmentRequest $request)
	{
        // If already enrolled, send user to the course page with message
        $enrolled =Enrollment::testEnrolled(Auth::user()->id, 6, $request->course_id);
        if ($enrolled) {
            return Redirect::to('/course/show/'.$request->course_id)->with('flash_message', 'Redirected to course page. You are already enrolled in the course as a student.');
        }

        // continue to enrol if user is not enrolled
        try {
            $course = Course::findOrFail($request->course_id);
        }
        catch(exception $e) {
            return Redirect::to('/course')->with('flash_message', 'Could not find course.');
        }

        // Implement payment after p4 goes 'live'
        //$response = PaypalController::postPayment($course);

        if ($course->course_type = 1){
            $next_start_date = date("Y-m-d H:i:s");
            $next_end_date = date('Y-m-d H:i:s', strtotime("+3 months", strtotime($next_start_date)));
        }
        else {
            $next_start_date = $course->start_date;
            $next_end_date = $course->end_date;
        }

        try {
            $enrollment = Enrollment::create(array(
                'user_id' => Auth::user()->id,
                'course_id' => $request->course_id,
                'course_role_id' => 6,
                'payment_type' => 'special - free for now',
                'payment_reference' => '',
                'payment_date' => date("Y-m-d H:i:s"),
                'payment_amount' => $course->cost,
                'invoice_number' =>'tbd',
                'course_start_date' => $next_start_date,
                'course_end_date' => $next_end_date,
                'privacy'=>True,
            ));
        }
        catch(exception $e) {
            return Redirect::to('/course/show/'.$request->course_id)->with('flash_message', 'You are already enrolled in the course with this role.');
        }

        return Redirect::to('/course/show/'.$course->id)
            ->with('flash_message','You have successfully enrolled and now in '.$course->title.' taught by '.$course->creator->username.'.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
