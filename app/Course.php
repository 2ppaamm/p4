<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class Course extends Model {

	protected $fillable = [];

    public function creator() {
        return $this->belongsTo('App\User','course_creator');   //every course belongs to a creator
    }

    public function subject(){                                  // each course can belong to ONE subject - may change this later
        return $this->belongsTo('App\subject');
    }

    public function course_code(){
        return $this->belongsTo('App\course_code');
    }
    public function course_sections(){                                 //a course can have many sections/lessons
        return $this->hasMany('App\Course_section', 'course_id')->orderBy('lesson_number');
    }

    public function notes(){
        return $this->hasManyThrough('App\Course_section_note','App\Course_section');
    }
    public function enrollments(){                                      // each course has many enrollments
        return $this->hasMany('App\Enrollment');
    }

    public function course_roles(){                                     // each course has many roles
        return $this->belongsToMany('App\Course_role', 'enrollments');
    }

    public function course_type(){
        return $this->belongsTo('App\Course_type');
    }

    public function access(){
        return $this->morphMany('App\Access', 'accessibility');
    }
    public function latestFiveNotes()
    {
        return $this->hasManyThrough('App\Course_section_note','App\Course_section')
            ->limit(5);
    }


    /** Get the list of courses in the system
     *
     *  @return course_list
     */
    public static function course_list(){
        if (Cache::has('systemcourses') ) {
            $course_list = Cache::get('systemcourses');
        }
        else {
            $course_list = Course::with('subject.framework')->with('creator')->with('course_type')->get();

            Cache::put('systemcourses', $course_list, 3);
        }
        return $course_list;
    }

    /** Get courses user is enrolled in
     *
     * @param   userid
     *
     * @return  $mycourses
     */
    public static function userCourses($userid){
        // Check for this user's course info from the cache first
        try {
            if (Cache::has('usercourse'.$userid)) {
                $mycourses = Cache::get('usercourse'.$userid);
            }
            else {
                $mycourses = Course::with(['course_sections' => function ($query) {
                    $query->orderBy('lesson_number')->select('title');
                }])
                    ->with(['enrollments' => function ($query) use ($userid) {
                        $query->where('user_id', '=', $userid)->select('id');
                    }])
                    ->with(['course_roles' => function ($query) {
                        $query->distinct()->select('description');
                    }])
                    ->select('id', 'title', 'description')
                    ->get()
                    ->unique();

                Cache::put('usercourse' . $userid, $mycourses, 3);
            }
        }
        catch(\Exception $e) {
                return Redirect::back()->with('flash_message', 'Error in retrieving your courses. Try later');
        }
        return $mycourses;
    }

    /** Find courses belonging to a course code
     * @params course code
     * @return course list with the same course code
     */
    public static function course_code_courselist($course_code){
        try {
            if (Cache::has('course_code_courselist' . $course_code)) {
                $course_code_courses = Cache::get('course_code_courselist' . $course_code);
            } else {
                $course_code_courses = Course::whereCourse_code_id($course_code)
                    ->with('creator')->with('course_code')->with('course_type')->get();
                Cache::put('course_code_list' . $course_code, $course_code_courses, 3);
            }
        }
        catch(\Exception $e){
            return Redirect::back()->with('flash_message', 'Error in retrieving courses with course code '.$course_code);
        }
        return $course_code_courses;
    }

    /**
     * Retrieve course info
     *
     * @param  int  $id
     * @return details of course, including the sections in the course, and the notes within each section
     */
    public static function getCourseInfo($id){
        if (Cache::has('course'.$id)) {                                                                  // Check if course is cached and then retrieve cached info
            $course = Cache::get('course'.$id);
        }
        else {
            try {
                $course = Course::updateCache($id);
            }
            catch(\Exception $e) {
                return Redirect::back()->with('flash_message', 'Cache not updated');
            }
        }
        return $course;
    }

    /** This method will update the cache version of the course whenever any update
     * to the notes or section is done
     * @params  course id
     * @return course information
     */
    public static function updateCache($id){
        try {
            $course = Course::with(['course_sections.notes' => function ($query) {
                $query->orderBy('note_order', 'asc')->select('id', 'title', 'description', 'note_order')->get();
            }])
                ->with('course_code')
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
        }
        catch(\Exception $e) {
            dd(get_class_methods($e)); // lists all available methods for exception object
            dd($e);
        }
            Cache::put('course'.$id, $course, 100);                   // Cache information

        return $course;
    }

}