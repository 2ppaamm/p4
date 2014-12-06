<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Course_status extends Model {

	protected $fillable = [];

    public function course_codes(){
        return $this->hasMany('App\Course_code');
    }

    /** Find the course types in the system
     *  @return course_types
     */

    public static function listing(){
        $course_statuses = Cache::remember('course_status', 900, function()
        {
            return Course_status::lists('name', 'id');
        });
        return $course_statuses;
    }
}
