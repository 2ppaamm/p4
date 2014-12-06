<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Course_type extends Model {

	protected $fillable = [];

    public function courses(){
        return $this->hasMany('App\Course');
    }
    /** Find the course types in the system
     *  @return course_types
     */

    public static function listing(){
        $course_types = Cache::remember('course_types', 900, function()
        {
            return Course_type::lists('name', 'id');
        });
        return $course_types;
    }
}
