<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_section_note;
use App\Note_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Paste\Pre;

class CourseController extends Controller {

    protected $user;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('navbar');
        // Caching pages enable only for production
        //$this->middleware('cache');
    }


    /** Retrieves all of current user's courses
     *  @param
     *  @return courses, the sections and the notes
     */

    public function getMycourses() {
        // lists courses user is enrolled in
//        $latest_notes = Course_section_note::with('note_type')->get();
 //       return Pre::render($latest_notes);
        return view('course.mypage');
    }

    /** Displays all the courses in the system
     *  @return view
     */

    public function getIndex() {
        return view('course.index');
    }

	/**
	 * Show the form for creating a new course.
	 *
	 * @return Response
	 */
    public function getCreate() {
    }
    public function postCreate()
    {
        $input = Input::all();
        return view('dashboard.index');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

    /**
     * Display individual course page
     *
     * @param  int  $id (courseid)
     * @return view
     *
    **/

	public function getShow($id)
    {
        // get info on course, and the sections and the notes attached to it
        $course = Course::getCourseInfo($id);
        // throw an error if the course is not found
        if (!isset($course->id)) {
            return Redirect::to('/500')->with('flash_message', "You've keyed in the wrong course id");
        }
        // if no error then go ahead and get other info for building the page
        else {
            $note_types = Note_type::list_note_types();
            //build a list of sections in this course
            if (isset($course->course_sections)) {
                $sections = array();
                foreach ($course->course_sections as $section) {
                    $sections = array_add($sections, $section->id, $section->title);
                }
            }
            return view('course.show', compact('course', 'note_types', 'sections'));
        }
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

    /** Apply to teach a course
     *
     */
    public function getApply(){
        return view()->make('course.apply');
    }
}