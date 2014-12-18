<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class Course_code extends Model {

    protected $fillable = ['course_type_id','course_author', 'subject_id', 'description', 'title', 'course_status_id'];

    public function author() {
        return $this->belongsTo('App\User','course_author');   //every course belongs to a creator
    }

    public function subject(){                                  // each course can belong to ONE subject - may change this later
        return $this->belongsTo('App\subject');
    }

    public function course_sections(){                                 //a course can have many sections/lessons
        return $this->hasMany('App\Course_section', 'course_id')->orderBy('lesson_number');
    }

    public function courses() {
        return $this->hasMany('App\Course');
    }

    public function course_type(){
        return $this->belongsTo('App\Course_type');
    }

    public function instructors(){
        return $this->belongsToMany('App\User', 'instructor_course');
    }

    /** Get the list of courses user is approved to teach
     *
     *  @return $teachable_courses
     */
    public static function teachable_courses($userid){
        try {
            if (Cache::has('instructorcourses' . $userid)) {
                $teachable_courses = Cache::get('instructorcourses' . $userid);
            } else {
                $teachable_courses = Course_code::with(['instructors' => function ($query) use ($userid) {
                    $query->where('user_id', "=", $userid);
                }])
                    ->with('author')
                    ->where('course_status_id', '>', '1')
                    ->select('course_code', 'course_author', 'title', 'description', 'id', 'cover')
                    ->get();

                Cache::put('instructorcourses' . $userid, $teachable_courses, 3);
            }
        }
        catch(\Exception $e){
            return Redirect::back()->with('flash_message', 'Error in retrieving courses you can teach.');
        }
        return $teachable_courses;
    }

    /**
     * Store a newly created course_code in storage.
     *
     * @return Response
     */

    public static function proposeCourse($request)
    {
        // check if input file is present and give it a path and use the original name
        $coverpath = public_path('storage/course/');
        $success = TRUE;
        if (null !== Input::file('cover') ) {
            $filename = Input::file('cover')->getClientOriginalName();
            $success =  Input::file('cover')->move($coverpath, $filename);
        }
        else $filename = 'default-cover.jpg'; // use a default image if no file uploaded

        if ($success) {
            $course_code = Course_code::create([
                'course_type_id' => $request->course_type,
                'description' => $request->course_description,
                'title' => $request->course_title,
                'cover' => '/storage/cover/' . $filename,
                'subject_id' => $request->subject,
                'prereqlevel' => $request->prereq,
                'targetlevel' => $request->target,
                'course_author'=>Auth::user()->id,
                'course_status_id' => 1,
                'cost' => $request->cost,
            ]);
        }
        else {
            return "Error storing course proposal";
        }
        return "Course Proposal saved";
    }

    /** Get the list of course codes in the system
     *
     *  @return course_list
     */
    public static function course_code_list(){
        try {
            if (Cache::has('systemcourse_codes')) {
                $course_code_list = Cache::get('systemcourse_codes');
            } else {
                $course_code_list = Course_code::with('subject.framework')->with('author')
                    ->with('course_type')->with('courses')->where('course_status_id', '=', '3')->get();

                Cache::put('systemcourse_codes', $course_code_list, 3);
            }
        }
        catch(\Exception $e){
            return Redirect::back()->with('flash_message','Error in retrieving the course codes in the system.');
        }

        return $course_code_list;
    }
}