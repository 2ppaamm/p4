<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        if (Cache::has('usercourse'.$userid))
        {
            $mycourses = Cache::get('usercourse'.$userid);
        }
        else {
            $mycourses = Course::with(['course_sections' => function($query) {
                $query->orderBy('lesson_number')->select('title');
            }])
                ->with(['enrollments' => function($query) {
                    $query->where('user_id', '=', Auth::user()->id)->select('id');
                }])
                ->with(['course_roles'=>function($query) {
                    $query->distinct()->select('description');
                }])
                ->select('id','title','description')
                ->get()
                ->unique();

            Cache::put('usercourse' . $userid, $mycourses, 3);
        }
        return $mycourses;
    }

    public static function course_code_courselist($course_code){
        if (Cache::has('course_code_courselist'.$course_code)) {
            $course_code_courses = Cache::get('course_code_courselist'.$course_code);
        }
        else {
            $course_code_courses = Course::whereCourse_code_id($course_code)
                ->with('creator')->with('course_code')->with('course_type')->get();
            Cache::put('course_code_list'.$course_code, $course_code_courses, 3);
        }
        return $course_code_courses;
    }
}