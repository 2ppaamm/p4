<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model {

    protected $fillable = [];

    public function course(){                                  //each enrollment must belong to a class
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function participant(){                              // each enrolmment belongs to a participant, can be any role
        return $this->belongsTo('App\User');
    }

    public function role(){                                     // a participant can have many roles in a class
        return $this->belongsTo('App\Course_role', 'course_role_id');
    }
}
