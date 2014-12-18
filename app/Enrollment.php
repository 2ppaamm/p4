<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model {

    protected $fillable = ['user_id', 'course_id', 'course_role_id', 'privacy', 'course_start_date',
                           'course_end_date', 'payment_type', 'payment_reference','payment_date', 'invoice_number'];

    public function course(){                                  //each enrollment must belong to a class
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function participant(){                              // each enrolmment belongs to a participant, can be any role
        return $this->belongsTo('App\User');
    }

    public function role(){                                     // a participant can have many roles in a class
        return $this->belongsTo('App\Course_role', 'course_role_id');
    }

    // check for duplicate enrollment
    public static function testEnrolled($user_id, $role_id, $course_id){
        $enrollment = Enrollment::whereUser_id($user_id)
            ->whereCourse_role_id($role_id)
            ->whereCourse_id($course_id)
            ->get();
        if (count($enrollment)<1) return FALSE;
        else return TRUE;
    }
}
