<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_code;
use App\Course_type;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Paste\Pre;

class CourseCodeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('navbar');
        // Caching pages enable only for production
//        $this->middleware('cache');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $course_code_list = Course_code::course_code_list();
        return view('course_code.index', compact('course_code_list'));
	}

    /**
     * Show the form for creating a new course.
     *
     * @return Response
     */
    public function create()
    {
        $course_types = Course_type::listing();
        return view('course_code.create', compact('course_types'));
    }

    /**
	 * Store a newly created course_code in storage.
	 *
	 * @return Response message
	 */
	public function store(CreateCourseRequest $request)
	{
        $response = Course_code::proposeCourse($request);
        return view('course_code.index', compact('response'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $course_code_courselist = Course::course_code_courselist($id);
        //$course_code_courselist = Course::whereCourse_code_id($id)->with('creator')->with('course_code')->get();
        return view('course_code.show', compact('course_code_courselist'));
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
