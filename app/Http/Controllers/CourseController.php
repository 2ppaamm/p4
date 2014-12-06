<?php namespace App\Http\Controllers;

use App\Course;
use App\Course_code;
use App\Course_type;
use App\Enrollment;
//use App\Http\Controllers\Controller;
use App\Http\Middleware\ViewMaker;
use App\Subject;
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
//        $this->middleware('cache');
    }


    /** Retrieves all of current user's courses
     *  @param
     *  @return courses, the sections and the notes
     */

    public function getMycourses() {
        // lists courses user is enrolled in
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
    public function getCreate()
    {
    }
    public function postCreate()
    {
        $input = Input::all();
        return Pre::render($input);
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
	 * Retrieve course info
	 *
	 * @param  int  $id
	 * @return details of course, including the sections in the course, and the notes within each section
	 */

    public function getCourseInfo($id){
        if (Cache::has('course'.$id))                                                                   // Check if course is cached and then retrieve cached info
        {
            $course = Cache::get('course'.$id);
        }
        else {
            $course = Course::with(['course_sections.notes' => function ($query) {
                $query->orderBy('note_order', 'asc')->select('id', 'title', 'description', 'note_order')->get();
            }])
                ->with(['course_sections' => function ($query) {
                    $query->orderBy('lesson_number', 'asc')->orderBy('created_at', 'asc')->select('id', 'title', 'description', 'lesson_number', 'guid', 'lesson_date');
                }])
                ->with(['course_sections.notes.note_type' => function ($query) {
                    $query->select('id', 'format', 'description');
                }])
                ->with(['enrollments.participant' => function ($query) {
                    $query->where('id', '=', Auth::user()->id);
                }])
                ->whereId($id)
                ->orderBy('updated_at', 'desc')
                ->firstorfail();

            Cache::put('course' . $id, $course, 30);                                                  // Cache if key not already there
        }
        return $course;
    }
    /**
     * Display individual course page
     *
     * @param  int  $id (courseid)
     * @return view
     *
    **/

	public function getShow($id, NoteController $note_type)
    {
        // get info on course, and the sections and the notes attached to it
        $course = $this->getCourseInfo($id);

        // throw an error if the course is not found
        if (count($course) < 1) {
            return Redirect::back()->with('flash_message', 'Your request is not valid redirect to enrollment page if exists');
        }

        // if no error then go ahead and get other info for building the page
        else {

            $note_types = $note_type->list_note_types();

            //build a list of sections in this course
            $sections = array();
            foreach ($course->course_sections as $section) {
                $sections = array_add($sections, $section->id, $section->title);
            }
            return view('course.show1', compact('course', 'note_types', 'sections'));
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