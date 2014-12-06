<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_role extends Model {

	protected $fillable = [];

    protected $primarykey = 'description';                          // define the primary key as the description of role

    public function enrollment (){                                  // there can be many users with the same role
        return $this->belongsToMany('App\Enrollment', 'course_role_id');
    }
}
